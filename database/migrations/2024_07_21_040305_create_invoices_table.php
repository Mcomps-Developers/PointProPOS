<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('reference')->unique();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('user_id');
            $table->float('amount');
            $table->enum('type', ['pay_later', 'collect_later']);
            $table->enum('status', ['pending', 'cancelled', 'complete', 'defaulted', 'progress'])->default('pending');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
