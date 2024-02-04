<!doctype html>
<html lang="en">
<head>        
    <meta charset="utf-8" />
    <title>{{ config('app.name') }} | Login</title>    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">     
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.3') }}">
    <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.2.3') }}">  
</head>   
<body class="nk-body ui-rounder npc-general ui-light pg-auth">
    <div class="nk-app-root">
        <div class="nk-main ">
            <div class="nk-wrap nk-wrap-nosidebar">
                <div class="nk-content ">
                    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
                        <div class="brand-logo pb-4 text-center">
                            <a href="{{ url('login') }}" class="logo-link">  
                                <img class="logo-light logo-img logo-img-lg" src="{{ asset('assets/images/logo.png') }}" alt="logo">
                                <img class="logo-dark logo-img logo-img-lg" src="{{ asset('assets/images/logo.png') }}" alt="logo-dark"> 
                            </a>
                        </div>    
                        <div class="card">
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">Sign In</h4> 
                                        <div class="nk-block-des"> 
                                            <p>Access the {{ config('app.name') }} panel using your email and password.</p> 
                                        </div>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">  
                                @csrf    
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label">Email</label>
                                        </div>  
                                        <div class="form-control-wrap">
                                            <input type="email" class="form-control form-control-lg" name="email" placeholder="Enter your email address" required>
                                        </div> 
                                    </div> 
                                    <div class="form-group">
                                        <div class="form-label-group">
                                            <label class="form-label">Password</label>
                                            <a class="link link-primary link-sm" href="{{ route('password.request') }}">Forgot Password?</a>
                                        </div>    
                                        <div class="form-control-wrap">
                                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                            </a>
                                            <input type="password" class="form-control form-control-lg" name="password" id="password" placeholder="Enter your password" required>
                                        </div>     
                                    </div>
                                    <div class="form-check mb-3">  
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> 
                                        <label class="form-check-label" for="remember-check">Remember me</label> 
                                    </div>     
                                    <div class="form-group">
                                        <button class="btn btn-lg btn-primary btn-block">Sign In</button>
                                    </div>   
                                </form>                                   
                            </div>
                        </div>
                    </div>
                    <div class="nk-footer nk-auth-footer-full">
                        <div class="container wide-lg">
                            <div class="row g-3">                                 
                                <div class="col-lg-12">    
                                    <div class="nk-block-content text-center text-lg-left">
                                        <p class="text-soft">&copy; 2023 {{ config('app.name') }}. All Rights Reserved.</p>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>      
    <script src="{{ asset('assets/js/bundle.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('assets/js/scripts.js?ver=3.2.3') }}"></script>
    <script src="{{ asset('assets/js/demo-settings.js?ver=3.2.3') }}"></script>   
</body>    
</html>  










        