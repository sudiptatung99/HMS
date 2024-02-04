@section('title') {{ 'Medicine View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Medicine</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Medicine</p>    
                </div>    
            </div> 
            <a href="{{ route('medicine') }}" class="btn btn-white btn-outline-light">   
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">                      
                    <div class="card card-full">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">{{ $medicine->name }}</h6>
                                </div>
                                <div class="card-tools me-n1 mt-n1">
                                    <div class="user-avatar lg bg-primary">
                                        <img src="{{ asset($medicine->image) }}">  
                                    </div>                
                                </div>
                            </div>
                        </div>
                        <div class="card-inner pt-0">
                            <ul class="my-n2">
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Category Name</div>
                                    <div class="sub-text">{{ $medicine->medicine_category->name }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Unit</div>
                                    <div class="sub-text">{{ $medicine->unit }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Quantity</div>
                                    <div class="sub-text">{{ $medicine->quantity }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Manufacturer Price</div>
                                    <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $medicine->manufacturer_price }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Selling Price</div>
                                    <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $medicine->selling_price }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Batch No.</div>
                                    <div class="sub-text">{{ $medicine->batch_no }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Expiry Date</div>
                                    <div class="sub-text">{{ getDateFormat($medicine->expiry_date) }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Vendor</div>
                                    <div class="sub-text">{{ $medicine->medicine_vendor->name }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Manufacturer</div>
                                    <div class="sub-text">{{ $medicine->manufacturer }}</div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Status</div>
                                    <div class="sub-text">
                                        @if($medicine->status == 'In Stock')
                                            <span class="badge badge-dot bg-success">{{ $medicine->status }}</span>
                                        @elseif($medicine->status == 'Out of Stock')  
                                            <span class="badge badge-dot bg-danger">{{ $medicine->status }}</span>  
                                        @endif    
                                    </div>
                                </li>
                                <li class="align-center justify-between py-1 gx-1">
                                    <div class="lead-text">Description</div>
                                    <div class="sub-text">{{ $medicine->description }}</div>
                                </li>
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>     