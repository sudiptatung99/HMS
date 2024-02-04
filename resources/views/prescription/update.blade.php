@section('title') {{ 'Prescription Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Prescription</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Prescription</p>  
                </div>    
            </div> 
            <a href="{{ route('prescription') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>   
        </div>       
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('prescription.update.store', encrypt($prescription->id)) }}" method="POST">        
                        @csrf   
                            <div class="input_field_div">
                                <div class="input_field">
                                    <select class="form-control" name="patient_id" id="patient_id" required>      
                                        {{ getPatient($prescription->patient_id) }}      
                                    </select>    
                                </div>  
                                <div class="input_field">
                                    <div class="type_input">
                                        <p class="mb-0">Name</p>  
                                        <div class="form-check"> 
                                            <label class="form-check-label" id="name"></label>  
                                        </div>   
                                    </div>  
                                </div>  
                                <div class="input_field">
                                    <div class="type_input">
                                        <p class="mb-0">Date</p> 
                                        <div class="form-check">
                                            <input type="hidden" name="date" value="{{ $prescription->date }}"> 
                                            <label class="form-check-label">{{ $prescription->date }}</label>    
                                        </div>  
                                    </div> 
                                </div> 
                                <div class="input_field">
                                    <div class="type_input">
                                        <p class="mb-0">Gender</p>  
                                        <div class="form-check"> 
                                            <label class="form-check-label" id="gender"></label>   
                                        </div>    
                                    </div>   
                                </div>   
                                <div class="input_field">
                                    <input type="text" class="form-control" placeholder="Weight" name="weight" value="{{ $prescription->weight }}" id="weight" required>   
                                </div>   
                                <div class="input_field">
                                    <input type="text" class="form-control" placeholder="Blood Pressure" name="blood_pressure" value="{{ $prescription->blood_pressure }}" id="blood_pressure" required>   
                                </div>  
                                <div class="input_field">
                                    <input type="text" class="form-control" placeholder="Reference" name="reference" value="{{ $prescription->reference }}" required>    
                                </div> 
                                <div class="input_field">
                                    <input type="number" class="form-control" placeholder="Visiting Fees" name="visiting_fees" value="{{ $prescription->visiting_fees }}" required>     
                                </div>   
                                <div class="input_field">
                                    <div class="type_input">
                                        <p class="mb-0">Type</p>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="prescription_type" value="New" id="type_1" @if($prescription->prescription_type == 'New') checked @endif> 
                                            <label class="form-check-label" for="type_1">New</label> 
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="prescription_type" value="Old" id="type_2" @if($prescription->prescription_type == 'Old') checked @endif>  
                                            <label class="form-check-label" for="type_2">Old</label>   
                                        </div> 
                                    </div> 
                                </div>
                                <div class="input_field" style="width: 100%;"> 
                                    <input type="text" class="form-control" placeholder="Patient Notes" name="patient_notes" value="{{ $prescription->patient_notes }}" required>     
                                </div> 
                                <table class="table table-bordered mt-3" id="medicine_list">       
                                    <thead>    
                                        <tr class="white-space-nowrap">  
                                            <th width="20%">Medicine Name <i class="text-danger">*</i></th> 
                                            <th width="20%">Medicine Type <i class="text-danger">*</i></th>    
                                            <th width="50%">Instruction <i class="text-danger">*</i></th>  
                                            <th width="15%">Days <i class="text-danger">*</i></th>      
                                            <th></th>       
                                        </tr>     
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp  
                                        @foreach($prescription_medicine as $key => $prescription_medicine)  
                                            @php $i = $no++; @endphp
                                            <tr @if($i != 1) id="medicine_row_{{ $i }}" @endif>         
                                                <td> 
                                                    <input type="text" class="form-control" name="medicine_name[]" value="{{ $prescription_medicine->name }}" required>      
                                                </td>  
                                                <td>
                                                    <input type="text" class="form-control" name="medicine_type[]" value="{{ $prescription_medicine->type }}" required>      
                                                </td>   
                                                <td>
                                                    <textarea type="text" class="form-control" name="medicine_instruction[]" required>{{ $prescription_medicine->instruction }}</textarea>       
                                                </td>   
                                                <td>
                                                    <input type="number" class="form-control" name="medicine_days[]" value="{{ $prescription_medicine->days }}" required>       
                                                </td>    
                                                <td>
                                                    @if($i == 1)
                                                        <button type="button" class="btn btn-success add-medicine"><em class="icon ni ni-plus"></em></button>
                                                    @else
                                                        <button type="button" class="btn btn-danger delete_medicine_row" data-row-id="{{ $i }}"><em class="icon ni ni-trash"></em></button>  
                                                    @endif   
                                                </td>      
                                            </tr> 
                                        @endforeach       
                                    </tbody>    
                                </table>  
                                <table class="table table-bordered mt-2" id="diagnosis_list">       
                                    <thead>    
                                        <tr class="white-space-nowrap">  
                                            <th width="20%">Diagnosis Name</th>    
                                            <th width="75%">Instruction</th>         
                                            <th></th>       
                                        </tr>     
                                    </thead>
                                    <tbody> 
                                        @php $no = 1; @endphp  
                                        @foreach($prescription_diagnosis as $key => $prescription_diagnosis)  
                                        @php $i = $no++; @endphp
                                            <tr @if($i != 1) id="diagnosis_row_{{ $i }}" @endif>      
                                                <td>
                                                    <input type="text" class="form-control" name="diagnosis_name[]" value="{{ $prescription_diagnosis->name }}">      
                                                </td>    
                                                <td>
                                                    <textarea type="text" class="form-control" name="diagnosis_instruction[]">{{ $prescription_diagnosis->instruction }}</textarea>        
                                                </td>       
                                                <td>
                                                    @if($i == 1)
                                                        <button type="button" class="btn btn-success add-diagnosis"><em class="icon ni ni-plus"></em></button> 
                                                    @else
                                                        <button type="button" class="btn btn-danger delete_diagnosis_row" data-row-id="{{ $i }}"><em class="icon ni ni-trash"></em></button>  
                                                    @endif 
                                                </td>     
                                            </tr>       
                                        @endforeach    
                                    </tbody>     
                                </table>     
                            </div>  
                            <div class="row"> 
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-8 mt-4 text-center">  
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
<script>
    var patient_id = {{ $prescription->patient_id }};  
    $.ajax({
        url: "{{ route('get.patient.details') }}",   
        type: "POST", 
        data: {
            "_token": "{{ csrf_token() }}",
            "patient_id": patient_id
        },
        success: function (data) {           
            document.getElementById("name").innerHTML = data.patient.name;              
            document.getElementById("gender").innerHTML = data.patient.gender;                      
        }       
    })  
