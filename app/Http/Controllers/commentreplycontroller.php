<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\carbon;
use App\Models\comment;
use App\Models\reply;

class commentreplycontroller extends Controller
{
    public function comment_entry(Request $req){
        comment::insert([
            'post_id' => $req->post_id,
            'commentor_id' => $req->commentor_id,
            'comments' => $req->comment,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }

    public function reply_entry(Request $req){

        // print_r($req->all());
        reply::insert([
            'post_id' => $req->post_id,
            'replier_id' => $req->replier_id,
            'replied_comment_id' => $req->comment_id,
            'reply' => $req->reply,
            'created_at' => Carbon::now(),
        ]);

        return back();
    }
}
