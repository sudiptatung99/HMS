<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.3') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.2.3') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/libs/bootstrap-icons.css') }}">
</head>

<body class="nk-body ui-rounder has-sidebar ui-light ">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-sidebar is-light nk-sidebar-fixed " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-sidebar-brand">
                        <a href="{{ route('dashboard') }}" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                            <img class="logo-dark logo-img" src="{{ asset('assets/images/logo.png') }}" alt="logo-dark">
                            <img class="logo-small logo-img logo-img-small" src="{{ asset('assets/images/logo.png') }}"
                                alt="logo-small">
                        </a>
                    </div>
                    <div class="nk-menu-trigger me-n2">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu">
                            <em class="icon ni ni-arrow-left"></em>
                        </a>
                    </div>
                </div>
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar="">
                            <ul class="nk-menu">
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Menu</h6>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-building"></em>
                                        </span>
                                        <span class="nk-menu-text">Department</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-department')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('department.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Department</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('department-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('department') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Department List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user-c"></em>
                                        </span>
                                        <span class="nk-menu-text">Designation</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-designation')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('designation.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Designation</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('designation-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('designation') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Designation List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            {{-- <em class="icon ni layer-fill"></em> --}}
                                            <em class="icon ni ni-layer-fill"></em>
                                        </span>
                                        <span class="nk-menu-text">Unit</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        {{-- @can('create-designation') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('unit.create') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Add Unit</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('designation-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('unit') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Unit List</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user-alt-fill"></em>
                                        </span>
                                        <span class="nk-menu-text">Unit Doctor List</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        {{-- @can('create-designation') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('unit-doctor.create') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Add Doctor Unit</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('designation-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('unit-doctor') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Doctor Unit List</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user-add"></em>
                                        </span>
                                        <span class="nk-menu-text">Doctor</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-doctor')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('doctor.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Doctor</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('doctor-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('doctor') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Doctor List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user-check"></em>
                                        </span>
                                        <span class="nk-menu-text">Nurse</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-nurse')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('nurse.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Nurse</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('nurse-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('nurse') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Nurse List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-user-list"></em>
                                        </span>
                                        <span class="nk-menu-text">IPD - In Patient</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-patient')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('patient.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add IPD - In Patient</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('patient-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('patient') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">IPD - In Patient List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-account-setting"></em>
                                        </span>
                                        <span class="nk-menu-text">OPD - Out Patient</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        {{-- @can('create-patient') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('opd-patient.create') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Add OPD - Out Patient</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('patient-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('opd-patient') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">OPD - Out Patient List</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('patient-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('opd-bill.index') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">OPD - Bill List</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('patient-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('opd-bill.create') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">OPD - Add Bill List</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-calendar-booking"></em>
                                        </span>
                                        <span class="nk-menu-text">Schedule</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-time-slot')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('slot.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Time Slot</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('time-slot-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('slot') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Time Slot List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-schedule')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('schedule.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Schedule</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('schedule-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('schedule') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Schedule List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-calendar-check"></em>
                                        </span>
                                        <span class="nk-menu-text">Appoinment</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-appoinment')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('appoinment.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Appoinment</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('appoinment-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('appoinment') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Appoinment List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('appoinment-assign-to-me')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('assign.to.me') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Assign to Me</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('appoinment-assign-by-me')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('assign.by.me') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Assign by Me</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-file-plus"></em>
                                        </span>
                                        <span class="nk-menu-text">Pharmacy</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('pharmacy-dashboard')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('pharmacy.dashboard') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Pharmacy Dashboard</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-invoice')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('medicine-invoice.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">New Invoice</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('invoice-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('medicine-invoice') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Invoice List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-medicine-category')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('medicine-category.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Medicine Category</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('medicine-category-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('medicine-category') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Medicine Category List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-medicine-vendor')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('medicine-vendor.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Medicine Vendor</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('medicine-vendor-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('medicine-vendor') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Medicine Vendor List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-medicine')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('medicine.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Medicine</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('medicine-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('medicine') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Medicine List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-medicine-purchase')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('purchase-medicine.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">New Purchase</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('medicine-purchase-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('purchase-medicine') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Purchase History</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-file-doc"></em>
                                        </span>
                                        <span class="nk-menu-text">Prescription</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-patient-case-study')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('patient-case-study.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Patient Case Study</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('patient-case-study-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('patient-case-study') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Patient Case Study List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-prescription')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('prescription.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Prescription</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('prescription-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('prescription') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Prescription List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-file-check"></em>
                                        </span>
                                        <span class="nk-menu-text">Billing</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-service')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('service.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Service</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('service-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('service') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Service List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-package')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('package.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Package</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('package-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('package') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Package List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-advance-payment')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('advance-payment.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Advance Payment</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('advance-payment-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('advance-payment') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Advance Payment List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-bill')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('bill.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Bill</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('bill-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('bill') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Bill List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('complete-bill-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('complete.bill') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Complete Bill List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-files"></em>
                                        </span>
                                        <span class="nk-menu-text">Insurance</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-insurance')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('insurance.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Insurance</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('insurance-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('insurance') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Insurance List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-sign-inr-alt"></em>
                                        </span>
                                        <span class="nk-menu-text">Expense</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-expense')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('expense.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Expense</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('expense-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('expense') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Expense List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-layout2"></em>
                                        </span>
                                        <span class="nk-menu-text">Bed Management</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-room')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('room.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Room</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('room-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('room') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Room List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-bed')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('bed.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Bed</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('bed-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('bed') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Bed List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-bed-assign')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('bed-assign.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Bed Assign</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('bed-assign-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('bed-assign') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Bed Assign List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('bed-report')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('bed.management.reports') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Report</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-file-text"></em>
                                        </span>
                                        <span class="nk-menu-text">Case Manager</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-patient-case')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('patient-case.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Patient</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('patient-case-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('patient-case') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Patient List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-building"></em>
                                        </span>
                                        <span class="nk-menu-text">Hospital Activities</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-birth-report')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('birth-report.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Birth Report</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('birth-report-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('birth-report') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Birth Report List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-death-report')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('death-report.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Death Report</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('death-report-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('death-report') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Death Report List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-operation-report')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('operation-report.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Operation Report</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('operation-report-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('operation-report') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Operation Report List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-investigation-report')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('investigation-report.create') }}"
                                                    class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Investigation Report</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('investigation-report-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('investigation-report') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Investigation Report List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-question-alt"></em>
                                        </span>
                                        <span class="nk-menu-text">Enquiry</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-enquiry')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('enquiry.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Enquiry</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('enquiry-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('enquiry') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Enquiry List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-truck"></em>
                                        </span>
                                        <span class="nk-menu-text">Ambulance</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-ambulance')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('ambulance.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Ambulance</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('ambulance-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('ambulance') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Ambulance List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-call-ambulance')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('call-ambulance.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Call Ambulance</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('call-ambulance-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('call-ambulance') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Call Ambulance List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-sign-ada-alt"></em>
                                        </span>
                                        <span class="nk-menu-text">Blood Bank</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('blood-bank')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('blood-bank') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Blood Bank</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-blood-donor')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('blood-donor.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Donor</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('blood-donor-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('blood-donor') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Donor List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-blood-issue')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('blood-issue.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">New Blood Issue</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('blood-issue-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('blood-issue') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Blood Issue List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-alert-circle-fill"></em>
                                        </span>
                                        <span class="nk-menu-text">Operation</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        {{-- @can('create-enquiry') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('operation.category') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Category</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('enquiry-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('operation.list') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Operation</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('enquiry-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('operation.patient.create') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Add Patient</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('enquiry-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('operation.patient') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Patient List</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('enquiry-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('operation-bill.create') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Add Bill</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('enquiry-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('operation-bill') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Bill List</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                    </ul>
                                </li>

                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-users-fill"></em>
                                        </span>
                                        <span class="nk-menu-text">Roles Management</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('create-role')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('role.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add Role</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('role-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('roles') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Role List</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('create-user-role')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('user.role.create') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Add User Role</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('user-role-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('user.roles') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">User Role List</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Report</h6>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-file-docs"></em>
                                        </span>
                                        <span class="nk-menu-text">Pathology</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('pathology-bill-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('pathology-bill') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Bill</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('pathology-test-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('pathology-test') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Test</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('pathology-category-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('pathology-category') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Category</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('pathology-parameter-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('pathology-parameter') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Parameter</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-file-docs"></em>
                                        </span>
                                        <span class="nk-menu-text">Radiology</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('radiology-bill-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('radiology-bill') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Bill</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('radiology-test-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('radiology-test') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Test</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('radiology-category-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('radiology-category') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Category</span>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('radiology-parameter-list')
                                            <li class="nk-menu-item">
                                                <a href="{{ route('radiology-parameter') }}" class="nk-menu-link">
                                                    <span class="nk-menu-text">Parameter</span>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-file-docs"></em>
                                        </span>
                                        <span class="nk-menu-text">Biochemistry
                                        </span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        {{-- @can('radiology-bill-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('biochemistry-bill') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Bill</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('radiology-test-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('biochemistry-test') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Test</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('radiology-category-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('biochemistry-category') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Category</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('radiology-parameter-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('biochemistry-parameter') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Parameter</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                    </ul>
                                </li>
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon">
                                            <em class="icon ni ni-file-docs"></em>
                                        </span>
                                        <span class="nk-menu-text">Microbiology</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        {{-- @can('radiology-bill-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('microbiology-bill') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Bill</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('radiology-test-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('microbiology-test') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Test</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('radiology-category-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('microbiology-category') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Category</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                        {{-- @can('radiology-parameter-list') --}}
                                        <li class="nk-menu-item">
                                            <a href="{{ route('microbiology-parameter') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Parameter</span>
                                            </a>
                                        </li>
                                        {{-- @endcan --}}
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nk-wrap">
                <div class="nk-header is-light nk-header-fixed is-light">
                    <div class="container-xl wide-xl">
                        <div class="nk-header-wrap">
                            <div class="nk-header-menu is-light">
                                <div class="nk-header-menu-inner">
                                    <ul class="nk-menu nk-menu-main">
                                        <li class="nk-menu-item">
                                            <a href="{{ route('dashboard') }}" class="nk-menu-link">
                                                <span class="nk-menu-text">Dashboard</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="nk-header-tools">
                                <ul class="nk-quick-nav">
                                    <li class="dropdown user-dropdown">
                                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                                            <div class="user-toggle">
                                                <div class="user-avatar sm">
                                                    <em class="icon ni ni-user-alt"></em>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end">
                                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                                <div class="user-card">
                                                    <div class="user-avatar">
                                                        <span>{{ implode('',array_map(function ($v) {return $v[0];}, explode(' ', Auth::user()->name))) }}</span>
                                                    </div>
                                                    <div class="user-info">
                                                        <span class="lead-text">{{ Auth::user()->name }}</span>
                                                        <span class="sub-text">{{ Auth::user()->email }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="{{ url('profile') }}">
                                                            <em class="icon ni ni-user"></em><span>Profile</span>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('change.password') }}">
                                                            <em class="icon ni ni-lock"></em><span>Password</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="dropdown-inner">
                                                <ul class="link-list">
                                                    <li>
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#logoutWarning">
                                                            <em class="icon ni ni-signout"></em><span>Sign Out</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-content nk-content-fluid">
                    <div class="container-xl wide-xl">
                        {{ $slot }}
                    </div>
                </div>
                <div class="nk-footer">
                    <div class="container-xl wide-xl">
                        <div class="nk-footer-wrap">
                            <div class="nk-footer-copyright mx-auto"> &copy; 2023 {{ config('app.name') }}. Design &
                                Develop by <a href="#" target="_blank">TouchCodes</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="logoutWarning" tabindex="-1" aria-labelledby="subscribeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-bottom-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <div class="avatar-md mx-auto mb-3">
                            <div class="text-warning h1">
                                <em class="bi bi-exclamation-triangle"></em>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <div class="col-xl-10">
                                <h4 class="mb-3">Warning !</h4>
                                <p class="text-muted font-size-14">Are you sure you want to logged out now?</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="btn btn-danger" href="#"
                            onclick="event.preventDefault(); this.closest('form').submit();">Yes</a>
                    </form>
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal"
                        aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/bundle.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.2.3') }}"></script>
    <!-- <script src="{{ asset('assets/js/demo-settings.js?ver=3.2.3') }}"></script> -->
    <script src="{{ asset('assets/js/charts/gd-campaign.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('assets/js/libs/datatable-btns.js?ver=3.2.3') }}"></script>
</body>

</html>
<style>
    table>tbody>tr>td {
        vertical-align: middle;
    }
</style>
