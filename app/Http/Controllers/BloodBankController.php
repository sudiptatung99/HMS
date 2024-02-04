<?php

namespace App\Http\Controllers;

use App\Models\BloodGroup;
use App\Models\BloodBag;
use Illuminate\Http\Request;

class BloodBankController extends Controller
{
    public function index()
    { 
        $blood_group = BloodGroup::get();  
        $blood_bag = BloodBag::where('issue_status', '0')->orderBy('created_at', 'DESC')->get();   
        for($i = 0; $i < count($blood_group); $i++)
        {
            for($j = 0; $j < count($blood_bag); $j++) 
            {
                if($blood_group[$i]->name == $blood_bag[$j]->blood_group)
                {
                    $blood_group[$i]->total_bag ++;  
                } 
            }
        }
        return view('blood-bank.index', compact('blood_group', 'blood_bag'));    
    }      
}   
