@extends('User.master')

@section('content')
    <!-- End Header Section -->
    <!-- Start Page Heading -->
    <section class="cs_page_heading cs_bg_filed cs_center"
        data-src="{{ asset('Assets/User/assets/img/page_heading_bg.jpg') }}">
        <div class="container">
            <h1 class="cs_page_title">Blog Details</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href='{{ route('User.index') }}'>Home</a></li>
                <li class="breadcrumb-item active">Blog Details</li>
            </ol>
        </div>
    </section>
    <!-- End Page Heading -->
    <!-- Start Blog Details Section -->
    <section>
        <div class="cs_height_120 cs_height_lg_80"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cs_post_details cs_style_1">
                        <div class="cs_post_thumb_thumbnail">
                            @if (isset($blog->thumbnail) && file_exists(public_path('Uploads/Blog/' . $blog->thumbnail)))
                                <img src="{{ asset('Uploads/Blog/' . $blog->thumbnail) }}" alt="blog-thumbnail">
                            @else
                                <img src="{{ asset('Assets/User/assets/img/post_4.jpg') }}" alt="blog-thumbnail">
                            @endif
                        </div>
                        <ul class="cs_post_meta cs_mp0">
                            <li><i class="fa-solid fa-user"></i>{{ ucwords($blog->author) }}</li>
                            <li><i
                                    class="fa-regular fa-calendar-days"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('M-d-Y') }}
                            </li>
                        </ul>
                        <p>{{ ucwords($blog->description) }}</p>
                        <div class="cs_height_27 cs_height_lg_10"></div>

                        <div class="cs_height_47 cs_height_lg_30"></div>

                        <div class="cs_height_70 cs_height_lg_40"></div>
                        <h2 class="cs_reply_title mb-0">Comments (3)</h2>
                        <ul class="cs_comment_list cs_mp0">
                            <li class="cs_comment_body">
                                <div class="cs_comment_thumbnail">
                                    <img src="{{ asset('Assets/User/assets/img/avatar_2.png') }}" alt="Image"
                                        class="cs_radius_5">
                                </div>
                                <div class="cs_comment_info">
                                    <h3>Dr. Barat Mara</h3>
                                    <p>Lorem ipsum is simply free textdolor sit amet, consectetur notted adipisicing elit
                                        sed do iusmod
                                        tempor incididu.</p>
                                    <div class="cs_comment_meta_wrapper">
                                        <div class="cs_comment_date"><span>June 14, 2023</span><span>12:00 AM</span></div>
                                        <a href="#" class="cs_reply_btn cs_accent_color">Reply</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cs_comment_body">
                                <div class="cs_comment_thumbnail">
                                    <img src="{{ asset('Assets/User/assets/img/avatar_3.png') }}" alt="Image"
                                        class="cs_radius_5">
                                </div>
                                <div class="cs_comment_info">
                                    <h3>Dr. Morat Kara</h3>
                                    <p>Lorem ipsum is simply free textdolor sit amet, consectetur notted adipisicing elit
                                        sed do iusmod
                                        tempor incididu.</p>
                                    <div class="cs_comment_meta_wrapper">
                                        <div class="cs_comment_date"><span>June 14, 2023</span><span>12:00 AM</span></div>
                                        <a href="#" class="cs_reply_btn cs_accent_color">Reply</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="cs_height_90 cs_height_lg_60"></div>
                        <h2 class="cs_reply_heading">Make an Appointment</h2>
                        <form class="cs_reply_form row cs_row_gap_30 cs_gap_y_30" id="comment">
                            <div class="col-md-6">
                                <input type="text" name="name" placeholder="Your Name" class="cs_form_field">
                            </div>
                            <div class="col-md-6">
                                <input type="email" name="email" placeholder="Your Email" class="cs_form_field">
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="phone" placeholder="Your Phone" class="cs_form_field">
                            </div>
                            <div class="col-md-6">
                                <select class="cs_form_field" name="survice">
                                    <option value="choose-service">Choose Service</option>
                                    <option value="crutches">Crutches</option>
                                    <option value="x-Ray">X-Ray</option>
                                    <option value="pulmonary">Pulmonary</option>
                                    <option value="cardiology">Cardiology</option>
                                    <option value="dental-care">Dental Care</option>
                                    <option value="neurology">Neurology</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="address" placeholder="Office Address" class="cs_form_field">
                            </div>
                            <div class="col-md-6">
                                <input type="date" name="date" class="cs_form_field">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="cs_btn cs_style_1 cs_color_1">Contact Now</button>
                            </div>
                        </form>
                    </div>
                </div>
                <aside class="col-lg-4">
                    <div class="cs_height_0 cs_height_lg_50"></div>
                    <div class="cs_sidebar cs_style_1">


                        <div class="cs_sidebar_widget cs_radius_15">
                            <h3 class="cs_sidebar_title">Recent Post</h3>
                            @if (!empty($RecentBlogs))
                                @foreach ($RecentBlogs as $RecentBlog)
                                    <div class="cs_post cs_style_2">
                                        <a href="{{ route('User.blogDetail',$RecentBlog->slug) }}"
                                            class="cs_post_thumb_thumbnail cs_type_2 cs_zoom">
                                            @if (isset($RecentBlog->thumbnail) && file_exists(public_path('Uploads/Blog/' . $RecentBlog->thumbnail)))
                                                <img src="{{ asset('Uploads/Blog/' . $RecentBlog->thumbnail) }}"
                                                    alt="blog-thumbnail" class="cs_zoom_in">
                                            @else
                                                <img src="{{ asset('Assets/User/assets/img/post_4.jpg') }}"
                                                    alt="blog-thumbnail" class="cs_zoom_in">
                                            @endif
                                            
                                        </a>
                                        <div class="cs_post_info">
                                            <div class="cs_post_meta"><i class="fa-regular fa-calendar-days"></i>
                                                {{ \Carbon\Carbon::parse($RecentBlog->created_at)->format('M-d-Y') }}</div>
                                            <h3 class="cs_post_title mb-0"><a
                                                    href='{{ route('User.blogDetail',$RecentBlog->slug) }}'>{{ ucwords($RecentBlog->title) }}.</a>
                                            </h3>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        
                        </div>


                    </div>
                </aside>
            </div>
        </div>
        <div class="cs_height_120 cs_height_lg_80"></div>
    </section>
    <!-- End Blog Details Section -->
@endsection
