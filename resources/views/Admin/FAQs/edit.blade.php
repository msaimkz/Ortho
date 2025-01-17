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
                    <h2>Edit FAQ
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.FAQ') }}">FAQ</a></li>
                        <li class="breadcrumb-item active">Edit FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form action="" id="FAQForm" name="FAQForm">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" name="question" id="question" class="form-control"
                                        placeholder="Enter FAQ Question" value="{{ $FAQ->question }}" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" name="slug" id="slug" readonly class="form-control"
                                        placeholder="Enter FAQ Slug" value="{{ $FAQ->slug }}" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <label for="answer">Answer</label>

                                <div class="form-group">
                                    <textarea rows="4" name="answer" id="answer" class="form-control no-resize"
                                        placeholder="Please Write  Answer...">{{ $FAQ->answer }}</textarea>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control show-tick">
                                    <option value="visible" {{ $FAQ->status == 'visible' ? 'selected' : '' }}>Visible
                                    </option>
                                    <option value="hidden" {{ $FAQ->status == 'hidden' ? 'selected' : '' }}>Hidden
                                    </option>

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-12">

                        <div class="card">
                            <div class="body">
                                <button type="submit" class="btn btn-primary btn-round waves-effect m-t-20">Update</button>

                                <a href="{{ route('Admin.FAQ') }}"
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
        $('#FAQForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)
            $('#response-loader').removeClass('hidden-loading-container')

            $.ajax({
                url: "{{ route('Admin.FAQ.update', $FAQ->id) }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false)
                    $('#response-loader').addClass('hidden-loading-container')

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

                        window.location.href = "{{ route('Admin.FAQ') }}"

                    } else {

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
                            }
                        });
                    }
                }
            })
        })
        $('#question').change(function() {
            var element = $(this).val();
            $('button[type=submit]').prop('disabled', true)
            $('#response-loader').removeClass('hidden-loading-container')

            $.ajax({
                url: '{{ route('GetSlug') }}',
                type: 'get',
                data: {
                    title: element
                },
                dataType: 'json',
                success: function(respose) {
                    $('button[type=submit]').prop('disabled', false)
                $('#response-loader').addClass('hidden-loading-container')

                    $('#slug').val(respose['slug']);
                }
            })
        })
    </script>
@endsection
