@section('title') {{ 'Dashboard' }} @endsection
<x-app-layout>
<div class="nk-content-body">
  <div class="nk-block-head nk-block-head-sm">
    <div class="nk-block-between">
      <div class="nk-block-head-content">
        <h3 class="nk-block-title page-title">Hospital Management System</h3>
        <div class="nk-block-des text-soft">
          <p>Welcome to Hospital Management System Dashboard.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="nk-block">
    <div class="row g-gs">
      <div class="col-lg-3 col-sm-6">
        <div class="card h-100 bg-primary">
          <div class="nk-cmwg nk-cmwg1">
            <div class="card-inner pt-3">
              <div class="d-flex justify-content-between">
                <div class="flex-item">
                  <div class="text-white d-flex flex-wrap"><span class="fs-2 me-1">{{ $appoinment_count }}</span>
                  </div>
                  <h6 class="text-white">APPOINTMENT</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card h-100 bg-info">
          <div class="nk-cmwg nk-cmwg1">
            <div class="card-inner pt-3">
              <div class="d-flex justify-content-between">
                <div class="flex-item">
                  <div class="text-white d-flex flex-wrap"><span class="fs-2 me-1">{{ $patient_count }}</span>
                  </div>
                  <h6 class="text-white">PATIENT</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card h-100 bg-danger">
          <div class="nk-cmwg nk-cmwg1">
            <div class="card-inner pt-3">
              <div class="d-flex justify-content-between">
                <div class="flex-item">
                  <div class="text-white d-flex flex-wrap"><span class="fs-2 me-1">{{ $prescription_count }}</span>
                  </div>
                  <h6 class="text-white">PRESCRIPTION</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card h-100 bg-success">
          <div class="nk-cmwg nk-cmwg1">
            <div class="card-inner pt-3">
              <div class="d-flex justify-content-between">
                <div class="flex-item">
                  <div class="text-white d-flex flex-wrap"><span class="fs-2 me-1">{{ $doctor_count }}</span>
                  </div>
                  <h6 class="text-white">DOCTOR</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card h-100 bg-secondary">
          <div class="nk-cmwg nk-cmwg1">
            <div class="card-inner pt-3">
              <div class="d-flex justify-content-between">
                <div class="flex-item">
                  <div class="text-white d-flex flex-wrap"><span class="fs-2 me-1">{{ $free_bed_count }}</span>
                  </div>
                  <h6 class="text-white">FREE BED LIST</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-sm-6">
        <div class="card h-100 bg-warning">
          <div class="nk-cmwg nk-cmwg1">
            <div class="card-inner pt-3">
              <div class="d-flex justify-content-between">
                <div class="flex-item">
                  <div class="text-white d-flex flex-wrap"><span class="fs-2 me-1">{{ $discharged_count }}</span>
                  </div>
                  <h6 class="text-white">DISCHARGED</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-xxl-4 col-md-6">
          <div class="card card-full" style="height:max-content">
            <div class="card-inner">
              <div class="card-title-group">
                <div class="card-title">
                  <h6 class="title text-primary">Our Income Report in Different Sectors</h6>
                </div>
              </div>
            </div>
            <div class="card-inner pt-0">
              <ul class="my-n2">
                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                  <div class="lead-text">OPD Income</div>
                  <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $opd_income }}</div>
                </li>
                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                  <div class="lead-text">IPD Income</div>
                  <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $ipd_income }}</div>
                </li>
                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                  <div class="lead-text">Pharmacy Income</div>
                  <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $pharmacy_income }}</div>
                </li>
                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                  <div class="lead-text">Pathology Income</div>
                  <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $pathology_income }}</div>
                </li>
                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                    <div class="lead-text">Biochemistry Income</div>
                    <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $biochemistry_income }}</div>
                  </li>
                  <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                    <div class="lead-text">Microbiology Income</div>
                    <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $microbiology_income }}</div>
                  </li>
                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                  <div class="lead-text">Radiology Income</div>
                  <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $radiology_income }}</div>
                </li>
                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                  <div class="lead-text">Blood Bank Income</div>
                  <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $blood_bank_income }}</div>
                </li>
                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                  <div class="lead-text">Ambulance Income</div>
                  <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $ambulance_income }}</div>
                </li>
                <li class="align-center justify-between py-1 gx-1 border-bottom border-0 border-dashed">
                  <div class="lead-text">General Income</div>
                  <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $general_income }}</div>
                </li>
                <li class="align-center justify-between py-1 gx-1">
                  <div class="lead-text">Expenses</div>
                  <div class="sub-text">{{ env('CURRENCY_SYMBOL') . $expense }}</div>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-xxl-4 col-md-6">
          <div id="accordion-2" class="accordion accordion-s3">
            <div class="accordion-item"> <a href="#" class="accordion-head" data-bs-toggle="collapse"
                data-bs-target="#accordion-item-2-1">
                <h6 class="title">Billing</h6> <span class="accordion-icon"></span>
              </a>
              <div class="accordion-body collapse show" id="accordion-item-2-1" data-bs-parent="#accordion-2">
                <div class="accordion-inner">
                  <div class="menu-list">
                    <a href="{{ route('service') }}" class="text-primary">Service List</a>
                    <a href="{{ route('package') }}" class="text-success">Package List</a>
                    <a href="{{ route('patient') }}" class="text-danger">Patient Admision List</a>
                    <a href="{{ route('bill') }}" class="text-warning">Bill List</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="accordion-item"> <a href="#" class="accordion-head" data-bs-toggle="collapse"
                data-bs-target="#accordion-item-2-2">
                <h6 class="title">Hospital Activities</h6> <span class="accordion-icon"></span>
              </a>
              <div class="accordion-body collapse" id="accordion-item-2-2" data-bs-parent="#accordion-2">
                <div class="accordion-inner">
                  <div class="menu-list">
                    <a href="{{ route('service') }}" class="text-primary">Service List</a>
                    <a href="{{ route('birth-report') }}" class="text-success">Birth Report</a>
                    <a href="{{ route('death-report') }}" class="text-danger">Death Report</a>
                    <a href="{{ route('operation-report') }}" class="text-warning">Operation Report</a>
                    <a href="{{ route('investigation-report') }}" class="text-warning">Investigation Report</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="accordion-item">
              <a href="#" class="accordion-head" data-bs-toggle="collapse" data-bs-target="#accordion-item-2-3">
                <h6 class="title">Account Manager</h6> <span class="accordion-icon"></span>
              </a>
              <div class="accordion-body collapse " id="accordion-item-2-3" data-bs-parent="#accordion-2">
                <div class="accordion-inner">
                  <div class="menu-list">
                    <a href="" class="text-primary"> General Ledger</a>
                    <a href="" class="text-success">Trial Balance</a>
                    <a href="" class="text-danger"> Profit Loss</a>
                  </div>
                </div>
              </div>
            </div> -->
            <div class="accordion-item">
              <a href="#" class="accordion-head" data-bs-toggle="collapse" data-bs-target="#accordion-item-2-4">
                <h6 class="title">Insurance</h6> <span class="accordion-icon"></span>
              </a>
              <div class="accordion-body collapse " id="accordion-item-2-4" data-bs-parent="#accordion-2">
                <div class="accordion-inner">
                  <div class="menu-list">
                    <a href="{{ route('insurance.create') }}" class="text-primary">Add Insurance</a>
                    <a href="{{ route('insurance') }}" class="text-success">Insurance List</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-body">
            <div class="card-title">
              <h6 class="title mt-2 mb-4">Today Patient List</h6>
            </div>
            <table class="datatable-init-export nowrap table">
              <thead>
                <tr>
                  <th width="5%">#</th>
                  <th>Patient ID</th>
                  <th>Name</th>
                  <th>Contact No.</th>
                  <th>Admission Date</th>
                  <th>Department</th>
                </tr>
              </thead>
              <tbody>
              @php $no = 1; @endphp
              @foreach($patient as $key => $patient)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td><a href="{{ route('patient.show', encrypt($patient->id)) }}">{{ $patient->patient_id }}</a></td>
                  <td>{{ $patient->name }}</td>
                  <td>{{ env('COUNTRY_CODE') }} {{ $patient->contact }}</td>
                  <td>{{ getDateFormat($patient->admission_date) }}</td>
                  <td>{{ $patient->department->name }}</td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</x-app-layout>
<style>
  .accordion.accordion-s3 .accordion-item {
    background: var(--bs-accordion-active-bg);
    padding: 12px
  }

  .accordion.accordion-s3 .accordion-item+.accordion-item {
    margin-top: 8px;
  }

  .menu-list {
    display: flex;
    flex-direction: column;
  }

  .menu-list a {
    font-size: 14px;
    font-weight: 500;
    background: var(--bs-accordion-bg);
    padding: 5px 10px;
  }

  .menu-list a+a {
    margin-top: 8px
  }
</style>
