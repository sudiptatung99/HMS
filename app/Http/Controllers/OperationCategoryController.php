<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\OperationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationCategoryController extends Controller
{
    public function index()
    {
        $operation_category = OperationCategory::orderBy('created_at', 'DESC')->get();
        return view('operation-category.index', compact('operation_category'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $operation_category = OperationCategory::find($id);
        $operation_category->delete();
        toastr()->success('Operation Category deleted successfully.');
        return back();
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $operation_category = new OperationCategory();
            $operation_category->name = $request->name;
            $operation_category->save();
            DB::commit();
            toastr()->success('Operation Category created successfully.');
            return redirect('operation/category');
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
            $operation_category = OperationCategory::find($id);
            $operation_category->name = $request->name;
            $operation_category->save();
            DB::commit();
            toastr()->success('Operation Category updated successfully.');
            return redirect('operation/category');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
    public function getOperationCategoryDetails(Request $request){
        $operation_category = OperationCategory::find($request->category_id);
        $operation  = Operation::where('category_id',$operation_category->id)->get();
        return response()->json(['data'=>$operation]);
    }
}
