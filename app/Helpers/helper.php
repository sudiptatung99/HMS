<?php

    use App\Models\Ambulance;
    use App\Models\Bed;
use App\Models\BiochemistryCategory;
use App\Models\BiochemistryParameter;
use App\Models\BiochemistryTest;
use App\Models\BloodDonor;
    use App\Models\BloodGroup;
    use App\Models\Department;
    use App\Models\Designation;
use App\Models\Doctor;
use App\Models\MedicineCategory;
    use App\Models\MedicineVendor;
use App\Models\MicrobiologyCategory;
use App\Models\MicrobiologyParameter;
use App\Models\MicrobiologyTest;
use App\Models\OPDPatient;
use App\Models\Operation;
use App\Models\OperationCategory;
use App\Models\Package;
    use App\Models\PathologyCategory;
    use App\Models\PathologyParameter;
    use App\Models\PathologyTest;
    use App\Models\Patient;
use App\Models\PatientOperation;
use App\Models\RadiologyCategory;
    use App\Models\RadiologyParameter;
    use App\Models\RadiologyTest;
    use App\Models\Room;
    use App\Models\Service;
    use App\Models\Slot;
use App\Models\Unit;
use App\Models\User;

    if(!function_exists('getRadiologyTest')) {
        function getRadiologyTest($test)
        {
            $data = RadiologyTest::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($test == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getRadiologyParameter')) {
        function getRadiologyParameter($parameter)
        {
            $data = RadiologyParameter::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($parameter == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getRadiologyCategory')) {
        function getRadiologyCategory($category)
        {
            $data = RadiologyCategory::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($category == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getPathologyTest')) {
        function getPathologyTest($test)
        {
            $data = PathologyTest::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($test == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getPathologyParameter')) {
        function getPathologyParameter($parameter)
        {
            $data = PathologyParameter::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($parameter == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getPathologyCategory')) {
        function getPathologyCategory($category)
        {
            $data = PathologyCategory::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($category == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getBiochemistryCategory')) {
        function getBiochemistryCategory($category)
        {
            $data = BiochemistryCategory::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($category == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }
    if(!function_exists('getBiochemistryParameter')) {
        function getBiochemistryParameter($category)
        {
            $data = BiochemistryParameter::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($category == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }
    if(!function_exists('getMicrobiologyCategory')) {
        function getMicrobiologyCategory($category)
        {
            $data = MicrobiologyCategory::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($category == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }
    if(!function_exists('getMicrobiologyParameter')) {
        function getMicrobiologyParameter($category)
        {
            $data = MicrobiologyParameter::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($category == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getBloodDonor')) {
        function getBloodDonor($donor)
        {
            $data = BloodDonor::where('donate_status', '0')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($donor == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getOperationName')) {
        function getOperationName($patient_id,$id)
        {
            $data = PatientOperation::where('patient_id',$patient_id)->with('operation')->get();
            foreach($data as $val) {
                if ($id == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->operation->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->operation->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getCategoryOperation')) {
        function getCategoryOperation($category_id,$id)
        {
            $data = Operation::where('category_id',$category_id)->get();
            foreach($data as $val) {
                if ($id == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }


    if(!function_exists('getBiochemistryTest')) {
        function getBiochemistryTest($test)
        {
            $data = BiochemistryTest::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($test == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }
    if(!function_exists('getMicrobiologyTest')) {
        function getMicrobiologyTest($test)
        {
            $data = MicrobiologyTest::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($test == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getAmbulance')) {
        function getAmbulance($ambulance)
        {
            $data = Ambulance::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($ambulance == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->vehicle_number . " (". $val->vehicle_model .")</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->vehicle_number . " (". $val->vehicle_model .")</option>";
                }
            }
        }
    }

    if(!function_exists('getPackage')) {
        function getPackage($package)
        {
            $data = Package::where('status', 'Active')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($package == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . " (" . env('CURRENCY_SYMBOL') . $val->package_cost . ")</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . " (" . env('CURRENCY_SYMBOL') . $val->package_cost . ")</option>";
                }
            }
        }
    }

    if(!function_exists('getService')) {
        function getService($service)
        {
            $data = Service::where('status', 'Active')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($service == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getMedicineCategory')) {
        function getMedicineCategory($category)
        {
            $data = MedicineCategory::where('status', 'Active')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($category == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getSlot')) {
        function getSlot($slot)
        {
            $data = Slot::where('status', 'Active')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($slot == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getMedicineCategoryDetails')) {
        function getMedicineCategoryDetails($category)
        {
            $data = MedicineCategory::find($category);
            echo "<input type='text' class='form-control' value='" . $data->name . "' readonly>";
        }
    }

    if(!function_exists('getMedicineVendor')) {
        function getMedicineVendor($vendor)
        {
            $data = MedicineVendor::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($vendor == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getDepartment')) {
        function getDepartment($department)
        {
            $data = Department::where('status', 'Active')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($department == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getDesignation')) {
        function getDesignation($designation)
        {
            $data = Designation::where('status', 'Active')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($designation == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getRoom')) {
        function getRoom($room)
        {
            $data = Room::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($room == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->room_no . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->room_no . "</option>";
                }
            }
        }
    }

    if(!function_exists('getBed')) {
        function getBed($bed)
        {
            $data = Bed::where('status', 'Available')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($bed == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->bed_no . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->bed_no . "</option>";
                }
            }
        }
    }

    if(!function_exists('getDoctor')) {
        function getDoctor($doctor)
        {
            $data = User::whereHas('roles', function($q) { $q->where('name', 'Doctor'); })->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($doctor == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getUnit')) {
        function getUnit($unit)
        {
            $data = Unit::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($unit == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }
    if(!function_exists('getPatient')) {
        function getPatient($patient)
        {
            $data = Patient::where('status', 'Active')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($patient == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->patient_id . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->patient_id . "</option>";
                }
            }
        }
    }
    if(!function_exists('getOPDPatient')) {
        function getOPDPatient($patient)
        {
            $data = OPDPatient::where('status', 'Active')->orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($patient == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->patient_id . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->patient_id . "</option>";
                }
            }
        }
    }

    if(!function_exists('getBedType')) {
        function getBedType($type)
        {
            $data = array(
                'ICU' => 'ICU',
                'General' => 'General'
            );
            foreach($data as $key => $val) {
                if ($type == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }


    if(!function_exists('getOperationcategory')) {
        function getOperationcategory($category)
        {
            $data = OperationCategory::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($category == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getOperation')) {
        function getOperation($operation)
        {
            $data = Operation::orderBy('created_at', 'DESC')->get();
            foreach($data as $val) {
                if ($operation == $val->id) {
                    echo "<option value='" . $val->id . "' selected>" . $val->patient_id . "</option>";
                } else {
                    echo "<option value='" . $val->id . "'>" . $val->patient_id . "</option>";
                }
            }
        }
    }

    if(!function_exists('getEnquiryType')) {
        function getEnquiryType($type)
        {
            $data = array(
                'Enquiry 1' => 'Enquiry 1',
                'Enquiry 2' => 'Enquiry 2'
            );
            foreach($data as $key => $val) {
                if ($type == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getEnquiryStatus')) {
        function getEnquiryStatus($status)
        {
            $data = array(
                'Pending' => 'Pending',
                'Solved' => 'Solved'
            );
            foreach($data as $key => $val) {
                if ($status == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getBedStatus')) {
        function getBedStatus($status)
        {
            $data = array(
                'Available' => 'Available',
                'Booked' => 'Booked'
            );
            foreach($data as $key => $val) {
                if ($status == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getStatus')) {
        function getStatus($status)
        {
            $data = array(
                'Active' => 'Active',
                'Inactive' => 'Inactive'
            );
            foreach($data as $key => $val) {
                if ($status == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getGender')) {
        function getGender($gender)
        {
            $data = array(
                'Male' => 'Male',
                'Female' => 'Female'
            );
            foreach($data as $key => $val) {
                if ($gender == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getBloodGroup')) {
        function getBloodGroup($group)
        {
            $data = BloodGroup::get();
            foreach($data as $val) {
                if ($group == $val->name) {
                    echo "<option value='" . $val->name . "' selected>" . $val->name . "</option>";
                } else {
                    echo "<option value='" . $val->name . "'>" . $val->name . "</option>";
                }
            }
        }
    }

    if(!function_exists('getLanguage')) {
        function getLanguage($language)
        {
            $data = array(
                'English' => 'English',
                'Bengali' => 'Bengali',
                'Hindi' => 'Hindi',
                'Urdu' => 'Urdu'
            );
            foreach($data as $key => $val) {
                if ($language == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getRoomType')) {
        function getRoomType($type)
        {
            $data = array(
                'Normal' => 'Normal',
                'Single' => 'Single'
            );
            foreach($data as $key => $val) {
                if ($type == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getMedicineStatus')) {
        function getMedicineStatus($status)
        {
            $data = array(
                'In Stock' => 'In Stock',
                'Out of Stock' => 'Out of Stock'
            );
            foreach($data as $key => $val) {
                if ($status == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getConsultantName')) {
        function getConsultantName($name)
        {
            $data = array(
                'Name 1' => 'Name 1',
                'Name 2' => 'Name 2'
            );
            foreach($data as $key => $val) {
                if ($name == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getInsuranceName')) {
        function getInsuranceName($name)
        {
            $data = array(
                'Name 1' => 'Name 1',
                'Name 2' => 'Name 2'
            );
            foreach($data as $key => $val) {
                if ($name == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getDays')) {
        function getDays($day)
        {
            $data = array(
                'Sunday' => 'Sunday',
                'Monday' => 'Monday',
                'Tuesday' => 'Tuesday',
                'Wednesday' => 'Wednesday',
                'Thursday' => 'Thursday',
                'Friday' => 'Friday',
                'Saturday' => 'Saturday',
            );
            foreach($data as $key => $val) {
                if ($day == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getCaseManager')) {
        function getCaseManager($manager)
        {
            $data = array(
                'Manager 1' => 'Manager 1',
                'Manager 2' => 'Manager 2'
            );
            foreach($data as $key => $val) {
                if ($manager == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getPaymentMethod')) {
        function getPaymentMethod($method)
        {
            $data = array(
                'Cash' => 'Cash',
                'Online' => 'Online'
            );
            foreach($data as $key => $val) {
                if ($method == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getPaymentStatus')) {
        function getPaymentStatus($status)
        {
            $data = array(
                'Paid' => 'Paid',
                'Unpaid' => 'Unpaid'
            );
            foreach($data as $key => $val) {
                if ($status == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getVehicleType')) {
        function getVehicleType($type)
        {
            $data = array(
                'Owned' => 'Owned',
                'Contractual' => 'Contractual'
            );
            foreach($data as $key => $val) {
                if ($type == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getBloodUnitType')) {
        function getBloodUnitType($type)
        {
            $data = array(
                'ML' => 'ML',
                'Litter' => 'Litter'
            );
            foreach($data as $key => $val) {
                if ($type == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getTestUnit')) {
        function getTestUnit($type)
        {
            $data = array(
                'Micrometer (oi)' => 'Micrometer (oi)',
                'mmol/L' => 'mmol/L',
                'Dalton (Da)' => 'Dalton (Da)',
                'Nanometer' => 'Nanometer',
                'million/mm3' => 'million/mm3',
                '(U/L)' => '(U/L)'
            );
            foreach($data as $key => $val) {
                if ($type == $key) {
                    echo "<option value='" . $key . "' selected>" . $val . "</option>";
                } else {
                    echo "<option value='" . $key . "'>" . $val . "</option>";
                }
            }
        }
    }

    if(!function_exists('getDateFormat')) {
        function getDateFormat($date)
        {
            return date('d.m.Y', strtotime($date));
        }
    }

?>
