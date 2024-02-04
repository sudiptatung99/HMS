<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdvancePayment;
use Illuminate\Support\Facades\DB; 

class AdvancePaymentController extends Controller
{
    public function index()
    {
        $advance_payment = AdvancePayment::orderBy('created_at', 'DESC')->get(); 
        return view('advance-payment.index', compact('advance_payment')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $advance_payment = AdvancePayment::find($id);  
        $advance_payment->delete();  
        toastr()->success('Advance Payment deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('advance-payment.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $advance_payment = new AdvancePayment();
            $advance_payment->patient_id = $request->patient_id;
            $advance_payment->amount = $request->amount;
            $advance_payment->payment_method = $request->payment_method;
            $advance_payment->receipt_no = 'ADV' . rand(00000, 99999);     
            $advance_payment->save();   
            DB::commit();
            toastr()->success('Advance Payment created successfully.');  
            return redirect('advance-payment');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $advance_payment = AdvancePayment::find($id);  
        return view('advance-payment.update', compact('advance_payment'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $advance_payment = AdvancePayment::find($id);   
            $advance_payment->patient_id = $request->patient_id;
            $advance_payment->amount = $request->amount;
            $advance_payment->payment_method = $request->payment_method; 
            $advance_payment->save();   
            DB::commit();
            toastr()->success('Advance Payment updated successfully.');    
            return redirect('advance-payment');      
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }   
}
