@extends('Admin.master')

@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>All Subscriptions
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
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Subscriptions</a></li>
                    <li class="breadcrumb-item active">All Subscriptions</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-md-12">
                <div class="card patients-list">
                    <div class="header">
                        <h2><strong>Subscriptions</strong> List</h2>
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
                                            <th>Subscription ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Duration</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                           
                                            <td><span class="list-name">KU 00598</span></td>
                                            <td>Daniel</td>
                                            <td>$500</td>
                                            <td>30 days</td>
                                            <td>
                                                <a href=""><span class="badge badge-success">Active</span></a>

                                            </td>
                                            <td>
                                                <a href="{{ route('Admin.subscripion.edit') }}"><span class="badge badge-info">Edit</span></a>
                                                <a href=""><span class="badge badge-danger">Delete</span></a>
                                            </td>
                                        </tr>
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