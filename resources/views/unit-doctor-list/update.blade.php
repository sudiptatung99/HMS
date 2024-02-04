@section('title') {{ 'Unit Doctor Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Unit Doctor</h3>
                <div class="nk-block-des text-soft">
                    <p>Update Unit Doctor</p>
                </div>
            </div>
            <a href="{{ route('unit-doctor') }}" class="btn btn-white btn-outline-light">
                <em class="icon ni ni-list"></em><span>List</span>
            </a>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <form action="{{ route('unit-doctor.update.store', encrypt($unit_doctor->id)) }}" method="POST">
                        @csrf
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label">Doctor <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <select class="form-select js-select2" data-search="on" name="doctor_id" required>
                                    <option value="" selected disabled></option>
                                    {{ getDoctor($unit_doctor->doctor_id) }}
                                </select>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <label class="col-sm-2 col-form-label">Unit <i class="text-danger">*</i></label>
                            <div class="col-sm-8">
                                <select class="form-select js-select2" data-search="on" name="unit_id" required>
                                    <option value="" selected disabled></option>
                                    {{ getUnit($unit_doctor->unit_id) }}
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
