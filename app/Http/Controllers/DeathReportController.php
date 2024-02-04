<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeathReport;
use Illuminate\Support\Facades\DB;   
 
class DeathReportController extends Controller
{
    public function index()
    {
        $death_report = DeathReport::orderBy('created_at', 'DESC')->get(); 
        return view('death-report.index', compact('death_report')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $death_report = DeathReport::find($id);  
        $death_report->delete();  
        toastr()->success('Death Report deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('death-report.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $death_report = new DeathReport();
            $death_report->patient_id = $request->patient_id;  
            $death_report->date_of_death = $request->date_of_death;
            $death_report->place_of_death = $request->place_of_death; 
            $death_report->deceased_address = $request->deceased_address;
            $death_report->deceased_permanent_address = $request->deceased_permanent_address;
            $death_report->doctor_id = $request->doctor_id; 
            $death_report->save();  
            DB::commit();
            toastr()->success('Death Report created successfully.');  
            return redirect('death-report');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $death_report = DeathReport::find($id);  
        return view('death-report.update', compact('death_report'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $death_report = DeathReport::find($id);   
            $death_report->patient_id = $request->patient_id;  
            $death_report->date_of_death = $request->date_of_death;
            $death_report->place_of_death = $request->place_of_death; 
            $death_report->deceased_address = $request->deceased_address;
            $death_report->deceased_permanent_address = $request->deceased_permanent_address;
            $death_report->doctor_id = $request->doctor_id;  
            $death_report->save();  
            DB::commit();
            toastr()->success('Death Report updated successfully.');    
            return redirect('death-report');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }   
}
