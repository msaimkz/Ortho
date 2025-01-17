@extends('Admin.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection

@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Course Detail
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.course') }}">Course</a></li>
                        <li class="breadcrumb-item active">Course Detail</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card single_post">
                        <div class="body">
                            <h3 class="m-t-0 m-b-5"><a href="#">{{ ucwords($course->title) }}</a></h3>
                            <ul class="meta">
                                <li><a href="#"><i class="zmdi zmdi-money col-blue"></i>Price:
                                        ${{ number_format($course->price, 2) }}</a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="img-post m-b-15">
                                @if (isset($course->thumbnail) && file_exists(public_path('Uploads/Course/' . $course->thumbnail)))
                                    <img src="{{ asset('Uploads/Course/' . $course->thumbnail) }}" alt="Awesome Image">
                                @else
                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-3.jpg') }}"
                                        alt="Awesome Image">
                                @endif

                            </div>
                            <p>{{ ucwords($course->description) }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Comments</strong> {{ $CourseComments->count() }}</h2>
                        </div>
                        <div class="body">
                            <ul class="comment-reply list-unstyled">
                                @if (!empty($CourseComments))
                                    @foreach ($CourseComments as $CourseComment)
                                        <li class="row" id="Course-Comment-{{ $CourseComment->id }}">
                                            <div class="icon-box col-md-2 col-4">
                                                @if (isset($CourseComment->user->profile_photo_path) &&
                                                        file_exists(public_path('Uploads/Patient/Profile/' . $CourseComment->user->profile_photo_path)))
                                                    <img src="{{ asset('Uploads/Patient/Profile/' . $CourseComment->user->profile_photo_path) }}"
                                                        alt="Awesome Image" class="img-fluid img-thumbnail">
                                                @else
                                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-3.jpg') }}"
                                                        alt="Awesome Image" class="img-fluid img-thumbnail">
                                                @endif
                                            </div>
                                            <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                                <h5 class="m-b-0">{{ ucwords($CourseComment->name) }}</h5>
                                                <p>{{ ucwords($CourseComment->comment) }}</p>
                                                <ul class="list-inline">
                                                    @if ($CourseComment->status == 'inactive')
                                                        <li><button type="button" data-status="{{ $CourseComment->status }}"
                                                                data-id="{{ $CourseComment->id }}"
                                                                class="btn btn-success Commentstatus">Active</button></li>
                                                    @else
                                                        <li><button type="button" data-id="{{ $CourseComment->id }}"
                                                                data-status="{{ $CourseComment->status }}"
                                                                class="btn btn-danger Commentstatus">Inactive</button></li>
                                                    @endif
                                                    <li><button type="button" data-id="{{ $CourseComment->id }}"
                                                            class="btn btn-danger Commentdelete">Delete</button></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <hr>
                                    @endforeach
                                @endif


                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Chapters</strong> <span class="chapter-counter"> {{ $chapterCount }}</span></h2>
                        </div>
                        <div class="body">
                            <ul class="comment-reply list-unstyled">
                                @if ($course->chapters != null)
                                    @foreach ($course->chapters as $chapter)
                                        <li class="row mb-5" id="chapter-{{ $chapter->id }}">
                                            <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                                <h5 class="m-b-0">Chapter 0<span
                                                        class="chapter-number">{{ $chapter->sequence }}</span>:
                                                    {{ ucwords($chapter->title) }} </h5>
                                                <p>{{ ucwords($chapter->content) }}</p>
                                                <ul class="list-inline">
                                                    <li><a href="{{ route('Admin.course.chapter.edit', $chapter->slug) }}"
                                                            class="btn btn-info">Edit</a></li>
                                                    <li><button type="button" class="btn btn-danger delete"
                                                            data-id="{{ $chapter->id }}">Delete</button></li>
                                                </ul>
                                            </div>
                                        </li>
                                        <hr>
                                    @endforeach
                                @endif


                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection


@section('js')
    <script>
        $('.delete').click(function() {
            if (confirm("Are you sure you want to Delete this Chapter ?"))
                $('.delete').prop('disabled', true);
                $('#response-loader').removeClass('hidden-loading-container')

            $.ajax({
                url: "{{ route('Admin.course.chapter.delete') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('.delete').prop('disabled', false);
                    $('#response-loader').addClass('hidden-loading-container')



                    if (response['status'] == true) {

                        $(`#chapter-${response['id']}`).remove();
                        const deletedChapterNumber = response['deletedChapterNumber'];

                      
                        $('.chapter-number').each(function() {
                            const currentNumber = parseInt($(this).text());

                            
                            if (currentNumber > deletedChapterNumber) {
                                $(this).text(currentNumber - 1);
                            }
                        });

                         var chapterNumber= parseInt($('.chapter-counter').text());
                         chapterNumber--
                         $('.chapter-counter').text(chapterNumber)
                         
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
        $('.Commentstatus').click(function() {
            $('.Commentstatus').prop('disabled', true);
            $('#response-loader').removeClass('hidden-loading-container')

            $.ajax({
                url: "{{ route('Course.comment.status') }}",
                type: 'post',
                data: {
                    id: $(this).data('id'),
                    status: $(this).data('status')
                },
                dataType: 'json',
                success: function(response) {
                    $('.Commentstatus').prop('disabled', false);
                    $('#response-loader').addClass('hidden-loading-container')

                    if (response['status'] == true) {

                        if (response['CourseCommentStatus'] == 'active') {

                            $('.Commentstatus').removeClass('btn-success').addClass('btn-danger').html(
                                'Inactive')

                        } else {
                            $('.Commentstatus').removeClass('btn-danger').addClass('btn-success').html(
                                'Active')


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

        $('.Commentdelete').click(function() {
            if (confirm("Are you sure want to delete this Course Comment")) {
                $('.Commentdelete').prop('disabled', true);
                $('#response-loader').removeClass('hidden-loading-container')

                $.ajax({
                    url: "{{ route('Course.comment.delete') }}",
                    type: 'delete',
                    data: {
                        id: $(this).data('id'),
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.Commentdelete').prop('disabled', false);
                        $('#response-loader').addClass('hidden-loading-container')

                        $(`#Course-Comment-${response['id']}`).remove();

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
