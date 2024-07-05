<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\ApiBaseController;

use Illuminate\Http\Request;


class WalletController extends ApiBaseController
{
    // Add funds to wallet
    public function addFunds(Request $request)
    {
        //  logic for addFunds
    }

    // Transfer funds to other users
    public function transferFunds(Request $request)
    {
        //  logic for transfer
    }

    // View transaction history
    public function viewTransactions(Request $request)
    {
        //  logic for transfer
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
