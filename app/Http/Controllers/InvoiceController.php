<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{

    public function showCreateInvoice()
    {
        if (!$this->checkRole('drug_store')){
            return 'شما اجازه دسترسی به این صفحه را ندارید';
        }
        return view('invoice.createInvoice' , ['products'=>ProductController::getProducts()]);
    }

    public function checkRole($expectedRole){
        $role = auth()->user()->role;
        return ($role == $expectedRole) ? true : false;
    }
    public function addToInvoice($product_id)
    {
        if (!$this->checkRole('drug_store')){
            return 'شما اجازه دسترسی به این صفحه را ندارید';
        }
        $invoice = Invoice::firstOrCreate([
          'drug_store_id' => auth()->user()->id,
          'status'        => 'active'
        ]);
        $invoiceDetail = InvoiceDetail::firstOrCreate([
            'invoice_id' => $invoice->id,
            'product_id' => $product_id
        ]);

        if ($invoiceDetail){
            return 'محصول به فاکتور اضافه شد';
        }
    }

    public function showInvoices()
    {
        if (!$this->checkRole('drug_store')){
            return 'شما اجازه دسترسی به این صفحه را ندارید';
        }
        $invoice = Invoice::where('drug_store_id' , auth()->user()->id)->simplePaginate(10);
        return view('invoice.invoices' , ['invoices'=>$invoice]);
    }

    public function showInvoice($id)
    {
        if (!$this->checkRole('drug_store')){
            return 'شما اجازه دسترسی به این صفحه را ندارید';
        }
        $invoice = Invoice::where('id' , $id)->where('drug_store_id' , auth()->user()->id)->first();
        $invoice->invoiceDetails;

        $details = InvoiceDetail::where('invoice_id' , $invoice->id)->with('product')->with('suggestions')->get();
        $providers = User::where('role' ,'provider')->get();
//        dd($providers);
        return view('invoice.invoice' , ['invoice'=>$invoice , 'details'=>$details , 'providers'=>$providers]);
    }

    public function closeInvoice()
    {
        if (!$this->checkRole('drug_store')){
            return 'شما اجازه دسترسی به این صفحه را ندارید';
        }
        $invoice = Invoice::where('status' , 'active')->first();
        $invoice->status = 'closed';
        $invoice->save();
        return redirect('/dashboard');
    }
}
