@extends('Doctor.master')
@section('css')
    <link
        href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
        rel="stylesheet" />
    <link href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.css') }}">

@endsection
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Edit Profile
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item active">Edit Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Edit</strong> Profile<small>Update Profile here...</small> </h2>

                        </div>
                        <form name="ProfileForm" id="ProfileForm">
                            <div class="body">
                                <div class="row clearfix">
                                    <div class="col-md-12 my-3">
                                        @if (isset($profile->profile_img) && file_exists(public_path('Uploads/Doctor/Profile/' . $profile->profile_img)))
                                            <img id="image"
                                                style="width: 150px; height: 150px; border-radius: 20px; cursor: pointer;"
                                                src="{{ asset('Uploads/Doctor/Profile/' . $profile->profile_img) }}"
                                                class="img-fluid" alt="">
                                        @else
                                            <img id="image"
                                                style="width: 150px; height: 150px; border-radius: 20px; cursor: pointer;"
                                                src="{{ asset('Assets/Dashboard/assets/images/profile_av.jpg') }}"
                                                class="img-fluid" alt="">
                                        @endif

                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Name" value="{{ $profile->name }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Email" value="{{ $profile->email }}">
                                            <span class="text-danger"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="age" id="age" class="form-control"
                                                placeholder="Age" value="{{ $profile->age }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                placeholder="Phone" value="{{ $profile->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="city" id="city" class="form-control"
                                                placeholder="City" value="{{ $profile->city }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <select name="gender" id="gender" class="form-control show-tick">
                                            <option value="">- Gender -</option>
                                            <option value="male" {{ $profile->gender == 'male' ? 'selected' : '' }}>Male
                                            </option>
                                            <option value="female" {{ $profile->gender == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        <span class="text-danger" id="genderspan"></span>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="input-group">

                                            <input type="text" id="date_of_birth" name="date_of_birth"
                                                class="form-control datetimepicker" placeholder="Date Of Birth"
                                                value="{{ \Carbon\Carbon::parse($profile->date_of_birth)->format('d D M Y') }}">



                                        </div>
                                        <span class="text-danger" id="DOBspan"></span>

                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="MedicalSchool" id="MedicalSchool"
                                                class="form-control" placeholder="Medical School"
                                                value="{{ $profile->MedicalSchool }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="speciality" id="speciality" class="form-control"
                                                placeholder="Speciality" value="{{ $profile->speciality }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="Certifications" id="Certifications"
                                                class="form-control" placeholder="Certifications"
                                                value="{{ $profile->Certifications }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="Internship" id="Internship" class="form-control"
                                                placeholder="Internship" value="{{ $profile->Internship }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="Experience" id="Experience" class="form-control"
                                                placeholder="Experience" value="{{ $profile->Experience }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="Facebook" id="Facebook" class="form-control"
                                                placeholder="Facebook" value="{{ $profile->Facebook }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="Instagram" id="Instagram" class="form-control"
                                                placeholder="Instagram" value="{{ $profile->Instagram }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="Twitter" id="Twitter" class="form-control"
                                                placeholder="Twitter" value="{{ $profile->Twitter }}">
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                </div>


                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" name="bio" id="bio" class="form-control no-resize"
                                            placeholder="Please type About You Bio...">{{ $profile->bio }}</textarea>
                                        <span class="text-danger"></span>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" name="address" id="address" class="form-control no-resize"
                                            placeholder="Please type About Your Address...">{{ $profile->address }}</textarea>
                                        <span class="text-danger"></span>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-round">Save</button>
                                    <a href="{{ route('doctor.dashboard') }}"
                                        class="btn btn-default btn-round btn-simple">Cancel</a>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $.fn.selectpicker.Constructor.DEFAULTS.iconBase = 'zmdi';
        $.fn.selectpicker.Constructor.DEFAULTS.tickIcon = 'zmdi-check';
    </script>
    <script src="{{ asset('Assets/Dashboard/assets/plugins/momentjs/moment.js') }}"></script> <!-- Moment Plugin Js -->
    <script
        src="{{ asset('Assets/Dashboard/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
        
    </script>
    <script src="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.js') }}"></script> <!-- Dropzone Plugin Js -->

    <script>
        $(function() {
            //Datetimepicker plugin
            $('.datetimepicker').bootstrapMaterialDatePicker({
                format: 'dddd DD MMMM YYYY',
                clearButton: true,
                weekStart: 1
            });
        });

        $('#ProfileForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)

            $.ajax({
                url: "{{ route('doctor.profile.update') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false)

                    if (response['status'] == true) {

                        $('.doctorname').html(response['name'])
                        $('.doctoremail').html(response['email'])
                        $('.doctorphone').html(response['phone'])

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
                        var errors = response['errors'];


                        $('.is-invalid').removeClass('is-invalid');
                        $('span.text-danger').html('');


                        $.each(errors, function(key, value) {
                            var field = $('#' + key);
                            if (field.length) {
                                field.addClass('is-invalid').siblings('span.text-danger')
                                    .html(value);
                                if ('#' + key == '#gender') {
                                    $('#genderspan').html(value)

                                }
                                if ('#' + key == '#date_of_birth') {
                                    $('#DOBspan').html(value)

                                }
                            }
                        });
                    }

                }
            })
        })

        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {
                        this.removeFile(this.files[0]);
                    }
                });
            },
            url: "{{ route('doctor.profile.update.img') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                $('#image').attr('src', '/Uploads/Doctor/Profile/' + response['imageName']);
                $('.Profile-Image').attr('src', '/Uploads/Doctor/Profile/' + response['imageName']);
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

            }
        });
    </script>
@endsection
