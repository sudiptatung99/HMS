@section('title') {{ 'Insurance View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Insurance</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Insurance</p>    
                </div>    
            </div> 
            <a href="{{ route('insurance') }}" class="btn btn-white btn-outline-light">   
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>  
        <div class="row">
            <div class="col-xl-12">
                <div class="row g-gs">
                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-inner-group"> 
                                <div class="card-inner">
                                    <h6 class="overline-title mb-2">Details</h6> 
                                    <div class="row g-3">
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Patient ID:</span>
                                            <span>{{ $insurance->patient->patient_id }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Consultant Name:</span>
                                            <span>{{ $insurance->consultant_name }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Policy Name:</span>
                                            <span>{{ $insurance->policy_name }}</span> 
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Policy No.:</span>
                                            <span>{{ $insurance->policy_no }}</span> 
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Policy Holder Name:</span>
                                            <span>{{ $insurance->policy_holder_name }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Insurance Name:</span>
                                            <span>{{ $insurance->insurance_name }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Total:</span>
                                            <span>{{ env('CURRENCY_SYMBOL') . $insurance->total }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Status:</span>
                                            <span>
                                                @if($insurance->status == 'Active')
                                                    <span class="lead-text text-success">{{ $insurance->status }}</span>
                                                @elseif($insurance->status == 'Inactive')  
                                                    <span class="lead-text text-danger">{{ $insurance->status }}</span>  
                                                @endif    
                                            </span>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="card"> 
                            <div class="card-inner">                 
                                <div class="nk-block">
                                    <div class="overline-title-alt mb-2">Disease Details</div> 
                                    <div class="nk-tb-list nk-tb-ulist is-compact card">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col"><span class="sub-text">Disease Name</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Disease Details</span></div>  
                                        </div>
                                        @foreach($insurance_disease as $insurance_disease)
                                            <div class="nk-tb-item"> 
                                                <div class="nk-tb-col"><span class="sub-text">{{ $insurance_disease->name }}</span></div>
                                                <div class="nk-tb-col"><span class="sub-text">{{ $insurance_disease->details }}</span></div> 
                                            </div>   
                                        @endforeach
                                    </div>
                                </div>   
                                <div class="nk-block">
                                    <div class="overline-title-alt mb-2">Approval Charge Break Up</div> 
                                    <div class="nk-tb-list nk-tb-ulist is-compact card">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col"><span class="sub-text">Disease Name</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Disease Charge</span></div>  
                                        </div>
                                        @foreach($insurance_approval_charge as $insurance_approval_charge)
                                            <div class="nk-tb-item"> 
                                                <div class="nk-tb-col"><span class="sub-text">{{ $insurance_approval_charge->name }}</span></div>
                                                <div class="nk-tb-col"><span class="sub-text">{{ $insurance_approval_charge->charge }}</span></div> 
                                            </div>    
                                        @endforeach 
                                    </div>
                                </div>                 
                            </div> 
                        </div>
                    </div>
                </div>                
            </div>
        </div>          
    </div>
</x-app-layout>        