@section('title') {{ 'Enquiry Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Enquiry</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Enquiry</p>  
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
                        <form action="{{ route('enquiry.update.store', encrypt($enquiry->id)) }}" method="POST">       
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{ $enquiry->name }}" required> 
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Contact No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="contact" value="{{ $enquiry->contact }}" required>
                                </div>
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Enquiry Type <i class="text-danger">*</i></label> 
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" data-search="on" name="enquiry_type" required>   
                                        {{ getEnquiryType($enquiry->enquiry_type) }}    
                                    </select>   
                                </div> 
                            </div>     
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Description <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <textarea class="form-control" name="description" required>{{ $enquiry->description }}</textarea>   
                                </div> 
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>   
                                        {{ getEnquiryStatus($enquiry->status) }}     
                                    </select>   
                                </div>
                            </div>     
                            <div class="row mb-4">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Update</button>   
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>      