<?php

namespace App\Http\Controllers\Admin\FAQs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchTitleAndSlug;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Faq;


class FAQController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $FAQs = Faq::latest()->get();
        return view('Admin.FAQs.faq',compact('FAQs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.FAQs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'question' => ['required','min:3','max:200','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:200','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:faqs',new MatchTitleAndSlug($request->question)],
            'answer' => ['required','min:10',],
            'status' => ['required','in:visible,hidden'],
        ]);

        if($validator->passes()){

            $FAQ = new Faq();
            $FAQ->question = $request->question;
            $FAQ->slug = $request->slug;
            $FAQ->answer = $request->answer;
            $FAQ->status = $request->status;
            $FAQ->save();

            return response()->json([
                'status' => true,
                'msg' => "FAQs Create Successfully",
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
        $FAQ = faq::where('slug',$slug)->first();
        if($FAQ == null){

            return redirect()->route('Admin.notFound');
        }

        return view('Admin.FAQs.show',compact('FAQ'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
          $FAQ = faq::where('slug',$slug)->first();
        if($FAQ == null){

            return redirect()->route('Admin.notFound');
        }

        return view('Admin.FAQs.edit',compact('FAQ'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $FAQ = FAQ::find($id);

        if($FAQ == null){

            return response()->json([
                'status' => false,
                'IsNotFound' => true,
                'error' => "FAQ Not Found"
            ]);
        }

        $validator = Validator::make($request->all(),[
            'question' => ['required','min:3','max:200','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:200','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:faqs,slug,'.$FAQ->id.',id',new MatchTitleAndSlug($request->question)],
            'answer' => ['required','min:10',],
            'status' => ['required','in:visible,hidden'],
        ]);

        if($validator->passes()){

         
            $FAQ->question = $request->question;
            $FAQ->slug = $request->slug;
            $FAQ->answer = $request->answer;
            $FAQ->status = $request->status;
            $FAQ->update();

            return response()->json([
                'status' => true,
                'msg' => "FAQs Updated Successfully",
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
        $FAQ = FAQ::find($request->id);

        if($FAQ == null){

            return response()->json([
                'status' => false,
                'IsNotFound' => true,
                'error' => "FAQ Not Found"
            ]);
        }

        $FAQ->delete();

        return response()->json([
            'status' => true,
            'id' => $request->id,
            'msg' => "FAQs Deleted Successfully",
        ]);

    }
}
