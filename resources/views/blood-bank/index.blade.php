@section('title') {{ 'Blood Bank' }} @endsection 
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Blood Bank</h3>  
                <div class="nk-block-des text-soft">
                    <p>Blood Bank Status</p>    
                </div>     
            </div> 
            <a href="{{ route('blood-bag.create') }}" class="btn btn-white btn-outline-light">    
                <em class="icon ni ni-plus-circle-fill"></em><span>Add Blood Bag</span>          
            </a>    
        </div>   
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body"> 
                        <div class="row p-3">  
                            <div class="col-md-1">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    @for($i = 0; $i < count($blood_group); $i++)
                                        <a class="nav-link mb-2 @if($i == 0) active @endif" id="v-pills-{{ $blood_group[$i]->id }}-tab" data-bs-toggle="pill" href="#v-pills-{{ $blood_group[$i]->id }}" role="tab" aria-controls="v-pills-{{ $blood_group[$i]->id }}" aria-selected="true"><b>{{ $blood_group[$i]->name }}</b></a> 
                                    @endfor     
                                </div>     
                            </div>    
                            <div class="col-md-11">
                                <div class="tab-content text-muted mt-4 mt-md-0" id="v-pills-tabContent">
                                    @for($i = 0; $i < count($blood_group); $i++) 
                                        <div class="tab-pane fade @if($i == 0) show active @endif" id="v-pills-{{ $blood_group[$i]->id }}"  role="tabpanel" aria-labelledby="v-pills-{{ $blood_group[$i]->id }}-tab">  
                                            <div class="row justify-content-between">     
                                                <h6 class="title text-end mb-3"><span class="text-danger">{{ $blood_group[$i]->total_bag }}</span> Blood Bags</h6>              
                                                <table class="datatable-init-export nowrap table">                   
                                                    <thead>  
                                                        <tr>
                                                            <th>Bags</th>
                                                            <th>Lot</th> 
                                                            <th>Donor</th> 
                                                            <th>Donate Date</th> 
                                                            <th>Note</th> 
                                                            <th width="14%">Action</th> 
                                                        </tr>
                                                    </thead> 
                                                    <tbody>
                                                        @for($j = 0; $j < count($blood_bag); $j++)
                                                        @if($blood_group[$i]->name == $blood_bag[$j]->blood_group)   
                                                            <tr>     
                                                                <td>{{ $blood_bag[$j]->bag }} ({{ $blood_bag[$j]->volume }} {{ $blood_bag[$j]->unit_type }})</td> 
                                                                <td>{{ $blood_bag[$j]->lot }}</td>  
                                                                <td>{{ $blood_bag[$j]->donor->name }}</td>   
                                                                <td>{{ getDateFormat($blood_bag[$j]->donate_date) }}</td>    
                                                                <td>{{ $blood_bag[$j]->note }}</td>   
                                                                <td>
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                                            <em class="icon ni ni-more-h"></em>
                                                                        </a>
                                                                        <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                                            <ul class="link-list-opt no-bdr">    
                                                                            @can('update-blood-bag')        
                                                                                <li>
                                                                                    <a href="{{ route('blood-bag.update', encrypt($blood_bag[$j]->id)) }}">
                                                                                        <em class="icon ni ni-edit"></em><span>Update</span> 
                                                                                    </a> 
                                                                                </li>
                                                                            @endcan
                                                                            @can('delete-blood-bag')    
                                                                                <li>
                                                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $blood_bag[$j]->id }}">
                                                                                        <em class="icon ni ni-trash"></em><span>Delete</span>   
                                                                                    </a>   
                                                                                </li> 
                                                                            @endcan 
                                                                            </ul>
                                                                        </div> 
                                                                    </div>    
                                                                    <!-- <div class="action_btn">
                                                                        <a href="">           
                                                                            <div class="add_sign bg-info">  
                                                                                <i class="fas fa-tag text-white"></i>    
                                                                            </div>
                                                                        </a>       
                                                                    </div>   -->
                                                                </td>
                                                            </tr>
                                                            <div class="modal fade" id="deleteWarning{{ $blood_bag[$j]->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">   
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
                                                                            <a class="btn btn-danger" href="{{ route('blood-bag.delete', encrypt($blood_bag[$j]->id)) }}">Yes</a>        
                                                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>      
                                                                        </div>  
                                                                    </div>  
                                                                </div> 
                                                            </div>                                                                  
                                                        @endif  
                                                        @endfor  
                                                    </tbody>
                                                </table>     
                                            </div>  
                                        </div>         
                                    @endfor                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>  