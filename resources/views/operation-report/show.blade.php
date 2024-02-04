@section('title') {{ 'Operation Report View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Operation Report</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Operation Report</p>    
                </div>    
            </div> 
            <a href="{{ route('operation-report') }}" class="btn btn-white btn-outline-light">   
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                <div class="card card-full"> 
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title mx-auto"> 
                                    <h6 class="title"><a href="{{ route('patient.show', encrypt($operation_report->patient_id)) }}">{{ $operation_report->patient->patient_id }}</a></h6>
                                </div> 
                            </div>
                        </div>
                        <div class="card-inner pt-0">
                            <ul class="my-n2">
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Date of Operation</div>
                                    <div class="sub-text">{{ getDateFormat($operation_report->date_of_operation) }}</div> 
                                </li>
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Preoperative Diagnosis</div>
                                    <div class="sub-text">{{ $operation_report->preoperative_diagnosis }}</div>
                                </li>  
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Procedure</div>
                                    <div class="sub-text">{{ $operation_report->procedure }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Surgeon Name</div>
                                    <div class="sub-text">
                                        @foreach($surgeon as $surgeon)
                                            {{ $surgeon->name }},&nbsp; 
                                        @endforeach  
                                    </div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Assistant</div>
                                    <div class="sub-text">
                                        @foreach($assistant as $assistant)
                                            {{ $assistant->name }},&nbsp;  
                                        @endforeach  
                                    </div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Anesthesia</div>
                                    <div class="sub-text">{{ $operation_report->anesthesia }}</div>
                                </li> 
                                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                                    <div class="lead-text">Anesthesiologist</div>
                                    <div class="sub-text">{{ $operation_report->anesthesiologist }}</div>
                                </li>                             
                                <li class="align-center justify-between py-1 gx-1">
                                    <div class="lead-text">Description</div>
                                    <div class="sub-text">{{ $operation_report->description }}</div>
                                </li>
                            </ul>
                        </div>
                    </div>                        
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>       