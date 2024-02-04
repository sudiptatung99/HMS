@section('title') {{ 'Medicine Purchase Create' }} @endsection 
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Medicine Purchase</h3>  
                <div class="nk-block-des text-soft">
                    <p>Create Medicine Purchase</p>   
                </div>    
            </div> 
            <a href="{{ route('purchase-medicine') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('purchase-medicine.store') }}" method="POST">          
                        @csrf                                
                            <div class="table-responsive">
                                <table class="table table-bordered" id="medicine_list">     
                                    <thead>   
                                        <tr class="white-space-nowrap">  
                                            <th width="16%">Medicine <i class="text-danger">*</i></th>   
                                            <th width="12%">Batches <i class="text-danger">*</i></th>    
                                            <th width="12%">Expiry Date <i class="text-danger">*</i></th>
                                            <th width="12%">MRP/Unit <i class="text-danger">*</i></th> 
                                            <th width="12%">Quantity <i class="text-danger">*</i></th>     
                                            <th width="12%">Subtotal <i class="text-danger">*</i></th>  
                                            <th width="12%">Discount <i class="text-danger">*</i></th> 
                                            <th width="12%">Total <i class="text-danger">*</i></th> 
                                            <th></th>          
                                        </tr>     
                                    </thead>
                                    <tbody>
                                        <tr id="row_1"> 
                                            <td>
                                                <input type="text" class="form-control" name="medicine_name[]" required>     
                                            </td> 
                                            <td>
                                                <input type="text" class="form-control" name="medicine_batch[]" required>     
                                            </td>    
                                            <td>
                                                <input type="date" class="form-control" name="medicine_expiry_date[]" required>      
                                            </td> 
                                            <td>
                                                <input type="number" min="1" class="form-control" name="medicine_mrp_per_unit[]" required>      
                                            </td>   
                                            <td>
                                                <input type="number" min="1" class="form-control" name="medicine_quantity[]" required>         
                                            </td>  
                                            <td>
                                                <input type="number" min="1" class="form-control" name="medicine_sub_total[]" required>          
                                            </td> 
                                            <td>
                                                <input type="number" min="1" class="form-control" name="medicine_discount[]" required>          
                                            </td> 
                                            <td>
                                                <input type="number" min="1" class="form-control" name="medicine_total[]" required>              
                                            </td>     
                                            <td><a class="btn btn-success add-record"><em class="icon ni ni-plus"></em></a></td>      
                                        </tr>    
                                    </tbody>   
                                </table>                                    
                            </div>
                            <div class="divider"></div>  
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Purchase Date <i class="text-danger">*</i></label> 
                                                <input type="text" class="form-control date-picker" name="date" required>            
                                            </div>   
                                        </div> 
                                        <div class="col-sm-12 mt-3">  
                                            <div class="form-group">
                                                <label>Invoice ID <i class="text-danger">*</i></label>   
                                                <input type="text" class="form-control" name="invoice_id" required>          
                                            </div>     
                                        </div>  
                                        <div class="col-sm-12 mt-3">  
                                            <div class="form-group">
                                                <label>Manufacturer <i class="text-danger">*</i></label>    
                                                <input type="text" class="form-control" name="manufacturer" required>          
                                            </div>      
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <table width="100%">   
                                        <tbody> 
                                            <tr>
                                                <th width="40%">Sub Total ({{ env('CURRENCY_SYMBOL') }}) <i class="text-danger">*</i></th>
                                                <td width="60%" colspan="2">  
                                                    <input type="number" min="1" name="sub_total" style="width: 80%; float: right;" class="form-control" required>  
                                                </td>
                                            </tr>  
                                            <tr> 
                                                <th width="40%">Discount ({{ env('CURRENCY_SYMBOL') }}) <i class="text-danger">*</i></th>
                                                <td width="60%" colspan="2">  
                                                    <input type="number" min="1" name="discount" style="width: 80%; float: right;" class="form-control" required>  
                                                </td>  
                                            </tr>   
                                            <tr>
                                                <th width="40%">GST ({{ env('CURRENCY_SYMBOL') }}) <i class="text-danger">*</i></th>    
                                                <td width="60%" colspan="2">  
                                                    <input type="number" min="1" name="gst" style="width: 80%; float: right;" class="form-control" required>     
                                                </td>  
                                            </tr>
                                            <tr>
                                                <th width="40%">Total ({{ env('CURRENCY_SYMBOL') }}) <i class="text-danger">*</i></th>  
                                                <td width="60%" colspan="2">  
                                                    <input type="number" min="1" name="total" style="width: 80%; float: right;" class="form-control" required>       
                                                </td>     
                                            </tr>  
                                        </tbody>
                                    </table>  
                                    <div class="row mt-3">   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Mode <i class="text-danger">*</i></label> 
                                                <select class="form-select js-select2" data-search="on" name="payment_mode" required>
                                                    <option value="" selected disabled></option>   
                                                    {{ getPaymentMethod('') }}       
                                                </select> 
                                            </div>
                                        </div> 
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Amount ({{ env('CURRENCY_SYMBOL') }}) <i class="text-danger">*</i></label>  
                                                <input type="number" min="1" name="payment_amount" class="form-control" required>        
                                            </div>   
                                        </div>         
                                    </div>
                                </div> 
                            </div>     
                            <div class="row">  
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-8 mt-4 text-center"> 
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
    var total_rows = 1;  
    $(document).on('click', '.add-record', function () { 
        var id = total_rows + 1; 
        var row = "<tr id='row_"+ id +"'><td><input type='text' class='form-control' name='medicine_name[]' required></td><td><input type='text' class='form-control' name='medicine_batch[]' required></td><td><input type='date' class='form-control' name='medicine_expiry_date[]' required></td><td><input type='number' min='1' class='form-control' name='medicine_mrp_per_unit[]' required></td><td><input type='number' min='1' class='form-control' name='medicine_quantity[]' required></td><td><input type='number' min='1' class='form-control' name='medicine_sub_total[]' required></td><td><input type='number' min='1' class='form-control' name='medicine_discount[]' required></td><td><input type='number' min='1' class='form-control' name='medicine_total[]' required></td><td><button type='button' class='btn btn-danger delete_row' data-row-id='"+ id +"'><em class='icon ni ni-trash'></em></button></td></tr>";        
        $('#medicine_list').find('tbody').append(row);              
        total_rows = total_rows + 1;        
    });   
    $(document).on('click', '.delete_row', function (e) {  
        var del_row_id = $(this).data('rowId'); 
        $("#row_" + del_row_id).remove();        
    });        
</script>     
<style>
    .divider {
        background: #e4e3e3;
        height: 1px;
        clear: both;
        margin-bottom: 15px;
        margin-top: 15px;  
    }   
</style>  