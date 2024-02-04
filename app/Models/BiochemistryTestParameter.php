<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiochemistryTestParameter extends Model
{
    use HasFactory;

    protected $fillable = ['parameter_id', 'test_id'];

    public function parameter()
    {
        return $this->belongsTo(BiochemistryParameter::class, 'parameter_id', 'id');
    }

    public function test()
    {
        return $this->belongsTo(BiochemistryTest::class, 'test_id', 'id');
    }

}
