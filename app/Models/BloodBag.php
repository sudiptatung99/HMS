<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodBag extends Model
{
    use HasFactory;

    protected $fillable = ['donor_id', 'blood_group', 'donate_date', 'bag', 'volume', 'unit_type', 'lot', 'note', 'issue_status'];     
        
    public function donor() 
    {
        return $this->belongsTo(BloodDonor::class, 'donor_id', 'id');  
    }
}
