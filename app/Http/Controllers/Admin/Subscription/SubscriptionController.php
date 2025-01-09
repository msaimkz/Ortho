<?php

namespace App\Http\Controllers\Admin\Subscription;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Rules\MatchTitleAndSlug;
use App\Rules\GreaterPrice;
use App\Models\Admin\Subscription;


class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscriptions = Subscription::latest()->get();
        return view('Admin.Subscription.subscription',compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Subscription.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:subscriptions',new MatchTitleAndSlug($request->name)],
            'description' => ['required','min:10','max:550'],
            'plan' => ['required','in:free,professional,community','unique:subscriptions'],
            'monthly_price' => ['nullable', 'numeric', 'min:0'],
            'annual_price' => ['nullable', 'numeric', 'min:0',new GreaterPrice($request->monthly_price)],
        ],[
            'plan.required' => "Subscription Plan is Required",
            'plan.unique' => "You Already Add this Subscription Plan",
            'monthly_price.min' => "Monthly Price is must be greater than zero",
            'annual.min' => "Annual Price is must be greater than zero",
        ]);

        $validator->sometimes(['monthly_price', 'annual_price'], 'required', function ($input) {
            return in_array($input->plan, ['professional', 'community']);
        });

        if($validator->passes()){

            if($request->plan != "free"){

                 $subscription = new Subscription();
                 $subscription->name = $request->name;
                 $subscription->slug = $request->slug;
                 $subscription->plan = $request->plan;
                 $subscription->monthly_price = $request->monthly_price;
                 $subscription->annual_price = $request->annual_price;
                 $subscription->description = $request->description;
                 $subscription->save();

            }
            else{

                 $subscription = new Subscription();
                 $subscription->name = $request->name;
                 $subscription->slug = $request->slug;
                 $subscription->plan = $request->plan;
                 $subscription->monthly_price = 0;
                 $subscription->annual_price = 0;
                 $subscription->description = $request->description;
                 $subscription->save();
            }

            return response()->json([
                'status' => true,
                'msg' => 'Subscription Plan Create Successfully',
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
    public function show()
    {
        return view('Admin.Subscription.subscribe-patients');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $subscription = Subscription::where('slug',$slug)->first();

        if($subscription == null){

            return  redirect()->route('Admin.notFound');
        }
        

        return view('Admin.Subscription.edit',compact("subscription"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $subscription = Subscription::find($id);

        if($subscription == null){

            return response()->json([
                'status' => false,
                'IsNotFound' => true,
                'error' => "Subscription Plan Not Found"
            ]);
        }

        $validator = Validator::make($request->all(),[
            'name' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/'],
            'slug' => ['required','min:3','max:100','regex:/^(?=.*[a-zA-Z].*[a-zA-Z].*[a-zA-Z]).*$/','unique:subscriptions,slug,'.$subscription->id.',id',new MatchTitleAndSlug($request->name)],
            'description' => ['required','min:10','max:550'],
            'plan' => ['required','in:free,professional,community','unique:subscriptions,plan,'.$subscription->id.',id'],
            'monthly_price' => ['nullable', 'numeric', 'min:0'],
            'annual_price' => ['nullable', 'numeric', 'min:0',new GreaterPrice($request->monthly_price)],
        ],[
            'plan.required' => "Subscription Plan is Required",
            'plan.unique' => "You Already Add this Subscription Plan",
            'monthly_price.min' => "Monthly Price is must be greater than zero",
            'annual_price.min' => "Annual Price is must be greater than zero",
        ]);

        $validator->sometimes(['monthly_price', 'annual_price'], 'required|min:1', function ($input) {
            return in_array($input->plan, ['professional', 'community']);
        });

        if($validator->passes()){

            if($request->plan != "free"){

                 $subscription->name = $request->name;
                 $subscription->slug = $request->slug;
                 $subscription->plan = $request->plan;
                 $subscription->monthly_price = $request->monthly_price;
                 $subscription->annual_price = $request->annual_price;
                 $subscription->description = $request->description;
                 $subscription->update();

            }
            else{

                 $subscription->name = $request->name;
                 $subscription->slug = $request->slug;
                 $subscription->plan = $request->plan;
                 $subscription->monthly_price = 0;
                 $subscription->annual_price = 0;
                 $subscription->description = $request->description;
                 $subscription->update();
            }

            return response()->json([
                'status' => true,
                'msg' => 'Subscription Plan Updated Successfully',
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
        $subscription = Subscription::find($request->id);

        if($subscription == null){

            return response()->json([
                'status' => false,
                'IsNotFound' => true,
                'error' => "Subscription Plan Not Found"
            ]);
        }

        $subscription->delete();

        return response()->json([
            'status' => true,
            'id' => $request->id,
            'msg' => "Subscription Plan Deleted Successfully."
        ]);

    }
}
