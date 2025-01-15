@extends('Admin.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
@endsection

@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Add Contact Information
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('Admin.contactInformation') }}">Contact Information</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form action="" id="ContactInformationForm" name="ContactInformationForm">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        placeholder="Enter Phone Number" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="email" name="email" id="email"  class="form-control"
                                        placeholder="Enter Email Address" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>



                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <label for="address">Address</label>

                                <div class="form-group">
                                    <textarea rows="4" name="address" id="address" class="form-control no-resize"
                                        placeholder="Please Write  Address..."></textarea>
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" name="facebook" id="facebook"  class="form-control"
                                        placeholder="Enter Facebook Url" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" name="youtube" id="youtube"  class="form-control"
                                        placeholder="Enter Youtube Url" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" name="instagram" id="instagram"  class="form-control"
                                        placeholder="Enter Instagram Url" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <input type="text" name="Twitter" id="Twitter"  class="form-control"
                                        placeholder="Enter Twitter Url" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-12">

                        <div class="card">
                            <div class="body">
                                <button type="submit" class="btn btn-primary btn-round waves-effect m-t-20">Save</button>

                                <a href="{{ route('Admin.contactInformation') }}"
                                    class="btn  btn-outline-secondary btn-round waves-effect m-t-20">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection

@section('js')
    <script src="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.js') }}"></script> <!-- Dropzone Plugin Js -->
    <script src="{{ asset('Assets/Dashboard/assets/plugins/ckeditor/ckeditor.js') }}"></script> <!-- Ckeditor -->

    <script>
        $('#ContactInformationForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)

            $.ajax({
                url: "{{ route('Admin.contactInformation.save') }}",
                type: "post",
                data: element.serializeArray(),
                dataType: "json",
                success: function(response) {
                    $('button[type=submit]').prop('disabled', false)

                    if (response['status'] == true) {

                        const Toast = Swal.mixin({
                            toast: true,
                            position: "top-end",
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.onmouseenter = Swal.stopTimer;
                                toast.onmouseleave = Swal.resumeTimer;
                            }
                        });
                        Toast.fire({
                            icon: "success",
                            title: response['msg'],
                        });

                        window.location.href = "{{ route('Admin.contactInformation') }}"

                    } else {
                        var errors = response['errors'];


                        $('.is-invalid').removeClass('is-invalid');
                        $('span.text-danger').html('');


                        $.each(errors, function(key, value) {
                            var field = $('#' + key);
                            if (field.length) {
                                field.addClass('is-invalid').siblings('span.text-danger')
                                    .html(value);
                            } 
                        });
                    }
                }
            })
        })
       
    </script>
@endsection
