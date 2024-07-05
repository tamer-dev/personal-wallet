
<?php

use App\Http\Controllers\API\WalletController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => ['jwt.auth']], function() {
    Route::prefix('wallet')->group(function () {
        Route::post('add-funds', [WalletController::class, 'addFunds']);
        Route::post('transfer', [WalletController::class, 'transferFunds']);
        Route::get('transactions', [WalletController::class, 'viewTransactions']);
        Route::post('withdraw', [WalletController::class, 'withdrawFunds']);
        Route::get('transactions/pdf', [WalletController::class, 'generatePdf']);
        Route::get('transfer/qr', [WalletController::class, 'generateQrCode']);
    });
});
