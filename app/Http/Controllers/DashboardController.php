<?php

namespace App\Http\Controllers;

use App\Models\Appoinment;
use App\Models\Bed;
use App\Models\Bill;
use App\Models\BiochemistryBill;
use App\Models\BloodIssue;
use App\Models\CallAmbulance;
use App\Models\Doctor;
use App\Models\Expense;
use App\Models\MedicineInvoice;
use App\Models\MicrobiologyBill;
use App\Models\OPDBill;
use App\Models\PathologyBill;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\RadiologyBill;

class DashboardController extends Controller
{
    public function index()
    {
        $appoinment_count = Appoinment::count();
        $patient_count = Patient::count();
        $prescription_count = Prescription::count();
        $doctor_count = Doctor::count();
        $free_bed_count = Bed::where('status', 'Available')->count();
        $discharged_count = Patient::where('status', 'Inactive')->count();
        $opd_income = OPDBill::sum('payable');
        $ipd_payable = Bill::sum('payable');
        $ipd_insurance = Bill::sum('insurance');
        $ipd_advance_paid = Bill::sum('advance_paid');
        $ipd_income = $ipd_payable + $ipd_insurance + $ipd_advance_paid;
        $pharmacy_income = MedicineInvoice::sum('payment_amount');
        $pathology_income = PathologyBill::sum('payment_amount');
        $biochemistry_income = BiochemistryBill::sum('payment_amount');
        $microbiology_income = MicrobiologyBill::sum('payment_amount');
        $radiology_income = RadiologyBill::sum('payment_amount');
        $blood_bank_income = BloodIssue::sum('payment_amount');
        $ambulance_income = CallAmbulance::sum('payment_amount');
        $prescription = Prescription::sum('visiting_fees');
        $general_income = $prescription;
        $expense = Expense::sum('amount');
        $patient = Patient::where('status', 'Active')->orderBy('created_at', 'DESC')->get();
        return view('dashboard', compact('appoinment_count','ipd_income','opd_income','biochemistry_income','microbiology_income','patient_count', 'prescription_count', 'doctor_count', 'free_bed_count', 'discharged_count', 'pharmacy_income', 'pathology_income', 'radiology_income', 'blood_bank_income', 'ambulance_income', 'general_income', 'expense', 'patient'));
    }
}
