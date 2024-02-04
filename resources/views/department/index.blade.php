@section('title') {{ 'Department' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Department</h3>  
                <div class="nk-block-des text-soft">
                    <p>Department List</p>    
                </div>     
            </div> 
            <a href="{{ route('department.create') }}" class="btn btn-white btn-outline-light">   
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
                                    <th>Department Name</th>
                                    <th>Department Type</th> 
                                    <th>Status</th>     
                                    <th width="5%">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp   
                            @foreach($department as $key => $department) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td>{{ $department->type }}</td> 
                                    <td>
                                        @if($department->status == 'Active')
                                            <span class="badge badge-dot bg-success">{{ $department->status }}</span>
                                        @elseif($department->status == 'Inactive')  
                                            <span class="badge badge-dot bg-danger">{{ $department->status }}</span>  
                                        @endif  
                                    </td>    
                                    <td> 
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">    
                                                @can('update-department') 
                                                    <li>
                                                        <a href="{{ route('department.update', encrypt($department->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a> 
                                                    </li>
                                                @endcan
                                                @can('delete-department') 
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $department->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>   
                                                        </a>   
                                                    </li>  
                                                @endcan
                                                </ul>
                                            </div>
                                        </div>   
                                    </td>  
                                </tr>                                  
                                <div class="modal fade" id="deleteWarning{{ $department->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">   
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
                                                <a class="btn btn-danger" href="{{ route('department.delete', encrypt($department->id)) }}">Yes</a>    
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