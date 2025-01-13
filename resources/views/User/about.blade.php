@extends('User.master')

@section('content')
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">About Page</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">About Page</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start About Section -->
    <section class="cs_about cs_style_1 position-relative">
        <div class="cs_height_120 cs_height_lg_80"></div>
        <div class="container">
            <div class="row align-items-center cs_gap_y_40">
                <div class="col-lg-6">
                    <div class="cs_about_thumb">
                        <div class="cs_about_thumb_1">
                            <img src="{{ asset('Assets/User/assets/img/about_img_7.jpg') }}" alt="About Image">
                            <a href="https://www.youtube.com/embed/rRid6GCJtgc" class="cs_about_player_btn cs_video_open">
                                <span class="cs_player_btn cs_center">
                                    <span></span>
                                </span>
                                <span class="cs_about_play_btn_text">How We Work</span>
                            </a>
                        </div>
                        <div class="cs_about_thumb_2">
                            <img src="{{ asset('Assets/User/assets/img/about_img_2.jpg') }}" alt="About Image">
                            <img src="{{ asset('Assets/User/assets/img/icons/about_shape_1.png') }}" alt="Shape Image"
                                class="cs_about_thumb_shape_2">
                        </div>
                        <div class="cs_experience_box cs_center wow zoomIn" data-wow-duration="0.9s" data-wow-delay="0.25s">
                            <p class="cs_experience_box_number">26+</p>
                            <p class="cs_experience_box_title">Experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cs_about_content">
                        <div class="cs_section_heading cs_style_1">
                            <p class="cs_section_subtitle cs_accent_color wow fadeInLeft" data-wow-duration="0.9s"
                                data-wow-delay="0.25s">
                                <span class="cs_shape_left"></span>
                                OUR ABOUT US
                            </p>
                            <h2 class="cs_section_title">More Than 26+ Years About Provide Medical.</h2>
                        </div>
                        <p class="cs_about_text">We are privileged to work with hundreds of future-thinking medial,
                            including many of the world’s top hardware, software, and brands , feel safe and comfortable in
                            establishing.</p>
                        <div class="row cs_gap_y_30">
                            <div class="col-sm-6">
                                <div class="cs_iconbox cs_style_1">
                                    <div class="cs_iconbox_head">
                                        <div class="cs_iconbox_icon cs_center">
                                            <img src="{{ asset('Assets/User/assets/img/icons/about_icon_1.png') }}"
                                                alt="">
                                        </div>
                                        <h3 class="cs_iconbox_title m-0">Client Support</h3>
                                    </div>
                                    <p class="cs_iconbox_subtitle mb-0">But must explain to you medical of and pain was.</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="cs_iconbox cs_style_1">
                                    <div class="cs_iconbox_head">
                                        <div class="cs_iconbox_icon cs_center">
                                            <img src="{{ asset('Assets/User/assets/img/icons/about_icon_2.png') }}"
                                                alt="">
                                        </div>
                                        <h3 class="cs_iconbox_title m-0">Doctor Support</h3>
                                    </div>
                                    <p class="cs_iconbox_subtitle mb-0">But must explain to you medical of and pain was.</p>
                                </div>
                            </div>
                        </div>
                        <div class="cs_about_iconbox">
                            <div class="cs_about_iconbox_icon cs_center">
                                <i class="fa-regular fa-circle-check"></i>
                            </div>
                            <p class="cs_about_iconbox_subtitle">There are many variations of pass available this medical
                                service the team <a href="#">READ MORE +</a></p>
                        </div>
                        <a class='cs_btn cs_style_1 cs_color_1' href='{{ route('User.about') }}'>
                            <span>About More </span>
                            <i class="fa-solid fa-angles-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cs_section_img"><img src="{{ asset('Assets/User/assets/img/about_section_img_1.png') }}" alt="">
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End About Section -->




    <!-- Start CTA Section -->
    <section class="cs_cta cs_style_2 cs_blue_bg cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/cta_bg_1.jpg') }}">
        <div class="container">
            <div class="row align-items-center cs_gap_y_40">
                <div class="col-lg-6">
                    <div class="cs_cta_btn_wrapper">
                        <a href="https://www.youtube.com/embed/rRid6GCJtgc" class="cs_video_open">
                            <span class="cs_player_btn cs_center">
                                <span></span>
                            </span>
                            <span class="cs_play_btn_text">WATCH VIDEO</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cs_cta_text">
                        <div class="cs_section_heading cs_style_1">
                            <p class="cs_section_subtitle cs_accent_color"><span class="cs_shape_left"></span>OUR WATCH
                                VIDEO</p>
                            <h2 class="cs_section_title cs_white_color">Professional Medical Care Measure Medical.</h2>
                            <p class="cs_cta_subtitle cs_white_color">We are privileged to work with hundreds of
                                future-thinking medial, including many of the world’s top hardware, software, and brands ,
                                feel safe and
                                comfortable in establishing.</p>
                            <a class='cs_btn cs_style_1 cs_color_3' href='contact.html'>
                                <span>Video More </span>
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cs_cta_shape position-absolute">
                <img src="{{ asset('Assets/User/assets/img/medical_brand.png') }}" alt="Medical Brand"
                    class="cs_spinner_img">
            </div>
        </div>
    </section>
    <!-- End CTA Section -->

    <!-- Start Team Section -->
    <section>
        <div class="cs_height_110 cs_height_lg_70"></div>
        <div class="container">
            <div class="cs_section_heading cs_style_1 text-center">
                <p class="cs_section_subtitle cs_accent_color wow fadeInUp" data-wow-duration="0.9s" data-wow-delay="0.25s">
                    <span class="cs_shape_left"></span>OUR TEAM MEMBER<span class="cs_shape_right"></span>
                </p>
                <h2 class="cs_section_title">Meet Our Specialist This <br>Doctor Meeting</h2>
            </div>
            <div class="cs_height_50 cs_height_lg_50"></div>
            <div class="cs_slider cs_style_1 cs_slider_gap_24">
                <div class="cs_slider_container" data-autoplay="0" data-loop="1" data-speed="600" data-center="0"
                    data-variable-width="0" data-slides-per-view="responsive" data-xs-slides="1" data-sm-slides="2"
                    data-md-slides="3" data-lg-slides="4" data-add-slides="4">
                    <div class="cs_slider_wrapper">
                        @if ($doctors != null)
                            @foreach ($doctors as $doctor)
                                <div class="cs_slide">
                                    <div class="cs_team cs_style_1 cs_blue_bg">
                                        <div class="cs_team_shape cs_accent_bg"></div>
                                        <a class='cs_team_thumbnail'
                                            href='{{ route('User.DoctorDetail', $doctor->id) }}'>
                                            @if (isset($doctor->profile_img) && file_exists(public_path('Uploads/Doctor/Profile/' . $doctor->profile_img)))
                                                <img src="{{ asset('Uploads/Doctor/Profile/' . $doctor->profile_img) }}"
                                                    alt="profile-image">
                                            @else
                                                <img src="{{ asset('Assets/Dashboard/assets/images/doctors/member1.png') }}"
                                                    alt="profile-image">
                                            @endif

                                        </a>
                                        <div class="cs_team_bio">
                                            <h3 class="cs_team_title cs_extra_bold mb-0"><a
                                                    href='{{ route('User.DoctorDetail', $doctor->id) }}'>Dr.
                                                    {{ ucwords($doctor->name) }}</a></h3>
                                            <p class="cs_team_subtitle"> {{ ucwords($doctor->speciality) }}</p>
                                            <div class="cs_social_btns cs_style_1">
                                                <a href="{{ $doctor->Facebook }}" target="_blank" class="cs_center"><i
                                                        class="fa-brands fa-facebook-f"></i></a>
                                                <a href="{{ $doctor->Twitter }}" target="_blank" class="cs_center"><i
                                                        class="fa-brands fa-twitter"></i></a>
                                                <a href="{{ $doctor->Instagram }}" target="_blank" class="cs_center"><i
                                                        class="fa-brands fa-instagram"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                        @endif


                    </div>
                </div>
                <div class="cs_pagination cs_style_2"></div>
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Team Section -->

@endsection
