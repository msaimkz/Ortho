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
    <style>
        .loading-container {

            width: 100vw;
            height: 100vh;
            background-color: #ffffffa2;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 1s ease-in;

        }

        .loader-two {
            width: 20px;
            aspect-ratio: 1;
            position: relative;
            animation: l9-0 1.5s infinite steps(2);

        }

        .loader-two::before,
        .loader-two::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: #2EA6F7;
            color: #2EA6F7;
        }

        .loader-two::before {
            box-shadow: 26px 0;
            transform: translateX(-26px);
            animation: l9-1 .75s infinite linear alternate;
        }

        .loader-two::after {
            transform: translateX(13px) rotate(0deg) translateX(13px);
            animation: l9-2 .75s infinite linear alternate;
        }

        @keyframes l9-0 {

            0%,
            49.9% {
                transform: scale(1)
            }

            50%,
            100% {
                transform: scale(-1)
            }
        }

        @keyframes l9-1 {
            100% {
                box-shadow: 52px 0
            }
        }

        @keyframes l9-2 {
            100% {
                transform: translateX(13px) rotate(-180deg) translateX(13px)
            }
        }

        .hidden-loading-container {
            display: none;
        }
    </style>
</head>

<body class="theme-cyan">
    <div class="loading-container hidden-loading-container" id="response-loader">
        <div class="loader-two"></div>
    </div>
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
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user">Patient</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane stretchRight active" id="dashboard">
                <div class="menu">
                    <ul class="list">
                        <li>
                            <div class="user-info">
                                <div class="image"><a href="{{ route('User.dashboard.profile') }}">
                                        @if (isset(Auth::user()->profile_photo_path) &&
                                                file_exists(public_path('Uploads/Patient/Profile/' . Auth::user()->profile_photo_path)))
                                            <img src="{{ asset('Uploads/Patient/Profile/' . Auth::user()->profile_photo_path) }}"
                                                class="Profile-Image" alt="">
                                        @else
                                            <img src="{{ asset('Assets/Dashboard/assets/images/profile_av.jpg') }}"
                                                class="Profile-Image" alt="">
                                        @endif
                                    </a></div>
                                <div class="detail">
                                    <h4> <span class="username">{{ ucwords(Auth::user()->name) }}</span></h4>
                                    <small><a href="{{ route('User.index') }}">Back</a></small>
                                </div>
                            </div>
                        </li>
                        <li class="header">MAIN</li>
                        <li class="active open"><a href="{{ route('User.dashboard.dashboard') }}"><i
                                    class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                        <li><a href="{{ route('User.dashboard.appoinment') }}"><i
                                    class="zmdi zmdi-calendar-check"></i><span>Appointment</span> </a></li>
                        <li><a href="{{ route('User.dashboard.DoctorRequest') }}"><i
                                    class="zmdi zmdi-folder"></i><span>Doctor Request</span></a>
                        </li>
                        <li><a href="{{ route('User.dashboard.FavouriteDoctor') }}"><i
                                    class="zmdi zmdi-account-add"></i><span>Favourite Doctors</span></a>
                        </li>
                        <li><a href="{{ route('User.dashboard.FavouriteCourse') }}"><i
                            class="zmdi zmdi-book"></i><span>Favourite Courses</span></a>
                </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane stretchLeft" id="user">
                <div class="menu">
                    <ul class="list">
                        <li>
                            <div class="user-info m-b-20 p-b-15">
                                <div class="image"><a href="{{ route('User.dashboard.profile') }}">
                                        @if (isset(Auth::user()->profile_photo_path) &&
                                                file_exists(public_path('Uploads/Patient/Profile/' . Auth::user()->profile_photo_path)))
                                            <img src="{{ asset('Uploads/Patient/Profile/' . Auth::user()->profile_photo_path) }}"
                                                class="Profile-Image" alt="">
                                        @else
                                            <img src="{{ asset('Assets/Dashboard/assets/images/profile_av.jpg') }}"
                                                class="Profile-Image" alt="">
                                        @endif

                                    </a></div>
                                <div class="detail">
                                    <h4><span class="username">{{ ucwords(Auth::user()->name) }}</span></h4>

                                </div>

                            </div>
                        </li>
                        <li>

                            <small class="text-muted">Email address: </small>
                            <p class="useremail">{{ Auth::user()->email }}</p>
                            <hr>
                            <small class="text-muted">Phone: </small>
                            <p class="userphone">{{ Auth::user()->phone }}</p>
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
