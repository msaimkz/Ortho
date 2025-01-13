<?php

namespace App\Http\Controllers\Admin\Service;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\GD\Driver;
use Illuminate\Http\Request;
use App\Rules\MatchTitleAndSlug;
use App\Models\Admin\Service;
use App\Models\User;
use App\Models\TempImage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('Admin.Service.service',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'title' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:services',new MatchTitleAndSlug($request->title)],
            'short_description' => ['required','min:10','max:250'],
            'description' => ['required','min:10'],
            'status' => ['required','in:active,inactive'],
            'IsHome' => ['required','in:yes,no'],
            'thumbnail' => ['required','numeric'],
            'icon_img' => ['required','numeric']
        ]);

        if($validator->passes()){

            

            $service = new Service();
            $service->title = $request->title;
            $service->slug = $request->slug;
            $service->status = $request->status;
            $service->IsHome = $request->IsHome;
            $service->short_description = $request->short_description;
            $service->description = $request->description;
            $service->thumbnail = 'image';
            $service->icon_img = 'image';
            $service->save();

              if($request->thumbnail != null){

                $Imageid = $request->thumbnail;
                $temp = TempImage::find($Imageid);

                $extArray = explode(',',$temp->name);
                $ext = last($extArray);
                


                $newImageName = $service->id.'-'.time().'.'.$ext;

                $TempSourcePath = public_path().'/Uploads/temp/'.$temp->name;
                $Dpath = public_path().'/Uploads/Service/'.$newImageName;

                $service->thumbnail = $newImageName;
                $service->save();

                File::copy($TempSourcePath,$Dpath);

                $manager = new ImageManager(new Driver());
                $ImageManager = $manager->read($TempSourcePath);
                
                // Medium Size Thumbnail

                $Dpath = public_path().'/Uploads/Service/thumbnail/Small/'.$newImageName;
                $ImageManager->cover(350,350);
                $ImageManager->save($Dpath);


                // Large Size Thumbnail

                $Dpath = public_path().'/Uploads/Service/thumbnail/large/'.$newImageName;
                $ImageManager->scaleDown(1400);
                $ImageManager->save($Dpath);


                

              }

              if($request->icon_img != null){

                $Imageid = $request->icon_img;
                $temp = TempImage::find($Imageid);

                $extArray = explode(',',$temp->name);
                $ext = last($extArray);
                


                $newImageName = $service->id.'-'.time().'.'.$ext;

                $TempSourcePath = public_path().'/Uploads/temp/'.$temp->name;
                $Dpath = public_path().'/Uploads/Service/'.$newImageName;

                $service->icon_img = $newImageName;
                $service->save();

                File::copy($TempSourcePath,$Dpath);

                $manager = new ImageManager(new Driver());
                $ImageManager = $manager->read($TempSourcePath);
                
                // Medium Size Thumbnail

                $Dpath = public_path().'/Uploads/Service/Icon/'.$newImageName;
                $ImageManager->cover(150,150);
                $ImageManager->save($Dpath);
                

              }

              return response()->json([
                'status' => true,
                'msg' => 'Service Created Successfully',
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
        $service = Service::where('slug',$slug)->first();

        if($service == null){

            return redirect()->route('Admin.notFound');
        }

        return view('Admin.Service.detail',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $service = Service::where('slug',$slug)->first();

        if($service == null){

            return redirect()->route('Admin.notFound');
        }

        return view('Admin.Service.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);

        if($service == null){
 
         return response()->json([
             'status' => false,
             'IsNotFound' => true,
             'error' => 'Service Not Found'
         ]);
        }

        $validator = Validator::make($request->all(),[
            'title' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:services,slug,'.$service->id.',id',new MatchTitleAndSlug($request->title)],
            'short_description' => ['required','min:10','max:250'],
            'description' => ['required','min:10'],
            'status' => ['required','in:active,inactive'],
            'IsHome' => ['required','in:yes,no'],
            'thumbnail' => ['required','numeric'],
            'icon_img' => ['required','numeric']
        ]);

        if($validator->passes()){

            

          
            $service->title = $request->title;
            $service->slug = $request->slug;
            $service->status = $request->status;
            $service->IsHome = $request->IsHome;
            $service->short_description = $request->short_description;
            $service->description = $request->description;
            $service->thumbnail = $service->thumbnail;
            $service->icon_img = $service->icon_img;
            $service->update();

            $oldImgName =  $service->thumbnail;
            $oldIconName =  $service->icon_img;


              if($request->thumbnail != null && $request->thumbnail != $service->id){

                $Imageid = $request->thumbnail;
                $temp = TempImage::find($Imageid);

                if($temp != null){
                    $extArray = explode(',',$temp->name);
                    $ext = last($extArray);
                    
    
    
                    $newImageName = $service->id.'-'.time().'.'.$ext;
    
                    $TempSourcePath = public_path().'/Uploads/temp/'.$temp->name;
                    $Dpath = public_path().'/Uploads/Service/'.$newImageName;
    
                    $service->thumbnail = $newImageName;
                    $service->update();

                    if(File::exists(public_path().'/Uploads/Service/'.$oldImgName)){

                        File::delete(public_path().'/Uploads/Service/'.$oldImgName);
                    }

                    if(File::exists(public_path().'/Uploads/Service/thumbnail/Small/'.$oldImgName)){

                        File::delete(public_path().'/Uploads/Service/thumbnail/Small/'.$oldImgName);
                    }

                    if(File::exists(public_path().'/Uploads/Service/thumbnail/large/'.$oldImgName)){

                        File::delete(public_path().'/Uploads/Service/thumbnail/large/'.$oldImgName);
                    }
    
    
                    File::copy($TempSourcePath,$Dpath);
    
                    $manager = new ImageManager(new Driver());
                    $ImageManager = $manager->read($TempSourcePath);
                    
                    // Medium Size Thumbnail
    
                    $Dpath = public_path().'/Uploads/Service/thumbnail/Small/'.$newImageName;
                    $ImageManager->cover(350,350);
                    $ImageManager->save($Dpath);
    
    
                    // Large Size Thumbnail
    
                    $Dpath = public_path().'/Uploads/Service/thumbnail/large/'.$newImageName;
                    $ImageManager->scaleDown(1400);
                    $ImageManager->save($Dpath);
    
    
                    
                }

               

              }

              if($request->icon_img != null && $request->icon_img != $service->id){

                $Imageid = $request->icon_img;
                $temp = TempImage::find($Imageid);

                $extArray = explode(',',$temp->name);
                $ext = last($extArray);
                


                $newImageName = $service->id.'-'.time().'.'.$ext;

                $TempSourcePath = public_path().'/Uploads/temp/'.$temp->name;
                $Dpath = public_path().'/Uploads/Service/'.$newImageName;

                $service->icon_img = $newImageName;
                $service->update();

                if(File::exists(public_path().'/Uploads/Service/'.$oldIconName)){

                    File::delete(public_path().'/Uploads/Service/'.$oldIconName);
                }

                if(File::exists(public_path().'/Uploads/Service/'.$oldIconName)){

                    File::delete(public_path().'/Uploads/Service/Icon/'.$oldIconName);
                }

                File::copy($TempSourcePath,$Dpath);

                $manager = new ImageManager(new Driver());
                $ImageManager = $manager->read($TempSourcePath);
                
                // Medium Size Thumbnail

                $Dpath = public_path().'/Uploads/Service/Icon/'.$newImageName;
                $ImageManager->cover(150,150);
                $ImageManager->save($Dpath);
                

              }

              return response()->json([
                'status' => true,
                'msg' => 'Service Updated Successfully',
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
        $service = Service::find($request->id);

        if($service == null){
 
         return response()->json([
             'status' => false,
             'IsNotFound' => true,
             'error' => 'Service Not Found'
         ]);
        }

        if(File::exists(public_path().'/Uploads/Service/'.$service->thumbnail)){

            File::delete(public_path().'/Uploads/Service/'.$service->thumbnail);
        }

        if(File::exists(public_path().'/Uploads/Service/thumbnail/Small/'.$service->thumbnail)){

            File::delete(public_path().'/Uploads/Service/thumbnail/Small/'.$service->thumbnail);
        }

        if(File::exists(public_path().'/Uploads/Service/thumbnail/large/'.$service->thumbnail)){

            File::delete(public_path().'/Uploads/Service/thumbnail/large/'.$service->thumbnail);
        }

        if(File::exists(public_path().'/Uploads/Service/'.$service->icon_img)){

            File::delete(public_path().'/Uploads/Service/'.$service->icon_img);
        }

        if(File::exists(public_path().'/Uploads/Service/'.$service->icon_img)){

            File::delete(public_path().'/Uploads/Service/Icon/'.$service->icon_img);
        }

        $service->delete();

        return response()->json([
            'status' => true,
            'id' => $request->id,
            'msg' => 'Service Deleted Succesfully',
        ]);


    }
}
