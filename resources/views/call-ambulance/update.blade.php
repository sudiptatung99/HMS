@section('title') {{ 'Call Ambulance Update' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Call Ambulance</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Call Ambulance</p>   
                </div>    
            </div> 
            <a href="{{ route('call-ambulance') }}" class="btn btn-white btn-outline-light">    
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-2"> 
                        <form action="{{ route('call-ambulance.update.store', encrypt($call_ambulance->id)) }}" method="POST">       
                        @csrf  
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                        <div class="col-sm-9"> 
                                            <input type="hidden" name="patient_id" value="{{ $call_ambulance->patient_id }}" required>       
                                            <input type="text" class="form-control" value="{{ $call_ambulance->patient->patient_id }}" readonly>   
                                        </div> 
                                    </div>     
                                </div>
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Patient Name</label> 
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" value="{{ $call_ambulance->patient->name }}" readonly>     
                                        </div>  
                                    </div>         
                                </div>  
                            </div>    
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Ambulance <i class="text-danger">*</i></label>  
                                        <div class="col-sm-9">  
                                            <input type="hidden" name="ambulance_id" value="{{ $call_ambulance->ambulance_id }}" required>        
                                            <input type="text" class="form-control" value="{{ $call_ambulance->ambulance->vehicle_number }} ({{ $call_ambulance->ambulance->vehicle_model }})" readonly>   
                                        </div>
                                    </div>     
                                </div>
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Driver Name</label> 
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" value="{{ $call_ambulance->ambulance->driver_name }}" readonly>  
                                        </div>  
                                    </div>         
                                </div>  
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Driver Contact</label>  
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" value="{{ $call_ambulance->ambulance->driver_contact }}" readonly>  
                                        </div>  
                                    </div>         
                                </div> 
                                <div class="col">
                                    <div class="row mb-4"> 
                                        <label class="col-sm-3 col-form-label">Vehicle Type</label>  
                                        <div class="col-sm-9">  
                                            <input type="text" class="form-control" value="{{ $call_ambulance->ambulance->vehicle_type }}" readonly>  
                                        </div>   
                                    </div>         
                                </div>  
                            </div>    
                            <div class="divider"></div>  
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">   
                                            <div class="form-group">
                                                <label>Date <i class="text-danger">*</i></label> 
                                                <input type="text" class="form-control date-picker" name="date" value="{{ $call_ambulance->date }}" required>   
                                            </div>  
                                        </div> 
                                        <div class="col-sm-12 mt-3">    
                                            <div class="form-group">
                                                <label>Amount <i class="text-danger">*</i></label> 
                                                <input type="number" class="form-control" name="amount" value="{{ $call_ambulance->amount }}" id="amount" required>   
                                            </div>   
                                        </div> 
                                        <div class="col-sm-12 mt-3">  
                                            <div class="form-group">
                                                <label>Note</label> 
                                                <textarea name="note" rows="3" class="form-control">{{ $call_ambulance->note }}</textarea>   
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
                                                    <input type="text" name="total" value="{{ $call_ambulance->total }}" id="total" style="width: 50%; float: right;" class="form-control" readonly> 
                                                </td>
                                            </tr>    
                                            <tr>
                                                <th width="40%">GST (%)</th>    
                                                <td width="60%" colspan="2">  
                                                    <div class="input-group" style="width: 50%; float: right;">       
                                                        <input type="number" min="1" name="gst_percent" value="{{ $call_ambulance->gst_percent }}" id="gst_percent" class="form-control" required>   
                                                        <input type="text" name="gst" value="{{ $call_ambulance->gst }}" id="gst" class="form-control" readonly>     
                                                    </div>      
                                                </td> 
                                            </tr>
                                            <tr>
                                                <th width="40%">Net Amount ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">  
                                                    <input type="text" name="net_amount" value="{{ $call_ambulance->net_amount }}" id="net_amount" style="width: 50%; float: right;" class="form-control" readonly>       
                                                </td>  
                                            </tr>
                                        </tbody>
                                    </table> 
                                    <div class="row mt-3">   
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Mode <i class="text-danger">*</i></label> 
                                                <select class="form-select js-select2" data-search="on" name="payment_mode" required>  
                                                    {{ getPaymentMethod($call_ambulance->payment_mode) }}      
                                                </select> 
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Amount ({{ env('CURRENCY_SYMBOL') }}) <i class="text-danger">*</i></label>  
                                                <input type="text" name="payment_amount" value="{{ $call_ambulance->payment_amount }}" id="payment_amount" class="form-control" readonly>      
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
    var amount = {{ $call_ambulance->amount }};    
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