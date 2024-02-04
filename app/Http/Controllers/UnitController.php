<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index()
    {
        $unit = Unit::orderBy('created_at', 'DESC')->get();
        return view('unit.index', compact('unit'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $unit = Unit::find($id);
        $unit->delete();
        toastr()->success('Unit deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('unit.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $unit = new Unit();
            $unit->name = $request->name;
            $unit->status = $request->status;
            $unit->save();
            DB::commit();
            toastr()->success('Unit created successfully.');
            return redirect('unit');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $unit = Unit::find($id);
        return view('unit.update', compact('unit'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $unit = Unit::find($id);
            $unit->name = $request->name;
            $unit->status = $request->status;
            $unit->save();
            DB::commit();
            toastr()->success('Unit updated successfully.');
            return redirect('unit');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
