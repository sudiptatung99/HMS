<?php

namespace App\Http\Controllers;

use App\Models\MicrobiologyBill;
use App\Models\MicrobiologyBillTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MicrobiologyBillController extends Controller
{
    public function index()
    {
        $microbiology_bill = MicrobiologyBill::orderBy('created_at', 'DESC')->get();
        return view('microbiology-bill.index', compact('microbiology_bill'));
    }

    public function show($id)
    {
        $id = decrypt($id);
        $microbiology_bill = MicrobiologyBill::find($id);
        $pathology_test = MicrobiologyBillTest::where('bill_id', $microbiology_bill->id)->orderBy('created_at', 'DESC')->get();
        return view('microbiology-bill.show', compact('microbiology_bill', 'pathology_test'));
    }

    public function delete($id)
    {
        $id = decrypt($id);
        $microbiology_bill = MicrobiologyBill::find($id);
        $microbiology_bill->delete();
        toastr()->success('Microbiology Bill deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('microbiology-bill.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $microbiology_bill = new MicrobiologyBill();
            $microbiology_bill->bill_no = 'MCB' . rand(00000, 99999);
            $microbiology_bill->bill_date = $request->bill_date;
            $microbiology_bill->patient_id = $request->patient_id;
            $microbiology_bill->doctor_id = $request->doctor_id;
            $microbiology_bill->total = $request->total;
            $microbiology_bill->discount_percent = $request->discount_percent;
            $microbiology_bill->discount = $request->discount;
            $microbiology_bill->gst = $request->gst;
            $microbiology_bill->net_amount = $request->net_amount;
            $microbiology_bill->payment_mode = $request->payment_mode;
            $microbiology_bill->payment_amount = $request->payment_amount;
            $microbiology_bill->note = $request->note;
            $microbiology_bill->save();
            DB::commit();
            for($i = 0; $i < count($request->test_id); $i++)
            {
                $pathology_test = new MicrobiologyBillTest();
                $pathology_test->bill_id = $microbiology_bill->id;
                $pathology_test->test_id = $request->test_id[$i];
                $pathology_test->save();
            }
            toastr()->success('Microbiology Bill created successfully.');
            return redirect('microbiology-bill');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $microbiology_bill = MicrobiologyBill::find($id);
        $pathology_test = MicrobiologyBillTest::where('bill_id', $microbiology_bill->id)->orderBy('created_at', 'DESC')->get();
        return view('microbiology-bill.update', compact('microbiology_bill', 'pathology_test'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $microbiology_bill = MicrobiologyBill::find($id);
            $microbiology_bill->bill_date = $request->bill_date;
            $microbiology_bill->patient_id = $request->patient_id;
            $microbiology_bill->doctor_id = $request->doctor_id;
            $microbiology_bill->total = $request->total;
            $microbiology_bill->discount_percent = $request->discount_percent;
            $microbiology_bill->discount = $request->discount;
            $microbiology_bill->gst = $request->gst;
            $microbiology_bill->net_amount = $request->net_amount;
            $microbiology_bill->payment_mode = $request->payment_mode;
            $microbiology_bill->payment_amount = $request->payment_amount;
            $microbiology_bill->note = $request->note;
            $microbiology_bill->save();
            $exist_pathology_test = MicrobiologyBillTest::where('bill_id', $microbiology_bill->id)->orderBy('created_at', 'DESC')->get();
            foreach($exist_pathology_test as $exist_pathology_test)
            {
                MicrobiologyBillTest::destroy($exist_pathology_test->id);
            }
            for($i = 0; $i < count($request->test_id); $i++)
            {
                $pathology_test = new MicrobiologyBillTest();
                $pathology_test->bill_id = $microbiology_bill->id;
                $pathology_test->test_id = $request->test_id[$i];
                $pathology_test->save();
            }
            DB::commit();
            toastr()->success('Microbiology Bill updated successfully.');
            return redirect('microbiology-bill');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }
}
