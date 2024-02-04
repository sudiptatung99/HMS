<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'department_id', 'image', 'dob', 'gender', 'blood_group', 'designation_id', 'address', 'contact', 'emergency_contact', 'career_title', 'resume', 'short_biogrphy', 'specialist', 'language', 'status'];

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id'); 
    }  
     
    public function designation() 
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id'); 
    } 
} 