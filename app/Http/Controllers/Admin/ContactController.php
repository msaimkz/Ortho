<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;
use App\Mail\Admin\ContactReplyMail;
use Illuminate\Support\Facades\Mail;

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

    public function sendReply(Request $request){

        $validator = Validator::make($request->all(),[
            'reply' => ['required','min:10'],
        ]);

        if($validator->passes()){

            $id = $request->id;

            $contact = Contact::find($id);

            if($contact == null){

                return response()->json([
                    'status' => false,
                    'IsFound' => false,
                    'errors' => "Contact Not Found",
                ]);
            }

            Mail::to($contact->email)->send(new ContactReplyMail(
                [
                    'name' => $contact->name,
                    'subject' => $contact->subject,
                    'message' => $request->reply,
                ]
            ));

            $contact->reply = $request->reply;
            $contact->save();

            return response()->json([
                'status' => true,
                'replyMsg' => $request->reply,
                'msg' => 'Contact Reply Message Send Successfully'
            ]);

        }
        else{

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);

        }
    }

    public function delete(Request $request){
        $contact = Contact::find($request->id);

        if($contact == null){

            return response()->json([
                'status' => false,
                'IsNotFound' => true,
                'error' => "Contact Message Not Found"
            ]);
        }

        $contact->delete();

        return response()->json([
            'status' => true,
            'id' => $request->id,
            'msg' => "Contact Message Deleted Successfully",
        ]);
    }
}
