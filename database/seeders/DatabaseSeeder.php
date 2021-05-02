<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Product;
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
        //users
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

        // brands :
        $brands = [
            ['title'=>'brand1'],
            ['title'=>'brand2'],
            ['title'=>'brand3'],
            ['title'=>'brand4'],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }

        //products
        $products = [
            ['title'=>'product1' , 'brand_id'=>'1' , 'author_id'=>'2'],
            ['title'=>'product2' , 'brand_id'=>'1' , 'author_id'=>'2'],
            ['title'=>'product3' , 'brand_id'=>'2' , 'author_id'=>'2'],
            ['title'=>'product4' , 'brand_id'=>'2' , 'author_id'=>'2'],
            ['title'=>'product5' , 'brand_id'=>'3' , 'author_id'=>'2'],
            ['title'=>'product6' , 'brand_id'=>'3' , 'author_id'=>'2'],
            ['title'=>'product7' , 'brand_id'=>'4' , 'author_id'=>'2'],
            ['title'=>'product8' , 'brand_id'=>'4' , 'author_id'=>'2'],
            ['title'=>'product9' , 'brand_id'=>'1' , 'author_id'=>'2'],
            ['title'=>'product10' , 'brand_id'=>'1' , 'author_id'=>'2'],
            ['title'=>'product11' , 'brand_id'=>'2' , 'author_id'=>'2'],
            ['title'=>'product12' , 'brand_id'=>'2' , 'author_id'=>'2'],
            ['title'=>'product13' , 'brand_id'=>'3' , 'author_id'=>'2'],
            ['title'=>'product14' , 'brand_id'=>'3' , 'author_id'=>'2'],
            ['title'=>'product15' , 'brand_id'=>'4' , 'author_id'=>'2'],
            ['title'=>'product16' , 'brand_id'=>'4' , 'author_id'=>'2'],
            ['title'=>'product17' , 'brand_id'=>'2' , 'author_id'=>'2'],
            ['title'=>'product18' , 'brand_id'=>'1' , 'author_id'=>'2'],
            ['title'=>'product19' , 'brand_id'=>'3' , 'author_id'=>'2'],
        ];

        foreach ($products as $product){
            Product::create($product);
        }
    }
}
