@extends('User.master')

@section('content')
    <!-- End Header Section -->
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">Course Details</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">Course Details</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Blog Details Section -->
    <section>
        <div class="cs_height_120 cs_height_lg_80"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cs_post_details cs_style_1">
                        <div class="cs_post_thumb_thumbnail">
                            @if (isset($course->thumbnail) && file_exists(public_path('Uploads/Course/' . $course->thumbnail)))
                                <img src="{{ asset('Uploads/Course/' . $course->thumbnail) }}" alt="course-thumbnail">
                            @else
                                <img src="{{ asset('Assets/User/assets/img/post_4.jpg') }}" alt="course-thumbnail">
                            @endif
                        </div>
                        <ul class="cs_post_meta cs_mp0">
                            <li><i
                                    class="fa-regular fa-calendar-days"></i>{{ \Carbon\Carbon::parse($course->created_at)->format('M-d-Y') }}
                            </li>
                        </ul>
                        <p>{{ ucwords($course->description) }}</p>
                        <p><strong>Price: ${{ number_format($course->price,2) }}</strong></p>
                        <div class="cs_height_27 cs_height_lg_10"></div>

                        <div>
                            <a class='cs_btn cs_style_1 cs_color_1' href='{{ route('User.doctorRegiestraion') }}'>
                                <span>Buy Now </span>
                                <i class="fa-solid fa-angles-right"></i>
                            </a>
                        </div>
                        <div class="cs_height_47 cs_height_lg_30"></div>

                        
                    </div>
                </div>
                
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Blog Details Section -->
@endsection


