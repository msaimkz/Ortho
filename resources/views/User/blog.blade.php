@extends('User.master')

@section('content')
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">Blog Page</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">Blog Page</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Blog Section -->
    <section>
        <div class="cs_height_110 cs_height_lg_70"></div>
        <div class="container">
            <div class="cs_section_heading cs_style_1 text-center">
                <p class="cs_section_subtitle cs_accent_color">
                    <span class="cs_shape_left"></span>OUR LARGEST BLOG<span class="cs_shape_right"></span>
                </p>
                <h2 class="cs_section_title">Latest Posts & Articles</h2>
            </div>
            <div class="cs_height_50 cs_height_lg_50"></div>
            <div class="cs_posts_grid cs_style_1">
                @if (!empty($blogs))
                    @foreach ($blogs as $blog)
                        <article class="cs_post cs_style_1">
                            <a class='cs_post_thumbnail position-relative' href="{{ route('User.blogDetail',$blog->slug) }}">
                                @if (isset($blog->thumbnail) && file_exists(public_path('Uploads/Blog/' . $blog->thumbnail)))
                                    <img src="{{ asset('Uploads/Blog/' . $blog->thumbnail) }}" alt="blog-thumbnail">
                                @else
                                    <img src="{{ asset('Assets/User/assets/img/post_4.jpg') }}" alt="blog-thumbnail">
                                @endif
                                <div class="cs_post_category position-absolute">Medical</div>
                            </a>
                            <div class="cs_post_content position-relative">
                                <div class="cs_post_meta_wrapper">
                                    <div class="cs_posted_by cs_center position-absolute">
                                        {{ \Carbon\Carbon::parse($blog->created_at)->format('D d') }}</div>
                                    <div class="cs_post_meta_item">
                                        <img src="{{ asset('Assets/User/assets/img/icons/post_user_icon.png') }}"
                                            alt="Icon">
                                        <span>By: Admin</span>
                                    </div>
                                    <div class="cs_post_meta_item">
                                        <img src="{{ asset('Assets/User/assets/img/icons/post_comment_icon.png') }}"
                                            alt="Icon">
                                        <span>Comment</span>
                                    </div>
                                </div>
                                <h3 class="cs_post_title"><a href="{{ route('User.blogDetail',$blog->slug) }}">{{ ucwords($blog->title) }}</a>
                                </h3>
                                <p class="cs_post_subtitle">{{ ucwords($blog->short_description) }}.
                                </p>
                                <a class='cs_post_btn' href="{{ route('User.blogDetail',$blog->slug) }}">
                                    <span>Read More</span>
                                    <span><i class="fa-solid fa-angle-right"></i></span>
                                </a>
                                <div class="cs_post_shape position-absolute"></div>
                            </div>
                        </article>
                    @endforeach
                @endif

            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Blog Section -->
@endsection
