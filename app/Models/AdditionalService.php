<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalService extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'name', 'amount', 'description'];   
      
    public function patient() 
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');  
    }  
}
