@section('title') {{ 'Biohemistry Bill Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Bill</h3>
                <div class="nk-block-des text-soft">
                    <p>Update Bill</p>
                </div>
            </div>
            <a href="{{ route('biochemistry-bill') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-list"></em><span>List</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form action="{{ route('biochemistry-bill.update.store', encrypt($biochemistry_bill->id)) }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Patient ID <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <select class="form-select js-select2" data-search="on" name="patient_id" id="patient_id" required>
                                                {{ getPatient($biochemistry_bill->patient_id) }}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Patient Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $biochemistry_bill->patient->name }}" id="patient_name" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="test_list">
                                    <thead>
                                        <tr class="white-space-nowrap">
                                            <th width="35%">Test Name <i class="text-danger">*</i></th>
                                            <th width="15%">Amount <i class="text-danger">*</i></th>
                                            <th width="15%">GST (%) <i class="text-danger">*</i></th>
                                            <th width="15%">GST Amount <i class="text-danger">*</i></th>
                                            <th width="15%">Total <i class="text-danger">*</i></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach($pathology_test as $key => $pathology_test)
                                        @php $i = $no++; @endphp
                                            <tr @if($i != 1) id="row_{{ $i }}" @endif>
                                                <td>
                                                    <select class="form-select" name="test_id[]" id="test_id_{{ $i }}" required>
                                                        {{ getPathologyTest($pathology_test->test_id) }}
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{ $pathology_test->test->amount }}" id="test_amount_{{ $i }}" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{ $pathology_test->test->gst_percent }}" id="test_gst_percent_{{ $i }}" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{ $pathology_test->test->gst }}" id="test_gst_{{ $i }}" readonly>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="{{ $pathology_test->test->total }}" id="test_total_{{ $i }}" readonly>
                                                </td>
                                                <td>
                                                    @if($i == 1)
                                                            <a class="btn btn-success add-record"><em class="icon ni ni-plus"></em></a>
                                                    @else
                                                        <button type="button" class="btn btn-danger delete_row" data-row-id="{{ $i }}"><em class="icon ni ni-trash"></em></button>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12 mt-3">
                                            <div class="form-group">
                                                <label>Bill Date <i class="text-danger">*</i></label>
                                                <input type="text" class="form-control date-picker" name="bill_date" value="{{ $biochemistry_bill->bill_date }}" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <div class="form-group">
                                                <label>Doctor <i class="text-danger">*</i></label>
                                                <select class="form-select js-select2" data-search="on" name="doctor_id" required>
                                                    {{ getDoctor($biochemistry_bill->doctor_id) }}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mt-3">
                                            <div class="form-group">
                                                <label>Note</label>
                                                <textarea name="note" rows="3" class="form-control">{{ $biochemistry_bill->note }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-4">
                                    <table>
                                        <tbody>
                                            <tr>
                                                <th width="40%">Total ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="total" value="{{ $biochemistry_bill->total }}" id="total" style="width: 50%; float: right;" class="form-control" readonly>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Discount (%)</th>
                                                <td width="60%" colspan="2">
                                                    <div class="input-group" style="width: 50%; float: right;">
                                                        <input type="number" min="1" name="discount_percent" value="{{ $biochemistry_bill->discount_percent }}" id="discount_percent" class="form-control">
                                                        <input type="text" name="discount" value="{{ $biochemistry_bill->discount }}" id="discount" class="form-control" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">GST ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <div class="input-group" style="width: 50%; float: right;">
                                                        <input type="text" name="gst" value="{{ $biochemistry_bill->gst }}" id="gst" class="form-control" readonly>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th width="40%">Net Amount ({{ env('CURRENCY_SYMBOL') }})</th>
                                                <td width="60%" colspan="2">
                                                    <input type="text" name="net_amount" value="{{ $biochemistry_bill->net_amount }}" id="net_amount" style="width: 50%; float: right;" class="form-control" readonly>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Mode <i class="text-danger">*</i></label>
                                                <select class="form-select js-select2" data-search="on" name="payment_mode" required>
                                                    {{ getPaymentMethod($biochemistry_bill->payment_mode) }}
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Payment Amount ({{ env('CURRENCY_SYMBOL') }}) <i class="text-danger">*</i></label>
                                                <input type="text" name="payment_amount" value="{{ $biochemistry_bill->payment_amount }}" id="payment_amount" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
    var total_rows = {{ $pathology_test->count() }};
    $(document).on('click', '.add-record', function () {
        var id = total_rows + 1;
        var row = "<tr id='row_"+ id +"'><td><select class='form-select' name='test_id[]' id='test_id_"+ id +"' required><option value='' selected disabled>--</option>{{ getPathologyTest('') }}</select></td><td><input type='text' class='form-control' id='test_amount_"+ id +"' readonly></td><td><input type='text' class='form-control' id='test_gst_percent_"+ id +"' readonly></td><td><input type='text' class='form-control' id='test_gst_"+ id +"' readonly></td><td><input type='text' class='form-control' id='test_total_"+ id +"' readonly></td><td><button type='button' class='btn btn-danger delete_row' data-row-id='"+ id +"'><em class='icon ni ni-trash'></em></button></td></tr>";
        $('#test_list').find('tbody').append(row);
        total_rows = total_rows + 1;
    });
    $(document).on('click', '.delete_row', function (e) {
        var del_row_id = $(this).data('rowId');
        $("#row_" + del_row_id).remove();
        update_amount();
    });
    var total_amount = 0;
    var total_gst = 0;
    function update_amount() {
        var table = document.getElementById("test_list");
        var sumVal = 0;
        var sumGst = 0;
        for(var i = 1; i < table.rows.length; i++)
        {
            sumVal = sumVal + parseInt(table.rows[i].cells[1].getElementsByTagName("input")[0].value);
            sumGst = sumGst + parseInt(table.rows[i].cells[3].getElementsByTagName("input")[0].value);
        }
        document.getElementById("discount_percent").value = '';
        document.getElementById("discount").value = '';
        document.getElementById("total").value = sumVal;
        document.getElementById("gst").value = sumGst;
        document.getElementById("net_amount").value = sumVal + sumGst;
        document.getElementById("payment_amount").value = sumVal + sumGst;
        total_amount = sumVal;
        total_gst = sumGst;
    }
</script>
<script>
    for(let i = 1; i <= 500; i++) {
        $(document).on('change', '#test_id_'+ i +'', function (e) {
            var test_id = e.target.value;
            $.ajax({
                url: "{{ route('get.biochemistry.test.details') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "test_id": test_id
                },
                success: function (data) {
                    document.getElementById('test_amount_'+ i +'').value = data.pathology_test.amount;
                    document.getElementById('test_gst_percent_'+ i +'').value = data.pathology_test.gst_percent;
                    document.getElementById('test_gst_'+ i +'').value = data.pathology_test.gst;
                    document.getElementById('test_total_'+ i +'').value = data.pathology_test.total;
                    update_amount();
                }
            })
        });
    }
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
                document.getElementById("patient_name").value = data.patient.name;
            }
        })
    });
    $(document).on('change', '#discount_percent', function (e) {
        var discount_percent = e.target.value;
        var amount = Number(document.getElementById("total").value);
        var discount = amount * discount_percent / 100;
        document.getElementById("discount").value = discount;
        document.getElementById("net_amount").value = (amount - discount) + Number(document.getElementById("gst").value);
        document.getElementById("payment_amount").value = (amount - discount) + Number(document.getElementById("gst").value);
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
