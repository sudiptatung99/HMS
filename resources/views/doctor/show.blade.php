@section('title') {{ 'Doctor View' }} @endsection
<x-app-layout>
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-aside-wrap">
                        <div class="card-inner card-inner-lg">
                            <div class="nk-block-head nk-block-head-lg">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Personal Information</h4> 
                                    </div>    
                                </div>
                            </div>
                            <div class="nk-block">
                                <div class="nk-data data-list">
                                    <div class="data-head">
                                        <h6 class="overline-title">Information</h6> 
                                    </div>
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Picture</span>
                                            <span class="data-value">
                                                <img src="{{ asset($doctor->image) }}" width="100" height="70" class="img-thumbnail">  
                                            </span> 
                                        </div>  
                                    </div>    
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Department</span>
                                            <span class="data-value">{{ $doctor->department->name }}</span> 
                                        </div>  
                                    </div>    
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Date of Birth</span>
                                            <span class="data-value">{{ getDateFormat($doctor->dob) }}</span>  
                                        </div>    
                                    </div>    
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Gender</span>
                                            <span class="data-value">{{ $doctor->gender }}</span> 
                                        </div>  
                                    </div>    
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Blood Group</span>
                                            <span class="data-value">{{ $doctor->blood_group }}</span> 
                                        </div>  
                                    </div>    
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Designation</span>
                                            <span class="data-value">{{ $doctor->designation->name }}</span> 
                                        </div>  
                                    </div>    
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Address</span>
                                            <span class="data-value">{{ $doctor->address }}</span> 
                                        </div>  
                                    </div>    
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Emergency Contact No.</span>
                                            <span class="data-value">{{ env('COUNTRY_CODE') }} {{ $doctor->emergency_contact }}</span> 
                                        </div>   
                                    </div>    
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Career Title</span>
                                            <span class="data-value">{{ $doctor->career_title }}</span> 
                                        </div>  
                                    </div>    
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Resume</span>
                                            <span class="data-value"><a href="{{ $doctor->resume }}" class="fw-bold" download>Download Resume</a></span> 
                                        </div>  
                                    </div>  
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Short Biogrphy</span>
                                            <span class="data-value">{{ $doctor->short_biogrphy }}</span> 
                                        </div>  
                                    </div>  
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Specialist</span>
                                            <span class="data-value">{{ $doctor->specialist }}</span> 
                                        </div>  
                                    </div>  
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Language</span>
                                            <span class="data-value">{{ $doctor->language }}</span> 
                                        </div>  
                                    </div>  
                                    <div class="data-item">
                                        <div class="data-col">
                                            <span class="data-label">Status</span>
                                            <span class="data-value">
                                                @if($doctor->status == 'Active')
                                                    <span class="badge badge-dot bg-success">{{ $doctor->status }}</span>
                                                @elseif($doctor->status == 'Inactive')  
                                                    <span class="badge badge-dot bg-danger">{{ $doctor->status }}</span>  
                                                @endif     
                                            </span> 
                                        </div>  
                                    </div>      
                                </div>
                            </div>
                        </div>
                        <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-toggle-body="true" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true"> 
                            <div class="card-inner-group" data-simplebar="">  
                                <div class="card-inner">
                                    <div class="user-card">
                                        <div class="user-avatar bg-primary">
                                            <span>{{ implode('', array_map(function($v) { return $v[0]; }, explode(' ', $doctor->name))) }}</span>
                                        </div>   
                                        <div class="user-info">
                                            <span class="lead-text">{{ $doctor->name }}</span>
                                            <span class="sub-text">{{ $doctor->email }}</span> 
                                        </div>   
                                        <div class="user-action">
                                            <div class="dropdown"><a class="btn btn-icon btn-trigger me-n2" data-bs-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                                <div class="dropdown-menu dropdown-menu-end"> 
                                                    <ul class="link-list-opt no-bdr"> 
                                                        <li>  
                                                            <a href="{{ route('doctor.update', encrypt($doctor->id)) }}">
                                                                <em class="icon ni ni-edit"></em> 
                                                                <span>Update</span> 
                                                            </a> 
                                                        </li> 
                                                    </ul>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-inner">
                                    <div class="user-account-info py-0">
                                        <h6 class="overline-title-alt">Account</h6> 
                                        <div class="user-balance"><small class="currency currency-btc">Sl No.</small> {{ $doctor->id }}</div> 
                                        <div class="user-balance-sub">Contact No. <span>{{ env('COUNTRY_CODE') }} {{ $doctor->contact }}</span>
                                        </div> 
                                    </div> 
                                </div>
                                <div class="card-inner p-0"></div> 
                            </div>   
                        </div>
                    </div>
                </div>                
            </div>
        </div>  
    </div>
</x-app-layout>   