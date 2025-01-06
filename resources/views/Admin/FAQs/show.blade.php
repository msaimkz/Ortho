@extends('Admin.master')

@section('css')
<link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
    
@endsection

@section('content')
<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>FAQ Detail
                    <small>Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('Admin.FAQ') }}">FAQ</a></li>
                    <li class="breadcrumb-item active">FAQ Detail</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="card single_post">
                    <div class="body">
                        <h3 class="m-t-0 m-b-5">{{ ucwords($FAQ->question) }}</h3>
                    </div>                    
                    <div class="body">
                        
                        <p>{{ ucwords($FAQ->answer) }}</p>
                    </div>
                </div>
               
                
            </div>
            
        </div>
    </div>
</section>
@endsection