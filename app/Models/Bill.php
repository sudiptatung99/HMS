<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    protected $fillable = ['bill_no', 'bill_date', 'patient_id', 'package_charge', 'service_charge', 'bed_charge', 'total', 'discount_percent', 'discount', 'gst_percent', 'gst', 'advance_paid', 'insurance', 'payable', 'note', 'payment_mode', 'payment_status'];             
     
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    }
} 
