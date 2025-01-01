@extends('Admin.master')

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
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
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
                            <div class="profile-image"> <img
                                    src="{{ asset('Assets/Dashboard/assets/images/profile_av.jpg') }}" alt="">
                            </div>
                            <div>
                                <h4 class="m-b-0"><strong>{{ Auth::user()->name }}</strong></h4>
                                <span class="job_post"><a href="{{ route('Admin.profile.edit') }}">Edit Profile</a></span>
                                <p>795 Folsom Ave, Suite 600<br> San Francisco, CADGE 94107</p>
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
                                <p>Dr. Charlotte Deo Leon is a neurosurgeon in East Patchogue,Contrary to popular belief,
                                    Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
                                    literature from 45 BC, making it over 2000 years old. He received his medical degree
                                    from Harvard Medical School and has been in practice for 21 years. He is one of 5
                                    doctors at Brookhaven Memorial Hospital Medical Center and one of 9 at Southside
                                    Hospital who specialize in Neurological Surgery.</p>
                                <h6>Qualifications</h6>
                                <hr>
                                <ul class="list-unstyled">
                                    <li>
                                        <p><strong>Name:</strong> {{ Auth::user()->name }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                                    </li>
                                    <li>
                                        <p><strong>City:</strong> {{ Auth::user()->city }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Phone:</strong> {{ Auth::user()->phone }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Address:</strong> Certified Chiropractic Sports Physician 1982</p>
                                    </li>
                                    <li>
                                        <p><strong>Gender:</strong> Female</p>
                                    </li>
                                    <li>
                                        <p><strong>Date Of Birth:</strong> Past-President, Int. Fed. 1991</p>
                                    </li>
                                    <li>
                                        <p><strong>Age:</strong> Palmer Clinic</p>
                                    </li>
                                </ul>
                                <h6>Specialties</h6>
                                <hr>

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
    <script type="text/javascript">
        $('#ChangePasswordForm').submit(function(event) {

            event.preventDefault();
            var element = $(this);

            $.ajax({
                url: '{{ route('Admin.ChangePassword') }}',
                type: 'post',
                data: element.serializeArray(),
                dataType: 'json',
                success: function(response) {
                    $('#Currentpassword').val('')
                    $('#password').val('')
                    $('#password_confirmation').val('')
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
