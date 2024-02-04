@section('title') {{ 'Radiology Test' }} @endsection  
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Test</h3>  
                <div class="nk-block-des text-soft">
                    <p>Test List</p>    
                </div>     
            </div> 
            <a href="{{ route('radiology-test.create') }}" class="btn btn-white btn-outline-light">   
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
                                    <th>Test Name</th>  
                                    <th>Short Name</th>  
                                    <th>Category</th>  
                                    <th>Method</th>          
                                    <th>Total</th>              
                                    <th width="5%">Action</th>      
                                </tr>
                            </thead> 
                            <tbody>
                            @php $no = 1; @endphp   
                            @foreach($radiology_test as $key => $radiology_test) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $radiology_test->name }}</td>
                                    <td>{{ $radiology_test->short_name }}</td>  
                                    <td>{{ $radiology_test->category->name }}</td>  
                                    <td>{{ $radiology_test->method }}</td>      
                                    <td>{{ env('CURRENCY_SYMBOL') . $radiology_test->total }}</td>     
                                    <td>   
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">   
                                                @can('radiology-test-view')  
                                                    <li>
                                                        <a href="{{ route('radiology-test.show', encrypt($radiology_test->id)) }}"> 
                                                            <em class="icon ni ni-eye"></em><span>View</span>     
                                                        </a>   
                                                    </li> 
                                                @endcan
                                                @can('update-radiology-test')    
                                                    <li>
                                                        <a href="{{ route('radiology-test.update', encrypt($radiology_test->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a> 
                                                    </li>
                                                @endcan
                                                @can('delete-radiology-test')   
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $radiology_test->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>    
                                                        </a>     
                                                    </li>
                                                @endcan  
                                                </ul>
                                            </div>  
                                        </div>  
                                    </td>  
                                </tr>                                  
                                <div class="modal fade" id="deleteWarning{{ $radiology_test->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">   
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
                                                <a class="btn btn-danger" href="{{ route('radiology-test.delete', encrypt($radiology_test->id)) }}">Yes</a>     
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