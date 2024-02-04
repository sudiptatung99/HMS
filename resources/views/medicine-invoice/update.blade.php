@section('title') {{ 'Medicine Invoice Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Medicine Invoice</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Medicine Invoice</p>   
                </div>    
            </div> 
            <a href="{{ route('medicine-invoice') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>   
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('medicine-invoice.update.store', encrypt($medicine_invoice->id)) }}" method="POST">         
                        @csrf                                  
                            <div class="table-responsive">
                                <table class="table table-bordered" id="medicine_list">     
                                    <thead>   
                                        <tr class="white-space-nowrap">  
                                            <th width="20%">Category <i class="text-danger">*</i></th> 
                                            <th width="20%">Medicine <i class="text-danger">*</i></th>    
                                            <th width="12%">Expiry Date <i class="text-danger">*</i></th>
                                            <th width="15%">Qty <i class="text-danger">*</i> | Available</th> 
                                            <th width="15%">Sale Price ({{ env('CURRENCY_SYMBOL') }}) <i class="text-danger">*</i></th>    
                                            <th width="15%">Amount ({{ env('CURRENCY_SYMBOL') }})<i class="text-danger">*</i></th>  
                                            <th></th>       
                                        </tr>     
                                    </thead>
                                    <tbody>  
                                        @php $no = 1; @endphp  
                                        @foreach($invoice_medicine_list as $key => $invoice_medicine_list)  
                                        @php $i = $no++; @endphp   
                                            <tr @if($i != 1) id="row_{{ $i }}" @endif>   
                                                <td>
                                                    {{ getMedicineCategoryDetails($invoice_medicine_list->medicine->medicine_category_id) }}        
                                                </td>    
                                                <td>  
                                                    <input type="hidden" name="medicine_id[]" value="{{ $invoice_medicine_list->medicine_id }}"> 
                                                    <input type="text" class="form-control" value="{{ $invoice_medicine_list->medicine->name }}" id="medicine_id_{{ $i }}" readonly>       
                                                </td>       
                                                <td>  
                                                    <input type="date" class="form-control" name="expiry_date[]" value="{{ $invoice_medicine_list->expiry_date }}" id="expiry_date_{{ $i }}" readonly>  
                                                </td>
                                                <td>
                                                    <div class="input-group">                                                    
                                                        <input type="number" class="form-control" min="1" name="quantity[]" value="{{ $invoice_medicine_list->quantity }}" id="quantity_{{ $i }}" required>                                                          
                                                        <input type="hidden" name="qty[]" value="{{ $invoice_medicine_list->quantity }}">                                                                      
                                                        <input type="text" class="form-control" name="available_qty" value="{{ $invoice_medicine_list->medicine->quantity }}" id="available_qty_{{ $i }}" readonly>     
                                                    </div>  
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="price[]" value="{{ $invoice_medicine_list->price }}" id="selling_price_{{ $i }}" readonly>      
                                                </td>  
                                                <td>
                                                    <input type="text" class="form-control" name="amount" value="{{ $invoice_medicine_list->price * $invoice_medicine_list->quantity }}" id="amount_{{ $i }}" readonly>        
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
                            <div class="divider"></div>  
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Doctor <i class="text-danger">*</i></label>  
                                                <select class="form-select js-select2" data-search="on" name="doctor_id" required>  
                                                    {{ getDoctor($medicine_invoice->doctor_id) }}     
                                                </select>    
                                            </div>    
                                        </div>
                                        <div class="col-sm-12 mt-3">  
                                            <div class="form-group">
                                                <label>Patient ID <i class="text-danger">*</i></label>  
                                                <select class="form-select js-select2" data-search="on" name="patient_id" required> 
                                                    {{ getPatient($medicine_invoice->patient_id) }}       
                                                </select>     
                                            </div>      
                                        </div>   
                                        <div class="col-sm-12 mt-3">  
                                            <div class="form-group">
                                                <label>Note</label> 
                                                <textarea name="note" rows="3" class="form-control">{{ $medicine_invoice->note }}</textarea>  
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <table>  
                                        <tbody>
                                            <tr>
                                                <th width="40%">Total ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">  
                                                    <input type="text" name="total" id="total" value="{{ $medicine_invoice->total }}" style="width: 50%; float: right;" class="form-control" readonly> 
                                                </td> 
                                            </tr>  
                                            <tr> 
                                                <th width="40%">Discount (%)</th>     
                                                <td width="60%" colspan="2">  
                                                    <div class="input-group" style="width: 50%; float: right;">     
                                                        <input type="number" min="1" name="discount_percent" id="discount_percent" value="{{ $medicine_invoice->discount_percent }}" class="form-control">   
                                                        <input type="text" name="discount" id="discount" value="{{ $medicine_invoice->discount }}" class="form-control" readonly>    
                                                    </div>    
                                                </td>   
                                            </tr>   
                                            <tr>
                                                <th width="40%">GST (%)</th>    
                                                <td width="60%" colspan="2">  
                                                    <div class="input-group" style="width: 50%; float: right;">       
                                                        <input type="number" min="1" name="gst_percent" id="gst_percent" value="{{ $medicine_invoice->gst_percent }}" class="form-control" required>   
                                                        <input type="text" name="gst" id="gst" value="{{ $medicine_invoice->gst }}" class="form-control" readonly>     
                                                    </div>      
                                                </td> 
                                            </tr>
                                            <tr>
                                                <th width="40%">Net Amount ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">  
                                                    <input type="text" name="net_amount" id="net_amount" value="{{ $medicine_invoice->net_amount }}" style="width: 50%; float: right;" class="form-control" readonly>       
                                                </td>  
                                            </tr>
                                        </tbody>
                                    </table> 
                                    <div class="row mt-3">   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Mode <i class="text-danger">*</i></label> 
                                                <select class="form-select js-select2" data-search="on" name="payment_mode" required> 
                                                    {{ getPaymentMethod($medicine_invoice->payment_mode) }}        
                                                </select>   
                                            </div>  
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Amount ({{ env('CURRENCY_SYMBOL') }}) <i class="text-danger">*</i></label>  
                                                <input type="text" name="payment_amount" id="payment_amount" value="{{ $medicine_invoice->payment_amount }}" class="form-control" readonly>      
                                            </div>
                                        </div>         
                                    </div>
                                </div> 
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
    var total_rows = {{ $invoice_medicine_list->count() }};    
    $(document).on('click', '.add-record', function () {  
        var id = total_rows + 1; 
        var row = "<tr id='row_"+ id +"'><td><select class='form-select' name='medicine_category_id' id='medicine_category_id_"+ id +"' required><option value='' selected disabled>--</option>{{ getMedicineCategory('') }}</select></td><td><select class='form-select' name='medicine_id[]' id='medicine_id_"+ id +"' required><option value='' selected disabled>--</option></select></td><td><input type='date' class='form-control' name='expiry_date[]' id='expiry_date_"+ id +"' readonly></td><td><div class='input-group'><input type='number' class='form-control' min='1' name='quantity[]' id='quantity_"+ id +"' required disabled><input type='hidden' name='qty[]' value=''><input type='text' class='form-control' name='available_qty' id='available_qty_"+ id +"' readonly></div></td><td><input type='text' class='form-control' name='price[]' id='selling_price_"+ id +"' readonly></td><td><input type='text' class='form-control' name='amount' id='amount_"+ id +"' readonly></td><td><button type='button' class='btn btn-danger delete_row' data-row-id='"+ id +"'><em class='icon ni ni-trash'></em></button></td></tr>";      
        $('#medicine_list').find('tbody').append(row);        
        total_rows = total_rows + 1;     
    });   
    $(document).on('click', '.delete_row', function (e) {  
        var del_row_id = $(this).data('rowId'); 
        var medicine_id = Number(document.getElementById('medicine_id_'+ del_row_id +'').value);  
        medicine_id_arr = medicine_id_arr.filter(function(item) {
            return item !== medicine_id; 
        });  
        $("#row_" + del_row_id).remove();   
        update_amount();          
    });       
