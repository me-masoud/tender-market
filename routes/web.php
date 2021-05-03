<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ProductController;
use \App\Http\Controllers\InvoiceController;
use \App\Http\Controllers\SuggestionsController;
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
    Route::get('/showinvoices' , [InvoiceController::class,'showInvoices'])->name('showInvoices');
    Route::get('/invoice/{id}',[InvoiceController::class,'showInvoice'])->name('invoice');
    Route::get('/closeinvoice' , [InvoiceController::class,'closeInvoice'])->name('closeInvoice');

    //suggest price
    Route::get('/suggestions' , [SuggestionsController::class,'showSuggestions'])->name('showSuggestions');
    Route::get('/invoicesuggest/{id}' ,[SuggestionsController::class , 'invoiceSuggest'])->name('invoiceSuggest');
    Route::post('/savePrice' , [SuggestionsController::class,'saveSuggestedPrices'])->name('saveSuggestedPrices');
});



//auth routes are here
require __DIR__.'/auth.php';
