@extends('Admin.master')
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
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
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
                                               
                                                <th>Patients ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>City</th>
                                                <th>Number</th>
                                                <th>Status</th>
                                                <th>Regiestration Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (!empty($patients))
                                                @foreach ($patients as $patient )
                                                <tr>
                                                   
                                                    <td><span class="list-name">{{ $patient->id }}</span></td>
                                                    <td>{{ $patient->name }}</td>
                                                    <td>{{ $patient->email }}</td>
                                                    <td>{{ $patient->city }}</td>
                                                    <td>{{ $patient->phone }}</td>
                                                    @if ($patient->status == 'active')
                                                        <td><span class="badge badge-success">Active</span></td>
                                                    @else
                                                    <td><span class="badge badge-danger">Block</span></td>
                                                        
                                                    @endif
                                                    <td>{{ \Carbon\Carbon::parse($patient->created_at)->format('d M Y') }}</td>
                                                    <td><a href="{{ route('Admin.patients.profile', $patient->id) }}"><span class="badge badge-success">View</span></a></td>
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
