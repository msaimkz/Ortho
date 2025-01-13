@extends('User.master')

@section('content')
    <!-- End Header Section -->
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">Privacy Policy</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">Privacy Policy</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Blog Details Section -->
    <section>
        <div class="cs_height_120 cs_height_lg_80"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cs_post_details cs_style_1">
                        <h2 class="cs_reply_title">Introduction</h2>
                        <p>
                            Welcome to <strong>Ortho Hospital Management</strong>. Your privacy is important to us, and we
                            are committed to
                            protecting your personal information. This Privacy Policy outlines how we collect, use, and
                            safeguard your data when you visit our website or use our services.
                        </p>
                        <h2 class="cs_reply_title">Information We Collect</h2>
                        <p>
                            We may collect the following types of information:
                            Personal Information: Name, contact details (email, phone number), address, date of birth, and
                            other details you provide during booking or registration.
                            Health Information: Medical and dental history, treatment preferences, and records necessary for
                            your care.
                            Technical Information: IP address, browser type, operating system, and browsing behavior through
                            cookies or similar technologies.
                        </p>

                    </div>
                </div>
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Blog Details Section -->
@endsection
