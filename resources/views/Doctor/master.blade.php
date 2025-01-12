<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from wrraptheme.com/templates/oreo/hospital/html/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Dec 2024 03:59:15 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    <title>:: Ortho Hospital :: Dashboard</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('Assets/Dashboard/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/morrisjs/morris.min.css') }}" />

    @yield('css')
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/color_skins.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin"
                    src="https://wrraptheme.com/templates/oreo/hospital/html/assets/images/logo.svg" width="48"
                    height="48" alt="Oreo"></div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- Top Bar -->
    <nav class="navbar p-l-5 p-r-5">
        <ul class="nav navbar-nav navbar-left">
            <li>
                <div class="navbar-header">
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="index.html"><img
                            src="https://wrraptheme.com/templates/oreo/hospital/html/assets/images/logo.svg"
                            width="30" alt="Oreo"><span class="m-l-10">Ortho</span></a>
                </div>
            </li>
            <li><a href="javascript:void(0);" class="ls-toggle-btn" data-close="true"><i class="zmdi zmdi-swap"></i></a>
            </li>
            <li class="float-right">
                <form action="{{ route('logout') }}" method="post" id="logout-form">
                    @csrf
                </form>
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="mega-menu" data-close="true"><i class="zmdi zmdi-power"></i></a>

            </li>




        </ul>
    </nav>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#dashboard"><i
                        class="zmdi zmdi-home m-r-5"></i>Ortho</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user">Doctor</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane stretchRight active" id="dashboard">
                <div class="menu">
                    <ul class="list">
                        <li>
                            <div class="user-info">
                                <div class="image"><a href="{{ route('doctor.profile') }}">

                                        @if (isset( Auth::user()->profile_photo_path) && file_exists(public_path('Uploads/Doctor/Profile/'.Auth::user()->profile_photo_path)))
                                            <img class="Profile-Image" src="{{ asset('Uploads/Doctor/Profile/'.Auth::user()->profile_photo_path) }}"
                                                alt="profile-image">
                                        @else
                                            <img class="Profile-Image" src="{{ asset('Assets/Dashboard/assets/images/doctors/member1.png') }}"
                                                alt="profile-image">
                                        @endif
                                    </a></div>
                                <div class="detail">
                                    <h4>Dr. <span class="doctorname">{{ ucwords(Auth::user()->name) }}</span></h4>
                                    <small>Doctor</small>
                                </div>
                            </div>
                        </li>
                        <li class="header">MAIN</li>
                        <li class="active open"><a href="{{ route('doctor.dashboard') }}"><i
                                    class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>

                        <li><a href="{{ route('doctor.Patients') }}"><i
                                    class="zmdi zmdi-account-add"></i><span>Patients</span> </a></li>
                        <li><a href="{{ route('doctor.Appointments') }}"><i
                                    class="zmdi zmdi-calendar-check"></i><span>Appointments</span> </a></li>


                        <li><a href="javascript:void(0);" class="menu-toggle"><i
                                    class="zmdi zmdi-calendar-check"></i><span>Schedules</span> </a>
                            <ul class="ml-menu">
                                <li><a href="{{ route('doctor.schedules') }}">All Schedules</a></li>
                                <li><a href="{{ route('doctor.schedules.create') }}">Add Schedule</a></li>

                            </ul>
                        </li>



                    </ul>
                </div>
            </div>
            <div class="tab-pane stretchLeft" id="user">
                <div class="menu">
                    <ul class="list">
                        <li>
                            <div class="user-info m-b-20 p-b-15">
                                <div class="image"><a href="{{ route('doctor.profile') }}">
                                        @if (isset(Auth::user()->profile_photo_path) && file_exists(public_path('Uploads/Doctor/Profile/'.Auth::user()->profile_photo_path)))
                                            <img class="Profile-Image" src="{{ asset('Uploads/Doctor/Profile/'.Auth::user()->profile_photo_path) }}"
                                                alt="profile-image">
                                        @else
                                            <img class="Profile-Image" src="{{ asset('Assets/Dashboard/assets/images/doctors/member1.png') }}"
                                                alt="profile-image">
                                        @endif
                                    </a></div>
                                <div class="detail">
                                    <h4>Dr. <span class="doctorname">{{ ucwords(Auth::user()->name) }}</span></h4>

                                </div>

                            </div>
                        </li>
                        <li>
                           
                            <small class="text-muted">Email address: </small>
                            <p class="doctoremail">{{ Auth::user()->email }}</p>
                            <hr>
                            <small class="text-muted">Phone: </small>
                            <p class="doctorphone">{{ Auth::user()->phone }}</p>
                            <hr>


                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <!-- Right Sidebar -->


    @yield('content')

    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/Dashboard/assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) -->
    <script src="{{ asset('assets/Dashboard/assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- slimscroll, waves Scripts Plugin Js -->

    <script src="{{ asset('assets/Dashboard/assets/bundles/morrisscripts.bundle.js') }}"></script><!-- Morris Plugin Js -->
    <script src="{{ asset('assets/Dashboard/assets/bundles/jvectormap.bundle.js') }}"></script> <!-- JVectorMap Plugin Js -->
    <script src="{{ asset('assets/Dashboard/assets/bundles/knob.bundle.js') }}"></script> <!-- Jquery Knob, Count To, Sparkline Js -->

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')

    <script src="{{ asset('assets/Dashboard/assets/bundles/mainscripts.bundle.js') }}"></script>
    <script src="{{ asset('assets/Dashboard/assets/js/pages/index.js') }}"></script>
</body>

<!-- Mirrored from wrraptheme.com/templates/oreo/hospital/html/light/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Dec 2024 04:00:04 GMT -->

</html>
