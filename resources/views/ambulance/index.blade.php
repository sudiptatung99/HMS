@section('title') {{ 'Ambulance' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Ambulance</h3>  
                <div class="nk-block-des text-soft">
                    <p>Ambulance List</p>    
                </div>     
            </div> 
            <a href="{{ route('ambulance.create') }}" class="btn btn-white btn-outline-light">    
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
                                    <th>Vehicle Number</th>     
                                    <th>Vehicle Model</th>     
                                    <th>Year Made</th>     
                                    <th>Driver Name</th>     
                                    <th>Driver License</th>     
                                    <th>Driver Contact</th>     
                                    <th>Vehicle Type</th>  
                                    <th width="5%">Action</th>     
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp    
                            @foreach($ambulance as $key => $ambulance) 
                                <tr>
                                    <td>{{ $no++ }}</td> 
                                    <td>{{ $ambulance->vehicle_number }}</td>
                                    <td>{{ $ambulance->vehicle_model }}</td> 
                                    <td>{{ $ambulance->year_made }}</td>  
                                    <td>{{ $ambulance->driver_name }}</td>  
                                    <td>{{ $ambulance->driver_license }}</td>  
                                    <td>{{ env('COUNTRY_CODE') }} {{ $ambulance->driver_contact }}</td>  
                                    <td>{{ $ambulance->vehicle_type }}</td>   
                                    <td> 
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">  
                                                @can('update-ambulance')   
                                                    <li>
                                                        <a href="{{ route('ambulance.update', encrypt($ambulance->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a> 
                                                    </li>
                                                @endcan
                                                @can('delete-ambulance')  
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $ambulance->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>   
                                                        </a>   
                                                    </li>
                                                @endcan  
                                                </ul>  
                                            </div> 
                                        </div>   
                                    </td>
                                </tr>                                  
                                <div class="modal fade" id="deleteWarning{{ $ambulance->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">   
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
                                                <a class="btn btn-danger" href="{{ route('ambulance.delete', encrypt($ambulance->id)) }}">Yes</a>    
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
<style>
    .dtr-details li:nth-child(1) {
        display: flex;
        align-items: center;
        justify-content: flex-end;
    }

    .dtr-details .dropdown-menu li {
        justify-content: flex-start;
    }
</style>   