<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class BrandController extends Controller
{
   public function brand()
   {
     $brands = Brand::all();
     return view('admin.brand.add_new',[
        'brands'=>$brands,
     ]);
   }

   public function brandStore(Request $request)
   {
        $request->validate([
            'brand_name'=>'required',
            'brand_photo'=>'required',
        ]);

        $image = $request->brand_photo;

        $extension = $image->extension();

        $file_name = Str::lower(str_replace('', '-', $request->brand_name)).'.'.$extension;

        Image::make($image)->save(public_path('uploads/brands/'.$file_name));

        Brand::insert([
            'brand_name'=>$request->brand_name,
            'brand_photo'=>$file_name,
        ]);

        $notification=array('messege' => 'Brand Added Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);

   }

   public function brandEdit($id)
   {
        $brands = Brand::find($id);

        return view('admin.brand.edit',[
            'brands'=>$brands,
        ]);

   }
   public function brandUpdate(Request $request, $id)
   {
    $brands = Brand::find($id);

    if($request->brand_photo == '')
        {
            Brand::find($id)->update([
                'brand_name'=>$request->brand_name,
            ]);
            $notification=array('messege' => 'Brand Updated Successfuly', 'alert-type' => 'success');

            return redirect()->route('brand')->with($notification);
        }else{

           $delete_photo = public_path('uploads/brands/'.$brands->brand_photo);

           unlink($delete_photo);

           $image = $request->brand_photo;

           $extension = $image->extension();

           $file_name = Str::lower(str_replace(' ', '-', $request->brand_name)).'.'.$extension;

           Image::make($image)->save(public_path('uploads/brands/'.$file_name));

           Brand::find($id)->update([

            'brand_name'=>$request->brand_name,
            'brand_photo'=>$file_name,

           ]);
             $notification=array('messege' => 'Brand Updated Successfuly', 'alert-type' => 'success');

             return redirect()->route('brand')->with($notification);
        }

   }
   public function brandDelete($id)
   {
        Brand::find($id)->delete();

        $notification=array('messege' => 'Brand Deleted Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
   }
}
