@section('title') {{ 'Medicine Purchase View' }} @endsection 
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Medicine Purchase</h3>  
                <div class="nk-block-des text-soft">
                    <p>View Medicine Purchase</p>     
                </div>      
            </div> 
            <div class="nk-block-head-content">
                <a href="javascript:void(0)" onclick="onPrint()" class="btn btn-white btn-outline-light">   
                    <em class="icon ni ni-list"></em><span>Print</span>   
                </a>   
                <a href="{{ route('purchase-medicine') }}" class="btn btn-white btn-outline-light">   
                    <em class="icon ni ni-list"></em><span>List</span> 
                </a>   
            </div>     
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">                      
                    <div class="card-body">
                        <img src="{{ asset('assets/images/purchase-medicine.png') }}" class="img-responsive" style="height: 100px; width: 100%;"> 
                        <table width="100%" style="text-align: left; margin-top: 20px;">  
                            <tbody>  
                                <tr>  
                                    <td width="77%" align="text-left">
                                        <h5>Invoice ID: {{ $purchase_medicine->invoice_id }}</h5>   
                                    </td> 
                                    <td width="23%">
                                        <h5>Date: {{ getDateFormat($purchase_medicine->date) }}</h5>   
                                    </td>  
                                </tr>  
                            </tbody>
                        </table>
                        <hr style="height: 1px; clear: both; margin-bottom: 10px; margin-top: 10px">
                        <table cellspacing="0" cellpadding="0" width="100%" style="text-align: left;">
                            <tbody>
                                <tr>
                                    <th width="2%">Manufacturer</th> 
                                    <td width="10%">{{ $purchase_medicine->manufacturer }}</td>   
                                </tr>    
                            </tbody> 
                        </table>
                        <hr style="height: 1px; clear: both; margin-bottom: 10px; margin-top: 10px">
                        <table id="testreport" width="100%" style="text-align: left;">
                            <tbody>
                                <tr>
                                    <th width="20%">Medicine</th>
                                    <th width="20%">Batches</th> 
                                    <th>Expiry Date</th>
                                    <th>MRP/Unit</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th> 
                                    <th>Discount</th> 
                                    <th>Total</th>  
                                </tr>
                                @foreach($purchase_medicine_list as $key => $purchase_medicine_list) 
                                    <tr>
                                        <td width="20%">{{ $purchase_medicine_list->name }}</td>
                                        <td>{{ $purchase_medicine_list->batch }}</td>    
                                        <td>{{ getDateFormat($purchase_medicine_list->expiry_date) }}</td>  
                                        <td>{{ env('CURRENCY_SYMBOL') . $purchase_medicine_list->mrp_per_unit }}</td> 
                                        <td>{{ $purchase_medicine_list->quantity }}</td> 
                                        <td>{{ env('CURRENCY_SYMBOL') . $purchase_medicine_list->sub_total }}</td>
                                        <td>{{ env('CURRENCY_SYMBOL') . $purchase_medicine_list->discount }}</td> 
                                        <td>{{ env('CURRENCY_SYMBOL') . $purchase_medicine_list->total }}</td> 
                                    </tr>    
                                @endforeach 
                            </tbody>
                        </table>
                        <hr style="height: 1px; clear: both; margin-bottom: 10px; margin-top: 10px">
                        <div class="row">
                            <div class="col-md-6">
                                <table>  
                                    <tbody>
                                        <tr>
                                            <th>Payment Amount:</th>
                                            <td>{{ env('CURRENCY_SYMBOL') . $purchase_medicine->payment_amount }}</td> 
                                        </tr> 
                                        <tr>                                             
                                            <th>Payment Mode:</th>
                                            <td>{{ $purchase_medicine->payment_mode }}</td> 
                                        </tr>  
                                    </tbody> 
                                </table> 
                            </div> 
                            <div class="col-md-6">
                                <table align="right">
                                    <tbody>
                                        <tr>
                                            <th style="width: 50%; text-align: left">Sub Total</th>
                                            <td style="width: 50%; text-align: right" class="text-right">{{ env('CURRENCY_SYMBOL') . $purchase_medicine->sub_total }}</td>
                                        </tr> 
                                        <tr>
                                            <th style="width: 50%; text-align: left">Discount</th> 
                                            <td style="width: 50%; text-align: right" class="text-right">
                                                @if($purchase_medicine->discount)
                                                    {{ env('CURRENCY_SYMBOL') . $purchase_medicine->discount }} 
                                                @else
                                                    --
                                                @endif   
                                            </td> 
                                        </tr> 
                                        <tr>
                                            <th style="width: 50%; text-align: left">GST Amount</th>
                                            <td style="width: 50%; text-align: right" class="text-right">{{ env('CURRENCY_SYMBOL') . $purchase_medicine->gst }}</td>
                                        </tr> 
                                        <tr>
                                            <th style="width: 50%; text-align: left">Total</th>  
                                            <td style="width: 50%; text-align: right" class="text-right">{{ env('CURRENCY_SYMBOL') . $purchase_medicine->total }}</td>
                                        </tr>  
                                    </tbody>  
                                </table>
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