@extends('User.master')

@section('content')
     <!-- Start Page Heading -->
  <section class="cs_page_heading cs_bg_filed cs_center" data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
    <div class="container">
      <h1 class="cs_page_title">Our Service</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='index.html'>Home</a></li>
        <li class="breadcrumb-item active">Service</li>
      </ol>
    </div>
  </section>
  <!-- End Page Heading -->

  
<!-- Start Service Section -->
<section class="cs_gray_bg">
    <div class="cs_height_110 cs_height_lg_70"></div>
    <div class="container">
      <div class="cs_section_heading cs_style_1 cs_type_1">
        <div class="cs_section_heading_left">
          <p class="cs_section_subtitle cs_accent_color wow fadeInLeft" data-wow-duration="0.9s" data-wow-delay="0.25s">
            <span class="cs_shape_left"></span>
            OUR BEST SERVICE
          </p>
          <h2 class="cs_section_title">High-Quality Services This Doctor</h2>
        </div>
        <div class="cs_section_heading_right">We are privileged to work with hundreds of future-thinking medial, including many of the world’s top hardware, software, and brands , feel safe and comfortable in establishing.</div>
      </div>
      <div class="cs_height_50 cs_height_lg_50"></div>
      <div class="row cs_row_gap_30 cs_gap_y_30">
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="cs_iconbox cs_style_2 cs_radius_15 cs_hover_layer_2">
            <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{ asset('Assets/User/assets/img/service_bg.jpg') }}"></div>
            <div class="cs_iconbox_shape"></div>
            <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
              <div class="cs_iconbox_icon cs_center">
                <img src="{{ asset('Assets/User/assets/img/icons/service_icon_1.png') }}" alt="Service Icon">
              </div>
              <h3 class="iconbox_index">01</h3>
            </div>
            <h3 class="cs_iconbox_title"><a href='service-details.html'>Pharmacology</a></h3>
            <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="cs_iconbox cs_style_2 cs_radius_15">
            <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{ asset('Assets/User/assets/img/service_bg.jpg') }}"></div>
            <div class="cs_iconbox_shape"></div>
            <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
              <div class="cs_iconbox_icon cs_center">
                <img src="{{ asset('Assets/User/assets/img/icons/service_icon_2.png') }}" alt="Service Icon">
              </div>
              <h3 class="iconbox_index">02</h3>
            </div>
            <h3 class="cs_iconbox_title"><a href='service-details.html'>Orthopedic</a></h3>
            <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="cs_iconbox cs_style_2 cs_radius_15">
            <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{ asset('Assets/User/assets/img/service_bg.jpg') }}"></div>
            <div class="cs_iconbox_shape"></div>
            <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
              <div class="cs_iconbox_icon cs_center">
                <img src="{{ asset('Assets/User/assets/img/icons/service_icon_3.png') }}" alt="Service Icon">
              </div>
              <h3 class="iconbox_index">03</h3>
            </div>
            <h3 class="cs_iconbox_title"><a href='service-details.html'>Hematology</a></h3>
            <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="cs_iconbox cs_style_2 cs_radius_15">
            <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{ asset('Assets/User/assets/img/service_bg.jpg') }}"></div>
            <div class="cs_iconbox_shape"></div>
            <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
              <div class="cs_iconbox_icon cs_center">
                <img src="{{ asset('Assets/User/assets/img/icons/service_icon_4.png') }}" alt="Service Icon">
              </div>
              <h3 class="iconbox_index">04</h3>
            </div>
            <h3 class="cs_iconbox_title"><a href='service-details.html'>Plastic Surgery</a></h3>
            <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="cs_iconbox cs_style_2 cs_radius_15">
            <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{ asset('Assets/User/assets/img/service_bg.jpg') }}"></div>
            <div class="cs_iconbox_shape"></div>
            <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
              <div class="cs_iconbox_icon cs_center">
                <img src="{{ asset('Assets/User/assets/img/icons/service_icon_5.png') }}" alt="Service Icon">
              </div>
              <h3 class="iconbox_index">05</h3>
            </div>
            <h3 class="cs_iconbox_title"><a href='service-details.html'>Neurology</a></h3>
            <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="cs_iconbox cs_style_2 cs_radius_15">
            <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{ asset('Assets/User/assets/img/service_bg.jpg') }}"></div>
            <div class="cs_iconbox_shape"></div>
            <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
              <div class="cs_iconbox_icon cs_center">
                <img src="{{ asset('Assets/User/assets/img/icons/service_icon_6.png') }}" alt="Service Icon">
              </div>
              <h3 class="iconbox_index">06</h3>
            </div>
            <h3 class="cs_iconbox_title"><a href='service-details.html'>Ophthalmology</a></h3>
            <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="cs_iconbox cs_style_2 cs_radius_15">
            <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{ asset('Assets/User/assets/img/service_bg.jpg') }}"></div>
            <div class="cs_iconbox_shape"></div>
            <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
              <div class="cs_iconbox_icon cs_center">
                <img src="{{ asset('Assets/User/assets/img/icons/service_icon_7.png') }}" alt="Service Icon">
              </div>
              <h3 class="iconbox_index">07</h3>
            </div>
            <h3 class="cs_iconbox_title"><a href='service-details.html'>Dental Care</a></h3>
            <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
          </div>
        </div>
        <div class="col-xl-3 col-lg-4 col-sm-6">
          <div class="cs_iconbox cs_style_2 cs_radius_15">
            <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{ asset('Assets/User/assets/img/service_bg.jpg') }}"></div>
            <div class="cs_iconbox_shape"></div>
            <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
              <div class="cs_iconbox_icon cs_center">
                <img src="{{ asset('Assets/User/assets/img/icons/service_icon_8.png') }}" alt="Service Icon">
              </div>
              <h3 class="iconbox_index">08</h3>
            </div>
            <h3 class="cs_iconbox_title"><a href='service-details.html'>Cardiology</a></h3>
            <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
          </div>
        </div>
      </div>
      
    <div class="cs_height_120 cs_height_lg_80"></div>
  </section>
  <!-- End Service Section -->
@endsection