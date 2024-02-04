@section('title') {{ 'Medicine Vendor Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Medicine Vendor</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Medicine Vendor</p>   
                </div>    
            </div> 
            <a href="{{ route('medicine-vendor') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>     
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('medicine-vendor.update.store', encrypt($medicine_vendor->id)) }}" method="POST">       
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Category Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{ $medicine_vendor->name }}" required> 
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Contact No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="contact" value="{{ $medicine_vendor->contact }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Address <i class="text-danger">*</i></label> 
                                <div class="col-sm-8"> 
                                    <textarea class="form-control" name="address" required>{{ $medicine_vendor->address }}</textarea>    
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