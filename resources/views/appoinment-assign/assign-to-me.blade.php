@section('title') {{ 'Appointment Assign to Me' }} @endsection  
<x-app-layout> 
    <div class="container-fluid">
        <div class="nk-block-between mb-3">    
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Appoinment</h3>  
                <div class="nk-block-des text-soft">
                    <p>Assign to Me</p>    
                </div>     
            </div>  
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
                                    <th>Department</th> 
                                    <th>Doctor</th> 
                                    <th>Appoinment Date</th>      
                                    <th>Serial No.</th>     
                                    <th>Problem</th>     
                                    <th>Status</th>     
                                    <th width="5%">Action</th>    
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp   
                            @foreach($appoinment as $key => $appoinment) 
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td><a href="{{ route('patient.show', encrypt($appoinment->patient_id)) }}">{{ $appoinment->patient->patient_id }}</a></td> 
                                    <td>{{ $appoinment->department->name }}</td> 
                                    <td>{{ $appoinment->doctor->name }}</td> 
                                    <td>{{ getDateFormat($appoinment->appoinment_date) }}</td>    
                                    <td>{{ $appoinment->serial_no }}</td>   
                                    <td>{{ $appoinment->problem }}</td>    
                                    <td>
                                        @if($appoinment->status == 'Active')
                                            <span class="badge badge-dot bg-success">{{ $appoinment->status }}</span>
                                        @elseif($appoinment->status == 'Inactive')  
                                            <span class="badge badge-dot bg-danger">{{ $appoinment->status }}</span>  
                                        @endif    
                                    </td>   
                                    <td> 
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">  
                                                <ul class="link-list-opt no-bdr">    
                                                    <li>
                                                        <a href="{{ route('appoinment.update', encrypt($appoinment->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span> 
                                                        </a> 
                                                    </li>  
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