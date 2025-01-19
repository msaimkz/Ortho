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
                    <div class="card action_bar">
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-3">
                                    <button type="button" id="delete" data-id="{{ $comment->id }}"
                                        class="btn  btn-danger">
                                        <i class="zmdi zmdi-delete"></i>
                                    </button>

                                </div>
                                <div class="col-lg-1 col-md-12 col-3">
                                    @if ($comment->status == 'inactive')
                                        <button class="btn btn-success" id="status"
                                            data-id="{{ $comment->id }}">Acitve</button>
                                    @else
                                        <button class="btn btn-danger" id="status"
                                            data-id="{{ $comment->id }}">Inacitve</button>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            @if ($comment->reply != null)
                            <p>{{ ucwords($comment->reply) }}</p>
                            <strong>Click here to</strong> <a href="{{ route('doctor.comment.reply',$comment->id) }}">Update Reply Message</a>
                                
                            @else
                            <strong>Click here to</strong> <a href="{{ route('doctor.comment.reply',$comment->id) }}">Reply</a>

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
        $('#status').click(function() {
            if (confirm("Are you sure you want to Change Status to this Comment ?")) {
                $('#status').prop('disabled', true);
                $('#response-loader').removeClass('hidden-loading-container')

                $.ajax({
                    url: "{{ route('doctor.comment.status') }}",
                    type: "post",
                    data: {

                        id: $(this).data('id'),

                    },
                    dataType: "json",
                    success: function(response) {
                        $('#status').prop('disabled', false);
                        $('#response-loader').addClass('hidden-loading-container')



                        if (response['status'] == true) {

                            if (response['Commentstatus'] == 'active') {

                                $('#status').removeClass('btn-success').addClass('btn-danger').html(
                                    'Inactive')
                            } else {

                                $('#status').removeClass('btn-danger').addClass('btn-success').html(
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
            }
        })
        $('#delete').click(function() {
            if (confirm("Are you sure you want to Change Delete to this Comment ?")) {
                $('#delete').prop('disabled', true);
                $('#response-loader').removeClass('hidden-loading-container')

                $.ajax({
                    url: "{{ route('doctor.comment.delete') }}",
                    type: "delete",
                    data: {

                        id: $(this).data('id'),

                    },
                    dataType: "json",
                    success: function(response) {
                        $('#delete').prop('disabled', false);
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

                            window.location.href = "{{ route('doctor.comment.index') }}"
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
