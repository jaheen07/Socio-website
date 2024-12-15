
@extends('frontend.master')

@section('content2')

	<section>
		<div class="gap gray-bg">
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="row" id="page-contents">
							<div class="col-lg-3">
								<aside class="sidebar static">
									{{-- <div class="widget">
										<h4 class="widget-title">Shortcuts</h4>
										<ul class="naves">
											<!-- <li>
												<i class="ti-clipboard"></i>
												<a href="newsfeed.html" title="">News feed</a>
											</li> -->
											<!-- <li>
												<i class="ti-mouse-alt"></i>
												<a href="inbox.html" title="">Inbox</a>
											</li> -->
											<li>
												<i class="ti-files"></i>
												<a href="fav-page.html" title="">My pages</a>
											</li>
											<li>
												<i class="ti-user"></i>
												<a href="{{url('/friends')}}" title="">friends</a>
											</li>
											<!-- <li>
												<i class="ti-image"></i>
												<a href="timeline-photos.html" title="">images</a>
											</li> -->
											<!-- <li>
												<i class="ti-video-camera"></i>
												<a href="timeline-videos.html" title="">videos</a>
											</li> -->
											<!-- <li>
												<i class="ti-comments-smiley"></i>
												<a href="messages.html" title="">Messages</a>
											</li> -->
											<!-- <li>
												<i class="ti-bell"></i>
												<a href="notifications.html" title="">Notifications</a>
											</li> -->
											<li>
												<i class="ti-share"></i>
												<a href="people-nearby.html" title="">People Nearby</a>
											</li>
											<li>
												<i class="fa fa-bar-chart-o"></i>
												<a href="insights.html" title="">insights</a>
											</li>
											<!-- <li>
												<i class="ti-power-off"></i>
												<a href="landing.html" title="">Logout</a>
											</li> -->
										</ul>
									</div>
									<div class="widget">
										<h4 class="widget-title">Recent Activity</h4>
										<ul class="activitiez">
											<li>
												<div class="activity-meta">
													<i>10 hours Ago</i>
													<span><a href="#" title="">Commented on Video posted </a></span>
													<h6>by <a href="time-line.html">black demon.</a></h6>
												</div>
											</li>
											<li>
												<div class="activity-meta">
													<i>30 Days Ago</i>
													<span><a href="#" title="">Posted your status. “Hello guys, how are you?”</a></span>
												</div>
											</li>
											<li>
												<div class="activity-meta">
													<i>2 Years Ago</i>
													<span><a href="#" title="">Share a video on her timeline.</a></span>
													<h6>"<a href="#">you are so funny mr.been.</a>"</h6>
												</div>
											</li>
										</ul>
									</div> --}}
									<div class="widget stick-widget">
										<h4 class="widget-title">Friend Requests</h4>
										<ul class="followers pe-0">
											@foreach(App\models\friend_request::where('reciever_id',Auth::guard('local')->user()->id)->get()->take(30) as $freq)

                                            <li>
												<figure><img src="{{asset('uploads/users')}}/{{App\Models\user_profile::where('user_id',$freq->sender_id)->first()->profile_pic}}" alt=""></figure>
												<div class="friend-meta mx-0">
													<h4><a href="{{url('/')}}/{{$freq->sender_name}}/{{$freq->sender_id}}" title="">{{$freq->sender_name}}</a></h4>
													{{-- <a href="#" class="btn btn-primary text-white">confirm</a> --}}
                                                    <button onclick="confirm({{$freq->id}})" class="btn btn-primary text-white ml-3">confirm</button>
                                                    <a href="#" class="btn btn-danger text-white">decline</a>
												</div>
											</li>
											@endforeach
										</ul>
									</div><!-- who's following -->
								</aside>
							</div><!-- sidebar -->
							<div class="col-lg-6">
								<div class="central-meta">
									<div class="new-postbox">
										<figure>
											<img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" width="50px" style="height:50px" alt="">
										</figure>
										<div class="newpst-input">
											<form action="{{url('/post')}}" method="POST" enctype="multipart/form-data">
												@csrf
												<textarea rows="2" name="caption" placeholder="write something..."></textarea>
												<div class="attachments">
													<ul>
														<li>
															<i class="fa fa-music"></i>
															<label class="fileContainer">
																<input type="file" name="music">
															</label>
														</li>
														<li>
															<i class="fa fa-image"></i>
															<label class="fileContainer">
																<input type="file" name="photo">
															</label>
														</li>
														<li>
															<i class="fa fa-video-camera"></i>
															<label class="fileContainer">
																<input type="file" name="video">
															</label>
														</li>
														<li>
															<i class="fa fa-camera"></i>
															<label class="fileContainer">
																<input type="file" name="cam">
															</label>
														</li>
														<li>
															<button type="submit">Post</button>
														</li>
													</ul>
												</div>
											</form>
										</div>
									</div>
								</div><!-- add post new box -->

                                @foreach(App\Models\post::inRandomOrder()->get() as $pst)
                                @if ($pst->shared_post_id == NULL)
                                    <div class="central-meta item">
										<div class="user-post">
											<div class="friend-info">
												<figure>
													<img src="{{asset('uploads/users')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->photo}}" alt="">
												</figure>
												<div class="friend-name">
													<ins><a href="{{url('/')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}/{{$pst->user_id}}" title="">{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}</a></ins>
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
																					<ins><a href="{{url('/')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}/{{$pst->user_id}}" title="">{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}</a></ins>
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
                                                    <ins><a href="{{url('/')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}/{{$pst->user_id}}" title="">{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}</a></ins>
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
                                                                <ins><a href="{{url('/')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}/{{$pst->user_id}}" title="">{{App\Models\user_account::where('id',$s_post->user_id)->first()->user_name}}</a></ins>
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
                                                                                            <ins><a href="{{url('/')}}/{{App\Models\user_account::where('id',$pst->user_id)->first()->user_name}}/{{$pst->user_id}}" title="">{{App\Models\user_account::where('id',$s_post->user_id)->first()->user_name}}</a></ins>
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
									{{-- <div class="widget">
										<h4 class="widget-title">Your page</h4>
										<div class="your-page">
											<figure>
												<a href="#" title=""><img src="images/resources/friend-avatar9.jpg" alt=""></a>
											</figure>
											<div class="page-meta">
												<a href="#" title="" class="underline">My page</a>
												<span><i class="ti-comment"></i><a href="insight.html" title="">Messages <em>9</em></a></span>
												<span><i class="ti-bell"></i><a href="insight.html" title="">Notifications <em>2</em></a></span>
											</div>
											<div class="page-likes">
												<ul class="nav nav-tabs likes-btn">
													<li class="nav-item"><a class="active" href="#link1" data-toggle="tab">likes</a></li>
													 <li class="nav-item"><a class="" href="#link2" data-toggle="tab">views</a></li>
												</ul>
												<!-- Tab panes -->
												<div class="tab-content">
												  <div class="tab-pane active fade show " id="link1" >
													<span><i class="ti-heart"></i>884</span>
													  <a href="#" title="weekly-likes">35 new likes this week</a>
													  <div class="users-thumb-list">
														<a href="#" title="Anderw" data-toggle="tooltip">
															<img src="images/resources/userlist-1.jpg" alt="">
														</a>
														<a href="#" title="frank" data-toggle="tooltip">
															<img src="images/resources/userlist-2.jpg" alt="">
														</a>
														<a href="#" title="Sara" data-toggle="tooltip">
															<img src="images/resources/userlist-3.jpg" alt="">
														</a>
														<a href="#" title="Amy" data-toggle="tooltip">
															<img src="images/resources/userlist-4.jpg" alt="">
														</a>
														<a href="#" title="Ema" data-toggle="tooltip">
															<img src="images/resources/userlist-5.jpg" alt="">
														</a>
														<a href="#" title="Sophie" data-toggle="tooltip">
															<img src="images/resources/userlist-6.jpg" alt="">
														</a>
														<a href="#" title="Maria" data-toggle="tooltip">
															<img src="images/resources/userlist-7.jpg" alt="">
														</a>
													  </div>
												  </div>
												  <div class="tab-pane fade" id="link2" >
													  <span><i class="ti-eye"></i>440</span>
													  <a href="#" title="weekly-likes">440 new views this week</a>
													  <div class="users-thumb-list">
														<a href="#" title="Anderw" data-toggle="tooltip">
															<img src="images/resources/userlist-1.jpg" alt="">
														</a>
														<a href="#" title="frank" data-toggle="tooltip">
															<img src="images/resources/userlist-2.jpg" alt="">
														</a>
														<a href="#" title="Sara" data-toggle="tooltip">
															<img src="images/resources/userlist-3.jpg" alt="">
														</a>
														<a href="#" title="Amy" data-toggle="tooltip">
															<img src="images/resources/userlist-4.jpg" alt="">
														</a>
														<a href="#" title="Ema" data-toggle="tooltip">
															<img src="images/resources/userlist-5.jpg" alt="">
														</a>
														<a href="#" title="Sophie" data-toggle="tooltip">
															<img src="images/resources/userlist-6.jpg" alt="">
														</a>
														<a href="#" title="Maria" data-toggle="tooltip">
															<img src="images/resources/userlist-7.jpg" alt="">
														</a>
													  </div>
												  </div>
												</div>
											</div>
										</div>
									</div><!-- page like widget --> --}}
									{{-- <div class="widget">
										<div class="banner medium-opacity bluesh">
											<div class="bg-image" style="background-image: url(images/resources/baner-widgetbg.jpg)"></div>
											<div class="baner-top">
												<span><img alt="" src="images/book-icon.png"></span>
												<i class="fa fa-ellipsis-h"></i>
											</div>
											<div class="banermeta">
												<p>
													create your own favourit page.
												</p>
												<span>like them all</span>
												<a data-ripple="" title="" href="#">start now!</a>
											</div>
										</div>
									</div> --}}
									<div class="widget friend-list stick-widget">
										<h4 class="widget-title">Active Friends</h4>
										<div id="searchDir"></div>
										<ul id="people-list" class="friendz-list">
                                            @foreach (App\Models\friend::inRandomOrder()->limit(100)->get() as $frnd)
                                                @php
                                                    $id = explode("/",$frnd->friendship_id);
                                                @endphp
                                                @if ($id[0] == Auth::guard('local')->user()->id)
                                                    <li>
                                                        <figure>
                                                            <img src="{{asset('uploads/users')}}/{{App\models\user_profile::where('user_id',$id[1])->first()->profile_pic}}" alt="">
                                                            @if(App\models\user_profile::where('user_id',$id[1])->first()->active_status == "on")
                                                            <span class="status f-online"></span>
                                                            @endif


                                                        </figure>
                                                        <div class="friendz-meta">
                                                            <a href="">{{$frnd->friend2}}</a>

                                                        </div>
                                                    </li>
                                                @elseif($id[1] == Auth::guard('local')->user()->id)
                                                    <li>
                                                        <figure>
                                                            <img src="{{asset('uploads/users')}}/{{App\models\user_profile::where('user_id',$id[0])->first()->profile_pic}}" alt="">
                                                            @if(App\models\user_profile::where('user_id',$id[0])->first()->active_status == "on")
                                                            <span class="status f-online"></span>
                                                            @endif
                                                        </figure>
                                                        <div class="friendz-meta">
                                                            <a href="#">{{$frnd->friend1}}</a>

                                                        </div>
                                                    </li>
                                                @endif
											@endforeach
										</ul>

									</div><!-- friends list sidebar -->
								</aside>
							</div><!-- sidebar -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
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

