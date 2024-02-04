@section('title') {{ 'Pathology Bill View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Pathology Bill</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Pathology Bill</p>     
                </div>      
            </div>  
            <a href="{{ route('pathology-bill') }}" class="btn btn-white btn-outline-light">    
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
                                        <li><span>Patient ID</span>:<span>{{ $pathology_bill->patient->patient_id }}</span></li>                                        
                                        <li><span>Contact</span>:<span>{{ env('COUNTRY_CODE') }} {{ $pathology_bill->patient->contact }}</span></li>   
                                        <li><span>Doctor</span>:<span>{{ $pathology_bill->doctor->name }}</span></li>   
                                    </ul>  
                                </div>    
                                <div class="invoice-desc"> 
                                    <ul class="list-plain"> 
                                        <li><span>Bill No.</span>:<span>{{ $pathology_bill->bill_no }}</span></li> 
                                        <li><span>Date</span>:<span>{{ getDateFormat($pathology_bill->bill_date) }}</span></li>  
                                        <li><span>Payment</span>:<span>{{ $pathology_bill->payment_mode }}</span></li>  
                                    </ul>     
                                </div>  
                            </div> 
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr> 
                                                <th>Test Name</th>
                                                <th>Amount</th>
                                                <th>GST</th>
                                                <th>GST Amount</th> 
                                                <th>Total</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pathology_test as $key => $pathology_test) 
                                                <tr>
                                                    <td>{{ $pathology_test->test->name }}</td> 
                                                    <td>{{ env('CURRENCY_SYMBOL') . $pathology_test->test->amount }}</td> 
                                                    <td>{{ $pathology_test->test->gst_percent }}%</td> 
                                                    <td>{{ env('CURRENCY_SYMBOL') . $pathology_test->test->gst }}</td> 
                                                    <td>{{ env('CURRENCY_SYMBOL') . $pathology_test->test->total }}</td>  
                                                </tr>    
                                            @endforeach 
                                        </tbody> 
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td> 
                                                <td>Total</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $pathology_bill->total }}</td>
                                            </tr>
                                            <tr> 
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Discount</td>
                                                <td>
                                                    @if($pathology_bill->discount_percent)
                                                        {{ $pathology_bill->discount_percent }}%
                                                    @else
                                                        --
                                                    @endif 
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Discount Amount</td>
                                                <td>
                                                    @if($pathology_bill->discount)
                                                        {{ env('CURRENCY_SYMBOL') . $pathology_bill->discount }} 
                                                    @else
                                                        --
                                                    @endif  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>GST Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $pathology_bill->gst }}</td>
                                            </tr> 
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Net Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $pathology_bill->net_amount }}</td>
                                            </tr> 
                                        </tfoot>  
                                    </table>                                        
                                    <div class="nk-notes ff-italic fs-12px text-soft mt-4"> 
                                        <b>Note:</b> {{ $pathology_bill->note }}  
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

    .invoice-bills .table tfoot tr:last-child td:nth-child(3) { 
        border-top: none; 
    } 
</style>   