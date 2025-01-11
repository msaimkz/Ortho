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
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center" data-src="assets/img/page_heading_bg.jpg">
        <div class="container">
            <h1 class="cs_page_title">Appointments</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">Appointments</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Appointment Section -->
    <section class="cs_appointment">
        <div class="cs_height_110 cs_height_lg_70"></div>
        <div class="container">
            <div class="cs_appointment_form_wrapper">
                <div class="cs_section_heading cs_style_1 text-center">
                    <p class="cs_section_subtitle cs_accent_color">
                        <span class="cs_shape_left"></span>MAKE APPOINTMENTS<span class="cs_shape_right"></span>
                    </p>
                    <h2 class="cs_section_title">Booking Now Appointments</h2>
                </div>
                <div class="cs_height_40 cs_height_lg_35"></div>
                <form class="cs_appointment_form row cs_gap_y_30" id="AppoinmentForm" name="AppoinmentForm">
                    <input type="hidden" name="doctor_id" id="doctor_id" value="{{ $doctor->id }}">
                    <div class="col-md-6">
                        <input type="text" name="name" id="name" class="cs_form_field" placeholder="Name">
                        <span class="text-danger"></span>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" id="email" class="cs_form_field" placeholder="Email">
                        <span class="text-danger"></span>

                    </div>
                    <div class="col-md-6">
                        <input type="date" name="date" id="date" class="cs_form_field" placeholder="Date">
                        <span class="text-danger"></span>

                    </div>
                    <div class="col-md-6">
                        <select name="day" id="day" class="cs_form_field">
                            <option value="">Choose Day</option>
                            @if (!empty($workingTimes))
                                @foreach ($workingTimes as $workingTime)
                                    <option value="{{ $workingTime->day }}">{{ ucwords($workingTime->day) }}</option>
                                @endforeach
                            @endif

                        </select>
                        <span class="text-danger" id="daySpan"></span>

                    </div>
                    <div class="col-md-12">
                        <select name="time" id="time" class="cs_form_field">
                            <option value="">Choose Time</option>


                        </select>
                        <span class="text-danger" id="timeSpan"></span>

                    </div>
                    <div class="col-md-12">
                        <textarea name="illness" class="cs_form_field" id="illness" cols="10" rows="3" placeholder="About your Illness"></textarea>
                        <span class="text-danger"></span>
                    </div>
                    <div class="col-md-12">
                        <label for="">Report or X-ray (Optional (PDF))</label>
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
                        <button type="submit" class="cs_btn cs_style_1 cs_white_color">Make an appoinment</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Appointment Section -->
@endsection
@section('js')
    <script src="{{ asset('Assets/User/assets/js/datetimepicker.js') }}"></script>
    <script src="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.js') }}"></script>

    <script>
        $('#AppoinmentForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)

            $.ajax({
                url: "{{ route('User.appoinment.book') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false)

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

                        window.location.href = "{{ route('User.DoctorDetail',$doctor->id) }}"

                    } else {
                        if(response['isError'] == true){

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
                                if('#' + key == '#day'){
                                    $('#daySpan').html(value)
                                }  
                                
                                if('#' + key == '#time'){
                                    $('#timeSpan').html(value)
                                }  
                            }
                        });
                    }
                }
            })
        })
        $('#day').change(function() {
            $('#btn').prop('disabled', true);

            let selectedValue = $(this).val();

            $.ajax({
                url: "{{ route('User.appoinment.GetTime') }}",
                type: "post",
                data: {
                    day: selectedValue,
                    doctorid: {{ $doctor->user_id }},
                },
                dataType: "json",
                success: function(response) {
                    $('#btn').prop('disabled', false);

                    console.log(response['time'])

                    let timeSelect = $('#time');
                    timeSelect.find('option:not(:first)').remove();
                    response['time'].forEach(function(time) {
                        let startTime = new Date('1970-01-01T' + time.start_time)
                            .toLocaleTimeString([], {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: true
                            });
                        let endTime = new Date('1970-01-01T' + time.end_time)
                            .toLocaleTimeString([], {
                                hour: '2-digit',
                                minute: '2-digit',
                                hour12: true
                            })
                        timeSelect.append(
                            `<option value="${time.id}">${startTime} To ${endTime}</option>`
                            );
                    });
                }
            })

        })

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
                    <input type="hidden" name="report_id" id="report_id" value="${response['id']}">
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
    </script>
@endsection