</script>
<script>
    $(document).on('change', '#patient_id', function (e) {    
        var patient_id = e.target.value;  
        $.ajax({
            url: "{{ route('get.patient.details') }}",   
            type: "POST", 
            data: {
                "_token": "{{ csrf_token() }}",
                "patient_id": patient_id
            },
            success: function (data) {           
                document.getElementById("name").innerHTML = data.patient.name;              
                document.getElementById("gender").innerHTML = data.patient.gender;                
                document.getElementById("weight").value = data.patient.weight;            
                document.getElementById("blood_pressure").value = data.patient.blood_pressure;              
            }      
        })  
    }); 
</script>    
<script>
    var total_medicine_rows = {{ $prescription_medicine->count() }};    
    $(document).on('click', '.add-medicine', function () { 
        var id = total_medicine_rows + 1; 
        var row = "<tr id='medicine_row_"+ id +"'><td><input type='text' class='form-control' name='medicine_name[]' required></td><td><input type='text' class='form-control' name='medicine_type[]' required></td><td><textarea type='text' class='form-control' name='medicine_instruction[]' required></textarea></td><td><input type='number' class='form-control' name='medicine_days[]' required></td><td><button type='button' class='btn btn-danger delete_medicine_row' data-row-id='"+ id +"'><em class='icon ni ni-trash'></em></button></td></tr>";     
        $('#medicine_list').find('tbody').append(row);         
        total_medicine_rows = total_medicine_rows + 1;     
    });    
    $(document).on('click', '.delete_medicine_row', function (e) {  
        var del_row_id = $(this).data('rowId'); 
        $("#medicine_row_" + del_row_id).remove();          
    });        
</script>    
<script>
    var total_diagnosis_rows = {{ $prescription_diagnosis->count() }};       
    $(document).on('click', '.add-diagnosis', function () { 
        var id = total_diagnosis_rows + 1; 
        var row = "<tr id='diagnosis_row_"+ id +"'><td><input type='text' class='form-control' name='diagnosis_name[]' required></td><td><textarea type='text' class='form-control' name='diagnosis_instruction[]' required></textarea></td><td><button type='button' class='btn btn-danger delete_diagnosis_row' data-row-id='"+ id +"'><em class='icon ni ni-trash'></em></button></td></tr>";       
        $('#diagnosis_list').find('tbody').append(row);            
        total_diagnosis_rows = total_diagnosis_rows + 1;        
    });      
    $(document).on('click', '.delete_diagnosis_row', function (e) {   
        var del_row_id = $(this).data('rowId');  
        $("#diagnosis_row_" + del_row_id).remove();           
    });        
</script>   
<style>
    .input_field_div {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: center;
        column-gap: 43px;
        row-gap: 10px;
    }

    .input_field {
        width: 30%;
        border-bottom: 1px solid rgb(202, 202, 202);
    }

    .input_field .form-control {
        border: transparent !important;
    }

    .type_input {
        display: flex;
        align-items: center;
        column-gap: 20px;
        padding: 8px 10px;
    }
</style>          