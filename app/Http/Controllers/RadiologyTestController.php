<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RadiologyTest;
use App\Models\RadiologyTestParameter;
use Illuminate\Support\Facades\DB; 

class RadiologyTestController extends Controller
{
    public function index()
    {
        $radiology_test = RadiologyTest::orderBy('created_at', 'DESC')->get(); 
        return view('radiology-test.index', compact('radiology_test')); 
    } 
    
    public function show($id)  
    {   
        $id = decrypt($id);
        $radiology_test = RadiologyTest::find($id);  
        $test_parameter = RadiologyTestParameter::where('test_id', $radiology_test->id)->orderBy('created_at', 'DESC')->get();   
        return view('radiology-test.show', compact('radiology_test', 'test_parameter'));               
    }   
 
    public function delete($id)
    {
        $id = decrypt($id);
        $radiology_test = RadiologyTest::find($id);  
        $radiology_test->delete();  
        toastr()->success('Radiology Test deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('radiology-test.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $radiology_test = new RadiologyTest(); 
            $radiology_test->name = $request->name; 
            $radiology_test->short_name = $request->short_name;
            $radiology_test->category_id = $request->category_id;
            $radiology_test->method = $request->method; 
            $radiology_test->amount = $request->amount; 
            $radiology_test->gst_percent = $request->gst_percent; 
            $radiology_test->gst = $request->gst; 
            $radiology_test->total = $request->total;   
            $radiology_test->save();  
            for($i = 0; $i < count($request->parameter_id); $i++)
            {
                $test_parameter = new RadiologyTestParameter();
                $test_parameter->test_id = $radiology_test->id;  
                $test_parameter->parameter_id = $request->parameter_id[$i];   
                $test_parameter->save();   
            }   
            DB::commit();
            toastr()->success('Radiology Test created successfully.');  
            return redirect('radiology-test');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $radiology_test = RadiologyTest::find($id);  
        $test_parameter = RadiologyTestParameter::where('test_id', $radiology_test->id)->orderBy('created_at', 'DESC')->get();   
        return view('radiology-test.update', compact('radiology_test', 'test_parameter'));       
    }  

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $radiology_test = RadiologyTest::find($id);   
            $radiology_test->name = $request->name; 
            $radiology_test->short_name = $request->short_name;
            $radiology_test->category_id = $request->category_id;
            $radiology_test->method = $request->method; 
            $radiology_test->amount = $request->amount; 
            $radiology_test->gst_percent = $request->gst_percent; 
            $radiology_test->gst = $request->gst; 
            $radiology_test->total = $request->total;   
            $radiology_test->save();     
            $exist_test_parameter = RadiologyTestParameter::where('test_id', $radiology_test->id)->orderBy('created_at', 'DESC')->get();    
            foreach($exist_test_parameter as $exist_test_parameter)   
            { 
                RadiologyTestParameter::destroy($exist_test_parameter->id); 
            } 
            for($i = 0; $i < count($request->parameter_id); $i++)
            {
                $test_parameter = new RadiologyTestParameter();
                $test_parameter->test_id = $radiology_test->id;  
                $test_parameter->parameter_id = $request->parameter_id[$i];   
                $test_parameter->save();   
            }  
            DB::commit(); 
            toastr()->success('Radiology Test updated successfully.');    
            return redirect('radiology-test');       
        } catch (\Exception $e) {  
            DB::rollBack();
            return $e->getMessage();
        }
    }  
    
    public function getTestDetails(Request $request) {
        $radiology_test = RadiologyTest::find($request->test_id);      
        return response()->json([ 
            'radiology_test' => $radiology_test 
        ]);    
    }   
}
