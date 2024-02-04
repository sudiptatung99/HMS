@section('title') {{ 'Ambulance Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Ambulance</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Ambulance</p>   
                </div>    
            </div> 
            <a href="{{ route('ambulance') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('ambulance.update.store', encrypt($ambulance->id)) }}" method="POST">         
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Vehicle Number <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="vehicle_number" value="{{ $ambulance->vehicle_number }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Vehicle Model <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="vehicle_model" value="{{ $ambulance->vehicle_model }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Year Made <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="year_made" value="{{ $ambulance->year_made }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Driver Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="driver_name" value="{{ $ambulance->driver_name }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Driver License <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="driver_license" value="{{ $ambulance->driver_license }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Driver Contact <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="driver_contact" value="{{ $ambulance->driver_contact }}" required>
                                </div>
                            </div>      
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Vehicle Type <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="vehicle_type" required>  
                                        {{ getVehicleType($ambulance->vehicle_type) }}      
                                    </select>   
                                </div>  
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Note</label>
                                <div class="col-sm-8"> 
                                    <textarea class="form-control" name="note">{{ $ambulance->note }}</textarea>     
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