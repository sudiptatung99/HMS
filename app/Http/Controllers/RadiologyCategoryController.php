<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RadiologyCategory; 
use Illuminate\Support\Facades\DB; 
 
class RadiologyCategoryController extends Controller
{
    public function index()
    {
        $radiology_category = RadiologyCategory::orderBy('created_at', 'DESC')->get(); 
        return view('radiology-category.index', compact('radiology_category')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $radiology_category = RadiologyCategory::find($id);  
        $radiology_category->delete();  
        toastr()->success('Radiology Category deleted successfully.');    
        return back();    
    }  

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $radiology_category = new RadiologyCategory();
            $radiology_category->name = $request->name; 
            $radiology_category->save();  
            DB::commit();
            toastr()->success('Radiology Category created successfully.');  
            return redirect('radiology-category');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
 
    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $radiology_category = RadiologyCategory::find($id);   
            $radiology_category->name = $request->name;  
            $radiology_category->save();    
            DB::commit();
            toastr()->success('Radiology Category updated successfully.');    
            return redirect('radiology-category');      
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
 