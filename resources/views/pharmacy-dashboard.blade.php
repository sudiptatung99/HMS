@section('title') {{ 'Pharmacy Dashboard' }} @endsection  
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Pharmacy</h3>  
                <div class="nk-block-des text-soft">
                    <p>Report Dashboard</p>     
                </div>     
            </div>   
        </div>       
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-1">   
                            <div class="col-sm-3">
                                <div class="nk-order-ovwg-data sell">
                                    <div class="amount">{{ $stock_medicine }}</div>
                                    <div class="title"><em class="icon ni ni-arrow-up-left"></em> Stock Medicine</div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="nk-order-ovwg-data sell">
                                    <div class="amount">{{ env('CURRENCY_SYMBOL') . $total_sales }}</div>
                                    <div class="title"><em class="icon ni ni-arrow-up-left"></em> Total Sales</div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="nk-order-ovwg-data sell">
                                    <div class="amount">{{ count($expired_medicine) }}</div>
                                    <div class="title"><em class="icon ni ni-arrow-up-left"></em> Expired Medicine</div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="nk-order-ovwg-data sell">
                                    <div class="amount">{{ count($out_of_stock) }}</div>
                                    <div class="title"><em class="icon ni ni-arrow-up-left"></em> Stock Out Medicine</div>
                                </div>
                            </div>
                        </div>                           
                    </div>
                </div>   
                <div class="row mt-3">
                    <div class="col">
                        <div class="card">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-2">
                                    <div class="card-title">
                                        <h6 class="title">Today's Sale</h6>
                                    </div> 
                                </div>
                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                    <div class="nk-sale-data">
                                        <span class="amount">{{ count($today_sales) }}</span>
                                        <span class="sub-title">Today Invoice</span>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <div class="card-inner">
                                <div class="card-title-group align-start mb-2">
                                    <div class="card-title">
                                        <h6 class="title">Today's Purchase</h6>
                                    </div> 
                                </div>
                                <div class="align-end flex-sm-wrap g-4 flex-md-nowrap">
                                    <div class="nk-sale-data">
                                        <span class="amount">{{ count($today_purchase) }}</span>
                                        <span class="sub-title">Today Invoice</span>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="card mt-3"> 
                    <div class="card-body">
                        <table class="datatable-init-export nowrap table"> 
                            <thead>
                                <tr>
                                    <th width="5%">#</th>   
                                    <th>Medicine Name</th>  
                                    <th>Category Name</th>      
                                    <th>Expiry Date</th>      
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp    
                                @foreach($expired_medicine as $key => $expired_medicine)   
                                    <tr>
                                        <td>{{ $no++ }}</td> 
                                        <td>{{ $expired_medicine->medicine_category->name }}</td>   
                                        <td>{{ $expired_medicine->name }}</td>
                                        <td>{{ $expired_medicine->expiry_date }}</td>  
                                    </tr>  
                                @endforeach                  
                            </tbody> 
                        </table> 
                    </div> 
                </div> 
                <div class="card mt-3">  
                    <div class="card-body">
                        <table class="datatable-init-export nowrap table"> 
                            <thead>
                                <tr>
                                    <th width="5%">#</th>   
                                    <th>Medicine Name</th>
                                    <th>Category Name</th>
                                    <th>Stock</th>  
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp    
                                @foreach($out_of_stock as $key => $out_of_stock)   
                                    <tr>
                                        <td>{{ $no++ }}</td> 
                                        <td>{{ $out_of_stock->medicine_category->name }}</td>   
                                        <td>{{ $out_of_stock->name }}</td>
                                        <td>{{ $out_of_stock->quantity }}</td>   
                                    </tr>
                                @endforeach      
                            </tbody> 
                        </table> 
                    </div> 
                </div>                   
            </div> 
        </div>  
    </div>
</x-app-layout> 