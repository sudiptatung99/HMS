<?php

namespace App\Http\Controllers;

use App\Models\OPDBill;
use App\Models\OPDPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class OPDBillController extends Controller
{

    public function index()
    {
        $opdbill = OPDBill::with('opd_patient')->latest()->get();
        // return $opdbill;
        return view('opd-patient.opd_bill_list', compact('opdbill'));
    }

    public function create()
    {
        return view('opd-patient.opd_add_bill');
    }

    public function store(Request $request)
    {

        try {
            DB::beginTransaction();
            $opdbill = new OPDBill();
            $opdbill->bill_no = 'OPDBIL' . rand(00000, 99999);
            $opdbill->bill_date = $request->bill_date;
            $opdbill->opd_patient_id = $request->patient_id;
            $opdbill->total = $request->total;
            $opdbill->discount_percent = $request->discount_percent;
            $opdbill->discount = $request->discount;
            $opdbill->gst_percent = $request->gst_percent;
            $opdbill->gst = $request->gst;
            $opdbill->payable = $request->payable;
            $opdbill->note = $request->note;
            $opdbill->payment_mode = $request->payment_mode;
            $opdbill->payment_status = $request->payment_status;
            $opdbill->save();
            DB::commit();
            toastr()->success('OPD Bill created successfully.');
            return redirect('/opd-bill/index');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function edit($id)
    {
        $id = decrypt($id);
        $bill = OPDBill::find($id);
        return view('opd-patient.edit_opd_bill', compact('bill'));
    }
    public function update(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $opdbillupdate = OPDBill::find($id);
            $opdbillupdate->bill_date = $request->bill_date;
            $opdbillupdate->opd_patient_id = $request->patient_id;
            $opdbillupdate->total = $request->total;
            $opdbillupdate->discount_percent = $request->discount_percent;
            $opdbillupdate->discount = $request->discount;
            $opdbillupdate->gst_percent = $request->gst_percent;
            $opdbillupdate->gst = $request->gst;
            $opdbillupdate->payable = $request->payable;
            $opdbillupdate->note = $request->note;
            $opdbillupdate->payment_mode = $request->payment_mode;
            $opdbillupdate->payment_status = $request->payment_status;
            $opdbillupdate->save();
            DB::commit();
            toastr()->success('OPD Bill Updated successfully.');
            return redirect('/opd-bill/index');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function delete( $id){
        $id = decrypt($id);
        $opdBillDelete = OPDBill::find($id);
        $opdBillDelete->delete();
        toastr()->success('OPD Bill deleted successfully.');
        return back();
    }

    public function show($id){
        $id = decrypt($id);
        $bill = OPDBill::find($id);
        return view('opd-patient.show_opd_bill',compact('bill'));
    }

    public function getOpdPatient(Request $request)
    {
        $opd_patient = OPDPatient::where('id', $request->id)->orderBy('created_at', 'DESC')->first();
        return response()->json(['data' => $opd_patient]);
    }
}
