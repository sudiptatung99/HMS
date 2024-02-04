<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PathologyCategory; 
use Illuminate\Support\Facades\DB; 
 
class PathologyCategoryController extends Controller
{
    public function index()
    {
        $pathology_category = PathologyCategory::orderBy('created_at', 'DESC')->get(); 
        return view('pathology-category.index', compact('pathology_category')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $pathology_category = PathologyCategory::find($id);  
        $pathology_category->delete();  
        toastr()->success('Pathology Category deleted successfully.');    
        return back();    
    }  

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $pathology_category = new PathologyCategory();
            $pathology_category->name = $request->name; 
            $pathology_category->save();  
            DB::commit();
            toastr()->success('Pathology Category created successfully.');  
            return redirect('pathology-category');   
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
            $pathology_category = PathologyCategory::find($id);   
            $pathology_category->name = $request->name;  
            $pathology_category->save();    
            DB::commit();
            toastr()->success('Pathology Category updated successfully.');    
            return redirect('pathology-category');      
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
