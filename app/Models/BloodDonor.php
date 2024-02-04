<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodDonor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'dob', 'blood_group', 'gender', 'father_name', 'contact', 'address', 'donate_status'];   
}  
