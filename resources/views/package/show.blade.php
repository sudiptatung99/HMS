@section('title') {{ 'Package View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Package</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Package</p>    
                </div>    
            </div> 
            <a href="{{ route('package') }}" class="btn btn-white btn-outline-light">   
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
                                            <span class="sub-text">Package:</span>
                                            <span>{{ $package->name }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Package Cost:</span>
                                            <span>{{ env('CURRENCY_SYMBOL') . $package->package_cost }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Status:</span>
                                            <span>
                                                @if($package->status == 'Active')
                                                    <span class="lead-text text-success">{{ $package->status }}</span>
                                                @elseif($package->status == 'Inactive')  
                                                    <span class="lead-text text-danger">{{ $package->status }}</span>  
                                                @endif   
                                            </span> 
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Description:</span>
                                            <span>{{ $package->description }}</span> 
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
                                    <div class="overline-title-alt mb-2">Package Including</div> 
                                    <div class="nk-tb-list nk-tb-ulist is-compact card">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col"><span class="sub-text">Service</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Rate</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Quantity</span></div> 
                                        </div>
                                        @foreach($package_service as $package_service)
                                            <div class="nk-tb-item"> 
                                                <div class="nk-tb-col"><span class="sub-text">{{ $package_service->service->name }}</span></div>
                                                <div class="nk-tb-col"><span class="sub-text">{{ env('CURRENCY_SYMBOL') . $package_service->service->service_cost }}</span></div>
                                                <div class="nk-tb-col"><span class="sub-text">{{ $package_service->quantity }}</span></div>
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