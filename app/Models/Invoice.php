<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function repayments()
    {
        return $this->hasMany(PaymentSchedule::class, 'invoice_id');
    }

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
