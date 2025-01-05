@extends('Admin.master')

@section('content')
    <section class="content profile-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Doctor Profile
                        <small>Welcome to Ortho</small>
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
                        <li class="breadcrumb-item active">Doctor Profile</li>
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
                                @if (isset($doctor->profile_img) && file_exists(public_path('Uploads/Doctor/Profile/' . $doctor->profile_img)))
                                    <img src="{{ asset('Uploads/Doctor/Profile/' . $doctor->profile_img) }}"
                                        alt="profile-image">
                                @else
                                    <img src="{{ asset('Assets/Dashboard/assets/images/doctors/member1.png') }}"
                                        alt="profile-image">
                                @endif
                            </div>
                            <div>
                                <h4 class="m-b-0"><strong>Dr. {{ ucwords($doctor->name) }}</strong></h4>
                                <span class="job_post">{{ ucwords($doctor->speciality) }}</span>
                                <p>{{ ucwords($doctor->address) }}</p>
                            </div>
                            <div>
                                <button class="btn btn-danger btn-round" data-id="{{ $doctor->id }}"
                                    id="delete">Delete</button>
                                <button class="btn btn-danger btn-round btn-simple" data-id="{{ $doctor->id }}"
                                    id="status">Block</button>
                            </div>
                            <p class="social-icon m-t-5 m-b-0">
                                <a title="Twitter" href="{{ $doctor->Twitter }}" target="_blank"><i
                                        class="zmdi zmdi-twitter"></i></a>
                                <a title="Facebook" href="{{ $doctor->Facebook }}"><i class="zmdi zmdi-facebook"></i></a>
                                <a title="Instagram" href="{{ $doctor->Instagram }}"><i
                                        class="zmdi zmdi-instagram "></i></a>
                            </p>
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
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane body active" id="about">
                                <p>{{ ucwords($doctor->bio) }}.</p>
                                <h6>Qualifications</h6>
                                <hr>
                                <ul class="list-unstyled">
                                    <li>
                                        @if ($doctor->status == 'active')
                                            <p><strong>Account Status:</strong> <span class="badge badge-success"
                                                    id="status-badge">Active</span></p>
                                        @else
                                            <p><strong>Account Status:</strong> <span class="badge badge-danger"
                                                    id="status-badge">Blocked</span></p>
                                        @endif

                                    </li>
                                    <li>
                                        <p><strong>Email ID:</strong> {{ $doctor->email }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Phone No:</strong> {{ $doctor->phone }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Medical School:</strong> {{ ucwords($doctor->MedicalSchool) }}
                                        </p>
                                    </li>
                                    <li>
                                        <p><strong>Residency:</strong> {{ ucwords($doctor->city) }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Certifications:</strong> {{ ucwords($doctor->Certifications) }}
                                        </p>
                                    </li>
                                    <li>
                                        <p><strong>Gender:</strong> {{ ucwords($doctor->gender) }}</p>
                                    </li>
                                    @if (!empty($doctor->Experience))
                                        <li>
                                            <p><strong>Experience / Tranining:</strong>
                                                {{ ucwords($doctor->Experience) }}</p>
                                        </li>
                                    @endif
                                    @if (!empty($doctor->Internship))
                                        <li>
                                            <p><strong>Internship:</strong> {{ $doctor->Internship }}</p>
                                        </li>
                                    @endif


                                </ul>
                                <h6>Specialties</h6>
                                <hr>
                                <ul class="list-unstyled specialties">
                                    <li>{{ ucwords($doctor->speciality) }}</li>

                                </ul>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Recent</strong> Booking</h2>
                            <ul class="header-dropdown">

                            </ul>
                        </div>
                        <div class="body user_activity">
                            <div class="streamline b-accent">
                                <div class="sl-item">
                                    <img class="user rounded-circle"
                                        src="{{ asset('Assets/Dashboard/assets/images/xs/avatar4.jpg') }}" alt="">
                                    <div class="sl-content">
                                        <h5 class="m-b-0">Admin Birthday</h5>
                                        <small>Jan 21 <a href="javascript:void(0);" class="text-info">Sophia</a>.</small>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <img class="user rounded-circle"
                                        src="{{ asset('Assets/Dashboard/assets/images/xs/avatar5.jpg') }}" alt="">
                                    <div class="sl-content">
                                        <h5 class="m-b-0">Add New Contact</h5>
                                        <small>30min ago <a href="javascript:void(0);">Alexander</a>.</small>
                                        <small><strong>P:</strong> +264-625-2323</small>
                                        <small><strong>E:</strong> maryamamiri@gmail.com</small>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <img class="user rounded-circle"
                                        src="{{ asset('Assets/Dashboard/assets/images/xs/avatar6.jpg') }}" alt="">
                                    <div class="sl-content">
                                        <h5 class="m-b-0">General Surgery</h5>
                                        <small>Today <a href="javascript:void(0);">Grayson</a>.</small>
                                        <small>The standard chunk of Lorem Ipsum used since the 1500s is reproduced</small>
                                    </div>
                                </div>
                                <div class="sl-item">
                                    <img class="user rounded-circle"
                                        src="{{ asset('Assets/Dashboard/assets/images/xs/avatar7.jpg') }}" alt="">
                                    <div class="sl-content">
                                        <h5 class="m-b-0">General Surgery</h5>
                                        <small>45min ago <a href="javascript:void(0);" class="text-info">Fidel
                                                Tonn</a>.</small>
                                        <small><strong>P:</strong> +264-625-2323</small>
                                        <small>The standard chunk of Lorem Ipsum used since the 1500s is reproduced used
                                            since the 1500s is reproduced</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('js')
    <script>
        $('#status').click(function() {
            if (confirm("Are you sure you want to change the Account status of this user's account?")) {
                $('#status').prop('disabled', true);

                $.ajax({
                    url: "{{ route('Admin.doctor.ChangeStatus') }}",
                    type: "post",
                    data: {

                        id: $(this).data('id'),

                    },
                    dataType: "json",
                    success: function(response) {
                        $('#status').prop('disabled', false);

                        if (response['Doctorstatus'] == 'active') {

                            $('#status').removeClass('btn-success').addClass('btn-danger').html('Block')
                            $('#status-badge').removeClass('badge-danger').addClass('badge-success')
                                .html('Active')
                        } else {
                            $('#status').removeClass('btn-danger').addClass('btn-success').html(
                                'Active')
                            $('#status-badge').removeClass('badge-success').addClass('badge-danger')
                                .html('Block')

                        }

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
                })

            }

        })

        $('#delete').click(function() {
            if(confirm("Are you sure you want to Delete this user Account?"))
            $('#delete').prop('disabled', true);

            $.ajax({
                url: "{{ route('Admin.doctor.DeleteAccount') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('#delete').prop('disabled', false);
                    window.location.href = " {{ route('Admin.doctor') }}"

                }
            })

        })
    </script>
@endsection
