<?php

namespace App\Http\Controllers;

use App\Models\MicrobiologyParameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MicrobiologyParameterController extends Controller
{
    public function index()
    {
        $microbiology_parameter = MicrobiologyParameter::orderBy('created_at', 'DESC')->get();
        return view('microbiology-parameter.index', compact('microbiology_parameter'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $microbiology_parameter = MicrobiologyParameter::find($id);
        $microbiology_parameter->delete();
        toastr()->success('Microbiology Parameter deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('microbiology-parameter.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $microbiology_parameter = new MicrobiologyParameter();
            $microbiology_parameter->name = $request->name;
            $microbiology_parameter->range = $request->range;
            $microbiology_parameter->unit = $request->unit;
            $microbiology_parameter->description = $request->description;
            $microbiology_parameter->save();
            DB::commit();
            toastr()->success('Microbiology Parameter created successfully.');
            return redirect('microbiology-parameter');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $microbiology_parameter = MicrobiologyParameter::find($id);
        return view('microbiology-parameter.update', compact('microbiology_parameter'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $microbiology_parameter = MicrobiologyParameter::find($id);
            $microbiology_parameter->name = $request->name;
            $microbiology_parameter->range = $request->range;
            $microbiology_parameter->unit = $request->unit;
            $microbiology_parameter->description = $request->description;
            $microbiology_parameter->save();
            DB::commit();
            toastr()->success('Microbiology Parameter updated successfully.');
            return redirect('microbiology-parameter');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function getParameterDetails(Request $request) {
        $microbiology_parameter = MicrobiologyParameter::find($request->parameter_id);
        return response()->json([
            'microbiology_parameter' => $microbiology_parameter
        ]);
    }
}
