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
                            <button class='cs_btn cs_style_1 cs_color_1' id="FavouriteDoctor"
                                style="outline: none; border:none;" type="button" data-id="{{ $doctor->user_id }}">
                                <span>Add Favourite Doctor</span>
                                <i class="fa-solid fa-angles-right"></i>
                            </button>
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

                <div class="cs_height_70 cs_height_lg_40"></div>
                        <h2 class="cs_doctor_title mb-0">Comments 0</h2>
                        <ul class="cs_comment_list cs_mp0">
                            
                                
                                    <li class="cs_comment_body">
                                        <div class="cs_comment_thumbnail">
                                           
                                                <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-3.jpg') }}"
                                                    alt="Awesome Image" class="cs_radius_5">
                                           
                                           
                                        </div>
                                        <div class="cs_comment_info">
                                            <h3>{{ ucwords('saim imran') }}</h3>
                                            <p>{{ ucwords('this is best doctor') }}.</p>
                                            <div class="cs_comment_meta_wrapper">
                                                <div class="cs_comment_date">
                                                    <span>23 jan 2025 12:00 AM</span>                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                

                        </ul>
                        <div class="cs_height_90 cs_height_lg_60"></div>
                        <h2 class="cs_doctor_title">Get a Comment</h2>
                        <form class="cs_reply_form row cs_row_gap_30 cs_gap_y_30" id="CommentForm" name="CommentForm">
                            <input type="hidden" name="doctor_id" id="doctor_id" value="{{ $doctor->user_id }}">
                            <div class="col-md-6">
                                <input type="text" name="name" id="name" placeholder="Your Name"
                                    class="cs_form_field">
                                <span class="text-danger"></span>

                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" id="email" placeholder="Your Email"
                                    class="cs_form_field">
                                <span class="text-danger"></span>

                            </div>
                            <div class="col-md-12">
                                <textarea name="comment" class="cs_form_field" id="comment" cols="10" rows="3"
                                    placeholder="Give your Comment"></textarea>
                                <span class="text-danger"></span>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="cs_btn cs_style_1 cs_color_1">Submit Now</button>
                            </div>
                        </form>

            </div>
            <div class="cs_height_100 cs_height_lg_60"></div>
            <hr>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('#FavouriteDoctor').click(function() {
            if (confirm("Are you sure you want to Add this doctor to our Favourite Doctors list ?")) {
                $('#FavouriteDoctor').prop('disabled', true);
                $('#response-loader').removeClass('hidden-loading-container')

                $.ajax({
                    url: "{{ route('User.AddFavourite.doctor') }}",
                    type: "post",
                    data: {

                        id: $(this).data('id'),

                    },
                    dataType: "json",
                    success: function(response) {
                        $('#FavouriteDoctor').prop('disabled', false);
                        $('#response-loader').addClass('hidden-loading-container')



                        if (response['status'] == true) {


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

                    }
                })
            }
        })
        $('#CommentForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)
            $('#response-loader').removeClass('hidden-loading-container')


            $.ajax({
                url: "{{ route('User.doctor.comment.store') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false)
                    $('#response-loader').addClass('hidden-loading-container')


                    if (response['status'] == true) {

                        $('#CommentForm')[0].reset();
                        $('.is-invalid').removeClass('is-invalid');
                        $('span.text-danger').html('');
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

                        if (response['isError'] == true) {

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
                        $('span.text-danger').html('');


                        $.each(errors, function(key, value) {
                            var field = $('#' + key);
                            if (field.length) {
                                field.addClass('is-invalid').siblings('span.text-danger')
                                    .html(value);
                            }
                        });
                    }
                }
            })
        })
    </script>
@endsection
