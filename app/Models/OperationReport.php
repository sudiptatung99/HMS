<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationReport extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'date_of_operation', 'preoperative_diagnosis', 'procedure', 'surgeon', 'assistant', 'anesthesia', 'anesthesiologist', 'description'];          
 
    public function patient() 
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');   
    }  
}
