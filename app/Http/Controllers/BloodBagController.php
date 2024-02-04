<?php

namespace App\Http\Controllers;

use App\Models\BloodDonor;
use Illuminate\Http\Request;
use App\Models\BloodBag;
use Illuminate\Support\Facades\DB;    

class BloodBagController extends Controller
{ 
    public function delete($id)
    {
        $id = decrypt($id);
        $blood_bag = BloodBag::find($id);  
        $blood_donor = BloodDonor::find($blood_bag->donor_id);     
        $blood_donor->donate_status = '0';     
        $blood_donor->save();                
        $blood_bag->delete();  
        toastr()->success('Blood Bag deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('blood-bag.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $blood_bag = new BloodBag(); 
            $blood_bag->donor_id = $request->donor_id; 
            $blood_bag->blood_group = $request->blood_group;
            $blood_bag->donate_date = $request->donate_date;
            $blood_bag->bag = $request->bag;
            $blood_bag->volume = $request->volume;
            $blood_bag->unit_type = $request->unit_type;
            $blood_bag->lot = $request->lot;
            $blood_bag->note = $request->note;
            $blood_bag->save();   
            $blood_donor = BloodDonor::find($blood_bag->donor_id);     
            $blood_donor->donate_status = '1';     
            $blood_donor->save();                   
            DB::commit();
            toastr()->success('Blood Bag created successfully.');  
            return redirect('blood-bank');    
        } catch (\Exception $e) {  
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $blood_bag = BloodBag::find($id);  
        return view('blood-bag.update', compact('blood_bag'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $blood_bag = BloodBag::find($id);   
            $blood_bag->donor_id = $request->donor_id; 
            $blood_bag->blood_group = $request->blood_group; 
            $blood_bag->donate_date = $request->donate_date;
            $blood_bag->bag = $request->bag;
            $blood_bag->volume = $request->volume;
            $blood_bag->unit_type = $request->unit_type;
            $blood_bag->lot = $request->lot;
            $blood_bag->note = $request->note;  
            $blood_bag->save();  
            DB::commit();
            toastr()->success('Blood Bag updated successfully.');    
            return redirect('blood-bank');      
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }  
    } 

    public function getBloodBagList(Request $request) { 
        $blood_bag = BloodBag::where('blood_group', $request->blood_group)->where('issue_status', '0')->orderBy('created_at', 'DESC')->get();       
        return response()->json([    
            'blood_bag' => $blood_bag 
        ]);     
    }  
} 
 