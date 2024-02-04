<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PatientDocument;   
use Illuminate\Support\Facades\DB; 
 
class PatientDocumentController extends Controller
{
    public function delete($id) 
    { 
        $id = decrypt($id);
        $nurse = PatientDocument::find($id);  
        $nurse->delete();  
        toastr()->success('Patient Document deleted successfully.');    
        return back();    
    } 
  
    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $patient_document = new PatientDocument();
            $patient_document->patient_id = decrypt($request->patient_id);  
            if($request->hasfile('document'))      
            {
                $file = $request->file('document');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/patient-document/'), $filename);   
                $patient_document->document = '/uploads/patient-document/'.$filename;           
            }      
            $patient_document->name = $request->name;
            $patient_document->details = $request->details; 
            $patient_document->save();  
            DB::commit();
            toastr()->success('Patient Document created successfully.');  
            return redirect()->back();       
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 
 
    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $patient_document = PatientDocument::find($id);     
            if($request->hasfile('document'))      
            {
                $file = $request->file('document');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/patient-document/'), $filename);   
                $patient_document->document = '/uploads/patient-document/'.$filename;           
            }      
            $patient_document->name = $request->name;
            $patient_document->details = $request->details; 
            $patient_document->save();   
            DB::commit();
            toastr()->success('Patient Document updated successfully.');    
            return redirect()->back();         
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage(); 
        }
    }  
}
  