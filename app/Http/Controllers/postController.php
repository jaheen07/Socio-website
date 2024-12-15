<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\friend_request;
use App\Models\user_account;
use App\Models\user_profile;
use App\Models\reacts;
use App\Models\friend;
use App\Models\post;
use App\Models\job;
use Auth;
use Carbon\carbon;
use Image;

class postController extends Controller
{
    function post_entry(Request $request){

        $request->validate([
            'photo' => 'image',
        ]);
        // if(user_account::where('email',$request->email)->exists()){
        //     return back()->with('failed',);
        // }

        $caption = explode(' ',$request->caption);
        if($caption[0] == ''){
            $photo_name = 'empty_caption';
        }
        else{
            $photo_name = $caption[0];
        }

        if($request->photo == ''){
            post::insert([
                'user_id' => Auth::guard('local')->user()->id,
                'caption' => $request->caption,
                'photo' => 'empty.jpg',
                'created_at' => Carbon::now(),
            ]);
            return back();
        }else{
        $image_name = $request->photo;
        $extension = $image_name->getClientOriginalExtension();
        $new_name = $photo_name.'.'.$extension;
        Image::make($image_name)->resize(800,800)->save(base_path('public/uploads/post_photo/'.$new_name));

        post::insert([
            'user_id' => Auth::guard('local')->user()->id,
            'caption' => $request->caption,
            'photo' => $new_name,
            'created_at' => Carbon::now(),
        ]);
        return back();
        }



    }

    function share_entry(Request $req){
        post::insert([
            'user_id' =>$req->user_id,
            'caption' => $req->caption,
            'shared_post_id' => $req->post_id,
            'created_at' => Carbon::now(),
        ]);
        return back();
    }


    function friend_req(Request $request){
        friend_request::insert([
            'sender_id' => $request->sender_id,
            'sender_name' => $request->sender_name,
            'reciever_name' => $request->reciever_name,
            'reciever_id' => $request->reciever_id,
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);
        return back();
    }

    function req_confirm(Request $request){
        $friend_id = $request->friend_id.'/'.$request->user_id;
        friend::insert([
            'friend1' => $request->user_name,
            'friend2' => $request->friend_name,
            'friendship_id' => $friend_id,
            'became_friend_on' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        return back();
    }

    function cancel_req(Request $req){


        friend_request::where('id',$req->req_id)->delete();

        return back();
    }


    function unfriend(Request $req){
        friend::where('id',$req->delete_id)->delete();
        return redirect('/friends');
    }

    function delete_req(Request $req){
        friend_request::where('id',$req->delete_id)->delete();

        $send_string ='';

        foreach(friend_request::where('reciever_id',Auth::guard('local')->user()->id)->get() as $req){
            $pic = user_profile::where('user_id',$req->sender_id)->first()->profile_pic;
            $send_string .='<li>
            <div class="nearly-pepls">
                <figure>
                <a href="" title=""><img src="{{asset('.'uploads/users'.')}}/{{'.$pic.'}}" alt=""></a>
                </figure>
                <div class="pepl-info">
                    <h4><a href="{{url("/")}}/{{'.$req->sender_name.'}}/{{'.$req->sender_id.'}}" title="">{{'.$req->sender_name.'}}</a></h4>

                    <button id="delete" onclick="click({{'.$req->id.'}})" title="" class="btn btn-danger">delete Request</button>
                    <button onclick="confirm({{'.$req->id.'}})" class="btn btn-primary">confirm</button>
                </div>
            </div>
        </li>';
        }

        echo $send_string;
    }



    function confirm_req(Request $req){

        $name = user_account::where('id',Auth::guard('local')->user()->id)->get()->first()->user_name;
        $info = friend_request::where('id',$req->id)->get();
        friend::insert([
            'friend1' => $info->first()->sender_name,
            'friend2' => $name,
            'friendship_id' => $info->first()->sender_id.'/'.Auth::guard('local')->user()->id,
            'became_friend_on' => Carbon::now(),
            'created_at' => Carbon::now(),
        ]);

        friend_request::where('id',$req->id)->delete();
        $send_string ='';

        foreach(friend_request::where('reciever_id',Auth::guard('local')->user()->id)->get() as $req){
            $pic = user_profile::where('user_id',$req->sender_id)->first()->profile_pic;
            $send_string .='<li>
            <div class="nearly-pepls">
                <figure>
                <a href="" title=""><img src="{{asset('.'uploads/users'.')}}/{{'.$pic.'}}" alt=""></a>
                </figure>
                <div class="pepl-info">
                    <h4><a href="{{url("/")}}/{{'.$req->sender_name.'}}/{{'.$req->sender_id.'}}" title="">{{'.$req->sender_name.'}}</a></h4>
                    <button id="delete" onclick="click({{'.$req->id.'}})" title="" class="btn btn-danger">delete Request</button>
                    <button onclick="confirm({{'.$req->id.'}})" class="btn btn-primary">confirm</button>
                </div>
            </div>
        </li>';
        }

        echo $send_string;

    }


    function react_entry(Request $req){

        if(reacts::where('post_id',$req->post_id)->where('user_id',$req->user_id)->exists()){
            reacts::where('post_id',$req->post_id)->where('user_id',$req->user_id)->delete();

            $react =  post::where('id',$req->post_id)->first()->reacts - 1;
            post::where('id',$req->post_id)->update([
                'reacts' => $react,
            ]);

            return 0;
        }
        else{
           reacts::insert([
            'post_id' => $req->post_id,
            'user_id' => $req->user_id,
            'react' => "1",
            'created_at' => Carbon::now(),
        ]);

        $react =  post::where('id',$req->post_id)->first()->reacts + 1;
        post::where('id',$req->post_id)->update([
            'reacts' => $react,
        ]);

        return 1;
        }

    }

    function search_content(Request $req){
        $word = $req->search_val;
        $result = user_profile::where('user_name','LIKE','%'.$word.'%')->first();

        // $res = '/'.$result->user_name.'/'.$result->user_id;
        if($result){
            return redirect("/$result->user_name/$result->user_id");
        }
        else{
            return view('frontend.not_found');
        }

    }



    function job_entry(Request $request){


        job::insert([
            'user_id' => Auth::guard('local')->user()->id,
            'Job_title' => $request->title,
            'Company_name' => $request->company,
            'Job_type' => $request->job_type,
            'workplace' =>$request->workplace,
            'description' => $request->desc,
        ]);
        return back();

    }
}
