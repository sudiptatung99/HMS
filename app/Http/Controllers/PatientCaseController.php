<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientCase; 
use Illuminate\Support\Facades\DB;   

class PatientCaseController extends Controller
{
    public function index()
    {
        $patient_case = PatientCase::orderBy('created_at', 'DESC')->get(); 
        return view('patient-case.index', compact('patient_case')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $patient_case = PatientCase::find($id);  
        $patient_case->delete();  
        toastr()->success('Patient Case deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('patient-case.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $patient_case = new PatientCase(); 
            $patient_case->patient_id = $request->patient_id; 
            $patient_case->case_manager = $request->case_manager;
            $patient_case->doctor_id = $request->doctor_id;
            $patient_case->hospital_name = $request->hospital_name;
            $patient_case->hospital_address = $request->hospital_address;
            $patient_case->doctor_name = $request->doctor_name;
            $patient_case->status = $request->status;
            $patient_case->save();  
            DB::commit();
            toastr()->success('Patient Case created successfully.');  
            return redirect('patient-case');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $patient_case = PatientCase::find($id);  
        return view('patient-case.update', compact('patient_case'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $patient_case = PatientCase::find($id);   
            $patient_case->patient_id = $request->patient_id; 
            $patient_case->case_manager = $request->case_manager;
            $patient_case->doctor_id = $request->doctor_id;
            $patient_case->hospital_name = $request->hospital_name;
            $patient_case->hospital_address = $request->hospital_address;
            $patient_case->doctor_name = $request->doctor_name;
            $patient_case->status = $request->status; 
            $patient_case->save();   
            DB::commit();
            toastr()->success('Patient Case updated successfully.');    
            return redirect('patient-case');       
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
}
