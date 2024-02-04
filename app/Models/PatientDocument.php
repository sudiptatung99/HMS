<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDocument extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'document', 'name', 'details'];            
   
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    } 
}
