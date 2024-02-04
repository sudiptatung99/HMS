@section('title') {{ 'Role Update' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Role</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update Role</p>    
                </div>    
            </div> 
            <a href="{{ route('roles') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card"> 
                    <div class="card-body mt-3">
                        <form action="{{ route('role.update', encrypt($role->id)) }}" method="POST">     
                        @csrf
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Role Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" value="{{ $role->name }}" name="name" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Permissions <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1"
                                        {{ App\Models\User::getAllCheckPermission($role, $all_permissions) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkPermissionAll">All</label>
                                    </div>
                                    <hr>
                                    @php $i = 1; @endphp 
                                    @foreach($permission_groups as $group)
                                        <div class="row">
                                            @php
                                                $permissions = App\Models\User::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp 
                                            <div class="col-3">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="{{ $i }}Management"
                                                        value="{{ $group->name }}"
                                                        onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"
                                                        {{ App\Models\User::getAllCheckPermissionGroup($role, $group->name) ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                                </div>
                                            </div> 
                                            <div class="col-9 role-{{ $i }}-management-checkbox"> 
                                                @foreach ($permissions as $permission)
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input"
                                                            onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})"
                                                            name="permissions[]"
                                                            {{ $role->permissions->pluck('id')->contains($permission->id) ? 'checked' : '' }}
                                                            id="checkPermission{{ $permission->id }}" value="{{ $permission->id }}">
                                                        <label class="form-check-label"
                                                            for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                    </div>
                                                    @php  $j++; @endphp
                                                @endforeach
                                                <br>
                                            </div> 
                                        </div>
                                        @php  $i++; @endphp
                                    @endforeach 
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
@include('role.role_script_js')   