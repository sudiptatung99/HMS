@section('title') {{ 'Operation Report Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Operation Report</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Operation Report</p>   
                </div>    
            </div> 
            <a href="{{ route('operation-report') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>       
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('operation-report.update.store', encrypt($operation_report->id)) }}" method="POST">         
                        @csrf  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Patient ID <i class="text-danger">*</i></label>  
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id" required>    
                                        {{ getPatient($operation_report->patient_id) }}       
                                    </select>   
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Date of Operation <i class="text-danger">*</i></label>
                                <div class="col-sm-8"> 
                                    <input type="text" class="form-control date-picker" name="date_of_operation" value="{{ $operation_report->date_of_operation }}" required>
                                </div> 
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Preoperative Diagnosis <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="preoperative_diagnosis" value="{{ $operation_report->preoperative_diagnosis }}" required>
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Procedure <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="procedure" value="{{ $operation_report->procedure }}" required>
                                </div>
                            </div>    
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Surgeon Name <i class="text-danger">*</i></label> 
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" multiple="multiple" name="surgeon[]" required>    
                                        @for($i = 0; $i < count($doctor); $i++) 
                                            <option value="{{ $doctor[$i]->id }}" {{ in_array($doctor[$i]->id, json_decode($operation_report->surgeon)) ? 'selected' : '' }}>{{ $doctor[$i]->name }}</option>    
                                        @endfor        
                                    </select>      
                                </div>  
                            </div>  
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Assistant <i class="text-danger">*</i></label> 
                                <div class="col-sm-8"> 
                                    <select class="form-select js-select2" multiple="multiple" name="assistant[]" required> 
                                        @for($i = 0; $i < count($doctor); $i++) 
                                            <option value="{{ $doctor[$i]->id }}" {{ in_array($doctor[$i]->id, json_decode($operation_report->assistant)) ? 'selected' : '' }}>{{ $doctor[$i]->name }}</option>    
                                        @endfor               
                                    </select>    
                                </div>  
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Anesthesia <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="anesthesia" value="{{ $operation_report->anesthesia }}" required>
                                </div>
                            </div>    
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Anesthesiologist <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="anesthesiologist" value="{{ $operation_report->anesthesiologist }}" required>
                                </div>
                            </div>     
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Description <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="description" required>{{ $operation_report->description }}</textarea>    
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