@extends('User.master')
@section('css')
<style>
    .dropzone {
      border: 2px dashed #007bff;
      border-radius: 5px;
      padding: 20px;
      text-align: center;
      color: #6c757d;
      cursor: pointer;
    }
    .dropzone.dragover {
      background-color: #e9ecef;
      border-color: #007bff;
    }
  </style>
@endsection


@section('content')
    

<section class="cs_appointment">
    <div class="cs_height_110 cs_height_lg_70"></div>
    <div class="container">
      <div class="cs_appointment_form_wrapper">
        <div class="cs_section_heading cs_style_1 text-center">
          <p class="cs_section_subtitle cs_accent_color">
            <span class="cs_shape_left"></span>MAKE Registration<span class="cs_shape_right"></span>
          </p>
          <h2 class="cs_section_title">Registration Now</h2>
        </div>
        <div class="cs_height_40 cs_height_lg_35"></div>
        <form class="cs_appointment_form row cs_gap_y_30">
          <div class="col-md-6">
            <input type="text" name="name" class="cs_form_field" placeholder="Name">
          </div>
          <div class="col-md-6">
            <input type="email" name="email" class="cs_form_field" placeholder="Email">
          </div>
          <div class="col-md-6">
            <input type="text" name="phone" class="cs_form_field" placeholder="Phone No">
          </div>
          <div class="col-md-6">
            <input type="city" name="city" class="cs_form_field" placeholder="City">
          </div>
          <div class="col-md-6">
            <select name="gender" class="cs_form_field">
              <option value="choose-service">Select a Gender</option>
              <option value="dental-care">Male</option>
              <option value="neurology">Female</option>
            </select>
          </div>
          <div class="col-md-6">
            <input type="city" name="city" class="cs_form_field" placeholder="Date Of Birth">
          </div>
          <div class="col-md-12">
            <textarea name="address" class="cs_form_field" id="address" cols="10" rows="3" placeholder="Address"></textarea>
          </div>
          
          <div class="col-md-12">
            <input type="text" name="date" class="cs_form_field" placeholder="Speciality">
          </div>
          <div class="col-md-12">
            <label for="">Profile Image</label>
            <div class="card">
                <div class="container mt-5">
            
                    <div id="dropzone" class="dropzone">
                      Drag and drop your file here or click to upload.
                    </div>
                    <p class="mt-3 text-center" id="fileInfo"></p>
                  </div>
            </div>
            
          </div>
          <div class="col-md-12">
            <label for="">Graduaion Pass Degree</label>
            <div class="card">
                <div class="container mt-5">
            
                    <div id="dropzone" class="dropzone">
                      Drag and drop your file here or click to upload.
                    </div>
                    <p class="mt-3 text-center" id="fileInfo"></p>
                  </div>
            </div>
            
          </div>
          <div class="col-md-12">
            <label for="profile">Social Media Links</label>
            
          </div>
          <div class="col-md-12">
            <input type="text" name="facebook" class="cs_form_field" placeholder="Facebook">
          </div>
          <div class="col-md-12">
            <input type="text" name="Instagram" class="cs_form_field" placeholder="Instagram">
          </div>
          <div class="col-md-12">
            <input type="text" name="Twitter" class="cs_form_field" placeholder="Twitter">
          </div>
          
          <div class="col-md-12">
            <button type="submit" class="cs_btn cs_style_1 cs_white_color">Register Now</button>
          </div>
        </form>
      </div>
    </div>
    <div class="cs_height_120 cs_height_lg_80"></div>
  </section>
@endsection