</script>  
<script>  
    for(let i = 1; i <= 500; i++) {
        $(document).on('change', '#medicine_category_id_'+ i +'', function (e) {    
            var medicine_category_id = e.target.value; 
            var that = $(this);    
            $.ajax({
                url: "{{ route('get.medicine.list') }}", 
                type: "POST", 
                data: {
                    "_token": "{{ csrf_token() }}",
                    "medicine_category_id": medicine_category_id
                },
                success: function (data) {
                    that.parents().find('#medicine_id_'+ i +'').empty();  
                    that.parents().find('#medicine_id_'+ i +'').append('<option value="" selected disabled>--</option> ');   
                    $.each(data.medicine, function (index, medicine) {
                        that.parents().find('#medicine_id_'+ i +'').append('<option value="' + medicine.id + '">' + medicine.name + '</option>');
                    })   
                }      
            })  
        }); 
        var medicine_id_arr = @json($medicine_id_list);    
        $(document).on('change', '#medicine_id_'+ i +'', function (e) {    
            var medicine_id = e.target.value;  
            if(medicine_id_arr.includes(Number(medicine_id))) {  
                alert('This medicine is already exist !');  
                document.getElementById('medicine_id_'+ i +'').value = ''; 
                document.getElementById('expiry_date_'+ i +'').value = '';   
                document.getElementById('quantity_'+ i +'').disabled = true;              
                document.getElementById('available_qty_'+ i +'').value = '';      
                document.getElementById('selling_price_'+ i +'').value = '';      
            } else {  
                $.ajax({
                    url: "{{ route('get.medicine.details') }}",   
                    type: "POST", 
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "medicine_id": medicine_id
                    }, 
                    success: function (data) {      
                        medicine_id_arr.push(Number(medicine_id));           
                        document.getElementById('expiry_date_'+ i +'').value = data.medicine.expiry_date;   
                        document.getElementById('quantity_'+ i +'').disabled = false;       
                        document.getElementById('quantity_'+ i +'').max = data.medicine.quantity;     
                        document.getElementById('available_qty_'+ i +'').value = data.medicine.quantity;      
                        document.getElementById('selling_price_'+ i +'').value = data.medicine.selling_price;        
                    }            
                })   
            } 
        });   
        $(document).on('change', '#quantity_'+ i +'', function (e) {     
            var quantity = e.target.value;       
            var selling_price = document.getElementById('selling_price_'+ i +'').value;   
            var amount = Number(selling_price) * quantity;    
            document.getElementById('amount_'+ i +'').value = amount;   
            update_amount();                          
        });     
    }     
