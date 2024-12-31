@extends('Admin.master')

@section('content')
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>Patient Profile
                <small class="text-muted">Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">
                <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Patients</a></li>
                    <li class="breadcrumb-item active">Patient Profile</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12 col-sm-12">
                <div class="card member-card">
                    <div class="header l-coral">
                        <h4 class="m-t-10">Eliana Smith</h4>
                    </div>
                    <div class="member-img">
                        <a href="patient-invoice.html">
                        <img src="{{ asset('Assets/Dashboard/assets/images/sm/avatar2.jpg') }}" class="rounded-circle" alt="profile-image">
                        </a>
                    </div>
                    <div class="body">
                       <div>
                         <a href="" class="btn btn-danger">Delete</a>
                         <a href="" class="btn btn-danger">Block</a>
                       </div>
                        <hr>
                        <strong>Occupation</strong>
                        <p>UI UX Design</p>
                        <strong>Email ID</strong>
                        <p>will.smith@info.com</p>
                        <strong>Phone</strong>
                        <p>+123 456 789</p>
                        <hr>
                        <strong>Address</strong>
                        <address>85 Bay Drive, New Port Richey, FL 34653</address>
                    </div>
                </div>
            
            </div>
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="body">
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source</p>
                    </div>
                </div>        
                
            </div>
        </div>
    </div>
</section>
@endsection