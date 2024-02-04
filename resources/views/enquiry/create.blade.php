@section('title') {{ 'Enquiry Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Enquiry</h3>  
                <div class="nk-block-des text-soft">
                    <p>Create Enquiry</p>  
                </div>    
            </div> 
            <a href="{{ route('enquiry') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>     
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('enquiry.store') }}" method="POST">        
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Contact No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="contact" required>
                                </div>
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Enquiry Type <i class="text-danger">*</i></label> 
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" data-search="on" name="enquiry_type" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getEnquiryType('') }}    
                                    </select>   
                                </div>
                            </div>     
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Description <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <textarea class="form-control" name="description" required></textarea>   
                                </div> 
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>  
                                        <option value="" selected disabled></option> 
                                        {{ getEnquiryStatus('') }}     
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