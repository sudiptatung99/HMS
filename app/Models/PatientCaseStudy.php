<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCaseStudy extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'food_allergies', 'tendency_bleed', 'heart_disease', 'high_blood_pressure', 'diabetic', 'surgery', 'accident', 'others', 'family_medical_history', 'current_medication', 'female_pregnancy', 'breast_feeding', 'health_insurance', 'low_income', 'reference', 'status'];          
 
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    } 
}
