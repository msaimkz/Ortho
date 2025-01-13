@extends('User.master')

@section('content')
    <!-- End Header Section -->
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">FAQs</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">FAQs</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Blog Details Section -->
    <section>
        <div class="cs_height_120 cs_height_lg_80"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cs_post_details cs_style_1">
                        @if (!empty($faqs))
                            @foreach ($faqs as $faq)
                            <hr>
                            <div class="cs_height_27 cs_height_lg_10"></div>

                                <p style="font-size: 20px;"><strong>{{ ucwords($faq->question) }}?</strong></p>

                                <p>{{ ucwords($faq->answer) }}</p>
                                <div class="cs_height_27 cs_height_lg_10"></div>

                                <hr>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Blog Details Section -->
@endsection