</script>     
<script>     
    var total_amount = {{ $medicine_invoice->total }};   
    function update_amount() {  
        var table = document.getElementById("medicine_list");  
        var sumVal = 0;  
        for(var i = 1; i < table.rows.length; i++)
        {
            sumVal = sumVal + parseInt(table.rows[i].cells[5].getElementsByTagName("input")[0].value);  
        }     
        document.getElementById("discount_percent").value = ''; 
        document.getElementById("discount").value = '';   
        document.getElementById("gst_percent").value = ''; 
        document.getElementById("gst").value = '';  
        document.getElementById("total").value = sumVal;    
        document.getElementById("net_amount").value = sumVal;                       
        document.getElementById("payment_amount").value = sumVal;
        total_amount = sumVal;           
    }            
    $(document).on('change', '#discount_percent', function (e) {      
        var discount_percent = e.target.value;   
        var amount = Number(document.getElementById("total").value);     
        var discount = amount * discount_percent / 100;         
        document.getElementById("gst_percent").value = '';   
        document.getElementById("gst").value = '';      
        document.getElementById("discount").value = discount;              
        document.getElementById("net_amount").value = amount - discount;    
        document.getElementById("payment_amount").value = amount - discount;   
        total_amount = amount - discount;                 
    });          
    $(document).on('change', '#gst_percent', function (e) {     
        var gst_percent = e.target.value;   
        var amount = total_amount;          
        var gst = amount * gst_percent / 100;   
        document.getElementById("gst").value = gst;              
        document.getElementById("net_amount").value = amount + gst;  
        document.getElementById("payment_amount").value = amount + gst;                                     
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