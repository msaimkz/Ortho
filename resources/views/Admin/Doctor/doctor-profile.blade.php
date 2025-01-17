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
                                @if ($Schedules != null)
                                    @foreach ($Schedules as $Schedule)
                                        <small class="text-muted">{{ ucwords($Schedule->day) }}</small>
                                        <p>{{ \Carbon\Carbon::parse($Schedule->start_time)->format('g:i A') }} -
                                            {{ \Carbon\Carbon::parse($Schedule->end_time)->format('g:i A') }}</p>
                                        <hr>
                                    @endforeach
                                @else
                                @endif
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
                                        @if ($doctor->DoctorStatus == 'active')
                                            <p><strong>Doctor Account Status:</strong> <span
                                                    class="badge badge-success">Active</span></p>
                                        @else
                                            <p><strong>Doctor Account Status:</strong> <span
                                                    class="badge badge-danger">Blocked</span></p>
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
                                @if (!empty($appointments))
                                    @foreach ($appointments as $appointment)
                                        <div class="sl-item">
                                            @if (isset($appointment->patient->profile_photo_path) &&
                                                    file_exists(public_path('Uploads/Patient/Profile/' . $appointment->patient->profile_photo_path)))
                                                <img src="{{ asset('Uploads/Patient/Profile/' . $appointment->patient->profile_photo_path) }}"
                                                    alt="profile-image" class="user rounded-circle">
                                            @else
                                                <img src="{{ asset('Assets/Dashboard/assets/images/xs/avatar4.jpg') }}"
                                                    alt="profile-image" class="user rounded-circle">
                                            @endif

                                            <div class="sl-content">
                                                <h5 class="m-b-0">{{ ucwords($appointment->name) }}</h5>
                                                <small>{{ \Carbon\Carbon::parse($appointment->date)->format('d D M Y') }}
                                                    <a href="javascript:void(0);" class="text-info">
                                                        {{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}-{{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}</a>.</small>
                                                <small>
                                                    @if ($appointment->status == 'pending')
                                                        <span class="badge badge-danger">Pending</span>
                                                    @elseif ($appointment->status == 'approved')
                                                        <span class="badge badge-success">Approved</span>
                                                    @elseif ($appointment->status == 'rejected')
                                                        <span class="badge badge-danger">Rejected</span>
                                                    @else
                                                        <span class="badge badge-danger">Cancelled</span>
                                                    @endif
                                                </small>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif


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
                $('#response-loader').removeClass('hidden-loading-container')

                $.ajax({
                    url: "{{ route('Admin.doctor.ChangeStatus') }}",
                    type: "post",
                    data: {

                        id: $(this).data('id'),

                    },
                    dataType: "json",
                    success: function(response) {
                        $('#status').prop('disabled', false);
                        $('#response-loader').addClass('hidden-loading-container')

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
            if (confirm("Are you sure you want to Delete this user Account?"))
                $('#delete').prop('disabled', true);
            $('#response-loader').removeClass('hidden-loading-container')

            $.ajax({
                url: "{{ route('Admin.doctor.DeleteAccount') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('#delete').prop('disabled', false);
                    $('#response-loader').addClass('hidden-loading-container')

                    window.location.href = " {{ route('Admin.doctor') }}"

                }
            })

        })
    </script>
@endsection
