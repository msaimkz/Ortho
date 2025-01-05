@extends('Admin.master')

@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>All Doctor Registration  Requests
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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Doctor</a></li>
                    <li class="breadcrumb-item active">Doctor Registration Requests</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2><strong>Doctor Registration Requests</strong> List</h2>
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
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Speciality</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($doctorRequests))
                                            @foreach ($doctorRequests as $doctorRequest)
                                            <tr>
                                           
                                                <td><span class="list-name">{{ $doctorRequest->id }}</span></td>
                                                <td>{{ ucwords($doctorRequest->name) }}</td>
                                                <td>{{ $doctorRequest->email }}</td>
                                                <td>{{ ucwords($doctorRequest->speciality) }}</td>
                                                <td>
                                                    @if ($doctorRequest->status == 'approve')
                                                    <span class="badge badge-success">Approved</span>
                                                        
                                                    @elseif ($doctorRequest->status == 'reject')
                                                    <span class="badge badge-danger">Rejected</span>
                                                    @else
                                                    <span class="badge badge-warning">Pending</span>
                                                        
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('Admin.doctor.request-profile',$doctorRequest->id) }}"><span class="badge badge-info">View More</span></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                        
                                            <tr>
                                                <td >Record Not Found</td>
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
    </div>
</section>
@endsection