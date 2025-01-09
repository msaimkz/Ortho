@extends('Admin.master')

@section('content')
    <section class="content">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-5 col-sm-12">
                    <h2>All Subscriptions
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
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Subscriptions</a></li>
                        <li class="breadcrumb-item active">All Subscriptions</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card patients-list">
                        <div class="header">
                            <h2><strong>Subscriptions</strong> List</h2>
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
                                                <th>Subscription ID</th>
                                                <th>Subscription Name</th>
                                                <th>Subscription Plan</th>
                                                <th>Monthly Price</th>
                                                <th>Annual Price</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($subscriptions != null)
                                                @foreach ($subscriptions as $subscription)
                                                    <tr id="subscription-{{ $subscription->id }}">

                                                        <td><span class="list-name">{{ $subscription->id }}</span></td>
                                                        <td>{{ ucwords($subscription->name) }}</td>
                                                        <td>{{ ucwords($subscription->plan) }} Plan</td>
                                                        @if ($subscription->plan == 'free')
                                                            <td>${{ number_format(0,2) }}</td>
                                                            <td>${{ number_format(0,2) }}</td>
                                                        @else
                                                            <td>${{ number_format($subscription->monthly_price, 2) }}</td>
                                                            <td>${{ number_format($subscription->annual_price, 2) }}</td>
                                                        @endif

                                                        <td>
                                                            <a href="{{ route('Admin.subscripion.edit',$subscription->slug) }}" class="btn btn-info">Edit</a>
                                                            <button type="submit" data-id="{{ $subscription->id  }}" class="btn btn-danger delete">Delete</button>
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
            if (confirm("Are you sure you want to Delete this Subscription Plan ?"))
                $('.delete').prop('disabled', true);

            $.ajax({
                url: "{{ route('Admin.subscripion.delete') }}",
                type: "delete",
                data: {

                    id: $(this).data('id'),

                },
                dataType: "json",
                success: function(response) {
                    $('.delete').prop('disabled', false);

                    

                    if (response['status'] == true) {

                        $(`#subscription-${response['id']}`).remove();
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
                    }
                    else{

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