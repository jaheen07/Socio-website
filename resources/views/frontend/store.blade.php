<div class="central-meta item">
    <div class="friend-info mb-5">
        <figure>
        <img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" style="height:3rem" alt="">
        </figure>
        <div class="friend-name">
            <ins><a href="time-line.html" title="">{{Auth::guard('local')->user()->user_name}}</a></ins>
        </div>
    </div>

    <div class="user-post">
        <div class="friend-info">
            <figure>
                <img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" style="height:3rem" alt="">
            </figure>
            <div class="friend-name">
                <ins><a href="time-line.html" title="">{{Auth::guard('local')->user()->user_name}}</a></ins>
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
                                <div class="btn trigger"><i class="fa fa-share-alt"></i></div>
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
                                </div> --}}
                                </div>

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