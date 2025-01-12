@extends('User.Dashboard.Dashboard')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}">
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
                        <li class="breadcrumb-item"><a href="{{ route('User.dashboard.dashboard') }}"><i
                                    class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('User.dashboard.appoinment') }}">Appointments</a></li>
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
                                    <h3 class="m-t-0 m-b-5">Doctor Name</h3>

                                    <p>Dr: {{ ucwords($appointment->doctor->name) }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Doctor Email</h3>

                                    <p>{{ $appointment->doctor->email }}</p>
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
                                            <span id="statusbadge" class="badge badge-danger">Pending</span>
                                        @elseif($appointment->status == 'approved')
                                            <span id="statusbadge" class="badge badge-success">Approved</span>
                                        @elseif($appointment->status == 'rejected')
                                            <span id="statusbadge" class="badge badge-danger">Rejected</span>
                                        @else
                                            <span id="statusbadge" class="badge badge-danger">Cancelled</span>
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
                                    @if ($appointment->status == 'approved')
                                        <button class="btn btn-danger cancel" data-toggle="modal"
                                            data-target="#defaultModal" data-status="cancelled"
                                            data-id="{{ $appointment->id }}">Cancelled</button>
                                    @elseif ($appointment->status == 'cancelled')
                                        @if ($appointment->user_cancelled == 'pending')
                                            <h3 class="m-t-0 m-b-5">Doctor Cancellation Reason</h3>

                                            <p>{{ ucwords($appointment->doctor_cancellation_reason) }}</p>
                                        @else
                                            <h3 class="m-t-0 m-b-5">Patient Cancellation Reason</h3>

                                            <p>{{ ucwords($appointment->user_cancellation_reason) }}</p>
                                        @endif
                                    @endif


                                </div>
                            </div>
                        </div>






                    </div>


                </div>

            </div>
        </div>
    </section>
    {{-- Cancelled Modal --}}
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="defaultModalLabel">Cancellation Reason</h4>
                </div>
                <div class="modal-body">
                    <form id="CancellForm" name="CancellForm">
                        <input type="hidden" id="id" name="id" value="{{ $appointment->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="body">

                                        <div class="form-group">
                                            <textarea rows="4" class="form-control no-resize" name="user_cancellation_reason"
                                                id="user_cancellation_reason" placeholder="Please Write Cancellation Reason..."></textarea>
                                            <span class="text-danger"></span>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger btn-round waves-effect" id="cancel">Cancel
                                Appointment</button>
                            <button type="button" class="btn btn-danger waves-effect"
                                data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    {{-- Cancelled Modal --}}
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        $('#CancellForm').submit(function(event) {
            event.preventDefault();

            $('#cancel').prop('disabled', true);

            var element = $(this);

            $.ajax({
                url: "{{ route('User.appointment.cancel') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('#cancel').prop('disabled', false);


                    if (response['status'] == true) {
                        $('#defaultModal').modal('hide');
                        var html = `  <h3 class="m-t-0 m-b-5">Patient Cancellation Reason</h3>
                          <p>${response['reason']}</p>
                          `

                        $('#btn-body').html(html)
                        $('#statusbadge').removeClass('badge-success').addClass('badge-danger')
                            .html('Cancelled')

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

                        if (response['isNotFound'] == true) {

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
