<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable=['drug_store_id' , 'status'];

    public function invoiceDetails()
    {
        return $this->hasMany(InvoiceDetail::class);
    }
    public function user(){
        return $this->belongsTo(User::class , 'drug_store_id' , 'id');
    }

}
