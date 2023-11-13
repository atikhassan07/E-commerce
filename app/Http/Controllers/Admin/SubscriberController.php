<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newsletter;
use App\Models\Subscriber;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SubscriberController extends Controller
{
    public function AllSubcriber(){
        $susbscriber = Newsletter::orderBy('id','DESC')->get();
        return view('admin.subscriber.all_subcriber',[
            'susbscriber'=>$susbscriber,
        ]);
    }

    public function newsletter()
    {
        $subs = Subscriber::all();
        return view('admin.subscriber.subscriber',[
            'subs'=>$subs,
        ]);
    }

    public function newsletterStore(Request $request)
    {
        $request->validate([
            'email'=>'required',
        ]);

        Newsletter::insert([
            'email'=>$request->email,
            'created_at'=>Carbon::now(),
        ]);

        $notification=array('messege' => 'Subscribe Successfuly! We Will Contact You Soon! Thanks', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

    public function updateSubcriber(Request $request)
    {
        if($request->image == ''){
            Subscriber::find($request->sub_id)->update([
                'title'=>$request->title,
            ]);
            $notification=array('messege' => 'Update Subscribe Part Successfully', 'alert-type' => 'success');

            return redirect()->back()->with($notification);
        }
        else{
            $subs = Subscriber::find($request->sub_id);

            $delete_image =public_path('uploads/subcribe/'.$subs->image);
            unlink($delete_image);

            $image = $request->image;
            $extension = $image->extension();
            $file_name = 'subscribe'.time().'.'.$extension;
            Image::make($image)->save(public_path('uploads/subcribe/'.$file_name));

            Subscriber::find($request->sub_id)->update([
                'title'=>$request->title,
                'image'=>$file_name,
            ]);

            $notification=array('messege' => 'Update Subscribe Part Successfully', 'alert-type' => 'success');

            return redirect()->back()->with($notification);
        }
    }

    public function delete($id){

        Newsletter::find($id)->delete();

        $notification=array('messege' => 'Subscriber Deleted Successfully', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }

}
