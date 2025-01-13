@extends('Admin.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection

@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Blog Detail
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.blog') }}">Blog</a></li>
                        <li class="breadcrumb-item active">Blog Detail</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card single_post">
                        <div class="body">
                            <h3 class="m-t-0 m-b-5"><a href="#">{{ ucwords($blog->title) }}</a></h3>
                            <ul class="meta">
                                <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted
                                        By:{{ ucwords($blog->author) }}</a></li>
                                <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="img-post m-b-15">
                                @if (isset($blog->thumbnail) && file_exists(public_path('Uploads/Blog/thumbnail/large/' . $blog->thumbnail)))
                                    <img src="{{ asset('Uploads/blog/' . $blog->thumbnail) }}" alt="Awesome Image">
                                @else
                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-3.jpg') }}"
                                        alt="Awesome Image">
                                @endif

                            </div>
                            <p>{{ ucwords($blog->description) }}</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2><strong>Comments</strong> {{ $BlogComments->count() }}</h2>
                        </div>
                        <div class="body">
                            <ul class="comment-reply list-unstyled">
                                @if (!empty($BlogComments))
                                    @foreach ($BlogComments as $BlogComment)
                                        <li class="row" id="Blog-Comment-{{ $BlogComment->id }}">
                                            <div class="icon-box col-md-2 col-4">
                                                @if (isset($BlogComment->user->profile_photo_path) &&
                                                        file_exists(public_path('Uploads/Patient/Profile/' . $BlogComment->user->profile_photo_path)))
                                                    <img src="{{ asset('Uploads/Patient/Profile/' . $BlogComment->user->profile_photo_path) }}"
                                                        alt="Awesome Image" class="img-fluid img-thumbnail">
                                                @else
                                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-3.jpg') }}"
                                                        alt="Awesome Image" class="img-fluid img-thumbnail">
                                                @endif
                                            </div>
                                            <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                                <h5 class="m-b-0">{{ ucwords($BlogComment->name) }}</h5>
                                                <p>{{ ucwords($BlogComment->comment) }}</p>
                                                <ul class="list-inline">
                                                    @if ($BlogComment->status == 'inactive')
                                                        <li><button type="button" data-status="{{ $BlogComment->status }}"
                                                                data-id="{{ $BlogComment->id }}"
                                                                class="btn btn-success status">Active</button></li>
                                                    @else
                                                        <li><button type="button" data-id="{{ $BlogComment->id }}"
                                                                data-status="{{ $BlogComment->status }}"
                                                                class="btn btn-danger status">Inactive</button></li>
                                                    @endif
                                                    <li><button type="button" data-id="{{ $BlogComment->id }}"
                                                            class="btn btn-danger delete">Delete</button></li>
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
    <script type="text/javascript">
        $('.status').click(function() {
            $('.status').prop('disabled', true);

            $.ajax({
                url: "{{ route('Blog.comment.status') }}",
                type: 'post',
                data: {
                    id: $(this).data('id'),
                    status: $(this).data('status')
                },
                dataType: 'json',
                success: function(response) {
                    $('.status').prop('disabled', false);

                    if (response['status'] == true) {

                        if (response['BlogCommentStatus'] == 'active') {

                            $('.status').removeClass('btn-success').addClass('btn-danger').html(
                                'Inactive')

                        } else {
                            $('.status').removeClass('btn-danger').addClass('btn-success').html(
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

        $('.delete').click(function() {
            if (confirm("Are you sure want to delete this Blog Comment")) {
                $('.delete').prop('disabled', true);

                $.ajax({
                    url: "{{ route('Blog.comment.delete') }}",
                    type: 'delete',
                    data: {
                        id: $(this).data('id'),
                    },
                    dataType: 'json',
                    success: function(response) {
                        $('.delete').prop('disabled', false);

                        $(`#Blog-Comment-${response['id']}`).remove();

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
