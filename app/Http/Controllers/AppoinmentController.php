<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appoinment; 
use Illuminate\Support\Facades\DB;   

class AppoinmentController extends Controller
{
    public function index()
    {
        $appoinment = Appoinment::orderBy('created_at', 'DESC')->get(); 
        return view('appoinment.index', compact('appoinment')); 
    } 

    public function assignToMe()
    { 
        $appoinment = Appoinment::where('doctor_id', \Auth::user()->id)->orderBy('created_at', 'DESC')->get();   
        return view('appoinment-assign.assign-to-me', compact('appoinment'));    
    }  

    public function assignByMe()
    { 
        $appoinment = Appoinment::where('assign_by_id', \Auth::user()->id)->orderBy('created_at', 'DESC')->get();    
        return view('appoinment-assign.assign-by-me', compact('appoinment'));  
    }

    public function assignByAll()
    { 
        return view('appoinment-assign.assign-by-all'); 
    }

    public function assignToDoctor() 
    {  
        return view('appoinment-assign.assign-to-doctor');    
    } 

    public function assignByRepresentative()
    { 
        return view('appoinment-assign.assign-by-representative');   
    }

    public function delete($id) 
    { 
        $id = decrypt($id);
        $appoinment = Appoinment::find($id);  
        $appoinment->delete();  
        toastr()->success('Appoinment deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('appoinment.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $appoinment = new Appoinment();
            $appoinment->patient_id = $request->patient_id;
            $appoinment->department_id = $request->department_id;
            $appoinment->doctor_id = $request->doctor_id;
            $appoinment->date = $request->date;
            $appoinment->appoinment_date = $request->appoinment_date;
            $appoinment->serial_no = $request->serial_no;
            $appoinment->problem = $request->problem;
            $appoinment->assign_by_id = \Auth::user()->id; 
            $appoinment->status = $request->status;  
            $appoinment->save();  
            DB::commit();
            toastr()->success('Appoinment created successfully.');  
            return redirect('appoinment');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $appoinment = Appoinment::find($id);  
        return view('appoinment.update', compact('appoinment'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $appoinment = Appoinment::find($id);   
            $appoinment->patient_id = $request->patient_id;
            $appoinment->department_id = $request->department_id;
            $appoinment->doctor_id = $request->doctor_id;
            $appoinment->date = $request->date;
            $appoinment->appoinment_date = $request->appoinment_date;
            $appoinment->serial_no = $request->serial_no;
            $appoinment->problem = $request->problem;
            $appoinment->status = $request->status;  
            $appoinment->save();  
            DB::commit();
            toastr()->success('Appoinment updated successfully.');   
            return redirect('appoinment');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }   
}
