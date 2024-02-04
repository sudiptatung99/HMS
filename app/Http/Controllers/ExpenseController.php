<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\DB; 
 
class ExpenseController extends Controller
{
    public function index() 
    {  
        $expense = Expense::orderBy('created_at', 'DESC')->get();     
        return view('expense.index', compact('expense'));  
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $expense = Expense::find($id);  
        return view('expense.show', compact('expense'));       
    }   

    public function delete($id)
    {
        $id = decrypt($id);
        $expense = Expense::find($id);  
        $expense->delete();  
        toastr()->success('Expense deleted successfully.');    
        return back();    
    } 

    public function create()
    {   
        return view('expense.create');     
    }    

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $expense = new Expense();
            $expense->date = $request->date; 
            $expense->expense = $request->expense;
            $expense->pay_to_whom = $request->pay_to_whom;
            $expense->amount = $request->amount;
            $expense->payment_mode = $request->payment_mode;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/expense-image/'), $filename);   
                $expense->image = '/uploads/expense-image/'.$filename;       
            }
            $expense->details = $request->details; 
            $expense->save();  
            DB::commit();
            toastr()->success('Expense created successfully.');  
            return redirect('expense');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $expense = Expense::find($id);  
        return view('expense.update', compact('expense'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $expense = Expense::find($id);   
            $expense->date = $request->date; 
            $expense->expense = $request->expense;
            $expense->pay_to_whom = $request->pay_to_whom;
            $expense->amount = $request->amount;
            $expense->payment_mode = $request->payment_mode;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/expense-image/'), $filename);   
                $expense->image = '/uploads/expense-image/'.$filename;       
            }
            $expense->details = $request->details;       
            $expense->save();  
            DB::commit();
            toastr()->success('Expense updated successfully.');    
            return redirect('expense');      
        } catch (\Exception $e) {   
            DB::rollBack();
            return $e->getMessage();
        }
    }  
}
