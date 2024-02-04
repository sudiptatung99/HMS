@section('title') {{ 'OPD-Patient View' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between g-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">OPD - Out Patient / <strong class="text-primary small">{{ $patient->name }}</strong></h3>
                <div class="nk-block-des text-soft">
                    <ul class="list-inline">
                        <li>Patient ID: <span class="text-base">{{ $patient->patient_id }}</span></li>
                    </ul>
                </div>
            </div>
            <a href="{{ route('opd-patient') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-arrow-left"></em><span>Back</span>
            </a>
        </div>
        <div class="row mt-4">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#details" role="tab" aria-selected="true">
                                    <em class="icon ni ni-dot-sq"></em> Details
                                </a>
                            </li>
                            {{-- @can('view-patient-package')
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#package" role="tab" aria-selected="false" tabindex="-1">
                                        <em class="icon ni ni-dot-sq"></em> Package
                                    </a>
                                </li>
                            @endcan
                            @can('additional-services-list')
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#additional-services" role="tab" aria-selected="false" tabindex="-1">
                                        <em class="icon ni ni-dot-sq"></em> Additional Services
                                    </a>
                                </li>
                            @endcan
                            @can('patient-document-list')
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#document" role="tab" aria-selected="false" tabindex="-1">
                                        <em class="icon ni ni-dot-sq"></em> Document
                                    </a>
                                </li>
                            @endcan
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#present_history" role="tab" aria-selected="false" tabindex="-1">
                                    <em class="icon ni ni-dot-sq"></em> Present History
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#past_history" role="tab" aria-selected="false" tabindex="-1">
                                    <em class="icon ni ni-dot-sq"></em> Past History
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#personal_history" role="tab" aria-selected="false" tabindex="-1">
                                    <em class="icon ni ni-dot-sq"></em> Personal History
                                </a>
                            </li> --}}
                            {{-- <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#family_history" role="tab" aria-selected="false" tabindex="-1">
                                    <em class="icon ni ni-dot-sq"></em> Family History
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#diagnosis" role="tab" aria-selected="false" tabindex="-1">
                                    <em class="icon ni ni-dot-sq"></em> Diagnosis
                                </a>
                            </li> --}}
                        </ul>
                        <div class="tab-content p-4 mt-3">
                            <div class="tab-pane active show" id="details" role="tabpanel">
                                <div class="row">
                                    <div class="profile-ud-list">
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">UHID</span>
                                                <span class="profile-ud-value">{{ $patient->uhid }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Name</span>
                                                <span class="profile-ud-value">{{ $patient->name }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Guardian Name</span>
                                                <span class="profile-ud-value">{{ $patient->guardian_name }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Email ID</span>
                                                <span class="profile-ud-value">{{ $patient->email }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Contact No.</span>
                                                <span class="profile-ud-value">{{ $patient->contact }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Emergency Contact No.</span>
                                                <span class="profile-ud-value">{{ $patient->emergency_contact }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Blood Group</span>
                                                <span class="profile-ud-value">{{ $patient->blood_group }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Gender</span>
                                                <span class="profile-ud-value">{{ $patient->gender }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Date of Birth</span>
                                                <span class="profile-ud-value">{{ getDateFormat($patient->dob) }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Address</span>
                                                <span class="profile-ud-value">{{ $patient->address }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Admission Date</span>
                                                <span class="profile-ud-value">{{ getDateFormat($patient->admission_date) }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Department</span>
                                                <span class="profile-ud-value">{{ $patient->department->name }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Purpose</span>
                                                <span class="profile-ud-value">{{ $patient->purpose }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Doctor</span>
                                                <span class="profile-ud-value">{{ $patient->doctor->name }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Weight</span>
                                                <span class="profile-ud-value">{{ $patient->weight }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Blood Pressure</span>
                                                <span class="profile-ud-value">{{ $patient->blood_pressure }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">PAN Number</span>
                                                <span class="profile-ud-value">{{ $patient->pan_number }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Passport Number</span>
                                                <span class="profile-ud-value">{{ $patient->passport_number }}</span>
                                            </div>
                                        </div>
                                        <div class="profile-ud-item">
                                            <div class="profile-ud wider">
                                                <span class="profile-ud-label">Status</span>
                                                <span class="profile-ud-value">
                                                    @if($patient->status == 'Active')
                                                        <span class="badge badge-dot bg-success">{{ $patient->status }}</span>
                                                    @elseif($patient->status == 'Inactive')
                                                        <span class="badge badge-dot bg-danger">{{ $patient->status }}</span>
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="tab-pane" id="package" role="tabpanel">
                                @if($patient_package)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row mb-2 align-items-baseline">
                                                <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Package:</label>
                                                <div class="col-sm-8">
                                                    <h6>{{ $patient_package->package->name }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row mb-2 align-items-baseline">
                                                <label for="horizontal-firstname-input" class="col-sm-4 col-form-label">Package Cost:</label>
                                                <div class="col-sm-8">
                                                    <h6>{{ env('CURRENCY_SYMBOL') . $patient_package->package->package_cost }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="row mb-2 align-items-baseline">
                                                <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Package Including:</label>
                                                <div class="col-sm-8">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>Service</th>
                                                                <th>Rate</th>
                                                                <th>Quantity</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($package_service as $package_service)
                                                                <tr>
                                                                    <td>{{ $package_service->service->name }}</td>
                                                                    <td>{{ env('CURRENCY_SYMBOL') . $package_service->service->service_cost }}</td>
                                                                    <td>{{ $package_service->quantity }}</td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <h5>Package is not added to this patient.</h5>
                                        @can('add-patient-package')
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#addService" class="btn btn-outline-info mt-4"><i class="fas fa-plus"></i> Add Package</a>
                                        @endcan
                                    </div>
                                    <div class="modal fade" id="addService" tabindex="-1" aria-labelledby="addServiceLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addServiceLabel">Add Package</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('patient.package.store') }}" method="POST">
                                                @csrf
                                                    <input type="hidden" name="patient_id" value="{{ encrypt($patient->id) }}" required>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Select Package <i class="text-danger">*</i></label>
                                                            <select class="form-control" name="package_id" required>
                                                                <option value="" selected disabled>--</option>
                                                                {{ getPackage('') }}
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div> --}}
                            {{-- <div class="tab-pane" id="additional-services" role="tabpanel">
                                @can('create-additional-services')
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#service" class="btn btn-outline-info mb-3"><i class="fas fa-plus"></i> Add Service</a>
                                @endcan
                                @if(count($additional_service) > 0)
                                    <div class="col-sm-8" style="margin: 0 auto;">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Service Name</th>
                                                    <th>Amount</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($additional_service as $additional_service)
                                                    <tr>
                                                        <td>{{ $additional_service->name }}</td>
                                                        <td>{{ env('CURRENCY_SYMBOL') . $additional_service->amount }}</td>
                                                        <td>{{ $additional_service->description }}</td>
                                                        <td>
                                                            <div class="drodown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown" aria-expanded="true">
                                                                    <em class="icon ni ni-more-h"></em>
                                                                </a>
                                                                <div class="dropdown-menu dropdown-menu-end" data-popper-placement="bottom-end">
                                                                    <ul class="link-list-opt no-bdr">
                                                                    @can('update-additional-services')
                                                                        <li>
                                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#updateData{{ $additional_service->id }}">
                                                                                <em class="icon ni ni-edit"></em><span>Update</span>
                                                                            </a>
                                                                        </li>
                                                                    @endcan
                                                                    @can('delete-additional-services')
                                                                        <li>
                                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $additional_service->id }}">
                                                                                <em class="icon ni ni-trash"></em><span>Delete</span>
                                                                            </a>
                                                                        </li>
                                                                    @endcan
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <div class="modal fade" id="updateData{{ $additional_service->id }}" tabindex="-1" aria-labelledby="updateDataLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="updateDataLabel">Update Service</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('patient.update.additional-service', encrypt($additional_service->id)) }}" method="POST">
                                                                @csrf
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label>Service Name <i class="text-danger">*</i></label>
                                                                            <input type="text" class="form-control" name="name" value="{{ $additional_service->name }}" required>
                                                                        </div>
                                                                        <div class="form-group mt-2">
                                                                            <label>Amount <i class="text-danger">*</i></label>
                                                                            <input type="number" class="form-control" name="amount" value="{{ $additional_service->amount }}" required>
                                                                        </div>
                                                                        <div class="form-group mt-2">
                                                                            <label>Description <i class="text-danger">*</i></label>
                                                                            <textarea class="form-control" name="description" required>{{ $additional_service->description }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="deleteWarning{{ $additional_service->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                                                    <a class="btn btn-danger" href="{{ route('patient.delete.additional-service', encrypt($additional_service->id)) }}">Yes</a>
                                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="text-center">
                                        <h5>Additional Services is not added to this patient.</h5>
                                    </div>
                                @endif
                                <div class="modal fade" id="service" tabindex="-1" aria-labelledby="addServiceLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addServiceLabel">Add Service</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('patient.store.additional-service') }}" method="POST">
                                            @csrf
                                                <input type="hidden" name="patient_id" value="{{ encrypt($patient->id) }}" required>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Service Name <i class="text-danger">*</i></label>
                                                        <input type="text" class="form-control" name="name" required>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label>Amount <i class="text-danger">*</i></label>
                                                        <input type="number" class="form-control" name="amount" required>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label>Description <i class="text-danger">*</i></label>
                                                        <textarea class="form-control" name="description" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            {{-- <div class="tab-pane" id="document" role="tabpanel">
                                @can('create-patient-document')
                                    <a href="#" data-bs-toggle="modal" data-bs-target="#patient_document" class="btn btn-outline-info mb-4"><i class="fas fa-plus"></i> Add Document</a>
                                @endcan
                                @if(count($patient_document) > 0)
                                <div class="row g-gs">
                                @foreach($patient_document as $patient_document)
                                    @php $document = explode('.', $patient_document->document); @endphp
                                    <div class="col-sm-6 col-lg-4">
                                        <div class="card">
                                            <div class="card-inner">
                                                <div class="team">
                                                    <div class="team-options">
                                                        <div class="drodown">
                                                            <a href="#" class="dropdown-toggle btn btn-sm btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <ul class="link-list-opt no-bdr">
                                                                    @can('update-patient-document')
                                                                        <li>
                                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#updateData{{ $patient_document->id }}">
                                                                                <em class="icon ni ni-edit"></em><span>Update</span>
                                                                            </a>
                                                                        </li>
                                                                    @endcan
                                                                    @can('delete-patient-document')
                                                                        <li>
                                                                            <a href="#" data-bs-toggle="modal" data-bs-target="#deleteWarning{{ $patient_document->id }}">
                                                                                <em class="icon ni ni-trash"></em><span>Delete</span>
                                                                            </a>
                                                                        </li>
                                                                    @endcan
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="user-card user-card-s2">
                                                        <div class="user-avatar lg bg-primary">
                                                            <span>.{{ $document[1] }}</span>
                                                        </div>
                                                        <div class="user-info">
                                                            <h6>{{ $patient_document->name }}</h6><span class="sub-text">{{ $patient_document->details }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="team-view">
                                                        <a href="{{ $patient_document->document }}" class="btn btn-block btn-dim btn-primary" download>
                                                            <span>Download</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="updateData{{ $patient_document->id }}" tabindex="-1" aria-labelledby="updateDataLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateDataLabel">Update Document</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('patient.document.update.store', encrypt($patient_document->id)) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label>Document <i class="text-danger">*</i></label>
                                                            <input type="file" class="form-control" name="document">
                                                            <a href="{{ $patient_document->document }}" class="float-end mt-1" download>Download</a>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Name <i class="text-danger">*</i></label>
                                                            <input type="text" class="form-control" name="name" value="{{ $patient_document->name }}" required>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label>Details <i class="text-danger">*</i></label>
                                                            <textarea class="form-control" name="details" required>{{ $patient_document->details }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="deleteWarning{{ $patient_document->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                                    <a class="btn btn-danger" href="{{ route('patient.document.delete', encrypt($patient_document->id)) }}">Yes</a>
                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal" aria-label="Close">No</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                                @else
                                    <div class="text-center">
                                        <h5>Data not found !</h5>
                                    </div>
                                @endif
                                <div class="modal fade" id="patient_document" tabindex="-1" aria-labelledby="addDocumentLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addDocumentLabel">Add Document</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('patient.document.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <input type="hidden" name="patient_id" value="{{ encrypt($patient->id) }}" required>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label>Document <i class="text-danger">*</i></label>
                                                        <input type="file" class="form-control" name="document" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Name <i class="text-danger">*</i></label>
                                                        <input type="text" class="form-control" name="name" required>
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label>Details <i class="text-danger">*</i></label>
                                                        <textarea class="form-control" name="details" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            <div class="tab-pane" id="present_history" role="tabpanel">
                                <div class="text-center">
                                    <h5>Data not found !</h5>
                                </div>
                            </div>
                            <div class="tab-pane" id="past_history" role="tabpanel">
                                <div class="text-center">
                                    <h5>Data not found !</h5>
                                </div>
                            </div>
                            <div class="tab-pane" id="personal_history" role="tabpanel">
                                <div class="text-center">
                                    <h5>Data not found !</h5>
                                </div>
                            </div>
                            <div class="tab-pane" id="family_history" role="tabpanel">
                                <div class="text-center">
                                    <h5>Data not found !</h5>
                                </div>
                            </div>
                            <div class="tab-pane" id="diagnosis" role="tabpanel">
                                <div class="text-center">
                                    <h5>Data not found !</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
