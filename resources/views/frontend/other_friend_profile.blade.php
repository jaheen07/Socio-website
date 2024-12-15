@extends('frontend.master')

@section('content2')
<section>
	<div class="feature-photo">

		<figure>
			@if($profile->first()->cover_pic == '')
			<img src="{{asset('frontend_assets/images/resources/cvr.jpg')}}" alt="">
			@else
			<img src="{{asset('uploads/coverphotos')}}/{{$profile->first()->cover_pic}}"
			alt="none" style="height:25rem;">
			@endif
		</figure>

			@if(App\Models\friend_request::where('reciever_id',Auth::guard('local')->user()->id)->where('sender_id',$profile->first()->id)->exists())
                <form action="{{url('/request_confirm')}}" method="POST">
                    @csrf
                    <input type="text" hidden name="user_id" value="{{Auth::guard('local')->user()->id}}">
                    <input type="text" hidden name="user_name" value="{{Auth::guard('local')->user()->user_name}}">
                    <input type="text" hidden name="friend_id" value="{{$profile->first()->id}}">
                    <input type="text" hidden name="friend_name" value="{{$profile->first()->user_name}}">
                    <button class="add-btn btn" type="submit">Confirm Request</button>
                </form>
            @elseif (App\Models\friend_request::where('sender_id',Auth::guard('local')->user()->id)->where('reciever_id',$profile->first()->user_id)->exists())
                <form action="{{url('/cancel_friend_request')}}" method="POST">
                    @csrf
                    <input type="text" hidden name="req_id" value="{{App\Models\friend_request::where('sender_id',Auth::guard('local')->user()->id)->where('reciever_id',$profile->first()->user_id)->first()->id}}">
                    <button class="add-btn btn" type="submit">Cancel friend request</button>
                </form>

			@elseif (App\Models\friend::where('friendship_id',$profile->first()->id.'/'.Auth::guard('local')->user()->id)->exists())
            <button class="add-btn btn" type="submit">friends</button>
            @elseif (App\Models\friend::where('friendship_id',$id)->exists())
            <button class="add-btn btn" type="submit">friends</button>
            @else
                <form action="{{url('/friend_request')}}" method="POST">
                    @csrf
                    <input type="text" hidden name="sender_id" value="{{Auth::guard('local')->user()->id}}">
                    <input type="text" hidden name="sender_name" value="{{Auth::guard('local')->user()->user_name}}">
                    <input type="text" hidden name="reciever_id" value="{{$profile->first()->user_id}}">
                    <input type="text" hidden name="reciever_name" value="{{$profile->first()->user_name}}">
                    <button class="add-btn btn" type="submit">Add friend</button>
                </form>
			@endif

		{{-- <form class="edit-phto" action="{{url('/edit/cvr')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<i class="fa fa-camera-retro"></i>
			<label class="fileContainer">
				Edit Cover Photo
			<input type="file" name="cvr_pic"/>
			</label>
			<button type="submit">submit</button>
		</form> --}}
		<div class="container-fluid">
			<div class="row merged">
				<div class="col-lg-2 col-sm-3">
					<div class="user-avatar" style = "width:max-content">
						<figure>
							<img src="{{asset('uploads/users')}}/{{$profile->first()->profile_pic}}" style="height:9rem" alt="">
							{{-- <form class="edit-phto" action="{{url('/edit/pro')}}" method="POST" enctype="multipart/form-data">
								@csrf
								<i class="fa fa-camera-retro"></i>
								<label class="fileContainer">
									Edit Display Photo
									<input type="file" name="profile_pic"/>
								</label>
								<button type="submit">submit</button>
							</form> --}}
						</figure>
					</div>
				</div>
				<div class="col-lg-10 col-sm-9">
					<div class="timeline-info">
						<ul>
							<li class="admin-name">
								<h5>{{$profile->first()->user_name}}</h5>
							</li>
                            @if(App\Models\friend::where('friendship_id',$profile->first()->id.'/'.Auth::guard('local')->user()->id)->exists() || App\Models\friend::where('friendship_id',Auth::guard('local')->user()->id.'/'.$profile->first()->id)->exists())
							<li>
								<a class="active" href="{{url('/profile')}}" title="" data-ripple="">time line</a>
                                <a class="" href="{{url('/photos')}}" title="" data-ripple="">Photos</a>
                                <a class="" href="{{url('/videos')}}" title="" data-ripple="">Videos</a>
                                <a class="" href="{{url('/friends')}}" title="" data-ripple="">Friends</a>
                                <a class="" href="{{url('/groups')}}" title="" data-ripple="">Groups</a>
                                <a class="" href="{{url('/about')}}" title="" data-ripple="">about</a>
                                <a class="" href="#" title="" data-ripple="">more</a>
							</li>
                            @endif
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section><!-- top area -->

