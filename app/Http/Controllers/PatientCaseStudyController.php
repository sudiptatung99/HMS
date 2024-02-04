<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientCaseStudy; 
use Illuminate\Support\Facades\DB;     

class PatientCaseStudyController extends Controller
{
    public function index()
    {
        $patient_case_study = PatientCaseStudy::orderBy('created_at', 'DESC')->get(); 
        return view('patient-case-study.index', compact('patient_case_study')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $patient_case_study = PatientCaseStudy::find($id); 
        return view('patient-case-study.show', compact('patient_case_study'));        
    }     

    public function delete($id)
    {
        $id = decrypt($id);
        $patient_case_study = PatientCaseStudy::find($id);  
        $patient_case_study->delete();  
        toastr()->success('Patient Case Study deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('patient-case-study.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $patient_case_study = new PatientCaseStudy();
            $patient_case_study->patient_id = $request->patient_id;
            $patient_case_study->food_allergies = $request->food_allergies;
            $patient_case_study->tendency_bleed = $request->tendency_bleed;
            $patient_case_study->heart_disease = $request->heart_disease;
            $patient_case_study->high_blood_pressure = $request->high_blood_pressure;
            $patient_case_study->diabetic = $request->diabetic;
            $patient_case_study->surgery = $request->surgery;
            $patient_case_study->accident = $request->accident;
            $patient_case_study->others = $request->others;
            $patient_case_study->family_medical_history = $request->family_medical_history;
            $patient_case_study->current_medication = $request->current_medication;
            $patient_case_study->female_pregnancy = $request->female_pregnancy;
            $patient_case_study->breast_feeding = $request->breast_feeding;
            $patient_case_study->health_insurance = $request->health_insurance;
            $patient_case_study->low_income = $request->low_income;
            $patient_case_study->reference = $request->reference;
            $patient_case_study->status = $request->status; 
            $patient_case_study->save();    
            DB::commit();
            toastr()->success('Patient Case Study created successfully.');  
            return redirect('patient-case-study');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $patient_case_study = PatientCaseStudy::find($id);  
        return view('patient-case-study.update', compact('patient_case_study'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $patient_case_study = PatientCaseStudy::find($id);   
            $patient_case_study->patient_id = $request->patient_id;
            $patient_case_study->food_allergies = $request->food_allergies;
            $patient_case_study->tendency_bleed = $request->tendency_bleed;
            $patient_case_study->heart_disease = $request->heart_disease;
            $patient_case_study->high_blood_pressure = $request->high_blood_pressure;
            $patient_case_study->diabetic = $request->diabetic;
            $patient_case_study->surgery = $request->surgery;
            $patient_case_study->accident = $request->accident;
            $patient_case_study->others = $request->others;
            $patient_case_study->family_medical_history = $request->family_medical_history;
            $patient_case_study->current_medication = $request->current_medication;
            $patient_case_study->female_pregnancy = $request->female_pregnancy;
            $patient_case_study->breast_feeding = $request->breast_feeding;
            $patient_case_study->health_insurance = $request->health_insurance;
            $patient_case_study->low_income = $request->low_income;
            $patient_case_study->reference = $request->reference;
            $patient_case_study->status = $request->status;   
            $patient_case_study->save();  
            DB::commit();
            toastr()->success('Patient Case Study updated successfully.');    
            return redirect('patient-case-study');       
        } catch (\Exception $e) {  
            DB::rollBack();
            return $e->getMessage();
        }
    }  
}
