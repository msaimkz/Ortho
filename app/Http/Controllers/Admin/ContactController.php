<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request){

        if(Auth::check() == false){

            return response()->json([
                'status' => false,
                'IsLogin' => false,
                'error' => "Access Denied: Please log in to your account to continue"
            ]);
        }

        $validator = Validator::make($request->all(),[
           'name' => ['required','min:3','max:15','regex:/^[a-zA-Z\s]+$/'],
           'email' => ['required','email','max:30'],
           'subject' => ['required','min:3','max:55','regex:/^[a-zA-Z\s]+$/'],
           'phone' => ['required','regex:/^0[3-9][0-9]{2}[0-9]{7}$/'],
           'comment' => ['required','min:10'],
        ]);

        if($validator->passes()){

            $contact = New Contact();
            $contact->user_id = Auth::user()->id;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->subject = $request->subject;
            $contact->phone = $request->phone;
            $contact->comment = $request->comment;
            $contact->save();

            return response()->json([
                'status' => true,
                'msg' => 'Thank you! Your message has been successfully sent. We will get back to you shortly'
            ]);

        }
        else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }

    }

    public function index(){

        $Contacts = Contact::latest()->get();

        return view('Admin.Contact.contact',compact('Contacts'));
    }

    public function show(string $id){

        $Contact = Contact::find($id);

        if($Contact == null){

            return redirect()->route('Admin.notFound');
        }

        return view('Admin.Contact.show',compact('Contact'));
    }
}
