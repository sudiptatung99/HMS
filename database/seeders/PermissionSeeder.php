<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;  

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                'group_name' => 'Department',
                'permissions' => [
                    'Create Department',
                    'Department List', 
                    'Update Department', 
                    'Delete Department'   
                ]     
            ],
            [
                'group_name' => 'Designation',
                'permissions' => [
                    'Create Designation',
                    'Designation List', 
                    'Update Designation', 
                    'Delete Designation' 
                ]  
            ],
            [
                'group_name' => 'Doctor',
                'permissions' => [
                    'Create Doctor',
                    'Doctor List',    
                    'Doctor View',      
                    'Update Doctor', 
                    'Delete Doctor'   
                ]  
            ],
            [
                'group_name' => 'Nurse',
                'permissions' => [
                    'Create Nurse',
                    'Nurse List',    
                    'Nurse View',    
                    'Update Nurse',  
                    'Delete Nurse'    
                ]   
            ],
            [
                'group_name' => 'Patient',
                'permissions' => [
                    'Create Patient',
                    'Patient List',   
                    'Patient View',   
                    'Update Patient', 
                    'Delete Patient',
                    'View Patient Package',  
                    'Add Patient Package',   
                    'Create Additional Services',
                    'Additional Services List', 
                    'Update Additional Services', 
                    'Delete Additional Services',                     
                    'Create Patient Document',  
                    'Patient Document List', 
                    'Update Patient Document', 
                    'Delete Patient Document'    
                ]   
            ],
            [
                'group_name' => 'Time Slot',
                'permissions' => [
                    'Create Time Slot',
                    'Time Slot List', 
                    'Update Time Slot',
                    'Delete Time Slot',
                    'Create Schedule',
                    'Schedule List', 
                    'Update Schedule',   
                    'Delete Schedule'   
                ]  
            ], 
            [
                'group_name' => 'Appoinment',
                'permissions' => [
                    'Create Appoinment',
                    'Appoinment List', 
                    'Update Appoinment', 
                    'Delete Appoinment',  
                    'Appoinment Assign to Me',  
                    'Appoinment Assign by Me'    
                ]      
            ], 
            [
                'group_name' => 'Pharmacy',
                'permissions' => [ 
                    'Pharmacy Dashboard',   
                    'Create Invoice',   
                    'Invoice List', 
                    'Invoice View', 
                    'Update Invoice',  
                    'Delete Invoice',  
                    'Create Medicine Category',  
                    'Medicine Category List', 
                    'Update Medicine Category', 
                    'Delete Medicine Category', 
                    'Create Medicine Vendor', 
                    'Medicine Vendor List', 
                    'Update Medicine Vendor', 
                    'Delete Medicine Vendor', 
                    'Create Medicine', 
                    'Medicine List', 
                    'Medicine View',  
                    'Update Medicine', 
                    'Delete Medicine', 
                    'Create Medicine Purchase', 
                    'Medicine Purchase List', 
                    'Medicine Purchase View',  
                    'Update Medicine Purchase',
                    'Delete Medicine Purchase'
                ]  
            ],
            [
                'group_name' => 'Prescription',
                'permissions' => [
                    'Create Patient Case Study', 
                    'Patient Case Study List', 
                    'Patient Case Study View',  
                    'Update Patient Case Study',
                    'Delete Patient Case Study',
                    'Create Prescription',
                    'Prescription List', 
                    'Prescription View', 
                    'Update Prescription',  
                    'Delete Prescription'  
                ]  
            ],
            [
                'group_name' => 'Billing',
                'permissions' => [
                    'Create Service',
                    'Service List', 
                    'Update Service',
                    'Delete Service',
                    'Create Package', 
                    'Package List',  
                    'Package View',  
                    'Update Package',  
                    'Delete Package',   
                    'Create Advance Payment',
                    'Advance Payment List', 
                    'Update Advance Payment',
                    'Delete Advance Payment',
                    'Create Bill',
                    'Bill List', 
                    'Bill View', 
                    'Update Bill',   
                    'Delete Bill',    
                    'Complete Bill List'     
                ]   
            ],
            [
                'group_name' => 'Insurance',
                'permissions' => [
                    'Create Insurance',
                    'Insurance List', 
                    'Insurance View', 
                    'Update Insurance',  
                    'Delete Insurance'  
                ]  
            ],
            [
                'group_name' => 'Expense', 
                'permissions' => [
                    'Create Expense',
                    'Expense List',  
                    'Update Expense',  
                    'Delete Expense'    
                ]  
            ], 
            [
                'group_name' => 'Bed Management',
                'permissions' => [
                    'Create Room', 
                    'Room List', 
                    'Update Room',
                    'Delete Room',
                    'Create Bed',
                    'Bed List', 
                    'Update Bed',
                    'Delete Bed', 
                    'Create Bed Assign',
                    'Bed Assign List', 
                    'Update Bed Assign', 
                    'Delete Bed Assign', 
                    'Bed Report'  
                ]   
            ],
            [
                'group_name' => 'Case Manager',
                'permissions' => [
                    'Create Patient Case',
                    'Patient Case List', 
                    'Update Patient Case', 
                    'Delete Patient Case' 
                ]  
            ],
            [
                'group_name' => 'Hospital Activities',
                'permissions' => [
                    'Create Birth Report', 
                    'Birth Report List', 
                    'Update Birth Report',
                    'Delete Birth Report',
                    'Create Death Report',
                    'Death Report List', 
                    'Update Death Report',
                    'Delete Death Report',
                    'Create Operation Report',
                    'Operation Report List', 
                    'Operation Report View',  
                    'Update Operation Report', 
                    'Delete Operation Report',  
                    'Create Investigation Report',
                    'Investigation Report List', 
                    'Update Investigation Report',  
                    'Delete Investigation Report'  
                ]  
            ],
            [  
                'group_name' => 'Enquiry',
                'permissions' => [
                    'Create Enquiry',
                    'Enquiry List', 
                    'Update Enquiry', 
                    'Delete Enquiry' 
                ]  
            ],
            [
                'group_name' => 'Ambulance',
                'permissions' => [
                    'Create Ambulance',
                    'Ambulance List',  
                    'Update Ambulance',
                    'Delete Ambulance',
                    'Create Call Ambulance',
                    'Call Ambulance List', 
                    'Call Ambulance View', 
                    'Update Call Ambulance', 
                    'Delete Call Ambulance' 
                ]  
            ],
            [
                'group_name' => 'Blood Bank',
                'permissions' => [
                    'Blood Bank', 
                    'Create Blood Bag',
                    'Update Blood Bag', 
                    'Delete Blood Bag',  
                    'Create Blood Donor', 
                    'Blood Donor List', 
                    'Update Blood Donor',
                    'Delete Blood Donor', 
                    'Create Blood Issue',
                    'Blood Issue List', 
                    'Blood Issue View', 
                    'Update Blood Issue', 
                    'Delete Blood Issue'   
                ]  
            ],
            [
                'group_name' => 'Pathology Report', 
                'permissions' => [ 
                    'Create Pathology Bill',
                    'Pathology Bill List', 
                    'Pathology Bill View', 
                    'Update Pathology Bill',
                    'Delete Pathology Bill',
                    'Create Pathology Test',
                    'Pathology Test List', 
                    'Pathology Test View', 
                    'Update Pathology Test',
                    'Delete Pathology Test',
                    'Create Pathology Category',
                    'Pathology Category List', 
                    'Update Pathology Category',
                    'Delete Pathology Category',
                    'Create Pathology Parameter',
                    'Pathology Parameter List', 
                    'Update Pathology Parameter', 
                    'Delete Pathology Parameter'  
                ]  
            ],
            [
                'group_name' => 'Radiology Report', 
                'permissions' => [  
                    'Create Radiology Bill',
                    'Radiology Bill List', 
                    'Radiology Bill View', 
                    'Update Radiology Bill',
                    'Delete Radiology Bill',
                    'Create Radiology Test',
                    'Radiology Test List', 
                    'Radiology Test View', 
                    'Update Radiology Test',
                    'Delete Radiology Test',
                    'Create Radiology Category',
                    'Radiology Category List', 
                    'Update Radiology Category',
                    'Delete Radiology Category',
                    'Create Radiology Parameter',
                    'Radiology Parameter List', 
                    'Update Radiology Parameter', 
                    'Delete Radiology Parameter'  
                ]  
            ],  
            [  
                'group_name' => 'Roles Management',
                'permissions' => [
                    'Create Role',
                    'Role List', 
                    'Update Role',
                    'Delete Role',
                    'Create User Role',
                    'User Role List', 
                    'Update User Role',  
                    'Delete User Role'   
                ]     
            ]
        ];
        for($i = 0; $i < count($permissions); $i++)   
        {
            $permission_group = $permissions[$i]['group_name'];
            for($j = 0; $j < count($permissions[$i]['permissions']); $j++) 
            {
                $permission_name = $permissions[$i]['permissions'][$j];
                $permission = Permission::create([
                    'name' => $permission_name,
                    'slug' => Str::slug($permission_name),
                    'group_name' => $permission_group
                ]);
                DB::table('roles_permissions')->insert(
                    ['role_id' => 1, 'permission_id' => $permission->id] 
                );  
            }
        }  
    }
}