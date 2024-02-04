@section('title') {{ 'Password' }} @endsection  
<x-app-layout>
    <div class="container-fluid">         
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Update Password</h3>  
                <div class="nk-block-des text-soft">
                    <p>Ensure your account is using a long, random password to stay secure.</p>  
                </div>    
            </div>  
        </div>        
        <div class="row"> 
            <div class="col-xl-12">
                <div class="card">   
                    <div class="card-body">   
                        <form method="POST" action="{{ route('password.update') }}">      
                        @csrf  
                        @method('put')    
                            <div class="row">                                 
                                <div class="col-12">
                                    <label class="form-label">Current Password</label>   
                                    <input type="password" class="form-control" name="current_password" value="{{ old('current_password') }}">  
                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="text-danger mt-1 mb-0" />
                                </div>    
                                <div class="col-12 mt-3">
                                    <label class="form-label">New Password</label>  
                                    <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="text-danger mt-1  mb-0" /> 
                                </div> 
                                <div class="col-12 mt-3">
                                    <label class="form-label">Confirm Password</label>   
                                    <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="text-danger mt-1  mb-0" />          
                                </div>     
                            </div>         
                            <div class="mt-3"> 
                                <button type="submit" class="btn btn-primary w-md">Update Password</button> 
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>     

 