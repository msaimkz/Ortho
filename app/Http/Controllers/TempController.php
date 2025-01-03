<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TempImage;
use App\Models\TempFile;

class TempController extends Controller
{
    public function image(Request $request){

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

    public function file(Request $request){

        $file = $request->file;
        $filename = $file->getClientOriginalname();
        if(!empty($file)){
 
         $ext = $file->getClientOriginalExtension();
         $NewfileName = time().'.'.$ext;
 
         $file->move(public_path().'/Uploads/TempFile',$NewfileName);
 
 
 
 
         $temp = new TempFile();
         $temp->name = $NewfileName;
         $temp->save();
 
         return response()->json([
             'status' => true,
             'FileName' => $filename,
             'id' => $temp->id,
             'msg' => 'File uploads  Successfully',
         ]);
        }
 
     
 
    }

    
}
