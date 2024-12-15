@extends('frontend.profile_master')

@section('indicator')
<a class="" href="{{url('/profile')}}" title="" data-ripple="">time line</a>
<a class="" href="{{url('/photos')}}" title="" data-ripple="">Photos</a>
{{-- <a class="" href="{{url('/videos')}}" title="" data-ripple="">Videos</a> --}}
<a class="active" href="{{url('/friends')}}" title="" data-ripple="">Friends</a>
{{-- <a class="" href="{{url('/groups')}}" title="" data-ripple="">Groups</a>
<a class="" href="{{url('/about')}}" title="" data-ripple="">about</a>
<a class="" href="#" title="" data-ripple="">more</a> --}}
@endsection

@section('content')
<div class="central-meta">
    <div class="frnds">
        <ul class="nav nav-tabs">
                @php
                $count_frnd = 0;
                @endphp
                @foreach(App\Models\friend::all() as $friend)
                    @php
                     $id = explode("/",$friend->friendship_id);
                    @endphp
                @if($id[0] == Auth::guard('local')->user()->id || $id[1] == Auth::guard('local')->user()->id)
                    @php
                    $count_frnd +=1;
                    @endphp
                @endif
                @endforeach
                <li class="nav-item"><a class="active" href="#frends" data-toggle="tab">My Friends</a><span>{{$count_frnd}}</span></li>
                <li class="nav-item"><a class="" href="#frends-req" data-toggle="tab">Friend Requests</a><span>{{App\Models\friend_request::where('reciever_id',Auth::guard('local')->user()->id)->get()->count()}}</span></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active fade show " id="frends" >
                <ul class="nearby-contct">

                    @foreach(App\Models\friend::all() as $friend)
                     @php
                     $id = explode("/",$friend->friendship_id);
                     @endphp
                     @if($id[0] == Auth::guard('local')->user()->id)
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <img src="{{asset('uploads/users')}}/{{App\models\user_profile::where('user_id',$id[1])->first()->profile_pic}}" alt="">
                            </figure>
                            <div class="pepl-info">
                                <h4><a href="{{url('/')}}/{{$friend->friend2}}/{{$id[1]}}" title="">{{$friend->friend2}}</a></h4>
                                <span>ftv model</span>
                                <form action="{{url('/unfriend')}}" style="display:contents" method="POST">
                                    @csrf
                                    <input type="hidden" name="delete_id" value="{{$friend->id}}">
                                    <button type="submit" class="btn btn-primary" style="margin-left:10rem">unfriend</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    @elseif ($id[1] == Auth::guard('local')->user()->id)
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <img src="{{asset('uploads/users')}}/{{App\models\user_profile::where('user_id',$id[0])->first()->profile_pic}}" alt="">
                            </figure>
                            <div class="pepl-info">
                                <h4><a href="{{url('/')}}/{{$friend->friend1}}/{{$id[0]}}" title="">{{$friend->friend1}}</a></h4>
                                <span>ftv model</span>
                                <form action="{{url('/unfriend')}}" style="display:contents" method="POST">
                                    @csrf
                                    <input type="hidden" name="delete_id" value="{{$friend->id}}">
                                    <button type="submit" class="btn btn-primary" style="margin-left:10rem">unfriend</button>
                                </form>
                            </div>
                        </div>
                    </li>
                    @endif
                    @endforeach
                </ul>
                <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
            </div>


            <div class="tab-pane fade" id="frends-req" >
                <ul class="nearby-contct" id="test">
                    @foreach(App\Models\friend_request::where('reciever_id',Auth::guard('local')->user()->id)->get() as $req)
                    <li>
                        <div class="nearly-pepls">
                            <figure>
                                <a href="time-line.html" title=""><img src="{{asset('uploads/users')}}/{{App\Models\user_profile::where('user_id',$req->sender_id)->first()->profile_pic}}" alt=""></a>
                            </figure>
                            <div class="pepl-info">
                                <h4><a href="{{url('/')}}/{{$req->sender_name}}/{{$req->sender_id}}" title="">{{$req->sender_name}}</a></h4>
                                <button onclick="click2({{$req->id}})" title="" class="btn btn-danger ml-3">delete Request</button>
                                <button onclick="confirm({{$req->id}})" class="btn btn-primary ml-3">confirm</button>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                <button class="btn-view btn-load-more" title="Load More"></button>
            </div>
        </div>
    </div>
</div><!-- centerl meta -->


<script>
   function click2(value){

        var id = value;



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type:'GET',
            url:'/delete',
            data:{delete_id:id},
            success:function(data){
                $('#test').html(data);
            }
        })


    };
</script>

<script>
    function confirm(value){

         var id2 = value;


         $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });

         $.ajax({
             type:'GET',
             url:'/confirm',
             data:{id:id2},
             success:function(data){
                $('#test').html(data);
             }
         })


     };
 </script>
@endsection
