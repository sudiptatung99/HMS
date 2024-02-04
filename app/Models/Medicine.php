<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'medicine_category_id', 'unit', 'quantity', 'manufacturer_price', 'selling_price', 'batch_no', 'expiry_date', 'medicine_vendor_id', 'manufacturer', 'image', 'description', 'status'];       
    
    public function medicine_category()
    {
        return $this->belongsTo(MedicineCategory::class, 'medicine_category_id', 'id');   
    }

    public function medicine_vendor()
    {
        return $this->belongsTo(MedicineVendor::class, 'medicine_vendor_id', 'id');    
    }
}
