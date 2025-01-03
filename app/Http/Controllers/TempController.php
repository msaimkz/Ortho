<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempImage;

class TempController extends Controller
{
    public function create(Request $request){

        $image = $request->image;

        if(!empty($image)){
 
         $ext = $image->getClientOriginalExtension();
         $NewImageName = time().'.'.$ext;
 
         $image->move(public_path().'/Uploads/temp',$NewImageName);
 
 
 
 
         $temp = new TempImage();
         $temp->name = $NewImageName;
         $temp->save();
 
         return response()->json([
             'status' => true,
             'imageName' => $NewImageName,
             'id' => $temp->id,
             'msg' => 'Image uploads  Successfully',
         ]);
        }
 
     
 
    }
}
