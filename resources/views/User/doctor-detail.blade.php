@extends('User.master')

@section('content')
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">Doctor Details</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">Doctor Details</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <section>
        <div class="cs_height_120 cs_height_lg_80"></div>
        <div class="container">
            <div class="cs_doctor_details_wrapper">
                <div class="row cs_row_gap_30 cs_gap_y_30">
                    <div class="col-lg-5">
                        <div class="cs_doctor_details_thumbnail position-relative">
                            @if (isset($doctor->profile_img) && file_exists(public_path('Uploads/Doctor/Profile/' . $doctor->profile_img)))
                                <img src="{{ asset('Uploads/Doctor/Profile/' . $doctor->profile_img) }}"
                                    alt="profile-image">
                            @else
                                <img src="{{ asset('Assets/Dashboard/assets/images/doctors/member1.png') }}"
                                    alt="profile-image">
                            @endif
                            <div class="cs_doctor_thumbnail_shape1 position-absolute cs_blue_bg"></div>
                            <div class="cs_doctor_thumbnail_shape2 position-absolute cs_accent_bg"></div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="cs_doctor_details">
                            <div class="cs_doctor_info_header">
                                <h3 class="cs_doctor_title">Dr. {{ ucwords($doctor->name) }}</h3>
                                <p class="cs_doctor_subtitle mb-0">{{ ucwords($doctor->speciality) }}</p>
                            </div>
                            <p class="mb-0">{{ ucwords($doctor->bio) }}.</p><br>

                            <a class='cs_btn cs_style_1 cs_color_1' href='{{ route('User.apoinment', $doctor->id) }}'>
                                <span>Appoinment Now </span>
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                            <div class="cs_height_20 cs_height_lg_20"></div>
                            <div class="cs_doctor_info_wrapper">
                                <div class="cs_doctor_info_row">
                                    <div class="cs_doctor_info_col">
                                        <div class="cs_iconbox cs_style_10">
                                            <div class="cs_iconbox_icon"><i class="fa-solid fa-location-dot"></i></div>
                                            <div class="cs_iconbox_text">
                                                <h3 class="cs_iconbox_title">Location</h3>
                                                <p class="cs_iconbox_subtitle mb-0">{{ ucwords($doctor->address) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs_doctor_info_col">
                                        <div class="cs_iconbox cs_style_10">
                                            <div class="cs_iconbox_icon"><i class="fa-solid fa-envelope"></i></div>
                                            <div class="cs_iconbox_text">
                                                <h3 class="cs_iconbox_title">E-mail:</h3>
                                                <p class="cs_iconbox_subtitle mb-0">{{ $doctor->email }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="cs_doctor_info_row">
                                    <div class="cs_doctor_info_col">
                                        <div class="cs_iconbox cs_style_10">
                                            <div class="cs_iconbox_icon"><i class="fa-solid fa-certificate"></i></div>
                                            <div class="cs_iconbox_text">
                                                <h3 class="cs_iconbox_title">Qualification</h3>
                                                <p class="cs_iconbox_subtitle mb-0">{{ ucwords($doctor->Certifications) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cs_doctor_info_col">
                                        <div class="cs_iconbox cs_style_10">
                                            <div class="cs_iconbox_icon"><i class="fa-solid fa-phone"></i></div>
                                            <div class="cs_iconbox_text">
                                                <h3 class="cs_iconbox_title">Phone No</h3>
                                                <p class="cs_iconbox_subtitle mb-0">{{ $doctor->phone }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="cs_height_47 cs_height_lg_40"></div>
                <div class="cs_height_20 cs_height_lg_20"></div>
                <h3 class="cs_doctor_title">Doctor Schedules</h3>
                <div class="cs_doctor_info_wrapper">
                    <div class="cs_doctor_info_row">
                        @if (!empty($workingTimes))
                            @foreach ($workingTimes as $workingTime)
                                <div class="cs_doctor_info_col">
                                    <div class="cs_iconbox cs_style_10">
                                        <div class="cs_iconbox_icon"><i class="fa-solid fa-clock"></i></div>
                                        <div class="cs_iconbox_text">
                                            <h3 class="cs_iconbox_title">{{ ucwords($workingTime->day) }}</h3>
                                            <p class="cs_iconbox_subtitle m-3">
                                                {{ \Carbon\Carbon::parse($workingTime->start_time)->format('g:i A') }} To
                                                {{ \Carbon\Carbon::parse($workingTime->end_time)->format('g:i A') }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif


                    </div>


                </div>

                <div class="cs_height_30 cs_height_lg_30"></div>

            </div>
            <div class="cs_height_100 cs_height_lg_60"></div>
            <hr>
        </div>
    </section>
@endsection
