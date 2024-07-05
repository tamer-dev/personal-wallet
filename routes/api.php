
<?php

use App\Http\Controllers\API\WalletTransactionController;
use Illuminate\Support\Facades\Route;


//Route::group(['middleware' => ['jwt.auth']], function() {
    Route::prefix('wallet')->group(function () {
        Route::post('add-funds', [WalletTransactionController::class, 'addFunds']);
        Route::post('transfer', [WalletTransactionController::class, 'transferFunds']);
        Route::get('transactions', [WalletTransactionController::class, 'viewTransactions']);
        Route::post('withdraw', [WalletTransactionController::class, 'withdrawFunds']);
        Route::get('transactions/pdf', [WalletTransactionController::class, 'generatePdf']);
        Route::get('transfer/qr', [WalletTransactionController::class, 'generateQrCode']);
    });
//});
