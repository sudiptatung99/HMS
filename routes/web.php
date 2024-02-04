<?php

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\NurseController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BedController;
use App\Http\Controllers\BirthReportController;
use App\Http\Controllers\DeathReportController;
use App\Http\Controllers\OperationReportController;
use App\Http\Controllers\InvestigationReportController;
use App\Http\Controllers\AppoinmentController;
use App\Http\Controllers\MedicineCategoryController;
use App\Http\Controllers\MedicineVendorController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicineInvoiceController;
use App\Http\Controllers\PurchaseMedicineController;
use App\Http\Controllers\InsuranceController;
use App\Http\Controllers\SlotController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PatientCaseController;
use App\Http\Controllers\PatientCaseStudyController;
use App\Http\Controllers\BedAssignController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\AdvancePaymentController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\BiochemistryBillController;
use App\Http\Controllers\BiochemistryCategoryController;
use App\Http\Controllers\BiochemistryParameterController;
use App\Http\Controllers\BiochemistryTestController;
use App\Http\Controllers\CallAmbulanceController;
use App\Http\Controllers\BloodDonorController;
use App\Http\Controllers\BloodBagController;
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\BloodIssueController;
use App\Http\Controllers\PathologyCategoryController;
use App\Http\Controllers\PathologyParameterController;
use App\Http\Controllers\PathologyTestController;
use App\Http\Controllers\PathologyBillController;
use App\Http\Controllers\RadiologyCategoryController;
use App\Http\Controllers\RadiologyParameterController;
use App\Http\Controllers\RadiologyTestController;
use App\Http\Controllers\RadiologyBillController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MicrobiologyBillController;
use App\Http\Controllers\MicrobiologyCategoryController;
use App\Http\Controllers\MicrobiologyParameterController;
use App\Http\Controllers\MicrobiologyTestController;
use App\Http\Controllers\OPDBillController;
use App\Http\Controllers\OPDPatientController;
use App\Http\Controllers\OperationBillController;
use App\Http\Controllers\OperationCategoryController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\PatientDocumentController;
use App\Http\Controllers\PatientOperationController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitDoctorListController;
use App\Models\OperationCategory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('change.password');

    Route::get('/roles', [RolePermissionController::class, 'roles'])->name('roles');
    Route::get('/role/update/{id}', [RolePermissionController::class, 'roleUpdate'])->name('role.update');
    Route::post('/role/update/{id}', [RolePermissionController::class, 'roleUpdateSubmit'])->name('role.update');
    Route::get('/role/create', [RolePermissionController::class, 'roleCreate'])->name('role.create');
    Route::post('/role/create', [RolePermissionController::class, 'roleCreateSubmit'])->name('role.create');

    Route::get('/user-roles', [RolePermissionController::class, 'userRoles'])->name('user.roles');
    Route::get('/user-roles/update/{id}', [RolePermissionController::class, 'userRoleUpdate'])->name('user.role.update');
    Route::post('/user-roles/update/{id}', [RolePermissionController::class, 'userRoleUpdateSubmit'])->name('user.role.update');
    Route::get('/user-roles/create', [RolePermissionController::class, 'userRoleCreate'])->name('user.role.create');
    Route::post('/user-roles/create', [RolePermissionController::class, 'userRoleCreateSubmit'])->name('user.role.create');
    Route::get('/user-roles/delete/{id}', [RolePermissionController::class, 'userRoleDelete'])->name('user.role.delete');

    Route::get('/department', [DepartmentController::class, 'index'])->name('department');
    Route::get('/department/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete');
    Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/department/create', [DepartmentController::class, 'store'])->name('department.store');
    Route::get('/department/update/{id}', [DepartmentController::class, 'update'])->name('department.update');
    Route::post('/department/update/{id}', [DepartmentController::class, 'updateStore'])->name('department.update.store');

    Route::get('/designation', [DesignationController::class, 'index'])->name('designation');
    Route::get('/designation/delete/{id}', [DesignationController::class, 'delete'])->name('designation.delete');
    Route::get('/designation/create', [DesignationController::class, 'create'])->name('designation.create');
    Route::post('/designation/create', [DesignationController::class, 'store'])->name('designation.store');
    Route::get('/designation/update/{id}', [DesignationController::class, 'update'])->name('designation.update');
    Route::post('/designation/update/{id}', [DesignationController::class, 'updateStore'])->name('designation.update.store');

    Route::get('/doctor', [DoctorController::class, 'index'])->name('doctor');
    Route::get('/doctor/delete/{id}', [DoctorController::class, 'delete'])->name('doctor.delete');
    Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
    Route::post('/doctor/create', [DoctorController::class, 'store'])->name('doctor.store');
    Route::get('/doctor/update/{id}', [DoctorController::class, 'update'])->name('doctor.update');
    Route::post('/doctor/update/{id}', [DoctorController::class, 'updateStore'])->name('doctor.update.store');
    Route::get('/doctor/view/{id}', [DoctorController::class, 'show'])->name('doctor.show');

    Route::get('/nurse', [NurseController::class, 'index'])->name('nurse');
    Route::get('/nurse/delete/{id}', [NurseController::class, 'delete'])->name('nurse.delete');
    Route::get('/nurse/create', [NurseController::class, 'create'])->name('nurse.create');
    Route::post('/nurse/create', [NurseController::class, 'store'])->name('nurse.store');
    Route::get('/nurse/update/{id}', [NurseController::class, 'update'])->name('nurse.update');
    Route::post('/nurse/update/{id}', [NurseController::class, 'updateStore'])->name('nurse.update.store');
    Route::get('/nurse/view/{id}', [NurseController::class, 'show'])->name('nurse.show');

    Route::get('/patient', [PatientController::class, 'index'])->name('patient');
    Route::get('/patient/delete/{id}', [PatientController::class, 'delete'])->name('patient.delete');
    Route::get('/patient/create', [PatientController::class, 'create'])->name('patient.create');
    Route::post('/patient/create', [PatientController::class, 'store'])->name('patient.store');
    Route::get('/patient/update/{id}', [PatientController::class, 'update'])->name('patient.update');
    Route::post('/patient/update/{id}', [PatientController::class, 'updateStore'])->name('patient.update.store');
    Route::get('/patient/view/{id}', [PatientController::class, 'show'])->name('patient.show');
    Route::post('/get-patient-details', [PatientController::class, 'getPatientDetails'])->name('get.patient.details');
    Route::post('/get-patient-bill-details', [PatientController::class, 'getPatientBillDetails'])->name('get.patient.bill-details');
    Route::post('/patient-package-store', [PatientController::class, 'packageStore'])->name('patient.package.store');

    Route::get('/opd-patient', [OPDPatientController::class, 'index'])->name('opd-patient');
    Route::get('/opd-patient/delete/{id}', [OPDPatientController::class, 'delete'])->name('opd-patient.delete');
    Route::get('/opd-patient/create', [OPDPatientController::class, 'create'])->name('opd-patient.create');
    Route::post('/opd-patient/create', [OPDPatientController::class, 'store'])->name('opd-patient.store');
    Route::get('/opd-patient/update/{id}', [OPDPatientController::class, 'update'])->name('opd-patient.update');
    Route::post('/opd-patient/update/{id}', [OPDPatientController::class, 'updateStore'])->name('opd-patient.update.store');
    Route::get('/opd-patient/view/{id}', [OPDPatientController::class, 'show'])->name('opd-patient.show');

    Route::get('/opd-bill/index',[OPDBillController::class,'index'])->name('opd-bill.index');
    Route::get('/opd-bill/create',[OPDBillController::class,'create'])->name('opd-bill.create');
    Route::post('/get-opd-patient-bill-details',[OPDBillController::class,'getOpdPatient'])->name('get.opd-patient.bill.details');
    Route::post('/opd-bill/create',[OPDBillController::class,'store'])->name('opd-bill.store');
    Route::get('/opd-bill/show/{id}', [OPDBillController::class, 'show'])->name('opd-bill.show');
    Route::get('/opd-bill/update/{id}', [OPDBillController::class, 'edit'])->name('opd-bill.edit');
    Route::post('/opd-bill/update/{id}', [OPDBillController::class, 'update'])->name('opd-bill.update');
    Route::get('/opd-bill/delete/{id}', [OPDBillController::class, 'delete'])->name('opd-bill.delete');

    Route::get('/patient-document/delete/{id}', [PatientDocumentController::class, 'delete'])->name('patient.document.delete');
    Route::post('/patient-document/create', [PatientDocumentController::class, 'store'])->name('patient.document.store');
    Route::post('/patient-document/update/{id}', [PatientDocumentController::class, 'updateStore'])->name('patient.document.update.store');

    Route::get('/patient/additional-service/{id}', [PatientController::class, 'deleteAdditionalService'])->name('patient.delete.additional-service');
    Route::post('/patient/create-additional-service', [PatientController::class, 'additionalServiceStore'])->name('patient.store.additional-service');
    Route::post('/patient/create-additional-update/{id}', [PatientController::class, 'additionalServiceUpdate'])->name('patient.update.additional-service');

    Route::get('/room', [RoomController::class, 'index'])->name('room');
    Route::get('/room/delete/{id}', [RoomController::class, 'delete'])->name('room.delete');
    Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');
    Route::post('/room/create', [RoomController::class, 'store'])->name('room.store');
    Route::get('/room/update/{id}', [RoomController::class, 'update'])->name('room.update');
    Route::post('/room/update/{id}', [RoomController::class, 'updateStore'])->name('room.update.store');

    Route::get('/bed', [BedController::class, 'index'])->name('bed');
    Route::get('/bed/delete/{id}', [BedController::class, 'delete'])->name('bed.delete');
    Route::get('/bed/create', [BedController::class, 'create'])->name('bed.create');
    Route::post('/bed/create', [BedController::class, 'store'])->name('bed.store');
    Route::get('/bed/update/{id}', [BedController::class, 'update'])->name('bed.update');
    Route::post('/bed/update/{id}', [BedController::class, 'updateStore'])->name('bed.update.store');

    Route::get('/bed-assign', [BedAssignController::class, 'index'])->name('bed-assign');
    Route::get('/bed-assign/delete/{id}', [BedAssignController::class, 'delete'])->name('bed-assign.delete');
    Route::get('/bed-assign/create', [BedAssignController::class, 'create'])->name('bed-assign.create');
    Route::post('/bed-assign/create', [BedAssignController::class, 'store'])->name('bed-assign.store');
    Route::get('/bed-assign/update/{id}', [BedAssignController::class, 'update'])->name('bed-assign.update');
    Route::post('/bed-assign/update/{id}', [BedAssignController::class, 'updateStore'])->name('bed-assign.update.store');
    Route::post('/get-bed-list', [BedAssignController::class, 'getBedList'])->name('get.bed.list');
    Route::get('/bed-management-reports', [BedAssignController::class, 'bedManagementReport'])->name('bed.management.reports');
    Route::get('/bed-management-report', [BedAssignController::class, 'bedManagementReportSearch'])->name('bed.management.report.search');

    Route::get('/enquiry', [EnquiryController::class, 'index'])->name('enquiry');
    Route::get('/enquiry/delete/{id}', [EnquiryController::class, 'delete'])->name('enquiry.delete');
    Route::get('/enquiry/create', [EnquiryController::class, 'create'])->name('enquiry.create');
    Route::post('/enquiry/create', [EnquiryController::class, 'store'])->name('enquiry.store');
    Route::get('/enquiry/update/{id}', [EnquiryController::class, 'update'])->name('enquiry.update');
    Route::post('/enquiry/update/{id}', [EnquiryController::class, 'updateStore'])->name('enquiry.update.store');

    Route::get('/birth-report', [BirthReportController::class, 'index'])->name('birth-report');
    Route::get('/birth-report/delete/{id}', [BirthReportController::class, 'delete'])->name('birth-report.delete');
    Route::get('/birth-report/create', [BirthReportController::class, 'create'])->name('birth-report.create');
    Route::post('/birth-report/create', [BirthReportController::class, 'store'])->name('birth-report.store');
    Route::get('/birth-report/update/{id}', [BirthReportController::class, 'update'])->name('birth-report.update');
    Route::post('/birth-report/update/{id}', [BirthReportController::class, 'updateStore'])->name('birth-report.update.store');

    Route::get('/death-report', [DeathReportController::class, 'index'])->name('death-report');
    Route::get('/death-report/delete/{id}', [DeathReportController::class, 'delete'])->name('death-report.delete');
    Route::get('/death-report/create', [DeathReportController::class, 'create'])->name('death-report.create');
    Route::post('/death-report/create', [DeathReportController::class, 'store'])->name('death-report.store');
    Route::get('/death-report/update/{id}', [DeathReportController::class, 'update'])->name('death-report.update');
    Route::post('/death-report/update/{id}', [DeathReportController::class, 'updateStore'])->name('death-report.update.store');

    Route::get('/operation-report', [OperationReportController::class, 'index'])->name('operation-report');
    Route::get('/operation-report/delete/{id}', [OperationReportController::class, 'delete'])->name('operation-report.delete');
    Route::get('/operation-report/create', [OperationReportController::class, 'create'])->name('operation-report.create');
    Route::post('/operation-report/create', [OperationReportController::class, 'store'])->name('operation-report.store');
    Route::get('/operation-report/update/{id}', [OperationReportController::class, 'update'])->name('operation-report.update');
    Route::post('/operation-report/update/{id}', [OperationReportController::class, 'updateStore'])->name('operation-report.update.store');
    Route::get('/operation-report/view/{id}', [OperationReportController::class, 'show'])->name('operation-report.show');

    Route::get('/investigation-report', [InvestigationReportController::class, 'index'])->name('investigation-report');
    Route::get('/investigation-report/delete/{id}', [InvestigationReportController::class, 'delete'])->name('investigation-report.delete');
    Route::get('/investigation-report/create', [InvestigationReportController::class, 'create'])->name('investigation-report.create');
    Route::post('/investigation-report/create', [InvestigationReportController::class, 'store'])->name('investigation-report.store');
    Route::get('/investigation-report/update/{id}', [InvestigationReportController::class, 'update'])->name('investigation-report.update');
    Route::post('/investigation-report/update/{id}', [InvestigationReportController::class, 'updateStore'])->name('investigation-report.update.store');

    Route::get('/appoinment', [AppoinmentController::class, 'index'])->name('appoinment');
    Route::get('/appoinment/delete/{id}', [AppoinmentController::class, 'delete'])->name('appoinment.delete');
    Route::get('/appoinment/create', [AppoinmentController::class, 'create'])->name('appoinment.create');
    Route::post('/appoinment/create', [AppoinmentController::class, 'store'])->name('appoinment.store');
    Route::get('/appoinment/update/{id}', [AppoinmentController::class, 'update'])->name('appoinment.update');
    Route::post('/appoinment/update/{id}', [AppoinmentController::class, 'updateStore'])->name('appoinment.update.store');
    Route::get('/assign-to-me', [AppoinmentController::class, 'assignToMe'])->name('assign.to.me');
    Route::get('/assign-by-me', [AppoinmentController::class, 'assignByMe'])->name('assign.by.me');
    Route::get('/assign-by-all', [AppoinmentController::class, 'assignByAll'])->name('assign.by.all');
    Route::get('/assign-to-all-doctor', [AppoinmentController::class, 'assignToDoctor'])->name('assign.to.doctor');
    Route::get('/assign-by-representative', [AppoinmentController::class, 'assignByRepresentative'])->name('assign.by.representative');

    Route::get('/medicine-category', [MedicineCategoryController::class, 'index'])->name('medicine-category');
    Route::get('/medicine-category/delete/{id}', [MedicineCategoryController::class, 'delete'])->name('medicine-category.delete');
    Route::get('/medicine-category/create', [MedicineCategoryController::class, 'create'])->name('medicine-category.create');
    Route::post('/medicine-category/create', [MedicineCategoryController::class, 'store'])->name('medicine-category.store');
    Route::get('/medicine-category/update/{id}', [MedicineCategoryController::class, 'update'])->name('medicine-category.update');
    Route::post('/medicine-category/update/{id}', [MedicineCategoryController::class, 'updateStore'])->name('medicine-category.update.store');

    Route::get('/medicine-vendor', [MedicineVendorController::class, 'index'])->name('medicine-vendor');
    Route::get('/medicine-vendor/delete/{id}', [MedicineVendorController::class, 'delete'])->name('medicine-vendor.delete');
    Route::get('/medicine-vendor/create', [MedicineVendorController::class, 'create'])->name('medicine-vendor.create');
    Route::post('/medicine-vendor/create', [MedicineVendorController::class, 'store'])->name('medicine-vendor.store');
    Route::get('/medicine-vendor/update/{id}', [MedicineVendorController::class, 'update'])->name('medicine-vendor.update');
    Route::post('/medicine-vendor/update/{id}', [MedicineVendorController::class, 'updateStore'])->name('medicine-vendor.update.store');

    Route::get('/medicine', [MedicineController::class, 'index'])->name('medicine');
    Route::get('/medicine/delete/{id}', [MedicineController::class, 'delete'])->name('medicine.delete');
    Route::get('/medicine/create', [MedicineController::class, 'create'])->name('medicine.create');
    Route::post('/medicine/create', [MedicineController::class, 'store'])->name('medicine.store');
    Route::get('/medicine/update/{id}', [MedicineController::class, 'update'])->name('medicine.update');
    Route::post('/medicine/update/{id}', [MedicineController::class, 'updateStore'])->name('medicine.update.store');
    Route::get('/medicine/view/{id}', [MedicineController::class, 'show'])->name('medicine.show');

    Route::get('/medicine-invoice', [MedicineInvoiceController::class, 'index'])->name('medicine-invoice');
    Route::get('/medicine-invoice/delete/{id}', [MedicineInvoiceController::class, 'delete'])->name('medicine-invoice.delete');
    Route::get('/medicine-invoice/create', [MedicineInvoiceController::class, 'create'])->name('medicine-invoice.create');
    Route::post('/medicine-invoice/create', [MedicineInvoiceController::class, 'store'])->name('medicine-invoice.store');
    Route::get('/medicine-invoice/update/{id}', [MedicineInvoiceController::class, 'update'])->name('medicine-invoice.update');
    Route::post('/medicine-invoice/update/{id}', [MedicineInvoiceController::class, 'updateStore'])->name('medicine-invoice.update.store');
    Route::post('/get-medicine-list', [MedicineInvoiceController::class, 'getMedicineList'])->name('get.medicine.list');
    Route::post('/get-medicine-details', [MedicineInvoiceController::class, 'getMedicineDetails'])->name('get.medicine.details');
    Route::get('/pharmacy-dashboard', [MedicineInvoiceController::class, 'dashboard'])->name('pharmacy.dashboard');
    Route::get('/medicine-invoice/view/{id}', [MedicineInvoiceController::class, 'show'])->name('medicine-invoice.show');

    Route::get('/purchase-medicine', [PurchaseMedicineController::class, 'index'])->name('purchase-medicine');
    Route::get('/purchase-medicine/delete/{id}', [PurchaseMedicineController::class, 'delete'])->name('purchase-medicine.delete');
    Route::get('/purchase-medicine/create', [PurchaseMedicineController::class, 'create'])->name('purchase-medicine.create');
    Route::post('/purchase-medicine/create', [PurchaseMedicineController::class, 'store'])->name('purchase-medicine.store');
    Route::get('/purchase-medicine/update/{id}', [PurchaseMedicineController::class, 'update'])->name('purchase-medicine.update');
    Route::post('/purchase-medicine/update/{id}', [PurchaseMedicineController::class, 'updateStore'])->name('purchase-medicine.update.store');
    Route::get('/purchase-medicine/view/{id}', [PurchaseMedicineController::class, 'show'])->name('purchase-medicine.show');

    Route::get('/insurance', [InsuranceController::class, 'index'])->name('insurance');
    Route::get('/insurance/delete/{id}', [InsuranceController::class, 'delete'])->name('insurance.delete');
    Route::get('/insurance/create', [InsuranceController::class, 'create'])->name('insurance.create');
    Route::post('/insurance/create', [InsuranceController::class, 'store'])->name('insurance.store');
    Route::get('/insurance/update/{id}', [InsuranceController::class, 'update'])->name('insurance.update');
    Route::post('/insurance/update/{id}', [InsuranceController::class, 'updateStore'])->name('insurance.update.store');
    Route::get('/insurance/view/{id}', [InsuranceController::class, 'show'])->name('insurance.show');

    Route::get('/slot', [SlotController::class, 'index'])->name('slot');
    Route::get('/slot/delete/{id}', [SlotController::class, 'delete'])->name('slot.delete');
    Route::get('/slot/create', [SlotController::class, 'create'])->name('slot.create');
    Route::post('/slot/create', [SlotController::class, 'store'])->name('slot.store');
    Route::get('/slot/update/{id}', [SlotController::class, 'update'])->name('slot.update');
    Route::post('/slot/update/{id}', [SlotController::class, 'updateStore'])->name('slot.update.store');

    Route::get('/schedule', [ScheduleController::class, 'index'])->name('schedule');
    Route::get('/schedule/delete/{id}', [ScheduleController::class, 'delete'])->name('schedule.delete');
    Route::get('/schedule/create', [ScheduleController::class, 'create'])->name('schedule.create');
    Route::post('/schedule/create', [ScheduleController::class, 'store'])->name('schedule.store');
    Route::get('/schedule/update/{id}', [ScheduleController::class, 'update'])->name('schedule.update');
    Route::post('/schedule/update/{id}', [ScheduleController::class, 'updateStore'])->name('schedule.update.store');

    Route::get('/patient-case', [PatientCaseController::class, 'index'])->name('patient-case');
    Route::get('/patient-case/delete/{id}', [PatientCaseController::class, 'delete'])->name('patient-case.delete');
    Route::get('/patient-case/create', [PatientCaseController::class, 'create'])->name('patient-case.create');
    Route::post('/patient-case/create', [PatientCaseController::class, 'store'])->name('patient-case.store');
    Route::get('/patient-case/update/{id}', [PatientCaseController::class, 'update'])->name('patient-case.update');
    Route::post('/patient-case/update/{id}', [PatientCaseController::class, 'updateStore'])->name('patient-case.update.store');

    Route::get('/patient-case-study', [PatientCaseStudyController::class, 'index'])->name('patient-case-study');
    Route::get('/patient-case-study/delete/{id}', [PatientCaseStudyController::class, 'delete'])->name('patient-case-study.delete');
    Route::get('/patient-case-study/create', [PatientCaseStudyController::class, 'create'])->name('patient-case-study.create');
    Route::post('/patient-case-study/create', [PatientCaseStudyController::class, 'store'])->name('patient-case-study.store');
    Route::get('/patient-case-study/update/{id}', [PatientCaseStudyController::class, 'update'])->name('patient-case-study.update');
    Route::post('/patient-case-study/update/{id}', [PatientCaseStudyController::class, 'updateStore'])->name('patient-case-study.update.store');
    Route::get('/patient-case-study/view/{id}', [PatientCaseStudyController::class, 'show'])->name('patient-case-study.show');

    Route::get('/prescription', [PrescriptionController::class, 'index'])->name('prescription');
    Route::get('/prescription/delete/{id}', [PrescriptionController::class, 'delete'])->name('prescription.delete');
    Route::get('/prescription/create', [PrescriptionController::class, 'create'])->name('prescription.create');
    Route::post('/prescription/create', [PrescriptionController::class, 'store'])->name('prescription.store');
    Route::get('/prescription/update/{id}', [PrescriptionController::class, 'update'])->name('prescription.update');
    Route::post('/prescription/update/{id}', [PrescriptionController::class, 'updateStore'])->name('prescription.update.store');
    Route::get('/prescription/view/{id}', [PrescriptionController::class, 'show'])->name('prescription.show');

    Route::get('/service', [ServiceController::class, 'index'])->name('service');
    Route::get('/service/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/create', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/update/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::post('/service/update/{id}', [ServiceController::class, 'updateStore'])->name('service.update.store');
    Route::post('/get-service-details', [ServiceController::class, 'getServiceDetails'])->name('get.service.details');

    Route::get('/package', [PackageController::class, 'index'])->name('package');
    Route::get('/package/delete/{id}', [PackageController::class, 'delete'])->name('package.delete');
    Route::get('/package/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package/create', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/update/{id}', [PackageController::class, 'update'])->name('package.update');
    Route::post('/package/update/{id}', [PackageController::class, 'updateStore'])->name('package.update.store');
    Route::get('/package/view/{id}', [PackageController::class, 'show'])->name('package.show');

    Route::get('/advance-payment', [AdvancePaymentController::class, 'index'])->name('advance-payment');
    Route::get('/advance-payment/delete/{id}', [AdvancePaymentController::class, 'delete'])->name('advance-payment.delete');
    Route::get('/advance-payment/create', [AdvancePaymentController::class, 'create'])->name('advance-payment.create');
    Route::post('/advance-payment/create', [AdvancePaymentController::class, 'store'])->name('advance-payment.store');
    Route::get('/advance-payment/update/{id}', [AdvancePaymentController::class, 'update'])->name('advance-payment.update');
    Route::post('/advance-payment/update/{id}', [AdvancePaymentController::class, 'updateStore'])->name('advance-payment.update.store');

    Route::get('/bill', [BillController::class, 'index'])->name('bill');
    Route::get('/bill/delete/{id}', [BillController::class, 'delete'])->name('bill.delete');
    Route::get('/bill/create', [BillController::class, 'create'])->name('bill.create');
    Route::post('/bill/create', [BillController::class, 'store'])->name('bill.store');
    Route::get('/bill/update/{id}', [BillController::class, 'update'])->name('bill.update');
    Route::post('/bill/update/{id}', [BillController::class, 'updateStore'])->name('bill.update.store');
    Route::get('/complete-bill', [BillController::class, 'completeBill'])->name('complete.bill');
    Route::get('/bill/view/{id}', [BillController::class, 'show'])->name('bill.show');

    Route::get('/ambulance', [AmbulanceController::class, 'index'])->name('ambulance');
    Route::get('/ambulance/delete/{id}', [AmbulanceController::class, 'delete'])->name('ambulance.delete');
    Route::get('/ambulance/create', [AmbulanceController::class, 'create'])->name('ambulance.create');
    Route::post('/ambulance/create', [AmbulanceController::class, 'store'])->name('ambulance.store');
    Route::get('/ambulance/update/{id}', [AmbulanceController::class, 'update'])->name('ambulance.update');
    Route::post('/ambulance/update/{id}', [AmbulanceController::class, 'updateStore'])->name('ambulance.update.store');
    Route::post('/get-ambulance-details', [AmbulanceController::class, 'getAmbulanceDetails'])->name('get.ambulance.details');

    Route::get('/call-ambulance', [CallAmbulanceController::class, 'index'])->name('call-ambulance');
    Route::get('/call-ambulance/delete/{id}', [CallAmbulanceController::class, 'delete'])->name('call-ambulance.delete');
    Route::get('/call-ambulance/create', [CallAmbulanceController::class, 'create'])->name('call-ambulance.create');
    Route::post('/call-ambulance/create', [CallAmbulanceController::class, 'store'])->name('call-ambulance.store');
    Route::get('/call-ambulance/update/{id}', [CallAmbulanceController::class, 'update'])->name('call-ambulance.update');
    Route::post('/call-ambulance/update/{id}', [CallAmbulanceController::class, 'updateStore'])->name('call-ambulance.update.store');
    Route::get('/call-ambulance/view/{id}', [CallAmbulanceController::class, 'show'])->name('call-ambulance.show');

    Route::get('/blood-donor', [BloodDonorController::class, 'index'])->name('blood-donor');
    Route::get('/blood-donor/delete/{id}', [BloodDonorController::class, 'delete'])->name('blood-donor.delete');
    Route::get('/blood-donor/create', [BloodDonorController::class, 'create'])->name('blood-donor.create');
    Route::post('/blood-donor/create', [BloodDonorController::class, 'store'])->name('blood-donor.store');
    Route::get('/blood-donor/update/{id}', [BloodDonorController::class, 'update'])->name('blood-donor.update');
    Route::post('/blood-donor/update/{id}', [BloodDonorController::class, 'updateStore'])->name('blood-donor.update.store');
    Route::post('/get-blood-donor-details', [BloodDonorController::class, 'getBloodDonorDetails'])->name('get.blood.donor.details');

    Route::get('/blood-bag/delete/{id}', [BloodBagController::class, 'delete'])->name('blood-bag.delete');
    Route::get('/blood-bag/create', [BloodBagController::class, 'create'])->name('blood-bag.create');
    Route::post('/blood-bag/create', [BloodBagController::class, 'store'])->name('blood-bag.store');
    Route::get('/blood-bag/update/{id}', [BloodBagController::class, 'update'])->name('blood-bag.update');
    Route::post('/blood-bag/update/{id}', [BloodBagController::class, 'updateStore'])->name('blood-bag.update.store');
    Route::post('/get-blood-bag-list', [BloodBagController::class, 'getBloodBagList'])->name('get.blood.bag.list');

    Route::get('/blood-bank', [BloodBankController::class, 'index'])->name('blood-bank');

    Route::get('/blood-issue', [BloodIssueController::class, 'index'])->name('blood-issue');
    Route::get('/blood-issue/delete/{id}', [BloodIssueController::class, 'delete'])->name('blood-issue.delete');
    Route::get('/blood-issue/create', [BloodIssueController::class, 'create'])->name('blood-issue.create');
    Route::post('/blood-issue/create', [BloodIssueController::class, 'store'])->name('blood-issue.store');
    Route::get('/blood-issue/update/{id}', [BloodIssueController::class, 'update'])->name('blood-issue.update');
    Route::post('/blood-issue/update/{id}', [BloodIssueController::class, 'updateStore'])->name('blood-issue.update.store');
    Route::get('/blood-issue/view/{id}', [BloodIssueController::class, 'show'])->name('blood-issue.show');

    Route::get('/pathology-category', [PathologyCategoryController::class, 'index'])->name('pathology-category');
    Route::get('/pathology-category/delete/{id}', [PathologyCategoryController::class, 'delete'])->name('pathology-category.delete');
    Route::post('/pathology-category/create', [PathologyCategoryController::class, 'store'])->name('pathology-category.store');
    Route::post('/pathology-category/update/{id}', [PathologyCategoryController::class, 'updateStore'])->name('pathology-category.update.store');

    Route::get('/pathology-parameter', [PathologyParameterController::class, 'index'])->name('pathology-parameter');
    Route::get('/pathology-parameter/delete/{id}', [PathologyParameterController::class, 'delete'])->name('pathology-parameter.delete');
    Route::get('/pathology-parameter/create', [PathologyParameterController::class, 'create'])->name('pathology-parameter.create');
    Route::post('/pathology-parameter/create', [PathologyParameterController::class, 'store'])->name('pathology-parameter.store');
    Route::get('/pathology-parameter/update/{id}', [PathologyParameterController::class, 'update'])->name('pathology-parameter.update');
    Route::post('/pathology-parameter/update/{id}', [PathologyParameterController::class, 'updateStore'])->name('pathology-parameter.update.store');
    Route::post('/get-pathology-parameter-details', [PathologyParameterController::class, 'getParameterDetails'])->name('get.pathology.parameter.details');

    Route::get('/pathology-test', [PathologyTestController::class, 'index'])->name('pathology-test');
    Route::get('/pathology-test/delete/{id}', [PathologyTestController::class, 'delete'])->name('pathology-test.delete');
    Route::get('/pathology-test/create', [PathologyTestController::class, 'create'])->name('pathology-test.create');
    Route::post('/pathology-test/create', [PathologyTestController::class, 'store'])->name('pathology-test.store');
    Route::get('/pathology-test/update/{id}', [PathologyTestController::class, 'update'])->name('pathology-test.update');
    Route::post('/pathology-test/update/{id}', [PathologyTestController::class, 'updateStore'])->name('pathology-test.update.store');
    Route::post('/get-pathology-test-details', [PathologyTestController::class, 'getTestDetails'])->name('get.pathology.test.details');
    Route::get('/pathology-test/view/{id}', [PathologyTestController::class, 'show'])->name('pathology-test.show');

    Route::get('/pathology-bill', [PathologyBillController::class, 'index'])->name('pathology-bill');
    Route::get('/pathology-bill/delete/{id}', [PathologyBillController::class, 'delete'])->name('pathology-bill.delete');
    Route::get('/pathology-bill/create', [PathologyBillController::class, 'create'])->name('pathology-bill.create');
    Route::post('/pathology-bill/create', [PathologyBillController::class, 'store'])->name('pathology-bill.store');
    Route::get('/pathology-bill/update/{id}', [PathologyBillController::class, 'update'])->name('pathology-bill.update');
    Route::post('/pathology-bill/update/{id}', [PathologyBillController::class, 'updateStore'])->name('pathology-bill.update.store');
    Route::get('/pathology-bill/view/{id}', [PathologyBillController::class, 'show'])->name('pathology-bill.show');

    Route::get('/radiology-category', [RadiologyCategoryController::class, 'index'])->name('radiology-category');
    Route::get('/radiology-category/delete/{id}', [RadiologyCategoryController::class, 'delete'])->name('radiology-category.delete');
    Route::post('/radiology-category/create', [RadiologyCategoryController::class, 'store'])->name('radiology-category.store');
    Route::post('/radiology-category/update/{id}', [RadiologyCategoryController::class, 'updateStore'])->name('radiology-category.update.store');

    Route::get('/radiology-parameter', [RadiologyParameterController::class, 'index'])->name('radiology-parameter');
    Route::get('/radiology-parameter/delete/{id}', [RadiologyParameterController::class, 'delete'])->name('radiology-parameter.delete');
    Route::get('/radiology-parameter/create', [RadiologyParameterController::class, 'create'])->name('radiology-parameter.create');
    Route::post('/radiology-parameter/create', [RadiologyParameterController::class, 'store'])->name('radiology-parameter.store');
    Route::get('/radiology-parameter/update/{id}', [RadiologyParameterController::class, 'update'])->name('radiology-parameter.update');
    Route::post('/radiology-parameter/update/{id}', [RadiologyParameterController::class, 'updateStore'])->name('radiology-parameter.update.store');
    Route::post('/get-radiology-parameter-details', [RadiologyParameterController::class, 'getParameterDetails'])->name('get.radiology.parameter.details');

    Route::get('/radiology-test', [RadiologyTestController::class, 'index'])->name('radiology-test');
    Route::get('/radiology-test/delete/{id}', [RadiologyTestController::class, 'delete'])->name('radiology-test.delete');
    Route::get('/radiology-test/create', [RadiologyTestController::class, 'create'])->name('radiology-test.create');
    Route::post('/radiology-test/create', [RadiologyTestController::class, 'store'])->name('radiology-test.store');
    Route::get('/radiology-test/update/{id}', [RadiologyTestController::class, 'update'])->name('radiology-test.update');
    Route::post('/radiology-test/update/{id}', [RadiologyTestController::class, 'updateStore'])->name('radiology-test.update.store');
    Route::post('/get-radiology-test-details', [RadiologyTestController::class, 'getTestDetails'])->name('get.radiology.test.details');
    Route::get('/radiology-test/view/{id}', [RadiologyTestController::class, 'show'])->name('radiology-test.show');

    Route::get('/radiology-bill', [RadiologyBillController::class, 'index'])->name('radiology-bill');
    Route::get('/radiology-bill/delete/{id}', [RadiologyBillController::class, 'delete'])->name('radiology-bill.delete');
    Route::get('/radiology-bill/create', [RadiologyBillController::class, 'create'])->name('radiology-bill.create');
    Route::post('/radiology-bill/create', [RadiologyBillController::class, 'store'])->name('radiology-bill.store');
    Route::get('/radiology-bill/update/{id}', [RadiologyBillController::class, 'update'])->name('radiology-bill.update');
    Route::post('/radiology-bill/update/{id}', [RadiologyBillController::class, 'updateStore'])->name('radiology-bill.update.store');
    Route::get('/radiology-bill/view/{id}', [RadiologyBillController::class, 'show'])->name('radiology-bill.show');

    Route::get('/expense', [ExpenseController::class, 'index'])->name('expense');
    Route::get('/expense/delete/{id}', [ExpenseController::class, 'delete'])->name('expense.delete');
    Route::get('/expense/create', [ExpenseController::class, 'create'])->name('expense.create');
    Route::post('/expense/create', [ExpenseController::class, 'store'])->name('expense.store');
    Route::get('/expense/update/{id}', [ExpenseController::class, 'update'])->name('expense.update');
    Route::post('/expense/update/{id}', [ExpenseController::class, 'updateStore'])->name('expense.update.store');

    Route::get('/biochemistry-category', [BiochemistryCategoryController::class, 'index'])->name('biochemistry-category');
    Route::get('/biochemistry-category/delete/{id}', [BiochemistryCategoryController::class, 'delete'])->name('biochemistry-category.delete');
    Route::post('/biochemistry-category/create', [BiochemistryCategoryController::class, 'store'])->name('biochemistry-category.store');
    Route::post('/biochemistry-category/update/{id}', [BiochemistryCategoryController::class, 'updateStore'])->name('biochemistry-category.update.store');

    Route::get('/biochemistry-parameter', [BiochemistryParameterController::class, 'index'])->name('biochemistry-parameter');
    Route::get('/biochemistry-parameter/delete/{id}', [BiochemistryParameterController::class, 'delete'])->name('biochemistry-parameter.delete');
    Route::get('/biochemistry-parameter/create', [BiochemistryParameterController::class, 'create'])->name('biochemistry-parameter.create');
    Route::post('/biochemistry-parameter/create', [BiochemistryParameterController::class, 'store'])->name('biochemistry-parameter.store');
    Route::get('/biochemistry-parameter/update/{id}', [BiochemistryParameterController::class, 'update'])->name('biochemistry-parameter.update');
    Route::post('/biochemistry-parameter/update/{id}', [BiochemistryParameterController::class, 'updateStore'])->name('biochemistry-parameter.update.store');
    Route::post('/get-biochemistry-parameter-details', [BiochemistryParameterController::class, 'getParameterDetails'])->name('get.biochemistry.parameter.details');

    Route::get('/biochemistry-test', [BiochemistryTestController::class, 'index'])->name('biochemistry-test');
    Route::get('/biochemistry-test/delete/{id}', [BiochemistryTestController::class, 'delete'])->name('biochemistry-test.delete');
    Route::get('/biochemistry-test/create', [BiochemistryTestController::class, 'create'])->name('biochemistry-test.create');
    Route::post('/biochemistry-test/create', [BiochemistryTestController::class, 'store'])->name('biochemistry-test.store');
    Route::get('/biochemistry-test/update/{id}', [BiochemistryTestController::class, 'update'])->name('biochemistry-test.update');
    Route::post('/biochemistry-test/update/{id}', [BiochemistryTestController::class, 'updateStore'])->name('biochemistry-test.update.store');
    Route::post('/get-biochemistry-test-details', [BiochemistryTestController::class, 'getTestDetails'])->name('get.biochemistry.test.details');
    Route::get('/biochemistry-test/view/{id}', [BiochemistryTestController::class, 'show'])->name('biochemistry-test.show');

    Route::get('/biochemistry-bill', [BiochemistryBillController::class, 'index'])->name('biochemistry-bill');
    Route::get('/biochemistry-bill/delete/{id}', [BiochemistryBillController::class, 'delete'])->name('biochemistry-bill.delete');
    Route::get('/biochemistry-bill/create', [BiochemistryBillController::class, 'create'])->name('biochemistry-bill.create');
    Route::post('/biochemistry-bill/create', [BiochemistryBillController::class, 'store'])->name('biochemistry-bill.store');
    Route::get('/biochemistry-bill/update/{id}', [BiochemistryBillController::class, 'update'])->name('biochemistry-bill.update');
    Route::post('/biochemistry-bill/update/{id}', [BiochemistryBillController::class, 'updateStore'])->name('biochemistry-bill.update.store');
    Route::get('/biochemistry-bill/view/{id}', [BiochemistryBillController::class, 'show'])->name('biochemistry-bill.show');

    Route::get('/microbiology-category', [MicrobiologyCategoryController::class, 'index'])->name('microbiology-category');
    Route::get('/microbiology-category/delete/{id}', [MicrobiologyCategoryController::class, 'delete'])->name('microbiology-category.delete');
    Route::post('/microbiology-category/create', [MicrobiologyCategoryController::class, 'store'])->name('microbiology-category.store');
    Route::post('/microbiology-category/update/{id}', [MicrobiologyCategoryController::class, 'updateStore'])->name('microbiology-category.update.store');

    Route::get('/microbiology-parameter', [MicrobiologyParameterController::class, 'index'])->name('microbiology-parameter');
    Route::get('/microbiology-parameter/delete/{id}', [MicrobiologyParameterController::class, 'delete'])->name('microbiology-parameter.delete');
    Route::get('/microbiology-parameter/create', [MicrobiologyParameterController::class, 'create'])->name('microbiology-parameter.create');
    Route::post('/microbiology-parameter/create', [MicrobiologyParameterController::class, 'store'])->name('microbiology-parameter.store');
    Route::get('/microbiology-parameter/update/{id}', [MicrobiologyParameterController::class, 'update'])->name('microbiology-parameter.update');
    Route::post('/microbiology-parameter/update/{id}', [MicrobiologyParameterController::class, 'updateStore'])->name('microbiology-parameter.update.store');
    Route::post('/get-microbiology-parameter-details', [MicrobiologyParameterController::class, 'getParameterDetails'])->name('get.microbiology.parameter.details');

    Route::get('/microbiology-test', [MicrobiologyTestController::class, 'index'])->name('microbiology-test');
    Route::get('/microbiology-test/delete/{id}', [MicrobiologyTestController::class, 'delete'])->name('microbiology-test.delete');
    Route::get('/microbiology-test/create', [MicrobiologyTestController::class, 'create'])->name('microbiology-test.create');
    Route::post('/microbiology-test/create', [MicrobiologyTestController::class, 'store'])->name('microbiology-test.store');
    Route::get('/microbiology-test/update/{id}', [MicrobiologyTestController::class, 'update'])->name('microbiology-test.update');
    Route::post('/microbiology-test/update/{id}', [MicrobiologyTestController::class, 'updateStore'])->name('microbiology-test.update.store');
    Route::post('/get-microbiology-test-details', [MicrobiologyTestController::class, 'getTestDetails'])->name('get.microbiology.test.details');
    Route::get('/microbiology-test/view/{id}', [MicrobiologyTestController::class, 'show'])->name('microbiology-test.show');

    Route::get('/microbiology-bill', [MicrobiologyBillController::class, 'index'])->name('microbiology-bill');
    Route::get('/microbiology-bill/delete/{id}', [MicrobiologyBillController::class, 'delete'])->name('microbiology-bill.delete');
    Route::get('/microbiology-bill/create', [MicrobiologyBillController::class, 'create'])->name('microbiology-bill.create');
    Route::post('/microbiology-bill/create', [MicrobiologyBillController::class, 'store'])->name('microbiology-bill.store');
    Route::get('/microbiology-bill/update/{id}', [MicrobiologyBillController::class, 'update'])->name('microbiology-bill.update');
    Route::post('/microbiology-bill/update/{id}', [MicrobiologyBillController::class, 'updateStore'])->name('microbiology-bill.update.store');
    Route::get('/microbiology-bill/view/{id}', [MicrobiologyBillController::class, 'show'])->name('microbiology-bill.show');

    Route::get('/unit', [UnitController::class, 'index'])->name('unit');
    Route::get('/unit/delete/{id}', [UnitController::class, 'delete'])->name('unit.delete');
    Route::get('/unit/create', [UnitController::class, 'create'])->name('unit.create');
    Route::post('/unit/create', [UnitController::class, 'store'])->name('unit.store');
    Route::get('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
    Route::post('/unit/update/{id}', [UnitController::class, 'updateStore'])->name('unit.update.store');

    Route::get('/unit-doctor', [UnitDoctorListController::class, 'index'])->name('unit-doctor');
    Route::get('/unit-doctor/delete/{id}', [UnitDoctorListController::class, 'delete'])->name('unit-doctor.delete');
    Route::get('/unit-doctor/create', [UnitDoctorListController::class, 'create'])->name('unit-doctor.create');
    Route::post('/unit-doctor/create', [UnitDoctorListController::class, 'store'])->name('unit-doctor.store');
    Route::get('/unit-doctor/update/{id}', [UnitDoctorListController::class, 'update'])->name('unit-doctor.update');
    Route::post('/unit-doctor/update/{id}', [UnitDoctorListController::class, 'updateStore'])->name('unit-doctor.update.store');


    Route::get('/operation/list', [OperationController::class, 'index'])->name('operation.list');
    Route::get('/operation/delete/{id}', [OperationController::class, 'delete'])->name('operation.delete');
    Route::post('/operation/create', [OperationController::class, 'store'])->name('operation.store');
    Route::post('/operation/update/{id}', [OperationController::class, 'updateStore'])->name('operation.update.store');


    Route::get('/operation/category', [OperationCategoryController::class, 'index'])->name('operation.category');
    Route::get('/operation/category/delete/{id}', [OperationCategoryController::class, 'delete'])->name('operation.category.delete');
    Route::post('/operation/category/create', [OperationCategoryController::class, 'store'])->name('operation.category.store');
    Route::post('/operation/category/update/{id}', [OperationCategoryController::class, 'updateStore'])->name('operation.category.update.store');
    Route::post('/operation/category/details', [OperationCategoryController::class, 'getOperationCategoryDetails'])->name('operation.category.details');

    Route::get('/operation/patient', [PatientOperationController::class, 'index'])->name('operation.patient');
    Route::get('/operation//patient/delete/{id}', [PatientOperationController::class, 'delete'])->name('operation.patient.delete');
    Route::get('/operation/patient/create', [PatientOperationController::class, 'create'])->name('operation.patient.create');
    Route::post('/operation/patient/create', [PatientOperationController::class, 'store'])->name('operation.patient.store');
    Route::get('/operation/patient/update/{id}', [PatientOperationController::class, 'update'])->name('operation.patient.update');
    Route::post('/operation/patient/update/{id}', [PatientOperationController::class, 'updateStore'])->name('operation.patient.update.store');
    Route::post('/operation/patient/details', [PatientOperationController::class, 'getOperationPatientDetails'])->name('operation.patient.details');
    Route::post('/operation/patient/bill', [PatientOperationController::class, 'getOperationPatientBill'])->name('operation.patient.bill');

    Route::get('/operation-bill', [OperationBillController::class, 'index'])->name('operation-bill');
    Route::get('/operation-bill/delete/{id}', [OperationBillController::class, 'delete'])->name('operation-bill.delete');
    Route::get('/operation-bill/create', [OperationBillController::class, 'create'])->name('operation-bill.create');
    Route::post('/operation-bill/create', [OperationBillController::class, 'store'])->name('operation-bill.store');
    Route::get('/operation-bill/update/{id}', [OperationBillController::class, 'update'])->name('operation-bill.update');
    Route::post('/operation-bill/update/{id}', [OperationBillController::class, 'updateStore'])->name('operation-bill.update.store');
    Route::get('/operation-bill/view/{id}', [OperationBillController::class, 'show'])->name('operation-bill.show');



});

require __DIR__.'/auth.php';
