@extends('Admin.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection

@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Edit Chapter
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.course') }}">Course</a></li>
                        <li class="breadcrumb-item active">Edit Chapter</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form id="ChapterForm" name="ChapterForm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card single_post">
                            <div class="body">
                                <h3 class="m-t-0 m-b-5">Course Title</h3>

                                <p>{{ ucwords($course->title) }}</p>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter Chapter title" value="{{ $chapter->title }}" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" readonly class="form-control" name="slug" id="slug"
                                        placeholder="Enter Chapter Slug" value="{{ $chapter->slug }}" />
                                    <span class="text-danger"></span>

                                </div>
                            </div>
                        </div>

                    </div>
                  

        
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <label for="">Content</label>

                                <div class="form-group">
                                    <textarea rows="4" class="form-control no-resize" name="content" id="content" placeholder="Please Write  Content...">{{ $chapter->content }}</textarea>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">

                                <button type="submit" class="btn btn-primary btn-round waves-effect m-t-20">Update</button>
                                <a href="{{ route('Admin.course.show',$course->slug) }}" class="btn  btn-outline-secondary btn-round waves-effect m-t-20">Back</a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.js') }}"></script> <!-- Dropzone Plugin Js -->
    <script src="{{ asset('Assets/Dashboard/assets/plugins/ckeditor/ckeditor.js') }}"></script> <!-- Ckeditor -->

    <script>
    

        $('#ChapterForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)

            $.ajax({
                url: "{{ route('Admin.course.chapter.update',$chapter->id) }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false)

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

                        window.location.href = "{{ route('Admin.course.show',$course->slug) }}"

                    } else {

                        if(response['IsNotFound'] == true){
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

                        if(response['ChapterComplete'] == true){
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

                        var errors = response['errors'];


                        $('.is-invalid').removeClass('is-invalid');
                        $('span.text-danger').html('');


                        $.each(errors, function(key, value) {
                            var field = $('#' + key);
                            if (field.length) {
                                field.addClass('is-invalid').siblings('span.text-danger')
                                    .html(value);
                            } 
                        });
                    }

                }
            })
        })

        $('#title').change(function() {
            var element = $(this).val();
            $('button[type=submit]').prop('disabled', true)
            $.ajax({
                url: '{{ route('GetSlug') }}',
                type: 'get',
                data: {
                    title: element
                },
                dataType: 'json',
                success: function(respose) {
                    $('button[type=submit]').prop('disabled', false)
                    $('#slug').val(respose['slug']);
                }
            })
        })
    </script>
@endsection
