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
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained();
            $table->string('to_bank_account')->nullable();
            $table->decimal('amount', 18, 2);
            $table->string('type');//"deposit", "transfer", "withdrawal", "fee" etc
            $table->string('reference_id')->nullable();//(optional) for linking related transactions (e.g., transfer ID)
            $table->integer('status');
            $table->dateTime('transaction_date');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wallet_transactions');
    }
};
