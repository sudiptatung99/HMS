<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PathologyBillTest extends Model
{
    use HasFactory;

    protected $fillable = ['bill_id', 'test_id'];   
     
    public function bill() 
    {
        return $this->belongsTo(PathologyBill::class, 'bill_id', 'id');   
    }    
 
    public function test() 
    {
        return $this->belongsTo(PathologyTest::class, 'test_id', 'id');   
    }   
}
