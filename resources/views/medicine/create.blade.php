@section('title') {{ 'Medicine Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Medicine</h3>  
                <div class="nk-block-des text-soft">
                    <p>Create Medicine</p>  
                </div>    
            </div> 
            <a href="{{ route('medicine') }}" class="btn btn-white btn-outline-light">   
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('medicine.store') }}" method="POST" enctype="multipart/form-data">          
                        @csrf   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Medicine Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" required>
                                </div> 
                            </div>      
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Category Name <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="medicine_category_id" required>   
                                        <option value="" selected disabled></option> 
                                        {{ getMedicineCategory('') }}     
                                    </select>   
                                </div> 
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Unit <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="unit" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Quantity <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="quantity" required> 
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Price <i class="text-danger">*</i></label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Manufacturer</span> 
                                        <input type="number" class="form-control" name="manufacturer_price" required> 
                                    </div>
                                </div> 
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Selling</span> 
                                        <input type="number" class="form-control" name="selling_price" required> 
                                    </div>
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Batch No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="batch_no" required> 
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Expiry Date <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="date" class="form-control" name="expiry_date" required> 
                                </div>  
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Vendor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="medicine_vendor_id" required>   
                                        <option value="" selected disabled></option> 
                                        {{ getMedicineVendor('') }}     
                                    </select>   
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Manufacturer <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="manufacturer" required> 
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Image <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="image" accept="image/*" required> 
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
                                        {{ getMedicineStatus('') }}     
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