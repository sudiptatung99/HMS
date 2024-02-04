<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MicrobiologyTest extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'short_name', 'category_id', 'method', 'amount', 'gst_percent', 'gst', 'total'];

    public function category()
    {
        return $this->belongsTo(MicrobiologyCategory::class, 'category_id', 'id');
    }
}
