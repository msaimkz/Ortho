@extends('Admin.master')
@section('content')
    <section class="content home">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>Dashboard
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>

            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="body">
                            <h3 class="number count-to m-b-0" data-from="0" data-to="{{ $patientCounts }}" data-speed="2500"
                                data-fresh-interval="700">{{ $patientCounts }} <i
                                    class="zmdi zmdi-trending-up float-right"></i></h3>
                            <p class="text-muted">New Patients</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="body">
                            <h3 class="number count-to m-b-0" data-from="0" data-to="{{ $doctorCounts }}" data-speed="2500"
                                data-fresh-interval="1000">{{ $doctorCounts }} <i
                                    class="zmdi zmdi-trending-up float-right"></i></h3>
                            <p class="text-muted">New Doctors</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="body">
                            <h3 class="number count-to m-b-0" data-from="0" data-to="{{ $doctorRequestCount }}"
                                data-speed="2500" data-fresh-interval="1000">{{ $doctorRequestCount }} <i
                                    class="zmdi zmdi-trending-up float-right"></i></h3>
                            <p class="text-muted">New Doctor Registrations <i class="zmdi zmdi-mood"></i></p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12">
                    <div class="card patient_list">
                        <div class="header">
                            <h2><strong>New</strong> Patient List</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped m-b-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th></th>
                                            <th>Name</th>
                                            <th>City</th>
                                            <th>Phone</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($patients))
                                            @foreach ($patients as $patient)
                                                <tr>
                                                    <td>{{ $patient->id }}</td>
                                                    <td>
                                                        @if (isset($patient->profile_photo_path) &&
                                                                file_exists(public_path('Uploads/Patient/Profile/' . $patient->profile_photo_path)))
                                                            <img src="{{ asset('Uploads/Patient/Profile/' . $patient->profile_photo_path) }}"
                                                                alt="Profile-Image" class="rounded-circle">
                                                        @else
                                                            <img src="http://via.placeholder.com/35x35" alt="Avatar"
                                                                class="rounded-circle">
                                                        @endif
                                                    </td>
                                                    <td>{{ ucwords($patient->name) }}</td>
                                                    <td>{{ ucwords($patient->city) }}</td>
                                                    <td>{{ $patient->phone }}</td>
                                                    <td>
                                                        @if ($patient->status == 'active')
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Block</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <td colspan="6">Record Not Found</td>
                                        @endif


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="body">
                            <h6 class="text-center m-b-15">Total New Patient</h6>
                            <div class="table-responsive m-t-20">
                                <table class="table table-striped m-b-0">
                                    <thead>
                                        <tr>
                                            <th>City</th>
                                            <th>Count</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($patientsCityCount))
                                            @foreach ($patientsCityCount as $patient)
                                                <tr>
                                                    <td>{{ ucwords($patient->city) }}</td>
                                                    <td>{{ $patient->total }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>Not Record Found</td>

                                            </tr>
                                        @endif



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>
@endsection
