@section('title') {{ 'Purchase Medicine' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Purchase Medicine</h3>  
                <div class="nk-block-des text-soft">
                    <p>Purchase Medicine List</p>     
                </div>     
            </div> 
            <a href="{{ route('purchase-medicine.create') }}" class="btn btn-white btn-outline-light">   
                <em class="icon ni ni-plus-circle-fill"></em><span>New</span>       
            </a>  
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body">
                        <table class="datatable-init-export nowrap table">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>   
                                    <th>Date</th>      
                                    <th>Invoice No.</th>     
                                    <th>Manufacturer</th>       
                                    <th>Total</th>      
                                    <th>Payment Mode</th>   
                                    <th>Payment Amount</th>        
                                    <th width="5%">Action</th>     
                                </tr>  
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp    
                            @foreach($purchase_medicine as $key => $purchase_medicine) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ getDateFormat($purchase_medicine->date) }}</td> 
                                    <td>{{ $purchase_medicine->invoice_id }}</td>      
                                    <td>{{ $purchase_medicine->manufacturer }}</td>    
                                    <td>{{ env('CURRENCY_SYMBOL') . $purchase_medicine->total }}</td>       
                                    <td>{{ $purchase_medicine->payment_mode }}</td>         
                                    <td>{{ env('CURRENCY_SYMBOL') . $purchase_medicine->payment_amount }}</td>            
                                    <td>  
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">  
                                                @can('medicine-purchase-view')     
                                                    <li>
                                                        <a href="{{ route('purchase-medicine.show', encrypt($purchase_medicine->id)) }}"> 
                                                            <em class="icon ni ni-eye"></em><span>View</span>     
                                                        </a>    
                                                    </li> 
                                                @endcan
                                                @can('update-medicine-purchase')   
                                                    <li>
                                                        <a href="{{ route('purchase-medicine.update', encrypt($purchase_medicine->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a> 
                                                    </li>
                                                @endcan
                                                @can('delete-medicine-purchase')     
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $purchase_medicine->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>    
                                                        </a>     
                                                    </li> 
                                                @endcan 
                                                </ul>
                                            </div>  
                                        </div>  
                                    </td>
                                </tr>                                   
                                <div class="modal fade" id="deleteWarning{{ $purchase_medicine->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">   
                                    <div class="modal-dialog modal-dialog-centered">     
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <div class="h1 mx-auto text-warning mb-3"> 
                                                        <em class="icon bi bi-exclamation-triangle"></em>    
                                                    </div>   
                                                    <div class="row justify-content-center"> 
                                                        <div class="col-xl-10"> 
                                                            <h4 class="title nk-block-title mb-3">Warning !</h4>  
                                                            <p class="text-muted font-size-14">Are you sure you want to delete?</p>    
                                                        </div>   
                                                    </div> 
                                                </div>
                                            </div>   
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="{{ route('purchase-medicine.delete', encrypt($purchase_medicine->id)) }}">Yes</a>     
                                                <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>    
                                            </div> 
                                        </div>
                                    </div> 
                                </div>                                   
                            @endforeach                        
                            </tbody>
                        </table> 
                    </div> 
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>  