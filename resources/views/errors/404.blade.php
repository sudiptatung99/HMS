<!DOCTYPE html>
<html lang="en"> 
<head>
  <meta charset="UTF-8">
  <title>{{ config('app.name') }} | 404</title> 
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">     
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.3') }}">
  <link id="skin-default" rel="stylesheet" href="{{ asset('assets/css/theme.css?ver=3.2.3') }}">  
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/libs/bootstrap-icons.css') }}">      
</head>
<body class="nk-body ui-rounder npc-general ui-light pg-error"> 
  <div class="nk-app-root">  
    <div class="nk-main ">
      <div class="nk-wrap nk-wrap-nosidebar">
        <div class="nk-content ">
          <div class="nk-block nk-block-middle wide-xs mx-auto">
            <div class="nk-block-content nk-error-ld text-center">
              <h1 class="nk-error-head">404</h1>
              <h3 class="nk-error-title">Oops! Why you’re here?</h3>
              <p class="nk-error-text">We are very sorry for inconvenience. It looks like you’re try to access a page that either has been deleted or never existed.</p>
              <a href="{{ route('login') }}" class="btn btn-lg btn-primary mt-2">Back To Home</a>
            </div>  
          </div>   
        </div> 
      </div> 
    </div>
  </div>
</body> 
</html>  