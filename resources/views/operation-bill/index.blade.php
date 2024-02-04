@section('title') {{ 'Operation-Bill' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="mb-3 nk-block-between">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Operation Bill</h3>
                <div class="nk-block-des text-soft">
                    <p>Operation Bill List</p>
                </div>
            </div>
            <a href="{{ route('operation-bill.create') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-plus-circle-fill"></em><span>New</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table datatable-init-export nowrap">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Bill No.</th>
                                    <th>patient ID</th>
                                    <th>Operation Name</th>
                                    <th>Payment Mode</th>
                                    <th>Payment Amount</th>
                                    <th>Payment Status</th>
                                    <th>Date</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach($operation_bill as $key => $operation_bill)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $operation_bill->bill_no }}</td>
                                <td><a href="{{ route('patient.show', encrypt($operation_bill->patient_id)) }}">{{ $operation_bill->patient->patient_id }}</a></td>
                                <td>{{ $operation_bill->patient_operations->operation->name }}</td>
                                <td>{{ $operation_bill->payment_mode }}</td>
                                <td>{{ env('CURRENCY_SYMBOL') . $operation_bill->payment_amount }}</td>
                                <td>{{ $operation_bill->payment_status }}</td>
                                <td>{{ getDateFormat($operation_bill->bill_date) }}</td>
                                <td>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                            <em class="icon ni ni-more-h"></em>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">
                                            <ul class="link-list-opt no-bdr">
                                            {{-- @can('pathology-bill-view') --}}
                                                <li>
                                                    <a href="{{ route('operation-bill.show', encrypt($operation_bill->id)) }}">
                                                        <em class="icon ni ni-eye"></em><span>View</span>
                                                    </a>
                                                </li>
                                            {{-- @endcan --}}
                                            {{-- @can('update-pathology-bill') --}}
                                                <li>
                                                    <a href="{{ route('operation-bill.update', encrypt($operation_bill->id)) }}">
                                                        <em class="icon ni ni-edit"></em><span>Update</span>
                                                    </a>
                                                </li>
                                            {{-- @endcan --}}
                                            {{-- @can('delete-pathology-bill') --}}
                                                <li>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $operation_bill->id }}">
                                                        <em class="icon ni ni-trash"></em><span>Delete</span>
                                                    </a>
                                                </li>
                                            {{-- @endcan --}}
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <div class="modal fade" id="deleteWarning{{ $operation_bill->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header border-bottom-0">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="mx-auto mb-3 h1 text-warning">
                                                    <em class="icon bi bi-exclamation-triangle"></em>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-xl-10">
                                                        <h4 class="mb-3 title nk-block-title">Warning !</h4>
                                                        <p class="text-muted font-size-14">Are you sure you want to delete?</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <a class="btn btn-danger" href="{{ route('operation-bill.delete', encrypt($operation_bill->id)) }}">Yes</a>
                                            <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
