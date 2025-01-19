@extends('User.Dashboard.master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Patients
                        <small class="text-muted">Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                        type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('User.dashboard.dashboard') }}"><i
                                    class="zmdi zmdi-home"></i> Ortho</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Favourite Doctors</a></li>
                        <li class="breadcrumb-item active">All Favourite Doctors</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>Favourite Doctors</strong> List</h2>
                            <ul class="header-dropdown">

                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->


                            <!-- Tab panes -->
                            <div class="tab-content m-t-10">
                                <div class="tab-pane table-responsive active" id="All">
                                    <table class="table m-b-0 table-hover">
                                        <thead>
                                            <tr>

                                                <th></th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>City</th>
                                                <th>Number</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($doctors))
                                                @foreach ($doctors as $doctor)
                                                    <tr id="favourite-doctor-{{ $doctor->id }}">

                                                        <td>
                                                            @if (isset($doctor->doctor->profile_photo_path) &&
                                                                    file_exists(public_path('Uploads/Doctor/Profile/' . $doctor->doctor->profile_photo_path)))
                                                                <img src="{{ asset('Uploads/Doctor/Profile/' . $doctor->doctor->profile_photo_path) }}"
                                                                    alt="Profile-Image" class="rounded-circle"
                                                                    width="50" height="50"
                                                                    style="object-fit: cover;">
                                                            @else
                                                                <img src="http://via.placeholder.com/35x35" alt="Avatar"
                                                                    class="rounded-circle">
                                                            @endif
                                                        </td>
                                                        <td>{{ ucwords($doctor->doctor->name) }}</td>
                                                        <td>{{ $doctor->doctor->email }}</td>
                                                        <td>{{ ucwords($doctor->doctor->city) }}</td>
                                                        <td>{{ $doctor->doctor->phone }}</td>

                                                        <td>
                                                            <a href="{{ route('User.DoctorDetail', $doctor->doctor->id) }}"><span
                                                                    class="badge badge-success">View</span></a>
                                                            <a href="javascript:void(0)" class="Remove"
                                                                data-id="{{ $doctor->id }}"><span
                                                                    class="badge badge-danger">Remove to
                                                                    Favourite</span></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                            @endif

                                        </tbody>
                                    </table>
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
        $('.Remove').click(function() {
            if (confirm("Are you sure you want to Remove this doctor our favourite doctors list?")){
                $('#response-loader').removeClass('hidden-loading-container')

            $.ajax({
                url: "{{ route('User.RemoveFavourite.doctor') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('#response-loader').addClass('hidden-loading-container')



                    if (response['status'] == true) {


                        $(`#favourite-doctor-${response['id']}`).remove();
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

                }
            })
        }
        })
    </script>
@endsection
