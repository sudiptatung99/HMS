<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientOperation extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'doctor_id',
        'operation_id',
        'patient_id',
        'operation_date',
        'assistant_consultant_one',
        'assistant_consultant_two',
        'anesthetist',
        'anesthesia_type',
        'ot_technician',
        'ot_assistant',
        'remark',
        'result',
    ];

    public function category()
    {
        return $this->belongsTo(OperationCategory::class);
    }
    public function doctor()
    {
        return $this->belongsTo(User::class);
    }
    public function operation()
    {
        return $this->belongsTo(Operation::class);
    }
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
