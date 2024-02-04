@section('title') {{ 'Profile' }} @endsection   
<x-app-layout>
    <div class="container-fluid">         
        <div class="nk-block-between mb-3">  
            <div class="nk-block-head-content">
                <h3 class="nk-block-title page-title">Profile Information</h3>  
                <div class="nk-block-des text-soft">
                    <p>Update your account's profile information and email address.</p>   
                </div>    
            </div>  
        </div>        
        <div class="row"> 
            <div class="col-xl-12">
                <div class="card">   
                    <div class="card-body">   
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>
                        <form method="POST" action="{{ route('profile.update') }}">         
                        @csrf  
                        @method('patch')     
                            <div class="row">                                 
                                <div class="col-12">
                                    <label class="form-label">Name</label>   
                                    <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">   
                                    <x-input-error :messages="$errors->get('name')" class="text-danger mt-1 mb-0" /> 
                                </div>      
                                <div class="col-12 mt-3">
                                    <label class="form-label">Email</label>   
                                    <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}"> 
                                    <x-input-error :messages="$errors->get('email')" class="text-danger mt-1  mb-0" />  
                                </div>        
                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                            {{ __('Your email address is unverified.') }}

                                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                {{ __('Click here to re-send the verification email.') }}
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('A new verification link has been sent to your email address.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif  
                            </div>         
                            <div class="mt-3"> 
                                <button type="submit" class="btn btn-primary w-md">Profile Update</button>    
                            </div> 
                            @if (session('status') === 'profile-updated')
                                <p class="text-success fw-bold mt-2">Profile Saved.</p> 
                            @endif 
                        </form>  
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>     

   