@section('title') {{ 'Medicine Invoice' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Medicine Invoice</h3>  
                <div class="nk-block-des text-soft">
                    <p>Medicine Invoice List</p>    
                </div>     
            </div> 
            <a href="{{ route('medicine-invoice.create') }}" class="btn btn-white btn-outline-light">   
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
                                    <th>Invoice No.</th>     
                                    <th>Patient ID</th>   
                                    <th>Doctor</th>   
                                    <th>Payment Mode</th>   
                                    <th>Payment Amount</th>     
                                    <th>Date</th>      
                                    <th width="5%">Action</th>    
                                </tr>  
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp     
                            @foreach($medicine_invoice as $key => $medicine_invoice) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $medicine_invoice->invoice_no }}</td>
                                    <td><a href="{{ route('patient.show', encrypt($medicine_invoice->patient_id)) }}">{{ $medicine_invoice->patient->patient_id }}</a></td>   
                                    <td>{{ $medicine_invoice->doctor->name }}</td>   
                                    <td>{{ $medicine_invoice->payment_mode }}</td>     
                                    <td>{{ env('CURRENCY_SYMBOL') . $medicine_invoice->payment_amount }}</td>   
                                    <td>{{ getDateFormat($medicine_invoice->created_at) }}</td>         
                                    <td> 
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">  
                                                @can('invoice-view')       
                                                    <li> 
                                                        <a href="{{ route('medicine-invoice.show', encrypt($medicine_invoice->id)) }}"> 
                                                            <em class="icon ni ni-eye"></em><span>View</span>     
                                                        </a>   
                                                    </li> 
                                                @endcan
                                                @can('update-invoice')  
                                                    <li>
                                                        <a href="{{ route('medicine-invoice.update', encrypt($medicine_invoice->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a> 
                                                    </li>
                                                @endcan
                                                @can('delete-invoice')   
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $medicine_invoice->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>    
                                                        </a>     
                                                    </li>  
                                                @endcan
                                                </ul>
                                            </div>  
                                        </div>  
                                    </td>
                                </tr>                                  
                                <div class="modal fade" id="deleteWarning{{ $medicine_invoice->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">   
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
                                                <a class="btn btn-danger" href="{{ route('medicine-invoice.delete', encrypt($medicine_invoice->id)) }}">Yes</a>     
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