<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitDoctorList extends Model
{
    use HasFactory;

    protected $fillable = ['unit_id', 'doctor_id'];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
}
