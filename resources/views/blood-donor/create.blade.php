@section('title') {{ 'Blood Donor Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Blood Donor</h3>  
                <div class="nk-block-des text-soft">
                    <p>Create Blood Donor</p>  
                </div>    
            </div> 
            <a href="{{ route('blood-donor') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>    
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('blood-donor.store') }}" method="POST">       
                        @csrf 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Date of Birth <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="dob" required>
                                </div> 
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Blood Group <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">  
                                    <select class="form-select js-select2" data-search="on" name="blood_group" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getBloodGroup('') }}     
                                    </select>       
                                </div> 
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Gender <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="gender" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getGender('') }}        
                                    </select>       
                                </div>
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Father Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="father_name" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Contact No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="contact" required>
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Address <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="address" required></textarea>   
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Submit</button>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>     