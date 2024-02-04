<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine; 
use App\Models\MedicineInvoice;
use App\Models\InvoiceMedicineList;
use App\Models\PurchaseMedicine;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
 
class MedicineInvoiceController extends Controller
{
    public function index()
    {
        $medicine_invoice = MedicineInvoice::orderBy('created_at', 'DESC')->get(); 
        return view('medicine-invoice.index', compact('medicine_invoice'));  
    }   

    public function show($id)  
    {   
        $id = decrypt($id);
        $medicine_invoice = MedicineInvoice::find($id);  
        $invoice_medicine_list = InvoiceMedicineList::where('medicine_invoice_id', $medicine_invoice->id)->orderBy('created_at', 'DESC')->get();    
        return view('medicine-invoice.show', compact('medicine_invoice', 'invoice_medicine_list'));         
    }   

    public function delete($id)
    {
        $id = decrypt($id);
        $medicine_invoice = MedicineInvoice::find($id);  
        $medicine_invoice->delete();  
        toastr()->success('Medicine Invoice deleted successfully.');     
        return redirect('medicine-invoice');       
    } 

    public function create()
    {
        return view('medicine-invoice.create');    
    }   

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $medicine_invoice = new MedicineInvoice();
            $medicine_invoice->invoice_no = 'MED' . rand(00000, 99999);  
            $medicine_invoice->patient_id = $request->patient_id;   
            $medicine_invoice->doctor_id = $request->doctor_id; 
            $medicine_invoice->note = $request->note; 
            $medicine_invoice->total = $request->total;  
            $medicine_invoice->discount_percent = $request->discount_percent;
            $medicine_invoice->discount = $request->discount;
            $medicine_invoice->gst_percent = $request->gst_percent; 
            $medicine_invoice->gst = $request->gst; 
            $medicine_invoice->net_amount = $request->net_amount;
            $medicine_invoice->payment_mode = $request->payment_mode;
            $medicine_invoice->payment_amount = $request->payment_amount;  
            $medicine_invoice->save();  
            for($i = 0; $i < count($request->medicine_id); $i++)
            {
                $invoice_medicine_list = new InvoiceMedicineList();
                $invoice_medicine_list->medicine_invoice_id = $medicine_invoice->id;  
                $invoice_medicine_list->medicine_id = $request->medicine_id[$i]; 
                $invoice_medicine_list->expiry_date = $request->expiry_date[$i]; 
                $invoice_medicine_list->quantity = $request->quantity[$i];  
                $invoice_medicine_list->price = $request->price[$i];    
                $invoice_medicine_list->save();       
                $medicine = Medicine::find($request->medicine_id[$i]);    
                $medicine->quantity = $medicine->quantity - $request->quantity[$i];   
                if($medicine->quantity == 0)
                {
                    $medicine->status = 'Out of Stock';  
                }    
                $medicine->save();    
            }   
            DB::commit();
            toastr()->success('New Invoice created successfully.');   
            return redirect('medicine-invoice');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }   
    
    public function update($id) 
    { 
        $id = decrypt($id);
        $medicine_invoice = MedicineInvoice::find($id);  
        $invoice_medicine_list = InvoiceMedicineList::where('medicine_invoice_id', $medicine_invoice->id)->orderBy('created_at', 'DESC')->get();  
        $medicine_list = $invoice_medicine_list; 
        $medicine_id_list = [];   
        foreach($medicine_list as $medicine_list)
        {
            array_push($medicine_id_list, $medicine_list->medicine_id);  
        }   
        return view('medicine-invoice.update', compact('medicine_invoice', 'invoice_medicine_list', 'medicine_id_list'));           
    }        
  
    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $medicine_invoice = MedicineInvoice::find($id);      
            $medicine_invoice->patient_id = $request->patient_id;  
            $medicine_invoice->doctor_id = $request->doctor_id; 
            $medicine_invoice->note = $request->note; 
            $medicine_invoice->total = $request->total;  
            $medicine_invoice->discount_percent = $request->discount_percent;
            $medicine_invoice->discount = $request->discount;
            $medicine_invoice->gst_percent = $request->gst_percent; 
            $medicine_invoice->gst = $request->gst; 
            $medicine_invoice->net_amount = $request->net_amount;
            $medicine_invoice->payment_mode = $request->payment_mode;
            $medicine_invoice->payment_amount = $request->payment_amount;  
            $medicine_invoice->save();   
            $exist_invoice_medicine_list = InvoiceMedicineList::where('medicine_invoice_id', $medicine_invoice->id)->orderBy('created_at', 'DESC')->get();   
            foreach($exist_invoice_medicine_list as $exist_invoice_medicine_list)
            {
                InvoiceMedicineList::destroy($exist_invoice_medicine_list->id); 
            }   
            for($i = 0; $i < count($request->medicine_id); $i++)
            {
                $invoice_medicine_list = new InvoiceMedicineList();
                $invoice_medicine_list->medicine_invoice_id = $medicine_invoice->id;  
                $invoice_medicine_list->medicine_id = $request->medicine_id[$i]; 
                $invoice_medicine_list->expiry_date = $request->expiry_date[$i]; 
                $invoice_medicine_list->quantity = $request->quantity[$i];  
                $invoice_medicine_list->price = $request->price[$i];    
                $invoice_medicine_list->save();       
                $medicine = Medicine::find($request->medicine_id[$i]);                   
                if(!empty($request->qty[$i]))  
                { 
                    $qty = $request->quantity[$i] - $request->qty[$i]; 
                } else {
                    $qty = $request->quantity[$i]; 
                }                    
                $medicine->quantity = $medicine->quantity - $qty;    
                if($medicine->quantity == 0)
                {
                    $medicine->status = 'Out of Stock';  
                }    
                $medicine->save();    
            }   
            DB::commit();
            toastr()->success('Medicine Invoice updated successfully.');    
            return redirect('medicine-invoice');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        } 
    }      
    
    public function getMedicineList(Request $request) {
        $medicine = Medicine::where('medicine_category_id', $request->medicine_category_id)->where('status', 'In Stock')->whereDate('expiry_date', '>', Carbon::today())->orderBy('created_at', 'DESC')->get();   
        return response()->json([ 
            'medicine' => $medicine 
        ]);        
    }   

    public function getMedicineDetails(Request $request) {  
        $medicine = Medicine::find($request->medicine_id);   
        return response()->json([ 
            'medicine' => $medicine 
        ]);  
    }  

    public function dashboard()   
    { 
        $medicine_invoice = MedicineInvoice::orderBy('created_at', 'DESC')->get(); 
        $medicine = Medicine::orderBy('created_at', 'DESC')->get();    
        $total_sales = 0;  
        foreach($medicine_invoice as $medicine_invoice) {
            $total_sales = $total_sales + $medicine_invoice->payment_amount; 
        }    
        $expired_medicine = []; 
        $stock_medicine = 0;    
        $out_of_stock = [];     
        $date = date('Y-m-d');   
        foreach($medicine as $medicine) {
            if($medicine->expiry_date < $date) {  
                array_push($expired_medicine, $medicine);   
            }  
            if($medicine->status == 'In Stock') {    
                $stock_medicine = $stock_medicine + 1;  
            }  
            if($medicine->status == 'Out of Stock') { 
                array_push($out_of_stock, $medicine);     
            }    
        }  
        $today_sales = MedicineInvoice::whereDate('created_at', Carbon::today())->orderBy('created_at', 'DESC')->get();  
        $today_purchase = PurchaseMedicine::whereDate('created_at', Carbon::today())->orderBy('created_at', 'DESC')->get();  
        return view('pharmacy-dashboard', compact('medicine_invoice', 'total_sales', 'expired_medicine', 'stock_medicine', 'out_of_stock', 'today_sales', 'today_purchase'));             
    }           
}  
