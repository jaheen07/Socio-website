<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\user_account;
use App\models\user_profile;
use Illuminate\Support\Facades\Hash;
use Carbon\carbon;
use Image;
use Auth;

class loginController extends Controller
{
    function register(Request $request){
        $request->validate([
            'photo' => 'image',
        ]);
        // if(user_account::where('email',$request->email)->exists()){
        //     return back()->with('failed',);
        // }
        $user_name = $request->fname.' '.$request->lname;


        $image_name = $request->photo;
        $extension = $image_name->getClientOriginalExtension();
        $new_name = $user_name.'.'.$extension;
        Image::make($image_name)->resize(800,800)->save(base_path('public/uploads/users/'.$new_name));


        if(user_account::where('email',$request->email)->exists()){
            return back()->with('error','same email detected');
        }
        else{
        user_account::insert([
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'user_name' => $user_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'photo' => $new_name,
            'password' =>Hash::make($request->pass),
            'created_at' => Carbon::now(),
        ]);

        user_profile::insert([
            'user_id' => user_account::where('email',$request->email)->first()->id,
            'user_name' => $user_name,
            'profile_pic' => $new_name,
            'gender' =>user_account::where('email',$request->email)->first()->gender,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('success','Registered Successfully');
        }
    }


    function login(Request $request){
        // print_r($request->all());
        if(Auth::guard('local')->attempt(['email'=>$request->email,'password' => $request->pass])){
            return redirect('/home');
        }
        else{
            return back()->with('error','Enter  email,password correctly');
        }
    }


    function logout(Request $request){
        Auth::guard('local')->logout();
        return redirect('/');
    }
}
