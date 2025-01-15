<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactInformationController extends Controller
{
    public function index()
    {

        $Contact = ContactInformation::first();

        return view('Admin.Contact Information.index', compact('Contact'));
    }

    public function create()
    {

        return view('Admin.Contact Information.create');
    }

    public function save(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'max:30'],
            'phone' => ['required', 'regex:/^0[3-9][0-9]{2}[0-9]{7}$/'],
            'address' => ['required', 'min:10', 'max:250'],
            'facebook' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?facebook\.com\/[A-Za-z0-9_]+\/?$/'],
            'youtube' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?youtube\.com\/[A-Za-z0-9_]+\/?$/'],
            'instagram' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9_]+\/?$/'],
            'twitter' => ['nullable', 'regex:/^(https?:\/\/)?(www\.)?twitter\.com\/[A-Za-z0-9_]+\/?$/'],
        ]);

        if ($validator->passes()) {

            $ContactInformation = ContactInformation::first();

            if (!$ContactInformation) {


                $ContactInformation = ContactInformation::create([
                    'phone' =>  $request->phone,
                    'email' =>  $request->email,
                    'address' =>  $request->address,
                    'facebook' =>  $request->facebook,
                    'youtube' =>  $request->youtube,
                    'instagram' =>  $request->instagram,
                    'twitter' =>  $request->twitter,
                ]);
            } else {

                $ContactInformation->phone = $request->phone;
                $ContactInformation->email = $request->email;
                $ContactInformation->address = $request->address;
                $ContactInformation->facebook = $request->facebook;
                $ContactInformation->youtube = $request->youtube;
                $ContactInformation->instagram = $request->instargam;
                $ContactInformation->twitter = $request->twitter;
                $ContactInformation->update();
            }

            return response()->json([
                'status' => true,
                'msg' => 'Contact information updated successfully.',
            ]);
        } else {

            return response()->json([
                'status' => false,
                'errors' => $validator->errors(),
            ]);
        }
    }
}
