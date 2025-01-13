@extends('User.master')

@section('content')
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
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
                            @if (!empty($serviceLists))
                                @foreach ($serviceLists as $serviceList)
                                    <li>
                                        <a href='{{ route('User.serviceDetail', $serviceList->slug) }}'>
                                            <span class="cs_tab_link_icon_left cs_center"><i
                                                    class="fa-solid fa-check"></i></span>
                                            <span>{{ ucwords($serviceList->title) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @endif


                        </ul>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="cs_service_details_thumbnail">
                        @if (isset($service->thumbnail) && file_exists(public_path('Uploads/Service/' . $service->thumbnail)))
                            <img src="{{ asset('Uploads/Service/' . $service->thumbnail) }}" alt="Service Icon">
                        @else
                            <img src="{{ asset('Assets/User/assets/img/offerings03.jpg') }}" alt="Service Icon">
                        @endif
                    </div>
                </div>
            </div>
            <div class="cs_height_35 cs_height_lg_30"></div>
            <div class="cs_service_details">
                <h3 class="cs_service_heading">Service Details:</h3>
                <p class="cs_service_subtitle">{{ ucwords($service->description) }}</p>

                <div class="cs_height_35 cs_height_lg_30"></div>
                <div class="row cs_gap_y_30">
                    <div class="col-lg-6">
                        <div class="cs_service_details_thumbnail">
                            @if (isset($service->thumbnail) && file_exists(public_path('Uploads/Service/' . $service->thumbnail)))
                                <img src="{{ asset('Uploads/Service/' . $service->thumbnail) }}" alt="Service Icon">
                            @else
                                <img src="{{ asset('Assets/User/assets/img/offerings03.jpg') }}"
                                    alt="Service Icon">
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row cs_gap_y_30">
                            @if (!empty($BestServices))
                                @php
                                    $count = 00;
                                @endphp
                                @foreach ($BestServices as $BestService)
                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                        <div class="cs_iconbox cs_style_2 cs_radius_15 cs_hover_layer_2">
                                            <div class="cs_iconbox_overlay cs_bg_filed"
                                                data-src="{{ isset($BestService->thumbnail) && file_exists(public_path('Uploads/Service/' . $BestService->thumbnail))
                                                    ? asset('Uploads/Service/' . $BestService->thumbnail)
                                                    : asset('Assets/User/assets/img/service_bg.jpg') }}">
                                            </div>
                                            <div class="cs_iconbox_shape"></div>
                                            <div
                                                class="cs_iconbox_header d-flex align-items-center justify-content-between">
                                                <div class="cs_iconbox_icon cs_center">
                                                    @if (isset($BestService->icon_img) && file_exists(public_path('Uploads/Service/' . $BestService->icon_img)))
                                                        <img src="{{ asset('Uploads/Service/' . $BestService->icon_img) }}"
                                                            alt="Service Icon">
                                                    @else
                                                        <img src="{{ asset('Assets/User/assets/img/icons/service_icon_1.png') }}"
                                                            alt="Service Icon">
                                                    @endif


                                                </div>
                                                <h3 class="iconbox_index">0{{ ++$count }}</h3>
                                            </div>
                                            <h3 class="cs_iconbox_title"><a
                                                    href='{{ route('User.serviceDetail', $BestService->slug) }}'>{{ ucwords($BestService->title) }}</a>
                                            </h3>
                                            <p class="cs_iconbox_subtitle m-0">
                                                {{ ucwords($BestService->short_description) }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif


                        </div>

                    </div>
                </div>


            </div>
        </div>
        <div class="cs_height_110 cs_height_lg_70"></div>
    </section>
    <!-- End Service Details Section -->
@endsection
