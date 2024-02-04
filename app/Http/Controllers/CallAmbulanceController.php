<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CallAmbulance;
use Illuminate\Support\Facades\DB;  

class CallAmbulanceController extends Controller
{
    public function index()
    {
        $call_ambulance = CallAmbulance::orderBy('created_at', 'DESC')->get(); 
        return view('call-ambulance.index', compact('call_ambulance')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $call_ambulance = CallAmbulance::find($id);        
        return view('call-ambulance.show', compact('call_ambulance'));            
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $call_ambulance = CallAmbulance::find($id);  
        $call_ambulance->delete();  
        toastr()->success('Call Ambulance deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('call-ambulance.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction(); 
            $call_ambulance = new CallAmbulance();
            $call_ambulance->patient_id = $request->patient_id;
            $call_ambulance->ambulance_id = $request->ambulance_id;
            $call_ambulance->date = $request->date;
            $call_ambulance->note = $request->note;
            $call_ambulance->amount = $request->amount;
            $call_ambulance->total = $request->total;
            $call_ambulance->gst_percent = $request->gst_percent;
            $call_ambulance->gst = $request->gst; 
            $call_ambulance->net_amount = $request->net_amount; 
            $call_ambulance->payment_mode = $request->payment_mode; 
            $call_ambulance->payment_amount = $request->payment_amount;  
            $call_ambulance->save();  
            DB::commit();
            toastr()->success('Call Ambulance created successfully.');  
            return redirect('call-ambulance');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $call_ambulance = CallAmbulance::find($id);  
        return view('call-ambulance.update', compact('call_ambulance'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $call_ambulance = CallAmbulance::find($id);   
            $call_ambulance->patient_id = $request->patient_id;
            $call_ambulance->ambulance_id = $request->ambulance_id;
            $call_ambulance->date = $request->date;
            $call_ambulance->note = $request->note;
            $call_ambulance->amount = $request->amount;
            $call_ambulance->total = $request->total;
            $call_ambulance->gst_percent = $request->gst_percent;
            $call_ambulance->gst = $request->gst; 
            $call_ambulance->net_amount = $request->net_amount; 
            $call_ambulance->payment_mode = $request->payment_mode; 
            $call_ambulance->payment_amount = $request->payment_amount;   
            $call_ambulance->save();  
            DB::commit();
            toastr()->success('Call Ambulance updated successfully.');    
            return redirect('call-ambulance');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 
} 
 