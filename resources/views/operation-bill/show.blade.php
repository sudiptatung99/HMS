@section('title') {{ 'Operation Bill View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="mb-3 nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Operation Bill</h3>
                <div class="nk-block-des text-soft">
                    <p>View Operation Bill</p>
                </div>
            </div>
            <a href="{{ route('operation-bill') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-list"></em><span>Operation List</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="nk-block">
                    <div class="invoice">
                        <div class="invoice-action">
                            <a class="btn btn-icon btn-lg btn-white btn-dim btn-outline-primary" href="javascript:void(0)" onclick="onPrint()">
                                <em class="icon ni ni-printer-fill"></em>
                            </a>
                        </div>
                        <div class="card invoice-wrap" id="section_to_print">
                            <div class="text-center invoice-brand">
                                <div href="index.html" class="logo-link">
                                    <img class="logo-dark logo-img" src="{{ asset('assets/images/logo.png') }}">
                                </div>
                            </div>
                            <div class="invoice-head">
                                <div class="invoice-desc">
                                    <ul class="list-plain">
                                        <li><span>Patient ID</span>:<span>{{ $operation_bill->patient->patient_id }}</span></li>
                                        <li><span>Contact</span>:<span>{{ env('COUNTRY_CODE') }} {{ $operation_bill->patient->contact }}</span></li>
                                        <li><span>Admission</span>:<span>{{ getDateFormat($operation_bill->patient->admission_date) }}</span></li>
                                    </ul>
                                </div>
                                <div class="invoice-desc">
                                    <ul class="list-plain">
                                        <li><span>Bill No.</span>:<span>{{ $operation_bill->bill_no }}</span></li>
                                        <li><span>Date</span>:<span>{{ getDateFormat($operation_bill->bill_date) }}</span></li>
                                        <li><span>Payment</span>:<span>{{ $operation_bill->payment_mode }}</span></li>
                                        <li><span>Status</span>:<span>{{ $operation_bill->payment_status }}</span></li>
                                    </ul>
                                </div>
                            </div>
                            <input type="hidden" value="{{ $operation_bill->bill_date }}" id="bill_date">
                            <div class="invoice-bills">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Operation Name</th>
                                                <th>Category</th>
                                                <th>Doctor</th>
                                                <th>OT Technician</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach($pathology_test as $key => $pathology_test) --}}
                                                <tr>
                                                    <td>{{ $operation_bill->patient_operations->operation->name }}</td>
                                                    <td>{{ $operation_bill->patient_operations->category->name }}</td>
                                                    <td>{{ $operation_bill->patient_operations->Doctor->name }}</td>
                                                    <td>{{ $operation_bill->patient_operations->ot_technician }}</td>
                                                    <td>{{ $operation_bill->patient_operations->operation_date }}</td>
                                                </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Total</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $operation_bill->total }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Discount</td>
                                                <td>
                                                    @if($operation_bill->discount_percent)
                                                        {{ $operation_bill->discount_percent }}%
                                                    @else
                                                        --
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Discount Amount</td>
                                                <td>
                                                    @if($operation_bill->discount)
                                                        {{ env('CURRENCY_SYMBOL') . $operation_bill->discount }}
                                                    @else
                                                        --
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>GST</td>
                                                <td>{{ $operation_bill->gst_percent }}%</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>GST Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $operation_bill->gst }}</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>Payable Amount</td>
                                                <td>{{ env('CURRENCY_SYMBOL') . $operation_bill->payment_amount }}</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <div class="mt-4 nk-notes ff-italic fs-12px text-soft">
                                        <b>Note:</b> {{ $operation_bill->note }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
{{-- <script>
    var patient_id = {{ $bill->patient_id }};
    $.ajax({
        url: "{{ route('get.patient.bill-details') }}",
        type: "POST",
        data: {
            "_token": "{{ csrf_token() }}",
            "patient_id": patient_id
        },
        success: function (data) {
            var bill_date = document.getElementById("bill_date").value;
            const startDate = data.patient.admission_date;
            const endDate = bill_date;
            const diffInMs = new Date(endDate) - new Date(startDate);
            const diffInDays = (diffInMs / (1000 * 60 * 60 * 24) + 1);
            package_cost = Number(data.package_details.package_cost) * diffInDays;
            $('#package').find('tbody').append('<tr><td>'+ data.package_details.name +'</td><td>'+ diffInDays +'</td><td>'+ package_cost +'</td></tr>');
            insurance = Number(data.insurance.total);
            $('#insurance').find('tbody').append('<tr><td>'+ data.insurance.insurance_name +'</td><td>'+ data.insurance.policy_no +'</td><td>'+ insurance +'</td></tr>');
            bed_amount = Number(data.bed_details.bed_charge) * diffInDays;
            $('#bed_details').find('tbody').append('<tr><td>'+ data.room_details.room_no +'</td><td>'+ data.bed_details.bed_no +'</td><td>'+ diffInDays +'</td><td>'+ bed_amount +'</td></tr>');
            for(var i = 0; i < data.advance_payment.length; i++) {
                $('#advance_payment').find('tbody').append('<tr><td>'+ data.advance_payment[i].amount +'</td><td>'+ data.advance_payment[i].payment_method +'</td><td>'+ data.advance_payment[i].created_at.split('T')[0] +'</td></tr>');
            }
            for(var i = 0; i < data.additional_service.length; i++) {
                $('#additional_service').find('tbody').append('<tr><td>'+ data.additional_service[i].name +'</td><td>'+ data.additional_service[i].amount +'</td></tr>');
            }
        }
    })
</script> --}}
<script>
    function onPrint() {
        window.print();
    }
</script>
<style>
    @media print {
        body {
            visibility: hidden;
        }

        #section_to_print {
            visibility: visible;
            position: absolute;
            left: 0;
            top: 0;
        }
    }

    .card-body table tbody tr td {
        border: none !important;
    }

    .invoice-bills .table tfoot tr:last-child td:nth-child(2) {
        border-top: none;
    }

    .invoice-bills .table tfoot tr:last-child td:nth-child(3) {
        border-top: none;
    }
</style>
