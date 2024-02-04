@section('title') {{ 'Insurance' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Insurance</h3>  
                <div class="nk-block-des text-soft">
                    <p>Insurance List</p>    
                </div>     
            </div> 
            <a href="{{ route('insurance.create') }}" class="btn btn-white btn-outline-light">    
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
                                    <th>Patient ID</th>   
                                    <th>Policy Name</th>   
                                    <th>Policy No.</th>  
                                    <th>Policy Holder</th>   
                                    <th>Total</th>  
                                    <th>Status</th>      
                                    <th width="5%">Action</th>     
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp     
                            @foreach($insurance as $key => $insurance) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><a href="{{ route('patient.show', encrypt($insurance->patient_id)) }}">{{ $insurance->patient->patient_id }}</a></td> 
                                    <td>{{ $insurance->policy_name }}</td>
                                    <td>{{ $insurance->policy_no }}</td>
                                    <td>{{ $insurance->policy_holder_name }}</td> 
                                    <td>{{ env('CURRENCY_SYMBOL') . $insurance->total }}</td>  
                                    <td>
                                        @if($insurance->status == 'Active')
                                            <span class="badge badge-dot bg-success">{{ $insurance->status }}</span>
                                        @elseif($insurance->status == 'Inactive')  
                                            <span class="badge badge-dot bg-danger">{{ $insurance->status }}</span>  
                                        @endif   
                                    </td>   
                                    <td>   
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">    
                                                @can('insurance-view')        
                                                    <li>
                                                        <a href="{{ route('insurance.show', encrypt($insurance->id)) }}"> 
                                                            <em class="icon ni ni-eye"></em><span>View</span>     
                                                        </a>   
                                                    </li> 
                                                @endcan
                                                @can('update-insurance')    
                                                    <li>
                                                        <a href="{{ route('insurance.update', encrypt($insurance->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a>  
                                                    </li>  
                                                @endcan
                                                @can('delete-insurance')     
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $insurance->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>   
                                                        </a>   
                                                    </li>  
                                                @endcan
                                                </ul>
                                            </div>  
                                        </div>   
                                    </td>
                                </tr>                                 
                                <div class="modal fade" id="deleteWarning{{ $insurance->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">   
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
                                                <a class="btn btn-danger" href="{{ route('insurance.delete', encrypt($insurance->id)) }}">Yes</a>      
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