<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_profile;
use App\Models\user_account;
use Carbon\carbon;
use Image;
use Auth;

class editController extends Controller
{
    function edit_pro_pic(Request $request){

        $name= Auth::guard('local')->user()->user_name;

        $image_name = $request->profile_pic;
        $extension = $image_name->getClientOriginalExtension();
        $new_name = $name.'.'.$extension;
        Image::make($image_name)->save(base_path('public/uploads/users/'.$new_name));

        user_profile::where('user_id',Auth::guard('local')->user()->id)->update([
            'profile_pic' => $new_name,

        ]);
        user_account::where('id',Auth::guard('local')->user()->id)->update([
            'photo' => $new_name,

        ]);
        return back();
    }



    function edit_cvr_pic(Request $request){
        $name= Auth::guard('local')->user()->user_name.'_cvr';

        $image_name = $request->cvr_pic;
        $extension = $image_name->getClientOriginalExtension();
        $new_name = $name.'.'.$extension;
        Image::make($image_name)->save(base_path('public/uploads/coverphotos/'.$new_name));


        user_profile::where('user_id',Auth::guard('local')->user()->id)->update([
            'cover_pic' => $new_name,

        ]);
        return back();
    }
}
