<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BedAssign;
use App\Models\Bed; 
use Illuminate\Support\Facades\DB;  

class BedAssignController extends Controller
{
    public function index()
    {
        $bed_assign = BedAssign::orderBy('created_at', 'DESC')->get(); 
        return view('bed-assign.index', compact('bed_assign'));  
    }  

    public function bedManagementReport() 
    {
        $start_date = '';
        $end_date = '';  
        $bed_assign = BedAssign::orderBy('created_at', 'DESC')->get(); 
        $bed_total_charge = 0; 
        for($i = 0; $i < count($bed_assign); $i++) 
        {
            $bed_total_charge = $bed_total_charge + $bed_assign[$i]->bed->bed_charge;  
        }  
        return view('bed-assign.report', compact('bed_assign', 'bed_total_charge', 'start_date', 'end_date'));    
    }   

    public function bedManagementReportSearch(Request $request)   
    { 
        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $bed_assign = BedAssign::whereBetween('created_at', [$start_date, $end_date])->orderBy('created_at', 'DESC')->get(); 
        $bed_total_charge = 0;   
        for($i = 0; $i < count($bed_assign); $i++) 
        {
            $bed_total_charge = $bed_total_charge + $bed_assign[$i]->bed->bed_charge;  
        }  
        return view('bed-assign.report', compact('bed_assign', 'bed_total_charge', 'start_date', 'end_date'));     
    }    

    public function delete($id)
    {
        $id = decrypt($id);
        $bed_assign = BedAssign::find($id);  
        $bed = Bed::find($bed_assign->bed_id); 
        $bed->status = 'Available';  
        $bed->save();           
        $bed_assign->delete();  
        toastr()->success('Bed Assign deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('bed-assign.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $bed_assign = new BedAssign();
            $bed_assign->patient_id = $request->patient_id;
            $bed_assign->room_id = $request->room_id;
            $bed_assign->bed_id = $request->bed_id;
            $bed_assign->assign_date = $request->assign_date; 
            $bed_assign->description = $request->description;
            $bed_assign->status = $request->status;
            $bed_assign->save();  
            $bed = Bed::find($request->bed_id); 
            $bed->status = 'Booked'; 
            $bed->save(); 
            DB::commit();
            toastr()->success('Bed Assign created successfully.');  
            return redirect('bed-assign');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $bed_assign = BedAssign::find($id);  
        $beds = Bed::where('room_id', $bed_assign->room_id)->orderBy('created_at', 'DESC')->get();  
        return view('bed-assign.update', compact('bed_assign', 'beds'));        
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $bed_assign = BedAssign::find($id);   
            $bed_assign->patient_id = $request->patient_id;
            $bed_assign->room_id = $request->room_id;
            if($bed_assign->bed_id != $request->bed_id)
            {
                $bed_add = Bed::find($request->bed_id); 
                $bed_add->status = 'Booked';  
                $bed_add->save();   
                $bed_free = Bed::find($bed_assign->bed_id);  
                $bed_free->status = 'Available';   
                $bed_free->save();   
            } 
            $bed_assign->bed_id = $request->bed_id;
            $bed_assign->assign_date = $request->assign_date; 
            $bed_assign->description = $request->description;
            $bed_assign->status = $request->status; 
            $bed_assign->save();  
            DB::commit();
            toastr()->success('Bed Assign updated successfully.');   
            return redirect('bed-assign');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage(); 
        }
    }  

    public function getBedList(Request $request) {
        $bed = Bed::where('room_id', $request->room_id)->where('status', 'Available')->orderBy('created_at', 'DESC')->get();    
        return response()->json([   
            'bed' => $bed 
        ]);   
    }    
}
