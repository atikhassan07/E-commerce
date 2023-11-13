<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    public function category()
    {
        $categories = Category::all();
        return view('admin.category.add_new',[
            'categories'=>$categories,
        ]);
    }
    public function categoryStore(Request $request)
    {
        $request->validate([
            'category_name'=>'required',
        ]);

       $imageName = '';

       if($photo = $request->file('category_photo')){

        $extension = $photo->getClientOriginalExtension();

        $file_name = str::lower(str_replace(' ', '-',$request->category_name)).'.'.$extension;

        Image::make($photo)->save(public_path('uploads/category/'.$file_name));

       }

       Category::insert([
        'category_name'=>$request->category_name,
        'category_photo'=> $file_name,
    ]);

        $notification=array('messege' => 'Category Added Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);

    }

    public function categoryEdit($id)
    {
        $categories = Category::find($id);

        return view('admin.category.edit',[
            'categories'=>$categories,
        ]);
    }
    public function categoryUpdate(Request $request, $id)
    {
        $cate_info = Category::find($id);
        if($request->category_photo == '')
        {
            Category::find($id)->update([
                'category_name'=>$request->category_name,
            ]);
        $notification=array('messege' => 'Category Updated Successfuly', 'alert-type' => 'success');

        return redirect()->route('category')->with($notification);
        }else{
        $delete_path = public_path('uploads/category/'.$cate_info->category_photo);
        unlink($delete_path);


        if($photo = $request->file('category_photo')){

            $extension = $photo->getClientOriginalExtension();

            $file_name = str::lower(str_replace(' ', '-',$request->category_name)).'.'.$extension;

            Image::make($photo)->save(public_path('uploads/category/'.$file_name));

            Category::find($id)->update([
                'category_name'=>$request->category_name,
                'category_photo'=> $file_name,
            ]);
            $notification=array('messege' => 'Category Updated Successfuly', 'alert-type' => 'success');

            return redirect()->route('category')->with($notification);
        }
    }
}
public function categorySoftDelete($id)
    {
        Category::find($id)->delete();

        $notification=array('messege' => 'Category Trashed Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);

    }
    public function categoryTrash()
    {
        $trash_cat = Category::onlyTrashed()->get();
        return view('admin.category.trash',[
            'trash_cat'=>$trash_cat,
        ]);
    }
    public function categoryRestore($id)
    {
        Category::onlyTrashed()->find($id)->restore();

        $notification=array('messege' => 'Category Restore Successfuly', 'alert-type' => 'success');

        return redirect()->route('category')->with($notification);
    }
    public function forceDelete($id)
    {
        $cat_photo = Category::onlyTrashed()->find($id);
        $delete = public_path('uploads/category/'.$cat_photo->category_photo);
        unlink($delete);
        Category::onlyTrashed()->find($id)->forceDelete();

        $notification=array('messege' => 'Category Parmanent Deleted Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }
}

