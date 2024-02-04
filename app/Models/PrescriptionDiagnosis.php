<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionDiagnosis extends Model
{
    use HasFactory;

    protected $fillable = ['prescription_id', 'name', 'instruction'];    

    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'prescription_id', 'id');    
    }  
}
