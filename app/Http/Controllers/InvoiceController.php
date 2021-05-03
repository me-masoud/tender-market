<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceDetail;
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

        return $invoiceDetail;
    }
}
