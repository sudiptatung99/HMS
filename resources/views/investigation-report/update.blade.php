@section('title') {{ 'Investigation Report Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Investigation Report</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Investigation Report</p>   
                </div>     
            </div> 
            <a href="{{ route('investigation-report') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('investigation-report.update.store', encrypt($investigation_report->id)) }}" method="POST">         
                        @csrf   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>   
                                        {{ getPatient($investigation_report->patient_id) }}    
                                    </select>   
                                </div>  
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Date <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="date" value="{{ $investigation_report->date }}" required>
                                </div>  
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Title <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="title" value="{{ $investigation_report->title }}" required> 
                                </div> 
                            </div>     
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Description <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" required>{{ $investigation_report->description }}</textarea>    
                                </div>  
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Doctor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required>   
                                        {{ getDoctor($investigation_report->doctor_id) }}     
                                    </select>   
                                </div>  
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Image <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="image" accept="image/*">  
                                    <img src="{{ asset($investigation_report->image) }}" width="120" height="80" class="img-thumbnail mt-2">  
                                </div> 
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">  
                                    <select class="form-select js-select2" data-search="on" name="status" required>       
                                        {{ getStatus($investigation_report->status) }}         
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