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
                    <h2>Edit Course
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.course') }}">Course</a></li>
                        <li class="breadcrumb-item active">Edit Course</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form id="CourseForm" name="CourseForm">
                <div class="row">



                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="title" id="title"
                                        placeholder="Enter Course title" value="{{ $course->title }}" />
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
                                        placeholder="Enter Course Slug" value="{{ $course->slug }}" />
                                    <span class="text-danger"></span>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control show-tick">
                                    <option value="inactive" {{ $course->status == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                    <option value="active" {{ $course->status == 'active' ? 'selected' : '' }}>Active
                                    </option>

                                </select>
                                <span class="text-danger"></span>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <label for="IsHome">Is Home</label>

                                <select name="IsHome" id="IsHome" class="form-control show-tick">
                                    <option value="yes" {{ $course->IsHome == 'yes' ? 'selected' : '' }}>Yes</option>
                                    <option value="no" {{ $course->IsHome == 'no' ? 'selected' : '' }}>No</option>

                                </select>
                                <span class="text-danger"></span>

                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="price" id="price"
                                        placeholder="Enter Course Price" value="{{ $course->price }}" />
                                    <span class="text-danger"></span>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <label for="">Descripion</label>

                                <div class="form-group">
                                    <textarea rows="4" class="form-control no-resize" name="description" id="description"
                                        placeholder="Please Write  Descriptipn...">{{ $course->description }}</textarea>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>




                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">


                                <div style="cursor: pointer" id="image" class="dropzone m-b-20 m-t-20" method="post"
                                    enctype="multipart/form-data">
                                    <div class="dz-message">
                                        <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                        <h3>Drop files here or click to upload.</h3>
                                        <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually
                                            uploaded.)</em>
                                    </div>

                                </div>
                                <span class="text-danger" id="ImageInfo"></span>

                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="a2017">
                                <div class="row clearfix" id="image-row">

                                    @if (!empty($course->thumbnail))
                                        <div class="col-lg-3 col-md-4 col-sm-12">
                                            <input type="hidden" name="thumbnail" id="thumbnail"
                                                value="{{ $course->id }}">
                                            <div class="card">
                                                <div class="file">
                                                    <a href="javascript:void(0);">

                                                        <div class="image">
                                                            <img src="{{ asset('Uploads/Course/' . $course->thumbnail) }}"
                                                                alt="img" class="img-fluid">
                                                        </div>
                                                        <div class="file-name">
                                                            <button type="button"
                                                                class="btn btn-danger btn-round waves-effect m-3">Delete</button>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="card">
                            <div class="body">

                                <button type="submit"
                                    class="btn btn-primary btn-round waves-effect m-t-20">Update</button>
                                <a href="{{ route('Admin.course') }}"
                                    class="btn  btn-outline-secondary btn-round waves-effect m-t-20">Back</a>
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
        Dropzone.autoDiscover = false;
        const dropzone = $("#image").dropzone({
            url: "{{ route('TempImages') }}",
            maxFiles: 1,
            paramName: 'image',
            addRemoveLinks: true,
            acceptedFiles: "image/jpeg,image/png,image/gif",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            init: function() {
                this.on('addedfile', function(file) {
                    if (this.files.length > 1) {

                        this.removeFile(this.files[0]);
                    }
                });

                this.on('success', function(file, response) {

                    this.removeAllFiles(true);


                    var baseUrl = "{{ asset('Uploads/temp/') }}";
                    var imgCard = `
                 <div class="col-lg-3 col-md-4 col-sm-12">
                                <input type="hidden" name="thumbnail" id="thumbnail" value="${response['id']}">
                                <div class="card">
                                    <div class="file">
                                        <a href="javascript:void(0);">
                                           
                                            <div class="image">
                                                <img src="${baseUrl}/${response['imageName']}" alt="img" class="img-fluid">
                                            </div>
                                            <div class="file-name">
                                                <button type="button" class="btn btn-danger btn-round waves-effect m-3">Delete</button>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
            `;
                    $('#image-row').html(imgCard);
                });

                this.on('removedfile', function(file) {
                    console.log("File removed from Dropzone preview:", file);
                });
            }
        });


        $('#image-row').on('click', '.btn-danger', function(event) {
            event.preventDefault();
            $(this).closest('.col-md-4').remove();
        });

        $('#CourseForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)

            $.ajax({
                url: "{{ route('Admin.course.update', $course->id) }}",
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

                        window.location.href = "{{ route('Admin.course') }}"

                    } else {

                        if (response['noChapter'] == true) {
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
                        if (response['IsNotFound'] == true) {
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
                            } else {

                                if (key === 'thumbnail') {
                                    $('#ImageInfo').html(value);
                                }

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
