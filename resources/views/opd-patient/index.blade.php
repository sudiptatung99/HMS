@section('title') {{ 'OPD-Patient' }} @endsection
<x-app-layout>
    <div class="container-fluid">
         <div class="nk-block-between mb-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">OPD - Out Patient</h3>
                <div class="nk-block-des text-soft">
                    <p>OPD - Out Patient List</p>
                </div>
            </div>
            <a href="{{ route('opd-patient.create') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-plus-circle-fill"></em><span>New</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <table class="datatable-init-export nowrap table">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>UHID</th>
                                    <th>Patient ID</th>
                                    <th>Name</th>
                                    <th>Contact No.</th>
                                    <th>Admission Date</th>
                                    <th>Department</th>
                                    <th>Status</th>
                                    <th width="5%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php $no = 1; @endphp
                            @foreach($opdPatient as $key => $patient)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $patient->uhid }}</td>
                                    <td>{{ $patient->patient_id }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ env('COUNTRY_CODE') }} {{ $patient->contact }}</td>
                                    <td>{{ getDateFormat($patient->admission_date) }}</td>
                                    <td>{{ $patient->department->name }}</td>
                                    <td>
                                        @if($patient->status == 'Active')
                                            <span class="badge badge-dot bg-success">{{ $patient->status }}</span>
                                        @elseif($patient->status == 'Inactive')
                                            <span class="badge badge-dot bg-danger">{{ $patient->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="drodown">
                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                <em class="icon ni ni-more-h"></em>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">
                                                <ul class="link-list-opt no-bdr">
                                                @can('patient-view')
                                                    <li>
                                                        <a href="{{ route('opd-patient.show', encrypt($patient->id)) }}">
                                                            <em class="icon ni ni-eye"></em><span>View</span>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('update-patient')
                                                    <li>
                                                        <a href="{{ route('opd-patient.update', encrypt($patient->id)) }}">
                                                            <em class="icon ni ni-edit"></em><span>Update</span>
                                                        </a>
                                                    </li>
                                                @endcan
                                                @can('delete-patient')
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $patient->id }}">
                                                            <em class="icon ni ni-trash"></em><span>Delete</span>
                                                        </a>
                                                    </li>
                                                @endcan
                                                </ul>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteWarning{{ $patient->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header border-bottom-0">
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <div class="h1 mx-auto text-warning mb-3">
                                                        <em class="icon bi bi-exclamation-triangle"></em>
                                                    </div>
                                                    <div class="row justify-content-center">
                                                        <div class="col-xl-10">
                                                            <h4 class="title nk-block-title mb-3">Warning !</h4>
                                                            <p class="text-muted font-size-14">Are you sure you want to delete?</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a class="btn btn-danger" href="{{ route('opd-patient.delete', encrypt($patient->id)) }}">Yes</a>
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
