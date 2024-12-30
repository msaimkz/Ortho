@extends('Admin.master')
@section('content')
<section class="content">
    <div class="block-header">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <h2>All Doctors
                <small>Welcome to Ortho</small>
                </h2>
            </div>            
            <div class="col-lg-7 col-md-7 col-sm-12 text-right">
                <button class="btn btn-white btn-icon btn-round d-none d-md-inline-block float-right m-l-10" type="button">
                    <i class="zmdi zmdi-plus"></i>
                </button>
                <ul class="breadcrumb float-md-right">
                    <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i> Ortho</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Doctors</a></li>
                    <li class="breadcrumb-item active">All Doctors</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12">
                <div class="card">
                    <div class="body">
                        <ul class="nav nav-tabs padding-0">
                            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#Permanent">Permanent</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content m-t-10">
                    <div class="tab-pane active" id="Permanent">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card xl-blue member-card doctor">
                                    <div class="body">
                                        <div class="member-thumb">
                                            <img src="{{ asset('Assets/Dashboard/assets/images/doctors/member1.png') }}" class="img-fluid" alt="profile-image">                               
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-b-0">Dr. John</h4>
                                            <p class="text-muted">Dentist</p>
                                            <ul class="social-links list-inline m-t-20">
                                                <li><a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a title="twitter" href="#" ><i class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a title="instagram" href="#" ><i class="zmdi zmdi-instagram"></i></a></li>
                                            </ul>
                                            <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>                           
                                            <a href="{{ route('Admin.doctor.profile') }}"  class="btn btn-default btn-round btn-simple">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div> 
                    </div>
                    <div class="tab-pane" id="Consultant">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card xl-khaki member-card doctor">
                                    <div class="body">
                                        <div class="member-thumb">
                                            <img src="../assets/images/doctors/member2.png" class="img-fluid" alt="profile-image">                               
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-b-0">Dr. Amelia</h4>
                                            <p class="text-muted">Gynecologist</p>
                                            <ul class="social-links list-inline m-t-20">
                                                <li><a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a title="twitter" href="#" ><i class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a title="instagram" href="#" ><i class="zmdi zmdi-instagram"></i></a></li>
                                            </ul>
                                            <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>                           
                                            <a href="profile.html"  class="btn btn-default btn-round btn-simple">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card xl-blue member-card doctor">
                                    <div class="body">
                                        <div class="member-thumb">
                                            <img src="../assets/images/doctors/member3.png" class="img-fluid" alt="profile-image">                               
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-b-0">Dr. Jack </h4>
                                            <p class="text-muted">Dentist</p>
                                            <ul class="social-links list-inline m-t-20">
                                                <li><a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a title="twitter" href="#" ><i class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a title="instagram" href="#" ><i class="zmdi zmdi-instagram"></i></a></li>
                                            </ul>
                                            <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>                           
                                            <a href="profile.html"  class="btn btn-default btn-round btn-simple">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card xl-pink member-card doctor">
                                    <div class="body">
                                        <div class="member-thumb">
                                            <img src="../assets/images/doctors/member5.png" class="img-fluid" alt="profile-image">                               
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-b-0">Dr. Joseph </h4>
                                            <p class="text-muted">Audiology</p>
                                            <ul class="social-links list-inline m-t-20">
                                                <li><a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a title="twitter" href="#" ><i class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a title="instagram" href="#" ><i class="zmdi zmdi-instagram"></i></a></li>
                                            </ul>
                                            <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>                           
                                            <a href="profile.html"  class="btn btn-default btn-round btn-simple">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <div class="card xl-seagreen member-card doctor">
                                    <div class="body">
                                        <div class="member-thumb">
                                            <img src="../assets/images/doctors/member6.png" class="img-fluid" alt="profile-image">                               
                                        </div>
                                        <div class="detail">
                                            <h4 class="m-b-0">Dr. Charlie </h4>
                                            <p class="text-muted">Physical Therapy</p>
                                            <ul class="social-links list-inline m-t-20">
                                                <li><a title="facebook" href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                                                <li><a title="twitter" href="#" ><i class="zmdi zmdi-twitter"></i></a></li>
                                                <li><a title="instagram" href="#" ><i class="zmdi zmdi-instagram"></i></a></li>
                                            </ul>
                                            <p class="text-muted">795 Folsom Ave, Suite 600 San Francisco, CADGE 94107</p>                           
                                            <a href="profile.html"  class="btn btn-default btn-round btn-simple">View Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div> 
    </div>
</section>
@endsection