<?php

namespace App\Http\Controllers;

use App\Models\BiochemistryTest;
use App\Models\BiochemistryTestParameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiochemistryTestController extends Controller
{
    public function index()
    {
        $biochemistry_test = BiochemistryTest::orderBy('created_at', 'DESC')->get();
        return view('biochemistry-test.index', compact('biochemistry_test'));
    }

    public function show($id)
    {
        $id = decrypt($id);
        $biochemistry_test = BiochemistryTest::find($id);
        $test_parameter = BiochemistryTestParameter::where('test_id', $biochemistry_test->id)->orderBy('created_at', 'DESC')->get();
        return view('biochemistry-test.show', compact('biochemistry_test', 'test_parameter'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $biochemistry_test = BiochemistryTest::find($id);
        $biochemistry_test->delete();
        toastr()->success('Biochemistry Test deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('biochemistry-test.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $biochemistry_test = new BiochemistryTest();
            $biochemistry_test->name = $request->name;
            $biochemistry_test->short_name = $request->short_name;
            $biochemistry_test->category_id = $request->category_id;
            $biochemistry_test->method = $request->method;
            $biochemistry_test->amount = $request->amount;
            $biochemistry_test->gst_percent = $request->gst_percent;
            $biochemistry_test->gst = $request->gst;
            $biochemistry_test->total = $request->total;
            $biochemistry_test->save();
            for($i = 0; $i < count($request->parameter_id); $i++)
            {
                $test_parameter = new BiochemistryTestParameter();
                $test_parameter->test_id = $biochemistry_test->id;
                $test_parameter->parameter_id = $request->parameter_id[$i];
                $test_parameter->save();
            }
            DB::commit();
            toastr()->success('Biochemistry Test created successfully.');
            return redirect('biochemistry-test');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $biochemistry_test = BiochemistryTest::find($id);
        $test_parameter = BiochemistryTestParameter::where('test_id', $biochemistry_test->id)->orderBy('created_at', 'DESC')->get();
        return view('biochemistry-test.update', compact('biochemistry_test', 'test_parameter'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $biochemistry_test = BiochemistryTest::find($id);
            $biochemistry_test->name = $request->name;
            $biochemistry_test->short_name = $request->short_name;
            $biochemistry_test->category_id = $request->category_id;
            $biochemistry_test->method = $request->method;
            $biochemistry_test->amount = $request->amount;
            $biochemistry_test->gst_percent = $request->gst_percent;
            $biochemistry_test->gst = $request->gst;
            $biochemistry_test->total = $request->total;
            $biochemistry_test->save();
            $exist_test_parameter = BiochemistryTestParameter::where('test_id', $biochemistry_test->id)->orderBy('created_at', 'DESC')->get();
            foreach($exist_test_parameter as $exist_test_parameter)
            {
                BiochemistryTestParameter::destroy($exist_test_parameter->id);
            }
            for($i = 0; $i < count($request->parameter_id); $i++)
            {
                $test_parameter = new BiochemistryTestParameter();
                $test_parameter->test_id = $biochemistry_test->id;
                $test_parameter->parameter_id = $request->parameter_id[$i];
                $test_parameter->save();
            }
            DB::commit();
            toastr()->success('Biochemistry Test updated successfully.');
            return redirect('biochemistry-test');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function getTestDetails(Request $request) {
        $pathology_test = BiochemistryTest::find($request->test_id);
        return response()->json([
            'pathology_test' => $pathology_test
        ]);
    }
}
