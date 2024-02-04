<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nurse;
use Illuminate\Support\Facades\DB; 
 
class NurseController extends Controller
{
    public function index()
    {
        $nurse = Nurse::orderBy('created_at', 'DESC')->get();      
        return view('nurse.index', compact('nurse')); 
    } 

    public function show($id)  
    {   
        $id = decrypt($id);
        $nurse = Nurse::find($id);  
        return view('nurse.show', compact('nurse'));        
    }    

    public function delete($id)
    {
        $id = decrypt($id);
        $nurse = Nurse::find($id);  
        $nurse->delete();  
        toastr()->success('Nurse deleted successfully.');    
        return back();    
    } 

    public function create()
    {    
        return view('nurse.create');     
    }   

    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            $nurse = new Nurse();
            $nurse->name = $request->name; 
            $nurse->email = $request->email;
            $nurse->department_id = $request->department_id;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/nurse-image/'), $filename);   
                $nurse->image = '/uploads/nurse-image/'.$filename;         
            }   
            $nurse->dob = $request->dob;
            $nurse->gender = $request->gender;
            $nurse->blood_group = $request->blood_group;
            $nurse->designation_id = $request->designation_id;
            $nurse->address = $request->address;
            $nurse->contact = $request->contact;
            $nurse->emergency_contact = $request->emergency_contact;
            $nurse->career_title = $request->career_title;
            if($request->hasfile('resume'))      
            {
                $file = $request->file('resume'); 
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/nurse-resume/'), $filename);   
                $nurse->resume = '/uploads/nurse-resume/'.$filename;         
            }  
            $nurse->short_biogrphy = $request->short_biogrphy;
            $nurse->specialist = $request->specialist;
            $nurse->language = $request->language;
            $nurse->status = $request->status;  
            $nurse->save();  
            DB::commit();
            toastr()->success('Nurse created successfully.');  
            return redirect('nurse');   
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage();
        }
    } 

    public function update($id) 
    { 
        $id = decrypt($id);
        $nurse = Nurse::find($id);  
        return view('nurse.update', compact('nurse'));      
    } 

    public function updateStore(Request $request, $id) 
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $nurse = Nurse::find($id);   
            $nurse->name = $request->name; 
            $nurse->email = $request->email;
            $nurse->department_id = $request->department_id;
            if($request->hasfile('image'))      
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/nurse-image/'), $filename);   
                $nurse->image = '/uploads/nurse-image/'.$filename;         
            }   
            $nurse->dob = $request->dob;
            $nurse->gender = $request->gender;
            $nurse->blood_group = $request->blood_group;
            $nurse->designation_id = $request->designation_id; 
            $nurse->address = $request->address;
            $nurse->contact = $request->contact;
            $nurse->emergency_contact = $request->emergency_contact;
            $nurse->career_title = $request->career_title;
            if($request->hasfile('resume'))      
            {
                $file = $request->file('resume'); 
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/nurse-resume/'), $filename);   
                $nurse->resume = '/uploads/nurse-resume/'.$filename;         
            }  
            $nurse->short_biogrphy = $request->short_biogrphy;
            $nurse->specialist = $request->specialist;
            $nurse->language = $request->language;
            $nurse->status = $request->status;    
            $nurse->save();  
            DB::commit();
            toastr()->success('Nurse updated successfully.');    
            return redirect('nurse');     
        } catch (\Exception $e) { 
            DB::rollBack();
            return $e->getMessage(); 
        }
    } 
}
