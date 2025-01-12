@extends('User.Dashboard.master')

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
                        <li class="breadcrumb-item"><a href="{{ route('User.dashboard.dashboard') }}"><i
                                    class="zmdi zmdi-home"></i> Ortho</a></li>
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
                                @if (isset(Auth::user()->profile_photo_path) &&
                                        file_exists(public_path('Uploads/Patient/Profile/' . Auth::user()->profile_photo_path)))
                                    <img src="{{ asset('Uploads/Patient/Profile/' . Auth::user()->profile_photo_path) }}"
                                        alt="Profile-Image">
                                @else
                                    <img src="{{ asset('Assets/Dashboard/assets/images/profile_av.jpg') }}"
                                        alt="Profile-Image">
                                @endif
                            </div>
                            <div>
                                <h4 class="m-b-0"><strong>{{ ucwords(Auth::user()->name) }}</strong></h4>
                                <span class="job_post"><a href="{{ route('User.dashboard.edit-profile') }}">Edit
                                        Profile</a></span>
                                @if (!empty($profile->address))
                                    <p>{{ ucwords($profile->address) }}.</p>
                                @endif
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
                                @if (!empty($profile->bio))
                                    <p>{{ ucwords($profile->bio) }}.</p>
                                @endif
                                <h6>Qualifications</h6>
                                <hr>
                                <ul class="list-unstyled">
                                    <li>
                                        <p><strong>Name:</strong> {{ ucwords(Auth::user()->name) }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                    </li>
                                    <li>
                                        <p><strong>City:</strong> {{ ucwords(Auth::user()->city) }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Phone No:</strong> {{ Auth::user()->phone }}</p>
                                    </li>
                                    @if (!empty($profile->address))
                                        <li>
                                            <p><strong>Address:</strong> {{ ucwords($profile->address) }}</p>
                                        </li>
                                    @endif
                                    @if (!empty($profile->gender))
                                        <li>
                                            <p><strong>Gender:</strong> {{ ucwords($profile->gender) }}</p>
                                        </li>
                                    @endif
                                    @if (!empty($profile->date_of_birth))
                                        <li>
                                            <p><strong>Date Of Birth:</strong>
                                                {{ \Carbon\Carbon::parse($profile->date_of_birth)->format('d-M-Y') }}</p>
                                        </li>
                                    @endif
                                    @if (!empty($profile->age))
                                        <li>
                                            <p><strong>Age:</strong> {{ $profile->age }}</p>
                                        </li>
                                    @endif


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

                    $('.is-invalid').removeClass('is-invalid');

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
                            $('#password').removeClass('is-invalid').siblings('span').html('')

                        }
                        if (errors['Currentpassword']) {
                            $('#Currentpassword').addClass('is-invalid').siblings('span').html(errors[
                                'Currentpassword'])
                        } else {
                            $('#Currentpassword').removeClass('is-invalid').siblings('span').html('')

                        }
                    }

                }
            })
        })

    </script>
@endsection
