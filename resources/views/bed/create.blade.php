@section('title') {{ 'Bed Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Bed</h3>  
                <div class="nk-block-des text-soft">
                    <p>Create Bed</p>  
                </div>    
            </div> 
            <a href="{{ route('bed') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>   
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('bed.store') }}" method="POST">         
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Room No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="room_id" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getRoom('') }}      
                                    </select>   
                                </div>
                            </div> 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Bed No. <i class="text-danger">*</i></label>  
                                <div class="col-sm-8"> 
                                    <input type="number" class="form-control" name="bed_no" required> 
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Bed Type <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" data-search="on" name="bed_type" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getBedType('') }}       
                                    </select>      
                                </div> 
                            </div>     
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Bed Charge <i class="text-danger">*</i></label>  
                                <div class="col-sm-8"> 
                                    <input type="number" class="form-control" name="bed_charge" required>   
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label>
                                <div class="col-sm-8">   
                                    <select class="form-select js-select2" data-search="on" name="status" required>   
                                        <option value="" selected disabled></option> 
                                        {{ getBedStatus('') }}        
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