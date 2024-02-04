@section('title') {{ 'Prescription View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Prescription</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Prescription</p>    
                </div>    
            </div> 
            <a href="{{ route('prescription') }}" class="btn btn-white btn-outline-light">   
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>     
        <div class="row">
            <div class="col-xl-12">
                <div class="nk-block">
                    <div class="invoice">
                        <div class="invoice-action">
                            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="javascript:void(0)" onclick="onPrint()">
                                <em class="icon ni ni-printer-fill"></em> 
                            </a> 
                        </div> 
                        <div class="card invoice-wrap" id="section_to_print"> 
                            <div class="invoice-brand text-center">
                                <div href="index.html" class="logo-link"> 
                                    <img class="logo-dark logo-img" src="{{ asset('assets/images/logo.png') }}">
                                </div>  
                            </div> 
                            <div class="invoice-head">
                                <div class="invoice-desc"> 
                                    <ul class="list-plain">
                                        <li><span>Patient ID</span>:<span>{{ $prescription->patient->patient_id }}</span></li>                                        
                                        <li><span>Contact</span>:<span>{{ env('COUNTRY_CODE') }} {{ $prescription->patient->contact }}</span></li>                                         
                                        <li><span>Weight</span>:<span>{{ $prescription->weight }}</span></li>
                                        <li><span>Blood Pressure</span>:<span>{{ $prescription->blood_pressure }}</span></li> 
                                    </ul>  
                                </div>   
                                <div class="invoice-desc"> 
                                    <ul class="list-plain">
                                        <li><span>Type</span>:<span>{{ $prescription->prescription_type }}</span></li> 
                                        <li><span>Date</span>:<span>{{ getDateFormat($prescription->date) }}</span></li>
                                        <li><span>Doctor</span>:<span>{{ $prescription->doctor->name }}</span></li>   
                                        <li><span>Fees</span>:<span>{{ env('CURRENCY_SYMBOL') . $prescription->visiting_fees }}</span></li>   
                                        <li><span>Reference</span>:<span>{{ $prescription->reference }}</span></li>   
                                    </ul>    
                                </div> 
                            </div>
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr> 
                                                <th>Medicine Name</th>
                                                <th>Medicine Type</th>
                                                <th>Instruction</th>
                                                <th>Days</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($prescription_medicine as $key => $prescription_medicine) 
                                                <tr>
                                                    <td>{{ $prescription_medicine->name }}</td>
                                                    <td>{{ $prescription_medicine->type }}</td>
                                                    <td>{{ $prescription_medicine->instruction }}</td>
                                                    <td>{{ $prescription_medicine->days }}</td> 
                                                </tr>
                                            @endforeach  
                                        </tbody> 
                                    </table> 
                                    @if(count($prescription_diagnosis) > 0)
                                        <table class="table table-striped mt-2">
                                            <thead>
                                                <tr> 
                                                    <th>Diagnosis Name</th>
                                                    <th>Instruction</th> 
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($prescription_diagnosis as $key => $prescription_diagnosis) 
                                                    <tr>
                                                        <td>{{ $prescription_diagnosis->name }}</td>
                                                        <td>{{ $prescription_diagnosis->instruction }}</td> 
                                                    </tr>
                                                @endforeach  
                                            </tbody> 
                                        </table> 
                                    @endif  
                                    <div class="nk-notes ff-italic fs-12px text-soft mt-4"> 
                                        <b>Note:</b> {{ $prescription->patient_notes }} 
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
<script>
    function onPrint() {
        window.print();
    }
</script>   
<style>
    @media print {
        body {
            visibility: hidden;
        }
        
        #section_to_print {  
            visibility: visible;
            position: absolute;
            left: 0;
            top: 0;
        }  
    }
</style>