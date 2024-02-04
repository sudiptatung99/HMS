<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    public function index()
    {
        $operation = Operation::orderBy('created_at', 'DESC')->get();
        return view('operation.index', compact('operation'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $operation = Operation::find($id);
        $operation->delete();
        toastr()->success('Operation deleted successfully.');
        return back();
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $operation = new Operation();
            $operation->name = $request->name;
            $operation->category_id = $request->category_id;
            $operation->save();
            DB::commit();
            toastr()->success('Operation created successfully.');
            return redirect('operation/list');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $operation = Operation::find($id);
            $operation->name = $request->name;
            $operation->category_id = $request->category_id;
            $operation->save();
            DB::commit();
            toastr()->success('Operation updated successfully.');
            return redirect('operation/list');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
