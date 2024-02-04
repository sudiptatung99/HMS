<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PathologyBill; 
use App\Models\PathologyBillTest; 
use Illuminate\Support\Facades\DB;   

class PathologyBillController extends Controller
{
    public function index()
    {
        $pathology_bill = PathologyBill::orderBy('created_at', 'DESC')->get(); 
        return view('pathology-bill.index', compact('pathology_bill')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $pathology_bill = PathologyBill::find($id);  
        $pathology_test = PathologyBillTest::where('bill_id', $pathology_bill->id)->orderBy('created_at', 'DESC')->get();    
        return view('pathology-bill.show', compact('pathology_bill', 'pathology_test'));            
    }  

    public function delete($id)
    {
        $id = decrypt($id);
        $pathology_bill = PathologyBill::find($id);  
        $pathology_bill->delete();  
        toastr()->success('Pathology Bill deleted successfully.');    
        return back();    
    } 

    public function create() 
    {
        return view('pathology-bill.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction(); 
            $pathology_bill = new PathologyBill();
            $pathology_bill->bill_no = 'PAB' . rand(00000, 99999);      
            $pathology_bill->bill_date = $request->bill_date;
            $pathology_bill->patient_id = $request->patient_id;
            $pathology_bill->doctor_id = $request->doctor_id;
            $pathology_bill->total = $request->total;
            $pathology_bill->discount_percent = $request->discount_percent;
            $pathology_bill->discount = $request->discount;
            $pathology_bill->gst = $request->gst;
            $pathology_bill->net_amount = $request->net_amount;
            $pathology_bill->payment_mode = $request->payment_mode; 
            $pathology_bill->payment_amount = $request->payment_amount; 
            $pathology_bill->note = $request->note;  
            $pathology_bill->save();    
            DB::commit();
            for($i = 0; $i < count($request->test_id); $i++)
            {
                $pathology_test = new PathologyBillTest();  
                $pathology_test->bill_id = $pathology_bill->id;  
                $pathology_test->test_id = $request->test_id[$i];   
                $pathology_test->save();   
            }    
            toastr()->success('Pathology Bill created successfully.');  
            return redirect('pathology-bill');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $pathology_bill = PathologyBill::find($id);  
        $pathology_test = PathologyBillTest::where('bill_id', $pathology_bill->id)->orderBy('created_at', 'DESC')->get();    
        return view('pathology-bill.update', compact('pathology_bill', 'pathology_test'));        
    }  

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id); 
        try {
            DB::beginTransaction();
            $pathology_bill = PathologyBill::find($id);  
            $pathology_bill->bill_date = $request->bill_date;  
            $pathology_bill->patient_id = $request->patient_id;
            $pathology_bill->doctor_id = $request->doctor_id;
            $pathology_bill->total = $request->total;
            $pathology_bill->discount_percent = $request->discount_percent;
            $pathology_bill->discount = $request->discount;
            $pathology_bill->gst = $request->gst;
            $pathology_bill->net_amount = $request->net_amount;
            $pathology_bill->payment_mode = $request->payment_mode; 
            $pathology_bill->payment_amount = $request->payment_amount; 
            $pathology_bill->note = $request->note;   
            $pathology_bill->save();  
            $exist_pathology_test = PathologyBillTest::where('bill_id', $pathology_bill->id)->orderBy('created_at', 'DESC')->get();     
            foreach($exist_pathology_test as $exist_pathology_test)    
            {  
                PathologyBillTest::destroy($exist_pathology_test->id); 
            } 
            for($i = 0; $i < count($request->test_id); $i++)
            {
                $pathology_test = new PathologyBillTest();  
                $pathology_test->bill_id = $pathology_bill->id;  
                $pathology_test->test_id = $request->test_id[$i];   
                $pathology_test->save();   
            } 
            DB::commit(); 
            toastr()->success('Pathology Bill updated successfully.');    
            return redirect('pathology-bill');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
} 
