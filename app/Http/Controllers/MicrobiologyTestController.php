<?php

namespace App\Http\Controllers;


use App\Models\MicrobiologyTest;
use App\Models\MicrobiologyTestParameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MicrobiologyTestController extends Controller
{
    public function index()
    {
        $microbiology_test = MicrobiologyTest::orderBy('created_at', 'DESC')->get();
        return view('microbiology-test.index', compact('microbiology_test'));
    }

    public function show($id)
    {
        $id = decrypt($id);
        $microbiology_test = MicrobiologyTest::find($id);
        $test_parameter = MicrobiologyTestParameter::where('test_id', $microbiology_test->id)->orderBy('created_at', 'DESC')->get();
        return view('microbiology-test.show', compact('microbiology_test', 'test_parameter'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $microbiology_test = MicrobiologyTest::find($id);
        $microbiology_test->delete();
        toastr()->success('Pathology Test deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('microbiology-test.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $microbiology_test = new MicrobiologyTest();
            $microbiology_test->name = $request->name;
            $microbiology_test->short_name = $request->short_name;
            $microbiology_test->category_id = $request->category_id;
            $microbiology_test->method = $request->method;
            $microbiology_test->amount = $request->amount;
            $microbiology_test->gst_percent = $request->gst_percent;
            $microbiology_test->gst = $request->gst;
            $microbiology_test->total = $request->total;
            $microbiology_test->save();
            for($i = 0; $i < count($request->parameter_id); $i++)
            {
                $test_parameter = new MicrobiologyTestParameter();
                $test_parameter->test_id = $microbiology_test->id;
                $test_parameter->parameter_id = $request->parameter_id[$i];
                $test_parameter->save();
            }
            DB::commit();
            toastr()->success('Microbiology Test created successfully.');
            return redirect('microbiology-test');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $microbiology_test = MicrobiologyTest::find($id);
        $test_parameter = MicrobiologyTestParameter::where('test_id', $microbiology_test->id)->orderBy('created_at', 'DESC')->get();
        return view('microbiology-test.update', compact('microbiology_test', 'test_parameter'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $microbiology_test = MicrobiologyTest::find($id);
            $microbiology_test->name = $request->name;
            $microbiology_test->short_name = $request->short_name;
            $microbiology_test->category_id = $request->category_id;
            $microbiology_test->method = $request->method;
            $microbiology_test->amount = $request->amount;
            $microbiology_test->gst_percent = $request->gst_percent;
            $microbiology_test->gst = $request->gst;
            $microbiology_test->total = $request->total;
            $microbiology_test->save();
            $exist_test_parameter = MicrobiologyTestParameter::where('test_id', $microbiology_test->id)->orderBy('created_at', 'DESC')->get();
            foreach($exist_test_parameter as $exist_test_parameter)
            {
                MicrobiologyTestParameter::destroy($exist_test_parameter->id);
            }
            for($i = 0; $i < count($request->parameter_id); $i++)
            {
                $test_parameter = new MicrobiologyTestParameter();
                $test_parameter->test_id = $microbiology_test->id;
                $test_parameter->parameter_id = $request->parameter_id[$i];
                $test_parameter->save();
            }
            DB::commit();
            toastr()->success('Microbiology Test updated successfully.');
            return redirect('microbiology-test');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function getTestDetails(Request $request) {
        $microbiology_test = MicrobiologyTest::find($request->test_id);
        return response()->json([
            'microbiology_test' => $microbiology_test
        ]);
    }
}
