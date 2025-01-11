@extends('Doctor.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection

@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Appointment Detail
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('doctor.Appointments') }}">Appointments</a></li>
                        <li class="breadcrumb-item active">Appointment Detail</li>
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

                                    <p>{{ ucwords($appointment->name) }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Email</h3>

                                    <p>{{ $appointment->email }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Date</h3>

                                    <p>{{ \Carbon\Carbon::parse($appointment->date)->format('d-M-Y') }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Day</h3>

                                    <p>{{ ucwords($appointment->day) }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Time</h3>

                                    <p>{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}
                                        To
                                        {{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Status</h3>

                                    <p>
                                        @if ($appointment->status == 'pending')
                                            <span class="badge badge-danger">Pending</span>
                                        @elseif($appointment->status == 'approved')
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($appointment->status == 'rejected')
                                            <span class="badge badge-danger">Rejected</span>
                                        @else
                                            <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">About Illness</h3>

                                    <p>{{ ucwords($appointment->illness) }}</p>
                                </div>
                            </div>

                        </div>
                        @if ($appointment->report != null)
                        <div class="col-md-2">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ asset('Uploads/Appoinment/Report/' . $appointment->report) }}"
                                        target="_blank">
                                        <div class="icon">
                                            <img src="{{ asset('Assets/User/assets/img/PDF.png') }}" class="img-fluid"
                                                alt="">
                                        </div>
                                        <div class="file-name">
                                            <p class="m-b-5 text-muted">Report.pdf</p>
                                            <small><span
                                                    class="date text-muted">{{ \Carbon\Carbon::parse($appointment->created_at)->format('M d Y') }}</span></small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endif
                       
                        <div class="col-md-12">
                           
                            <div class="card single_post">
                                <div class="body" id="btn-body">

                                   <button class="btn btn-success status" data-status="approve"  data-id="{{ $appointment->id }}">Approve</button>
                                   <button class="btn btn-danger status" data-status="reject" data-id="{{ $appointment->id }}">Reject</button>
                                </div>
                            </div>
                        </div>





                    </div>


                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.status').click(function() {
            if (confirm("Are you sure you want to Reply this Appointment?"))
                $('.status').prop('disabled', true);

             $.ajax({
                url: "{{ route('Admin.FAQ.delete') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),
                    status: $(this).data('status'),

                },
                dataType: "json",
                success: function(response) {
                    $('.status').prop('disabled', false);



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

        })
    </script>
@endsection
