@extends('User.master')
@section('css')
    <style>
        .dropzone {
            border: 2px dashed #007bff;
            border-radius: 5px;
            padding: 20px;
            text-align: center;
            color: #6c757d;
            cursor: pointer;
        }

        .dropzone.dragover {
            background-color: #e9ecef;
            border-color: #007bff;
        }
    </style>
    <link href="{{ asset('Assets/User/assets/css/datetimepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.css') }}" rel="stylesheet" />
@endsection


@section('content')
    <section class="cs_appointment">
        <div class="cs_height_110 cs_height_lg_70"></div>
        <div class="container">
            <div class="cs_appointment_form_wrapper">
                <div class="cs_section_heading cs_style_1 text-center">
                    <p class="cs_section_subtitle cs_accent_color">
                        <span class="cs_shape_left"></span>MAKE Registration<span class="cs_shape_right"></span>
                    </p>
                    <h2 class="cs_section_title">Registration Now</h2>
                </div>
                <div class="cs_height_40 cs_height_lg_35"></div>
                <form class="cs_appointment_form row cs_gap_y_30" id="RegiesterForm">
                    <div class="col-md-6">
                        <input type="text" name="name" class="cs_form_field" id="name" placeholder="Name">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="cs_form_field" id="email" placeholder="Email">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="phone" class="cs_form_field" id="phone" placeholder="Phone No">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="city" name="city" class="cs_form_field" id="city" placeholder="City">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <select name="gender" id="gender" class="cs_form_field">
                            <option value="">Select a Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="date_of_birth" id="date_of_birth" autocomplete="off"
                            class="datetimepicker cs_form_field" placeholder="Date Of Birth">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="age" id="age" class="cs_form_field" placeholder="Age">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="speciality" id="speciality" class="cs_form_field"
                            placeholder="Speciality">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="MedicalSchool" id="MedicalSchool" class="cs_form_field"
                            placeholder="Medical School Name">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Certifications" id="Certifications" class="cs_form_field"
                            placeholder="Certifications">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Experience" id="Experience" class="cs_form_field"
                            placeholder="Past Experience / Tranining (Optional)">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Internship" id="Internship" class="cs_form_field"
                            placeholder="Past Internship (Optional)">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-12">
                        <textarea name="address" class="cs_form_field" id="address" cols="10" rows="3" placeholder="Address"></textarea>
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-12">
                        <textarea name="bio" class="cs_form_field" id="bio" cols="10" rows="3" placeholder="About Bio"></textarea>
                        <span class="error-message" style="color: red"></span>
                    </div>

                    <div class="col-md-12">
                        <label for="">Profile Image</label>
                        <div class="card">
                            <div class="container mt-5">
                                <div id="image" class="dropzone">
                                    Drag and drop your file here or click to upload.
                                </div>
                                <p class="mt-3 text-center text-danger" id="ImageInfo"></p>
                            </div>
                        </div>
                        <div class="row mt-2" id="image-row"></div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Graduation Pass Degree</label>
                        <div class="card">
                            <div class="container mt-5">
                                <div id="file" class="dropzone">
                                    Drag and drop your file here or click to upload.
                                </div>
                                <p class="mt-3 text-center text-danger" id="fileInfo"></p>
                            </div>
                        </div>
                        <div class="row mt-2" id="file-row"></div>
                    </div>
                    <div class="col-md-12">
                        <label for="profile">Social Media Links</label>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="facebook" id="facebook" class="cs_form_field"
                            placeholder="Facebook">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="Instagram" id="Instagram" class="cs_form_field"
                            placeholder="Instagram">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-12">
                        <input type="text" name="Twitter" id="Twitter" class="cs_form_field"
                            placeholder="Twitter">
                        <span class="error-message" style="color: red"></span>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="cs_btn cs_style_1 cs_white_color" id="btn">Register
                            Now</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('Assets/User/assets/js/datetimepicker.js') }}"></script>
    <script src="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.datetimepicker').datetimepicker({
                format: 'Y-m-d',
                timepicker: false,
              
               
            });
        });

        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            url: "{{ route('TempImages') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {

                        this.removeFile(this.files[0]);
                    }
                });

                this.on('success', function(file, response) {

                    this.removeAllFiles(true);


                    var baseUrl = "{{ asset('Uploads/temp/') }}";
                    var imgCard = `
                <div class="col-md-3" id="image-card-${response['id']}">
                    <input type="hidden" name="image_id" id="image_id" value="${response['id']}">
                    <div class="card">
                        <img src="${baseUrl}/${response['imageName']}" class="img-fluid" alt="">
                        <div class="card-body">
                            <button class="btn btn-danger" id="image-card-btn" data-id="${response['id']}">Delete</button>
                        </div>
                    </div>
                </div>
            `;
                    $('#image-row').html(imgCard);
                });

                this.on('removedfile', function(file) {
                    console.log("File removed from Dropzone preview:", file);
                });
            }
        });


        $('#image-row').on('click', '.btn-danger', function(event) {
            event.preventDefault();
            $(this).closest('.col-md-3').remove();
        });


        const dropzonefile = $("#file").dropzone({
            url: "{{ route('TempFiles') }}",
            maxFiles: 1,
            paramName: 'file',
            addRemoveLinks: true,
            acceptedFiles: "application/pdf",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {

                        this.removeFile(this.files[0]);
                    }
                });

                this.on('success', function(file, response) {

                    this.removeAllFiles(true);



                    var fileCard = `
                <div class="col-md-3" id="file-card-${response['id']}">
                    <input type="hidden" name="file_id" id="file_id" value="${response['id']}">
                    <div class="card">
                        <img src="{{ asset('Assets/User/assets/img/PDF.png') }}" class="img-fluid" alt="">
                        <div class="card-body d-flex flex-column align-items-start">
                            <span class="text-secondary font-weight-bold" style="word-wrap: break-word; max-width: 100%;">
                                <i class="bi bi-file-earmark-text me-2"></i> ${response['FileName']}
                            </span>
                            <button class="btn btn-sm btn-danger mt-2" id="file-card-btn" data-id="${response['id']}">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </div>
                    </div>

                    
                </div>
            `;
                    $('#file-row').html(fileCard);
                });

                this.on('removedfile', function(file) {
                    console.log("File removed from Dropzone preview:", file);
                });
            }
        });


        $('#file-row').on('click', '.btn-danger', function(event) {
            event.preventDefault();
            $(this).closest('.col-md-3').remove();
        });

        $('#RegiesterForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('#btn').prop('disabled', true);

            $.ajax({
                url: "{{ route('User.DoctorRegiestrationRequest') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('#btn').prop('disabled', false);

                    if (response['status'] === true) {

                        Swal.fire({
                            icon: "success",
                            title: response['msg'],
                            toast: true,
                            position: "top-end",
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                        });


                        $('#RegiesterForm')[0].reset();
                        $('.is-invalid').removeClass('is-invalid');
                        $('span.error-message').html('');
                        $('#file-row').html('');
                        $('#image-row').html('');


                    } else {

                        if(response['IsAlreadyRegister']  == true){
                            Swal.fire({
                            icon: "error",
                            title: response['error'],
                            toast: true,
                            position: "top-end",
                            timer: 3000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                        });
                        }

                        var errors = response['errors'];


                        $('.is-invalid').removeClass('is-invalid');
                        $('span.error-message').html('');


                        $.each(errors, function(key, value) {
                            var field = $('#' + key);
                            if (field.length) {
                                field.addClass('is-invalid').siblings('span.error-message')
                                    .html(value);
                            } else {

                                if (key === 'image_id') {
                                    $('#ImageInfo').html(value);
                                }
                                if (key === 'file_id') {
                                    $('#fileInfo').html(value);
                                }
                            }
                        });
                    }
                },
                error: function(xhr, status, error) {
                    $('#btn').prop('disabled', false);
                    Swal.fire({
                        icon: "error",
                        title: "An error occurred",
                        text: "Please try again later.",
                    });
                },
            });
        });
    </script>
@endsection
