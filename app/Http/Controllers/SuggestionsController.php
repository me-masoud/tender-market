<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Suggestions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuggestionsController extends Controller
{
    public function checkRole($expectedRole){
        $role = auth()->user()->role;
        return ($role == $expectedRole) ? true : false;
    }

    public function showSuggestions()
    {
        if (!$this->checkRole('provider')){
            return 'شما اجازه دسترسی به این صفحه را ندارید';
        }

        $invoices = Invoice::where('status' , 'closed')->with('user')->get();

        return view('invoice.suggestPrice' , ['invoices'=>$invoices]);
    }

    public function invoiceSuggest($id)
    {
        if (!$this->checkRole('provider')){
            return 'شما اجازه دسترسی به این صفحه را ندارید';
        }

        $details = InvoiceDetail::where('invoice_id' , $id)->with('product')->get();

        return view('invoice.suggestInvoice' , ['invoice'=>$id , 'details'=>$details]);
    }

    public function saveSuggestedPrices(Request $request){
        foreach ($request->input() as $key=>$item){
            if (gettype($key) == 'integer'){
                $suggest = Suggestions::firstOrNew([
                    'invoice_detail_id'  => $key,
                    'provider_id'        =>auth()->user()->id,
                ]);
                $suggest->price = $request->$key;
                $suggest->save();
            }
        }

    }


}
