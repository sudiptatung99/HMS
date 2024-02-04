<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedAssign extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'room_id', 'bed_id', 'assign_date', 'description', 'status'];    
     
    public function patient() 
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');  
    }  
    
    public function room() 
    {
        return $this->belongsTo(Room::class, 'room_id', 'id');  
    }  

    public function bed() 
    {
        return $this->belongsTo(Bed::class, 'bed_id', 'id');   
    }  
}
