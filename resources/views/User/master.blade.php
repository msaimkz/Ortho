<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- Mirrored from medilo-html.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Dec 2024 11:28:36 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="ThemeServices">
    <!-- Favicon Icon -->
    <link rel="icon" href="{{ asset('Assets/User/assets/img/favicon.png') }}">
    <!-- Site Title -->
    <title>Ortho- Medical & Health</title>
    @yield('css')

    <link rel="stylesheet" href="{{ asset('Assets/User/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/User/assets/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/User/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/User/assets/css/odometer.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/User/assets/css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/User/assets/css/style.css') }}">
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

        }

        .loader {
            width: 20px;
            aspect-ratio: 1;
            position: relative;
            animation: l9-0 1.5s infinite steps(2);

        }

        .loader::before,
        .loader::after {
            content: "";
            position: absolute;
            inset: 0;
            border-radius: 50%;
            background: #2EA6F7;
            color: #2EA6F7;
        }

        .loader::before {
            box-shadow: 26px 0;
            transform: translateX(-26px);
            animation: l9-1 .75s infinite linear alternate;
        }

        .loader::after {
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
        .hidden-loading-container{
            display: none;
        }
    </style>

</head>

<body>
    <div class="loading-container hidden-loading-container" id="response-loader">
        <div class="loader"></div>
    </div>
    <div class="cs_preloader">
        <div class="cs_preloader_in">
            <div class="cs_wave_first">
                <svg enable-background="new 0 0 300.08 300.08" viewBox="0 0 300.08 300.08"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m293.26 184.14h-82.877l-12.692-76.138c-.546-3.287-3.396-5.701-6.718-5.701-.034 0-.061 0-.089 0-3.369.027-6.199 2.523-6.677 5.845l-12.507 87.602-14.874-148.69c-.355-3.43-3.205-6.056-6.643-6.138-.048 0-.096 0-.143 0-3.39 0-6.274 2.489-6.752 5.852l-19.621 137.368h-9.405l-12.221-42.782c-.866-3.028-3.812-5.149-6.8-4.944-3.13.109-5.777 2.332-6.431 5.395l-8.941 42.332h-73.049c-3.771 0-6.82 3.049-6.82 6.82 0 3.778 3.049 6.82 6.82 6.82h78.566c3.219 0 6.002-2.251 6.67-5.408l4.406-20.856 6.09 21.313c.839 2.939 3.526 4.951 6.568 4.951h20.46c3.396 0 6.274-2.489 6.752-5.845l12.508-87.596 14.874 148.683c.355 3.437 3.205 6.056 6.643 6.138h.143c3.39 0 6.274-2.489 6.752-5.845l14.227-99.599 6.397 38.362c.546 3.287 3.396 5.702 6.725 5.702h88.66c3.771 0 6.82-3.049 6.82-6.82-.001-3.772-3.05-6.821-6.821-6.821z">
                    </path>
                </svg>
            </div>
            <div class="cs_wave_second">
                <svg enable-background="new 0 0 300.08 300.08" viewBox="0 0 300.08 300.08"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="m293.26 184.14h-82.877l-12.692-76.138c-.546-3.287-3.396-5.701-6.718-5.701-.034 0-.061 0-.089 0-3.369.027-6.199 2.523-6.677 5.845l-12.507 87.602-14.874-148.69c-.355-3.43-3.205-6.056-6.643-6.138-.048 0-.096 0-.143 0-3.39 0-6.274 2.489-6.752 5.852l-19.621 137.368h-9.405l-12.221-42.782c-.866-3.028-3.812-5.149-6.8-4.944-3.13.109-5.777 2.332-6.431 5.395l-8.941 42.332h-73.049c-3.771 0-6.82 3.049-6.82 6.82 0 3.778 3.049 6.82 6.82 6.82h78.566c3.219 0 6.002-2.251 6.67-5.408l4.406-20.856 6.09 21.313c.839 2.939 3.526 4.951 6.568 4.951h20.46c3.396 0 6.274-2.489 6.752-5.845l12.508-87.596 14.874 148.683c.355 3.437 3.205 6.056 6.643 6.138h.143c3.39 0 6.274-2.489 6.752-5.845l14.227-99.599 6.397 38.362c.546 3.287 3.396 5.702 6.725 5.702h88.66c3.771 0 6.82-3.049 6.82-6.82-.001-3.772-3.05-6.821-6.821-6.821z">
                    </path>
                </svg>
            </div>
        </div>
    </div>
    <!-- Start Header Section -->
    <header class="cs_site_header cs_style_1 cs_primary_color cs_sticky_header cs_white_bg">
        @if (Contact() != null)
            <div class="cs_top_header cs_blue_bg cs_white_color">
                <div class="container">
                    <div class="cs_top_header_in">
                        <div class="cs_top_header_left">
                            <ul class="cs_header_contact_list cs_mp_0">
                                <li>
                                    <i class="fa-solid fa-envelope"></i>
                                    <a href="{{ Contact()->email }}">{{ Contact()->email }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="cs_top_header_right">
                            <div class="cs_social_btns cs_style_1">
                                @if (!empty(Contact()->facebook))
                                    <a href="{{ Contact()->facebook }}" class="cs_center"><i
                                            class="fa-brands fa-facebook-f"></i></a>
                                @endif
                                @if (!empty(Contact()->youtube))
                                    <a href="{{ Contact()->youtube }}" class="cs_center"><i
                                            class="fa-brands fa-youtube"></i></a>
                                @endif
                                @if (!empty(Contact()->twitter))
                                    <a href="{{ Contact()->twitter }}" class="cs_center"><i
                                            class="fa-brands fa-twitter"></i></a>
                                @endif
                                @if (!empty(Contact()->instagram))
                                    <a href="{{ Contact()->instagram }}" class="cs_center"><i
                                            class="fa-brands fa-instagram"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

        <div class="cs_main_header">
            <div class="container">
                <div class="cs_main_header_in">
                    <div class="cs_main_header_left">
                        <a class='cs_site_branding' href='{{ route('User.index') }}'>
                            <img src="{{ asset('Assets/User/assets/img/logo.svg') }}" alt="Logo">
                        </a>
                    </div>
                    <div class="cs_main_header_right">
                        <div class="cs_nav cs_primary_color">
                            <ul class="cs_nav_list">

                                <li><a href='{{ route('User.index') }}'>Home</a></li>
                                <li><a href='{{ route('User.about') }}'>About</a></li>
                                <li><a href='{{ route('User.service') }}'>Service</a></li>
                                <li><a href='{{ route('User.blog') }}'>Blog</a></li>


                                <li class="menu-item-has-children">
                                    <a href="#">Pages</a>
                                    <ul>
                                        <li><a href='{{ route('User.doctor') }}'>Doctors</a></li>
                                        <li><a href='{{ route('User.timetable') }}'>Timetable</a></li>
                                        <li><a href='{{ route('User.project') }}'>Courses</a></li>
                                    </ul>
                                </li>
                                <li><a href='{{ route('User.contact') }}'>Contact</a></li>
                                @if (Auth::check() == true)
                                    <li class="menu-item-has-children">
                                        <a href="#">{{ Auth::user()->name }}</a>
                                        <ul>
                                            @if (Auth::user()->role == 'patients')
                                                <li><a href='{{ route('User.dashboard.dashboard') }}'>Dashboard</a>
                                                </li>
                                            @elseif (Auth::user()->role == 'doctor')
                                                <li><a href='{{ route('doctor.dashboard') }}'>Dashboard</a></li>
                                            @else
                                                <li><a href='{{ route('Admin.dashboard') }}'>Dashboard</a></li>
                                            @endif
                                            <li>
                                                <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                                    @csrf
                                                    <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign
                                                        Out</a>
                                                </form>
                                            </li>


                                        </ul>
                                    </li>
                                @else
                                    <li><a href='{{ route('login') }}'>Sign in</a></li>
                                @endif


                            </ul>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')



    <footer class="cs_footer cs_blue_bg cs_bg_filed cs_white_color"
        data-src="{{ asset('Assets/User/assets/img/footer_bg.jpg') }}">
        <div class="container">
            <div class="cs_footer_row">
                <div class="cs_footer_col">
                    <div class="cs_footer_highlight_col cs_accent_bg">
                        <div class="cs_footer_logo">
                            <img src="{{ asset('Assets/User/assets/img/footer_logo.svg') }}" alt="Logo">
                        </div>
                        <ul class="cs_footer_contact cs_mp_0">

                            <li>
                                <i class="fa-solid fa-location-dot"></i>
                                {{ ucwords(Contact()->address) }}
                            </li>
                            <li>
                                <i class="fa-solid fa-phone"></i>
                                {{ ucwords(Contact()->phone) }}
                            </li>
                        </ul>
                        <div class="cs_social_btns cs_style_1">
                            @if (!empty(Contact()->facebook))
                                <a href="{{ Contact()->facebook }}" class="cs_center"><i
                                        class="fa-brands fa-facebook-f"></i></a>
                            @endif
                            @if (!empty(Contact()->youtube))
                                <a href="{{ Contact()->youtube }}" class="cs_center"><i
                                        class="fa-brands fa-youtube"></i></a>
                            @endif
                            @if (!empty(Contact()->twitter))
                                <a href="{{ Contact()->twitter }}" class="cs_center"><i
                                        class="fa-brands fa-twitter"></i></a>
                            @endif
                            @if (!empty(Contact()->instagram))
                                <a href="{{ Contact()->instagram }}" class="cs_center"><i
                                        class="fa-brands fa-instagram"></i></a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="cs_footer_col">
                    <div class="cs_footer_widget">
                        <h2 class="cs_footer_widget_title">Quick Link</h2>
                        <ul class="cs_footer_widget_nav_list cs_mp_0">
                            <li><a href="{{ route('User.faq') }}">FAQs</a></li>
                            <li><a href="{{ route('User.privacy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('User.contact') }}">Contact Information</a></li>
                        </ul>
                    </div>
                </div>

                <div class="cs_footer_col"
                    style=" display: flex; flex-direction: column; gap: 20px; justify-content: center">
                    <p class="cs_footer_copyright mb-0">Stay updated with the latest news and exclusive courses –
                        subscribe to our newsletter today!</p>
                    <form name="NewsForm" id="NewsForm" style=" display: flex;">
                        <div>
                            <input type="email" name="email" required class="cs_form_field" id="email"
                                placeholder="Email">
                            <span class="error-message" style="color: red"></span>
                        </div>
                        <button type="submit" class="btn btn-info  mx-3">Sumbit</button>
                    </form>


                </div>

            </div>
        </div>
        <div class="cs_footer_bottom cs_primary_bg">
            <div class="container">
                <div class="cs_footer_bottom_in">
                    <p class="cs_footer_copyright mb-0">Copyright © 2024 Ortho, All Rights Reserved.</p>
                    <ul class="cs_footer_menu cs_mp_0">
                        <li><a href='{{ route('User.about') }}'>About Us</a></li>
                        <li><a href="{{ route('User.project') }}">Course</a></li>
                        <li><a href='{{ route('User.blog') }}'>News</a></li>
                        <li><a href='{{ route('User.service') }}'>Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Start Scroll Up Button -->
    <span class="cs_scrollup">
        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 10L1.7625 11.7625L8.75 4.7875V20H11.25V4.7875L18.225 11.775L20 10L10 0L0 10Z"
                fill="currentColor" />
        </svg>
    </span>
    <!-- End Scroll Up Button -->

    <!-- Script -->

    <script src="{{ asset('Assets/User/assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('Assets/User/assets/js/wow.min.js') }}"></script>
    <script src="{{ asset('Assets/User/assets/js/jquery.slick.min.js') }}"></script>
    <script src="{{ asset('Assets/User/assets/js/odometer.js') }}"></script>
    <script src="{{ asset('Assets/User/assets/js/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#NewsForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)
            $('#response-loader').removeClass('hidden-loading-container')

            $.ajax({
                url: "{{ route('User.newsletter.send') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false)
                    $('#response-loader').addClass('hidden-loading-container')


                    if (response['status'] == true) {

                        $('.is-invalid').removeClass('is-invalid');
                        $('.cs_form_field').val('');
                        $('.error-message').html('');
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
                            title: response['msg'],
                        });



                    } else {

                        if (response['isLogin'] == false) {
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
                                icon: "error",
                                title: response['error'],
                            });


                        }


                        var errors = response['errors'];


                        $('.is-invalid').removeClass('is-invalid');
                        $('.error-message').html('');


                        $.each(errors, function(key, value) {
                            var field = $('#' + key);
                            if (field.length) {
                                field.addClass('is-invalid').siblings('span.error-message')
                                    .html(value);
                            }
                        });
                    }
                }
            })
        })
    </script>

    @yield('js')

</body>

<!-- Mirrored from medilo-html.netlify.app/ by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 26 Dec 2024 11:29:34 GMT -->

</html>
