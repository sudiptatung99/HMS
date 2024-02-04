@section('title') {{ 'Birth Report Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Birth Report</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Birth Report</p>   
                </div>    
            </div> 
            <a href="{{ route('birth-report') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>     
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('birth-report.update.store', encrypt($birth_report->id)) }}" method="POST">        
                        @csrf 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>   
                                        {{ getPatient($birth_report->patient_id) }}    
                                    </select>     
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Date <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="date" value="{{ $birth_report->date }}" required>
                                </div>  
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Time <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control time-picker" name="time" value="{{ $birth_report->time }}" required>
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Weight <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="weight" value="{{ $birth_report->weight }}" required>
                                </div>
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Doctor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required>   
                                        {{ getDoctor($birth_report->doctor_id) }}     
                                    </select>   
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Description <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" required>{{ $birth_report->description }}</textarea>    
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