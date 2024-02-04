<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'department_id', 'doctor_id', 'date', 'appoinment_date', 'serial_no', 'problem', 'assign_by_id', 'status'];        
     
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id'); 
    } 

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');  
    } 
}
