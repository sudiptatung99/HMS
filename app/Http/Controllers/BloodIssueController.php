<?php

namespace App\Http\Controllers;

use App\Models\BloodBag;
use Illuminate\Http\Request;
use App\Models\BloodIssue;
use Illuminate\Support\Facades\DB;  

class BloodIssueController extends Controller
{
    public function index()
    {
        $blood_issue = BloodIssue::orderBy('created_at', 'DESC')->get(); 
        return view('blood-issue.index', compact('blood_issue')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $blood_issue = BloodIssue::find($id);         
        return view('blood-issue.show', compact('blood_issue'));             
    }  

    public function delete($id)
    {
        $id = decrypt($id);
        $blood_issue = BloodIssue::find($id);  
        $blood_bag = BloodBag::find($blood_issue->blood_bag_id);     
        $blood_bag->issue_status = '0';       
        $blood_bag->save();        
        $blood_issue->delete();  
        toastr()->success('Blood Issue deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('blood-issue.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $blood_issue = new BloodIssue(); 
            $blood_issue->patient_id = $request->patient_id; 
            $blood_issue->doctor_id = $request->doctor_id;
            $blood_issue->blood_bag_id = $request->blood_bag_id;
            $blood_issue->issue_date = $request->issue_date;
            $blood_issue->amount = $request->amount;
            $blood_issue->total = $request->total;
            $blood_issue->gst_percent = $request->gst_percent;
            $blood_issue->gst = $request->gst;
            $blood_issue->net_amount = $request->net_amount;
            $blood_issue->payment_mode = $request->payment_mode;
            $blood_issue->payment_amount = $request->payment_amount;
            $blood_issue->note = $request->note;
            $blood_issue->save();             
            $blood_bag = BloodBag::find($blood_issue->blood_bag_id);     
            $blood_bag->issue_status = '1';      
            $blood_bag->save();                     
            DB::commit();  
            toastr()->success('Blood Issue created successfully.');  
            return redirect('blood-issue');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $blood_issue = BloodIssue::find($id);  
        return view('blood-issue.update', compact('blood_issue'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $blood_issue = BloodIssue::find($id);   
            $blood_issue->patient_id = $request->patient_id; 
            $blood_issue->doctor_id = $request->doctor_id;
            $blood_issue->blood_bag_id = $request->blood_bag_id;
            $blood_issue->issue_date = $request->issue_date;
            $blood_issue->amount = $request->amount;
            $blood_issue->total = $request->total;
            $blood_issue->gst_percent = $request->gst_percent;
            $blood_issue->gst = $request->gst;
            $blood_issue->net_amount = $request->net_amount;
            $blood_issue->payment_mode = $request->payment_mode;
            $blood_issue->payment_amount = $request->payment_amount;
            $blood_issue->note = $request->note; 
            $blood_issue->save();  
            DB::commit();
            toastr()->success('Blood Issue updated successfully.');    
            return redirect('blood-issue');      
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
}
