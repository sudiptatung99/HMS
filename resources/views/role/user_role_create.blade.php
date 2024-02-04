@section('title') {{ 'User Role Create' }} @endsection
<x-app-layout>
    <div class="container-fluid">
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">User Role</h3>  
                <div class="nk-block-des text-soft">
                    <p>Create User Role</p>   
                </div>    
            </div> 
            <a href="{{ route('user.roles') }}" class="btn btn-white btn-outline-light">  
                <em class="icon ni ni-list"></em><span>List</span> 
            </a>  
        </div>      
        <div class="row">
            <div class="col-xl-12">
                <div class="card">  
                    <div class="card-body mt-3"> 
                        <form action="{{ route('user.role.create') }}" method="POST">      
                        @csrf 
                            <div class="row mb-4"> 
                                <label class="col-sm-2 col-form-label">Assign Role <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <select class="form-select js-select2" data-search="on" name="user_role" required> 
                                        <option value="" selected disabled></option> 
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach 
                                    </select>  
                                </div> 
                            </div> 
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Name <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Email <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                            </div>  
                            <div class="row mb-4">
                                <label class="col-sm-2 col-form-label">Password <i class="text-danger">*</i></label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" name="password" required> 
                                </div>
                            </div>   
                            <div class="row mb-4">
                                <label class="col-md-2 col-form-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" class="btn btn-primary">Submit</button>  
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>    