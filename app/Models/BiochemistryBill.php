<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiochemistryBill extends Model
{
    use HasFactory;

    protected $fillable = ['bill_no', 'bill_date', 'patient_id', 'doctor_id', 'total', 'discount_percent', 'discount', 'gst', 'net_amount', 'payment_mode', 'payment_amount', 'note'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
}
