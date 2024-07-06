
<?php

use App\Http\Controllers\API\WalletTransactionController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});
Route::group(['middleware' => ['auth']], function() {
    Route::prefix('wallet')->group(function () {
        Route::post('add-funds', [WalletTransactionController::class, 'addFunds']);
        Route::post('transfer', [WalletTransactionController::class, 'transferFunds']);
        Route::get('transactions', [WalletTransactionController::class, 'viewTransactions']);
        Route::post('withdraw', [WalletTransactionController::class, 'withdrawFunds']);
        Route::get('transactions/pdf/{user_id}', [WalletTransactionController::class, 'generatePdf']);
        Route::get('transfer/qr/{recipient_id}', [WalletTransactionController::class, 'generateQrCode']);
    });
});
