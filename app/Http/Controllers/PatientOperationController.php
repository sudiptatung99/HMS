<?php

namespace App\Http\Controllers;

use App\Models\PatientOperation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientOperationController extends Controller
{
    public function index()
    {
        $operation = PatientOperation::orderBy('created_at', 'DESC')->get();
        return view('patient-operation.index', compact('operation'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $operation = PatientOperation::find($id);
        $operation->delete();
        toastr()->success('Operation Patient deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('patient-operation.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $patient = new PatientOperation();
            $patient->category_id = $request->category_id;
            $patient->operation_id = $request->operation_id;
            $patient->operation_date = $request->operation_date;
            $patient->patient_id = $request->patient_id;
            $patient->doctor_id = $request->doctor_id;
            $patient->assistant_consultant_one = $request->assistant_consultant_one;
            $patient->assistant_consultant_two = $request->assistant_consultant_two;
            $patient->anesthetist = $request->anesthetist;
            $patient->anesthesia_type = $request->anesthesia_type;
            $patient->ot_technician = $request->ot_technician;
            $patient->ot_assistant = $request->ot_assistant;
            $patient->remark = $request->remark;
            $patient->result = $request->result;
            $patient->save();
            DB::commit();
            toastr()->success('Operation Patient created successfully.');
            return redirect('operation/patient');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $patient = PatientOperation::find($id);
        return view('patient-operation.update', compact('patient'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $patient = PatientOperation::find($id);
            $patient->category_id = $request->category_id;
            $patient->operation_id = $request->operation_id;
            $patient->operation_date = $request->operation_date;
            $patient->patient_id = $request->patient_id;
            $patient->doctor_id = $request->doctor_id;
            $patient->assistant_consultant_one = $request->assistant_consultant_one;
            $patient->assistant_consultant_two = $request->assistant_consultant_two;
            $patient->anesthetist = $request->anesthetist;
            $patient->anesthesia_type = $request->anesthesia_type;
            $patient->ot_technician = $request->ot_technician;
            $patient->ot_assistant = $request->ot_assistant;
            $patient->remark = $request->remark;
            $patient->result = $request->result;
            $patient->save();
            DB::commit();
            toastr()->success('Operation Patient updated successfully.');
            return redirect('operation/patient');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function getOperationPatientDetails(Request $request){
        $patient = PatientOperation::where('patient_id',$request->patient_id)->with('operation')->get();
        return response()->json(['data'=>$patient]);
    }
    public function getOperationPatientBill(Request $request){
        $patient = PatientOperation::where('id',$request->id)->with('category','doctor')->first();
        return response()->json(['data'=>$patient]);
    }
}
