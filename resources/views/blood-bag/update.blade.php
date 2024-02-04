@section('title') {{ 'Blood Bag Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Blood Bag</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Blood Bag</p>    
                </div>    
            </div> 
            <a href="{{ route('blood-bank') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>    
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('blood-bag.update.store', encrypt($blood_bag->id)) }}" method="POST">        
                        @csrf     
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Blood Donor <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">  
                                    <input type="hidden" name="donor_id" value="{{ $blood_bag->donor_id }}" required>   
                                    <input type="text" class="form-control" value="{{ $blood_bag->donor->name }}" readonly>  
                                </div>                                     
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Blood Group <i class="text-danger">*</i></label>
                                <div class="col-sm-8">  
                                    <input type="text" class="form-control" name="blood_group" value="{{ $blood_bag->blood_group }}" readonly>
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Donate Date <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control date-picker" name="donate_date" value="{{ $blood_bag->donate_date }}" required> 
                                </div>  
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Bag <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="bag" value="{{ $blood_bag->bag }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Volume <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="volume" value="{{ $blood_bag->volume }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Unit Type <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">    
                                    <select class="form-select js-select2" data-search="on" name="unit_type" required>    
                                        {{ getBloodUnitType($blood_bag->unit_type) }}       
                                    </select>          
                                </div>    
                            </div>   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Lot <i class="text-danger">*</i></label> 
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control" name="lot" value="{{ $blood_bag->lot }}" required>
                                </div>
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Note</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="note">{{ $blood_bag->note }}</textarea>      
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