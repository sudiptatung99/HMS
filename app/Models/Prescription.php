<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'doctor_id', 'weight', 'blood_pressure', 'date', 'reference', 'visiting_fees', 'patient_notes', 'prescription_type'];          
 
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');  
    } 
}
