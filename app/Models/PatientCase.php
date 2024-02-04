<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCase extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'case_manager', 'doctor_id', 'hospital_name', 'hospital_address', 'doctor_name', 'status'];         
 
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');  
    } 
}
