<?php

namespace App\Http\Controllers\Admin\NewsLetter;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\NewsletterEmail;
use App\Models\User;

class NewsLetterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        

        $newsletters = NewsletterEmail::latest()->with('user')->get();

        return view('Admin.Newsletter.newsletter',compact('newsletters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'email' => ['required','unique:newsletter_emails',],
        ]);

        if($validator->passes()){

            if(Auth::check() == false){

                return response()->json([
                    'status' => false,
                    'isLogin' => false,
                    'error' => "Access Denied: Please log in to your account to continue"
                ]);
            }

           

            $newsletter = NewsletterEmail::updateOrCreate(
                ['user_id' => Auth::user()->id],
                [
               
                 'email' => $request->email, 
                ]    
             );

            return response()->json([
                'status' => true,
                'msg' => "Thank you for subscribing! You've successfully joined our newsletter. Stay tuned for updates and exclusive courses!"
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
