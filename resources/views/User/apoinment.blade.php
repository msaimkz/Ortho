@extends('User.master')

@section('content')
    <!-- Start Page Heading -->
  <section class="cs_page_heading cs_bg_filed cs_center" data-src="assets/img/page_heading_bg.jpg">
    <div class="container">
      <h1 class="cs_page_title">Appointments</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
        <li class="breadcrumb-item active">Appointments</li>
      </ol>
    </div>
  </section>
  <!-- End Page Heading -->
  <!-- Start Appointment Section -->
  <section class="cs_appointment">
    <div class="cs_height_110 cs_height_lg_70"></div>
    <div class="container">
      <div class="cs_appointment_form_wrapper">
        <div class="cs_section_heading cs_style_1 text-center">
          <p class="cs_section_subtitle cs_accent_color">
            <span class="cs_shape_left"></span>MAKE APPOINTMENTS<span class="cs_shape_right"></span>
          </p>
          <h2 class="cs_section_title">Booking Now Appointments</h2>
        </div>
        <div class="cs_height_40 cs_height_lg_35"></div>
        <form class="cs_appointment_form row cs_gap_y_30">
          <div class="col-md-6">
            <input type="text" name="name" class="cs_form_field" placeholder="Name">
          </div>
          <div class="col-md-6">
            <input type="email" name="email" class="cs_form_field" placeholder="Email">
          </div>
          <div class="col-md-12">
            <input type="text" name="address" class="cs_form_field" placeholder="Address">
          </div>
          <div class="col-md-12">
            <select name="service" class="cs_form_field">
              <option value="choose-service">Choose Service</option>
              <option value="crutches">Crutches</option>
              <option value="x-Ray">X-Ray</option>
              <option value="pulmonary">Pulmonary</option>
              <option value="cardiology">Cardiology</option>
              <option value="dental-care">Dental Care</option>
              <option value="neurology">Neurology</option>
            </select>
          </div>
          <div class="col-md-12">
            <input type="text" name="date" class="cs_form_field" placeholder="Appointment date & time">
          </div>
          <div class="col-md-12">
            <button type="submit" class="cs_btn cs_style_1 cs_white_color">Make an appoinment</button>
          </div>
        </form>
      </div>
    </div>
    <div class="cs_height_120 cs_height_lg_80"></div>
  </section>
  <!-- End Appointment Section -->
@endsection