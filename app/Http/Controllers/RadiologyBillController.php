<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RadiologyBill; 
use App\Models\RadiologyBillTest; 
use Illuminate\Support\Facades\DB;   

class RadiologyBillController extends Controller
{
    public function index()
    {
        $radiology_bill = RadiologyBill::orderBy('created_at', 'DESC')->get(); 
        return view('radiology-bill.index', compact('radiology_bill')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $radiology_bill = RadiologyBill::find($id);  
        $radiology_test = RadiologyBillTest::where('bill_id', $radiology_bill->id)->orderBy('created_at', 'DESC')->get();    
        return view('radiology-bill.show', compact('radiology_bill', 'radiology_test'));             
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $radiology_bill = RadiologyBill::find($id);  
        $radiology_bill->delete();  
        toastr()->success('Radiology Bill deleted successfully.');    
        return back();    
    } 

    public function create() 
    {
        return view('radiology-bill.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction(); 
            $radiology_bill = new RadiologyBill();
            $radiology_bill->bill_no = 'RAB' . rand(00000, 99999);       
            $radiology_bill->bill_date = $request->bill_date;
            $radiology_bill->patient_id = $request->patient_id;
            $radiology_bill->doctor_id = $request->doctor_id;
            $radiology_bill->total = $request->total;
            $radiology_bill->discount_percent = $request->discount_percent;
            $radiology_bill->discount = $request->discount;
            $radiology_bill->gst = $request->gst;
            $radiology_bill->net_amount = $request->net_amount;
            $radiology_bill->payment_mode = $request->payment_mode; 
            $radiology_bill->payment_amount = $request->payment_amount; 
            $radiology_bill->note = $request->note;  
            $radiology_bill->save();    
            DB::commit();
            for($i = 0; $i < count($request->test_id); $i++)
            {
                $radiology_test = new RadiologyBillTest();  
                $radiology_test->bill_id = $radiology_bill->id;  
                $radiology_test->test_id = $request->test_id[$i];   
                $radiology_test->save();   
            }    
            toastr()->success('Radiology Bill created successfully.');  
            return redirect('radiology-bill');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        } 
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $radiology_bill = RadiologyBill::find($id);  
        $radiology_test = RadiologyBillTest::where('bill_id', $radiology_bill->id)->orderBy('created_at', 'DESC')->get();    
        return view('radiology-bill.update', compact('radiology_bill', 'radiology_test'));        
    }  

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id); 
        try {
            DB::beginTransaction();
            $radiology_bill = RadiologyBill::find($id);  
            $radiology_bill->bill_date = $request->bill_date;  
            $radiology_bill->patient_id = $request->patient_id;
            $radiology_bill->doctor_id = $request->doctor_id;
            $radiology_bill->total = $request->total;
            $radiology_bill->discount_percent = $request->discount_percent;
            $radiology_bill->discount = $request->discount;
            $radiology_bill->gst = $request->gst;
            $radiology_bill->net_amount = $request->net_amount;
            $radiology_bill->payment_mode = $request->payment_mode; 
            $radiology_bill->payment_amount = $request->payment_amount; 
            $radiology_bill->note = $request->note;   
            $radiology_bill->save();  
            $exist_radiology_test = RadiologyBillTest::where('bill_id', $radiology_bill->id)->orderBy('created_at', 'DESC')->get();     
            foreach($exist_radiology_test as $exist_radiology_test)    
            {  
                RadiologyBillTest::destroy($exist_radiology_test->id); 
            } 
            for($i = 0; $i < count($request->test_id); $i++)
            {
                $radiology_test = new RadiologyBillTest();  
                $radiology_test->bill_id = $radiology_bill->id;  
                $radiology_test->test_id = $request->test_id[$i];   
                $radiology_test->save();   
            } 
            DB::commit(); 
            toastr()->success('Radiology Bill updated successfully.');    
            return redirect('radiology-bill');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
} 
 