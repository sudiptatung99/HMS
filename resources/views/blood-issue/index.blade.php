@section('title') {{ 'Blood Issue' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Blood Issue</h3>  
                <div class="nk-block-des text-soft">
                    <p>Blood Issue List</p>    
                </div>     
            </div> 
            <a href="{{ route('blood-issue.create') }}" class="btn btn-white btn-outline-light">   
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
                                    <th>Issue Date</th>       
                                    <th>Blood Group</th>     
                                    <th>Bag</th>    
                                    <th>Net Amount</th>        
                                    <th>Payment Mode</th>       
                                    <th width="5%">Action</th>     
                                </tr>  
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp   
                            @foreach($blood_issue as $key => $blood_issue) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><a href="{{ route('patient.show', encrypt($blood_issue->patient_id)) }}">{{ $blood_issue->patient->patient_id }}</a></td>  
                                    <td>{{ getDateFormat($blood_issue->issue_date) }}</td> 
                                    <td>{{ $blood_issue->blood_bag->blood_group }}</td>   
                                    <td>{{ $blood_issue->blood_bag->bag }} ({{ $blood_issue->blood_bag->volume }} {{ $blood_issue->blood_bag->unit_type }})</td>  
                                    <td>{{ env('CURRENCY_SYMBOL') . $blood_issue->net_amount }}</td>    
                                    <td>{{ $blood_issue->payment_mode }}</td>    
                                    <td>  
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">   
                                                @can('blood-issue-view')    
                                                    <li>
                                                        <a href="{{ route('blood-issue.show', encrypt($blood_issue->id)) }}"> 
                                                            <em class="icon ni ni-eye"></em><span>View</span>     
                                                        </a>   
                                                    </li> 
                                                @endcan
                                                @can('update-blood-issue')    
                                                    <li>
                                                        <a href="{{ route('blood-issue.update', encrypt($blood_issue->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a> 
                                                    </li>
                                                @endcan
                                                @can('delete-blood-issue')  
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $blood_issue->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>   
                                                        </a>   
                                                    </li> 
                                                @endcan 
                                                </ul>
                                            </div>   
                                        </div>  
                                    </td>
                                </tr>                                   
                                <div class="modal fade" id="deleteWarning{{ $blood_issue->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">   
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
                                                <a class="btn btn-danger" href="{{ route('blood-issue.delete', encrypt($blood_issue->id)) }}">Yes</a>    
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