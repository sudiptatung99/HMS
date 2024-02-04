@section('title') {{ 'Package Update' }} @endsection
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Package</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Package</p>  
                </div>    
            </div> 
            <a href="{{ route('package') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>   
        </div>   
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('package.update.store', encrypt($package->id)) }}" method="POST">       
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Package Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" name="name" value="{{ $package->name }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Description <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" required>{{ $package->description }}</textarea>   
                                </div> 
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Package Including <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <table class="table table-bordered" id="service_list">     
                                        <thead>    
                                            <tr class="white-space-nowrap">  
                                                <th width="40%">Service <i class="text-danger">*</i></th> 
                                                <th width="30%">Rate <i class="text-danger">*</i></th>    
                                                <th width="25%">Quantity <i class="text-danger">*</i></th>   
                                                <th></th>        
                                            </tr>     
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp  
                                            @foreach($package_service as $key => $package_service)  
                                            @php $i = $no++; @endphp
                                                <tr @if($i != 1) id="row_{{ $i }}" @endif>   
                                                    <td>
                                                        <select class="form-select" name="service_id[]" id="service_id_{{ $i }}" required>   
                                                            {{ getService($package_service->service_id) }}           
                                                        </select>   
                                                    </td>   
                                                    <td>
                                                        <input type="text" class="form-control" name="service_cost[]" value="{{ $package_service->service->service_cost }}" id="rate_{{ $i }}" readonly>         
                                                    </td>      
                                                    <td>
                                                        <input type="number" class="form-control" name="quantity[]" value="{{ $package_service->quantity }}" required>             
                                                    </td>          
                                                    <td>
                                                        @if($i == 1)
                                                            <a class="btn btn-success add-record"><em class="icon ni ni-plus"></em></a>
                                                        @else 
                                                            <button type="button" class="btn btn-danger delete_row" data-row-id="{{ $i }}"><em class="icon ni ni-trash"></em></button>  
                                                        @endif                                                           
                                                    </td>       
                                                </tr>  
                                            @endforeach   
                                        </tbody> 
                                    </table>                                       
                                </div> 
                            </div>      
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>  
                                        {{ getStatus($package->status) }}      
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
<script>
    var total_rows = {{ $package_service->count() }};    
    $(document).on('click', '.add-record', function () { 
        var id = total_rows + 1; 
        var row = "<tr id='row_"+ id +"'><td><select class='form-select' name='service_id[]' id='service_id_"+ id +"' required><option value='' selected disabled>--</option>{{ getService('') }}</select></td><td><input type='text' class='form-control' name='service_cost[]' id='rate_"+ id +"' readonly></td><td><input type='number' class='form-control' name='quantity[]' required></td><td><button type='button' class='btn btn-danger delete_row' data-row-id='"+ id +"'><em class='icon ni ni-trash'></em></button></td></tr>";      
        $('#service_list').find('tbody').append(row);           
        total_rows = total_rows + 1;     
    });   
    $(document).on('click', '.delete_row', function (e) {  
        var del_row_id = $(this).data('rowId'); 
        $("#row_" + del_row_id).remove();        
    });        
</script>   
<script>
    for(let i = 1; i <= 500; i++) {
        $(document).on('change', '#service_id_'+ i +'', function (e) {    
            var service_id = e.target.value;   
            $.ajax({
                url: "{{ route('get.service.details') }}",  
                type: "POST",  
                data: {
                    "_token": "{{ csrf_token() }}",
                    "service_id": service_id
                },
                success: function (data) {
                    document.getElementById('rate_'+ i +'').value = data.service.service_cost;        
                }        
            })  
        }); 
    } 
</script>      