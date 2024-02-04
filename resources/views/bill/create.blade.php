@section('title') {{ 'Bill Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Bill</h3>
                <div class="nk-block-des text-soft">
                    <p>Create Bill</p>
                </div>
            </div>
            <a href="{{ route('bill') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-list"></em><span>List</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form action="{{ route('bill.store') }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Patient ID <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <select class="form-select js-select2" data-search="on" name="patient_id" id="patient_id" required>
                                                <option value="" selected disabled></option>
                                                {{ getPatient('') }}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Bill Date <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control date-picker" name="bill_date" value="<?php echo date('m/d/Y'); ?>" id="bill_date" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Patient Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="patient_name" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Admission</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="patient_admission" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Gender</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="patient_gender" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="patient_address" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label">Package</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="package_name" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label">Days</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="package_days" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label">Amount ({{ env('CURRENCY_SYMBOL') }})</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="package_amount" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-3">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label">Insurance</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="insurance_name" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mt-3">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label">Policy No.</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="policy_no" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col mt-3">
                                    <div class="row">
                                        <label class="col-md-4 col-form-label">Amount ({{ env('CURRENCY_SYMBOL') }})</label>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" id="insurance_amount" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table table-bordered" id="bed_details">
                                                <thead>
                                                    <tr>
                                                        <td colspan="5" class="text-center fw-bold h5">Bed Details</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Room No.</th>
                                                        <th>Bed No.</th>
                                                        <th>Days</th>
                                                        <th>Amount ({{ env('CURRENCY_SYMBOL') }})</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                            <br>
                                            <table class="table table-bordered" id="advance_payment">
                                                <thead>
                                                    <tr>
                                                        <td colspan="4" class="text-center fw-bold h5">Advance Payment</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Amount ({{ env('CURRENCY_SYMBOL') }})</th>
                                                        <th>Payment Method</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                            <br>
                                            <table class="table table-bordered" id="additional_service">
                                                <thead>
                                                    <tr>
                                                        <td colspan="4" class="text-center fw-bold h5">Additional Services</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Service Name</th>
                                                        <th>Amount ({{ env('CURRENCY_SYMBOL') }})</th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th width="40%">Package Charge ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="package_charge" id="package_charge" style="width: 50%; float: right;" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Service Charge ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="service_charge" id="service_charge" style="width: 50%; float: right;" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Bed Charge ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="bed_charge" id="bed_charge" style="width: 50%; float: right;" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Total ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="total" id="total" style="width: 50%; float: right;" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Discount (%)</th>
                                                <td width="60%" colspan="2">
                                                    <div class="input-group" style="width: 50%; float: right;">
                                                        <input type="number" min="1" name="discount_percent" id="discount_percent" class="form-control">
                                                        <input type="text" name="discount" id="discount" class="form-control" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">GST (%)</th>
                                                <td width="60%" colspan="2">
                                                    <div class="input-group" style="width: 50%; float: right;">
                                                        <input type="number" min="1" name="gst_percent" id="gst_percent" class="form-control" required>
                                                        <input type="text" name="gst" id="gst" class="form-control" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Advance Paid ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="advance_paid" id="advance_paid" style="width: 50%; float: right;" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Insurance ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="insurance" id="insurance" style="width: 50%; float: right;" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Payable Amount ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="payable" id="payable" style="width: 50%; float: right;" class="form-control" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row mt-3">
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label>Payment Mode <i class="text-danger">*</i></label>
                                                <select class="form-select js-select2" data-search="on" name="payment_mode" required>
                                                    <option value="" selected disabled></option>
                                                    {{ getPaymentMethod('') }}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label>Payment Status <i class="text-danger">*</i></label>
                                                <select class="form-select js-select2" data-search="on" name="payment_status" required>
                                                    <option value="" selected disabled></option>
                                                    {{ getPaymentStatus('') }}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
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
                                <div class="col-md-8 mt-4 text-center">
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
    $(document).on('change', '#patient_id', function (e) {
        var patient_id = e.target.value;
        $.ajax({
            url: "{{ route('get.patient.bill-details') }}",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                "patient_id": patient_id
            },
            success: function (data) {
            // console.log(data);
                document.getElementById("patient_name").value = data.patient.name;
                document.getElementById("patient_admission").value = data.patient.admission_date;
                document.getElementById("patient_gender").value = data.patient.gender;
                document.getElementById("patient_address").value = data.patient.address;
                var bill_date = document.getElementById("bill_date").value;
                const startDate = data.patient.admission_date;
                const endDate = bill_date;
                const diffInMs = new Date(endDate) - new Date(startDate);
                const diffInDays = (diffInMs / (1000 * 60 * 60 * 24) + 1);
                document.getElementById("package_name").value = data.package_details.name;
                document.getElementById("package_days").value = diffInDays;
                package_cost = Number(data.package_details.package_cost) * diffInDays;
                document.getElementById("package_amount").value = package_cost;
                document.getElementById("insurance_name").value = data.insurance.insurance_name;
                document.getElementById("policy_no").value = data.insurance.policy_no;
                insurance = Number(data.insurance.total);
                document.getElementById("insurance_amount").value = insurance;
                bed_amount = Number(data.bed_details.bed_charge) * diffInDays;
                $('#bed_details').find('tbody').append('<tr><td>'+ data.room_details.room_no +'</td><td>'+ data.bed_details.bed_no +'</td><td>'+ diffInDays +'</td><td>'+ bed_amount +'</td></tr>');
                for(var i = 0; i < data.advance_payment.length; i++) {
                    advance = advance + Number(data.advance_payment[i].amount);
                    $('#advance_payment').find('tbody').append('<tr><td>'+ data.advance_payment[i].amount +'</td><td>'+ data.advance_payment[i].payment_method +'</td><td>'+ data.advance_payment[i].created_at.split('T')[0] +'</td></tr>');
                }
                for(var i = 0; i < data.additional_service.length; i++) {
                    service_cost = service_cost + Number(data.additional_service[i].amount);
                    $('#additional_service').find('tbody').append('<tr><td>'+ data.additional_service[i].name +'</td><td>'+ data.additional_service[i].amount +'</td></tr>');
                }
                document.getElementById("package_charge").value = package_cost;
                document.getElementById("service_charge").value = service_cost;
                document.getElementById("bed_charge").value = bed_amount;
                document.getElementById("advance_paid").value = advance;
                document.getElementById("insurance").value = insurance;
                total = package_cost + service_cost + bed_amount;
                document.getElementById("total").value = total;
                payable = total - (advance + insurance);
                document.getElementById("payable").value = payable;
            }
        })
    });
    $(document).on('change', '#discount_percent', function (e) {
        var discount_percent = e.target.value;
        discount = total * discount_percent / 100;
        payable = (total - discount) - (advance + insurance);
        document.getElementById("payable").value = payable;
        document.getElementById("discount").value = discount;
        document.getElementById("gst_percent").value = '';
        document.getElementById("gst").value = '';
    });
    $(document).on('change', '#gst_percent', function (e) {
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
