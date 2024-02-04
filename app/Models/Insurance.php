<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'consultant_name', 'policy_name', 'policy_no', 'policy_holder_name', 'insurance_name', 'total', 'status'];   

    public function patient() 
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    }   
} 
