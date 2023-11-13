<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Size;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    function inventory($product_id)
    {
        $product_info = Product::find($product_id);
        $colors = Color::all();
        $sizes = Size::where('category_id', $product_info->category_id)->get();
        $inventories = Inventory::Where('product_id',$product_id)->get();
        return view('admin.products.inventory',[
            'sizes'=>$sizes,
            'colors'=>$colors,
            'product_info'=>$product_info,
            'inventories'=>$inventories,
        ]);
    }

    function inventoryStore(Request $request)
    {


        if(Inventory::where('product_id',$request->product_id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->exists())
        {
            Inventory::where('product_id',$request->product_id)->where('color_id',$request->color_id)->where('size_id',$request->size_id)->increment('quantity', $request->quantity);
            return back();

        }else{
            $inventory = [
                'product_id'=>$request->product_id,
                'color_id'=>$request->color_id,
                'size_id'=>$request->size_id,
                'quantity'=>$request->quantity,
                'created_at'=>Carbon::now(),

            ];

            Inventory::insert([$inventory]);

            return back();
        }

    }
    function inventoryDelete($id)
    {
        Inventory::find($id)->delete();
        return back();

    }
}
