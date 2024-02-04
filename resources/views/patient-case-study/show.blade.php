@section('title') {{ 'Case Study View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Case Study</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Case Study</p>    
                </div>    
            </div> 
            <a href="{{ route('patient-case-study') }}" class="btn btn-white btn-outline-light">   
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">   
                    <div class="card card-full"> 
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title mx-auto"> 
                                    <h6 class="title"><a href="{{ route('patient.show', encrypt($patient_case_study->patient_id)) }}">{{ $patient_case_study->patient->patient_id }}</a></h6>
                                </div> 
                            </div>
                        </div>
                        <div class="card-inner pt-0">
                            <ul class="my-n2">
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Food Allergies</div>
                                    <div class="sub-text">{{ $patient_case_study->food_allergies }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Tendency Bleed</div>
                                    <div class="sub-text">{{ $patient_case_study->tendency_bleed }}</div>
                                </li>  
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Heart Disease</div>
                                    <div class="sub-text">{{ $patient_case_study->heart_disease }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">High Blood Pressure</div>
                                    <div class="sub-text">{{ $patient_case_study->high_blood_pressure }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Diabetic</div>
                                    <div class="sub-text">{{ $patient_case_study->diabetic }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Surgery</div>
                                    <div class="sub-text">{{ $patient_case_study->surgery }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Accident</div>
                                    <div class="sub-text">{{ $patient_case_study->accident }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Others</div>
                                    <div class="sub-text">{{ $patient_case_study->others }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Family Medical History</div>
                                    <div class="sub-text">{{ $patient_case_study->family_medical_history }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Current Medication</div>
                                    <div class="sub-text">{{ $patient_case_study->current_medication }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Female Pregnancy</div>
                                    <div class="sub-text">{{ $patient_case_study->female_pregnancy }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Breast Feeding</div>
                                    <div class="sub-text">{{ $patient_case_study->breast_feeding }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Health Insurance</div>
                                    <div class="sub-text">{{ $patient_case_study->health_insurance }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Low Income</div>
                                    <div class="sub-text">{{ $patient_case_study->low_income }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Reference</div>
                                    <div class="sub-text">{{ $patient_case_study->reference }}</div>
                                </li>                                
                                <li class="align-center justify-between py-1 gx-1">
                                    <div class="lead-text">Status</div>
                                    <div class="sub-text">
                                        @if($patient_case_study->status == 'Active')
                                            <span class="badge badge-dot bg-success">{{ $patient_case_study->status }}</span>
                                        @elseif($patient_case_study->status == 'Inactive')  
                                            <span class="badge badge-dot bg-danger">{{ $patient_case_study->status }}</span>  
                                        @endif 
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>                      
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>      