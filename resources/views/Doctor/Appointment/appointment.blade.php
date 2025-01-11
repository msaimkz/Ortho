@extends('Doctor.master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Appointments
                        <small class="text-muted">Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                        type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Appointments</a></li>
                        <li class="breadcrumb-item active">All Appointments</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>Appointments</strong> List</h2>
                            <ul class="header-dropdown">

                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->


                            <!-- Tab panes -->
                            <div class="tab-content m-t-10">
                                <div class="tab-pane table-responsive active" id="All">
                                    <table class="table m-b-0 table-hover">
                                        <thead>
                                            <tr>
                                                <th>Patient Name</th>
                                                <th>Patient Email</th>
                                                <th>Date</th>
                                                <th>Day</th>
                                                <th>Time</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($appointments != null)
                                                @foreach ($appointments as $appointment)
                                                    <tr id="appointment-{{ $appointment->id }}">


                                                        <td>{{ ucwords($appointment->name) }}</td>
                                                        <td>{{ $appointment->email }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($appointment->date)->format('d-M-Y') }}
                                                        </td>
                                                        <td>{{ ucwords($appointment->day) }}</td>
                                                        <td>{{ \Carbon\Carbon::parse($appointment->start_time)->format('g:i A') }}
                                                            To
                                                            {{ \Carbon\Carbon::parse($appointment->end_time)->format('g:i A') }}
                                                        </td>
                                                        <td>
                                                            @if ($appointment->status == 'pending')
                                                                <span class="badge badge-danger">Pending</span>
                                                            @elseif($appointment->status == 'approved')
                                                                <span class="badge badge-success">Approved</span>
                                                            @elseif($appointment->status == 'rejected')
                                                                <span class="badge badge-danger">Rejected</span>
                                                            @else
                                                                <span class="badge badge-danger">Cancelled</span>
                                                            @endif

                                                        </td>
                                                        <td>

                                                            <a href="{{ route('doctor.Appointment.show', $appointment->id) }}"
                                                                class="btn btn-info">View More</a>
                                                           
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                            @endif

                                        </tbody>
                                    </table>
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
        $('.delete').click(function() {
            if (confirm("Are you sure you want to Delete this Schedule ?"))
                $('.delete').prop('disabled', true);

            $.ajax({
                url: "{{ route('doctor.schedules.delete') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('.delete').prop('disabled', false);



                    if (response['status'] == true) {


                        $(`#working-time-${response['id']}`).remove();
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
