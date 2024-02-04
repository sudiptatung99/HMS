<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\DB; 
    
class DoctorController extends Controller
{
    public function index() 
    {  
        $doctor = Doctor::orderBy('created_at', 'DESC')->get();     
        return view('doctor.index', compact('doctor'));  
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $doctor = Doctor::find($id);  
        return view('doctor.show', compact('doctor'));       
    }   

    public function delete($id)
    {
        $id = decrypt($id);
        $doctor = Doctor::find($id);  
        $doctor->delete();  
        toastr()->success('Doctor deleted successfully.');    
        return back();    
    } 

    public function create()
    {   
        return view('doctor.create');     
    }    

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $doctor = new Doctor();
            $doctor->name = $request->name; 
            $doctor->email = $request->email;
            $doctor->department_id = $request->department_id;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/doctor-image/'), $filename);   
                $doctor->image = '/uploads/doctor-image/'.$filename;       
            }
            $doctor->dob = $request->dob;
            $doctor->gender = $request->gender;
            $doctor->blood_group = $request->blood_group;
            $doctor->designation_id = $request->designation_id; 
            $doctor->address = $request->address;
            $doctor->contact = $request->contact;
            $doctor->emergency_contact = $request->emergency_contact;
            $doctor->career_title = $request->career_title;
            if($request->hasfile('resume'))      
            {
                $file = $request->file('resume'); 
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/doctor-resume/'), $filename);   
                $doctor->resume = '/uploads/doctor-resume/'.$filename;        
            }  
            $doctor->short_biogrphy = $request->short_biogrphy;
            $doctor->specialist = $request->specialist;
            $doctor->language = $request->language;
            $doctor->status = $request->status; 
            $doctor->save();  
            DB::commit();
            toastr()->success('Doctor created successfully.');  
            return redirect('doctor');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $doctor = Doctor::find($id);  
        return view('doctor.update', compact('doctor'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $doctor = Doctor::find($id);   
            $doctor->name = $request->name; 
            $doctor->email = $request->email;
            $doctor->department_id = $request->department_id;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/doctor-image/'), $filename);   
                $doctor->image = '/uploads/doctor-image/'.$filename;       
            }
            $doctor->dob = $request->dob;
            $doctor->gender = $request->gender;
            $doctor->blood_group = $request->blood_group;
            $doctor->designation_id = $request->designation_id;
            $doctor->address = $request->address;
            $doctor->contact = $request->contact;
            $doctor->emergency_contact = $request->emergency_contact;
            $doctor->career_title = $request->career_title;
            if($request->hasfile('resume'))      
            {
                $file = $request->file('resume'); 
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/doctor-resume/'), $filename);   
                $doctor->resume = '/uploads/doctor-resume/'.$filename;        
            }  
            $doctor->short_biogrphy = $request->short_biogrphy;
            $doctor->specialist = $request->specialist;
            $doctor->language = $request->language;
            $doctor->status = $request->status;      
            $doctor->save();  
            DB::commit();
            toastr()->success('Doctor updated successfully.');    
            return redirect('doctor');      
        } catch (\Exception $e) {   
            DB::rollBack();
            return $e->getMessage();
        }
    } 
}
