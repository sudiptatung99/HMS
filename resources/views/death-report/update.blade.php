@section('title') {{ 'Death Report Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Death Report</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Death Report</p>   
                </div>     
            </div>   
            <a href="{{ route('death-report') }}" class="btn btn-white btn-outline-light">   
                <em class="icon ni ni-list"></em><span>List</span>  
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('death-report.update.store', encrypt($death_report->id)) }}" method="POST">         
                        @csrf   
                            <div class="row mb-4">  
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>  
                                        {{ getPatient($death_report->patient_id) }}     
                                    </select>     
                                </div>
                            </div>         
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Date of Death <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="date_of_death" value="{{ $death_report->date_of_death }}" required>
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Place of Death <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="place_of_death" value="{{ $death_report->place_of_death }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Address of the deceased at the time of death <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="deceased_address" value="{{ $death_report->deceased_address }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Permanent address of the deceased <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="deceased_permanent_address" value="{{ $death_report->deceased_permanent_address }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Doctor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required>   
                                        {{ getDoctor($death_report->doctor_id) }}      
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