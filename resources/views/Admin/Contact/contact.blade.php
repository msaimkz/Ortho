@extends('Admin.master')
@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Contact Messages
                        <small class="text-muted">Welcome to Ortho</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12">
                    <button class="btn btn-primary btn-icon btn-round d-none d-md-inline-block float-right m-l-10"
                        type="button">
                        <i class="zmdi zmdi-plus"></i>
                    </button>
                    <ul class="breadcrumb float-md-right">
                        <li class="breadcrumb-item"><a href="{{ route('Admin.dashboard') }}"><i class="zmdi zmdi-home"></i>
                                Ortho</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Contact Messages</a></li>
                        <li class="breadcrumb-item active">All Contact Messages</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>Contact Messages</strong> List</h2>
                            <ul class="header-dropdown">

                            </ul>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->


                            <!-- Tab panes -->
                            <div class="tab-content m-t-10">
                                <div class="tab-pane table-responsive active" id="All">
                                    <table class="table m-b-0 table-hover">
                                        <thead>
                                            <tr>

                                                <th>User ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Subject</th>
                                                <th>Reply</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($Contacts != null)
                                                @foreach ($Contacts as $Contact)
                                                    <tr id="contact-{{ $Contact->id }}">

                                                        <td><span class="list-name">{{$Contact->user_id }}</span></td>
                                                        <td><span>{{ ucwords($Contact->name) }}</span></td>
                                                        <td>{{ $Contact->email }}</td>
                                                        <td>{{ $Contact->phone }}</td>
                                                        <td>{{ ucwords($Contact->subject) }}</td>
                                                        <td>
                                                            @if ($Contact->reply == null)
                                                                <span class="badge badge-danger">No</span>
                                                                                                                                   
                                                            @else
                                                            <span class="badge badge-success">Yes</span>
                                                                
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('Admin.contact.show', $Contact->id) }}"
                                                                class="btn btn-primary">Read</a>
                                                           
                                                            <button type="button" class="btn btn-danger delete"
                                                                data-id="{{ $Contact->id }}">Delete</button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                            @endif

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $('.delete').click(function() {
            if (confirm("Are you sure you want to Delete this Contact Message ?"))
                $('.delete').prop('disabled', true);

             $.ajax({
                url: "{{ route('Admin.contact.delete') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('.delete').prop('disabled', false);



                    if (response['status'] == true) {

                        
                        $(`#contact-${response['id']}`).remove();
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
                    } else {

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

                }
            })

        })
    </script>
@endsection
