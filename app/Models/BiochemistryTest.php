<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiochemistryTest extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'short_name', 'category_id', 'method', 'amount', 'gst_percent', 'gst', 'total'];

    public function category()
    {
        return $this->belongsTo(BiochemistryCategory::class, 'category_id', 'id');
    }
}
