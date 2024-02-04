<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiochemistryParameter extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'range', 'unit', 'description'];    
}
