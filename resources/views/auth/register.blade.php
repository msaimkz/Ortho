<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from wrraptheme.com/templates/oreo/hospital/html/light/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Dec 2024 04:00:49 GMT -->
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Ortho Hospital :: </title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/authentication.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/color_skins.css') }}">
</head>

<body class="theme-cyan authentication sidebar-collapse">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
    <div class="container">        
       
        <div class="navbar-collapse">
            <ul class="navbar-nav">
                
                
                      
                <li class="nav-item">
                    <a class="nav-link btn btn-white btn-round" href="{{ route('login') }}">SIGN IN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header" style="overflow-y: hidden;">
    <div class="page-header-image" style="background-image:url({{ asset('Assets/Dashboard/assets/images/login.jpg') }})"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="POST" action="{{ route('register') }}">
                    @csrf
                
                    <!-- Header -->
                    <div class="header">
                        <div class="logo-container">
                        </div>
                        <h5>Sign Up</h5>
                    </div>
                
                    <!-- Form Fields -->
                    <div class="content">
                        <!-- Name Field -->
                        <div class="input-group">
                            <input type="text" name="name" class="form-control" placeholder="Enter User Name" value="{{ old('name') }}" required autofocus>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                            <div>
                                @error('name')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                           
                        </div>
                
                        <!-- Email Field -->
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}" required>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-email"></i>
                            </span>
                            <div>
                                @error('email')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                           
                        </div>
                
                        <!-- Phone Field -->
                        <div class="input-group">
                            <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" value="{{ old('phone') }}" required>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-phone"></i>
                            </span>
                            <div>
                                @error('phone')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                           
                        </div>
                
                        <!-- City Field -->
                        <div class="input-group">
                            <input type="text" name="city" class="form-control" placeholder="Enter City" value="{{ old('city') }}" required>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-city"></i>
                            </span>
                            <div>
                                @error('city')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            
                        </div>
                
                        <!-- Password Field -->
                        <div class="input-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                            <div>
                                @error('password')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            
                        </div>
                
                        <!-- Confirm Password Field -->
                        <div class="input-group">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                            <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                            <div>
                                @error('password_confirmation')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                           
                        </div>
                    </div>
                
                    <!-- Terms and Conditions -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="checkbox">
                            <input id="terms" type="checkbox" name="terms" required>
                            <label for="terms">
                                I read and agree to the
                                <a href="{{ route('terms.show') }}">terms of usage</a> and
                                <a href="{{ route('policy.show') }}">privacy policy</a>.
                            </label>
                        </div>
                    @endif
                
                    <!-- Submit Button -->
                    <div class="footer text-center">
                        <button type="submit" class="btn btn-primary btn-round btn-block waves-effect waves-light">SIGN UP</button>
                    </div>
                
                    <!-- Login Link -->
                    <div class="text-center mt-3">
                        <h5><a class="link" href="{{ route('login') }}">You already have a membership?</a></h5>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
   
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
</script>
</body>

<!-- Mirrored from wrraptheme.com/templates/oreo/hospital/html/light/sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Dec 2024 04:00:49 GMT -->
</html>