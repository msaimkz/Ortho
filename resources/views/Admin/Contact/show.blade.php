@extends('Admin.master')

@section('css')
<link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
    
@endsection

@section('content')
<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>Contact Message
                    <small>Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('Admin.contact.index') }}">Contact Message</a></li>
                    <li class="breadcrumb-item active">Contact Message</li>
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
                               <h3 class="m-t-0 m-b-5">Name</h3>

                               <p>{{ ucwords($Contact->name) }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card single_post">
                            <div class="body">
                               <h3 class="m-t-0 m-b-5">Email</h3>

                               <p>{{ $Contact->email }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card single_post">
                            <div class="body">
                               <h3 class="m-t-0 m-b-5">Phone</h3>

                               <p>{{ $Contact->phone }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card single_post">
                            <div class="body">
                               <h3 class="m-t-0 m-b-5">Subject</h3>

                               <p>{{ ucwords($Contact->subject) }}</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card single_post">
                            <div class="body">
                               <h3 class="m-t-0 m-b-5">Comment</h3>

                               <p>{{ ucwords($Contact->comment) }}</p>
                            </div>
                        </div>

                    </div>
                </div>
               
                
            </div>
            
        </div>
    </div>
</section>
@endsection