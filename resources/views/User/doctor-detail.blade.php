@extends('User.master')

@section('content')
     <!-- Start Page Heading -->
  <section class="cs_page_heading cs_bg_filed cs_center" data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
    <div class="container">
      <h1 class="cs_page_title">Doctor Details</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
        <li class="breadcrumb-item active">Doctor Details</li>
      </ol>
    </div>
  </section>
  <!-- End Page Heading -->
  <section>
    <div class="cs_height_120 cs_height_lg_80"></div>
    <div class="container">
      <div class="cs_doctor_details_wrapper">
        <div class="row cs_row_gap_30 cs_gap_y_30">
          <div class="col-lg-5">
            <div class="cs_doctor_details_thumbnail position-relative">
              <img src="{{ asset('Assets/User/assets/img/doctor_details_1.jpg') }}" alt="Doctor Image">
              <div class="cs_doctor_thumbnail_shape1 position-absolute cs_blue_bg"></div>
              <div class="cs_doctor_thumbnail_shape2 position-absolute cs_accent_bg"></div>
            </div>
          </div>
          <div class="col-lg-7">
            <div class="cs_doctor_details">
              <div class="cs_doctor_info_header">
                <h3 class="cs_doctor_title">Dr. Lataro Bara</h3>
                <p class="cs_doctor_subtitle mb-0">Manegar</p>
              </div>
              <p class="mb-0">We irtual desktop offers a fast and reliable best from anywhere. A truly powerful tool
                where your data and applications are secured in a private location in the prestigious Telehouse data
                centre in London.</p><br>
                <p class="mb-0">The majority have suffered alteration in some form, by injected humour, or randomised words
                which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be
                sure there isn't anything embarrassing hidden in the middle of text.</p>                
              <div class="cs_height_20 cs_height_lg_20"></div>
              <div class="cs_doctor_info_wrapper">
                <div class="cs_doctor_info_row">
                  <div class="cs_doctor_info_col">
                    <div class="cs_iconbox cs_style_10">
                      <div class="cs_iconbox_icon"><i class="fa-solid fa-location-dot"></i></div>
                      <div class="cs_iconbox_text">
                        <h3 class="cs_iconbox_title">Location</h3>
                        <p class="cs_iconbox_subtitle mb-0">Dhaka,Dhaka 31</p>
                      </div>
                    </div>
                  </div>
                  <div class="cs_doctor_info_col">
                    <div class="cs_iconbox cs_style_10">
                      <div class="cs_iconbox_icon"><i class="fa-solid fa-envelope"></i></div>
                      <div class="cs_iconbox_text">
                        <h3 class="cs_iconbox_title">E-mail:</h3>
                        <p class="cs_iconbox_subtitle mb-0">ranst@g-mail.com</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cs_doctor_info_row">
                  <div class="cs_doctor_info_col">
                    <div class="cs_iconbox cs_style_10">
                      <div class="cs_iconbox_icon"><i class="fa-solid fa-certificate"></i></div>
                      <div class="cs_iconbox_text">
                        <h3 class="cs_iconbox_title">Qualification</h3>
                        <p class="cs_iconbox_subtitle mb-0">M.S.S</p>
                      </div>
                    </div>
                  </div>
                  <div class="cs_doctor_info_col">
                    <div class="cs_iconbox cs_style_10">
                      <div class="cs_iconbox_icon"><i class="fa-solid fa-globe"></i></div>
                      <div class="cs_iconbox_text">
                        <h3 class="cs_iconbox_title">Website</h3>
                        <p class="cs_iconbox_subtitle mb-0">demo.com</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="cs_doctor_info_row">
                  <div class="cs_doctor_info_col">
                    <div class="cs_iconbox cs_style_10">
                      <div class="cs_iconbox_icon"><i class="fa-solid fa-suitcase"></i></div>
                      <div class="cs_iconbox_text">
                        <h3 class="cs_iconbox_title">Experience</h3>
                        <p class="cs_iconbox_subtitle mb-0">2 - 4 Years</p>
                      </div>
                    </div>
                  </div>
                  <div class="cs_doctor_info_col">
                    <div class="cs_iconbox cs_style_10">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="cs_height_47 cs_height_lg_40"></div>
        <div class="cs_height_20 cs_height_lg_20"></div>
        <p class="mb-0">The majority have suffered alteration in some form, by injected humour, or randomised words
          which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be
          sure there isn't anything embarr assing hidden in ge editors now the middle of text. All the Lorem Ipsum
          generators on the Internet tend to repeat predefined chunk readable content of a page when looking at its
          layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as
          opposed to using 'Content here, content here', making it look like readable English. Many.</p>
        <div class="cs_height_30 cs_height_lg_30"></div>
      
      </div>
      <div class="cs_height_100 cs_height_lg_60"></div>
      <hr>
    </div>
  </section>
@endsection