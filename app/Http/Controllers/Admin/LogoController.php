<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LogoController extends Controller
{
    public function logo()
    {
        $main_logo = Logo::where('location', 'main')->get();
        $footer_logo = Logo::where('location', 'footer')->get();
        return view('admin.logo.logo',[
            'main_logo'=>$main_logo,
            'footer_logo'=>$footer_logo,
        ]);
    }

    public function Updatelogo(Request $request){

        $logo = Logo::find($request->logo_id);

        // $delete_logo =public_path('uploads/logo/'.$logo->logo);
        // unlink($delete_logo);

        $image = $request->logo;
        $extension = $image->extension();
        $file_name = 'footer_logo'.time().'.'.$extension;
        Image::make($image)->save(public_path('uploads/logo/'.$file_name));

        Logo::find($request->logo_id)->update([
            'logo'=>$file_name,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        $notification=array('messege' => 'Footer Logo Updated Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }
}
