@section('title') {{ 'Pathology Parameter Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Parameter</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Parameter</p>   
                </div>    
            </div> 
            <a href="{{ route('pathology-parameter') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('pathology-parameter.update.store', encrypt($pathology_parameter->id)) }}" method="POST">         
                        @csrf     
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{ $pathology_parameter->name }}" required>
                                </div>
                            </div>     
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Range <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="range" value="{{ $pathology_parameter->range }}" required>
                                </div> 
                            </div>       
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Unit <i class="text-danger">*</i></label> 
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" data-search="on" name="unit" required>   
                                        {{ getTestUnit($pathology_parameter->unit) }}     
                                    </select>    
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Description <i class="text-danger">*</i></label>
                                <div class="col-sm-8">  
                                    <textarea class="form-control" name="description" required>{{ $pathology_parameter->description }}</textarea>   
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