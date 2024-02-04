<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BloodDonor;
use Illuminate\Support\Facades\DB; 

class BloodDonorController extends Controller
{
    public function index()
    {
        $blood_donor = BloodDonor::orderBy('created_at', 'DESC')->get(); 
        return view('blood-donor.index', compact('blood_donor')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $blood_donor = BloodDonor::find($id);  
        $blood_donor->delete();  
        toastr()->success('Blood Donor deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('blood-donor.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $blood_donor = new BloodDonor(); 
            $blood_donor->name = $request->name;
            $blood_donor->dob = $request->dob;
            $blood_donor->blood_group = $request->blood_group;
            $blood_donor->gender = $request->gender;
            $blood_donor->father_name = $request->father_name;
            $blood_donor->contact = $request->contact;
            $blood_donor->address = $request->address;
            $blood_donor->save();  
            DB::commit();
            toastr()->success('Blood Donor created successfully.');  
            return redirect('blood-donor');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $blood_donor = BloodDonor::find($id);  
        return view('blood-donor.update', compact('blood_donor'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $blood_donor = BloodDonor::find($id);   
            $blood_donor->name = $request->name;
            $blood_donor->dob = $request->dob;
            $blood_donor->blood_group = $request->blood_group;
            $blood_donor->gender = $request->gender;
            $blood_donor->father_name = $request->father_name;
            $blood_donor->contact = $request->contact;
            $blood_donor->address = $request->address; 
            $blood_donor->save();  
            DB::commit();
            toastr()->success('Blood Donor updated successfully.');    
            return redirect('blood-donor');      
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 
    
    public function getBloodDonorDetails(Request $request) { 
        $blood_donor = BloodDonor::find($request->donor_id);      
        return response()->json([    
            'blood_donor' => $blood_donor 
        ]);    
    }   
}
