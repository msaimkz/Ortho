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
                <h2>New Service
                    <small>Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('Admin.service') }}">Service</a></li>
                    <li class="breadcrumb-item active">New Service</li>
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
                            <input type="text" class="form-control" placeholder="Enter Service title" />
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="body">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Service Slug" />
                        </div>
                    </div>
                </div>
               
            </div>
            <div class="col-md-6">
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
            <div class="col-md-6">
                <div class="card">
                    <div class="body">
                        <label for="">Is Home</label>

                        <select class="form-control show-tick">
                            <option>Yes</option>
                            <option>Yes</option>
                            
                        </select>
                    </div>
                </div>
               
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="body">
                        <label for="">Short Descripion</label>

                        <div class="form-group">
                            <textarea rows="4" class="form-control no-resize" placeholder="Please Write Short Descriptipn..."></textarea>
                        </div>
                    </div>
                </div>
               
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="body">
                        <label for="">Long Descripion</label>

                        <div class="form-group">
                            <textarea rows="4" class="form-control no-resize" placeholder="Please Write Long Descriptipn..."></textarea>
                        </div>
                    </div>
                </div>
               
            </div>
            
            
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                       
                        
                        <div style="cursor: pointer"  id="frmFileUpload" class="dropzone m-b-20 m-t-20" method="post" enctype="multipart/form-data">
                            <div class="dz-message">
                                <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                <h3>Drop files here or click to upload.</h3>
                                <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em> </div>
                            
                        </div>                        
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="a2017">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="file">
                                        <a href="javascript:void(0);">
                                           
                                            <div class="image">
                                                <img src="{{ asset('Assets/Dashboard/assets/images/image-gallery/1.jpg') }}" alt="img" class="img-fluid">
                                            </div>
                                            <div class="file-name">
                                                <a href="" class="btn btn-danger btn-round waves-effect m-3">Delete</a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                                   
                </div>
                <div class="card">
                    <div class="body">
                       
                        
                        <div style="cursor: pointer"  id="frmFileUpload" class="dropzone m-b-20 m-t-20" method="post" enctype="multipart/form-data">
                            <div class="dz-message">
                                <div class="drag-icon-cph"> <i class="material-icons">touch_app</i> </div>
                                <h3>Drop files here or click to upload.</h3>
                                <em>(This is just a demo dropzone. Selected files are <strong>not</strong> actually uploaded.)</em> </div>
                            
                        </div>                        
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane active" id="a2017">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="file">
                                        <a href="javascript:void(0);">
                                           
                                            <div class="image">
                                                <img src="{{ asset('Assets/Dashboard/assets/images/image-gallery/1.jpg') }}" alt="img" class="img-fluid">
                                            </div>
                                            <div class="file-name">
                                                <a href="" class="btn btn-danger btn-round waves-effect m-3">Delete</a>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                                   
                </div>
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