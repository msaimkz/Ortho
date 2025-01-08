@extends('Admin.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection
@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Courses
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.course') }}">Course</a></li>
                        <li class="breadcrumb-item active">All Courses</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-8 col-lg-12 col-md-12">
                    <div class="row clearfix">
                        @if (!empty($courses))
                            @foreach ($courses as $course)
                              @php
                                  $chapterCount = $course->chapters->count();
                              @endphp
                                <div class="col-lg-6 col-md-12" id="course-card-{{ $course->id }}">
                                    <div class="card single_post">
                                        <div class="body">
                                            <h3 class="m-t-0 m-b-5"><a
                                                    href="{{ route('Admin.blog.detail', $course->slug) }}">
                                                    {{ ucwords($course->title) }}</a></h3>
                                            <ul class="meta">
                                                <li><a href="#"><i class="zmdi zmdi-money col-blue"></i>Price:
                                                        ${{ number_format($course->price, 2) }}</a></li>
                                                <li><a href="#"><i class="zmdi zmdi-book col-blue"></i>Chapter: {{ $chapterCount }}</a>
                                                </li>
                                            </ul>
                                            <ul class="meta" style="margin-top: 10px ">
                                                <li><a href="#">Status:
                                                        @if ($course->status == 'active')
                                                            <span class="badge badge-success"
                                                                id="status-badge">Active</span>
                                                        @else
                                                            <span class="badge badge-danger"
                                                                id="status-badge">InActive</span>
                                                        @endif
                                                    </a></li>
                                                <li><a href="#">Is
                                                        Home:
                                                        @if ($course->IsHome == 'yes')
                                                            <span class="badge badge-success" id="status-badge">Yes</span>
                                                        @else
                                                            <span class="badge badge-danger" id="status-badge">No</span>
                                                        @endif
                                                    </a></li>
                                            </ul>

                                        </div>
                                        <div class="body">
                                            <div class="img-post m-b-15">
                                                @if (isset($course->thumbnail) && file_exists(public_path('Uploads/Course/' . $course->thumbnail)))
                                                    <img src="{{ asset('Uploads/Course/' . $course->thumbnail) }}"
                                                        alt="Awesome Image">
                                                @else
                                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-3.jpg') }}"
                                                        alt="Awesome Image">
                                                @endif


                                            </div>
                                            <p>{{ ucwords($course->description) }}</p>
                                            <a href="{{ route('Admin.course.show', $course->slug) }}" title="read more"
                                                class="btn btn-round btn-info">Read More</a>
                                                @if ($chapterCount < 5)
                                                <a href="{{ route('Admin.course.chapter.create', $course->slug) }}" title="Add Chapter"
                                                    class="btn btn-round btn-info">Add Chapter</a>
                                                @endif
                                            
                                            <a href="{{ route('Admin.course.edit', $course->slug) }}" title="edit course"
                                                class="btn btn-round btn-primary">Edit</a>
                                            <button type="button" title="delete course" class="btn btn-round btn-danger delete"
                                                data-id="{{ $course->id }}" >Delete</button>


                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.delete').click(function() {
            if (confirm("Are you sure you want to Delete this Course ?"))
                $('.delete').prop('disabled', true);

            $.ajax({
                url: "{{ route('Admin.course.delete') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('.delete').prop('disabled', false);



                    if (response['status'] == true) {

                        $(`#course-card-${response['id']}`).remove();
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

        })
    </script>
@endsection
