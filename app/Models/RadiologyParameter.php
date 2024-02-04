<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadiologyParameter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'range', 'unit', 'description'];    
}
