<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use App\Models\PrescriptionDiagnosis;
use Illuminate\Support\Facades\DB;   

class PrescriptionController extends Controller
{
    public function index()
    {
        $prescription = Prescription::orderBy('created_at', 'DESC')->get(); 
        return view('prescription.index', compact('prescription')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $prescription = Prescription::find($id);   
        $prescription_medicine = PrescriptionMedicine::where('prescription_id', $prescription->id)->orderBy('created_at', 'DESC')->get();  
        $prescription_diagnosis = PrescriptionDiagnosis::where('prescription_id', $prescription->id)->orderBy('created_at', 'DESC')->get();    
        return view('prescription.show', compact('prescription', 'prescription_medicine', 'prescription_diagnosis'));          
    }      

    public function delete($id)
    {
        $id = decrypt($id);
        $prescription = Prescription::find($id);  
        $prescription->delete();  
        toastr()->success('Prescription deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('prescription.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $prescription = new Prescription(); 
            $prescription->patient_id = $request->patient_id;
            $prescription->doctor_id = \Auth::user()->id;  
            $prescription->weight = $request->weight;
            $prescription->blood_pressure = $request->blood_pressure;
            $prescription->date = $request->date;
            $prescription->reference = $request->reference;
            $prescription->visiting_fees = $request->visiting_fees;
            $prescription->patient_notes = $request->patient_notes;
            $prescription->prescription_type = $request->prescription_type; 
            $prescription->save();              
            for($i = 0; $i < count($request->medicine_name); $i++)
            {
                $prescription_medicine = new PrescriptionMedicine();
                $prescription_medicine->prescription_id = $prescription->id;  
                $prescription_medicine->name = $request->medicine_name[$i]; 
                $prescription_medicine->type = $request->medicine_type[$i]; 
                $prescription_medicine->instruction = $request->medicine_instruction[$i];   
                $prescription_medicine->days = $request->medicine_days[$i];    
                $prescription_medicine->save();      
            }   
            if(!empty($request->diagnosis_name[0]))   
            {  
                for($i = 0; $i < count($request->diagnosis_name); $i++)
                {
                    $prescription_diagnosis = new PrescriptionDiagnosis(); 
                    $prescription_diagnosis->prescription_id = $prescription->id;  
                    $prescription_diagnosis->name = $request->diagnosis_name[$i]; 
                    $prescription_diagnosis->instruction = $request->diagnosis_instruction[$i];     
                    $prescription_diagnosis->save();      
                }        
            }         
            DB::commit();
            toastr()->success('Prescription created successfully.');  
            return redirect('prescription');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $prescription = Prescription::find($id);   
        $prescription_medicine = PrescriptionMedicine::where('prescription_id', $prescription->id)->orderBy('created_at', 'DESC')->get();  
        $prescription_diagnosis = PrescriptionDiagnosis::where('prescription_id', $prescription->id)->orderBy('created_at', 'DESC')->get();  
        return view('prescription.update', compact('prescription', 'prescription_medicine', 'prescription_diagnosis'));       
    }  

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $prescription = Prescription::find($id);   
            $prescription->patient_id = $request->patient_id;
            $prescription->doctor_id = \Auth::user()->id; 
            $prescription->weight = $request->weight;
            $prescription->blood_pressure = $request->blood_pressure;
            $prescription->date = $request->date;
            $prescription->reference = $request->reference;
            $prescription->visiting_fees = $request->visiting_fees;
            $prescription->patient_notes = $request->patient_notes;
            $prescription->prescription_type = $request->prescription_type;  
            $prescription->save();  

            $prescription_medicine = PrescriptionMedicine::where('prescription_id', $prescription->id)->orderBy('created_at', 'DESC')->get();  
            $prescription_diagnosis = PrescriptionDiagnosis::where('prescription_id', $prescription->id)->orderBy('created_at', 'DESC')->get();   
            foreach($prescription_medicine as $prescription_medicine)
            {
                PrescriptionMedicine::destroy($prescription_medicine->id); 
            } 
            if(count($prescription_diagnosis) > 0)
            {
                foreach($prescription_diagnosis as $prescription_diagnosis)
                {
                    PrescriptionDiagnosis::destroy($prescription_diagnosis->id); 
                }
            }
            for($i = 0; $i < count($request->medicine_name); $i++)
            {
                $prescription_medicine = new PrescriptionMedicine();
                $prescription_medicine->prescription_id = $prescription->id;  
                $prescription_medicine->name = $request->medicine_name[$i]; 
                $prescription_medicine->type = $request->medicine_type[$i]; 
                $prescription_medicine->instruction = $request->medicine_instruction[$i];   
                $prescription_medicine->days = $request->medicine_days[$i];    
                $prescription_medicine->save();      
            }   
            if(!empty($request->diagnosis_name[0]))   
            { 
                for($i = 0; $i < count($request->diagnosis_name); $i++)
                {
                    $prescription_diagnosis = new PrescriptionDiagnosis(); 
                    $prescription_diagnosis->prescription_id = $prescription->id;  
                    $prescription_diagnosis->name = $request->diagnosis_name[$i]; 
                    $prescription_diagnosis->instruction = $request->diagnosis_instruction[$i];     
                    $prescription_diagnosis->save();      
                }        
            }  
            DB::commit();
            toastr()->success('Prescription updated successfully.');    
            return redirect('prescription');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }   
}
