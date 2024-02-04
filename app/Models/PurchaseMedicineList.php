<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseMedicineList extends Model
{
    use HasFactory;

    protected $fillable = ['purchase_medicine_id', 'name', 'batch', 'expiry_date', 'mrp_per_unit', 'quantity', 'sub_total', 'discount', 'total'];     

    public function purchase_medicine()
    {
        return $this->belongsTo(PurchaseMedicine::class, 'purchase_medicine_id', 'id');    
    }  
} 
