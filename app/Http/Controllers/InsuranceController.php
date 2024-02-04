<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Insurance; 
use App\Models\InsuranceDisease; 
use App\Models\InsuranceApprovalCharge;  
use Illuminate\Support\Facades\DB;   

class InsuranceController extends Controller
{
    public function index()
    {
        $insurance = Insurance::orderBy('created_at', 'DESC')->get(); 
        return view('insurance.index', compact('insurance')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $insurance = Insurance::find($id);  
        $insurance_disease = InsuranceDisease::where('insurance_id', $insurance->id)->orderBy('created_at', 'DESC')->get();   
        $insurance_approval_charge = InsuranceApprovalCharge::where('insurance_id', $insurance->id)->orderBy('created_at', 'DESC')->get();       
        return view('insurance.show', compact('insurance', 'insurance_disease', 'insurance_approval_charge'));           
    }    

    public function delete($id)
    {
        $id = decrypt($id);
        $insurance = Insurance::find($id);  
        $insurance->delete();  
        toastr()->success('Insurance deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('insurance.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $insurance = new Insurance();
            $insurance->patient_id = $request->patient_id;  
            $insurance->consultant_name = $request->consultant_name; 
            $insurance->policy_name = $request->policy_name; 
            $insurance->policy_no = $request->policy_no; 
            $insurance->policy_holder_name = $request->policy_holder_name; 
            $insurance->insurance_name = $request->insurance_name; 
            $insurance->total = $request->total; 
            $insurance->status = $request->status;
            $insurance->save();   
            for($i = 0; $i < count($request->insurance_disease_name); $i++) 
            { 
                $insurance_disease = new InsuranceDisease(); 
                $insurance_disease->insurance_id = $insurance->id;  
                $insurance_disease->name = $request->insurance_disease_name[$i];   
                $insurance_disease->details = $request->insurance_disease_details[$i];   
                $insurance_disease->save();     
            } 
            for($i = 0; $i < count($request->insurance_disease_charge_name); $i++) 
            {  
                $insurance_approval_charge = new InsuranceApprovalCharge();  
                $insurance_approval_charge->insurance_id = $insurance->id;  
                $insurance_approval_charge->name = $request->insurance_disease_charge_name[$i];  
                $insurance_approval_charge->charge = $request->insurance_disease_charge[$i];    
                $insurance_approval_charge->save();      
            }       
            DB::commit();  
            toastr()->success('Insurance created successfully.');  
            return redirect('insurance');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $insurance = Insurance::find($id);  
        $insurance_disease = InsuranceDisease::where('insurance_id', $insurance->id)->orderBy('created_at', 'DESC')->get();   
        $insurance_approval_charge = InsuranceApprovalCharge::where('insurance_id', $insurance->id)->orderBy('created_at', 'DESC')->get();    
        return view('insurance.update', compact('insurance', 'insurance_disease', 'insurance_approval_charge'));        
    }     

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $insurance = Insurance::find($id);   
            $insurance->patient_id = $request->patient_id;  
            $insurance->consultant_name = $request->consultant_name; 
            $insurance->policy_name = $request->policy_name; 
            $insurance->policy_no = $request->policy_no; 
            $insurance->policy_holder_name = $request->policy_holder_name; 
            $insurance->insurance_name = $request->insurance_name; 
            $insurance->total = $request->total; 
            $insurance->status = $request->status; 
            $insurance->save();    
            $exist_insurance_disease = InsuranceDisease::where('insurance_id', $insurance->id)->orderBy('created_at', 'DESC')->get();   
            foreach($exist_insurance_disease as $exist_insurance_disease)
            {
                InsuranceDisease::destroy($exist_insurance_disease->id); 
            }  
            $exist_insurance_approval_charge = InsuranceApprovalCharge::where('insurance_id', $insurance->id)->orderBy('created_at', 'DESC')->get();   
            foreach($exist_insurance_approval_charge as $exist_insurance_approval_charge)
            {
                InsuranceApprovalCharge::destroy($exist_insurance_approval_charge->id);   
            }       
            for($i = 0; $i < count($request->insurance_disease_name); $i++) 
            { 
                $insurance_disease = new InsuranceDisease(); 
                $insurance_disease->insurance_id = $insurance->id;  
                $insurance_disease->name = $request->insurance_disease_name[$i];   
                $insurance_disease->details = $request->insurance_disease_details[$i];   
                $insurance_disease->save();     
            }  
            for($i = 0; $i < count($request->insurance_disease_charge_name); $i++) 
            {  
                $insurance_approval_charge = new InsuranceApprovalCharge();  
                $insurance_approval_charge->insurance_id = $insurance->id;  
                $insurance_approval_charge->name = $request->insurance_disease_charge_name[$i];  
                $insurance_approval_charge->charge = $request->insurance_disease_charge[$i];    
                $insurance_approval_charge->save();       
            }             
            DB::commit();
            toastr()->success('Insurance updated successfully.');    
            return redirect('insurance');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }    
}
