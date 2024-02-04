<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'expense', 'pay_to_whom', 'amount', 'payment_mode', 'image', 'details'];    
} 
