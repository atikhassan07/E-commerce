<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    public function scoial()
    {
        $social = Social::all();
        return view('admin.social.social',[
            'social'=>$social,
        ]);
    }

    public function Storescoial(Request $request){
        $request->validate([
            'icon'=>'required',
            'link'=>'required',
        ]);
        Social::insert([
            'icon'=>$request->icon,
            'link'=>$request->link,
        ]);

        $notification=array('messege' => 'Social Media Link Added Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    public function Deletescoial($id){
        Social::find($id)->delete();

        $notification=array('messege' => 'Social Media Link Deleted Successfuly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }
}
