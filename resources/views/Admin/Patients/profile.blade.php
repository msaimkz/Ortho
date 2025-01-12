@extends('Admin.master')

@section('content')
    <section class="content profile-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Patient Profile
                        <small class="text-muted">Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                        type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Patients</a></li>
                        <li class="breadcrumb-item active">Patient Profile</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="card member-card">
                        <div class="header l-coral">
                            <h4 class="m-t-10">{{ ucwords($patient->name) }}</h4>
                        </div>
                        <div class="member-img">
                            <a href="#">
                                @if (isset($profile->profile_img) && file_exists(public_path('Uploads/Patient/Profile/' . $profile->profile_img)))
                                    <img src="{{ asset('Uploads/Patient/Profile/' . $profile->profile_img) }}"
                                        alt="Profile-Image" class="rounded-circle">
                                @else
                                    <img src="{{ asset('Assets/Dashboard/assets/images/sm/avatar1.jpg') }}" alt="Avatar"
                                        class="rounded-circle">
                                @endif
                            </a>
                        </div>
                        <div class="body">
                            <div>
                                <button href="javascript:void(0)" class="btn btn-danger" id="delete">Delete</button>
                                @if ($patient->status == 'active')
                                    <button type="button" class="btn btn-danger" id="status">Block</button>
                                @else
                                    <button type="button" class="btn btn-success" id="status">Active</button>
                                @endif
                            </div>
                            <hr>
                            @if ($patient->status == 'active')
                                <strong>Status</strong>
                                <p><span class="badge badge-success" id="status-badge">Active</span></p>
                            @else
                                <strong>Status</strong>
                                <p><span class="badge badge-danger" id="status-badge">Block</span></p>
                            @endif
                            <hr>
                            <strong>Email ID</strong>
                            <p>{{ $patient->email }}</p>
                            <strong>City</strong>
                            <p>{{ ucwords($patient->city) }}</p>
                            <strong>Phone</strong>
                            <p>{{ $patient->phone }}</p>
                            @if (!empty($profile->age))
                                <strong>Age</strong>
                                <p>{{ $profile->age }}</p>
                            @endif
                            @if (!empty($profile->gender))
                                <strong>Gender</strong>
                                <p>{{ ucwords($profile->gender) }}</p>
                            @endif
                            @if (!empty($profile->date_of_birth))
                                <strong>Date Of Birth</strong>
                                <p>{{ \Carbon\Carbon::parse($profile->date_of_birth)->format('d D M Y') }}</p>
                            @endif

                            @if (!empty($profile->address))
                                <hr>
                                <strong>Address</strong>
                                <address>{{ ucwords($profile->address) }}</address>
                            @endif

                        </div>
                    </div>

                </div>
                <div class="col-lg-8 col-md-12 col-sm-12">
                    @if (!empty($profile->bio))
                        <div class="card">
                            <div class="body">

                                <p>{{ $profile->bio }}. </p>


                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script type="text/javascript">
        $('#status').click(function() {
            $('#status').prop('disabled', true);

            $.ajax({
                url: '{{ route('Admin.patients.statusChange', $patient->id) }}',
                type: 'get',
                data: {},
                dataType: 'json',
                success: function(response) {
                    $('#status').prop('disabled', false);

                    if (response['status'] == true) {

                        if (response['patientStatus'] == 'active') {

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

                }
            })
        })

        $('#delete').click(function() {
            $('#delete').prop('disabled', true);

            $.ajax({
                url: '{{ route('Admin.patients.DeletePatient', $patient->id) }}',
                type: 'delete',
                data: {},
                dataType: 'json',
                success: function(response) {
                    $('#delete').prop('disabled', false);

                    if (response['status'] == true) {

                        window.location.href = "{{ route('Admin.patients') }}"
                    }

                }
            })
        })
    </script>
@endsection
