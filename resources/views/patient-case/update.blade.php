@section('title') {{ 'Update Patient' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Case Manager</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Patient</p>     
                </div>     
            </div> 
            <a href="{{ route('patient-case') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('patient-case.update.store', encrypt($patient_case->id)) }}" method="POST">         
                        @csrf    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>    
                                        {{ getPatient($patient_case->patient_id) }}    
                                    </select>   
                                </div>
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Case Manager <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="case_manager" required>  
                                        {{ getCaseManager($patient_case->case_manager) }}     
                                    </select>   
                                </div>
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Ref. Doctor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required>  
                                        {{ getDoctor($patient_case->doctor_id) }}     
                                    </select>   
                                </div>  
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Hospital Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="hospital_name" value="{{ $patient_case->hospital_name }}" required>
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Hospital Address <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="hospital_address" required>{{ $patient_case->hospital_address }}</textarea>     
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Doctor Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="doctor_name" value="{{ $patient_case->doctor_name }}" required>  
                                </div>
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>  
                                        {{ getStatus($patient_case->status) }}      
                                    </select>   
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Submit</button>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>       