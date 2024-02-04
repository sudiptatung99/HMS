<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;
 
class DesignationController extends Controller
{
    public function index()
    {
        $designation = Designation::orderBy('created_at', 'DESC')->get(); 
        return view('designation.index', compact('designation')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $designation = Designation::find($id);  
        $designation->delete();  
        toastr()->success('Designation deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('designation.create');   
    } 

    public function store(Request $request)  
    { 
        try {
            DB::beginTransaction();
            $designation = new Designation();
            $designation->name = $request->name; 
            $designation->status = $request->status;
            $designation->save();  
            DB::commit();
            toastr()->success('Designation created successfully.');  
            return redirect('designation');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $designation = Designation::find($id);  
        return view('designation.update', compact('designation'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $designation = Designation::find($id);   
            $designation->name = $request->name; 
            $designation->status = $request->status;
            $designation->save();  
            DB::commit();
            toastr()->success('Designation updated successfully.');    
            return redirect('designation');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 
}
