@extends('User.Dashboard.master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Favourite Course
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
                        <li class="breadcrumb-item active">All Favourite Courses</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>Favourite Courses</strong> List</h2>
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
                                                <th>Title</th>
                                                <th>Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($courses))
                                                @foreach ($courses as $course)
                                                    <tr id="favourite-course-{{ $course->id }}">

                                                        <td>
                                                            @if (isset($course->course->thumbnail) &&
                                                                    file_exists(public_path('Uploads/Course/thumbnail/small/' . $course->course->thumbnail)))
                                                                <img src="{{ asset('Uploads/Course/thumbnail/small/' . $course->course->thumbnail) }}"
                                                                    alt="Profile-Image" class="rounded-circle"
                                                                    width="50" height="50"
                                                                    style="object-fit: cover;">
                                                            @else
                                                                <img src="http://via.placeholder.com/35x35" alt="Avatar"
                                                                    class="rounded-circle">
                                                            @endif
                                                        </td>
                                                        <td>{{ ucwords($course->course->title) }}</td>
                                                        <td>${{ number_format($course->course->price, 2) }}</td>
                                                        <td>
                                                            <a
                                                                href="{{ route('User.CourseDetail', $course->course->slug) }}"><span
                                                                    class="badge badge-success">View</span></a>
                                                            <a href="javascript:void(0)" class="Remove"
                                                                data-id="{{ $course->id }}"><span
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
            if (confirm("Are you sure you want to Remove this course our favourite course list?")) {
                $('#response-loader').removeClass('hidden-loading-container')

                $.ajax({
                    url: "{{ route('User.RemoveFavourite.course') }}",
                    type: "delete",
                    data: {

                        id: $(this).data('id'),

                    },
                    dataType: "json",
                    success: function(response) {
                        $('#response-loader').addClass('hidden-loading-container')



                        if (response['status'] == true) {


                            $(`#favourite-course-${response['id']}`).remove();
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