<section>
	<div class="gap gray-bg">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="row" id="page-contents">
						<div class="col-lg-5">
							<aside class="sidebar static">
								<div class="widget">
										<h4 class="widget-title">Info</h4>
										<ul class="socials">

											<li>
                                                @foreach (App\Models\user_profile::where('user_id',$profile->first()->id)->get() as $bio)
                                                <h6 class="mx-auto">{{$bio->bio}}</h6>
                                                @if($bio->lives_at !=NULL)
                                                <p>
													<i class="ti-home"></i>Lives in <span class="ml-3"><b>{{$bio->lives_at}}</b></span>
												</p>
                                                @endif
                                                @if($bio->works_at != NULL)
                                                @php
                                                    $work = explode('/',$bio->works_at);
                                                @endphp
												<p>
													<i class="ti-user"></i>{{$work[2]}} as <span class="ml-1">{{$work[1]}}</span> at <span class="ml-2"><b>{{$work[0]}}</b></span>
												</p>
                                                @endif
                                                @if($bio->study != NULL)
												<p>
													<i class="fa-solid fa-graduation-cap"></i>{{$bio->study}} at <span class="ml-3"><b>{{$bio->edu_institute}}</b></span>
												</p>
                                                @endif
                                                @if($bio->DoB != NULL)
                                                <p>
													<i class="fa-solid fa-cake-candles"></i>Birthday <span class="ml-3"><b>{{ date('F d, Y', strtotime($bio->DoB)) }}</b></span>
												</p>
                                                @endif
												<p>
													<i class="fa-solid fa-clock"></i>Joined at <span class="ml-3"><b>{{$bio->created_at->format('j F, Y')}}</b></span>
												</p>
                                                @endforeach

											</li>

										</ul>
									</div>
									<div class="central-meta">
                                        <h4 class="widget-title">Friends</h4>
                                        <ul class="photos2">

                                            @foreach(App\Models\friend::all() as $frnd)
                                            @php
                                                $id = explode('/',$frnd->friendship_id);
                                            @endphp
                                            @if($id[0] == $profile->first()->id)

                                            <li>
                                                <img src="{{asset('uploads/users')}}/{{App\Models\user_profile::where('user_id',$id[1])->first()->profile_pic}}" width="70%" alt="">

                                                <div class="friend-name2">
                                                <a href="#" class="text-white m-0 px-1">{{App\Models\user_profile::where('user_id',$id[1])->first()->user_name}}</a>
                                                </div>
                                            </li>
                                            @elseif($id[1] == $profile->first()->id)

                                                <li>
                                                    <img src="{{asset('uploads/users')}}/{{App\Models\user_profile::where('user_id',$id[0])->first()->profile_pic}}" width="70%" alt="">

                                                    <div class="friend-name2">
                                                    <a href="#" class="text-white m-0 px-1">{{App\Models\user_profile::where('user_id',$id[0])->first()->user_name}}</a>
                                                    </div>
                                                </li>
                                            @endif
                                            @endforeach

                                        </ul>
									{{-- <div class="lodmore"><button class="btn-view btn-load-more"></button></div> --}}
								</div><!-- photos -->

								<div class="central-meta">
									<h4 class="widget-title">Photos</h4>
									<ul class="photos">

                                        @foreach (App\Models\post::where('user_id',$profile->first()->id)->inRandomOrder()->get()->take(6) as $pht)
                                        @if($pht->photo == NULL)
                                        @else
                                        <li>
											<a class="strip" href="{{asset('uploads/post_photo')}}/{{$pht->photo}}" title="" data-strip-group="mygroup" data-strip-group-options="loop: false">
												<img src="{{asset('uploads/post_photo')}}/{{$pht->photo}}" alt=""></a>
										</li>
                                        @endif
										@endforeach

									</ul>

								</div><!-- photos -->
							</aside>
						</div><!-- sidebar -->
						<div class="col-lg-6">

								<div class="central-meta item">
									<div class="new-postbox">
										<figure>
											<img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" style="height:4rem;"alt="">
										</figure>
										<div class="newpst-input">
											<form action="{{url('/post')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<textarea rows="2" name="caption" placeholder="write something"></textarea>

												<div class="attachments">
													<ul>
														<li>
															<i class="fa fa-music"></i>
															<label class="fileContainer">
																<input type="file">
															</label>
														</li>
														<li>
															<i class="fa fa-image"></i>
															<label class="fileContainer">
																<input type="file">
															</label>
														</li>
														<li>
															<i class="fa fa-video-camera"></i>
															<label class="fileContainer">
																<input type="file">
															</label>
														</li>
														<li>
															<i class="fa fa-camera"></i>
															<label class="fileContainer">
																<input type="file">
															</label>
														</li>
														<li>
															<button type="submit">Publish</button>
														</li>
													</ul>
												</div>
											</form>
										</div>
									</div>
								</div>

								@foreach(App\Models\post::where('user_id',$profile->first()->user_id)->latest()->get() as $pst)
								@if ($pst->shared_post_id == NULL)
                                    <div class="central-meta item">
										<div class="user-post">
											<div class="friend-info">
												<figure>
													<img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->photo}}" alt="">
												</figure>
												<div class="friend-name">
													<ins><a href="time-line.html" title="">{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}</a></ins>
													<span>published: {{$pst->created_at->format('F j , Y')}}</span>
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
																	<ins>{{App\Models\comment::where('post_id',$pst->id)->count()}}</ins>
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
																		<img src="{{asset('uploads/users')}}/{{Auth::guard("local")->user()->photo}}" alt="">
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
                                                    <span>published: {{$pst->created_at->format('F J, Y')}}</span>
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
                                                                <span>published: {{$s_post->created_at->format('F J, Y')}}</span>
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
                                                                                <img src="{{asset('uploads/users')}}/{{Auth::guard("local")->user()->photo}}" alt="">
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
                                                                    <ins>{{App\Models\comment::where('post_id',$pst->id)->count()}}</ins>
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

						</div><!-- centerl meta -->
						<div class="col-lg-3">
							<aside class="sidebar static">
								<div class="widget friend-list stick-widget">
									<div class="chat-box">
										<div class="chat-head">
											<span class="status f-online"></span>
											<h6>Bucky Barnes</h6>
											<div class="more">
												<span><i class="ti-more-alt"></i></span>
												<span class="close-mesage"><i class="ti-close"></i></span>
											</div>
										</div>
										<div class="chat-list">
											<ul>
												<li class="me">
													<div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
													<div class="notification-event">
														<span class="chat-message-item">
															Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
														</span>
														<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
													</div>
												</li>
												<li class="you">
													<div class="chat-thumb"><img src="images/resources/chatlist2.jpg" alt=""></div>
													<div class="notification-event">
														<span class="chat-message-item">
															Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
														</span>
														<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
													</div>
												</li>
												<li class="me">
													<div class="chat-thumb"><img src="images/resources/chatlist1.jpg" alt=""></div>
													<div class="notification-event">
														<span class="chat-message-item">
															Hi James! Please remember to buy the food for tomorrow! I’m gonna be handling the gifts and Jake’s gonna get the drinks
														</span>
														<span class="notification-date"><time datetime="2004-07-24T18:18" class="entry-date updated">Yesterday at 8:10pm</time></span>
													</div>
												</li>
											</ul>
											<form class="text-box">
												<textarea placeholder="Post enter to post..."></textarea>
												<div class="add-smiles">
													<span title="add icon" class="em em-expressionless"></span>
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
												</div>
												<button type="submit"></button>
											</form>
										</div>
									</div>
								</div>
							</aside>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


</div>


@endsection
<script>
    $('.heart').click(function(){
        alert('hi');
    });
</script>
