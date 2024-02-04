@section('title') {{ 'Roles' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Role</h3>  
                <div class="nk-block-des text-soft">
                    <p>Role List</p>     
                </div>      
            </div> 
            <a href="{{ route('role.create') }}" class="btn btn-white btn-outline-light">   
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
                                    <th>Role</th> 
                                    <th>Permissions</th> 
                                    <th width="5%">Action</th>      
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp    
                            @foreach($role_permission as $key => $rolePer) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $rolePer->name }}</td>
                                    <td>
                                        @foreach($rolePer->permissions as $perm) 
                                            <span class="text-primary">{{ $perm->name }}</span>,&nbsp; 
                                        @endforeach
                                    </td> 
                                    <td>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">   
                                                @can('update-role')   
                                                    <li>
                                                        <a href="{{ route('role.update', encrypt($rolePer->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a> 
                                                    </li>  
                                                @endcan  
                                                </ul>
                                            </div>
                                        </div>      
                                    </td>
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
<style>
    .dtr-data {
        display: flex;
        flex-wrap: wrap
    }

    .dtr-details li:nth-child(2) {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }
</style> 