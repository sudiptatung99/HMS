<?php

namespace App\Http\Controllers;

use App\Models\UnitDoctorList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitDoctorListController extends Controller
{
    public function index()
    {
        $unit_doctor = UnitDoctorList::with('unit','doctor')->orderBy('created_at', 'DESC')->get();
        return view('unit-doctor-list.index', compact('unit_doctor'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $unit_doctor = UnitDoctorList::find($id);
        $unit_doctor->delete();
        toastr()->success('Unit Doctor deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('unit-doctor-list.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $unitDoctor = new UnitDoctorList();
            $unitDoctor->unit_id = $request->unit_id;
            $unitDoctor->doctor_id = $request->doctor_id;
            $unitDoctor->save();
            DB::commit();
            toastr()->success('Unit Doctor created successfully.');
            return redirect('unit-doctor');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $unit_doctor = UnitDoctorList::find($id);
        return view('unit-doctor-list.update', compact('unit_doctor'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $unit_doctor = UnitDoctorList::find($id);
            $unit_doctor->unit_id = $request->unit_id;
            $unit_doctor->doctor_id = $request->doctor_id;
            $unit_doctor->save();
            DB::commit();
            toastr()->success('Unit Doctor updated successfully.');
            return redirect('unit-doctor');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
