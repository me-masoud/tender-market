<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $password = '$2y$10$bbNPZ4KmlPcuVBu02ShbUu9aEpVJ9LPxA.yz6DbOJcwT.O3A7JV8q'; //12345678
        $users = [
            ['name'=> 'user' , 'email'=> 'user@gmail.com' , 'role'=>'user' , 'password'=>$password],
            ['name'=> 'admin' , 'email'=> 'admin@gmail.com' , 'role'=>'admin' , 'password'=>$password],
            ['name'=> 'drug store' , 'email'=> 'drug_store@gmail.com' , 'role'=>'drug_store' , 'password'=>$password],
            ['name'=> 'provider' , 'email'=> 'provider@gmail.com' , 'role'=>'provider' , 'password'=>$password],
        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
}
