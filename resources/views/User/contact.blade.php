@extends('User.master')

@section('content')
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">Contact Us</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">Contact Us</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Contact Section -->
    <section class="cs_contact">
        <div class="cs_height_110 cs_height_lg_70"></div>
        <div class="container">
            <div class="row cs_gap_y_30">
                <div class="col-lg-6">
                    <div class="cs_contact_thumbnail cs_pr_40">
                        <div class="cs_teeth_shape">
                            <img src="{{ asset('Assets/user/assets/img/icons/hero_shape_3.png') }}" alt="Image"
                                class="cs_spinner_img">
                        </div>
                        <div class="cs_contact_img">
                            <img src="{{ asset('Assets/User/assets/img/contact_2.png') }}" alt="Image">
                        </div>
                        <div class="cs_contact_bg_shape">
                            <div class="cs_white_bg_shape"></div>
                            <div class="cs_iconbox cs_style_4">
                                <div class="cs_iconbox_icon cs_center"><img
                                        src="{{ asset('Assets/User/assets/img/icons/call_icon_1.png') }}" alt="Icon">
                                </div>
                                <div class="cs_iconbox_right">
                                    <h3 class="cs_iconbox_title">Emergency Call</h3>
                                    <p class="cs_iconbox_subtitle mb-0">24/7 – Support and easy</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cs_section_heading cs_style_1">
                        <p class="cs_section_subtitle cs_accent_color">
                            <span class="cs_shape_left"></span>CONTACT US
                        </p>
                        <h2 class="cs_section_title">Meet Our Specialist This <br>Doctor Meet</h2>
                    </div>
                    <div class="cs_height_25 cs_height_lg_25"></div>
                    <form class="cs_contact_form row cs_gap_y_30" id="ContactForm" name="ContactForm">
                        <div class="col-md-6">
                            <input type="text" name="name" id="name" class="cs_form_field"
                                placeholder="Your name">
                            <span class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <input type="email" name="email" id="email" class="cs_form_field"
                                placeholder="Your email">
                            <span class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <input type="text" name="subject" id="subject" class="cs_form_field"
                                placeholder="Your Subject">
                            <span class="text-danger"></span>

                        </div>
                        <div class="col-md-6">
                            <input type="text" name="phone" id="phone" class="cs_form_field"
                                placeholder="Your phone">
                            <span class="text-danger"></span>

                        </div>
                        <div class="col-lg-12">
                            <textarea rows="5" name="comment" id="comment" class="cs_form_field" placeholder="Your comments"></textarea>
                            <span class="text-danger"></span>

                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="cs_btn cs_style_1 cs_color_1">Send Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Contact Section -->
    <!-- Start Location Map -->
    <div class="cs_location_map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.5851960224!2d-0.2664050245106056!3d51.52852620113951!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2z4Kay4Kao4KeN4Kah4KaoLCDgpq_gp4HgppXgp43gpqTgprDgpr7gppzgp43gpq8!5e0!3m2!1sbn!2sbd!4v1723284219451!5m2!1sbn!2sbd"></iframe>
    </div>
    <!-- End Location Map -->
@endsection

@section('js')
    <script>
        $('#ContactForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)

            $.ajax({
                url: "{{ route('User.contact.send') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    if (response['status'] == true) {

                      $('#ContactForm')[0].reset();
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
                      
                       if(response['IsLogin'] == false){
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
