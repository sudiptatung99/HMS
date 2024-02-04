<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;  

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::orderBy('created_at', 'DESC')->get(); 
        return view('service.index', compact('service')); 
    } 

    public function delete($id)
    {
        $id = decrypt($id);
        $service = Service::find($id);  
        $service->delete();  
        toastr()->success('Service deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('service.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $service = new Service();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->service_cost = $request->service_cost;  
            $service->status = $request->status;
            $service->save();  
            DB::commit();
            toastr()->success('Service created successfully.');  
            return redirect('service');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $service = Service::find($id);  
        return view('service.update', compact('service'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $service = Service::find($id);   
            $service->name = $request->name;
            $service->description = $request->description;
            $service->service_cost = $request->service_cost;
            $service->status = $request->status; 
            $service->save();  
            DB::commit();
            toastr()->success('Service updated successfully.');   
            return redirect('service');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    }  

    public function getServiceDetails(Request $request) { 
        $service = Service::find($request->service_id);      
        return response()->json([     
            'service' => $service  
        ]);    
    }  
}
