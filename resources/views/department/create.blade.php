@section('title') {{ 'Department Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">         
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Department</h3>  
                <div class="nk-block-des text-soft">
                    <p>Create Department</p>  
                </div>    
            </div> 
            <a href="{{ route('department') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>  
        <div class="row"> 
            <div class="col-xl-12">
                <div class="card">   
                    <div class="card-body mt-3"> 
                        <form action="{{ route('department.store') }}" method="POST">       
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Department Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div> 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Department Type <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="type" required> 
                                        <option value="" selected disabled></option> 
                                        <option value="Main-Department">Main-Department</option>
                                        <option value="Sub-Department">Sub-Department</option> 
                                    </select>  
                                </div>
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>  
                                        <option value="" selected disabled></option>  
                                        {{ getStatus('') }}      
                                    </select>   
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