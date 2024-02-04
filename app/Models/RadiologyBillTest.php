<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RadiologyBillTest extends Model
{
    use HasFactory;

    protected $fillable = ['bill_id', 'test_id'];   
     
    public function bill() 
    {
        return $this->belongsTo(RadiologyBill::class, 'bill_id', 'id');   
    }    
 
    public function test() 
    {
        return $this->belongsTo(RadiologyTest::class, 'test_id', 'id');   
    }   
}
 