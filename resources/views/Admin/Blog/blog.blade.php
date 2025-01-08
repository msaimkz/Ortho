@extends('Admin.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection
@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Blogs
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.blog') }}">Blog</a></li>
                        <li class="breadcrumb-item active">All Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">

                <div class="col-xl-8 col-lg-12 col-md-12">
                    <div class="row clearfix">
                        @if (!empty($blogs))
                            @foreach ($blogs as $blog)
                                <div class="col-lg-6 col-md-12" id="blog-card-{{ $blog->id }}">
                                    <div class="card single_post">
                                        <div class="body">
                                            <h3 class="m-t-0 m-b-5"><a href="{{ route('Admin.blog.detail', $blog->slug) }}">
                                                    {{ ucwords($blog->title) }}</a></h3>
                                            <ul class="meta">
                                                <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By:
                                                        {{ ucwords($blog->author) }}</a></li>
                                                <li><a href="#"><i
                                                            class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                                            </ul>
                                            <ul class="meta" style="margin-top: 10px ">
                                                <li><a href="#">Status:
                                                        @if ($blog->status == 'active')
                                                            <span class="badge badge-success"
                                                                id="status-badge">Active</span>
                                                        @else
                                                            <span class="badge badge-danger"
                                                                id="status-badge">InActive</span>
                                                        @endif
                                                    </a></li>
                                                <li><a href="#">Is
                                                        Home:
                                                        @if ($blog->IsHome == 'yes')
                                                            <span class="badge badge-success" id="status-badge">Yes</span>
                                                        @else
                                                            <span class="badge badge-danger" id="status-badge">No</span>
                                                        @endif
                                                    </a></li>
                                            </ul>

                                        </div>
                                        <div class="body">
                                            <div class="img-post m-b-15">
                                                @if (isset($blog->thumbnail) && file_exists(public_path('Uploads/Blog/' . $blog->thumbnail)))
                                                    <img src="{{ asset('Uploads/blog/' . $blog->thumbnail) }}"
                                                        alt="Awesome Image">
                                                @else
                                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-3.jpg') }}"
                                                        alt="Awesome Image">
                                                @endif


                                            </div>
                                            <p>{{ ucwords($blog->short_description) }}</p>
                                            <a href="{{ route('Admin.blog.detail', $blog->slug) }}" title="read more"
                                                class="btn btn-round btn-info">Read More</a>
                                            <a href="{{ route('Admin.blog.edit', $blog->slug) }}" title="edit blog"
                                                class="btn btn-round btn-primary">Edit</a>
                                            <button type="button" title="delete blog" class="btn btn-round btn-danger delete"
                                                data-id="{{ $blog->id }}">Delete</button>


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
            if (confirm("Are you sure you want to Delete this Blog ?"))
                $('.delete').prop('disabled', true);

            $.ajax({
                url: "{{ route('Delete-Blog') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('.delete').prop('disabled', false);

                    

                    if (response['status'] == true) {

                        $(`#blog-card-${response['id']}`).remove();
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
                    else{

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
