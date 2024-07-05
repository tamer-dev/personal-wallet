<?php

namespace Database\Seeders;

use App\Models\Wallet;
use Illuminate\Database\Seeder;
use App\Models\User;


class WalletDemoSeeder extends Seeder
{
    public function run() {


        $wallets = [
            [ 'user_id'=>'1',  'balance' => 4000000 ],
            [ 'user_id'=>'2',  'balance' => 7000000 ],
            [ 'user_id'=>'3',  'balance' => 1000000 ],
            [ 'user_id'=>'4',  'balance' => 9000000 ],
        ];

        foreach ($wallets as $wallet) {
            $walletsData = Wallet::create(collect($wallet)->toArray());
        }
    }
}
