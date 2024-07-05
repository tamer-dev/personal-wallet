<?php

namespace App\Observers;

use App\Enums\TransactionTypeEnum;
use App\Models\Wallet;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\Route;


class WalletTransactionObserver
{
    /**
     * Handle the Campaign "created" event.
     */
    public function created(WalletTransaction $walletTransaction): void
    {
        $this->updateBalance($walletTransaction);
    }

    function updateBalance($walletTransaction)  {
        $wallet = Wallet::where('id', $walletTransaction->wallet_id)->first();

        if ($walletTransaction->type == TransactionTypeEnum::deposit->value){
            $wallet->balance += $walletTransaction->amount;
        }else{
            $wallet->balance -= $walletTransaction->amount;
        }

        $wallet->save();

    }
}
