<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        return view('Admin.Blog.blog');
    }

    public function detail(){

        return view('Admin.Blog.blog-detail');
    }

    public function create(){

        return view('Admin.Blog.create');
    }

    public function edit(){

        return view('Admin.Blog.edit');
    }
}
