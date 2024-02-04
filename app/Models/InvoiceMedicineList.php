<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceMedicineList extends Model
{
    use HasFactory;

    protected $fillable = ['medicine_invoice_id', 'medicine_id', 'expiry_date', 'quantity', 'price'];           
  
    public function medicine_invoice()
    {
        return $this->belongsTo(MedicineInvoice::class, 'medicine_invoice_id', 'id');   
    }

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'medicine_id', 'id');  
    }
}
