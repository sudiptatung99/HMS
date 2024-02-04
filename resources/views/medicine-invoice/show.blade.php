@section('title') {{ 'Invoice View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Invoice</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Invoice</p>     
                </div>      
            </div>  
            <a href="{{ route('medicine-invoice') }}" class="btn btn-white btn-outline-light">    
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
                                        <li><span>Patient ID</span>:<span>{{ $medicine_invoice->patient->patient_id }}</span></li>                                        
                                        <li><span>Contact</span>:<span>{{ env('COUNTRY_CODE') }} {{ $medicine_invoice->patient->contact }}</span></li>   
                                        <li><span>Doctor</span>:<span>{{ $medicine_invoice->doctor->name }}</span></li>   
                                    </ul>  
                                </div>    
                                <div class="invoice-desc"> 
                                    <ul class="list-plain"> 
                                        <li><span>Invoice No.</span>:<span>{{ $medicine_invoice->invoice_no }}</span></li> 
                                        <li><span>Date</span>:<span>{{ getDateFormat($medicine_invoice->created_at) }}</span></li>  
                                        <li><span>Payment</span>:<span>{{ $medicine_invoice->payment_mode }}</span></li>  
                                    </ul>     
                                </div>  
                            </div> 
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr> 
                                                <th>Medicine Category</th>
                                                <th>Medicine Name</th>
                                                <th>Expiry Date</th>
                                                <th>Price</th> 
                                                <th>Quantity</th> 
                                                <th>Amount</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($invoice_medicine_list as $key => $invoice_medicine_list) 
                                                <tr>
                                                    <td>{{ $invoice_medicine_list->medicine->medicine_category->name }}</td> 
                                                    <td>{{ $invoice_medicine_list->medicine->name }}</td>   
                                                    <td>{{ getDateFormat($invoice_medicine_list->expiry_date) }}</td> 
                                                    <td>{{ env('CURRENCY_SYMBOL') . $invoice_medicine_list->price }}</td> 
                                                    <td>{{ $invoice_medicine_list->quantity }}</td> 
                                                    <td>{{ env('CURRENCY_SYMBOL') . number_format($invoice_medicine_list->price * $invoice_medicine_list->quantity, 2) }}</td> 
                                                </tr>    
                                            @endforeach 
                                        </tbody> 
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td> 
                                                <td>Total</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $medicine_invoice->total }}</td>
                                            </tr>
                                            <tr> 
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Discount</td>
                                                <td>
                                                    @if($medicine_invoice->discount_percent)
                                                        {{ $medicine_invoice->discount_percent }}%
                                                    @else
                                                        --
                                                    @endif 
                                                </td>
                                            </tr> 
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Discount Amount</td>
                                                <td>
                                                    @if($medicine_invoice->discount)
                                                        {{ env('CURRENCY_SYMBOL') . $medicine_invoice->discount }} 
                                                    @else
                                                        --
                                                    @endif  
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>GST</td>
                                                <td>{{ $medicine_invoice->gst_percent }}%</td>
                                            </tr> 
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>GST Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $medicine_invoice->gst }}</td>
                                            </tr> 
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Net Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $medicine_invoice->net_amount }}</td>
                                            </tr> 
                                        </tfoot>    
                                    </table>                                        
                                    <div class="nk-notes ff-italic fs-12px text-soft mt-4"> 
                                        <b>Note:</b> {{ $medicine_invoice->note }}  
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

    .invoice-bills .table tfoot tr:last-child td:nth-child(4) { 
        border-top: none; 
    } 
</style>    