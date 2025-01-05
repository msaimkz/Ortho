<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\MatchTitleAndSlug;
use App\Models\Blog;
use App\Models\TempImage;

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

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:blogs',new MatchTitleAndSlug],
            'short_description' => ['required','min:10','max:250'],
            'description' => ['required','min:10'],
            'status' => ['required','in:active,inactive'],
            'IsHome' => ['required','in:yes,no'],
            'thumbnail' => ['required','numeric']
        ]);

        if($validator->passes()){

            $id = Auth::user()->id;

            $user = User::find($id);

            $blog = new Blog();
            $blog->user_id = $user->id;
            $blog->title = $request->title;
            $blog->slug = $request->slug;
            $blog->status = $request->status;
            $blog->IsHome = $request->IsHome;
            $blog->short_description = $request->short_description;
            $blog->description = $request->description;
            $blog->thumbnail = 'image';
            $blog->save();

              if($request->thumbnail != null){

                $Imageid = $request->thumbnail;
                $temp = TempImage::find($Imageid);

              }

        }
        else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        

       
    }

    public function edit(){

        return view('Admin.Blog.edit');
    }
}
