<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Models\Thumbnail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function product()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $brands = Brand::all();
        return view('admin.products.add_new',[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
            'brands'=>$brands,
        ]);
    }

    public function getSubcategory(Request $request)
    {
        $str = '<option value="" disabled selected>Select a Category</option>';
       $subcategories = Subcategory::where('category_id', $request->category_id)->get();
       foreach($subcategories as $subcategory){
        $str .= '<option value="'.$subcategory->id.'">'.$subcategory->subcategory_name.'</option>';
       }
       echo $str;
    }
    public function productStore(Request $request)
    {
        // $category_name = Category::where('id',$request->category_id)->select('category_name')->get();
        $category_name = Category::where('id',$request->category_id)->first()->category_name;
        $sku = Str::upper(substr($category_name, 0,3)).'-'.random_int(10000, 100000000);

        $slug = Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(10000, 100000000);
        $preview_image = Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(10000, 100000000);

        $preview = $request->preview_image;
        $extension = $preview->extension();
        $file_name =$preview_image.'.'.$extension;
        Image::make($preview)->resize(600,600)->save(public_path('uploads/products/'.$file_name));

        $product_id =  Product::insertGetId([
            'added_by'=>Auth::id(),
            'category_id'=> $request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'product_price'=>$request->product_price,
            'discount'=>$request->discount,
            'after_disscount'=>$request->product_price - $request->product_price*$request->discount/(100),
            'sku'=>$sku,
            'tags'=>$request->tags,
            'slug'=>$slug,
            'short_description'=>$request->short_description,
            'long_description'=>$request->long_description,
            'additonal_description'=>$request->additonal_description,
            'preview_image'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);
            $thumbnails = $request->thumbnail_image;
            foreach ($thumbnails as  $thumb) {
                $thumb_extension = $thumb->extension();
                $thumb_name =Str::lower(str_replace(' ','-',$request->product_name)).'-'.random_int(10000, 100000000).'.'.$thumb_extension;
                Image::make($thumb)->resize(100,100)->save(public_path('uploads/products/thumnails/'.$thumb_name));

                Thumbnail::insert([
                    'added_id'=>Auth::id(),
                    'product_id'=>$product_id,
                    'thumbnail_image'=>$thumb_name,
                    'created_at'=>Carbon::now(),

                ]);

            }
        $notification=array('messege' => 'Product Added Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);

    }
    function all_product()
    {
        $products = Product::all();
        return view('admin.products.product_list',[
            'products'=>$products,
        ]);
    }
}
