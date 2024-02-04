<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PurchaseMedicine; 
use App\Models\PurchaseMedicineList;  
use Illuminate\Support\Facades\DB; 
  
class PurchaseMedicineController extends Controller
{
    public function index()
    {
        $purchase_medicine = PurchaseMedicine::orderBy('created_at', 'DESC')->get(); 
        return view('purchase-medicine.index', compact('purchase_medicine'));   
    }    

    public function show($id)  
    {   
        $id = decrypt($id);
        $purchase_medicine = PurchaseMedicine::find($id);  
        $purchase_medicine_list = PurchaseMedicineList::where('purchase_medicine_id', $purchase_medicine->id)->orderBy('created_at', 'DESC')->get();      
        return view('purchase-medicine.show', compact('purchase_medicine', 'purchase_medicine_list'));           
    }    

    public function delete($id)
    {
        $id = decrypt($id);
        $purchase_medicine = PurchaseMedicine::find($id);  
        $purchase_medicine->delete();  
        toastr()->success('Purchase Medicine deleted successfully.');      
        return back();      
    } 

    public function create()
    {
        return view('purchase-medicine.create');     
    }      

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $purchase_medicine = new PurchaseMedicine(); 
            $purchase_medicine->date = $request->date;  
            $purchase_medicine->invoice_id = $request->invoice_id; 
            $purchase_medicine->manufacturer = $request->manufacturer; 
            $purchase_medicine->sub_total = $request->sub_total;  
            $purchase_medicine->discount = $request->discount;
            $purchase_medicine->gst = $request->gst;
            $purchase_medicine->total = $request->total; 
            $purchase_medicine->payment_mode = $request->payment_mode;   
            $purchase_medicine->payment_amount = $request->payment_amount;    
            $purchase_medicine->save();      
            for($i = 0; $i < count($request->medicine_name); $i++) 
            { 
                $purchase_medicine_list = new PurchaseMedicineList();    
                $purchase_medicine_list->purchase_medicine_id = $purchase_medicine->id;  
                $purchase_medicine_list->name = $request->medicine_name[$i]; 
                $purchase_medicine_list->batch = $request->medicine_batch[$i];  
                $purchase_medicine_list->expiry_date = $request->medicine_expiry_date[$i];   
                $purchase_medicine_list->mrp_per_unit = $request->medicine_mrp_per_unit[$i];   
                $purchase_medicine_list->quantity = $request->medicine_quantity[$i];   
                $purchase_medicine_list->sub_total = $request->medicine_sub_total[$i];   
                $purchase_medicine_list->discount = $request->medicine_discount[$i];   
                $purchase_medicine_list->total = $request->medicine_total[$i];    
                $purchase_medicine_list->save();           
            }     
            DB::commit();
            toastr()->success('Purchase Medicine created successfully.');    
            return redirect('purchase-medicine');      
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  

    public function update($id) 
    { 
        $id = decrypt($id);
        $purchase_medicine = PurchaseMedicine::find($id);  
        $purchase_medicine_list = PurchaseMedicineList::where('purchase_medicine_id', $purchase_medicine->id)->orderBy('created_at', 'DESC')->get();  
        return view('purchase-medicine.update', compact('purchase_medicine', 'purchase_medicine_list'));           
    }    

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $purchase_medicine = PurchaseMedicine::find($id);        
            $purchase_medicine->date = $request->date;   
            $purchase_medicine->invoice_id = $request->invoice_id; 
            $purchase_medicine->manufacturer = $request->manufacturer; 
            $purchase_medicine->sub_total = $request->sub_total;  
            $purchase_medicine->discount = $request->discount;
            $purchase_medicine->gst = $request->gst;
            $purchase_medicine->total = $request->total; 
            $purchase_medicine->payment_mode = $request->payment_mode;   
            $purchase_medicine->payment_amount = $request->payment_amount;    
            $purchase_medicine->save();       
            $exist_purchase_medicine_list = PurchaseMedicineList::where('purchase_medicine_id', $purchase_medicine->id)->orderBy('created_at', 'DESC')->get();  
            foreach($exist_purchase_medicine_list as $exist_purchase_medicine_list)
            {
                PurchaseMedicineList::destroy($exist_purchase_medicine_list->id); 
            }    
            for($i = 0; $i < count($request->medicine_name); $i++) 
            { 
                $purchase_medicine_list = new PurchaseMedicineList();    
                $purchase_medicine_list->purchase_medicine_id = $purchase_medicine->id;  
                $purchase_medicine_list->name = $request->medicine_name[$i]; 
                $purchase_medicine_list->batch = $request->medicine_batch[$i];  
                $purchase_medicine_list->expiry_date = $request->medicine_expiry_date[$i];   
                $purchase_medicine_list->mrp_per_unit = $request->medicine_mrp_per_unit[$i];   
                $purchase_medicine_list->quantity = $request->medicine_quantity[$i];   
                $purchase_medicine_list->sub_total = $request->medicine_sub_total[$i];   
                $purchase_medicine_list->discount = $request->medicine_discount[$i];   
                $purchase_medicine_list->total = $request->medicine_total[$i];    
                $purchase_medicine_list->save();            
            }       
            DB::commit();
            toastr()->success('Purchase Medicine updated successfully.');      
            return redirect('purchase-medicine');     
        } catch (\Exception $e) {  
            DB::rollBack();
            return $e->getMessage();
        } 
    }   
}
