@extends('Admin.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection

@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Contact Message
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.contact.index') }}">Contact Message</a></li>
                        <li class="breadcrumb-item active">Contact Message</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Name</h3>

                                    <p>{{ ucwords($Contact->name) }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Email</h3>

                                    <p>{{ $Contact->email }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Phone</h3>

                                    <p>{{ $Contact->phone }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Subject</h3>

                                    <p>{{ ucwords($Contact->subject) }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Comment</h3>

                                    <p>{{ ucwords($Contact->comment) }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12" id="reply-container">
                            @if ($Contact->reply == null)
                                <form name="ReplyForm" id="ReplyForm">

                                    <div class="card">
                                        <div class="body">
                                            <label for="reply">Reply</label>

                                            <div class="form-group">
                                                <textarea rows="4" name="reply" id="reply" class="form-control no-resize"
                                                    placeholder="Please Write  Reply Message..."></textarea>
                                                <span class="text-danger"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="body">
                                            <button type="submit"
                                                class="btn btn-primary btn-round waves-effect m-t-20">Send</button>

                                            <a href="{{ route('Admin.contact.index') }}"
                                                class="btn  btn-outline-secondary btn-round waves-effect m-t-20">Back</a>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <div class="card single_post">
                                    <div class="body">
                                        <h3 class="m-t-0 m-b-5">Reply Message</h3>

                                        <p>{{ ucwords($Contact->reply) }}</p>
                                    </div>
                                </div>
                            @endif

                        </div>





                    </div>


                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('#ReplyForm').submit(function(event) {
            event.preventDefault();
            var data = $('#reply').val();
            $('button[type=submit]').prop('disabled', true)


            $.ajax({
                url: "{{ route('Admin.contact.sendReply') }}",
                type: "post",
                data: {
                    reply: data,
                    id: {{ $Contact->id }}
                },
                dataType: "json",
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false)

                    if (response['status'] == true) {

                        $('#ReplyForm')[0].reset();

                        $('.is-invalid').removeClass('is-invalid');
                        $('span.text-danger').html('');

                        var html = ` <div class="card single_post">
                                    <div class="body">
                                        <h3 class="m-t-0 m-b-5">Reply Message</h3>

                                        <p>${response['replyMsg']}</p>
                                    </div>
                                </div>`;

                        $("#reply-container").html(html)

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

                        if (response['IsFound'] == false) {

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
