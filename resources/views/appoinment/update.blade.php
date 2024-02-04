@section('title') {{ 'Appointment Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Appointment</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Appointment</p>   
                </div>    
            </div> 
            <a href="{{ route('appoinment') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>   
        </div>   
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('appoinment.update.store', encrypt($appoinment->id)) }}" method="POST">       
                        @csrf 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>    
                                        {{ getPatient($appoinment->patient_id) }}    
                                    </select>   
                                </div>
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Department <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">  
                                    <select class="form-select js-select2" data-search="on" name="department_id" required>  
                                        {{ getDepartment($appoinment->department_id) }}      
                                    </select>     
                                </div>  
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Doctor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required>   
                                        {{ getDoctor($appoinment->doctor_id) }}     
                                    </select>   
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Date <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="date" value="{{ $appoinment->date }}" required>
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Appoinment Date <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="appoinment_date" value="{{ $appoinment->appoinment_date }}" required>
                                </div> 
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Serial No. <i class="text-danger">*</i></label> 
                                <div class="col-sm-8"> 
                                    <input type="number" class="form-control" name="serial_no" value="{{ $appoinment->serial_no }}" required>
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Problem <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <textarea class="form-control" name="problem" required>{{ $appoinment->problem }}</textarea>    
                                </div> 
                            </div>     
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>    
                                        {{ getStatus($appoinment->status) }}     
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