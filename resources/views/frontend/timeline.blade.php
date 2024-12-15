@extends('frontend.profile_master')

@section('indicator')
<a class="active" href="{{url('/profile')}}" title="" data-ripple="">time line</a>
<a class="" href="{{url('/photos')}}" title="" data-ripple="">Photos</a>
{{-- <a class="" href="{{url('/videos')}}" title="" data-ripple="">Videos</a> --}}
<a class="" href="{{url('/friends')}}" title="" data-ripple="">Friends</a>
{{-- <a class="" href="{{url('/groups')}}" title="" data-ripple="">Groups</a>
<a class="" href="{{url('/about')}}" title="" data-ripple="">about</a>
<a class="" href="#" title="" data-ripple="">more</a> --}}
@endsection

@section('content')


@foreach(App\Models\post::where('user_id',Auth::guard('local')->user()->id)->latest()->get() as $pst)
    @if ($pst->shared_post_id == NULL)
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->photo}}" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="time-line.html" title="">{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}</a></ins>
                        <span>published: {{$pst->created_at}}</span>
                    </div>
                    <div class="description">
                        {{$pst->caption}}

                    </div>
                    <div class="post-meta">
                        @if($pst->photo != NULL)
                        <img src="{{asset('uploads/post_photo')}}/{{$pst->photo}}" alt="">
                        @endif
                        <div class="we-video-info">
                            <ul>
                                {{-- <li>
                                    <span class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </span>
                                </li> --}}
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>{{App\Models\comment::where('id',$pst->id)->count()}}</ins>
                                    </span>
                                </li>
                                <li class="like2" value="{{$pst->id}}">
                                    <span class="like" data-toggle="tooltip" title="like">
                                        @if (App\Models\reacts::where('post_id',$pst->id)->where('user_id',Auth::guard('local')->user()->id)->exists())
                                            <i class="fa-solid fa-heart" id="react{{$pst->id}}"></i>
                                        @else
                                            <i class="ti-heart" id="react{{$pst->id}}"></i>
                                        @endif

                                        <span id="count{{$pst->id}}">{{$pst->reacts}}</span>
                                    </span>
                                </li>



                                <li class="social-media">
                                    <div class="menu">
                                        <div class="btn trigger" data-bs-toggle="modal" data-bs-target="#post{{$pst->id}}"><i class="fa fa-share-alt"></i></div>
                                        {{-- <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                        </div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                        </div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                        </div>
                                        </div> --}}


                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>
                    <div class="modal fade" id="post{{$pst->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">share on your feed</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="{{url('/share_post')}}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{$pst->id}}">
                                <input type="hidden" name="user_id" value="{{Auth::guard('local')->user()->id}}">
                                <div class="modal-body">
                                    <div class="friend-info">
                                        <figure>
                                            <img src="{{asset('uploads/users')}}/{{Auth::guard("local")->user()->photo}}" alt="" width="40%" height="50%">
                                        </figure>
                                        <div class="friend-name">
                                            <ins><a href="time-line.html" title="">{{Auth::guard('local')->user()->user_name}}</a></ins>
                                        </div>
                                        <textarea class="form-control" name="caption" style="border:none" placeholder="write something..."></textarea>

                                        <div class="mt-3 p-2" style="border:1px solid black">

                                            <div class="user-post">
                                                <div class="friend-info">
                                                    <figure>
                                                        <img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->photo}}" alt="">
                                                    </figure>
                                                    <div class="friend-name">
                                                        <ins><a href="time-line.html" title="">{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}</a></ins>
                                                        <span>published: {{$pst->created_at}}</span>
                                                    </div>
                                                    <div class="description">
                                                        {{$pst->caption}}

                                                    </div>
                                                    <div class="post-meta">
                                                        @if($pst->photo != NULL)
                                                        <img src="{{asset('uploads/post_photo')}}/{{$pst->photo}}" alt="">
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Share Now</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="coment-area">
                    <ul class="we-comet">
                        @foreach (App\Models\comment::where('post_id',$pst->id)->get()->take(2) as $cmnt)
                        <li>
                                <div class="comet-avatar">
                                    <img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$cmnt->commentor_id)->first()->photo}}" alt="" width="80%">
                                </div>
                                <div class="we-comment">
                                    <div class="coment-head">
                                        <h5><a href="time-line.html" title="">{{App\Models\user_account::where('id',$cmnt->commentor_id)->first()->user_name}}</a></h5>
                                        <span>{{Carbon\Carbon::parse($cmnt->created_at)->diffForHumans()}}</span>
                                        <button class="we-reply jreply" title="Reply" value="{{$cmnt->id}}"><i class="fa fa-reply"></i></button>
                                    </div>
                                    <p>{{$cmnt->comments}}</p>
                                </div>
                                <ul>
                                    @foreach(App\Models\reply::where('post_id',$pst->id)->get() as $rply)
                                    @if($cmnt->id == $rply->replied_comment_id)
                                    <li>
                                        <div class="comet-avatar">
                                            <img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$rply->replier_id)->first()->photo}}" alt="" width="80%">
                                        </div>
                                        <div class="we-comment">
                                            <div class="coment-head">
                                                <h5><a href="#" title="">{{App\Models\user_account::where('id',$rply->replier_id)->first()->user_name}}</a></h5>
                                                <span>{{Carbon\Carbon::parse($rply->created_at)->diffForHumans()}}</span>
                                                <button class="we-reply jreply" title="Reply" value="{{$cmnt->id}}"><i class="fa fa-reply"></i></button>
                                            </div>
                                            <p>{{$rply->reply}}</p>
                                        </div>
                                    </li>
                                    @endif
                                    @endforeach
                                    <li class="post-comment" id="replybox{{$cmnt->id}}" hidden>

                                        <div class="comet-avatar">
                                            <img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" alt="">
                                        </div>

                                        <div class="post-comt-box">
                                            <form action="{{url('/reply_entry')}}" method="POST">
                                                @csrf
                                                <textarea  name="reply" placeholder="Post your reply"></textarea>
                                                <input type="hidden" name="post_id" value="{{$pst->id}}">
                                                <input type="hidden" name="replier_id" class="user_id"  value="{{Auth::guard('local')->user()->id}}">
                                                <input type="hidden" name="comment_id" value="{{$cmnt->id}}">
                                                <button type="submit" class="text-dark mb-2"><i class="ti-back-right"></i></button>
                                            </form>
                                        </div>
                                    </li>

                                </ul>
                            </li>
                        @endforeach


                        <li>
                            <a href="#" title="" class="loadmore">more comments</a>
                        </li>

                        <li class="post-comment">

                            <div class="comet-avatar">
                                <img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" alt="">
                            </div>

                            <div class="post-comt-box">
                                <form action="{{url('/comment_entry')}}" method="POST">
                                    @csrf
                                    <textarea placeholder="Post your comment" name="comment"></textarea>
                                    <input type="hidden" name="post_id" value="{{$pst->id}}">
                                    <input type="hidden" class="user_id" name="commentor_id" value="{{Auth::guard('local')->user()->id}}">
                                    {{--<div class="add-smiles">
                                                    <span class="em em-expressionless" title="add icon"></span>
                                                </div>
                                    <div class="smiles-bunch">
                                        <i class="em em---1"></i>
                                        <i class="em em-smiley"></i>
                                        <i class="em em-anguished"></i>
                                        <i class="em em-laughing"></i>
                                        <i class="em em-angry"></i>
                                        <i class="em em-astonished"></i>
                                        <i class="em em-blush"></i>
                                        <i class="em em-disappointed"></i>
                                        <i class="em em-worried"></i>
                                        <i class="em em-kissing_heart"></i>
                                        <i class="em em-rage"></i>
                                        <i class="em em-stuck_out_tongue"></i>
                                    </div> --}}

                                    <button type="submit" class="text-dark mb-2"><i class="ti-back-right"></i></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @else
        <div class="central-meta item">
            <div class="user-post">
                <div class="friend-info">
                    <figure>
                        <img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->photo}}" alt="">
                    </figure>
                    <div class="friend-name">
                        <ins><a href="time-line.html" title="">{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}</a></ins>
                        <span>published: {{$pst->created_at}}</span>
                    </div>
                    <div class="description">
                        {{$pst->caption}}
                    </div>
                    @foreach(App\Models\post::where('id',$pst->shared_post_id)->get() as $s_post)
                    <div class="mt-5 p-2" style="border:1px solid rgb(70, 69, 69)">
                        <div class="user-post">
                            <div class="friend-info">
                                <figure>
                                    <img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$s_post->user_id)->first()->photo}}" alt="">
                                </figure>
                                <div class="friend-name">
                                    <ins><a href="time-line.html" title="">{{App\Models\user_account::where('id',$s_post->user_id)->first()->user_name}}</a></ins>
                                    <span>published: {{$s_post->created_at}}</span>
                                </div>
                                <div class="description">
                                    {{$s_post->caption}}

                                </div>
                                <div class="post-meta">
                                    @if($s_post->photo != NULL)
                                    <img src="{{asset('uploads/post_photo')}}/{{$s_post->photo}}" alt="">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="post{{$pst->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">share on your feed</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{url('/share_post')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="post_id" value="{{$s_post->id}}">
                                        <input type="hidden" name="user_id" value="{{Auth::guard('local')->user()->id}}">
                                        <div class="modal-body">
                                            <div class="friend-info">
                                                <figure>
                                                    <img src="{{asset('uploads/users')}}/{{Auth::guard("local")->user()->photo}}" alt="" width="40%" height="50%">
                                                </figure>
                                                <div class="friend-name">
                                                    <ins><a href="time-line.html" title="">{{Auth::guard('local')->user()->user_name}}</a></ins>
                                                </div>
                                                <textarea class="form-control" name="caption" style="border:none" placeholder="write something..."></textarea>

                                                <div class="mt-3 p-2" style="border:1px solid black">

                                                    <div class="user-post">
                                                        <div class="friend-info">
                                                            <figure>
                                                                <img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$s_post->user_id)->first()->photo}}" alt="">
                                                            </figure>
                                                            <div class="friend-name">
                                                                <ins><a href="time-line.html" title="">{{App\Models\user_account::where('id',$s_post->user_id)->first()->user_name}}</a></ins>
                                                                <span>published: {{$s_post->created_at}}</span>
                                                            </div>
                                                            <div class="description">
                                                                {{$s_post->caption}}

                                                            </div>
                                                            <div class="post-meta">
                                                                @if($s_post->photo != NULL)
                                                                <img src="{{asset('uploads/post_photo')}}/{{$s_post->photo}}" alt="">
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Share Now</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="post-meta">

                        <div class="we-video-info">
                            <ul>
                                {{-- <li>
                                    <span class="views" data-toggle="tooltip" title="views">
                                        <i class="fa fa-eye"></i>
                                        <ins>1.2k</ins>
                                    </span>
                                </li> --}}
                                <li>
                                    <span class="comment" data-toggle="tooltip" title="Comments">
                                        <i class="fa fa-comments-o"></i>
                                        <ins>{{App\Models\comment::where('id',$pst->id)->count()}}</ins>
                                    </span>
                                </li>
                                <li class="like2" value="{{$pst->id}}">
                                    <span class="like" data-toggle="tooltip" title="like">
                                        @if (App\Models\reacts::where('post_id',$pst->id)->where('user_id',Auth::guard('local')->user()->id)->exists())
                                            <i class="fa-solid fa-heart" id="react{{$pst->id}}"></i>
                                        @else
                                            <i class="ti-heart" id="react{{$pst->id}}"></i>
                                        @endif

                                        <span id="count{{$pst->id}}">{{$pst->reacts}}</span>
                                    </span>
                                </li>



                                <li class="social-media">
                                    <div class="menu">
                                        <div class="btn trigger" data-bs-toggle="modal" data-bs-target="#post{{$pst->id}}"><i class="fa fa-share-alt"></i></div>
                                        {{-- <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-html5"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-facebook"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-google-plus"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-twitter"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-css3"></i></a></div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-instagram"></i></a>
                                        </div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-dribbble"></i></a>
                                        </div>
                                        </div>
                                        <div class="rotater">
                                        <div class="btn btn-icon"><a href="#" title=""><i class="fa fa-pinterest"></i></a>
                                        </div>
                                        </div> --}}


                                    </div>
                                </li>

                            </ul>
                        </div>

                    </div>

                </div>
                <div class="coment-area">
                    <ul class="we-comet">
                        @foreach (App\Models\comment::where('post_id',$pst->id)->get() as $cmnt)
                            <li>
                            <div class="comet-avatar">
                                <img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$cmnt->commentor_id)->first()->photo}}" alt="" width="80%">
                            </div>
                            <div class="we-comment">
                                <div class="coment-head">
                                    <h5><a href="time-line.html" title="">{{App\Models\user_account::where('id',$cmnt->commentor_id)->first()->user_name}}</a></h5>
                                    <span>{{$cmnt->created_at}}</span>
                                    <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                </div>
                                    <p>{{$cmnt->comments}}</p>
                            </div>
                            <ul>
                                <li>
                                    <div class="comet-avatar">
                                        <img src="images/resources/comet-2.jpg" alt="">
                                    </div>
                                    <div class="we-comment">
                                        <div class="coment-head">
                                            <h5><a href="time-line.html" title="">alexendra dadrio</a></h5>
                                            <span>1 month ago</span>
                                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                        </div>
                                        <p>yes, really very awesome car i see the features of this car in the official website of <a href="#" title="">#Mercedes-Benz</a> and really impressed :-)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="comet-avatar">
                                        <img src="images/resources/comet-3.jpg" alt="">
                                    </div>
                                    <div class="we-comment">
                                        <div class="coment-head">
                                            <h5><a href="time-line.html" title="">Olivia</a></h5>
                                            <span>16 days ago</span>
                                            <a class="we-reply" href="#" title="Reply"><i class="fa fa-reply"></i></a>
                                        </div>
                                        <p>i like lexus cars, lexus cars are most beautiful with the awesome features, but this car is really outstanding than lexus</p>
                                    </div>
                                </li>
                            </ul>
                            </li>
                        @endforeach


                        <li>
                            <a href="#" title="" class="loadmore">more comments</a>
                        </li>
                        <li class="post-comment">

                            <div class="comet-avatar">
                                <img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" alt="">
                            </div>

                            <div class="post-comt-box">
                                <form action="{{url('/comment_entry')}}" method="POST">
                                    @csrf
                                    <textarea placeholder="Post your comment" name="comment"></textarea>
                                    <input type="hidden" name="post_id" value="{{$pst->id}}">
                                    <input type="hidden" class="user_id" name="commentor_id" value="{{Auth::guard('local')->user()->id}}">
                                    {{--<div class="add-smiles">
                                                    <span class="em em-expressionless" title="add icon"></span>
                                                </div>
                                    <div class="smiles-bunch">
                                        <i class="em em---1"></i>
                                        <i class="em em-smiley"></i>
                                        <i class="em em-anguished"></i>
                                        <i class="em em-laughing"></i>
                                        <i class="em em-angry"></i>
                                        <i class="em em-astonished"></i>
                                        <i class="em em-blush"></i>
                                        <i class="em em-disappointed"></i>
                                        <i class="em em-worried"></i>
                                        <i class="em em-kissing_heart"></i>
                                        <i class="em em-rage"></i>
                                        <i class="em em-stuck_out_tongue"></i>
                                    </div> --}}

                                    <button type="submit" class="text-dark mb-2"><i class="ti-back-right"></i></button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    @endif
@endforeach

@endsection


@section('footer')

<script>
    $('.like2').click(function(){
        var post = $(this).val();
		var user = $('.user_id').val();
        var cnt = '#count' + post;
        var count = parseInt($(cnt).text());



        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $.ajax({
            type:'POST',
            url:'/reacted',
            data:{user_id:user,post_id:post},
            success:function(data){
                if(data == 1){
                  var react = "#react" + post;
                  $(react).removeClass("ti-heart").addClass("fa-solid fa-heart");
                  $(cnt).html(count+1);
                }
                else if(data == 0){
                    var react = "#react" + post;
                  $(react).removeClass("fa-solid fa-heart").addClass("ti-heart");
                  $(cnt).html(count-1);
                }



            }
        })
    });
</script>

<script>
    $('.jreply').click(function(){
        var id = $(this).val();
        var replybox = "#replybox" + id;

        // alert(replybox);
        var check = $(replybox).attr('hidden');



        if(check!== undefined){
            $(replybox).removeAttr('hidden');
        }
        else{
            $(replybox).attr('hidden','hidden');
        }
    })
</script>

@endsection
