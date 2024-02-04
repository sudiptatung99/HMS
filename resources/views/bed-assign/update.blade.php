@section('title') {{ 'Bed Assign Update' }} @endsection 
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Bed Assign</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Bed Assign</p>   
                </div>    
            </div> 
            <a href="{{ route('bed-assign') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('bed-assign.update.store', encrypt($bed_assign->id)) }}" method="POST">           
                        @csrf 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>    
                                        {{ getPatient($bed_assign->patient_id) }}      
                                    </select>    
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Room No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="room_id" id="room_id" required>    
                                        {{ getRoom($bed_assign->room_id) }}        
                                    </select>   
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Bed No. <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">  
                                    <select class="form-select js-select2" data-search="on" name="bed_id" id="bed_id" required>    
                                        @foreach($beds as $beds) 
                                            <option value="{{ $beds->id }}" @if($beds->id == $bed_assign->bed_id) selected @endif>{{ $beds->bed_no }}</option> 
                                        @endforeach  
                                    </select>     
                                </div>
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Assign Date <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">   
                                    <input type="text" class="form-control date-picker" name="assign_date" value="{{ $bed_assign->assign_date }}" required>   
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Description <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" required>{{ $bed_assign->description }}</textarea>    
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label>
                                <div class="col-sm-8">   
                                    <select class="form-select js-select2" data-search="on" name="status" required>     
                                        {{ getStatus($bed_assign->status) }}           
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
<script>
    $(document).on('change', '#room_id', function (e) {    
        var room_id = e.target.value;   
        var that = $(this);    
        $.ajax({
            url: "{{ route('get.bed.list') }}",  
            type: "POST", 
            data: {
                "_token": "{{ csrf_token() }}",
                "room_id": room_id
            },
            success: function (data) {
                that.parents().find('#bed_id').empty();  
                that.parents().find('#bed_id').append('<option value="" selected disabled>--</option> ');   
                $.each(data.bed, function (index, bed) {
                    that.parents().find('#bed_id').append('<option value="' + bed.id + '">' + bed.bed_no + '</option>'); 
                })    
            }      
        })  
    }); 
</script>     