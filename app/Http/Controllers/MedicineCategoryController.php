<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicineCategory;
use Illuminate\Support\Facades\DB; 

class MedicineCategoryController extends Controller
{
    public function index()
    {
        $medicine_category = MedicineCategory::orderBy('created_at', 'DESC')->get(); 
        return view('medicine-category.index', compact('medicine_category')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $medicine_category = MedicineCategory::find($id);  
        $medicine_category->delete();  
        toastr()->success('Medicine Category deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('medicine-category.create');   
    } 

    public function store(Request $request)  
    { 
        try {
            DB::beginTransaction();
            $medicine_category = new MedicineCategory();
            $medicine_category->name = $request->name; 
            $medicine_category->description = $request->description; 
            $medicine_category->status = $request->status;
            $medicine_category->save();  
            DB::commit();
            toastr()->success('Medicine Category created successfully.');  
            return redirect('medicine-category');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $medicine_category = MedicineCategory::find($id);  
        return view('medicine-category.update', compact('medicine_category'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $medicine_category = MedicineCategory::find($id);   
            $medicine_category->name = $request->name; 
            $medicine_category->description = $request->description;  
            $medicine_category->status = $request->status; 
            $medicine_category->save();  
            DB::commit();
            toastr()->success('Medicine Category updated successfully.');     
            return redirect('medicine-category');      
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage(); 
        } 
    }   
}
