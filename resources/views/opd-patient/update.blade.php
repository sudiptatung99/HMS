@section('title') {{ 'OPD-Patient Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
         <div class="nk-block-between mb-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">OPD - Out Patient</h3>
                <div class="nk-block-des text-soft">
                    <p>Update OPD - Out Patient</p>
                </div>
            </div>
            <a href="{{ route('opd-patient') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-list"></em><span>List</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form action="{{ route('opd-patient.update.store', encrypt($opdPatient->id)) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">UHID</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="uhid" value="{{ $opdPatient->uhid }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value="{{ $opdPatient->name }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Guardian Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="guardian_name" value="{{ $opdPatient->guardian_name }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Email <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" value="{{ $opdPatient->email }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Contact No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="contact" value="{{ $opdPatient->contact }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Emergency Contact No. <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="emergency_contact" value="{{ $opdPatient->emergency_contact }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Blood Group <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="blood_group" required>
                                        {{ getBloodGroup($opdPatient->blood_group) }}
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Gender <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="gender" required>
                                        {{ getGender($opdPatient->gender) }}
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Date of Birth <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="dob" value="{{ $opdPatient->dob }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Address <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name="address" required>{{ $opdPatient->address }}</textarea>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Admission Date <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control date-picker" name="admission_date" value="{{ $opdPatient->admission_date }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Department <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="department_id" required>
                                        {{ getDepartment($opdPatient->department_id) }}
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Purpose <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="purpose" value="{{ $opdPatient->purpose }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Doctor <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="doctor_id" required>
                                        {{ getDoctor($opdPatient->doctor_id) }}
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Weight <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="weight" value="{{ $opdPatient->weight }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Blood Pressure <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="blood_pressure" value="{{ $opdPatient->blood_pressure }}" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Image <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                    <img src="{{ asset($opdPatient->image) }}" width="100" height="70" class="img-thumbnail mt-2">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">PAN Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="pan_number" value="{{ $opdPatient->pan_number }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Passport Number</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="passport_number" value="{{ $opdPatient->passport_number }}">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Status <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="status" required>
                                        {{ getStatus($opdPatient->status) }}
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-4">
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
