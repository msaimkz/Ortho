<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;
use Illuminate\Http\Request;
use App\Rules\MatchTitleAndSlug;
use App\Models\Admin\Course;
use App\Models\Admin\CourseChapter;
use App\Jobs\SendEmailsToNewsletterSubscribers;
use App\Models\NewsletterEmail;
use App\Models\TempImage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->get();

       



        return view('Admin.Course.course',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Course.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:courses',new MatchTitleAndSlug($request->title)],
            'description' => ['required','min:10'],
            'price' => ['required','numeric','min:1'],
            'status' => ['required','in:active,inactive'],
            'IsHome' => ['required','in:yes,no'],
            'thumbnail' => ['required','numeric']
        ],[
            'price.min' => 'price must be greater than zero',
        ]);

        if($validator->passes()){

            if($request->status == 'active'){

                return response()->json([
                    'status' => false,
                    'noChapter' => true,
                    'error' => 'Course status cannot be set to active until at least one chapter is added.',
                ]);
            }

            $course = new Course();
            $course->title = $request->title;
            $course->slug = $request->slug;
            $course->price = $request->price;
            $course->status = $request->status;
            $course->IsHome = $request->IsHome;
            $course->description = $request->description;
            $course->thumbnail = 'image';
            $course->save();

              if($request->thumbnail != null){

                $Imageid = $request->thumbnail;
                $temp = TempImage::find($Imageid);

                $extArray = explode(',',$temp->name);
                $ext = last($extArray);
                


                $newImageName = $course->id.'-'.time().'.'.$ext;

                $TempSourcePath = public_path().'/Uploads/temp/'.$temp->name;
                $Dpath = public_path().'/Uploads/Course/'.$newImageName;

                $course->thumbnail = $newImageName;
                $course->save();

                File::copy($TempSourcePath,$Dpath);

                // Small Size Thumbnail

                $Dpath = public_path().'/Uploads/Course/thumbnail/small/'.$newImageName;

                $manager = new ImageManager(new Driver());
                $ImageManager = $manager->read($TempSourcePath);
                $ImageManager->cover(350,350);
                $ImageManager->save($Dpath);

        


                // Large Size Thumbnail

                $Dpath = public_path().'/Uploads/Course/thumbnail/large/'.$newImageName;
                $ImageManager->scaleDown(1400);
                $ImageManager->save($Dpath);
            }

            return response()->json([
                'status' => true,
                'msg' => 'Course Create Successfully',
              ]);

            

        }
        else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $course = Course::where('slug',$slug)->with('chapters')->first();


        if($course == null){

            return redirect()->route('Admin.notFound');
        }

        $chapterCount = CourseChapter::where('course_id',$course->id)->count();  

        return view('Admin.Course.show',compact('course','chapterCount'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $course = Course::where('slug',$slug)->first();

        if($course == null){

            return redirect()->route('Admin.notFound');
        }

        return view('Admin.Course.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $course = Course::find($id);

        if($course == null){
            return response()->json([
                'status' => false,
                'IsNotFound' => true,
                'error' => 'Course Not Found'
            ]);
        }

        $validator = Validator::make($request->all(),[
            'title' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:courses,slug,'.$course->id.',id',new MatchTitleAndSlug($request->title)],
            'description' => ['required','min:10'],
            'price' => ['required','numeric','min:1'],
            'status' => ['required','in:active,inactive'],
            'IsHome' => ['required','in:yes,no'],
            'thumbnail' => ['required','numeric']
        ],[
            'price.min' => 'price must be greater than zero',
        ]);

        if($validator->passes()){

            $chapters = CourseChapter::where('course_id',$course->id)->count();

            if($chapters == 0 && $request->status  == 'active'){

                return response()->json([
                    'status' => false,
                    'noChapter' => true,
                    'error' => 'Course status cannot be set to active until at least one chapter is added.',
                ]);
            }

            $course->title = $request->title;
            $course->slug = $request->slug;
            $course->price = $request->price;
            $course->status = $request->status;
            $course->IsHome = $request->IsHome;
            $course->description = $request->description;
            $course->thumbnail = $course->thumbnail;
            $course->update();

             $oldImgName =  $course->thumbnail;

              if($request->thumbnail != null && $request->thumbnail != $course->id){

                $Imageid = $request->thumbnail;
                $temp = TempImage::find($Imageid);

                if($temp != null){
                    $extArray = explode(',',$temp->name);
                    $ext = last($extArray);
                    
    
    
                    $newImageName = $course->id.'-'.time().'.'.$ext;
    
                    $TempSourcePath = public_path().'/Uploads/temp/'.$temp->name;
                    $Dpath = public_path().'/Uploads/Course/'.$newImageName;
    
                    $course->thumbnail = $newImageName;
                    $course->update();

                    if(File::exists(public_path().'/Uploads/Course/'.$oldImgName)){

                        File::delete(public_path().'/Uploads/Course/'.$oldImgName);
                    }

                    if(File::exists(public_path().'/Uploads/Course/thumbnail/small/'.$oldImgName)){

                        File::delete(public_path().'/Uploads/Course/thumbnail/small/'.$oldImgName);
                    }

                    if(File::exists(public_path().'/Uploads/Course/thumbnail/large/'.$oldImgName)){

                        File::delete(public_path().'/Uploads/Course/thumbnail/large/'.$oldImgName);
                    }
    
                    File::copy($TempSourcePath,$Dpath);
    
                    // Small Size Thumbnail
    
                    $Dpath = public_path().'/Uploads/Course/thumbnail/small/'.$newImageName;
    
                    $manager = new ImageManager(new Driver());
                    $ImageManager = $manager->read($TempSourcePath);
                    $ImageManager->cover(350,350);
                    $ImageManager->save($Dpath);
    
            
    
    
                    // Large Size Thumbnail
    
                    $Dpath = public_path().'/Uploads/Course/thumbnail/large/'.$newImageName;
                    $ImageManager->scaleDown(1400);
                    $ImageManager->save($Dpath);
                }

               
            }

            if($course->status == 'active'){

                $users = NewsletterEmail::with('user')->get()->map(function ($newsletter) {
                    return [
                       'email' => $newsletter->email,
                       'name' => $newsletter->user->name
                    ];
                 });
                    
    
    
                  
                //   SendEmailsToNewsletterSubscribers::dispatch($users, 'Course', $course->title);
            }

            return response()->json([
                'status' => true,
                'msg' => 'Course Updated Successfully',
              ]);

            

        }
        else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $course = Course::find($request->id);

        if($course == null){
            return response()->json([
                'status' => false,
                'IsNotFound' => true,
                'error' => 'Course Not Found'
            ]);
        }
        if(File::exists(public_path().'/Uploads/Course/'.$course->thumbnail)){

            File::delete(public_path().'/Uploads/Course/'.$course->thumbnail);
        }

        if(File::exists(public_path().'/Uploads/Course/thumbnail/small/'.$course->thumbnail)){

            File::delete(public_path().'/Uploads/Course/thumbnail/small/'.$course->thumbnail);
        }

        if(File::exists(public_path().'/Uploads/Course/thumbnail/large/'.$course->thumbnail)){

            File::delete(public_path().'/Uploads/Course/thumbnail/large/'.$course->thumbnail);
        }

        $course->delete();

        return response()->json([
            'status' => true,
            'id' => $request->id,
            'msg' => "Course Deleted Successfully",
        ]);
    }
}
