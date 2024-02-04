<?php

namespace App\Http\Controllers;

use App\Models\BiochemistryCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiochemistryCategoryController extends Controller
{
    public function index()
    {
        $biochemistry_category = BiochemistryCategory::orderBy('created_at', 'DESC')->get();
        return view('biochemistry-category.index', compact('biochemistry_category'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $pathology_category = BiochemistryCategory::find($id);
        $pathology_category->delete();
        toastr()->success('Biochemistry Category deleted successfully.');
        return back();
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $pathology_category = new BiochemistryCategory();
            $pathology_category->name = $request->name;
            $pathology_category->save();
            DB::commit();
            toastr()->success('Biochemistry Category created successfully.');
            return redirect('biochemistry-category');
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
            $pathology_category = BiochemistryCategory::find($id);
            $pathology_category->name = $request->name;
            $pathology_category->save();
            DB::commit();
            toastr()->success('Biochemistry Category updated successfully.');
            return redirect('biochemistry-category');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
