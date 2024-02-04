<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bed;
use Illuminate\Support\Facades\DB;

class BedController extends Controller
{
    public function index()
    {
        $bed = Bed::orderBy('created_at', 'DESC')->get();   
        return view('bed.index', compact('bed')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $bed = Bed::find($id);  
        $bed->delete();  
        toastr()->success('Bed deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('bed.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $bed = new Bed();
            $bed->room_id = $request->room_id; 
            $bed->bed_no = $request->bed_no; 
            $bed->bed_type = $request->bed_type; 
            $bed->bed_charge = $request->bed_charge; 
            $bed->status = $request->status; 
            $bed->save();  
            DB::commit();
            toastr()->success('Bed created successfully.');  
            return redirect('bed');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $bed = Bed::find($id);  
        return view('bed.update', compact('bed'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $bed = Bed::find($id);   
            $bed->room_id = $request->room_id; 
            $bed->bed_no = $request->bed_no; 
            $bed->bed_type = $request->bed_type; 
            $bed->bed_charge = $request->bed_charge; 
            $bed->status = $request->status;  
            $bed->save();  
            DB::commit();
            toastr()->success('Bed updated successfully.');     
            return redirect('bed');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 
}
