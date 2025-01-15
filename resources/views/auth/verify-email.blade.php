
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
    <div class="page-header">
        <div class="page-header-image"
            style="background-image:url({{ asset('Assets/Dashboard/assets/images/login.jpg') }})"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">

                    <div class="header">

                        <h5>Account Verification</h5>
                        <p>Before continuing, could you verify your email address by clicking on the link we just
                            emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
                    </div>
                    <div class="footer text-center">
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-round btn-block  ">Resend Verification Email</button>
                        </form>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-round btn-block  ">Logout</button>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery Core Js -->
    <script src="{{ asset('Assets/Dashboard/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('Assets/Dashboard/assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('status') == 'verification-link-sent')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "A new verification link has been sent to the email address you provided in your profile settings."
                });
            });
        </script>
    @endif
    
</body>

<!-- Mirrored from wrraptheme.com/templates/oreo/hospital/html/light/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Dec 2024 04:00:21 GMT -->

</html>
