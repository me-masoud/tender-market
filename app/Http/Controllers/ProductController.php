<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function insert()
    {
        $user = User::find(Auth::id());
        if ($user->role == 'admin'){
            return view('insertProduct');
        }else{
            return 'شما اجازه دسترسی به این بخش را ندارید ';
        }

    }

    public function insertToDb(Request $request){
        $user = User::find(Auth::id());
        if ($user->role != 'admin'){
            return 'شما اجازه دسترسی به این بخش را ندارید ';
        }

        $validation = $request->validate([
            'name' => 'required|max:256|min:3',
            'brand'=>'required|exists:brands,title',
        ]);

        $product = Product::create([
            'title' =>$request->name,
            'author_id'=>auth()->id(),
            'brand_id'=>Brand::where('title' , $request->brand)->first()->id,
        ]);
        if ($product){
            return User::find(auth()->id())->first()->role;
        }
    }

    public function showProducts()
    {
        return view('products' ,['products'=>$this->getProducts()]);
    }

    public static function getProducts(){
        return Product::with('brand')->simplePaginate(5);
    }
}
