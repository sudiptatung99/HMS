<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
 
class RolePermissionController extends Controller
{
    public function roles()
    {
        $role_permission = Role::whereNot('slug', 'user')->get();
        $all_permissions = Permission::all();
        return view('role.role_list', compact('all_permissions', 'role_permission'));
    }

    public function roleUpdate($id)
    {
        $id = decrypt($id);
        $role = Role::with('permissions')->find($id);
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('role.role_update', compact('role', 'all_permissions', 'permission_groups'));
    }

    public function roleUpdateSubmit(Request $request, $id)
    {
        $id = decrypt($id);
        $role = Role::find($id);
        if (!empty($request->permissions)) {
            $role->slug = strtolower($request->name);
            $role->name = $request->name;
            $role->save();
            DB::table('roles_permissions')
                ->where('role_id', $id)
                ->delete();
            foreach ($request->permissions as $key => $value) {
                DB::table('roles_permissions')->insert(
                    [
                        'role_id' => $id,
                        'permission_id' => $value
                    ]
                );
            }
        }
        toastr()->success('Role updated successfully.');
        return redirect('roles');
    }

    public function roleCreate()
    {
        $roles = Role::all();
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('role.role_create', compact('all_permissions', 'permission_groups'));
    }

    public function roleCreateSubmit(Request $request)
    {
        try {
            DB::beginTransaction();
            $this->validate($request, [
                'name' => 'required|max:100|unique:roles',
                'permissions' => 'required',
            ]);
            $role = new Role();
            $role->slug = strtolower($request->name);
            $role->name = $request->name;
            $role->save();
            $role_id = $role->id;
            foreach ($request->permissions as $key => $value) {
                DB::table('roles_permissions')->insert(
                    [
                        'role_id' => $role_id,
                        'permission_id' => $value
                    ]
                );
            }
            DB::commit();
            toastr()->success('Role created successfully.');
            return redirect('roles');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function userRoles()
    {
        $admin_details = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', '!=', 'user');
            }
        )->get();
        return view('role.user_role_list', compact('admin_details'));
    }

    public function userRoleUpdate($id)
    {
        $id = decrypt($id);
        $usr = Auth::user();
        $roles = Role::all();
        $admin_details = User::whereHas(
            'roles',
            function ($q) {
                $q->where('name', '!=', 'user');
            }
        )->where('id', $id)->first();
        return view('role.user_role_update', compact('roles', 'admin_details'));
    }

    public function userRoleUpdateSubmit(Request $request, $id)
    {
        $id = decrypt($id);
        $exist_user = User::where('email', $request->email)->first(); 
        if($exist_user && $exist_user->id != $id)    
        {  
            toastr()->error('This User Role already exist !');     
            return redirect()->back();      
        } 
        try {
            DB::beginTransaction();
            $user = User::find($id);
            $password = $user->password;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $password;
            $user->save();
            $user_role = $request->user_role;
            $user->roles()->detach();
            if ($request->user_role) {
                $user->roles()->attach($user_role);
            }
            DB::commit();
            toastr()->success('User Role updated successfully.');
            return redirect('user-roles');
        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
        }
    }

    public function userRoleCreate()
    {
        $roles = Role::whereNot('slug', 'user')->get();
        return view('role.user_role_create', compact('roles'));
    }

    public function userRoleCreateSubmit(Request $request)
    {
        $exist_user = User::where('email', $request->email)->first(); 
        if($exist_user)
        {
            toastr()->error('This User Role already created !');    
            return redirect()->back();     
        } else {
            try {
                DB::beginTransaction();
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                $user_role = $request->user_role;
                $user->roles()->attach($user_role);
                DB::commit();
                toastr()->success('User Role created successfully.'); 
                return redirect('user-roles'); 
            } catch (\Exception $e) {
                DB::rollBack();
                return $e->getMessage();
            }
        } 
    }

    public function userRoleDelete($id)
    {
        $id = decrypt($id);
        $user = User::find($id);  
        $user->delete(); 
        toastr()->success('User Role deleted successfully.');  
        return back();   
    } 
}