<div class="side-panel">
    <h4 class="panel-title">General Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>use night mode</span>
            <input type="checkbox" id="nightmode1"/>
            <label for="nightmode1" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notifications</span>
            <input type="checkbox" id="switch22" />
            <label for="switch22" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Notification sound</span>
            <input type="checkbox" id="switch33" />
            <label for="switch33" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>My profile</span>
            <input type="checkbox" id="switch44" />
            <label for="switch44" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show profile</span>
            <input type="checkbox" id="switch55" />
            <label for="switch55" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
    <h4 class="panel-title">Account Setting</h4>
    <form method="post">
        <div class="setting-row">
            <span>Sub users</span>
            <input type="checkbox" id="switch66" />
            <label for="switch66" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>personal account</span>
            <input type="checkbox" id="switch77" />
            <label for="switch77" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Business account</span>
            <input type="checkbox" id="switch88" />
            <label for="switch88" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Show me online</span>
            <input type="checkbox" id="switch99" />
            <label for="switch99" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Delete history</span>
            <input type="checkbox" id="switch101" />
            <label for="switch101" data-on-label="ON" data-off-label="OFF"></label>
        </div>
        <div class="setting-row">
            <span>Expose author name</span>
            <input type="checkbox" id="switch111" />
            <label for="switch111" data-on-label="ON" data-off-label="OFF"></label>
        </div>
    </form>
</div><!-- side panel -->



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
