<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineInvoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_no', 'patient_id', 'doctor_id', 'note', 'total', 'discount_percent', 'discount', 'gst_percent', 'gst', 'net_amount', 'payment_mode', 'payment_amount'];            
  
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');  
    }
}
