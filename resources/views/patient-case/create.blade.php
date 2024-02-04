@section('title') {{ 'Add Patient' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Case Manager</h3>  
                <div class="nk-block-des text-soft">
                    <p>Add Patient</p>   
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
                        <form action="{{ route('patient-case.store') }}" method="POST">        
                        @csrf  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>   
                                        <option value="" selected disabled></option> 
                                        {{ getPatient('') }}    
                                    </select>   
                                </div>
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Case Manager <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="case_manager" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getCaseManager('') }}     
                                    </select>   
                                </div>   
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Ref. Doctor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required>   
                                        <option value="" selected disabled></option>  
                                        {{ getDoctor('') }}     
                                    </select>   
                                </div>  
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Hospital Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="hospital_name" required>
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Hospital Address <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="hospital_address" required></textarea>    
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Doctor Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="doctor_name" required>  
                                </div>
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getStatus('') }}     
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