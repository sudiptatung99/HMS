@section('title')
    {{ 'patient Operation Update' }}
@endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="mb-3 nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Patient</h3>
                <div class="nk-block-des text-soft">
                    <p>Update Patient</p>
                </div>
            </div>
            <a href="{{ route('operation.patient') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-list"></em><span>List</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="mt-3 card-body">
                        <form action="{{ route('operation.patient.update', encrypt($patient->id)) }}" method="POST">
                            @csrf
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Patient Id <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="patient_id"
                                        id="">
                                        <option value="" selected disabled></option>
                                        {{ getPatient($patient->patient_id) }}
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Operation Category <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="category_id"
                                        id="operation_category">
                                        <option value="" selected disabled></option>
                                        {{ getOperationcategory($patient->category_id) }}
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Operation Name <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="operation_id" required
                                        id="operation">
                                        <option value="" selected disabled></option>
                                        {{getCategoryOperation($patient->category_id,$patient->operation_id)}}

                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Operation Date <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker"
                                        value="{{ $patient->operation_date }}" name="operation_date"
                                        value="<?php echo date('m/d/Y'); ?>" required>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Consultant Doctor <i
                                        class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required
                                        id="operation_category">
                                        <option value="" selected disabled></option>
                                        {{ getDoctor($patient->doctor_id) }}
                                    </select>
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Assistant Consultant 1 </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"
                                        value="{{ $patient->assistant_consultant_one }}"
                                        name="assistant_consultant_one">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Assistant Consultant 2 </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"
                                        value="{{ $patient->assistant_consultant_two }}"
                                        name="assistant_consultant_two">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Anesthetist </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $patient->anesthetist }}"
                                        name="anesthetist">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Anesthesia Type </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $patient->anesthesia_type }}"
                                        name="anesthesia_type">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">OT Technician </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $patient->ot_technician }}"
                                        name="ot_technician">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">OT Assistant </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $patient->ot_assistant }}"
                                        name="ot_assistant">
                                </div>
                            </div>

                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Remark </label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $patient->remark }}"
                                        name="remark">
                                </div>
                            </div>
                            <div class="mb-4 row">
                                <label class="col-sm-2 col-form-label">Result</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $patient->result }}"
                                        name="result">
                                </div>
                            </div>
                            <div class="mb-4 row">
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
<script>
    var option_category = document.getElementById('operation_category').value;
    // var selectList = document.getElementById('operation');
    // $.ajax({
    //     url: "{{ route('operation.category.details') }}",
    //     type: "POST",
    //     data: {
    //         "_token": "{{ csrf_token() }}",
    //         "category_id": option_category
    //     },
    //     success: function(data) {
    //         let array = data.data;
    //         console.log(array);
    //         for (let i = 0; i < array.length; i++) {
    //             var option = document.createElement("option");
    //             option.value = array[i].id;
    //             option.text = array[i].name;
    //             // option.id = array[i].id;
    //             selectList.appendChild(option);
    //         }
    //         for (let i = 0; i < array.length; i++) {
    //             if ("{{ $patient->operation_id }}" == array[i].id) {
    //                 $(`#${array[i].id}`).attr({"selected": true});
    //             }
    //         }
    //     }
    // })
</script>

<script>
    $(document).on('change', '#operation_category', function(e) {
        var category_id = e.target.value;
        var selectList = document.getElementById('operation');
        var list = document.getElementById('operation');
        while (list.firstChild) {
            list.removeChild(list.firstChild);
        }
        $.ajax({
            url: "{{ route('operation.category.details') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "category_id": category_id
            },
            success: function(data) {
                var option = document.createElement("option");
                option.value = '';
                option.text = "";
                selectList.appendChild(option);
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
