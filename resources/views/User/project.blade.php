@extends('User.master')

@section('content')
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">Our Course</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">Course</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Projects Section -->
    <section>
        <div class="cs_height_110 cs_height_lg_70"></div>
        <div class="container">
            <div class="cs_section_heading cs_style_1 cs_type_1">
                <div class="cs_section_heading_left">
                    <p class="cs_section_subtitle cs_accent_color"><span class="cs_shape_left"></span>OUR COURSES</p>
                    <h2 class="cs_section_title">All The Great Work That We Done</h2>
                </div>
                <div class="cs_section_heading_right">We are privileged to work with hundreds of future-thinking
                    medial,including many of the world’s top hardware, software, and brands , feel safe and comfortable in
                    establishing.</div>
            </div>
            <div class="cs_height_50 cs_height_lg_50"></div>
        </div>
        <div class="container-fluide">
            <div class="cs_project_grid cs_style_1">
                @if (!empty($courses))
                    @php
                        $courseCount = 0;
                    @endphp
                    @foreach ($courses as $course)
                        <div class="cs_project_item">
                            <div class="cs_card cs_style_5">
                                <div class="cs_card_thumbnail">
                                    @if (isset($course->thumbnail) && file_exists(public_path('Uploads/Course/thumbnail/Small/' . $course->thumbnail)))
                                        <img src="{{ asset('Uploads/Course/thumbnail/Small/' . $course->thumbnail) }}"
                                            alt="Course Thumbnail" class="w-100">
                                    @else
                                        <img src="{{ asset('Assets/User/assets/img/project_1.jpg') }}"
                                            alt="Course Thumbnail" class="w-100">
                                    @endif
                                </div>
                                <div class="cs_card_info_wrapper">
                                    <div class="cs_card_index cs_white_color">0{{ ++$courseCount }}</div>
                                    <div class="cs_card_text">
                                        <h3 class="cs_card_title cs_white_color mb-0"><a
                                                href="{{ route('User.CourseDetail',$course->slug) }}">{{ ucwords($course->title) }}</a>
                                        </h3>
                                        <p class="cs_card_subtitle cs_white_color mb-0"><strong>Price:
                                                {{ number_format($course->price, 2) }}</strong></p>
                                    </div>
                                    <a href="{{ route('User.CourseDetail',$course->slug) }}" class="cs_iconbox_btn cs_center"><i
                                            class="fa-solid fa-circle-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
@endsection
