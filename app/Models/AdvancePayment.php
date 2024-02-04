<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvancePayment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'amount', 'payment_method', 'receipt_no'];   
     
    public function patient() 
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');  
    }  
}
