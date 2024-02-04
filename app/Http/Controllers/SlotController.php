<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slot;
use Illuminate\Support\Facades\DB; 

class SlotController extends Controller
{
    public function index()
    {
        $slot = Slot::orderBy('created_at', 'DESC')->get(); 
        return view('slot.index', compact('slot')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $slot = Slot::find($id);  
        $slot->delete();  
        toastr()->success('Slot deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('slot.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $slot = new Slot();
            $slot->name = $request->name; 
            $slot->slot = $request->slot_start . ' - ' . $request->slot_end; 
            $slot->status = $request->status;
            $slot->save();  
            DB::commit();
            toastr()->success('Slot created successfully.');  
            return redirect('slot');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $slot = Slot::find($id);  
        return view('slot.update', compact('slot'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $slot = Slot::find($id);   
            $slot->name = $request->name;
            $slot->slot = $request->slot; 
            $slot->status = $request->status;
            $slot->save();  
            DB::commit();
            toastr()->success('Slot updated successfully.');    
            return redirect('slot');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  
}  
