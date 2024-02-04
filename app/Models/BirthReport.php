<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthReport extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'date', 'time', 'weight', 'doctor_id', 'description'];        

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');  
    }
} 
