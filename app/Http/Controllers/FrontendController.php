<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Newsletter;
use App\Models\Newyearoffer;
use App\Models\Product;
use App\Models\Thumbnail;
use App\Models\Upcommingoffer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::latest()->get();
        $upcommingOffer = Upcommingoffer::latest()->get();
        $newyearoffer_70 = Newyearoffer::where('persentage', 70)->get();
        $newyearoffer_50 = Newyearoffer::where('persentage', 50)->get();
        return view('frontend.index',[
            'categories'=>$categories,
            'products'=>$products,
            'upcommingOffer'=>$upcommingOffer,
            'newyearoffer_70'=>$newyearoffer_70,
            'newyearoffer_50'=>$newyearoffer_50,
        ]);
    }

    public function productDetails($slug){
        $categories = Category::all();
        $products = Product::where('slug',$slug)->get();
        $thumbnails = Thumbnail::where('product_id',$products->first()->id)->get();
        $upcommingOffer = Upcommingoffer::latest()->get();
        $newyearoffer_70 = Newyearoffer::where('persentage', 70)->get();
        $newyearoffer_50 = Newyearoffer::where('persentage', 50)->get();


        return view('frontend.product.single_product',[
            'categories'=>$categories,
            'products'=>$products,
            'upcommingOffer'=>$upcommingOffer,
            'newyearoffer_70'=>$newyearoffer_70,
            'newyearoffer_50'=>$newyearoffer_50,
            'thumbnails'=>$thumbnails,
        ]);
    }
}
