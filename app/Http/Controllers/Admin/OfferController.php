<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newyearoffer;
use App\Models\Upcommingoffer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class OfferController extends Controller
{
    public function UpcommingOffer()
    {
        $upcommingOffers = Upcommingoffer::all();
        return view('admin.offers.upcomming_offer',[
            'upcommingOffers'=>$upcommingOffers,
        ]);
    }

    public function UpcommingStore(Request $request)
    {
        $imageName = '';

        if($photo = $request->file('image')){

         $extension = $photo->getClientOriginalExtension();

         $file_name = str::lower(str_replace(' ', '-',$request->product_name)).'.'.$extension;

         Image::make($photo)->save(public_path('uploads/offer_image/'.$file_name));

        }


        Upcommingoffer::insert([
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'disscount'=>$request->disscount,
            'after_disscount'=>$request->product_price - $request->product_price*$request->disscount/(100),
            'date'=>$request->date,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);

        $notification=array('messege' => 'Offer Added Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

// New Year Offer
    function newOffer()
    {
        $newyearoffer = Newyearoffer::all();
        return view('admin.offers.new_year',[
            'newyearoffer'=>$newyearoffer,

        ]);
    }

    function newOfferStore(Request $request)
    {
        $imageName = '';

        if($photo = $request->file('image')){

         $extension = $photo->getClientOriginalExtension();

         $file_name = str::lower(str_replace(' ', '-',$request->title)).'.'.$extension;

         Image::make($photo)->save(public_path('uploads/newyear_image/'.$file_name));

        }


        Newyearoffer::insert([
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'persentage'=>$request->persentage,
            'image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);

        $notification=array('messege' => 'New Year Offer Added Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }
}

