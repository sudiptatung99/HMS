@section('title') {{ 'Call Ambulance View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Call Ambulance</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Call Ambulance</p>     
                </div>      
            </div>  
            <a href="{{ route('call-ambulance') }}" class="btn btn-white btn-outline-light">    
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
                                        <li><span>Patient ID</span>:<span>{{ $call_ambulance->patient->patient_id }}</span></li>                                        
                                        <li><span>Contact</span>:<span>{{ env('COUNTRY_CODE') }} {{ $call_ambulance->patient->contact }}</span></li>   
                                    </ul>  
                                </div>   
                                <div class="invoice-desc"> 
                                    <ul class="list-plain"> 
                                        <li><span>Date</span>:<span>{{ getDateFormat($call_ambulance->date) }}</span></li> 
                                        <li><span>Payment</span>:<span>{{ $call_ambulance->payment_mode }}</span></li> 
                                    </ul>     
                                </div>  
                            </div> 
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr> 
                                                <th>Ambulance</th>
                                                <th>Driver Name</th>
                                                <th>Driver Contact</th>
                                                <th>Vehicle Type</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $call_ambulance->ambulance->vehicle_number }} ({{ $call_ambulance->ambulance->vehicle_model }})</td>
                                                <td>{{ $call_ambulance->ambulance->driver_name }}</td>
                                                <td>{{ $call_ambulance->ambulance->driver_contact }}</td>
                                                <td>{{ $call_ambulance->ambulance->vehicle_type }}</td> 
                                            </tr>
                                        </tbody> 
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td> 
                                                <td>Total</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $call_ambulance->total }}</td>
                                            </tr>
                                            <tr> 
                                                <td></td>
                                                <td></td>
                                                <td>GST</td>
                                                <td>{{ $call_ambulance->gst_percent }}%</td>
                                            </tr> 
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>GST Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $call_ambulance->gst }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>Net Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $call_ambulance->net_amount }}</td>
                                            </tr> 
                                        </tfoot>  
                                    </table>                                        
                                    <div class="nk-notes ff-italic fs-12px text-soft mt-4"> 
                                        <b>Note:</b> {{ $call_ambulance->note }}  
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
 
    .card-body table tbody tr td {
        border: none !important;
    }

    .invoice-bills .table tfoot tr:last-child td:nth-child(2) {
        border-top: none;
    }
</style> 