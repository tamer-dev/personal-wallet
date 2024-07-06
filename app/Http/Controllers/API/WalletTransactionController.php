<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\QrcodeAPIRequest;
use App\Http\Requests\API\WalletAddFundAPIRequest;
use App\Http\Requests\API\WalletTransferAPIRequest;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Resources\WalletTransactionResource;
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
            $walletTransaction =$this->walletService->addFunds($request);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->sendError($exception->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'Funds added successfully',
            'new_balance' => $walletTransaction->wallet()->first()->balance
        ]);

        //Another way to return data by Resource and global sendResponse function

        // return $this->sendResponse(
        //    new WalletTransactionBalanceResource($walletTransaction) ,
        //    "funds added successfully"
        // );

    }

    // Transfer funds to other users
    public function transferFunds(WalletTransferAPIRequest $request)
    {
        try {
            DB::beginTransaction();
            $walletTransaction =$this->walletService->transferFunds($request);
            DB::commit();
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->sendError($exception->getMessage());
        }

        return response()->json([
            'success' => true,
            'message' => 'amount transferred successfully',
            'new_balance' => $walletTransaction->wallet()->first()->balance
        ]);
    }

    // View transaction history
    public function viewTransactions(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Transactions retrieved successfully',
            'transactions' => WalletTransactionResource::collection($this->walletService->viewTransactions($request->user_id))
        ]);

    }

    // Withdraw funds to bank account
    public function withdrawFunds(Request $request)
    {
        // Logic for withdrawal
    }

    // Generate PDF of transactions
    public function generatePdf($user_id)
    {
        $transactions = WalletTransaction::whereRelation('wallet', 'user_id', $user_id)->latest()->get();
        $file_name = 'pdf/'.time().'.pdf';
        Pdf::loadView('transactions', [
            'transactions' => $transactions
        ])->save($file_name);
        return url($file_name);
    }

    // Generate QR code for transfers
    public function generateQrCode($recipient_id, QrcodeAPIRequest $request)
    {
        $file_name = 'qr/'.time().'.svg';
        QrCode::format('svg')->generate("user_id:".$request->get('user_id').", recipient_id:".$recipient_id. ', amount:' . $request->get('amount'),$file_name , 'image/svg');
        return url($file_name);
    }
}
