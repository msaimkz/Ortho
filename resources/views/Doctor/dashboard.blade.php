@extends('Doctor.master')
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
                            <h3 class="number count-to m-b-0" data-from="0" data-to="{{ $patientCount }}" data-speed="2500"
                                data-fresh-interval="700">{{ $patientCount }}<i
                                    class="zmdi zmdi-trending-up float-right"></i></h3>
                            <p class="text-muted">New Patients</p>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card">
                        <div class="body">
                            <h3 class="number count-to m-b-0" data-from="0" data-to="{{ $appointmentCount }}"
                                data-speed="2500" data-fresh-interval="1000">{{ $appointmentCount }}<i
                                    class="zmdi zmdi-trending-up float-right"></i></h3>
                            <p class="text-muted">New Appointment <i class="zmdi zmdi-mood"></i></p>

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
                                            <th>Email</th>
                                            <th>Phone No</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($patientRecords != null)
                                            @php

                                                $count = 0;
                                            @endphp
                                            @foreach ($patientRecords as $patientRecord)
                                                <tr>
                                                    <td>{{ ++$count }}</td>
                                                    <td>
                                                        @if (isset($patientRecord->patient->profile_photo_path) &&
                                                                file_exists(public_path('Uploads/Patient/Profile/' . $patientRecord->patient->profile_photo_path)))
                                                            <img src="{{ asset('Uploads/Patient/Profile/' . $patientRecord->patient->profile_photo_path) }}"
                                                                alt="Profile-Image" class="rounded-circle">
                                                        @else
                                                            <img src="http://via.placeholder.com/35x35" alt="Avatar"
                                                                class="rounded-circle">
                                                        @endif
                                                      
                                                    </td>
                                                    <td>{{ ucwords($patientRecord->patient->name) }}</td>
                                                    <td>{{ $patientRecord->patient->email }}</td>
                                                    <td>{{ ucwords($patientRecord->patient->phone) }}</td>

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
