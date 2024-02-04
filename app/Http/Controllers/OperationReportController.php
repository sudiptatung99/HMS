<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OperationReport;
use App\Models\User; 
use Illuminate\Support\Facades\DB; 
 
class OperationReportController extends Controller
{
    public function index()
    {
        $operation_report = OperationReport::orderBy('created_at', 'DESC')->get(); 
        return view('operation-report.index', compact('operation_report')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $operation_report = OperationReport::find($id);  
        $surgeon = User::findMany(json_decode($operation_report->surgeon));                
        $assistant = User::findMany(json_decode($operation_report->assistant));                
        return view('operation-report.show', compact('operation_report', 'surgeon', 'assistant'));              
    }   

    public function delete($id)
    {
        $id = decrypt($id);
        $operation_report = OperationReport::find($id);  
        $operation_report->delete();  
        toastr()->success('Operation Report deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('operation-report.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $operation_report = new OperationReport();
            $operation_report->patient_id = $request->patient_id;
            $operation_report->date_of_operation = $request->date_of_operation;
            $operation_report->preoperative_diagnosis = $request->preoperative_diagnosis;
            $operation_report->procedure = $request->procedure;
            $operation_report->surgeon = json_encode($request->surgeon); 
            $operation_report->assistant = json_encode($request->assistant);  
            $operation_report->anesthesia = $request->anesthesia;  
            $operation_report->anesthesiologist = $request->anesthesiologist;
            $operation_report->description = $request->description;
            $operation_report->save();  
            DB::commit();
            toastr()->success('Operation Report created successfully.');  
            return redirect('operation-report');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $operation_report = OperationReport::find($id);  
        $doctor = User::whereHas('roles', function($q) { $q->where('name', 'Doctor'); })->orderBy('created_at', 'DESC')->get();          
        return view('operation-report.update', compact('operation_report', 'doctor'));        
    }  

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $operation_report = OperationReport::find($id);   
            $operation_report->patient_id = $request->patient_id;
            $operation_report->date_of_operation = $request->date_of_operation; 
            $operation_report->preoperative_diagnosis = $request->preoperative_diagnosis; 
            $operation_report->procedure = $request->procedure; 
            $operation_report->surgeon = json_encode($request->surgeon); 
            $operation_report->assistant = json_encode($request->assistant);   
            $operation_report->anesthesia = $request->anesthesia;
            $operation_report->anesthesiologist = $request->anesthesiologist;
            $operation_report->description = $request->description; 
            $operation_report->save();  
            DB::commit();
            toastr()->success('Operation Report updated successfully.');   
            return redirect('operation-report');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }   
}
