<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OPDBill extends Model
{
    use HasFactory;

    protected $fillable =[
        'bill_no',
        'opd_patient_id',
        'bill_date',
        'total',
        'discount_percent',
        'discount',
        'gst_percent',
        'gst',
        'payable',
        'payment_status',
        'payment_mode',
        'note'
    ];
    public function opd_patient()
    {
        return $this->belongsTo(OPDPatient::class);
    }
}
