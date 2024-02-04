@section('title') {{ 'Time Slot Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Time Slot</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Time Slot</p>   
                </div>    
            </div> 
            <a href="{{ route('slot') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>   
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">
                        <form action="{{ route('slot.update.store', encrypt($slot->id)) }}" method="POST">       
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Slot Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{ $slot->name }}" required>
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Slot <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" placeholder="08:00 - 12:00" class="form-control" name="slot" value="{{ $slot->slot }}" required>  
                                </div>  
                            </div>     
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>  
                                        {{ getStatus($slot->status) }}       
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