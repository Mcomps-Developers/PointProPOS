<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyWallet;
use App\Models\PaymentSchedule;
use App\Models\Repayment as ModelsRepayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Repayment extends Controller
{
    public function saveTransaction(Request $request)
    {
        $results = $request->json()->all();
        $this->recordTransaction($results['results']);
    }

    private function recordTransaction($results)
    {
        DB::beginTransaction(); // Start a database transaction

        try {
            $transaction = new ModelsRepayment();
            $transaction->tracking_id = $results['tracking_id'];
            $transaction->state = $results['state'];
            $transaction->provider = $results['provider'];
            $transaction->value = $results['value'];
            $transaction->net_amount = $results['net_amount'];
            $transaction->phone_number = $results['account'];
            $transaction->api_ref = $results['api_ref'];
            $transaction->customer_id = $results['meta']['customer']['customer_id'];
            $transaction->currency = $results['currency'];
            $transaction->charges = $results['charges'];
            $transaction->failed_code = $results['failed_code'];
            $transaction->failed_reason = $results['failed_reason'];

            $repayment = PaymentSchedule::findOrFail($results['api_ref']);
            $transaction->user_id = $repayment->invoice->user_id;
            $transaction->convenience_fee = env('CONVENIENCE_FEE');
            $transaction->company_id = $repayment->invoice->company_id;

            $transaction->save();

            if ($transaction->state === 'COMPLETE') {
                $this->createPurchase($transaction);
                $this->updateCompanyWallet($transaction);
                return redirect(request()->header('Referer'));
            } else {
                notyf()
                    ->position('x', 'right')
                    ->position('y', 'top')
                    ->addError('Transaction failed.');
                return redirect(request()->header('Referer'));
            }

            DB::commit(); // Commit the transaction
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback the transaction if an exception occurs
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->addError('An error occurred. Please try again later.');
            Log::error('Error saving transaction: ' . $e->getMessage());
        }

        return redirect(request()->header('Referer'));
    }

    private function createPurchase($transaction)
    {
        try {
            $repayment = PaymentSchedule::findOrFail($transaction->api_ref);
            $repayment->amount_paid += $transaction->value;
            $repayment->save();

            if ($repayment->amount - $repayment->amount_paid <= 0) {
                // Update status to 'paid'
                $repayment->status = 'paid';
                $repayment->amount_paid = $repayment->amount;
                $repayment->payment_date = Carbon::now();
                $repayment->save();
            }

            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->success('Transaction successful');

        } catch (\Exception $e) {
            Log::error('Unexpected Exception on updating schedule. Details: ' . $e->getMessage());
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->addError('An error occurred. Please try again later.');
        } catch (\Throwable $th) {
            Log::error('Throwable error on updating schedule. Details: ' . $th->getMessage());
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->addError('An error occurred. Please try again later.');
        }
    }

    private function updateCompanyWallet($transaction)
    {
        try {
            $wallet = CompanyWallet::findOrFail($transaction->company_id);
            $wallet->balance += $transaction->value - $transaction->convenience_fee;
            $wallet->save();

        } catch (\Exception $e) {
            Log::error('Unexpected Exception on updating wallet. Details: ' . $e->getMessage());
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->addError('An error occurred. Please try again later.');
        } catch (\Throwable $th) {
            Log::error('Throwable error on updating wallet. Details: ' . $th->getMessage());
            notyf()
                ->position('x', 'right')
                ->position('y', 'top')
                ->addError('An error occurred. Please try again later.');
        }
    }
}
