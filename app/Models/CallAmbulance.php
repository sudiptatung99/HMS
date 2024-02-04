<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CallAmbulance extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'ambulance_id', 'date', 'note', 'amount', 'total', 'gst_percent', 'gst', 'net_amount', 'payment_mode', 'payment_amount'];   
      
    public function patient() 
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');  
    }
    
    public function ambulance() 
    {
        return $this->belongsTo(Ambulance::class, 'ambulance_id', 'id');   
    }
}
