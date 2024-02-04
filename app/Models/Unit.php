<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status'];

     public function unit_doctor()
    {
        return $this->hasMany(UnitDoctorList::class);
    }

}
