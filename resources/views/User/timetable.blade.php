@extends('User.master')

@section('content')
   <!-- Start Page Heading -->
   <section class="cs_page_heading cs_bg_filed cs_center" data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
    <div class="container">
      <h1 class="cs_page_title">Our Timetable</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
        <li class="breadcrumb-item active">Timetable</li>
      </ol>
    </div>
  </section>
  <!-- End Page Heading -->
  <!-- Start Timeline Section -->
  <section>
    <div class="cs_height_110 cs_height_lg_70"></div>
    <div class="container">
      <div class="cs_section_heading cs_style_1 text-center">
        <p class="cs_section_subtitle cs_accent_color">
          <span class="cs_shape_left"></span>OUR TIMETABLE<span class="cs_shape_right"></span>
        </p>
        <h2 class="cs_section_title">Events Calendar Specialist This <br>Timetabel Meet</h2>
      </div>
      <div class="cs_height_50 cs_height_lg_50"></div>
      <div class="cs_timeline_wrapper">
        <div class="cs_days_row">
          <div class="cs_day_col">Time</div>
          <div class="cs_day_col">Saturday</div>
          <div class="cs_day_col">Sunday</div>
          <div class="cs_day_col">Monday</div>
          <div class="cs_day_col">Tuesday</div>
          <div class="cs_day_col">Wednesday</div>
          <div class="cs_day_col">Thursday</div>
          <div class="cs_day_col">Friday</div>
        </div>
        <div class="cs_content_row">
          <div class="cs_content_col cs_time">10.00</div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Pulmonary</h3>
              <p class="cs_schedule_time">10.00-11.00</p>
              <p class="cs_doctor_title">Laparoscopy</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Cardiology</h3>
              <p class="cs_schedule_time">10.00-11.00</p>
              <p class="cs_doctor_title">Laparoscopy</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Pulmonary</h3>
              <p class="cs_schedule_time">10.00-11.00</p>
              <p class="cs_doctor_title">Routine</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Cardiology</h3>
              <p class="cs_schedule_time">10.00-11.00</p>
              <p class="cs_doctor_title">Runada</p>
            </div>
          </div>
        </div>
        <div class="cs_content_row">
          <div class="cs_content_col cs_time">
            11.00
          </div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Dental</h3>
              <p class="cs_schedule_time">11.00-12.00</p>
              <p class="cs_doctor_title">Dr.Porta</p>
            </div>
          </div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Cardiology</h3>
              <p class="cs_schedule_time">11.00-12.00</p>
              <p class="cs_doctor_title">Randy Nelson</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Pulmonary</h3>
              <p class="cs_schedule_time">11.00-12.00</p>
              <p class="cs_doctor_title">Randy Nelson</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Cardiology</h3>
              <p class="cs_schedule_time">11.00-12.00</p>
              <p class="cs_doctor_title">Randy Nelson</p>
            </div>
          </div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Cardiology</h3>
              <p class="cs_schedule_time">11.00-12.00</p>
              <p class="cs_doctor_title">Randy Nelson</p>
            </div>
          </div>
        </div>
        <div class="cs_content_row">
          <div class="cs_content_col cs_time">
            12.00
          </div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Pulmonary</h3>
              <p class="cs_schedule_time">12.00-1.00</p>
              <p class="cs_doctor_title">Randy Nelson</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Pulmonary</h3>
              <p class="cs_schedule_time">12.00-1.00</p>
              <p class="cs_doctor_title">Randy Nelson</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Dental</h3>
              <p class="cs_schedule_time">12.00-1.00</p>
              <p class="cs_doctor_title">Dr.Porta</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Dental</h3>
              <p class="cs_schedule_time">12.00-1.00</p>
              <p class="cs_doctor_title">Randy Nelson</p>
            </div>
          </div>
        </div>
        <div class="cs_content_row">
          <div class="cs_content_col cs_time">
            2.00
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Cardiology</h3>
              <p class="cs_schedule_time">2.00-3.00</p>
              <p class="cs_doctor_title">Dr.Porta</p>
            </div>
          </div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Cardiology</h3>
              <p class="cs_schedule_time">2.00-3.00</p>
              <p class="cs_doctor_title">Randy Nelson</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Dental</h3>
              <p class="cs_schedule_time">2.00-3.00</p>
              <p class="cs_doctor_title">Randy Nelson</p>
            </div>
          </div>
          <div class="cs_content_col"></div>
          <div class="cs_content_col">
            <div class="cs_schedule_wrapper">
              <h3 class="cs_schedule_title cs_semibold">Cardiology</h3>
              <p class="cs_schedule_time">2.00-3.00</p>
              <p class="cs_doctor_title">Dr.Porta</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="cs_height_120 cs_height_lg_80"></div>
  </section>
  <!-- End Timeline Section -->   
@endsection