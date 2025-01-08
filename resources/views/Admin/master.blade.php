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
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#user">Admin</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane stretchRight active" id="dashboard">
                <div class="menu">
                    <ul class="list">
                        <li>
                            <div class="user-info">
                                <div class="image"><a href="{{ route('Admin.profile') }}">
                                        @if (Auth::user()->profile_photo_path != null)
                                            <img src="{{ asset('Uploads/Admin/ProfileImages/' . Auth::user()->profile_photo_path) }}"
                                                alt="User" class="Profile-Image">
                                    </a></div>
                            @else
                                <img src="{{ asset('assets/Dashboard/assets/images/profile_av.jpg') }}" alt="User"
                                    class="Profile-Image"></a>
                            </div>
                            @endif

                            <div class="detail">
                                <h4 class="user-name">{{ Auth::user()->name }}</h4>
                                <small>Admin</small>
                            </div>
                </div>
                </li>
                <li class="header">MAIN</li>
                <li class="active open"><a href="{{ route('Admin.dashboard') }}"><i
                            class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-account-o"></i><span>Doctors</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('Admin.doctor') }}">All Doctors</a></li>
                        <li><a href="{{ route('Admin.doctor.request') }}">All Doctor Request</a></li>

                    </ul>
                </li>
                <li><a href="{{ route('Admin.patients') }}"><i class="zmdi zmdi-account-add"></i><span>Patients</span>
                    </a></li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-balance-wallet
                                    "></i><span>Subscribtion</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('Admin.subscripion') }}">All Subscribtion</a></li>
                        <li><a href="{{ route('Admin.subscripion.create') }}">Add Subscribtion</a></li>
                        <li><a href="{{ route('Admin.subscripion.subscriber') }}">Subscribe Patients</a></li>

                    </ul>
                </li>

                <li class="header">Social Content</li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-book"></i><span>Courses</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('Admin.course') }}">All Courses</a></li>
                        <li><a href="{{ route('Admin.course.create') }}">Add Course</a></li>

                    </ul>
                </li>

                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-blogger"></i><span>Blogs</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('Admin.blog') }}">All Blogs</a></li>
                        <li><a href="{{ route('Admin.blog.create') }}">Add Blogs</a></li>

                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i
                            class="zmdi zmdi-delicious"></i><span>Services</span> </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('Admin.service') }}">All Services</a></li>
                        <li><a href="{{ route('Admin.service.create') }}">Add Services</a></li>

                    </ul>
                </li>
                <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-copy"></i><span>FAQs</span>
                    </a>
                    <ul class="ml-menu">
                        <li><a href="{{ route('Admin.FAQ') }}">All FAQs</a></li>
                        <li><a href="{{ route('Admin.FAQ.create') }}">Add FAQ</a></li>

                    </ul>
                </li>
                <li><a href="{{ route('Admin.contact.index') }}"><i class="zmdi zmdi-email"></i><span>Contact
                            Messages</span> </a></li>

                <li><a href="{{ route('Admin.newsletter') }}"><i class="zmdi zmdi-email"></i><span>Newsletter Emails</span> </a></li>


                </ul>
            </div>
        </div>
        <div class="tab-pane stretchLeft" id="user">
            <div class="menu">
                <ul class="list">
                    <li>
                        <div class="user-info m-b-20 p-b-15">
                            <div class="image">
                                <a href="{{ route('Admin.profile') }}">
                                    @if (Auth::user()->profile_photo_path != null)
                                        <img src="{{ asset('Uploads/Admin/ProfileImages/' . Auth::user()->profile_photo_path) }}"
                                            alt="User" class="Profile-Image">
                                    @else
                                        <img src="{{ asset('assets/Dashboard/assets/images/profile_av.jpg') }}"
                                            alt="User" class="Profile-Image">
                                    @endif
                                </a>
                            </div>
                            <div class="detail">
                                <h4 class="user-name">{{ Auth::user()->name }}</h4>

                            </div>

                        </div>
                    </li>
                    <li>
                        @if (!empty($profile->address))
                            <small class="text-muted">Location: </small>
                            <p class="user-location">{{ $profile->address }}</p>
                            <hr>
                        @endif

                        <small class="text-muted">Email address: </small>
                        <p>{{ Auth::user()->email }}</p>
                        <hr>
                        <small class="text-muted">Phone: </small>
                        <p>{{ Auth::user()->phone }}</p>
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





    <script src="{{ asset('assets/Dashboard/assets/bundles/mainscripts.bundle.js') }}"></script>

    <script src="{{ asset('assets/Dashboard/assets/js/pages/index.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @yield('js')


</body>


</html>
