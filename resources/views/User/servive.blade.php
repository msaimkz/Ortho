@extends('User.master')

@section('content')
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">Our Service</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">Service</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->


    <!-- Start Service Section -->
    <section class="cs_gray_bg">
        <div class="cs_height_110 cs_height_lg_70"></div>
        <div class="container">
            <div class="cs_section_heading cs_style_1 cs_type_1">
                <div class="cs_section_heading_left">
                    <p class="cs_section_subtitle cs_accent_color wow fadeInLeft" data-wow-duration="0.9s"
                        data-wow-delay="0.25s">
                        <span class="cs_shape_left"></span>
                        OUR BEST SERVICE
                    </p>
                    <h2 class="cs_section_title">High-Quality Services This Doctor</h2>
                </div>
                <div class="cs_section_heading_right">We are privileged to work with hundreds of future-thinking medial,
                    including many of the world’s top hardware, software, and brands , feel safe and comfortable in
                    establishing.</div>
            </div>
            <div class="cs_height_50 cs_height_lg_50"></div>
            <div class="row cs_row_gap_30 cs_gap_y_30">
                @if (!empty($services))
                    @php
                        $count = 00;
                    @endphp
                    @foreach ($services as $service)
                        <div class="col-xl-3 col-lg-4 col-sm-6">
                            <div class="cs_iconbox cs_style_2 cs_radius_15 cs_hover_layer_2">
                                <div class="cs_iconbox_overlay cs_bg_filed"
                                    data-src="{{ isset($service->thumbnail) && file_exists(public_path('Uploads/Service/' . $service->thumbnail))
                                        ? asset('Uploads/Service/' . $service->thumbnail)
                                        : asset('Assets/User/assets/img/service_bg.jpg') }}">
                                </div>
                                <div class="cs_iconbox_shape"></div>
                                <div class="cs_iconbox_header d-flex align-items-center justify-content-between">
                                    <div class="cs_iconbox_icon cs_center">
                                        @if (isset($service->icon_img) && file_exists(public_path('Uploads/Service/' . $service->icon_img)))
                                            <img src="{{ asset('Uploads/Service/' . $service->icon_img) }}"
                                                alt="Service Icon">
                                        @else
                                            <img src="{{ asset('Assets/User/assets/img/icons/service_icon_1.png') }}"
                                                alt="Service Icon">
                                        @endif


                                    </div>
                                    <h3 class="iconbox_index">0{{ ++$count }}</h3>
                                </div>
                                <h3 class="cs_iconbox_title"><a
                                        href='{{ route('User.serviceDetail', $service->slug) }}'>{{ ucwords($service->title) }}</a>
                                </h3>
                                <p class="cs_iconbox_subtitle m-0">{{ ucwords($service->short_description) }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Service Section -->
@endsection
