<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PackageService;  
use Illuminate\Support\Facades\DB;  

class PackageController extends Controller
{
    public function index()
    {
        $package = Package::orderBy('created_at', 'DESC')->get(); 
        return view('package.index', compact('package')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $package = Package::find($id);  
        $package_service = PackageService::where('package_id', $package->id)->orderBy('created_at', 'DESC')->get();      
        return view('package.show', compact('package', 'package_service'));           
    }    

    public function delete($id)
    {
        $id = decrypt($id);
        $package = Package::find($id);  
        $package->delete();  
        toastr()->success('Package deleted successfully.');    
        return back();    
    } 

    public function create()
    {
        return view('package.create');   
    } 

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $package = new Package();
            $package->name = $request->name;
            $package->description = $request->description;  
            $package->status = $request->status; 
            $package->save();               
            $total_package_cost = 0;              
            for($i = 0; $i < count($request->service_id); $i++) 
            { 
                $total_package_cost = $total_package_cost + ($request->service_cost[$i] * $request->quantity[$i]);     
                $package_service = new PackageService();  
                $package_service->package_id = $package->id;  
                $package_service->service_id = $request->service_id[$i];   
                $package_service->quantity = $request->quantity[$i];    
                $package_service->save();      
            }   
            $package_cost = Package::find($package->id);    
            $package_cost->package_cost = $total_package_cost;  
            $package_cost->save();   
            DB::commit();
            toastr()->success('Package created successfully.');  
            return redirect('package');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $package = Package::find($id);  
        $package_service = PackageService::where('package_id', $package->id)->orderBy('created_at', 'DESC')->get();   
        return view('package.update', compact('package', 'package_service'));        
    }    

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $package = Package::find($id);   
            $package->name = $request->name;
            $package->description = $request->description;   
            $package->status = $request->status; 
            $package->save();             
            $exist_package_service = PackageService::where('package_id', $package->id)->orderBy('created_at', 'DESC')->get();   
            foreach($exist_package_service as $exist_package_service)
            {
                PackageService::destroy($exist_package_service->id); 
            } 
            $total_package_cost = 0;     
            for($i = 0; $i < count($request->service_id); $i++) 
            { 
                $total_package_cost = $total_package_cost + ($request->service_cost[$i] * $request->quantity[$i]);     
                $package_service = new PackageService();  
                $package_service->package_id = $package->id;  
                $package_service->service_id = $request->service_id[$i];   
                $package_service->quantity = $request->quantity[$i];    
                $package_service->save();      
            }   
            $package_cost = Package::find($package->id);    
            $package_cost->package_cost = $total_package_cost;  
            $package_cost->save();     
            DB::commit();
            toastr()->success('Package updated successfully.');    
            return redirect('package');    
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 
}
