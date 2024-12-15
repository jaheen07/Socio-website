<?php

namespace App\Http\Controllers;

use App\Models\user_account;
use Illuminate\Http\Request;
use App\Models\user_profile;
use Auth;
use Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\reset_pass;




class frontendController extends Controller
{
    function landing_page(){
        return view('frontend.landing_page');
    }

    function home_page()
    {
        if(Auth::guard('local')->check()){
            return view('frontend.home');
        }
        else{
            return redirect('/')->with("loginmsg","please enter your credentials first");
        }
    }

    function friend_profile($name,$id){
        $profile=user_profile::where('user_id',$id)->get();
        $id = Auth::guard('local')->user()->id.'/'.$profile->first()->id;

        return view('frontend.other_friend_profile',[
            'profile' => $profile,
            'id' => $id,
        ]);
    }
    function profile_page(){
        return view('frontend.timeline');
    }

    function job_page(){
        return view('frontend.jobs');
    }

    function photos(){
        return view('frontend.photos');
    }

    function videos(){
        return view('frontend.videos');
    }

    function friends(){
        return view('frontend.friends');
    }

    function groups(){
        return view('frontend.groups');
    }

    function about(){
        return view('frontend.about');
    }

    function settings(){
        return view('frontend.settings');
    }

    function active_status_control(Request $req){
        user_profile::where('user_id',Auth::guard('local')->user()->id)->update([
            'active_status' => $req->status,
        ]);
        return $req->status;
    }

    function dark_mode(Request $req){
        user_profile::where('user_id',$req->user_id)->update([
            'dark_mode' => $req->dark_mode,
        ]);
        if($req->dark_mode == "on"){
            return "off";
        }
        else{
            return "on";
        }
    }

    function edit_profile2(Request $req){
        $user_name = $req->f_name.' '.$req->l_name;
        if(user_account::where('id',Auth::guard('local')->user()->id)->first()->user_name != $user_name){
            user_account::where('id',Auth::guard('local')->user()->id)->update([
                'first_name' => $req->f_name,
                'last_name' => $req->l_name,
                'user_name' => $user_name,
            ]);

            user_profile::where('user_id',Auth::guard('local')->user()->id)->update([
                'user_name' => $user_name,
            ]);
        }

        user_profile::where('user_id',Auth::guard('local')->user()->id)->update([
            'DoB' => $req->DOB,
            'lives_at' => $req->location,
            'bio' => $req->bio,
        ]);

        return back();

    }

    function edit_edu2(Request $req){
        if($req->studying == 'on'){
            $state = 'Studying';
        }
        else{
            $state = 'Studied';
        }
        user_profile::where('user_id',Auth::guard('local')->user()->id)->update([
            'edu_institute' => $req->institute,
            'study' => $state,
        ]);

        return back();
    }

    function edit_work2(Request $req){
        if($req->working == 'on'){
            $state = 'Working';
        }
        else{
            $state = 'Worked';
        }

        $works_at = $req->institute.'/'.$req->position.'/'.$state;
        user_profile::where('user_id',Auth::guard('local')->user()->id)->update([
            'works_at' => $works_at,
        ]);

        return back();
    }

    function change_pass(Request $req){
        $pass = Auth::guard('local')->user()->password;

        if(Hash::check($req->c_pass,$pass)){
            user_account::find(Auth::guard('local')->user()->id)->update([
                'password' => bcrypt($req->n_pass),
            ]);
            return "your password has been updated.want to log out?";
        }
        else{
            return 'mile nai';
        }
    }

    function reset_pass(){
        return view('frontend.reset_pass');
    }

    function link_sent(Request $req){
        $test = random_int(100000,999999);
        Mail::to($req->email)->send(new reset_pass($test));
        user_account::where('email',$req->email)->update([
            'reset_code' => $test,
        ]);

        return back()->with('sent',"sent code");
    }

    function change_password(Request $req){
        if(user_account::where('email',$req->email)->where('reset_code',$req->code)->exists()){
            return back()->with('change_pass',$req->email);
        }
        else{
            return back()->with('error','credientials does not match');
        }
    }

    function set_password(Request $req){
        if($req->n_pass == $req->re_pass){
            user_account::where('email',$req->email)->update([
                'password' => bcrypt($req->n_pass),
                'reset_code' => NULL,
            ]);
            return redirect('/')->with('pass_setted','your password is resetted');
        }
        else{
            return back()->with('change_pass','password does not matching. type carefully');
        }
    }
}
