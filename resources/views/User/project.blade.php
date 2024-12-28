@extends('User.master')

@section('content')
     <!-- Start Page Heading -->
  <section class="cs_page_heading cs_bg_filed cs_center" data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
    <div class="container">
      <h1 class="cs_page_title">Our Portfolio</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
        <li class="breadcrumb-item active">Portfolio</li>
      </ol>
    </div>
  </section>
  <!-- End Page Heading -->
  <!-- Start Projects Section -->
  <section>
    <div class="cs_height_110 cs_height_lg_70"></div>
    <div class="container">
      <div class="cs_section_heading cs_style_1 cs_type_1">
        <div class="cs_section_heading_left">
          <p class="cs_section_subtitle cs_accent_color"><span class="cs_shape_left"></span>OUR PORTFOLIO</p>
          <h2 class="cs_section_title">All The Great Work That We Done</h2>
        </div>
        <div class="cs_section_heading_right">We are privileged to work with hundreds of future-thinking
          medial,including many of the world’s top hardware, software, and brands , feel safe and comfortable in
          establishing.</div>
      </div>
      <div class="cs_height_50 cs_height_lg_50"></div>
    </div>
    <div class="container-fluide">
      <div class="cs_project_grid cs_style_1">
        <div class="cs_project_item">
          <div class="cs_card cs_style_5">
            <div class="cs_card_thumbnail">
              <img src="{{ asset('Assets/User/assets/img/project_4.jpg') }}" alt="Project Image">
            </div>
            <div class="cs_card_info_wrapper">
              <div class="cs_card_index cs_white_color">01</div>
              <div class="cs_card_text">
                <h3 class="cs_card_title cs_white_color mb-0"><a href="#">Medical Board</a></h3>
                <p class="cs_card_subtitle cs_white_color mb-0">Medical / Doctor</p>
              </div>
              <a href="#" class="cs_iconbox_btn cs_center"><i class="fa-solid fa-circle-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_project_item">
          <div class="cs_card cs_style_5">
            <div class="cs_card_thumbnail">
              <img src="{{ asset('Assets/User/assets/img/project_5.jpg') }}" alt="Project Image">
            </div>
            <div class="cs_card_info_wrapper">
              <div class="cs_card_index cs_white_color">02</div>
              <div class="cs_card_text">
                <h3 class="cs_card_title cs_white_color mb-0"><a href="#">Gynecology Project</a></h3>
                <p class="cs_card_subtitle cs_white_color mb-0">Medical / Doctor</p>
              </div>
              <a href="#" class="cs_iconbox_btn cs_center"><i class="fa-solid fa-circle-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_project_item">
          <div class="cs_card cs_style_5">
            <div class="cs_card_thumbnail">
              <img src="{{ asset('Assets/User/assets/img/project_6.jpg') }}" alt="Project Image">
            </div>
            <div class="cs_card_info_wrapper">
              <div class="cs_card_index cs_white_color">03</div>
              <div class="cs_card_text">
                <h3 class="cs_card_title cs_white_color mb-0"><a href="#">Denatl Project</a></h3>
                <p class="cs_card_subtitle cs_white_color mb-0">Medical / Doctor</p>
              </div>
              <a href="#" class="cs_iconbox_btn cs_center"><i class="fa-solid fa-circle-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_project_item">
          <div class="cs_card cs_style_5">
            <div class="cs_card_thumbnail">
              <img src="{{ asset('Assets/User/assets/img/project_7.jpg') }}" alt="Project Image">
            </div>
            <div class="cs_card_info_wrapper">
              <div class="cs_card_index cs_white_color">04</div>
              <div class="cs_card_text">
                <h3 class="cs_card_title cs_white_color mb-0"><a href="#">Neurology Project</a></h3>
                <p class="cs_card_subtitle cs_white_color mb-0">Medical / Doctor</p>
              </div>
              <a href="#" class="cs_iconbox_btn cs_center"><i class="fa-solid fa-circle-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_project_item">
          <div class="cs_card cs_style_5">
            <div class="cs_card_thumbnail">
              <img src="{{ asset('Assets/User/assets/img/project_8.jpg') }}" alt="Project Image">
            </div>
            <div class="cs_card_info_wrapper">
              <div class="cs_card_index cs_white_color">05</div>
              <div class="cs_card_text">
                <h3 class="cs_card_title cs_white_color mb-0"><a href="#">Eye Care Project</a></h3>
                <p class="cs_card_subtitle cs_white_color mb-0">Medical / Doctor</p>
              </div>
              <a href="#" class="cs_iconbox_btn cs_center"><i class="fa-solid fa-circle-chevron-right"></i></a>
            </div>
          </div>
        </div>
        <div class="cs_project_item">
          <div class="cs_card cs_style_5">
            <div class="cs_card_thumbnail">
              <img src="{{ asset('Assets/User/assets/img/project_9.jpg') }}" alt="Project Image">
            </div>
            <div class="cs_card_info_wrapper">
              <div class="cs_card_index cs_white_color">06</div>
              <div class="cs_card_text">
                <h3 class="cs_card_title cs_white_color mb-0"><a href="#">Surgery Project</a></h3>
                <p class="cs_card_subtitle cs_white_color mb-0">Medical / Doctor</p>
              </div>
              <a href="#" class="cs_iconbox_btn cs_center"><i class="fa-solid fa-circle-chevron-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cs_height_120 cs_height_lg_80"></div>
  </section>
@endsection