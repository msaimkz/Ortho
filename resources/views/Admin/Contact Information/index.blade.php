@extends('Admin.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection

@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Contact Information
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.contactInformation') }}">Contact Information</a>
                        </li>
                       
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
                                    <h3 class="m-t-0 m-b-5">Phone No</h3>

                                    <p>{{ $Contact != null ? $Contact->phone : '' }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Email</h3>

                                    <p>{{ $Contact != null ? $Contact->email : '' }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Address</h3>

                                    <p>{{ $Contact != null ? ucwords($Contact->address) : '' }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Facebook</h3>
                                    <a  href="{{ ($Contact != null && !empty($Contact->facebook)) ? $Contact->facebook : ''  }}" target="_blank" style="background-color: #1877F2" class="btn btn-icon  btn-icon-mini"><i class="zmdi zmdi-facebook"></i></a>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Youtube</h3>

                                    <a  href="{{ ($Contact != null && !empty($Contact->youtube)) ? $Contact->youtube : ''  }}" target="_blank" style="background-color: #FF0000;" class="btn btn-icon btn-info btn-icon-mini"><i class="zmdi zmdi-youtube"></i></a>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Twitter</h3>
                                    <a  href="{{ ($Contact != null && !empty($Contact->twitter)) ? $Contact->twitter : ''  }}" target="_blank" style="background-color: #1DA1F2;" class="btn btn-icon btn-info btn-icon-mini"><i class="zmdi zmdi-twitter"></i></a>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card single_post">
                                <div class="body">
                                    <h3 class="m-t-0 m-b-5">Instagram</h3>

                                    <a  href="{{ ($Contact != null && !empty($Contact->instagram)) ? $Contact->instagram : ''  }}" target="_blank" style="background-color: #cd486b;" class="btn btn-icon btn-info btn-icon-mini"><i class="zmdi zmdi-instagram"></i></a>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card single_post">
                            <div class="body">
                               <a href="{{ route('Admin.contactInformation.create') }}" class="btn btn-info">Add Contact Information</a>


                            </div>
                        </div>

                    </div>


                </div>

            </div>
        </div>
    </section>
@endsection
