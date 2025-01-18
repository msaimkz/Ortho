@extends('Doctor.master')

@section('content')
    <section class="content inbox">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>View Comment Message
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Inbox</a></li>
                        <li class="breadcrumb-item active">View Comment Message</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="media">
                                        <div class="float-left">
                                            <div class="m-r-20">
                                                @if (isset($comment->user->profile_photo_path) &&
                                                        file_exists(public_path('Uploads/Patient/Profile/' . $comment->user->profile_photo_path)))
                                                    <img src="{{ asset('Uploads/Patient/Profile/' . $comment->user->profile_photo_path) }}"
                                                        alt="Profile-Image" class="rounded" width="60">
                                                @else
                                                    <img src="http://via.placeholder.com/35x35" alt="Avatar"
                                                        class="rounded" width="60">
                                                @endif
                                               
                                            </div>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-b-0">
                                                <strong class="text-muted m-r-5">From:</strong>
                                                <a href="javascript:void(0);" class="text-default">{{ $comment->email }}</a>
                                                <span
                                                    class="text-muted text-sm float-right">{{ \Carbon\Carbon::parse($comment->created_at)->format('g:i A, d M Y') }}</span>
                                            </p>


                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-md-12">
                                    <p>{{ ucwords($comment->comment) }}.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <strong>Click here to</strong> <a href="{{ route('doctor.comment.reply') }}">Reply</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
