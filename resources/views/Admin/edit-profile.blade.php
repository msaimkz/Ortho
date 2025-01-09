@extends('Admin.master')
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
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
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
                        <form id="UpdateProfileForm">
                            <div class="body">
                                <div class="row clearfix">
                                    <label for="">Update Profile Image</label>

                                    <div class="col-md-12 my-3">
                                        @if (Auth::user()->profile_photo_path != null)
                                            <img id="image"
                                                style="width: 150px; height: 150px; border-radius: 20px; cursor: pointer;"
                                                src="{{ asset('Uploads/Admin/ProfileImages/' . Auth::user()->profile_photo_path) }}"
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
                                                placeholder="Name" value="{{ Auth::user()->name }}">
                                            <span style="color: red"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Email" value="{{ Auth::user()->email }}">
                                            <span style="color: red"></span>

                                        </div>
                                    </div>

                                </div>
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                placeholder="Phone" value="{{ Auth::user()->phone }}">
                                            <span style="color: red"></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="city" id="city" class="form-control"
                                                placeholder="City" value="{{ Auth::user()->city }}">
                                            <span style="color: red"></span>

                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <input type="text" name="age" id="age" class="form-control"
                                                placeholder="Age" value="{{ $profile->age != null ? $profile->age : '' }}">
                                            <span style="color: red"></span>

                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <select name="gender" id="gender" class="form-control show-tick">
                                            <option value="">- Gender -</option>
                                            <option value="male"
                                                {{ $profile->gender != null && $profile->gender == 'male' ? 'selected' : '' }}>
                                                Male</option>
                                            <option value="female"
                                                {{ $profile->gender != null && $profile->gender == 'female' ? 'selected' : '' }}>
                                                Female</option>
                                        </select>
                                        <span style="color: red"></span>

                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">

                                            <input type="text" name="date_of_birth" id="DOB"
                                                class="form-control datetimepicker" placeholder="Date Of Birth"
                                                value="{{ $profile->date_of_birth != null ? \Carbon\Carbon::parse($profile->date_of_birth)->format('d D M Y') : '' }}">
                                            <div>
                                                <p style="color: red"></p>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" name="bio" id="bio" class="form-control no-resize"
                                            placeholder="Please type About You Bio...">{{ $profile->bio != null ? $profile->bio : '' }}</textarea>
                                        <span style="color: red"></span>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <textarea rows="4" name="address" id="address" class="form-control no-resize"
                                            placeholder="Please type About Your Address...">{{ $profile->address != null ? $profile->address : '' }}</textarea>
                                        <span style="color: red"></span>

                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button type="submit" id="btn" class="btn btn-primary btn-round">Save</button>
                                    <a href="{{ route('User.dashboard.dashboard') }}"
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

    </script>

    <script>
        $(function() {
            //Datetimepicker plugin
            $('.datetimepicker').bootstrapMaterialDatePicker({
                format: 'dddd DD MMMM YYYY',
                clearButton: true,
                weekStart: 1
            });
        });
    </script>

    <script type="text/javascript">
        $('#UpdateProfileForm').submit(function(event) {
            $('#btn').prop('disabled', true);
            event.preventDefault();
            var element = $(this);

            $.ajax({
                url: '{{ route('Admin.UpdateProfile') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $('#btn').prop('disabled', false);
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
                        $('.user-name').html(response.name)
                        if (response.address != null) {
                            $('.user-location').html(response.address)
                        } else {
                            $('.user-location').html('')

                        }

                    } else {



                        var errors = response['errors']
                        if (errors['name']) {
                            $('#name').addClass('is-invalid').siblings('span').html(errors[
                                'name'])
                        } else {
                            $('#name').removeClass('is-invalid').siblings('span').html('')

                        }
                        if (errors['email']) {
                            $('#email').addClass('is-invalid').siblings('span').html(errors[
                                'email'])
                        } else {
                            $('#email').removeClass('is-invalid').siblings('span').html('')

                        }
                        if (errors['phone']) {
                            $('#phone').addClass('is-invalid').siblings('span').html(errors[
                                'phone'])
                        } else {
                            $('#phone').removeClass('is-invalid').siblings('span').html('')

                        }
                        if (errors['city']) {
                            $('#city').addClass('is-invalid').siblings('span').html(errors[
                                'city'])
                        } else {
                            $('#city').removeClass('is-invalid').siblings('span').html('')

                        }
                        if (errors['age']) {
                            $('#age').addClass('is-invalid').siblings('span').html(errors[
                                'age'])
                        } else {
                            $('#age').removeClass('is-invalid').siblings('span').html('')

                        }
                        if (errors['gender']) {
                            $('#gender').addClass('is-invalid').siblings('span').html(errors[
                                'gender'])
                        } else {
                            $('#gender').removeClass('is-invalid').siblings('span').html('')

                        }
                        if (errors['date_of_birth']) {
                            $('#DOB').addClass('is-invalid').siblings('div').find('p').html(errors[
                                'date_of_birth'])
                        } else {
                            $('#DOB').removeClass('is-invalid').siblings('div').find('p').html('')

                        }
                        if (errors['bio']) {
                            $('#bio').addClass('is-invalid').siblings('span').html(errors[
                                'bio'])
                        } else {
                            $('#bio').removeClass('is-invalid').siblings('span').html('')

                        }
                        if (errors['address']) {
                            $('#address').addClass('is-invalid').siblings('span').html(errors[
                                'address'])
                        } else {
                            $('#address').removeClass('is-invalid').siblings('span').html('')

                        }
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
            url: "{{ route('Admin.UpdateProfileImage') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(file, response) {
                $('#image').attr('src', '/Uploads/Admin/ProfileImages/' + response.imageName);
                $('.Profile-Image').attr('src', '/Uploads/Admin/ProfileImages/' + response.imageName);
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
