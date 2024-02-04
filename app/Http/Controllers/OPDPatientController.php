<?php

namespace App\Http\Controllers;

use App\Models\OPDPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OPDPatientController extends Controller
{
    public function index()
    {
        $opdPatient = OPDPatient::orderBy('created_at', 'DESC')->get();
        return view('opd-patient.index', compact('opdPatient'));
    }

    public function show($id)
    {
        $id = decrypt($id);
        $patient = OPDPatient::find($id);
        return view('opd-patient.show', compact('patient'));
    }

    // public function packageStore(Request $request)
    // {
    //     try {
    //         DB::beginTransaction();
    //         $advance_payment = new PatientPackage();
    //         $advance_payment->patient_id = decrypt($request->patient_id);
    //         $advance_payment->package_id = $request->package_id;
    //         $advance_payment->save();
    //         DB::commit();
    //         toastr()->success('Patient Package added successfully.');
    //         return redirect()->back();
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return $e->getMessage();
    //     }
    // }

    public function delete($id)
    {
        $id = decrypt($id);
        $patient = OPDPatient::find($id);
        $patient->delete();
        toastr()->success('OPD Patient deleted successfully.');
        return back();
    }

    public function create()
    {
        return view('opd-patient.create');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $patient = new OPDPatient();
            $patient->patient_id = 'PAT' . rand(00000, 99999);
            $patient->uhid = $request->uhid;
            $patient->name = $request->name;
            $patient->guardian_name = $request->guardian_name;
            $patient->email = $request->email;
            $patient->contact = $request->contact;
            $patient->emergency_contact = $request->emergency_contact;
            $patient->blood_group = $request->blood_group;
            $patient->gender = $request->gender;
            $patient->dob = $request->dob;
            $patient->address = $request->address;
            $patient->admission_date = $request->admission_date;
            $patient->department_id = $request->department_id;
            $patient->purpose = $request->purpose;
            $patient->doctor_id = $request->doctor_id;
            $patient->weight = $request->weight;
            $patient->blood_pressure = $request->blood_pressure;
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/opd-patient-image/'), $filename);
                $patient->image = '/uploads/opd-patient-image/'.$filename;
            }
            $patient->pan_number = $request->pan_number;
            $patient->passport_number = $request->passport_number;
            $patient->status = $request->status;
            $patient->save();
            DB::commit();
            toastr()->success('OPD Patient created successfully.');
            return redirect('opd-patient');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function update($id)
    {
        $id = decrypt($id);
        $opdPatient = OPDPatient::find($id);
        return view('opd-patient.update', compact('opdPatient'));
    }

    public function updateStore(Request $request, $id)
    {
        $id = decrypt($id);
        try {
            DB::beginTransaction();
            $patient = OPDPatient::find($id);
            $patient->uhid = $request->uhid;
            $patient->name = $request->name;
            $patient->guardian_name = $request->guardian_name;
            $patient->email = $request->email;
            $patient->contact = $request->contact;
            $patient->emergency_contact = $request->emergency_contact;
            $patient->blood_group = $request->blood_group;
            $patient->gender = $request->gender;
            $patient->dob = $request->dob;
            $patient->address = $request->address;
            $patient->admission_date = $request->admission_date;
            $patient->department_id = $request->department_id;
            $patient->purpose = $request->purpose;
            $patient->doctor_id = $request->doctor_id;
            $patient->weight = $request->weight;
            $patient->blood_pressure = $request->blood_pressure;
            if($request->hasfile('image'))
            {
                $file = $request->file('image');
                $extenstion = $file->getClientOriginalExtension();
                $filename = time().'.'.$extenstion;
                $file->move(public_path('uploads/opd-patient-image/'), $filename);
                $patient->image = '/uploads/opd-patient-image/'.$filename;
            }
            $patient->pan_number = $request->pan_number;
            $patient->passport_number = $request->passport_number;
            $patient->status = $request->status;
            $patient->save();
            DB::commit();
            toastr()->success('OPD Patient updated successfully.');
            return redirect('opd-patient');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    // public function getPatientDetails(Request $request) {
    //     $patient = Patient::find($request->patient_id);
    //     return response()->json([
    //         'patient' => $patient
    //     ]);
    // }

    // public function getPatientBillDetails(Request $request) {
    //     $patient = Patient::find($request->patient_id);
    //     $package = PatientPackage::where('patient_id', $patient->id)->first();
    //     $package_details = Package::find($package->package_id);
    //     $insurance = Insurance::where('patient_id', $patient->id)->first();
    //     $bed = BedAssign::where('patient_id', $patient->id)->first();
    //     $bed_details = Bed::find($bed->bed_id);
    //     $room_details = Room::find($bed_details->room_id);
    //     $advance_payment = AdvancePayment::where('patient_id', $patient->id)->orderBy('created_at', 'DESC')->get();
    //     $additional_service = AdditionalService::where('patient_id', $patient->id)->orderBy('created_at', 'DESC')->get();
    //     return response()->json([
    //         'patient' => $patient,
    //         'package' => $package,
    //         'package_details' => $package_details,
    //         'insurance' => $insurance,
    //         'bed' => $bed,
    //         'bed_details' => $bed_details,
    //         'room_details' => $room_details,
    //         'advance_payment' => $advance_payment,
    //         'additional_service' => $additional_service
    //     ]);
    // }

    // public function deleteAdditionalService($id)
    // {
    //     $id = decrypt($id);
    //     $additional_service = AdditionalService::find($id);
    //     $additional_service->delete();
    //     toastr()->success('Additional Service deleted successfully.');
    //     return back();
    // }

    // public function additionalServiceStore(Request $request)
    // {
    //     try {
    //         DB::beginTransaction();
    //         $additional_service = new AdditionalService();
    //         $additional_service->patient_id = decrypt($request->patient_id);
    //         $additional_service->name = $request->name;
    //         $additional_service->amount = $request->amount;
    //         $additional_service->description = $request->description;
    //         $additional_service->save();
    //         DB::commit();
    //         toastr()->success('Additional Service added successfully.');
    //         return redirect()->back();
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return $e->getMessage();
    //     }
    // }

    // public function additionalServiceUpdate(Request $request, $id)
    // {
    //     $id = decrypt($id);
    //     try {
    //         DB::beginTransaction();
    //         $additional_service = AdditionalService::find($id);
    //         $additional_service->name = $request->name;
    //         $additional_service->amount = $request->amount;
    //         $additional_service->description = $request->description;
    //         $additional_service->save();
    //         DB::commit();
    //         toastr()->success('Additional Service updated successfully.');
    //         return redirect()->back();
    //     } catch (\Exception $e) {
    //         DB::rollBack();
    //         return $e->getMessage();
    //     }
    // }
}
