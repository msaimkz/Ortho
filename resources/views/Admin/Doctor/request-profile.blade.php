@extends('Admin.master')

@section('content')
    <section class="content profile-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Doctor Request Profile
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
                        <li class="breadcrumb-item active">Doctor Request Profile</li>
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
                                    src="{{ asset('Uploads/Doctor Request/Profile/' . $doctorRequest->profile_img) }}"
                                    alt=""> </div>
                            <div>
                                <h4 class="m-b-0"><strong>Dr. {{ ucwords($doctorRequest->name) }}</strong></h4>
                                <span class="job_post">{{ ucwords($doctorRequest->speciality) }}</span>
                                <p>{{ ucwords($doctorRequest->address) }}</p>
                            </div>
                            <div id="button-container">
                                @if ($doctorRequest->status == 'pending')
                                    <button class="btn btn-success btn-round" id="approve"
                                        data-id="{{ $doctorRequest->id }}">Approve</button>
                                    <button class="btn btn-danger btn-round" id="reject"
                                        data-id="{{ $doctorRequest->id }}">Reject</button>
                                @else
                                    <button class="btn btn-danger btn-round" id="delete"
                                        data-id="{{ $doctorRequest->id }}">Delete</button>
                                @endif

                            </div>
                            <p class="social-icon m-t-5 m-b-0">
                                <a title="Twitter" href="{{ $doctorRequest->Twitter }}" target="_blank"><i
                                        class="zmdi zmdi-twitter"></i></a>
                                <a title="Facebook" href="{{ $doctorRequest->Facebook }}"><i
                                        class="zmdi zmdi-facebook"></i></a>
                                <a title="Instagram" href="{{ $doctorRequest->Instagram }}"><i
                                        class="zmdi zmdi-instagram "></i></a>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-4 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ asset('Uploads/Doctor Request/Degree/' . $doctorRequest->graduate_degree) }}"
                                    target="_blank">
                                    <div class="icon">
                                        <img src="{{ asset('Assets/User/assets/img/PDF.png') }}" class="img-fluid"
                                            alt="">
                                    </div>
                                    <div class="file-name">
                                        <p class="m-b-5 text-muted">Graduation Degree.pdf</p>
                                        <small><span
                                                class="date text-muted">{{ \Carbon\Carbon::parse($doctorRequest->created_at)->format('M d Y') }}</span></small>
                                    </div>
                                </a>
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
                                <p>{{ ucwords($doctorRequest->bio) }}.</p>
                                <h6>Qualifications</h6>
                                <hr>
                                <ul class="list-unstyled">
                                    <li>
                                        <p><strong>Email ID:</strong> {{ $doctorRequest->email }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Phone No:</strong> {{ $doctorRequest->phone }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Medical School:</strong> {{ ucwords($doctorRequest->MedicalSchool) }}
                                        </p>
                                    </li>
                                    <li>
                                        <p><strong>Residency:</strong> {{ ucwords($doctorRequest->city) }}</p>
                                    </li>
                                    <li>
                                        <p><strong>Certifications:</strong> {{ ucwords($doctorRequest->Certifications) }}
                                        </p>
                                    </li>
                                    <li>
                                        <p><strong>Gender:</strong> {{ ucwords($doctorRequest->gender) }}</p>
                                    </li>
                                    @if (!empty($doctorRequest->Experience))
                                        <li>
                                            <p><strong>Experience / Tranining:</strong>
                                                {{ ucwords($doctorRequest->Experience) }}</p>
                                        </li>
                                    @endif
                                    @if (!empty($doctorRequest->Internship))
                                        <li>
                                            <p><strong>Internship:</strong> {{ $doctorRequest->Internship }}</p>
                                        </li>
                                    @endif


                                </ul>
                                <h6>Specialties</h6>
                                <hr>
                                <ul class="list-unstyled specialties">
                                    <li>{{ ucwords($doctorRequest->speciality) }}</li>

                                </ul>
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
        $('#approve').click(function() {
            $('#approve').prop('disabled', true);

            $.ajax({
                url: "{{ route('Admin.doctor.RequestChangeStatus') }}",
                type: "post",
                data: {

                    id: $(this).data('id'),
                    status: 'approve'
                },
                dataType: "json",
                success: function(response) {
                    $('#approve').prop('disabled', false);
                    var html = `<button class="btn btn-danger btn-round" id="delete"
                                        data-id="{{ $doctorRequest->id }}">Delete</button>`
                    $('#button-container').html(html)

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

        })

        $('#reject').click(function() {
            $('#reject').prop('disabled', true);

            $.ajax({
                url: "{{ route('Admin.doctor.RequestChangeStatus') }}",
                type: "post",
                data: {

                    id: $(this).data('id'),
                    status: 'reject'
                },
                dataType: "json",
                success: function(response) {
                    $('#reject').prop('disabled', false);
                    var html = `<button class="btn btn-danger btn-round" id="delete"
                                        data-id="{{ $doctorRequest->id }}">Delete</button>`
                    $('#button-container').html(html)
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

        })
        $('#delete').click(function() {
            $('#delete').prop('disabled', true);

            $.ajax({
                url: "{{ route('Admin.doctor.RequestDelete') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('#delete').prop('disabled', false);

                    if (response['status'] == true) {

                        window.location.href = "{{ route('Admin.doctor.request') }}"
                    }
                }
            })

        })
    </script>
@endsection
