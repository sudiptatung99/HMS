<?php

namespace App\Http\Controllers;

use App\Models\BiochemistryParameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiochemistryParameterController extends Controller
{
    public function index()
    {
        $biochemistry_parameter = BiochemistryParameter::orderBy('created_at', 'DESC')->get();
        return view('biochemistry-parameter.index', compact('biochemistry_parameter'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $biochemistry_parameter = BiochemistryParameter::find($id);
        $biochemistry_parameter->delete();
        toastr()->success('Biochemistry Parameter deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('biochemistry-parameter.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $biochemistry_parameter = new BiochemistryParameter();
            $biochemistry_parameter->name = $request->name;
            $biochemistry_parameter->range = $request->range;
            $biochemistry_parameter->unit = $request->unit;
            $biochemistry_parameter->description = $request->description;
            $biochemistry_parameter->save();
            DB::commit();
            toastr()->success('Biochemistry Parameter created successfully.');
            return redirect('biochemistry-parameter');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $biochemistry_parameter = BiochemistryParameter::find($id);
        return view('biochemistry-parameter.update', compact('biochemistry_parameter'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $biochemistry_parameter = BiochemistryParameter::find($id);
            $biochemistry_parameter->name = $request->name;
            $biochemistry_parameter->range = $request->range;
            $biochemistry_parameter->unit = $request->unit;
            $biochemistry_parameter->description = $request->description;
            $biochemistry_parameter->save();
            DB::commit();
            toastr()->success('Biochemistry Parameter updated successfully.');
            return redirect('biochemistry-parameter');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function getParameterDetails(Request $request) {
        $biochemistry_parameter = BiochemistryParameter::find($request->parameter_id);
        return response()->json([
            'biochemistry_parameter' => $biochemistry_parameter
        ]);
    }
}
