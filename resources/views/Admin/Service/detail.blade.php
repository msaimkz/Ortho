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
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
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
                        <h3 class="m-t-0 m-b-5"><a href="#">All photographs are accurate. None of them is the truth</a></h3>
                        <ul class="meta">
                            
                        </ul>
                    </div>                    
                    <div class="body">
                        <div class="img-post m-b-15">
                            <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-1.jpg') }}" alt="Awesome Image">
                           
                        </div>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>
                    </div>
                </div>
               
                
            </div>
            
        </div>
    </div>
</section>
@endsection