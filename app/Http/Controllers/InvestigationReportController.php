<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InvestigationReport; 
use Illuminate\Support\Facades\DB;   
 
class InvestigationReportController extends Controller
{
    public function index()
    {
        $investigation_report = InvestigationReport::orderBy('created_at', 'DESC')->get(); 
        return view('investigation-report.index', compact('investigation_report')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $investigation_report = InvestigationReport::find($id);  
        $investigation_report->delete();  
        toastr()->success('Investigation Report deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('investigation-report.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $investigation_report = new InvestigationReport();
            $investigation_report->patient_id = $request->patient_id;
            $investigation_report->date = $request->date;
            $investigation_report->title = $request->title;
            $investigation_report->description = $request->description;
            $investigation_report->doctor_id = $request->doctor_id;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/investigation-image/'), $filename);   
                $investigation_report->image = '/uploads/investigation-image/'.$filename;        
            } 
            $investigation_report->status = $request->status;
            $investigation_report->save();  
            DB::commit();
            toastr()->success('Investigation Report created successfully.');  
            return redirect('investigation-report');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $investigation_report = InvestigationReport::find($id);  
        return view('investigation-report.update', compact('investigation_report'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $investigation_report = InvestigationReport::find($id);    
            $investigation_report->patient_id = $request->patient_id;
            $investigation_report->date = $request->date;
            $investigation_report->title = $request->title;
            $investigation_report->description = $request->description;
            $investigation_report->doctor_id = $request->doctor_id;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/investigation-image/'), $filename);   
                $investigation_report->image = '/uploads/investigation-image/'.$filename;        
            } 
            $investigation_report->status = $request->status; 
            $investigation_report->save();  
            DB::commit();
            toastr()->success('Investigation Report updated successfully.');    
            return redirect('investigation-report');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 
}
