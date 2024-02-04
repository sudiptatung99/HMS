<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BirthReport;
use Illuminate\Support\Facades\DB;  

class BirthReportController extends Controller
{
    public function index()
    {
        $birth_report = BirthReport::orderBy('created_at', 'DESC')->get(); 
        return view('birth-report.index', compact('birth_report')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $birth_report = BirthReport::find($id);  
        $birth_report->delete();  
        toastr()->success('Birth Report deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('birth-report.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $birth_report = new BirthReport();
            $birth_report->patient_id = $request->patient_id; 
            $birth_report->date = $request->date;
            $birth_report->time = $request->time;
            $birth_report->weight = $request->weight; 
            $birth_report->doctor_id = $request->doctor_id;
            $birth_report->description = $request->description; 
            $birth_report->save();  
            DB::commit();
            toastr()->success('Birth Report created successfully.');  
            return redirect('birth-report');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $birth_report = BirthReport::find($id);  
        return view('birth-report.update', compact('birth_report'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $birth_report = BirthReport::find($id);   
            $birth_report->patient_id = $request->patient_id; 
            $birth_report->date = $request->date;
            $birth_report->time = $request->time;
            $birth_report->weight = $request->weight; 
            $birth_report->doctor_id = $request->doctor_id;
            $birth_report->description = $request->description;  
            $birth_report->save();   
            DB::commit();
            toastr()->success('Birth Report updated successfully.');     
            return redirect('birth-report');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
}
