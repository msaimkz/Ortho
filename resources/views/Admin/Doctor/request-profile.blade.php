@extends('Admin.master')

@section('content')
<section class="content profile-page">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-7 col-md-5 col-sm-12">
                <h2>Doctor Request Profile
                <small>Welcome to Ortho</small>
                </h2>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12">                
                <button class="btn btn-white btn-icon btn-round d-none d-md-inline-block float-right m-l-10" type="button">
                    <i class="zmdi zmdi-edit"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item active">Doctor Request Profile</li>
                </ul>                
            </div>
        </div>
    </div>    
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-4 col-md-12">
                <div class="card profile-header">
                    <div class="body text-center">
                        <div class="profile-image"> <img src="{{ asset('Assets/Dashboard/assets/images/profile_av.jpg') }}" alt=""> </div>
                        <div>
                            <h4 class="m-b-0"><strong>Dr. Charlotte</strong> Deo</h4>
                            <span class="job_post">Neurologist</span>
                            <p>795 Folsom Ave, Suite 600<br> San Francisco, CADGE 94107</p>
                        </div>
                        <div>
                            <button class="btn btn-success btn-round">Approve</button>
                            <button class="btn btn-danger btn-round">Delete</button>
                        </div>
                        <p class="social-icon m-t-5 m-b-0">
                            <a title="Twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="Facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a>
                            <a title="Google-plus" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a>
                            <a title="Behance" href="javascript:void(0);"><i class="zmdi zmdi-behance"></i></a>
                            <a title="Instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram "></i></a>
                        </p>
                    </div>                    
                </div>                               
               
                                
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#about">About</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane body active" id="about">
                            <p>Dr. Charlotte Deo Leon is a neurosurgeon in East Patchogue,Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. He received his medical degree from Harvard Medical School and has been in practice for 21 years. He is one of 5 doctors at Brookhaven Memorial Hospital Medical Center and one of 9 at Southside Hospital who specialize in Neurological Surgery.</p>
                            <h6>Qualifications</h6>
                            <hr>
                            <ul class="list-unstyled">
                                <li>
                                    <p><strong>Hospital Affiliations:</strong> UCSF MEDICAL CENTER</p>
                                </li>
                                <li>
                                    <p><strong>Medical School:</strong> Palmer College of Chiropractic 1978</p>
                                </li>
                                <li>
                                    <p><strong>Residency:</strong> New york</p>
                                </li>
                                <li>
                                    <p><strong>Certifications:</strong> Certified Chiropractic Sports Physician 1982</p>
                                </li>
                                <li>
                                    <p><strong>Gender:</strong> Female</p>
                                </li>
                                <li>
                                    <p><strong>Experience / Tranining:</strong> Past-President, Int. Fed. 1991</p>
                                </li>
                                <li>
                                    <p><strong>Internship:</strong> Palmer Clinic</p>
                                </li>
                            </ul>
                            <h6>Specialties</h6>
                            <hr>
                            <ul class="list-unstyled specialties">
                                <li>Breast Surgery</li>
                                
                            </ul>
                        </div>
                                            
                    </div>
                </div>
                             
            </div>
        </div>        
    </div>
</section>
@endsection