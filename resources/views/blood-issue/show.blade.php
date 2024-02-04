@section('title') {{ 'Blood Issue View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Blood Issue</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Blood Issue</p>     
                </div>      
            </div>  
            <a href="{{ route('blood-issue') }}" class="btn btn-white btn-outline-light">    
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
                                        <li><span>Patient ID</span>:<span>{{ $blood_issue->patient->patient_id }}</span></li>                                        
                                        <li><span>Contact</span>:<span>{{ env('COUNTRY_CODE') }} {{ $blood_issue->patient->contact }}</span></li>   
                                        <li><span>Doctor</span>:<span>{{ $blood_issue->doctor->name }}</span></li>     
                                    </ul>  
                                </div>   
                                <div class="invoice-desc"> 
                                    <ul class="list-plain"> 
                                        <li><span>Date</span>:<span>{{ getDateFormat($blood_issue->issue_date) }}</span></li> 
                                        <li><span>Payment</span>:<span>{{ $blood_issue->payment_mode }}</span></li> 
                                    </ul>      
                                </div>    
                            </div> 
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr> 
                                                <th>Blood Group</th>
                                                <th>Bag</th>
                                                <th>Lot</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $blood_issue->patient->blood_group }}</td>
                                                <td>{{ $blood_issue->blood_bag->bag }} ({{ $blood_issue->blood_bag->volume }} {{ $blood_issue->blood_bag->unit_type }})</td>
                                                <td>{{ $blood_issue->blood_bag->lot }}</td> 
                                            </tr> 
                                        </tbody> 
                                        <tfoot>
                                            <tr> 
                                                <td></td> 
                                                <td>Total</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $blood_issue->total }}</td>
                                            </tr>
                                            <tr> 
                                                <td></td>
                                                <td>GST</td>
                                                <td>{{ $blood_issue->gst_percent }}%</td>
                                            </tr> 
                                            <tr>
                                                <td></td>
                                                <td>GST Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $blood_issue->gst }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Net Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $blood_issue->net_amount }}</td>
                                            </tr> 
                                        </tfoot>   
                                    </table>                                        
                                    <div class="nk-notes ff-italic fs-12px text-soft mt-4"> 
                                        <b>Note:</b> {{ $blood_issue->note }}  
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
<style>
    .card-body table tbody tr td {
        border: none !important; 
    }  
    @media print {
        .no-print {
            display : none !important;
        }
        @page {
            margin: 0;
        } 
        body {
            margin: 1.6cm;
        } 
    }  
</style>
<script>
    function onPrint() {
        window.print();
    }
</script>     