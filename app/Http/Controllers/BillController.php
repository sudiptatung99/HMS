<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function index()
    {
        $bill = Bill::orderBy('created_at', 'DESC')->get(); 
        return view('bill.index', compact('bill')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $bill = Bill::find($id);    
        return view('bill.show', compact('bill'));             
    }  

    public function completeBill()
    { 
        $bill = Bill::where('payment_status', 'Paid')->orderBy('created_at', 'DESC')->get();  
        return view('bill.complete-bill', compact('bill'));   
    }  

    public function delete($id)
    {
        $id = decrypt($id);
        $bill = Bill::find($id);  
        $bill->delete();  
        toastr()->success('Bill deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('bill.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $bill = new Bill();
            $bill->bill_no = 'BIL' . rand(00000, 99999);   
            $bill->bill_date = $request->bill_date;
            $bill->patient_id = $request->patient_id;
            $bill->package_charge = $request->package_charge;
            $bill->service_charge = $request->service_charge;
            $bill->bed_charge = $request->bed_charge;
            $bill->total = $request->total;
            $bill->discount_percent = $request->discount_percent;
            $bill->discount = $request->discount;
            $bill->gst_percent = $request->gst_percent;
            $bill->gst = $request->gst;
            $bill->advance_paid = $request->advance_paid;
            $bill->insurance = $request->insurance;
            $bill->payable = $request->payable; 
            $bill->note = $request->note;
            $bill->payment_mode = $request->payment_mode;
            $bill->payment_status = $request->payment_status;  
            $bill->save();  
            DB::commit();
            toastr()->success('Bill created successfully.');  
            return redirect('bill');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $bill = Bill::find($id);  
        if($bill->discount == null)
        {
            $bill->discount = 0; 
        }   
        return view('bill.update', compact('bill'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $bill = Bill::find($id); 
            $bill->bill_date = $request->bill_date;    
            $bill->patient_id = $request->patient_id;
            $bill->package_charge = $request->package_charge;
            $bill->service_charge = $request->service_charge;
            $bill->bed_charge = $request->bed_charge;
            $bill->total = $request->total;
            $bill->discount_percent = $request->discount_percent;
            $bill->discount = $request->discount;
            $bill->gst_percent = $request->gst_percent;
            $bill->gst = $request->gst;
            $bill->advance_paid = $request->advance_paid;
            $bill->insurance = $request->insurance; 
            $bill->payable = $request->payable;
            $bill->note = $request->note;
            $bill->payment_mode = $request->payment_mode;
            $bill->payment_status = $request->payment_status;  
            $bill->save();  
            DB::commit();
            toastr()->success('Bill updated successfully.');    
            return redirect('bill');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
}
