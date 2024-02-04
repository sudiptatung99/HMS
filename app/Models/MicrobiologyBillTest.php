<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicrobiologyBillTest extends Model
{
    use HasFactory;

    protected $fillable = ['bill_id', 'test_id'];

    public function bill()
    {
        return $this->belongsTo(MicrobiologyBill::class, 'bill_id', 'id');
    }

    public function test()
    {
        return $this->belongsTo(MicrobiologyTest::class, 'test_id', 'id');
    }
}
