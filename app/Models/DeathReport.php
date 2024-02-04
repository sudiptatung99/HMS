<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeathReport extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'date_of_death', 'place_of_death', 'deceased_address', 'deceased_permanent_address', 'doctor_id'];        
 
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    } 

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id', 'id');  
    } 
} 
