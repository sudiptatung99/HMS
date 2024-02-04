<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrescriptionMedicine extends Model
{
    use HasFactory;

    protected $fillable = ['prescription_id', 'name', 'type', 'instruction', 'days'];     

    public function prescription()
    {
        return $this->belongsTo(Prescription::class, 'prescription_id', 'id');    
    }  
}
