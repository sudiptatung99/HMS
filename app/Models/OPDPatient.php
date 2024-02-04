<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OPDPatient extends Model
{
    use HasFactory;
    
    protected $fillable = ['patient_id', 'uhid', 'name', 'guardian_name', 'email', 'contact', 'emergency_contact', 'blood_group', 'gender', 'dob', 'address', 'admission_date', 'department_id', 'purpose', 'doctor_id', 'weight', 'blood_pressure', 'image', 'pan_number', 'passport_number', 'status'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');
    }
}
