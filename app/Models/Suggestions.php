<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestions extends Model
{
    use HasFactory;

    protected $fillable=['invoice_detail_id' , 'provider_id' , 'price'];
}
