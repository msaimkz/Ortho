@extends('Admin.master')

@section('css')
<link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
    
@endsection

@section('content')
<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>Blog Detail
                    <small>Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('Admin.blog') }}">Blog</a></li>
                    <li class="breadcrumb-item active">Blog Detail</li>
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
                            <li><a href="#"><i class="zmdi zmdi-account col-blue"></i>Posted By: John Smith</a></li>
                            <li><a href="#"><i class="zmdi zmdi-comment-text col-blue"></i>Comments: 3</a></li>
                        </ul>
                    </div>                    
                    <div class="body">
                        <div class="img-post m-b-15">
                            <img src="{{ asset('Assets/Dashboard/assets/images/blog/blog-page-1.jpg') }}" alt="Awesome Image">
                           
                        </div>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal</p>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Comments</strong> 3</h2>
                    </div>
                    <div class="body">
                        <ul class="comment-reply list-unstyled">
                            <li class="row">
                                <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="{{ asset('Assets/Dashboard/assets/images/sm/avatar2.jpg') }}" alt="Awesome Image"></div>
                                <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                    <h5 class="m-b-0">Gigi Hadid </h5>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text</p>
                                    <ul class="list-inline">
                                        <li><a href="#">Jan 09 2018</a></li>
                                        <li><a href="#">Reply</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="row">
                                <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="{{ asset('Assets/Dashboard/assets/images/sm/avatar3.jpg') }}" alt="Awesome Image"></div>
                                <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                    <h5 class="m-b-0">Christian Louboutin</h5>
                                    <p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scramble</p>
                                    <ul class="list-inline">
                                        <li><a href="#">Jan 12 2018</a></li>
                                        <li><a href="#">Reply</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="row">
                                <div class="icon-box col-md-2 col-4"><img class="img-fluid img-thumbnail" src="{{ asset('Assets/Dashboard/assets/images/sm/avatar4.jpg') }}" alt="Awesome Image"></div>
                                <div class="text-box col-md-10 col-8 p-l-0 p-r0">
                                    <h5 class="m-b-0">Kendall Jenner</h5>
                                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour</p>
                                    <ul class="list-inline">
                                        <li><a href="#">Jan 20 2018</a></li>
                                        <li><a href="#">Reply</a></li>
                                    </ul>
                                </div>
                            </li>
                        </ul>                                        
                    </div>
                </div>
                
            </div>
            
        </div>
    </div>
</section>
@endsection