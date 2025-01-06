<?php

namespace App\Http\Controllers\Admin\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;
use Illuminate\Http\Request;
use App\Rules\MatchTitleAndSlug;
use App\Models\Blog;
use App\Models\User;
use App\Models\TempImage;

class BlogController extends Controller
{
    public function blog(){

        $blogs = Blog::latest()->get();
        return view('Admin.Blog.blog',compact('blogs'));
    }

    public function detail(string $slug){

        $blog = Blog::where('slug',$slug)->first();
        if($blog == null){

            return  redirect()->route('Admin.notFound');
        }

        return view('Admin.Blog.blog-detail' ,compact('blog'));
    }

    public function create(){

        return view('Admin.Blog.create');
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'title' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:blogs',new MatchTitleAndSlug($request->title)],
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
            $blog->author = $user->role;
            $blog->short_description = $request->short_description;
            $blog->description = $request->description;
            $blog->thumbnail = 'image';
            $blog->save();

              if($request->thumbnail != null){

                $Imageid = $request->thumbnail;
                $temp = TempImage::find($Imageid);

                $extArray = explode(',',$temp->name);
                $ext = last($extArray);
                


                $newImageName = $blog->id.'-'.time().'.'.$ext;

                $TempSourcePath = public_path().'/Uploads/temp/'.$temp->name;
                $Dpath = public_path().'/Uploads/Blog/'.$newImageName;

                $blog->thumbnail = $newImageName;
                $blog->save();

                File::copy($TempSourcePath,$Dpath);

                // Small Size Thumbnail

                $Dpath = public_path().'/Uploads/Blog/thumbnail/small/'.$newImageName;

                $manager = new ImageManager(new Driver());
                $ImageManager = $manager->read($TempSourcePath);
                $ImageManager->cover(120,120);
                $ImageManager->save($Dpath);

                // Medium Size Thumbnail

                $Dpath = public_path().'/Uploads/Blog/thumbnail/medium/'.$newImageName;
                $ImageManager->cover(350,350);
                $ImageManager->save($Dpath);


                // Large Size Thumbnail

                $Dpath = public_path().'/Uploads/Blog/thumbnail/large/'.$newImageName;
                $ImageManager->scaleDown(1400);
                $ImageManager->save($Dpath);


                

              }

              return response()->json([
                'status' => true,
                'msg' => 'Blog Create Successfully',
              ]);

        }
        else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

        

       
    }

    public function edit(string $slug){

        $blog = Blog::where('slug',$slug)->first();
        if($blog == null){

            return  redirect()->route('Admin.notFound');
        }

        return view('Admin.Blog.edit',compact('blog'));
    }

    public function update(string $id, Request $request){

       $blog = Blog::find($id);

       if($blog == null){

        return response()->json([
            'status' => false,
            'IsNotFound' => true,
            'error' => 'Blog Not Found'
        ]);
       }
       $validator = Validator::make($request->all(),[
        'title' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
        'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:blogs,slug,'.$blog->id.',id',new MatchTitleAndSlug],
        'short_description' => ['required','min:10','max:250'],
        'description' => ['required','min:10'],
        'status' => ['required','in:active,inactive'],
        'IsHome' => ['required','in:yes,no'],
        'thumbnail' => ['required','numeric']
    ]);

    if($validator->passes()){

        $id = Auth::user()->id;

        $user = User::find($id);

        $blog->user_id = $user->id;
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->status = $request->status;
        $blog->IsHome = $request->IsHome;
        $blog->author = $user->role;
        $blog->short_description = $request->short_description;
        $blog->description = $request->description;
        $blog->thumbnail = $blog->thumbnail;
        $blog->update();

        $oldImgName =  $blog->thumbnail;

          if($request->thumbnail != null){

            $Imageid = $request->thumbnail;
            $temp = TempImage::find($Imageid);

            if($temp != null){
                $extArray = explode(',',$temp->name);
                $ext = last($extArray);
                
    
    
                $newImageName = $blog->id.'-'.time().'.'.$ext;
    
                $TempSourcePath = public_path().'/Uploads/temp/'.$temp->name;
                $Dpath = public_path().'/Uploads/Blog/'.$newImageName;
    
                $blog->thumbnail = $newImageName;
                $blog->save();

                if(File::exists(public_path().'/Uploads/Blog/'.$oldImgName)){

                    File::delete(public_path().'/Uploads/Blog/'.$oldImgName);
                }

                if(File::exists(public_path().'/Uploads/Blog/thumbnail/small/'.$oldImgName)){

                    File::delete(public_path().'/Uploads/Blog/thumbnail/small/'.$oldImgName);
                }

                if(File::exists(public_path().'/Uploads/Blog/thumbnail/medium/'.$oldImgName)){

                    File::delete(public_path().'/Uploads/Blog/thumbnail/medium/'.$oldImgName);
                }

                if(File::exists(public_path().'/Uploads/Blog/thumbnail/large/'.$oldImgName)){

                    File::delete(public_path().'/Uploads/Blog/thumbnail/large/'.$oldImgName);
                }
    
                File::copy($TempSourcePath,$Dpath);
    
                // Small Size Thumbnail
    
                $Dpath = public_path().'/Uploads/Blog/thumbnail/small/'.$newImageName;
    
                $manager = new ImageManager(new Driver());
                $ImageManager = $manager->read($TempSourcePath);
                $ImageManager->cover(120,120);
                $ImageManager->save($Dpath);
    
                // Medium Size Thumbnail
    
                $Dpath = public_path().'/Uploads/Blog/thumbnail/medium/'.$newImageName;
                $ImageManager->cover(350,350);
                $ImageManager->save($Dpath);
    
    
                // Large Size Thumbnail
    
                $Dpath = public_path().'/Uploads/Blog/thumbnail/large/'.$newImageName;
                $ImageManager->scaleDown(1400);
                $ImageManager->save($Dpath);
            }

          


            

          }

          return response()->json([
            'status' => true,
            'msg' => 'Blog Updated Successfully',
          ]);
        }
        else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public  function delete(Request $request){

        $blog = Blog::find($request->id);
        
        if($blog == null){
            return response()->json([
                'status' => false,
                'IsFound' => true,
                'error' => 'Blog Not Found'
            ]);
        }

        if(File::exists(public_path().'/Uploads/Blog/'.$blog->thumbnail)){

            File::delete(public_path().'/Uploads/Blog/'.$blog->thumbnail);
        }

        if(File::exists(public_path().'/Uploads/Blog/thumbnail/small/'.$blog->thumbnail)){

            File::delete(public_path().'/Uploads/Blog/thumbnail/small/'.$blog->thumbnail);
        }

        if(File::exists(public_path().'/Uploads/Blog/thumbnail/medium/'.$blog->thumbnail)){

            File::delete(public_path().'/Uploads/Blog/thumbnail/medium/'.$blog->thumbnail);
        }

        if(File::exists(public_path().'/Uploads/Blog/thumbnail/large/'.$blog->thumbnail)){

            File::delete(public_path().'/Uploads/Blog/thumbnail/large/'.$blog->thumbnail);
        }

        $blog->delete();

        return response()->json([
            'status' => true,
            'id' => $request->id,
            'msg' => 'Blog Deleted Succesfully',
        ]);
    }
}
