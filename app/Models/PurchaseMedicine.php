<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseMedicine extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'invoice_id', 'manufacturer', 'sub_total', 'discount', 'gst', 'total', 'payment_mode', 'payment_amount'];     
}  
