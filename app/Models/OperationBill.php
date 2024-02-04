<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OperationBill extends Model
{
    use HasFactory;

    protected $fillable = [
        'bill_no',
        'bill_date',
        'patient_id',
        'patient_operations_id',
        'total',
        'discount_percent',
        'discount',
        'gst',
        'gst_percent',
        'payment_mode',
        'payment_status',
        'payment_amount',
        'note',
    ];
    public function patient_operations()
    {
        return $this->belongsTo(PatientOperation::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
