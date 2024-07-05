<?php

namespace App\Http\Resources;


use App\Models\Wallet;
use Illuminate\Http\Resources\Json\JsonResource;


class WalletBalanceResource extends BaseResource
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
            'new_balance' => $this->balance,
        ];
    }
}
