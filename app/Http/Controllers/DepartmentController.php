<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\DB;
 
class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::orderBy('created_at', 'DESC')->get(); 
        return view('department.index', compact('department')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $department = Department::find($id);  
        $department->delete();  
        toastr()->success('Department deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('department.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $department = new Department();
            $department->name = $request->name;
            $department->type = $request->type;
            $department->status = $request->status;
            $department->save();  
            DB::commit();
            toastr()->success('Department created successfully.');  
            return redirect('department');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $department = Department::find($id);  
        return view('department.update', compact('department'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $department = Department::find($id);   
            $department->name = $request->name;
            $department->type = $request->type;
            $department->status = $request->status;
            $department->save();  
            DB::commit();
            toastr()->success('Department updated successfully.');   
            return redirect('department');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 
}
