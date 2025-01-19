@extends('Doctor.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/inbox.css') }}">
@endsection
@section('content')
    <section class="content inbox">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Reply Comment Message
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Inbox</a></li>
                        <li class="breadcrumb-item active">Reply Comment Message</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <form name="CommentForm" id="CommentForm">
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-xl-12">
                                        <input type="hidden" name="id" id="id" value="{{ $comment->id }}">
                                        <div class="form-group form-float">
                                            <input type="text" name="email" id="email" readonly
                                                class="form-control" value="{{ $comment->email }}" placeholder="To:">
                                            <span class="text-danger"></span>
                                        </div>
                                        <div class="form-group">
                                            <textarea rows="4" class="form-control no-resize" name="comment" id="comment"
                                                placeholder="Please Write  Comment...">{{ ($comment->reply != null) ? $comment->reply : '' }}</textarea>
                                            <span class="text-danger"></span>

                                        </div>

                                    </div>
                                    <div class="col-md-12 col-lg-12 col-xl-12">

                                        <button type="submit" class="btn btn-primary btn-round waves-effect m-t-20">Send
                                            Message</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('#CommentForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)
            $('#response-loader').removeClass('hidden-loading-container')

            $.ajax({
                url: "{{ route('doctor.comment.reply.msg') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false)
                    $('#response-loader').addClass('hidden-loading-container')

                    if (response['status'] == true) {

                        $('.is-invalid').removeClass('is-invalid');
                        $('span.text-danger').html('');

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

                        if (response['isError'] == true) {
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
    </script>
@endsection
