@section('title') {{ 'Room Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Room</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Room</p>   
                </div>    
            </div> 
            <a href="{{ route('room') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>   
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('room.update.store', encrypt($room->id)) }}" method="POST">          
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Room No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="room_no" value="{{ $room->room_no }}" required> 
                                </div>
                            </div> 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Room Type <i class="text-danger">*</i></label>  
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" data-search="on" name="room_type" required>   
                                        {{ getRoomType($room->room_type) }}     
                                    </select>   
                                </div>   
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Bed Capacity <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="number" class="form-control" name="bed_capacity" value="{{ $room->bed_capacity }}" required>  
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