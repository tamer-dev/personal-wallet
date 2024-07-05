<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\WalletAddFundAPIRequest;
use App\Http\Requests\API\WalletTransferAPIRequest;
use App\Http\Resources\WalletTransactionBalanceResource;
use App\Services\WalletService;
use Exception;
use App\Http\Controllers\ApiBaseController;
use App\Models\WalletTransaction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class WalletTransactionController extends ApiBaseController
{
    private $walletService;
    function __construct( WalletService $walletService) {
        $this->walletService = $walletService;


    }
    // Add funds to wallet
    public function addFunds(WalletAddFundAPIRequest $request):JsonResponse
    {
        try {
            DB::beginTransaction();
            $wallet =$this->walletService->addFunds($request);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->sendError($exception->getMessage());
        }

        return $this->sendResponse(
            array(new WalletTransactionBalanceResource($wallet) ),
            "funds added successfully",true
        );

    }

    // Transfer funds to other users
    public function transferFunds(WalletTransferAPIRequest $request)
    {
        try {
            DB::beginTransaction();
            $wallet =$this->walletService->transferFunds($request);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->sendError($exception->getMessage());
        }

        return $this->sendResponse(
            array(new WalletTransactionBalanceResource($wallet) ),
            "funds added successfully",true
        );
    }

    // View transaction history
    public function viewTransactions(Request $request)
    {
        $transactions = WalletTransaction::where('wallet_id', $request->wallet_id)->get();
        //        WalletBalanceResource::collection($wallet);
        return response()->json($transactions);
    }

    // Withdraw funds to bank account
    public function withdrawFunds(Request $request)
    {
        // Logic for withdrawal
    }

    // Generate PDF of transactions
    public function generatePdf(Request $request)
    {
        // Logic to generate PDF using DomPDF
    }

    // Generate QR code for transfers
    public function generateQrCode(Request $request)
    {
        // Logic to generate QR code
    }
}
