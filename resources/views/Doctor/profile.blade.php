@extends('Doctor.master')

@section('content')
    <section class="content profile-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Profile
                        <small>Welcome to Oreo</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <button class="btn btn-white btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                        type="button">
                        <i class="zmdi zmdi-edit"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card profile-header">
                        <div class="body text-center">
                            <div class="profile-image">
                                @if (isset($profile->profile_img) && file_exists(public_path('Uploads/Doctor/Profile/' . $profile->profile_img)))
                                    <img src="{{ asset('Uploads/Doctor/Profile/' . $profile->profile_img) }}"
                                        alt="profile-image">
                                @else
                                    <img src="{{ asset('Assets/Dashboard/assets/images/doctors/member1.png') }}"
                                        alt="profile-image">
                                @endif
                            </div>
                            <div>
                                <h4 class="m-b-0"><strong>Dr. {{ ucwords($profile->name) }}</strong></h4>
                                <span class="job_post"><a href="{{ route('doctor.profile.edit') }}">Edit Profile</a></span>
                                <p>{{ ucwords($profile->address) }}</p>
                                <p class="social-icon m-t-5 m-b-0">
                                    <a title="Twitter" href="{{ $profile->Twitter }}" target="_blank"><i
                                            class="zmdi zmdi-twitter"></i></a>
                                    <a title="Facebook" href="{{ $profile->Facebook }}"><i
                                            class="zmdi zmdi-facebook"></i></a>
                                    <a title="Instagram" href="{{ $profile->Instagram }}"><i
                                            class="zmdi zmdi-instagram "></i></a>
                                </p>
                            </div>


                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <div class="workingtime">
                                <h6>Working Time</h6>
                                <small class="text-muted">Tuesday</small>
                                <p>06:00 AM - 07:00 AM</p>
                                <hr>
                                <small class="text-muted">Thursday</small>
                                <p>06:00 AM - 07:00 AM</p>
                                <hr>
                            </div>

                        </div>
                    </div>


                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">About</a></li>
                            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#Account">Account</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane body active" id="about">
                                <p>{{ ucwords($profile->bio) }}.</p>
                                <h6>Qualifications</h6>
                                <hr>
                                <ul class="list-unstyled">
                                    <li>
                                        @if ($profile->status == 'active')
                                            <p><strong>Account Status:</strong> <span class="badge badge-success"
                                                    id="status-badge">Active</span></p>
                                        @else
                                            <p><strong>Account Status:</strong> <span class="badge badge-danger"
                                                    id="status-badge">Blocked</span></p>
                                        @endif

                                    </li>
                                    <li>
                                        <p><strong>Email ID:</strong> {{ $profile->email }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Phone No:</strong> {{ $profile->phone }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Medical School:</strong> {{ ucwords($profile->MedicalSchool) }}
                                        </p>
                                    </li>
                                    <li>
                                        <p><strong>Residency:</strong> {{ ucwords($profile->city) }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Certifications:</strong> {{ ucwords($profile->Certifications) }}
                                        </p>
                                    </li>
                                    <li>
                                        <p><strong>Gender:</strong> {{ ucwords($profile->gender) }}</p>
                                    </li>
                                    @if (!empty($profile->Experience))
                                        <li>
                                            <p><strong>Experience / Tranining:</strong>
                                                {{ ucwords($profile->Experience) }}</p>
                                        </li>
                                    @endif
                                    @if (!empty($profile->Internship))
                                        <li>
                                            <p><strong>Internship:</strong> {{ $profile->Internship }}</p>
                                        </li>
                                    @endif


                                </ul>
                                <h6>Specialties</h6>
                                <hr>
                                <ul class="list-unstyled specialties">
                                    <li>{{ ucwords($profile->speciality) }}</li>

                                </ul>

                            </div>
                            <div class="tab-pane body" id="Account">
                                <form id="ChangePasswordForm">

                                    <div class="form-group">
                                        <input type="password" class="form-control" name="Currentpassword"
                                            id="Currentpassword" placeholder="Current Password">
                                        <span style="color: red"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password"
                                            placeholder="New Password">
                                        <span style="color: red"></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password_confirmation"
                                            id="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                    <button class="btn btn-info btn-round" id="btn">Save Changes</button>
                                    <hr>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script type="text/javascript">
        $('#ChangePasswordForm').submit(function(event) {
            $('#btn').prop('disabled', true);
            event.preventDefault();
            var element = $(this);

            $.ajax({
                url: "{{ route('doctor.ChangePassword') }}",
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    
                    $('#Currentpassword').val('')
                    $('#password').val('')
                    $('#password_confirmation').val('')

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
                    } else {

                        if (response['IsPasswordMatch'] == false) {

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
                                title: response['msg'],
                            });



                        }

                        var errors = response['errors']
                        if (errors['password']) {
                            $('#password').addClass('is-invalid').siblings('span').html(errors[
                                'password'])
                        } else {
                            $('#password').RemoveClass('is-invalid').siblings('span').html('')

                        }
                        if (errors['Currentpassword']) {
                            $('#Currentpassword').addClass('is-invalid').siblings('span').html(errors[
                                'Currentpassword'])
                        } else {
                            $('#Currentpassword').RemoveClass('is-invalid').siblings('span').html('')

                        }
                    }

                }
            })
        })
    </script>
@endsection