<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientPackage extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'package_id'];           
  
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    }

    public function package()
    { 
        return $this->belongsTo(Package::class, 'package_id', 'id');   
    } 
}
