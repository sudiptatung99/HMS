<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['slot_id', 'doctor_id', 'available_days', 'available_start_time', 'available_end_time', 'per_patient_time', 'status'];        
      
    public function slot() 
    {
        return $this->belongsTo(Slot::class, 'slot_id', 'id');    
    } 
 
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');  
    } 
}
