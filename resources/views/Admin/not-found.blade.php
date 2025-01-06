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
        <div class="navbar-translate n_logo">
            <a class="navbar-brand" href="javascript:void(0);" title="" target="_blank">Ortho</a>
           
        </div>
       
    </div>
</nav>
<!-- End Navbar -->
<div class="page-header">
    <div class="page-header-image" style="background-image:url({{ asset('Assets/Dashboard/assets/images/login.jpg') }})"></div>
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="card-plain">
                <form class="form" method="" action="#">
                    <div class="header">
                        <div class="logo-container">
                        </div>
                        <h5>Error 404</h5>
                        <span>Page not found</span>
                    </div>
                  
                    <div class="footer text-center">
                        <a href="{{ route('Admin.dashboard') }}" class="btn btn-primary btn-round btn-block  waves-effect waves-light">GO TO HOMEPAGE</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
   
</div>

<!-- Jquery Core Js -->
<script src="{{ asset('Assets/Dashboard/assets/bundles/libscripts.bundle.js') }}"></script>
<script src="{{ asset('Assets/Dashboard/assets/bundles/vendorscripts.bundle.js') }}"></script> 
<script>
   $(".navbar-toggler").on('click',function() {
    $("html").toggleClass("nav-open");
});
</script>
</body>

<!-- Mirrored from wrraptheme.com/templates/oreo/hospital/html/light/404.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Dec 2024 04:00:50 GMT -->
</html>