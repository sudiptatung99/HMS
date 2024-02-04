@section('title') {{ 'Blood Donor' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Blood Donor</h3>  
                <div class="nk-block-des text-soft">
                    <p>Blood Donor List</p>    
                </div>     
            </div> 
            <a href="{{ route('blood-donor.create') }}" class="btn btn-white btn-outline-light">   
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
                                    <th>Name</th>     
                                    <th>Date Of Birth</th>     
                                    <th>Blood Group</th>     
                                    <th>Gender</th>     
                                    <th>Father Name</th>     
                                    <th>Contact No.</th>     
                                    <th>Address</th>     
                                    <th width="5%">Action</th>      
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp     
                            @foreach($blood_donor as $key => $blood_donor) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $blood_donor->name }}</td> 
                                    <td>{{ getDateFormat($blood_donor->dob) }}</td>  
                                    <td>{{ $blood_donor->blood_group }}</td>  
                                    <td>{{ $blood_donor->gender }}</td>  
                                    <td>{{ $blood_donor->father_name }}</td>  
                                    <td>{{ env('COUNTRY_CODE') }} {{ $blood_donor->contact }}</td>  
                                    <td>{{ $blood_donor->address }}</td>    
                                    <td> 
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">
                                                @can('update-blood-donor')           
                                                    <li>
                                                        <a href="{{ route('blood-donor.update', encrypt($blood_donor->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a> 
                                                    </li>
                                                @endcan
                                                @can('delete-blood-donor')       
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $blood_donor->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>    
                                                        </a>    
                                                    </li>  
                                                @endcan
                                                </ul>
                                            </div> 
                                        </div>    
                                    </td>
                                </tr>                                 
                                <div class="modal fade" id="deleteWarning{{ $blood_donor->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">   
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
                                                <a class="btn btn-danger" href="{{ route('blood-donor.delete', encrypt($blood_donor->id)) }}">Yes</a>    
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