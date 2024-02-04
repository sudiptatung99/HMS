<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageService extends Model
{
    use HasFactory;

    protected $fillable = ['package_id', 'service_id', 'quantity'];   
     
    public function package() 
    {
        return $this->belongsTo(Package::class, 'package_id', 'id');   
    }    

    public function service() 
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');   
    } 
}
