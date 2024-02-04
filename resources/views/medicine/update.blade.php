@section('title') {{ 'Medicine Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Medicine</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Medicine</p>   
                </div>    
            </div> 
            <a href="{{ route('medicine') }}" class="btn btn-white btn-outline-light">   
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>     
        <div class="row">
            <div class="col-xl-12">
                <div class="card"> 
                    <div class="top_point">
                        <a href="{{ route('medicine') }}">    
                            <h4 class="card-title mb-0 title_custom text-center">
                                <i class="fas fa-list"></i>
                                Medicine List 
                            </h4> 
                        </a>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('medicine.update.store', encrypt($medicine->id)) }}" method="POST" enctype="multipart/form-data">        
                        @csrf 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Medicine Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{ $medicine->name }}" required>
                                </div> 
                            </div>      
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Category Name <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="medicine_category_id" required>   
                                        {{ getMedicineCategory($medicine->medicine_category_id) }}     
                                    </select>   
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Unit <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="unit" value="{{ $medicine->unit }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Quantity <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="quantity" value="{{ $medicine->quantity }}" required> 
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Price <i class="text-danger">*</i></label>
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Manufacturer</span> 
                                        <input type="number" class="form-control" name="manufacturer_price" value="{{ $medicine->manufacturer_price }}" required> 
                                    </div>
                                </div> 
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <span class="input-group-text">Selling</span> 
                                        <input type="number" class="form-control" name="selling_price" value="{{ $medicine->selling_price }}" required> 
                                    </div>
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Batch No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="batch_no" value="{{ $medicine->batch_no }}" required> 
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Expiry Date <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="date" class="form-control" name="expiry_date" value="{{ $medicine->expiry_date }}" required> 
                                </div>  
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Vendor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="medicine_vendor_id" required>    
                                        {{ getMedicineVendor($medicine->medicine_vendor_id) }}      
                                    </select>     
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Manufacturer <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="manufacturer" value="{{ $medicine->manufacturer }}" required> 
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Image <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="image" accept="image/*">  
                                    <img src="{{ asset($medicine->image) }}" width="120" height="80" class="img-thumbnail mt-2">   
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Description <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <textarea class="form-control" name="description" required>{{ $medicine->description }}</textarea>    
                                </div> 
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>     
                                        {{ getMedicineStatus($medicine->status) }}     
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