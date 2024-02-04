<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ambulance;
use Illuminate\Support\Facades\DB; 

class AmbulanceController extends Controller
{
    public function index()
    {
        $ambulance = Ambulance::orderBy('created_at', 'DESC')->get(); 
        return view('ambulance.index', compact('ambulance')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $ambulance = Ambulance::find($id);  
        $ambulance->delete();  
        toastr()->success('Ambulance deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('ambulance.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction(); 
            $ambulance = new Ambulance();
            $ambulance->vehicle_number = $request->vehicle_number;
            $ambulance->vehicle_model = $request->vehicle_model;
            $ambulance->year_made = $request->year_made;
            $ambulance->driver_name = $request->driver_name;
            $ambulance->driver_license = $request->driver_license;
            $ambulance->driver_contact = $request->driver_contact;
            $ambulance->vehicle_type = $request->vehicle_type;
            $ambulance->note = $request->note; 
            $ambulance->save();  
            DB::commit();
            toastr()->success('Ambulance created successfully.');  
            return redirect('ambulance');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $ambulance = Ambulance::find($id);  
        return view('ambulance.update', compact('ambulance'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $ambulance = Ambulance::find($id);   
            $ambulance->vehicle_number = $request->vehicle_number;
            $ambulance->vehicle_model = $request->vehicle_model;
            $ambulance->year_made = $request->year_made;
            $ambulance->driver_name = $request->driver_name;
            $ambulance->driver_license = $request->driver_license;
            $ambulance->driver_contact = $request->driver_contact;
            $ambulance->vehicle_type = $request->vehicle_type;
            $ambulance->note = $request->note;  
            $ambulance->save();  
            DB::commit();
            toastr()->success('Ambulance updated successfully.');   
            return redirect('ambulance');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  

    public function getAmbulanceDetails(Request $request) {  
        $ambulance = Ambulance::find($request->ambulance_id);      
        return response()->json([     
            'ambulance' => $ambulance 
        ]);   
    }  
}
