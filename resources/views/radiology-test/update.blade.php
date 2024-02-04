@section('title') {{ 'Radiology Test Update' }} @endsection 
<x-app-layout>  
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Test</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Test</p>  
                </div>    
            </div> 
            <a href="{{ route('radiology-test') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>    
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('radiology-test.update.store', encrypt($radiology_test->id)) }}" method="POST">           
                        @csrf     
                            <div class="row"> 
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Test Name <i class="text-danger">*</i></label> 
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" name="name" value="{{ $radiology_test->name }}" required>    
                                        </div>  
                                    </div>   
                                </div>
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Short Name <i class="text-danger">*</i></label> 
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" name="short_name" value="{{ $radiology_test->short_name }}" required>    
                                        </div>   
                                    </div>         
                                </div>  
                            </div>    
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Category <i class="text-danger">*</i></label> 
                                        <div class="col-sm-9">   
                                            <select class="form-select js-select2" data-search="on" name="category_id" required>   
                                                {{ getRadiologyCategory($radiology_test->category_id) }}       
                                            </select>        
                                        </div>   
                                    </div>       
                                </div>
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Method <i class="text-danger">*</i></label> 
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" name="method" value="{{ $radiology_test->method }}" required>    
                                        </div>   
                                    </div>         
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Amount <i class="text-danger">*</i></label> 
                                        <div class="col-sm-9">  
                                            <input type="number" class="form-control" name="amount" value="{{ $radiology_test->amount }}" id="amount" required>     
                                        </div>    
                                    </div>          
                                </div> 
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">GST (%) <i class="text-danger">*</i></label> 
                                        <div class="col-sm-9">   
                                            <input type="number" class="form-control" name="gst_percent" value="{{ $radiology_test->gst_percent }}" id="gst_percent" required>    
                                        </div>    
                                    </div>         
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">GST Amount</label> 
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" name="gst" value="{{ $radiology_test->gst }}" id="gst" readonly>     
                                        </div>   
                                    </div>             
                                </div> 
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Total</label>  
                                        <div class="col-sm-9">    
                                            <input type="text" class="form-control" name="total" value="{{ $radiology_test->total }}" id="total" readonly>    
                                        </div>    
                                    </div>           
                                </div>   
                            </div>    
                            <div class="table-responsive">
                                <table class="table table-bordered" id="parameter_list">      
                                    <thead>    
                                        <tr class="white-space-nowrap">  
                                            <th width="45%">Parameter Name <i class="text-danger">*</i></th> 
                                            <th width="30%">Reference Range <i class="text-danger">*</i></th>    
                                            <th width="20%">Unit <i class="text-danger">*</i></th>   
                                            <th></th>         
                                        </tr>      
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp  
                                        @foreach($test_parameter as $key => $test_parameter)  
                                        @php $i = $no++; @endphp
                                            <tr @if($i != 1) id="row_{{ $i }}" @endif>   
                                                <td>
                                                    <select class="form-select" name="parameter_id[]" id="parameter_id_{{ $i }}" required>     
                                                        {{ getRadiologyParameter($test_parameter->parameter_id) }}        
                                                    </select>     
                                                </td>    
                                                <td>  
                                                    <input type="text" class="form-control" value="{{ $test_parameter->parameter->range }}" id="parameter_range_{{ $i }}" readonly>           
                                                </td>   
                                                <td> 
                                                    <input type="text" class="form-control" value="{{ $test_parameter->parameter->unit }}" id="parameter_unit_{{ $i }}" readonly>        
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
                            <div class="row">  
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-8 mt-4 text-center"> 
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
    var total_rows = {{ $test_parameter->count() }};      
    $(document).on('click', '.add-record', function () { 
        var id = total_rows + 1; 
        var row = "<tr id='row_"+ id +"'><td><select class='form-select' name='parameter_id[]' id='parameter_id_"+ id +"' required><option value='' selected disabled>--</option>{{ getRadiologyParameter('') }}</select></td><td><input type='text' class='form-control' id='parameter_range_"+ id +"' readonly></td><td><input type='text' class='form-control' id='parameter_unit_"+ id +"' readonly></td><td><button type='button' class='btn btn-danger delete_row' data-row-id='"+ id +"'><em class='icon ni ni-trash'></em></button></td></tr>";      
        $('#parameter_list').find('tbody').append(row);               
        total_rows = total_rows + 1;        
    });   
    $(document).on('click', '.delete_row', function (e) {  
        var del_row_id = $(this).data('rowId'); 
        $("#row_" + del_row_id).remove();             
    });        
</script>     
<script>
    for(let i = 1; i <= 500; i++) {
        $(document).on('change', '#parameter_id_'+ i +'', function (e) {     
            var parameter_id = e.target.value;     
            $.ajax({
                url: "{{ route('get.radiology.parameter.details') }}",    
                type: "POST",  
                data: {
                    "_token": "{{ csrf_token() }}",
                    "parameter_id": parameter_id
                },  
                success: function (data) {                 
                    document.getElementById('parameter_range_'+ i +'').value = data.radiology_parameter.range;      
                    document.getElementById('parameter_unit_'+ i +'').value = data.radiology_parameter.unit;         
                }             
            })    
        });   
    }  
</script> 
<script>
    $(document).on('change', '#amount', function (e) {     
        var amount = e.target.value;  
        document.getElementById("gst_percent").value = ''; 
        document.getElementById("gst").value = '';     
        document.getElementById("total").value = amount;  
    }); 
    $(document).on('change', '#gst_percent', function (e) {     
        var gst_percent = e.target.value;  
        var amount = document.getElementById("amount").value;         
        gst = amount * gst_percent / 100;                          
        document.getElementById("gst").value = gst;                                                
        document.getElementById("total").value = Number(amount) + Number(gst);                                                   
    });      
</script>      