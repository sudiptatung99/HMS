@section('title') {{ 'Microbiology Test Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Test</h3>
                <div class="nk-block-des text-soft">
                    <p>Create Test</p>
                </div>
            </div>
            <a href="{{ route('microbiology-test') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-list"></em><span>List</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form action="{{ route('microbiology-test.store') }}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Test Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Short Name <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="short_name" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Category <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <select class="form-select js-select2" data-search="on" name="category_id" required>
                                                <option value="" selected disabled></option>
                                                {{ getMicrobiologyCategory('') }}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Method <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="method" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Amount <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="amount" id="amount" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">GST (%) <i class="text-danger">*</i></label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" name="gst_percent" id="gst_percent" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">GST Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="gst" id="gst" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="row mb-4">
                                        <label class="col-sm-3 col-form-label">Total</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="total" id="total" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="parameter_list">
                                    <thead>
                                        <tr class="white-space-nowrap">
                                            <th width="45%">Parameter Name <i class="text-danger">*</i></th>
                                            <th width="30%">Reference Range <i class="text-danger">*</i></th>
                                            <th width="20%">Unit <i class="text-danger">*</i></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr id="row_1">
                                            <td>
                                                <select class="form-select" name="parameter_id[]" id="parameter_id_1" required>
                                                    <option value="" selected disabled>--</option>
                                                    {{ getMicrobiologyParameter('') }}
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="parameter_range_1" readonly>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" id="parameter_unit_1" readonly>
                                            </td>
                                            <td>
                                                <a class="btn btn-success add-record"><em class="icon ni ni-plus"></em></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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
    var total_rows = 1;
    $(document).on('click', '.add-record', function () {
        var id = total_rows + 1;
        var row = "<tr id='row_"+ id +"'><td><select class='form-select' name='parameter_id[]' id='parameter_id_"+ id +"' required><option value='' selected disabled>--</option>{{ getMicrobiologyParameter('') }}</select></td><td><input type='text' class='form-control' id='parameter_range_"+ id +"' readonly></td><td><input type='text' class='form-control' id='parameter_unit_"+ id +"' readonly></td><td><button type='button' class='btn btn-danger delete_row' data-row-id='"+ id +"'><em class='icon ni ni-trash'></em></button></td></tr>";
        $('#parameter_list').find('tbody').append(row);
        total_rows = total_rows + 1;
    });
    $(document).on('click', '.delete_row', function (e) {
        var del_row_id = $(this).data('rowId');
        $("#row_" + del_row_id).remove();
    });
</script>
<script>
    for(let i = 1; i <= 500; i++) {
        $(document).on('change', '#parameter_id_'+ i +'', function (e) {
            var parameter_id = e.target.value;
            $.ajax({
                url: "{{ route('get.microbiology.parameter.details') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "parameter_id": parameter_id
                },
                success: function (data) {
                    document.getElementById('parameter_range_'+ i +'').value = data.microbiology_parameter.range;
                    document.getElementById('parameter_unit_'+ i +'').value = data.microbiology_parameter.unit;
                }
            })
        });
    }
</script>
<script>
    $(document).on('change', '#amount', function (e) {
        var amount = e.target.value;
        document.getElementById("gst_percent").value = '';
        document.getElementById("gst").value = '';
        document.getElementById("total").value = amount;
    });
    $(document).on('change', '#gst_percent', function (e) {
        var gst_percent = e.target.value;
        var amount = document.getElementById("amount").value;
        gst = amount * gst_percent / 100;
        document.getElementById("gst").value = gst;
        document.getElementById("total").value = Number(amount) + Number(gst);
    });
</script>
