@section('title') {{ 'Update Patient Case Study' }} @endsection   
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Patient Case Study</h3>    
                <div class="nk-block-des text-soft">
                    <p>Update Patient Case Study</p>    
                </div>    
            </div> 
            <a href="{{ route('patient-case-study') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>     
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('patient-case-study.update.store', encrypt($patient_case_study->id)) }}" method="POST">           
                        @csrf     
                            <div class="row mb-4">  
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>    
                                        {{ getPatient($patient_case_study->patient_id) }}     
                                    </select>   
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Food Allergies <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="food_allergies" value="{{ $patient_case_study->food_allergies }}" required>
                                </div>
                            </div>     
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Tendency Bleed <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="tendency_bleed" value="{{ $patient_case_study->tendency_bleed }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Heart Disease <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="heart_disease" value="{{ $patient_case_study->heart_disease }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">High Blood Pressure <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="high_blood_pressure" value="{{ $patient_case_study->high_blood_pressure }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Diabetic <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="diabetic" value="{{ $patient_case_study->diabetic }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Surgery <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="surgery" value="{{ $patient_case_study->surgery }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Accident <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="accident" value="{{ $patient_case_study->accident }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Others <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="others" value="{{ $patient_case_study->others }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Family Medical History <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="family_medical_history" value="{{ $patient_case_study->family_medical_history }}" required>
                                </div>
                            </div>       
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Current Medication <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="current_medication" value="{{ $patient_case_study->current_medication }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Female Pregnancy <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="female_pregnancy" value="{{ $patient_case_study->female_pregnancy }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Breast Feeding <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="breast_feeding" value="{{ $patient_case_study->breast_feeding }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Health Insurance <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="health_insurance" value="{{ $patient_case_study->health_insurance }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Low Income <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="low_income" value="{{ $patient_case_study->low_income }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Reference <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="reference" value="{{ $patient_case_study->reference }}" required> 
                                </div> 
                            </div>                           
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>   
                                        {{ getStatus($patient_case_study->status) }}       
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