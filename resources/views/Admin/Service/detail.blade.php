@extends('Admin.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection

@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Service Detail
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.service') }}">Service</a></li>
                        <li class="breadcrumb-item active">Service Detail</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card single_post">
                        <div class="body">
                            <h3 class="m-t-0 m-b-5">{{ ucwords($service->title) }}</h3>
                            <ul class="meta">
                                <li>Status:
                                    @if ($service->status == 'active')
                                        <span class="badge badge-success" id="status-badge">Active</span>
                                    @else
                                        <span class="badge badge-danger" id="status-badge">InActive</span>
                                    @endif
                                </li>
                                <li>Is
                                    Home:
                                    @if ($service->IsHome == 'yes')
                                        <span class="badge badge-success" id="status-badge">Yes</span>
                                    @else
                                        <span class="badge badge-danger" id="status-badge">No</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="img-post m-b-15">
                                @if (isset($service->thumbnail) && file_exists(public_path('Uploads/Service/' . $service->thumbnail)))
                                    <img src="{{ asset('Uploads/Service/' . $service->thumbnail) }}"
                                        alt="Awesome Image">
                                @else
                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-3.jpg') }}"
                                        alt="Awesome Image">
                                @endif
                               

                            </div>
                            <p>{{ ucwords($service->description) }}.</p>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </section>
@endsection
