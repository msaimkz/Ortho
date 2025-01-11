@extends('Doctor.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap-select/css/bootstrap-select.css') }}" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ asset('Assets/Dashboard/assets/css/blog.css') }}">
    <link
    href="{{ asset('Assets/Dashboard/assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
    rel="stylesheet" />
@endsection

@section('content')
    <section class="content blog-page">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>Edit Schedule
                        <small>Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('doctor.schedules') }}">Schedule</a></li>
                        <li class="breadcrumb-item active">Edit Schedule</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form id="ScheduleForm" name="ScheduleForm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <label for="day">Day</label>
                                <select name="day" id="day" class="form-control show-tick">
                                    <option value="">Select a Day</option>
                                    <option value="monday" {{ ($Schedule->day == 'monday') ? 'selected' : '' }}>Monday</option>
                                    <option value="tuesday" {{ ($Schedule->day == 'tuesday') ? 'selected' : '' }}>Tuesday</option>
                                    <option value="wednesday" {{ ($Schedule->day == 'wednesday') ? 'selected' : '' }}>Wednesday</option>
                                    <option value="thursday" {{ ($Schedule->day == 'thursday') ? 'selected' : '' }}>Thursday</option>
                                    <option value="friday" {{ ($Schedule->day == 'friday') ? 'selected' : '' }}>Friday</option>
                                    <option value="saturday" {{ ($Schedule->day == 'saturday') ? 'selected' : '' }}>Saturday</option>
                                    <option value="sunday" {{ ($Schedule->day == 'sunday') ? 'selected' : '' }}>Sunday</option>

                                </select>
                                <span class="text-danger" id="dayspan"></span>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <label for="start_time">Enter Start Time</label>

                                    <input type="time" name="start_time" id="start_time" class="form-control"
                                        placeholder="Enter Start Time" value="{{ $Schedule->start_time }}" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="body">
                                <div class="form-group">
                                    <label for="end_time">Enter End Time </label>
                                    <input type="time" name="end_time" id="end_time" class="form-control"
                                        placeholder="Enter End Time"  value="{{ $Schedule->end_time }}" />
                                    <span class="text-danger"></span>
                                </div>
                            </div>
                        </div>

                    </div>





                    <div class="col-md-12">
                        <div class="card">
                            <div class="body">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="form-control show-tick">
                                    <option value="active" {{ ($Schedule->status == 'active') ? 'selected' : '' }}>Active</option>
                                    <option value="inactive" {{ ($Schedule->status == 'inactive') ? 'selected' : '' }}>Inactive</option>

                                </select>
                                <span class="text-danger"></span>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-12">

                        <div class="card">
                            <div class="body">
                                <button type="submit" class="btn btn-primary btn-round waves-effect m-t-20">Update</button>

                                <a href="{{ route('doctor.schedules') }}"
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
<script src="{{ asset('Assets/Dashboard/assets/plugins/momentjs/moment.js') }}"></script> <!-- Moment Plugin Js -->
<script
    src="{{ asset('Assets/Dashboard/assets/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}">
    
</script>
    <script src="{{ asset('Assets/Dashboard/assets/plugins/dropzone/dropzone.js') }}"></script> <!-- Dropzone Plugin Js -->
    <script src="{{ asset('Assets/Dashboard/assets/plugins/ckeditor/ckeditor.js') }}"></script> <!-- Ckeditor -->

    <script>
       


        $('#ScheduleForm').submit(function(event) {
            event.preventDefault();
            var element = $(this);
            $('button[type=submit]').prop('disabled', true)

            $.ajax({
                url: "{{ route('doctor.schedules.update',$Schedule->id) }}",
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

                        window.location.href = "{{ route('doctor.schedules') }}"

                    } else {

                        if (response['validate'] == false) {
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
                                icon: "error",
                                title: response['error'],
                            });


                        }

                        var errors = response['errors'];


                        $('.is-invalid').removeClass('is-invalid');
                        $('span.text-danger').html('');


                        $.each(errors, function(key, value) {
                            var field = $('#' + key);
                            if (field.length) {
                                field.addClass('is-invalid').siblings('span.text-danger')
                                    .html(value);
                                if ('#' + key == '#day') {
                                    $('#dayspan').html(value)
                                }
                            }
                        });
                    }
                }
            })
        })
    </script>
@endsection
