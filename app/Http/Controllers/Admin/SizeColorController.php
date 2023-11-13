<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SizeColorController extends Controller
{
    function Color_Size()
    {
        $colors = Color::all();
        $categories = Category::all();
        $sizes = Size::all();
        return view('admin.color_&_size.color_size',[
            'colors'=>$colors,
            'categories'=>$categories,
            'sizes'=>$sizes,
        ]);
    }
    function ColorStore(Request $request)
    {
        $data = [
            'color_name'=>$request->color_name,
            'color_code'=>$request->color_code,
            'created_at'=>Carbon::now(),
        ];

        Color::insert([$data]);

        $notification=array('messege' => 'Color Added Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    function ColorDelete($id)
    {
        Color::find($id)->delete();

        $notification=array('messege' => 'Color Deleted Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    // Size
    function SizeStore(Request $request)
    {
        $data = [
            'category_id'=>$request->category_id,
            'size_name'=>$request->size_name,
        ];
        Size::insert([$data]);

        $notification=array('messege' => 'Size Added Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);

    }

    function SizeDelete($id)
    {
        Size::find($id)->delete();

        $notification=array('messege' => 'Size Deleted Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }


}
