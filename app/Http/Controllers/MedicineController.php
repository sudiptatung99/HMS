<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;  
use Illuminate\Support\Facades\DB;  
 
class MedicineController extends Controller
{
    public function index()
    {
        $medicine = Medicine::orderBy('created_at', 'DESC')->get(); 
        return view('medicine.index', compact('medicine')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $medicine = Medicine::find($id);      
        return view('medicine.show', compact('medicine'));          
    }  

    public function delete($id)
    {
        $id = decrypt($id);
        $medicine = Medicine::find($id);  
        $medicine->delete();  
        toastr()->success('Medicine deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('medicine.create');   
    } 

    public function store(Request $request)  
    { 
        try {
            DB::beginTransaction();
            $medicine = new Medicine();
            $medicine->name = $request->name; 
            $medicine->medicine_category_id = $request->medicine_category_id;
            $medicine->unit = $request->unit;
            $medicine->quantity = $request->quantity;
            $medicine->manufacturer_price = $request->manufacturer_price;
            $medicine->selling_price = $request->selling_price;   
            $medicine->batch_no = $request->batch_no; 
            $medicine->expiry_date = $request->expiry_date;
            $medicine->medicine_vendor_id = $request->medicine_vendor_id;
            $medicine->manufacturer = $request->manufacturer;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/medicine-image/'), $filename);    
                $medicine->image = '/uploads/medicine-image/'.$filename;        
            }
            $medicine->description = $request->description;
            $medicine->status = $request->status;
            $medicine->save();  
            DB::commit();
            toastr()->success('Medicine created successfully.');  
            return redirect('medicine');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $medicine = Medicine::find($id);  
        return view('medicine.update', compact('medicine'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $medicine = Medicine::find($id);   
            $medicine->name = $request->name; 
            $medicine->medicine_category_id = $request->medicine_category_id;
            $medicine->unit = $request->unit;
            $medicine->quantity = $request->quantity;
            $medicine->manufacturer_price = $request->manufacturer_price;
            $medicine->selling_price = $request->selling_price; 
            $medicine->batch_no = $request->batch_no; 
            $medicine->expiry_date = $request->expiry_date;
            $medicine->medicine_vendor_id = $request->medicine_vendor_id;
            $medicine->manufacturer = $request->manufacturer;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/medicine-image/'), $filename);    
                $medicine->image = '/uploads/medicine-image/'.$filename;        
            }
            $medicine->description = $request->description;
            $medicine->status = $request->status;   
            $medicine->save();  
            DB::commit();
            toastr()->success('Medicine updated successfully.');    
            return redirect('medicine');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 
}
