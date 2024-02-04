<?php

namespace App\Http\Controllers;

use App\Models\OperationBill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OperationBillController extends Controller
{
    public function index()
    {
        $operation_bill = OperationBill::orderBy('created_at', 'DESC')->get();
        return view('operation-bill.index', compact('operation_bill'));
    }

    public function show($id)
    {
        $id = decrypt($id);
        $operation_bill = OperationBill::latest()->find($id);
        // return $operation_bill;
        return view('operation-bill.show', compact('operation_bill'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $operation_bill = OperationBill::find($id);
        $operation_bill->delete();
        toastr()->success('Operation Bill deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('operation-bill.create');
    }

    public function store(Request $request)
    {
        // return $request->all();
        try {
            DB::beginTransaction();
            $operation_bill = new OperationBill();
            $operation_bill->bill_no = 'OPB' . rand(00000, 99999);
            $operation_bill->bill_date = $request->bill_date;
            $operation_bill->patient_id = $request->patient_id;
            $operation_bill->patient_operations_id = $request->operation_id;
            $operation_bill->total = $request->total;
            $operation_bill->discount_percent = $request->discount_percent;
            $operation_bill->discount = $request->discount;
            $operation_bill->gst = $request->gst;
            $operation_bill->gst_percent = $request->gst_percent;
            $operation_bill->payment_mode = $request->payment_mode;
            $operation_bill->payment_status = $request->payment_status;
            $operation_bill->payment_amount = $request->payable;
            $operation_bill->note = $request->note;
            $operation_bill->save();
            DB::commit();
            toastr()->success('Operation Bill created successfully.');
            return redirect('operation-bill');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $operation_bill = OperationBill::find($id);
        return view('operation-bill.update', compact('operation_bill'));
    }

    public function updateStore(Request $request, $id)
    {
        // return $request->all();
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $operation_bill = OperationBill::find($id);
            $operation_bill->bill_date = $request->bill_date;
            $operation_bill->patient_id = $request->patient_id;
            $operation_bill->patient_operations_id = $request->operation_id;
            $operation_bill->total = $request->total;
            $operation_bill->discount_percent = $request->discount_percent;
            $operation_bill->discount = $request->discount;
            $operation_bill->gst = $request->gst;
            $operation_bill->gst_percent = $request->gst_percent;
            $operation_bill->payment_mode = $request->payment_mode;
            $operation_bill->payment_status = $request->payment_status;
            $operation_bill->payment_amount = $request->payable;
            $operation_bill->note = $request->note;
            $operation_bill->save();
            DB::commit();
            toastr()->success('Operation Bill updated successfully.');
            return redirect('operation-bill');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
