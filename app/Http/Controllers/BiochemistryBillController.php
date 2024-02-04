<?php

namespace App\Http\Controllers;

use App\Models\BiochemistryBill;
use App\Models\BiochemistryBillTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BiochemistryBillController extends Controller
{
    public function index()
    {
        $biochemistry_bill = BiochemistryBill::orderBy('created_at', 'DESC')->get();
        return view('biochemistry-bill.index', compact('biochemistry_bill'));
    }

    public function show($id)
    {
        $id = decrypt($id);
        $biochemistry_bill = BiochemistryBill::find($id);
        $pathology_test = BiochemistryBillTest::where('bill_id', $biochemistry_bill->id)->orderBy('created_at', 'DESC')->get();
        return view('biochemistry-bill.show', compact('biochemistry_bill', 'pathology_test'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $pathology_bill = BiochemistryBill::find($id);
        $pathology_bill->delete();
        toastr()->success('Biochemistry Bill deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('biochemistry-bill.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $biocemistry_bill = new BiochemistryBill();
            $biocemistry_bill->bill_no = 'BCB' . rand(00000, 99999);
            $biocemistry_bill->bill_date = $request->bill_date;
            $biocemistry_bill->patient_id = $request->patient_id;
            $biocemistry_bill->doctor_id = $request->doctor_id;
            $biocemistry_bill->total = $request->total;
            $biocemistry_bill->discount_percent = $request->discount_percent;
            $biocemistry_bill->discount = $request->discount;
            $biocemistry_bill->gst = $request->gst;
            $biocemistry_bill->net_amount = $request->net_amount;
            $biocemistry_bill->payment_mode = $request->payment_mode;
            $biocemistry_bill->payment_amount = $request->payment_amount;
            $biocemistry_bill->note = $request->note;
            $biocemistry_bill->save();
            DB::commit();
            for($i = 0; $i < count($request->test_id); $i++)
            {
                $pathology_test = new BiochemistryBillTest();
                $pathology_test->bill_id = $biocemistry_bill->id;
                $pathology_test->test_id = $request->test_id[$i];
                $pathology_test->save();
            }
            toastr()->success('Biochemistry Bill created successfully.');
            return redirect('biochemistry-bill');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $biochemistry_bill = BiochemistryBill::find($id);
        $pathology_test = BiochemistryBillTest::where('bill_id', $biochemistry_bill->id)->orderBy('created_at', 'DESC')->get();
        return view('biochemistry-bill.update', compact('biochemistry_bill', 'pathology_test'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $pathology_bill = BiochemistryBill::find($id);
            $pathology_bill->bill_date = $request->bill_date;
            $pathology_bill->patient_id = $request->patient_id;
            $pathology_bill->doctor_id = $request->doctor_id;
            $pathology_bill->total = $request->total;
            $pathology_bill->discount_percent = $request->discount_percent;
            $pathology_bill->discount = $request->discount;
            $pathology_bill->gst = $request->gst;
            $pathology_bill->net_amount = $request->net_amount;
            $pathology_bill->payment_mode = $request->payment_mode;
            $pathology_bill->payment_amount = $request->payment_amount;
            $pathology_bill->note = $request->note;
            $pathology_bill->save();
            $exist_pathology_test = BiochemistryBillTest::where('bill_id', $pathology_bill->id)->orderBy('created_at', 'DESC')->get();
            foreach($exist_pathology_test as $exist_pathology_test)
            {
                BiochemistryBillTest::destroy($exist_pathology_test->id);
            }
            for($i = 0; $i < count($request->test_id); $i++)
            {
                $pathology_test = new BiochemistryBillTest();
                $pathology_test->bill_id = $pathology_bill->id;
                $pathology_test->test_id = $request->test_id[$i];
                $pathology_test->save();
            }
            DB::commit();
            toastr()->success('Biochemistry Bill updated successfully.');
            return redirect('biochemistry-bill');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
