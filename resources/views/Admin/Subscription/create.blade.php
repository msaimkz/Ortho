@extends('Admin.dashboard')

@section('css')
<link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.css') }}">
<link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
<!-- Custom Css -->
<link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">

@endsection

@section('content')
    
<section class="content blog-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>New Subscription
                    <small>Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('Admin.subscripion') }}">Subscription</a></li>
                    <li class="breadcrumb-item active">New Subscription</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Subscription title" />
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Subscription Slug" />
                        </div>
                    </div>
                </div>
               
            </div>
           
            <div class="col-md-6">
                <div class="card">
                    <div class="body">
                        <input type="text" class="form-control" placeholder="Enter Subscripion Duration" />
                    </div>
                </div>
               
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="body">
                        <input type="text" class="form-control" placeholder="Enter Subscripion Price" />
                        
                    </div>
                </div>
               
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="body">
                        <label for="">Status</label>
                        <select class="form-control show-tick">
                            <option>Active</option>
                            <option>Block</option>
                            
                        </select>
                    </div>
                </div>
               
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                      
                        <button type="button" class="btn btn-primary btn-round waves-effect m-t-20">Post</button>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.js') }}"></script> <!-- Dropzone Plugin Js --> 
<script src="{{ asset('Assets/Dashboard/assets/plugins/ckeditor/ckeditor.js') }}"></script> <!-- Ckeditor -->
@endsection