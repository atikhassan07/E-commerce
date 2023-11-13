<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class SubcategoryController extends Controller
{
    public function subcategory()
    {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.subcategory.add_new',[
            'categories'=>$categories,
            'subcategories'=>$subcategories,
        ]);
    }

    public function subcategoryStore(Request $request)
    {
        $request->validate([
            'subcategory_name'=>'required',

        ]);
        $file_name = '';
        if($request->hasFile('subcategory_photo')){
            $image = $request->file('subcategory_photo');
            $file_name = str::lower(str_replace(' ', '-',$request->subcategory_name)).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(public_path('uploads/subcategory/'.$file_name));
        }

        Subcategory::insert([
            'category_id'=>$request->category_id,
            'subcategory_name'=>$request->subcategory_name,
            'subcategory_photo'=>$file_name,
            'created_at'=>Carbon::now(),
        ]);

        $notification=array('messege' => 'Category Added Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);

    }
    public function subcategoryEdit($id)
    {
        $subcategories = Subcategory::find($id);
        $categories = Category::all();

        return view('admin.subcategory.edit',[
            'subcategories'=>$subcategories,
            'categories'=>$categories,
        ]);
    }

    public function subcategoryUpdate(Request $request, $id)
    {
        $subcategory = Subcategory::find($id);

        if($request->subcategory_photo == '')
            {
                Subcategory::find($id)->update([

                    'subcategory_name'=>$request->subcategory_name,
                ]);
                $notification=array('messege' => 'Subcategory Updated Successfuly', 'alert-type' => 'success');

                return redirect()->route('subcategory')->with($notification);
            }
            // else{

            //    $delete_photo = public_path('uploads/brands/'.$brands->brand_photo);

            //    unlink($delete_photo);

            //    $image = $request->brand_photo;

            //    $extension = $image->extension();

            //    $file_name = Str::lower(str_replace(' ', '-', $request->brand_name)).'.'.$extension;

            //    Image::make($image)->save(public_path('uploads/brands/'.$file_name));

            //    Brand::find($id)->update([

            //     'brand_name'=>$request->brand_name,
            //     'brand_photo'=>$file_name,

            //    ]);
            //      $notification=array('messege' => 'Brand Updated Successfuly', 'alert-type' => 'success');

            //      return redirect()->route('brand')->with($notification);
            // }
    }
}
