<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'wallet_id',
        'type',
        'amount',
        'status',
        'transaction_date',
        'sender_id',
        'recipient_id'
    ];
}
