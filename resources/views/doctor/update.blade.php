@section('title') {{ 'Doctor Update' }} @endsection 
<x-app-layout>  
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Doctor</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Doctor</p>   
                </div>    
            </div> 
            <a href="{{ route('doctor') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>    
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card"> 
                    <div class="card-body mt-3">  
                        <form action="{{ route('doctor.update.store', encrypt($doctor->id)) }}" method="POST" enctype="multipart/form-data">            
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{ $doctor->name }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Email <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" value="{{ $doctor->email }}" required>
                                </div>
                            </div>      
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Department <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">  
                                    <select class="form-select js-select2" data-search="on" name="department_id" required>   
                                        {{ getDepartment($doctor->department_id) }}      
                                    </select>      
                                </div>    
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Image <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="image" accept="image/*">  
                                    <img src="{{ asset($doctor->image) }}" width="100" height="70" class="img-thumbnail mt-2">  
                                </div> 
                            </div>     
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Date of Birth <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="dob" value="{{ $doctor->dob }}" required>
                                </div> 
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Gender <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="gender" required>   
                                        {{ getGender($doctor->gender) }}        
                                    </select>       
                                </div>
                            </div> 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Blood Group <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">  
                                    <select class="form-select js-select2" data-search="on" name="blood_group" required>   
                                        {{ getBloodGroup($doctor->blood_group) }}     
                                    </select>       
                                </div>
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Designation <i class="text-danger">*</i></label> 
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" data-search="on" name="designation_id" required>   
                                        {{ getDesignation($doctor->designation_id) }}      
                                    </select>      
                                </div>    
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Address <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="address" required>{{ $doctor->address }}</textarea>   
                                </div> 
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Contact No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="contact" value="{{ $doctor->contact }}" required>
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Emergency Contact No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="emergency_contact" value="{{ $doctor->emergency_contact }}" required>
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Career Title <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="career_title" value="{{ $doctor->career_title }}" required>  
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Resume <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="resume" accept=".doc, .docx, .pdf">  
                                    <a href="{{ $doctor->resume }}" class="fw-bold" download style="float: right; margin-top: 5px;">Download Resume</a>   
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Short Biogrphy <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="short_biogrphy" required>{{ $doctor->short_biogrphy }}</textarea>     
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Specialist <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="specialist" value="{{ $doctor->specialist }}" required> 
                                </div>
                            </div> 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Language <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">  
                                    <select class="form-select js-select2" data-search="on" name="language" required>     
                                        {{ getLanguage($doctor->language) }}      
                                    </select>        
                                </div>
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">  
                                    <select class="form-select js-select2" data-search="on" name="status" required>       
                                        {{ getStatus($doctor->status) }}       
                                    </select>          
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Update</button>   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>       