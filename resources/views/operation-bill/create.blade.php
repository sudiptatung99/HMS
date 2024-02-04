@section('title')
    {{ 'Operation Bill Create' }}
@endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="mb-3 nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Operation Bill</h3>
                <div class="nk-block-des text-soft">
                    <p>Operation Create Bill</p>
                </div>
            </div>
            <a href="{{ route('operation-bill') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-list"></em><span>List</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="mt-3 card-body">
                        <form action="{{ route('operation-bill.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Patient ID <i
                                                class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <select class="form-select js-select2" data-search="on" name="patient_id"
                                                id="patient_id" required>
                                                <option value="" selected disabled></option>
                                                {{ getPatient('') }}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Bill Date <i
                                                class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control date-picker" name="bill_date"
                                                value="<?php echo date('m/d/Y'); ?>" id="bill_date" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Patient Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="patient_name" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Admission</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="patient_admission" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="patient_gender" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="patient_address" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Operation Name <i
                                                class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <select class="form-select js-select2" data-search="on" name="operation_id"
                                                id="operation" required>
                                                <option value="" selected disabled></option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Operation Category </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="operation_category" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Doctor </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="doctor" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-4 row">
                                        <label class="col-sm-3 col-form-label">Operation Date </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control date-picker" value=""
                                                id="operation_date" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="divider"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th width="40%">Total ({{ env('CURRENCY_SYMBOL') }})<i
                                                        class="text-danger">*</i></th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="total" id="total" required
                                                        style="width: 50%; float: right;" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Discount (%)</th>
                                                <td width="60%" colspan="2">
                                                    <div class="input-group" style="width: 50%; float: right;">
                                                        <input type="number" min="1" name="discount_percent"
                                                            id="discount_percent" class="form-control">
                                                        <input type="text" name="discount" id="discount"
                                                            class="form-control" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">GST (%)</th>
                                                <td width="60%" colspan="2">
                                                    <div class="input-group" style="width: 50%; float: right;">
                                                        <input type="number" min="1" name="gst_percent"
                                                            id="gst_percent" class="form-control" required>
                                                        <input type="text" name="gst" id="gst"
                                                            class="form-control" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Payable Amount ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="payable" id="payable"
                                                        style="width: 50%; float: right;" class="form-control"
                                                        readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="mt-3 row">
                                        <div class="mt-3 col-md-6">
                                            <div class="form-group">
                                                <label>Payment Mode <i class="text-danger">*</i></label>
                                                <select class="form-select js-select2" data-search="on"
                                                    name="payment_mode" required>
                                                    <option value="" selected disabled></option>
                                                    {{ getPaymentMethod('') }}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-3 col-md-6">
                                            <div class="form-group">
                                                <label>Payment Status <i class="text-danger">*</i></label>
                                                <select class="form-select js-select2" data-search="on"
                                                    name="payment_status" required>
                                                    <option value="" selected disabled></option>
                                                    {{ getPaymentStatus('') }}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mt-2 col-md-12">
                                            <div class="form-group">
                                                <label>Note</label>
                                                <textarea name="note" rows="3" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="mt-4 text-center col-md-8">
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
    var package_cost = 0;
    var service_cost = 0;
    var bed_amount = 0;
    var advance = 0;
    var insurance = 0;
    var total = 0;
    var payable = 0;
    var discount = 0;
    var gst = 0;
    $(document).on('change', '#patient_id', function(e) {
        var patient_id = e.target.value;
        $.ajax({
            url: "{{ route('get.patient.details') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "patient_id": patient_id
            },
            success: function(data) {
                document.getElementById("patient_name").value = data.patient.name;
                document.getElementById("patient_admission").value = data.patient.admission_date;
                document.getElementById("patient_gender").value = data.patient.gender;
                document.getElementById("patient_address").value = data.patient.address;
            }
        })
    });
    $(document).on('change', '#patient_id', function(e) {
        var patient_id = e.target.value;
        var selectList = document.getElementById('operation');
        var list = document.getElementById('operation');
        while (list.firstChild) {
            list.removeChild(list.firstChild);
        }
        document.getElementById("operation_category").value = "";
        document.getElementById("operation_date").value ='';
        document.getElementById("doctor").value = '';

        $.ajax({
            url: "{{ route('operation.patient.details') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "patient_id": patient_id
            },
            success: function(data) {
                var option = document.createElement("option");
                option.value = '';
                option.text = "";
                selectList.appendChild(option);
                let array = data.data;
                // <option value="" selected disabled></option>
                for (let i = 0; i < array.length; i++) {
                    var option = document.createElement("option");
                    option.value = array[i].id;
                    option.text = array[i].operation.name;
                    selectList.appendChild(option);
                }
            }
        })
    });

    $(document).on('change', '#operation', function(e) {
        var id = e.target.value;
        var selectList = document.getElementById('operation');
        $.ajax({
            url: "{{ route('operation.patient.bill') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id
            },
            success: function(data) {
                let patient = data.data;
                document.getElementById("operation_category").value = patient.category.name;
                document.getElementById("operation_date").value = patient.operation_date;
                document.getElementById("doctor").value = patient.doctor.name;
            }
        })
    });
    $(document).on('change', '#total', function(e) {
        total = e.target.value;
        document.getElementById("payable").value = total;
    })
    $(document).on('change', '#discount_percent', function(e) {
        var discount_percent = e.target.value;
        discount = total * discount_percent / 100;
        payable = (total - discount) - (advance + insurance);
        document.getElementById("payable").value = payable;
        document.getElementById("discount").value = discount;
        document.getElementById("gst_percent").value = '';
        document.getElementById("gst").value = '';
    });
    $(document).on('change', '#gst_percent', function(e) {
        var gst_percent = e.target.value;
        gst = (total - discount) * gst_percent / 100;
        payable = ((total - discount) + gst) - (advance + insurance);
        document.getElementById("payable").value = payable;
        document.getElementById("gst").value = gst;
    });
</script>
<style>
    .divider {
        background: #e4e3e3;
        height: 1px;
        clear: both;
        margin-bottom: 15px;
        margin-top: 15px;
    }
</style>
