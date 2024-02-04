<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enquiry; 
use Illuminate\Support\Facades\DB; 

class EnquiryController extends Controller
{
    public function index()
    {
        $enquiry = Enquiry::orderBy('created_at', 'DESC')->get(); 
        return view('enquiry.index', compact('enquiry')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $enquiry = Enquiry::find($id);  
        $enquiry->delete();  
        toastr()->success('Enquiry deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('enquiry.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $enquiry = new Enquiry();
            $enquiry->name = $request->name; 
            $enquiry->contact = $request->contact; 
            $enquiry->enquiry_type = $request->enquiry_type; 
            $enquiry->description = $request->description; 
            $enquiry->status = $request->status;
            $enquiry->save();  
            DB::commit();
            toastr()->success('Enquiry created successfully.');  
            return redirect('enquiry');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $enquiry = Enquiry::find($id);  
        return view('enquiry.update', compact('enquiry'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $enquiry = Enquiry::find($id);   
            $enquiry->name = $request->name; 
            $enquiry->contact = $request->contact; 
            $enquiry->enquiry_type = $request->enquiry_type; 
            $enquiry->description = $request->description; 
            $enquiry->status = $request->status; 
            $enquiry->save();  
            DB::commit();
            toastr()->success('Enquiry updated successfully.');    
            return redirect('enquiry');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
}
