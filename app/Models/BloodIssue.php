<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodIssue extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'doctor_id', 'blood_bag_id', 'issue_date', 'amount', 'total', 'gst_percent', 'gst', 'net_amount', 'payment_mode', 'payment_amount', 'note'];     
         
    public function patient() 
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');  
    }

    public function doctor() 
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');   
    }

    public function blood_bag() 
    {
        return $this->belongsTo(BloodBag::class, 'blood_bag_id', 'id');   
    }
}
