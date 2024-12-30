@extends('Admin.master')

@section('css')
<link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
    
@endsection
@section('content')
    
<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>All Services
                    <small>Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item"><a href="blog-dashboard.html">Service</a></li>
                    <li class="breadcrumb-item active">All Services</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-xl-8 col-lg-12 col-md-12">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12">
                        <div class="card single_post">
                            <div class="body">
                                <h3 class="m-t-0 m-b-5"><a href="{{ route('Admin.blog.detail') }}">WTCR from 2018: new rules, more cars, more races</a></h3>
                                
                            </div>                    
                            <div class="body">
                                <div class="img-post m-b-15">
                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-3.jpg') }}" alt="Awesome Image">
                                  
                                </div>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old</p>
                                <a href="{{ route('Admin.service.detail') }}" title="read more" class="btn btn-round btn-info">Read More</a>                        
                                <a href="{{ route('Admin.service.edit') }}" title="read more" class="btn btn-round btn-primary">Edit</a>                        
                                <a href="{{ route('Admin.blog.detail') }}" title="read more" class="btn btn-round btn-danger">Delete</a>                        
                                <a href="{{ route('Admin.blog.detail') }}" title="read more" class="btn btn-round btn-danger">Block</a>                        
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-6 col-md-12">
                        <div class="card single_post">
                            <div class="body">
                                <h3 class="m-t-0 m-b-5"><a href="blog-details.html">CSS Timeline Examples from CodePen</a></h3>
                                <ul class="meta">
                                    <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                                </ul>
                            </div>                    
                            <div class="body">
                                <div class="img-post m-b-15">
                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-4.jpg') }}" alt="Awesome Image">
                                    
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>
                                <a href="blog-details.html" title="read more" class="btn btn-round btn-info">Read More</a>                        
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card single_post">
                            <div class="body">
                                <h3 class="m-t-0 m-b-5"><a href="blog-details.html">CSS Timeline Examples from CodePen</a></h3>
                                <ul class="meta">
                                    <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                                </ul>
                            </div>                    
                            <div class="body">
                                <div class="img-post m-b-15">
                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-4.jpg') }}" alt="Awesome Image">
                                    
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>
                                <a href="blog-details.html" title="read more" class="btn btn-round btn-info">Read More</a>                        
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="card single_post">
                            <div class="body">
                                <h3 class="m-t-0 m-b-5"><a href="blog-details.html">CSS Timeline Examples from CodePen</a></h3>
                                <ul class="meta">
                                    <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                                    <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                                </ul>
                            </div>                    
                            <div class="body">
                                <div class="img-post m-b-15">
                                    <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-4.jpg') }}" alt="Awesome Image">
                                    
                                </div>
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words</p>
                                <a href="blog-details.html" title="read more" class="btn btn-round btn-info">Read More</a>                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
        </div>
    </div>
</section>
@endsection