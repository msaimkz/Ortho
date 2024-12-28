@extends('User.master')

@section('content')
<section class="cs_page_heading cs_bg_filed cs_center" data-src="{{asset('Assets/User/assets/img/page_heading_bg.jpg')}}">
    <div class="container">
      <h1 class="cs_page_title">Service Details</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
        <li class="breadcrumb-item active">Service Details</li>
      </ol>
    </div>
  </section>
  <!-- End Page Heading -->
  <!-- Start Service Details Section -->
  <section>
    <div class="cs_height_110 cs_height_lg_70"></div>
    <div class="container">
      <div class="row cs_gap_y_40">
        <div class="col-xl-4 col-lg-5">
          <div class="cs_solution_content_wrapper cs_gray_bg cs_type_1">
            <h3 class="cs_service_heading">All Service:</h3>
            <ul class="cs_solution_links cs_style_2 cs_mp0">
              <li>
                <a href='service-details.html'>
                  <span class="cs_tab_link_icon_left cs_center"><i class="fa-solid fa-check"></i></span>
                  <span>Medical lab service</span>
                </a>
              </li>
              <li>
                <a href='service-details.html'>
                  <span class="cs_tab_link_icon_left cs_center"><i class="fa-solid fa-check"></i></span>
                  <span>Dental best service</span>
                </a>
              </li>
              <li>
                <a href='service-details.html'>
                  <span class="cs_tab_link_icon_left cs_center"><i class="fa-solid fa-check"></i></span>
                  <span>Dedicate doctor best</span>
                </a>
              </li>
              <li>
                <a href='service-details.html'>
                  <span class="cs_tab_link_icon_left cs_center"><i class="fa-solid fa-check"></i></span>
                  <span>Team can help achieve</span>
                </a>
              </li>
              <li>
                <a href='service-details.html'>
                  <span class="cs_tab_link_icon_left cs_center"><i class="fa-solid fa-check"></i></span>
                  <span>Medical goals lab</span>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-xl-8 col-lg-7">
          <div class="cs_service_details_thumbnail">
            <img src="{{asset('Assets/User/assets/img/service_details_1.jpg')}}" alt="Image">
          </div>
        </div>
      </div>
      <div class="cs_height_35 cs_height_lg_30"></div>
      <div class="cs_service_details">
        <h3 class="cs_service_heading">Service Details:</h3>
        <p class="cs_service_subtitle">It is a long established fact that a reader will be distracted restore
          inexpensive e-markets vis to is a long established fact that a reader will be distracted restore inexpensive
          e-markets vis to corporate intellectual capital. Holisticly reinvent compelling niche markets via scalable
          strategic. by the readable content of a page when looking. vis corporate intellectual capital. Holisticly
          reinvent compelling niche markets via scalabl etrategic.by the meadable content of a page when looking at its
          layout. The point to this singis that normal distribution of Medical</p>
        <p class="cs_service_subtitle">We is a long established fact that a reader will be distracted restore
          inexpensive e-markets vis tontellectual capital. Holisticly reinvent compelling niche markets via scalable
          strategic. by the readable content of a page when looking. vis corporate intellectual capital. vis corporate
          intellectual capitalh olisticly reinvent compelling niche markets via scalable strategic. by the readable
          content of a page when looking.</p>
        <div class="cs_height_35 cs_height_lg_30"></div>
        <div class="row cs_gap_y_30">
          <div class="col-lg-6">
            <div class="cs_service_details_thumbnail">
              <img src="{{asset('Assets/User/assets/img/service_details_2.jpg')}}" alt="Image">
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row cs_gap_y_30">
              <div class="col-xl-6 col-lg-12 col-md-6">
                <div class="cs_iconbox cs_style_2 cs_radius_15 cs_gray_bg">
                  <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{asset('Assets/User/assets/img/service_bg.jpg')}}"></div>
                  <div class="cs_iconbox_shape"></div>
                  <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
                    <div class="cs_iconbox_icon cs_center">
                      <img src="{{asset('Assets/User/assets/img/icons/service_icon_1.png')}}" alt="Service Icon">
                    </div>
                    <h3 class="iconbox_index">01</h3>
                  </div>
                  <h3 class="cs_iconbox_title"><a href='service-details.html'>Service & Check</a></h3>
                  <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
                </div>
              </div>
              <div class="col-xl-6 col-lg-12 col-md-6">
                <div class="cs_iconbox cs_style_2 cs_radius_15 cs_gray_bg">
                  <div class="cs_iconbox_overlay cs_bg_filed" data-src="{{asset('Assets/User/assets/img/service_bg.jpg')}}"></div>
                  <div class="cs_iconbox_shape"></div>
                  <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
                    <div class="cs_iconbox_icon cs_center">
                      <img src="{{asset('Assets/User/assets/img/icons/service_icon_2.png')}}" alt="Service Icon">
                    </div>
                    <h3 class="iconbox_index">02</h3>
                  </div>
                  <h3 class="cs_iconbox_title"><a href='service-details.html'>Medical Care</a></h3>
                  <p class="cs_iconbox_subtitle m-0">Medical competitor research startup to financial</p>
                </div>
              </div>
            </div>
            <div class="cs_about_iconbox">
              <div class="cs_about_iconbox_icon cs_center">
                <i class="fa-regular fa-circle-check"></i>
              </div>
              <p class="cs_about_iconbox_subtitle">There are many variations of pass available this medical service the
                team <a href="#">READ MORE +</a></p>
            </div>
          </div>
        </div>
        <div class="cs_height_45 cs_height_lg_30"></div>
        <p class="cs_service_subtitle mb-0">We is a long established fact that a reader will be distracted restore
          inexpensive e-markets vis tontellectual capital. Holisticly reinvent compelling niche markets via scalable
          strategic. by the readable content of a page when looking. vis corporate intellectual capital. vis corporate
          intellectual capitalh olisticly reinvent compelling niche markets via scalable strategic. by the readable
          content of a page when looking.</p>
      </div>
    </div>
    <div class="cs_height_110 cs_height_lg_70"></div>
  </section>
  <!-- End Service Details Section -->
@endsection