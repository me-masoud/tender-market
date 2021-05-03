<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\InvoiceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//dashboards routs
Route::middleware(['auth'])->group(function (){
    Route::get('/dashboard' , function (){
        return view('dashboard');
    })->name('dashboard');

    Route::get('/insert' , [ProductController::class , 'insert'])->name('insert');
    Route::get('/insertproduct' , function (){
        return redirect()->route('insert');
    });
    Route::post('/insertproduct' , [ProductController::class , 'insertToDb'])->name('insertProduct');

    //get products
    Route::get('/products' , [ProductController::class , 'showProducts'])->name('showProducts');

    //invoice
    Route::get('/createInvoice' , [InvoiceController::class, 'showCreateInvoice'])->name('showCreateInvoice');
    Route::get('/addtoinvoice/{product_id}' ,[InvoiceController::class,'addToInvoice'])->name('addToInvoice');
});



//auth routes are here
require __DIR__.'/auth.php';
