@section('title') {{ 'Advance Payment Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Advance Payment</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Advance Payment</p>   
                </div>    
            </div> 
            <a href="{{ route('advance-payment') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('advance-payment.update.store', encrypt($advance_payment->id)) }}" method="POST">         
                        @csrf  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>  
                                        {{ getPatient($advance_payment->patient_id) }}    
                                    </select>   
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Amount <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="amount" value="{{ $advance_payment->amount }}" required>
                                </div> 
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Payment Method <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="payment_method" required>  
                                        {{ getPaymentMethod($advance_payment->payment_method) }}     
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