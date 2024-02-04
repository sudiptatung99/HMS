@section('title') {{ 'Schedule Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Schedule</h3>  
                <div class="nk-block-des text-soft">
                    <p>Create Schedule</p>  
                </div>    
            </div> 
            <a href="{{ route('schedule') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">   
                        <form action="{{ route('schedule.store') }}" method="POST">       
                        @csrf 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Slot Name <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="slot_id" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getSlot('') }}      
                                    </select>     
                                </div>   
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Doctor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getDoctor('') }}     
                                    </select>   
                                </div>
                            </div> 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Available Days <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="available_days" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getDays('') }}      
                                    </select>   
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Available Time <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" placeholder="Start Time" class="form-control time-picker" name="available_start_time" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="End Time" class="form-control time-picker" name="available_end_time" required>  
                                        </div>  
                                    </div>
                                </div>
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Per Patient Time <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="time" class="form-control" name="per_patient_time" required> 
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