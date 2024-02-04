@section('title') {{ 'Bed Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Bed</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Bed</p>  
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
                        <form action="{{ route('bed.update.store', encrypt($bed->id)) }}" method="POST">          
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Room No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="room_id" required>   
                                        {{ getRoom($bed->room_id) }}      
                                    </select>    
                                </div>
                            </div> 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Bed No. <i class="text-danger">*</i></label>  
                                <div class="col-sm-8"> 
                                    <input type="number" class="form-control" name="bed_no" value="{{ $bed->bed_no }}" required> 
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Bed Type <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" data-search="on" name="bed_type" required>   
                                        {{ getBedType($bed->bed_type) }}       
                                    </select>     
                                </div>
                            </div>     
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Bed Charge <i class="text-danger">*</i></label>  
                                <div class="col-sm-8"> 
                                    <input type="number" class="form-control" name="bed_charge" value="{{ $bed->bed_charge }}" required>   
                                </div> 
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label>
                                <div class="col-sm-8">   
                                    <select class="form-select js-select2" data-search="on" name="status" required>     
                                        {{ getBedStatus($bed->status) }}         
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