<?php

namespace App\Http\Controllers\Admin\Course;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Rules\MatchTitleAndSlug;
use App\Models\Admin\Course;
use App\Models\Admin\CourseChapter;

class ChapterController extends Controller
{
    

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $slug)
    {

        $course = Course::where('slug',$slug)->first();

        if($course == null){

            return redirect()->route('Admin.notFound');
        }

        
        return view('Admin.Course.chapter.create',compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
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
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/', 
            Rule::unique('course_chapters')->where(function ($query) use ($course) {
                return $query->where('course_id', $course->id);
            }),new MatchTitleAndSlug($request->title)],
            'content' => ['required','min:10'],
        ]);

        if($validator->passes()){


            $chapterCounts = CourseChapter::where('course_id',$course->id)->count();

            if($chapterCounts == 5){

                return response()->json([
                    'status' => false,
                    'ChapterComplete' => true,
                    'error' => 'You cannot add more chapters. The maximum limit of five chapters for this course has already been reached.',
                ]);
            }

            $chapter = new CourseChapter();
            $chapter->course_id = $course->id;
            $chapter->title = $request->title;
            $chapter->slug = $request->slug;
            $chapter->content = $request->content;
            $chapter->sequence = $chapterCounts + 1;
            $chapter->save();

    

            return response()->json([
                'status' => true,
                'msg' => 'Course Chapter Added Successfully',
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $chapter = CourseChapter::where('slug',$slug)->first();

        if($chapter == null){
            return redirect()->route('Admin.notFound');
        }

        $course = Course::find($chapter->course_id);

        if($course == null){
            return redirect()->route('Admin.notFound');
        }

        return view('Admin.Course.chapter.edit',compact('course','chapter'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $chapter = CourseChapter::find($id);

        if($chapter == null){

            return response()->json([
                'status' => false,
                 'error' => 'Chapter Not Found',
            ]);
        }


        $course = Course::find($chapter->course_id);

        if($course == null){

            return response()->json([
                'status' => false,
                 'error' => 'Course Not Found',
            ]);
        }

        $validator = Validator::make($request->all(),[
            'title' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/',
            Rule::unique('course_chapters')->where(function ($query) use ($course) {
                return $query->where('course_id', $course->id);
            }),
            new MatchTitleAndSlug($request->title)],
            'content' => ['required','min:10'],
        ]);

        if($validator->passes()){


            $chapter->course_id = $course->id;
            $chapter->title = $request->title;
            $chapter->slug = $request->slug;
            $chapter->content = $request->content;
            $chapter->sequence = $chapter->sequence;
            $chapter->update();

    

            return response()->json([
                'status' => true,
                'msg' => 'Course Chapter Updated Successfully',
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

        $chapter = CourseChapter::find($request->id);

        
        if($chapter == null){

            return response()->json([
                'status' => false,
                 'error' => 'Chapter Not Found',
            ]);
        }


        $course = Course::find($chapter->course_id);

        if($course == null){

            return response()->json([
                'status' => false,
                 'error' => 'Course Not Found',
            ]);
        }

        $deletedSequence = $chapter->sequence;

        $chapter->delete();

        CourseChapter::where('course_id', $course->id)
        ->where('sequence', '>', $deletedSequence)
        ->decrement('sequence');


        return response()->json([
            'status' => true,
            'id' => $request->id,
            'deletedChapterNumber' => $deletedSequence,
            'msg' => "Chapter Deleted Successfully",
        ]);




        
    }
}
