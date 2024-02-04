<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PathologyParameter;
use Illuminate\Support\Facades\DB; 

class PathologyParameterController extends Controller
{
    public function index()
    {
        $pathology_parameter = PathologyParameter::orderBy('created_at', 'DESC')->get(); 
        return view('pathology-parameter.index', compact('pathology_parameter')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $pathology_parameter = PathologyParameter::find($id);  
        $pathology_parameter->delete();  
        toastr()->success('Pathology Parameter deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('pathology-parameter.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $pathology_parameter = new PathologyParameter(); 
            $pathology_parameter->name = $request->name; 
            $pathology_parameter->range = $request->range;
            $pathology_parameter->unit = $request->unit;
            $pathology_parameter->description = $request->description; 
            $pathology_parameter->save();  
            DB::commit();
            toastr()->success('Pathology Parameter created successfully.');  
            return redirect('pathology-parameter');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $pathology_parameter = PathologyParameter::find($id);  
        return view('pathology-parameter.update', compact('pathology_parameter'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $pathology_parameter = PathologyParameter::find($id);   
            $pathology_parameter->name = $request->name; 
            $pathology_parameter->range = $request->range;
            $pathology_parameter->unit = $request->unit;
            $pathology_parameter->description = $request->description;  
            $pathology_parameter->save();    
            DB::commit();
            toastr()->success('Pathology Parameter updated successfully.');    
            return redirect('pathology-parameter');       
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function getParameterDetails(Request $request) {
        $pathology_parameter = PathologyParameter::find($request->parameter_id);      
        return response()->json([ 
            'pathology_parameter' => $pathology_parameter 
        ]);   
    } 
}
