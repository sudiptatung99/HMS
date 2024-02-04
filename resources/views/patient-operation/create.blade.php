@section('title')
    {{ 'Patient Operation' }}
@endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Patient</h3>
                <div class="nk-block-des text-soft">
                    <p>Create Patient</p>
                </div>
            </div>
            <a href="{{ route('operation.patient') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-list"></em><span>List</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form action="{{ route('operation.patient.store') }}" method="POST">
                            @csrf
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Patient Id <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id"
                                        id="operation_category">
                                        <option value="" selected disabled></option>
                                        {{ getPatient('') }}
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Operation Category <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="category_id"
                                        id="operation_category">
                                        <option value="" selected disabled></option>
                                        {{ getOperationcategory('') }}
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Operation Name <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="operation_id" required
                                    id="operation">
                                    <option value="" selected disabled></option>

                                </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Operation Date <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="operation_date" value="<?php echo date('m/d/Y'); ?>" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Consultant Doctor <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required
                                    id="operation_category">
                                    <option value="" selected disabled></option>
                                    {{ getDoctor('') }}
                                </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Assistant Consultant 1 </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="assistant_consultant_one" >
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Assistant Consultant 2 </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="assistant_consultant_two" >
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Anesthetist </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="anesthetist" >
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Anesthesia Type </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="anesthesia_type" >
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">OT Technician</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ot_technician" >
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">OT Assistant </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="ot_assistant" >
                                </div>
                            </div>

                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Remark </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="remark" >
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Result</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="result" >
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
<script>
    $(document).on('change', '#operation_category', function(e) {
        var category_id = e.target.value;
        var selectList = document.getElementById('operation');
        $.ajax({
            url: "{{ route('operation.category.details') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "category_id": category_id
            },

            success: function(data) {
                let array = data.data;
                for (let i = 0; i < array.length; i++) {
                    var option = document.createElement("option");
                    option.value = array[i].id;
                    option.text = array[i].name;
                    selectList.appendChild(option);
                }
            }
        })
    });
</script>
