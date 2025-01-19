@extends('Doctor.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/inbox.css') }}">
@endsection

@section('content')
    <section class="content inbox">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Inbox
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item active">Inbox</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <ul class="mail_list list-group list-unstyled">
                        @if (!empty($comments))
                            @foreach ($comments as $comment)
                                <li class="list-group-item {{ $comment->isView == 'no' ? 'unread' : '' }}">
                                    <div class="media">
                                        <div class="pull-left">
                                            <div class="controls">

                                                <a id="favourite" href="javascript:void(0);"
                                                    class="favourite {{ $comment->isFavourite == 'yes' ? 'col-amber' : '' }} {{ $comment->isFavourite == 'no' ? 'text-muted' : '' }}  d-none d-md-inline-block"
                                                    data-toggle="active" data-id="{{ $comment->id }}"><i
                                                        class="zmdi zmdi-star-outline"></i></a>
                                            </div>
                                            <div class="thumb d-none d-md-inline-block m-r-20">
                                                @if (isset($comment->user->profile_photo_path) &&
                                                        file_exists(public_path('Uploads/Patient/Profile/' . $comment->user->profile_photo_path)))
                                                    <img src="{{ asset('Uploads/Patient/Profile/' . $comment->user->profile_photo_path) }}"
                                                        alt="Profile-Image" class="rounded-circle">
                                                @else
                                                    <img src="http://via.placeholder.com/35x35" alt="Avatar"
                                                        class="rounded-circle">
                                                @endif

                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <div class="media-heading">
                                                <a href="{{ route('doctor.comment.show', $comment->id) }}"
                                                    class="m-r-10">{{ ucwords($comment->name) }}</a>

                                                <small class="float-right text-muted"><time class="d-none d-md-inline-block"
                                                        datetime="2017">{{ \Carbon\Carbon::parse($comment->created_at)->format('d M Y g:i A') }}</time></small>
                                            </div>
                                            <p class="msg">{{ $comment->email }} </p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif


                    </ul>

                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('#favourite').click(function() {
            $('#response-loader').removeClass('hidden-loading-container')

            $.ajax({
                url: "{{ route('doctor.comment.favourite') }}",
                type: "post",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('#response-loader').addClass('hidden-loading-container')



                    if (response['status'] == true) {

                        if (response['isFavourite'] == 'yes') {

                            $('#favourite').removeClass('text-muted').addClass('col-amber')

                        } else {

                            $('#favourite').removeClass('col-amber').addClass('text-muted')

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
    </script>
@endsection
