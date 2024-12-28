@extends('User.master')

@section('content')
      <!-- Start Page Heading -->
  <section class="cs_page_heading cs_bg_filed cs_center" data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
    <div class="container">
      <h1 class="cs_page_title">Our Doctors</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
        <li class="breadcrumb-item active">Our Doctors</li>
      </ol>
    </div>
  </section>
  <!-- End Page Heading -->
  <!-- Start Team Section -->
  <section>
    <div class="cs_height_110 cs_height_lg_70"></div>
    <div class="container">
      <div class="cs_section_heading cs_style_1 text-center">
        <p class="cs_section_subtitle cs_accent_color">
          <span class="cs_shape_left"></span>OUR TEAM MEMBER<span class="cs_shape_right"></span>
        </p>
        <h2 class="cs_section_title">Meet Our Specialist This <br>Doctor Meeting</h2>
      </div>
      <div class="cs_height_50 cs_height_lg_50"></div>
      <div class="cs_doctors_grid cs_style_1">
        <div class="cs_team cs_style_1 cs_blue_bg">
          <div class="cs_team_shape cs_accent_bg"></div>
          <a class='cs_team_thumbnail' href='doctor-details.html'>
            <img src="{{ asset('Assets/User/assets/img/team_1.jpg') }}" alt="Team Thumbnail">
          </a>
          <div class="cs_team_bio">
            <h3 class="cs_team_title cs_extra_bold mb-0"><a href='doctor-details.html'>Dr. Norma Pedric</a></h3>
            <p class="cs_team_subtitle">Neurologiest</p>
            <div class="cs_social_btns cs_style_1">
              <a href="#" class="cs_center"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-pinterest-p"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_team cs_style_1 cs_blue_bg">
          <div class="cs_team_shape cs_accent_bg"></div>
          <a class='cs_team_thumbnail' href='doctor-details.html'>
            <img src="{{ asset('Assets/User/assets/img/team_7.jpg') }}" alt="Team Thumbnail">
          </a>
          <div class="cs_team_bio">
            <h3 class="cs_team_title cs_extra_bold mb-0"><a href='doctor-details.html'>Dr. Norma Pedric</a></h3>
            <p class="cs_team_subtitle">Neurologiest</p>
            <div class="cs_social_btns cs_style_1">
              <a href="#" class="cs_center"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-pinterest-p"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_team cs_style_1 cs_blue_bg">
          <div class="cs_team_shape cs_accent_bg"></div>
          <a class='cs_team_thumbnail' href='doctor-details.html'>
            <img src="{{ asset('Assets/User/assets/img/team_3.jpg') }}" alt="Team Thumbnail">
          </a>
          <div class="cs_team_bio">
            <h3 class="cs_team_title cs_extra_bold mb-0"><a href='{{ route('User.DoctorDetail') }}'>Dr. Norma Pedric</a></h3>
            <p class="cs_team_subtitle">Neurologiest</p>
            <div class="cs_social_btns cs_style_1">
              <a href="#" class="cs_center"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-pinterest-p"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_team cs_style_1 cs_blue_bg">
          <div class="cs_team_shape cs_accent_bg"></div>
          <a class='cs_team_thumbnail' href='doctor-details.html'>
            <img src="{{ asset('Assets/User/assets/img/team_4.jpg') }}" alt="Team Thumbnail">
          </a>
          <div class="cs_team_bio">
            <h3 class="cs_team_title cs_extra_bold mb-0"><a href='doctor-details.html'>Dr. Norma Pedric</a></h3>
            <p class="cs_team_subtitle">Neurologiest</p>
            <div class="cs_social_btns cs_style_1">
              <a href="#" class="cs_center"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-pinterest-p"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_team cs_style_1 cs_blue_bg">
          <div class="cs_team_shape cs_accent_bg"></div>
          <a class='cs_team_thumbnail' href='doctor-details.html'>
            <img src="{{ asset('Assets/User/assets/img/team_5.jpg') }}" alt="Team Thumbnail">
          </a>
          <div class="cs_team_bio">
            <h3 class="cs_team_title cs_extra_bold mb-0"><a href='doctor-details.html'>Dr. Norma Pedric</a></h3>
            <p class="cs_team_subtitle">Neurologiest</p>
            <div class="cs_social_btns cs_style_1">
              <a href="#" class="cs_center"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-pinterest-p"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_team cs_style_1 cs_blue_bg">
          <div class="cs_team_shape cs_accent_bg"></div>
          <a class='cs_team_thumbnail' href='doctor-details.html'>
            <img src="{{ asset('Assets/User/assets/img/team_6.jpg') }}" alt="Team Thumbnail">
          </a>
          <div class="cs_team_bio">
            <h3 class="cs_team_title cs_extra_bold mb-0"><a href='doctor-details.html'>Dr. Norma Pedric</a></h3>
            <p class="cs_team_subtitle">Neurologiest</p>
            <div class="cs_social_btns cs_style_1">
              <a href="#" class="cs_center"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-pinterest-p"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_team cs_style_1 cs_blue_bg">
          <div class="cs_team_shape cs_accent_bg"></div>
          <a class='cs_team_thumbnail' href='doctor-details.html'>
            <img src="{{ asset('Assets/User/assets/img/team_1.jpg') }}" alt="Team Thumbnail">
          </a>
          <div class="cs_team_bio">
            <h3 class="cs_team_title cs_extra_bold mb-0"><a href='doctor-details.html'>Dr. Norma Pedric</a></h3>
            <p class="cs_team_subtitle">Neurologiest</p>
            <div class="cs_social_btns cs_style_1">
              <a href="#" class="cs_center"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-pinterest-p"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_team cs_style_1 cs_blue_bg">
          <div class="cs_team_shape cs_accent_bg"></div>
          <a class='cs_team_thumbnail' href='doctor-details.html'>
            <img src="{{ asset('Assets/User/assets/img/team_8.jpg') }}" alt="Team Thumbnail">
          </a>
          <div class="cs_team_bio">
            <h3 class="cs_team_title cs_extra_bold mb-0"><a href='doctor-details.html'>Dr. Norma Pedric</a></h3>
            <p class="cs_team_subtitle">Neurologiest</p>
            <div class="cs_social_btns cs_style_1">
              <a href="#" class="cs_center"><i class="fa-brands fa-facebook-f"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-pinterest-p"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-twitter"></i></a>
              <a href="#" class="cs_center"><i class="fa-brands fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cs_height_120 cs_height_lg_80"></div>
  </section>
  <!-- End Team Section -->
@endsection