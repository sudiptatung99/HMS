<?php

namespace App\Http\Controllers;

use App\Models\MicrobiologyCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MicrobiologyCategoryController extends Controller
{
    public function index()
    {
        $microbiology_category = MicrobiologyCategory::orderBy('created_at', 'DESC')->get();
        return view('microbiology-category.index', compact('microbiology_category'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $microbiology_category = MicrobiologyCategory::find($id);
        $microbiology_category->delete();
        toastr()->success('Microbiology Category deleted successfully.');
        return back();
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $microbiology_category = new MicrobiologyCategory();
            $microbiology_category->name = $request->name;
            $microbiology_category->save();
            DB::commit();
            toastr()->success('Microbiology Category created successfully.');
            return redirect('microbiology-category');
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
            $microbiology_category = MicrobiologyCategory::find($id);
            $microbiology_category->name = $request->name;
            $microbiology_category->save();
            DB::commit();
            toastr()->success('Microbiology Category updated successfully.');
            return redirect('microbiology-category');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
