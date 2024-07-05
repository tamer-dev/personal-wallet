<?php

namespace App\Http\Resources;


use App\Models\Wallet;
use Illuminate\Http\Resources\Json\JsonResource;


class WalletTransactionResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray( $request): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'amount' => $this->amount,
            'date' => $this->transaction_date,
            'status' => $this->status,
           ];
    }
}
