<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicineVendor;
use Illuminate\Support\Facades\DB;  

class MedicineVendorController extends Controller
{
    public function index()
    {
        $medicine_vendor = MedicineVendor::orderBy('created_at', 'DESC')->get(); 
        return view('medicine-vendor.index', compact('medicine_vendor')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $medicine_vendor = MedicineVendor::find($id);  
        $medicine_vendor->delete();  
        toastr()->success('Medicine Vendor deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('medicine-vendor.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $medicine_vendor = new MedicineVendor();
            $medicine_vendor->name = $request->name;
            $medicine_vendor->contact = $request->contact;
            $medicine_vendor->address = $request->address;
            $medicine_vendor->save();  
            DB::commit();
            toastr()->success('Medicine Vendor created successfully.');  
            return redirect('medicine-vendor');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $medicine_vendor = MedicineVendor::find($id);  
        return view('medicine-vendor.update', compact('medicine_vendor'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $medicine_vendor = MedicineVendor::find($id);   
            $medicine_vendor->name = $request->name;
            $medicine_vendor->contact = $request->contact;
            $medicine_vendor->address = $request->address; 
            $medicine_vendor->save();   
            DB::commit();
            toastr()->success('Medicine Vendor updated successfully.');   
            return redirect('medicine-vendor');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
}
