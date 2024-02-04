<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RadiologyParameter;
use Illuminate\Support\Facades\DB; 

class RadiologyParameterController extends Controller
{
    public function index()
    {
        $radiology_parameter = RadiologyParameter::orderBy('created_at', 'DESC')->get(); 
        return view('radiology-parameter.index', compact('radiology_parameter')); 
    } 
 
    public function delete($id)
    {
        $id = decrypt($id);
        $radiology_parameter = RadiologyParameter::find($id);  
        $radiology_parameter->delete();  
        toastr()->success('Radiology Parameter deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('radiology-parameter.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $radiology_parameter = new RadiologyParameter(); 
            $radiology_parameter->name = $request->name; 
            $radiology_parameter->range = $request->range;
            $radiology_parameter->unit = $request->unit;
            $radiology_parameter->description = $request->description; 
            $radiology_parameter->save();  
            DB::commit();
            toastr()->success('Radiology Parameter created successfully.');  
            return redirect('radiology-parameter');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $radiology_parameter = RadiologyParameter::find($id);  
        return view('radiology-parameter.update', compact('radiology_parameter'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $radiology_parameter = RadiologyParameter::find($id);   
            $radiology_parameter->name = $request->name; 
            $radiology_parameter->range = $request->range;
            $radiology_parameter->unit = $request->unit;
            $radiology_parameter->description = $request->description;  
            $radiology_parameter->save();    
            DB::commit();
            toastr()->success('Radiology Parameter updated successfully.');    
            return redirect('radiology-parameter');       
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function getParameterDetails(Request $request) {
        $radiology_parameter = RadiologyParameter::find($request->parameter_id);      
        return response()->json([ 
            'radiology_parameter' => $radiology_parameter 
        ]);   
    } 
}
