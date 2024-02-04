@section('title') {{ 'Insurance Update' }} @endsection 
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Insurance</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Insurance</p>   
                </div>    
            </div> 
            <a href="{{ route('insurance') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>     
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3">  
                        <form action="{{ route('insurance.update.store', encrypt($insurance->id)) }}" method="POST" id="insurance_form">         
                        @csrf   
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>    
                                        {{ getPatient($insurance->patient_id) }}    
                                    </select>   
                                </div> 
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Disease Details <i class="text-danger">*</i></label>
                                <div class="col-sm-8">  
                                    @php $no = 1; @endphp 
                                    @foreach($insurance_disease as $insurance_disease)
                                    @php $i = $no++; @endphp   
                                        <div class="input-fields-1 @if($i > 1) mt-2 @endif">  
                                            <div class="row">
                                                <div class="col">
                                                    <input type="text" placeholder="Disease Name" class="form-control" name="insurance_disease_name[]" value="{{ $insurance_disease->name }}" required>
                                                </div>
                                                <div class="col">
                                                    <input type="text" placeholder="Disease Details" class="form-control" name="insurance_disease_details[]" value="{{ $insurance_disease->details }}" required>  
                                                </div>  
                                                <div class="col-1">
                                                    @if($i == 1)
                                                        <button type="button" class="btn btn-success add-record-1"><em class="icon ni ni-plus"></em></button>  
                                                    @else
                                                        <button type="button" class="btn btn-danger remove-fields-1"><em class="icon ni ni-trash"></em></button>  
                                                    @endif      
                                                </div>      
                                            </div> 
                                        </div>  
                                    @endforeach  
                                    <div class="fields-1"></div>        
                                </div>    
                            </div>     
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Consultant Name <i class="text-danger">*</i></label>  
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" data-search="on" name="consultant_name" required>   
                                        {{ getConsultantName($insurance->consultant_name) }}    
                                    </select>   
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Policy Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="policy_name" value="{{ $insurance->policy_name }}" required>
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Policy No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="policy_no" value="{{ $insurance->policy_no }}" required>
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Policy Holder Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="policy_holder_name" value="{{ $insurance->policy_holder_name }}" required>
                                </div>
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Insurance Name <i class="text-danger">*</i></label>  
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" data-search="on" name="insurance_name" required> 
                                        {{ getInsuranceName($insurance->insurance_name) }}    
                                    </select>   
                                </div> 
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Approval Charge Break Up <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    @php $no = 1; @endphp 
                                    @foreach($insurance_approval_charge as $insurance_approval_charge) 
                                    @php $i = $no++; @endphp   
                                        <div class="input-fields-2 @if($i > 1) mt-2 @endif">  
                                            <div class="row">    
                                                <div class="col"> 
                                                    <input type="text" placeholder="Disease Name" class="form-control" name="insurance_disease_charge_name[]" value="{{ $insurance_approval_charge->name }}" required>
                                                </div>
                                                <div class="col">
                                                    <input type="text" placeholder="Disease Charge" class="form-control" name="insurance_disease_charge[]" value="{{ $insurance_approval_charge->charge }}" required>    
                                                </div>   
                                                    <div class="col-1">
                                                    @if($i == 1)
                                                        <button type="button" class="btn btn-success add-record-2"><em class="icon ni ni-plus"></em></button>  
                                                    @else
                                                        <button type="button" class="btn btn-danger remove-fields-2"><em class="icon ni ni-trash"></em></button> 
                                                    @endif     
                                                </div>     
                                            </div>  
                                        </div>     
                                    @endforeach 
                                    <div class="fields-2"></div>     
                                </div>    
                            </div>   
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Total <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="number" class="form-control" name="total" value="{{ $insurance->total }}" required> 
                                </div> 
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>    
                                        {{ getStatus($insurance->status) }}      
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
<script type="text/x-templates" id="add_fields_1">  
    <div class="mt-2 input-fields-1">   
        <div class="row">
            <div class="col">
                <input type="text" placeholder="Disease Name" class="form-control" name="insurance_disease_name[]" required>
            </div>
            <div class="col">
                <input type="text" placeholder="Disease Details" class="form-control" name="insurance_disease_details[]" required>  
            </div>  
            <div class="col-1">
                <button type="button" class="btn btn-danger remove-fields-1"><em class="icon ni ni-trash"></em></button>   
            </div> 
        </div>    
    </div>  
</script>  
<script type="text/x-templates" id="add_fields_2">  
    <div class="mt-2 input-fields-2">     
        <div class="row">
            <div class="col"> 
                <input type="text" placeholder="Disease Name" class="form-control" name="insurance_disease_charge_name[]" required>
            </div>
            <div class="col">
                <input type="text" placeholder="Disease Charge" class="form-control" name="insurance_disease_charge[]" required>  
            </div> 
            <div class="col-1">
                <button type="button" class="btn btn-danger remove-fields-2"><em class="icon ni ni-trash"></em></button>  
            </div>  
        </div>     
    </div>   
</script>     
<script>
    $(function () {
        var FIELDS_TEMPLATE = $('#add_fields_1').text();   
        var $form = $('#insurance_form');   
        var $fields = $form.find('.fields-1');   
        $form.on('click', '.add-record-1', function () { 
            $fields.prepend($(FIELDS_TEMPLATE)); 
        }); 
        $form.on('click', '.remove-fields-1', function (event) {
            $(event.target).closest('.input-fields-1').remove(); 
        });   
    });   
</script>  
<script>
    $(function () {
        var FIELDS_TEMPLATE = $('#add_fields_2').text();   
        var $form = $('#insurance_form');   
        var $fields = $form.find('.fields-2');   
        $form.on('click', '.add-record-2', function () { 
            $fields.prepend($(FIELDS_TEMPLATE)); 
        }); 
        $form.on('click', '.remove-fields-2', function (event) {
            $(event.target).closest('.input-fields-2').remove();  
        });      
    });   
</script>          