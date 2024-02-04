<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InsuranceDisease extends Model
{
    use HasFactory;

    protected $fillable = ['insurance_id', 'name', 'details'];  

    public function insurance()
    {
        return $this->belongsTo(Insurance::class, 'insurance_id', 'id');    
    }   
}
