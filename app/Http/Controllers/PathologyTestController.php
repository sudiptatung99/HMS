<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PathologyTest;
use App\Models\PathologyTestParameter;
use Illuminate\Support\Facades\DB; 

class PathologyTestController extends Controller
{
    public function index()
    {
        $pathology_test = PathologyTest::orderBy('created_at', 'DESC')->get(); 
        return view('pathology-test.index', compact('pathology_test')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $pathology_test = PathologyTest::find($id);  
        $test_parameter = PathologyTestParameter::where('test_id', $pathology_test->id)->orderBy('created_at', 'DESC')->get();        
        return view('pathology-test.show', compact('pathology_test', 'test_parameter'));              
    }  

    public function delete($id)
    {
        $id = decrypt($id);
        $pathology_test = PathologyTest::find($id);  
        $pathology_test->delete();  
        toastr()->success('Pathology Test deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('pathology-test.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $pathology_test = new PathologyTest(); 
            $pathology_test->name = $request->name; 
            $pathology_test->short_name = $request->short_name;
            $pathology_test->category_id = $request->category_id;
            $pathology_test->method = $request->method; 
            $pathology_test->amount = $request->amount; 
            $pathology_test->gst_percent = $request->gst_percent; 
            $pathology_test->gst = $request->gst; 
            $pathology_test->total = $request->total;   
            $pathology_test->save();  
            for($i = 0; $i < count($request->parameter_id); $i++)
            {
                $test_parameter = new PathologyTestParameter();
                $test_parameter->test_id = $pathology_test->id;  
                $test_parameter->parameter_id = $request->parameter_id[$i];   
                $test_parameter->save();   
            }   
            DB::commit();
            toastr()->success('Pathology Test created successfully.');  
            return redirect('pathology-test');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $pathology_test = PathologyTest::find($id);  
        $test_parameter = PathologyTestParameter::where('test_id', $pathology_test->id)->orderBy('created_at', 'DESC')->get();   
        return view('pathology-test.update', compact('pathology_test', 'test_parameter'));       
    }  

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $pathology_test = PathologyTest::find($id);   
            $pathology_test->name = $request->name; 
            $pathology_test->short_name = $request->short_name;
            $pathology_test->category_id = $request->category_id;
            $pathology_test->method = $request->method; 
            $pathology_test->amount = $request->amount; 
            $pathology_test->gst_percent = $request->gst_percent; 
            $pathology_test->gst = $request->gst; 
            $pathology_test->total = $request->total;   
            $pathology_test->save();     
            $exist_test_parameter = PathologyTestParameter::where('test_id', $pathology_test->id)->orderBy('created_at', 'DESC')->get();    
            foreach($exist_test_parameter as $exist_test_parameter)   
            { 
                PathologyTestParameter::destroy($exist_test_parameter->id); 
            } 
            for($i = 0; $i < count($request->parameter_id); $i++)
            {
                $test_parameter = new PathologyTestParameter();
                $test_parameter->test_id = $pathology_test->id;  
                $test_parameter->parameter_id = $request->parameter_id[$i];   
                $test_parameter->save();   
            }  
            DB::commit(); 
            toastr()->success('Pathology Test updated successfully.');    
            return redirect('pathology-test');       
        } catch (\Exception $e) {  
            DB::rollBack();
            return $e->getMessage();
        }
    }  
    
    public function getTestDetails(Request $request) {
        $pathology_test = PathologyTest::find($request->test_id);      
        return response()->json([ 
            'pathology_test' => $pathology_test 
        ]);    
    }   
}
