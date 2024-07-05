<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;


class UsersDemoSeeder extends Seeder
{

    public function run() {

        //DB::table("users")->delete();

        $users = [
            [ 'name'=>'user 1',  'email' => 'user1@sayal.sa', 'password' => bcrypt('123') ],
            [ 'name'=>'user 2',  'email' => 'user2@sayal.sa', 'password' => bcrypt('123') ],
            [ 'name'=>'user 3',  'email' => 'user3@sayal.sa', 'password' => bcrypt('123') ],
            [ 'name'=>'user 4',  'email' => 'user4@sayal.sa', 'password' => bcrypt('123') ],
        ];

        foreach ($users as $user) {
            $userData = User::create(collect($user)->toArray());
        }
    }
}
