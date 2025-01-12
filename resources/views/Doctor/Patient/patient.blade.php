@extends('Doctor.master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Patients
                        <small class="text-muted">Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                        type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Patients</a></li>
                        <li class="breadcrumb-item active">All Patients</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>Patients</strong> List</h2>
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
                                               
                                                <th>Sno:</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>City</th>
                                                <th>Number</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($patients))
                                            @php
                                                $count = 0
                                            @endphp
                                                @foreach ($patients as $patient )
                                                <tr>
                                                   
                                                    <td><span class="list-name">{{ ++$count }}</span></td>
                                                    <td>{{ ucwords($patient->patient->name) }}</td>
                                                    <td>{{ $patient->patient->email }}</td>
                                                    <td>{{ ucwords($patient->patient->city) }}</td>
                                                    <td>{{ $patient->patient->phone }}</td>
                                                    
                                                    <td><a href="{{ route('doctor.Patients.profile', $patient->patient->id) }}"><span class="badge badge-success">View Profile</span></a></td>
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
