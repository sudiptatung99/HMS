@section('title') {{ 'Blood Issue Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Blood Issue</h3>  
                <div class="nk-block-des text-soft">
                    <p>Create Blood Issue</p>  
                </div>    
            </div> 
            <a href="{{ route('blood-issue') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>    
        </div>       
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('blood-issue.store') }}" method="POST">         
                        @csrf 
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                        <div class="col-sm-9"> 
                                            <select class="form-select js-select2" data-search="on" name="patient_id" id="patient_id" required>    
                                                <option value="" selected disabled></option>  
                                                {{ getPatient('') }}     
                                            </select>   
                                        </div>
                                    </div>       
                                </div>
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Patient Name</label> 
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" id="patient_name" readonly>  
                                        </div>  
                                    </div>         
                                </div>  
                            </div>    
                            <div class="row">                                    
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Blood Group</label>  
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" id="blood_group" readonly>  
                                        </div>  
                                    </div>         
                                </div> 
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Bag <i class="text-danger">*</i></label>  
                                        <div class="col-sm-9">  
                                            <select class="form-select js-select2" data-search="on" name="blood_bag_id" id="blood_bag_id" required>  
                                                <option value="" selected disabled></option>              
                                            </select>       
                                        </div> 
                                    </div>          
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Doctor <i class="text-danger">*</i></label>  
                                        <div class="col-sm-9">      
                                            <select class="form-select js-select2" data-search="on" name="doctor_id" required>  
                                                <option value="" selected disabled></option> 
                                                {{ getDoctor('') }}     
                                            </select>     
                                        </div>  
                                    </div>         
                                </div> 
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Issue Date <i class="text-danger">*</i></label>     
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control date-picker" name="issue_date" value="<?php echo date('m/d/Y'); ?>" required>   
                                        </div>    
                                    </div>           
                                </div>  
                            </div>    
                            <div class="divider"></div>  
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row"> 
                                        <div class="col-sm-12 mt-3">    
                                            <div class="form-group">
                                                <label>Amount <i class="text-danger">*</i></label> 
                                                <input type="number" class="form-control" name="amount" id="amount" required>   
                                            </div>   
                                        </div> 
                                        <div class="col-sm-12 mt-3">  
                                            <div class="form-group">
                                                <label>Note</label>  
                                                <textarea name="note" rows="3" class="form-control"></textarea>   
                                            </div>  
                                        </div>   
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-4">  
                                    <table>  
                                        <tbody>
                                            <tr>
                                                <th width="40%">Total ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">  
                                                    <input type="text" name="total" id="total" style="width: 50%; float: right;" class="form-control" readonly> 
                                                </td>
                                            </tr>    
                                            <tr>
                                                <th width="40%">GST (%)</th>    
                                                <td width="60%" colspan="2">  
                                                    <div class="input-group" style="width: 50%; float: right;">       
                                                        <input type="number" min="1" name="gst_percent" id="gst_percent" class="form-control" required>   
                                                        <input type="text" name="gst" id="gst" class="form-control" readonly>     
                                                    </div>      
                                                </td> 
                                            </tr>
                                            <tr>
                                                <th width="40%">Net Amount ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">  
                                                    <input type="text" name="net_amount" id="net_amount" style="width: 50%; float: right;" class="form-control" readonly>       
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
                                                <input type="text" name="payment_amount" id="payment_amount" class="form-control" readonly>      
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
    $(document).on('change', '#patient_id', function (e) {    
        var patient_id = e.target.value;    
        $.ajax({ 
            url: "{{ route('get.patient.details') }}",   
            type: "POST", 
            data: {
                "_token": "{{ csrf_token() }}",
                "patient_id": patient_id
            },
            success: function (data) {        
                onGetBag(data.patient.blood_group);       
                document.getElementById("patient_name").value = data.patient.name;                     
                document.getElementById("blood_group").value = data.patient.blood_group;                       
            }       
        })  
    });  
    function onGetBag(blood_group) {     
        $.ajax({
            url: "{{ route('get.blood.bag.list') }}",    
            type: "POST",   
            data: {
                "_token": "{{ csrf_token() }}",
                "blood_group": blood_group 
            },  
            success: function (data) {        
                $('#blood_bag_id').empty();   
                $('#blood_bag_id').append('<option value="" selected disabled></option>');   
                $.each(data.blood_bag, function (index, blood_bag) {                         
                    $('#blood_bag_id').append('<option value="' + blood_bag.id + '">' + blood_bag.bag + ' (' + blood_bag.volume + ' ' + blood_bag.unit_type + ')</option>');    
                })                             
            }       
        })   
    } 
    var amount = 0;   
    $(document).on('change', '#amount', function (e) {       
        amount = e.target.value;                        
        document.getElementById("total").value = amount;     
        document.getElementById("net_amount").value = amount;    
        document.getElementById("payment_amount").value = amount;     
        document.getElementById("gst_percent").value = '';  
        document.getElementById("gst").value = '';     
    });  
    $(document).on('change', '#gst_percent', function (e) {     
        var gst_percent = e.target.value;         
        gst = amount * gst_percent / 100;         
        var total_amount = Number(amount) + Number(gst);                          
        document.getElementById("net_amount").value = total_amount;     
        document.getElementById("payment_amount").value = total_amount;              
        document.getElementById("gst").value = gst;                                                
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