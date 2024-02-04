<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;  

class ScheduleController extends Controller
{
    public function index()
    {
        $schedule = Schedule::orderBy('created_at', 'DESC')->get(); 
        return view('schedule.index', compact('schedule'));  
    }  

    public function delete($id)
    {
        $id = decrypt($id);
        $schedule = Schedule::find($id);  
        $schedule->delete();  
        toastr()->success('Schedule deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('schedule.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $schedule = new Schedule();
            $schedule->slot_id = $request->slot_id; 
            $schedule->doctor_id = $request->doctor_id;
            $schedule->available_days = $request->available_days;
            $schedule->available_start_time = $request->available_start_time;
            $schedule->available_end_time = $request->available_end_time;
            $schedule->per_patient_time = $request->per_patient_time;
            $schedule->status = $request->status; 
            $schedule->save();   
            DB::commit();
            toastr()->success('Schedule created successfully.');  
            return redirect('schedule');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $schedule = Schedule::find($id);  
        return view('schedule.update', compact('schedule'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $schedule = Schedule::find($id);   
            $schedule->slot_id = $request->slot_id; 
            $schedule->doctor_id = $request->doctor_id;
            $schedule->available_days = $request->available_days;
            $schedule->available_start_time = $request->available_start_time;
            $schedule->available_end_time = $request->available_end_time;
            $schedule->per_patient_time = $request->per_patient_time;
            $schedule->status = $request->status;  
            $schedule->save();   
            DB::commit();
            toastr()->success('Schedule updated successfully.');    
            return redirect('schedule');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }   
} 
