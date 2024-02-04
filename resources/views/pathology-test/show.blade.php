@section('title') {{ 'Pathology Test View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Pathology Test</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Pathology Test</p>    
                </div>    
            </div> 
            <a href="{{ route('pathology-test') }}" class="btn btn-white btn-outline-light">   
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
                                            <span class="sub-text">Test Name:</span>
                                            <span>{{ $pathology_test->name }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Short Name:</span>
                                            <span>{{ $pathology_test->short_name }}</span>
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Category:</span>
                                            <span>{{ $pathology_test->category->name }}</span> 
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Method:</span>
                                            <span>{{ $pathology_test->method }}</span> 
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Amount:</span>
                                            <span>{{ env('CURRENCY_SYMBOL') . $pathology_test->amount }}</span> 
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">GST:</span>
                                            <span>{{ $pathology_test->gst_percent }}%</span> 
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">GST Amount:</span>
                                            <span>{{ env('CURRENCY_SYMBOL') . $pathology_test->gst }}</span> 
                                        </div>
                                        <div class="col-sm-6 col-md-4 col-xl-12">
                                            <span class="sub-text">Total:</span>
                                            <span>{{ env('CURRENCY_SYMBOL') . $pathology_test->total }}</span> 
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
                                    <div class="overline-title-alt mb-2">Test Parameter</div> 
                                    <div class="nk-tb-list nk-tb-ulist is-compact card">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col"><span class="sub-text">Parameter Name</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Reference Range</span></div>
                                            <div class="nk-tb-col"><span class="sub-text">Unit</span></div> 
                                        </div>
                                        @foreach($test_parameter as $test_parameter)
                                            <div class="nk-tb-item"> 
                                                <div class="nk-tb-col"><span class="sub-text">{{ $test_parameter->parameter->name }}</span></div>
                                                <div class="nk-tb-col"><span class="sub-text">{{ $test_parameter->parameter->range }}</span></div>
                                                <div class="nk-tb-col"><span class="sub-text">{{ $test_parameter->parameter->unit }}</span></div> 
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