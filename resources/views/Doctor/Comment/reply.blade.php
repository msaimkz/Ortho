@extends('Doctor.master')

@section('css')
<link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/inbox.css') }}">
    
@endsection
@section('content')
    
<section class="content inbox">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>Reply Comment Message
                <small>Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Inbox</a></li>
                    <li class="breadcrumb-item active">Reply Comment Message</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
       
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group form-float">
                                    <input type="text" name=""  id="" readonly class="form-control" placeholder="To:">
                                    <span class="text-danger"></span>
                                </div>
                                <div class="form-group">
                                    <textarea rows="4" class="form-control no-resize" name="comment" id="comment"
                                        placeholder="Please Write  Comment..."></textarea>
                                    <span class="text-danger"></span>

                                </div>
                               
                            </div>
                            <div class="col-md-12 col-lg-12 col-xl-12">
                               
                                <button type="button" class="btn btn-primary btn-round waves-effect m-t-20">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection