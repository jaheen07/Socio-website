@extends('frontend.master')

@section('content2')

<div class="fixed-sidebar right">
	<div class="chat-friendz">
		<ul class="chat-users">
			@foreach(App\models\friend::all() as $frnd)
			@php
				$id = explode('/',$frnd->friendship_id);
			@endphp
			@if($id[0] == Auth::guard('local')->user()->id)
			<li>
				<div class="author-thmb">
					<img src="{{asset('uploads/users')}}/{{App\Models\user_profile::where('user_id',$id[1])->first()->profile_pic}}" width="60%" alt="">
					<span class="status f-online"></span>
				</div>
			</li>
			@elseif($id[1] == Auth::guard('local')->user()->id)
			<li>
				<div class="author-thmb">
					<img src="{{asset('uploads/users')}}/{{App\Models\user_profile::where('user_id',$id[0])->first()->profile_pic}}" width="60%" alt="">
					<span class="status f-online"></span>
				</div>
			</li>
			@endif

			@endforeach
		</ul>
		<div class="chat-box">
			<div class="chat-head">
				<span class="status f-online"></span>
				<h6>Bucky Barnes</h6>
				<div class="more">
					<span class="more-optns"><i class="ti-more-alt"></i>
						<ul>
							<li>block chat</li>
							<li>unblock chat</li>
							<li>conversation</li>
						</ul>
					</span>
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
</div>
<section>
	<div class="feature-photo">
		<figure>
		@if(App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->first()->cover_pic == '')
		<div id="image1">
            <img src="{{asset('frontend_assets/images/resources/cvr.jpg')}}" alt="">
        </div>
		@else
        <div id="image1">
            <img src="{{asset('uploads/coverphotos')}}/{{App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->first()->cover_pic}}"
			alt="none" style="height:25rem; object-fit:cover;object-position: top">
        </div>

		@endif
		</figure>
		<div class="add-btn">
			{{-- <span>1205 followers</span> --}}
			<!-- <a href="#" title="" data-ripple="">Add Friend</a> -->
		</div>

		<form class="edit-phto" action="{{url('/edit/cvr')}}" method="POST" enctype="multipart/form-data">
			@csrf
			<i class="fa fa-camera-retro"></i>
			<label class="fileContainer">
				Edit Cover Photo
			<input type="file" name="cvr_pic" id="cover_pic"/>
			</label>
            <div id="confirm_cvr_pic">

            </div>

		</form>
		<div class="container-fluid">
			<div class="row merged">
				<div class="col-lg-2 col-sm-3">
					<div class="user-avatar" style = "width:fit-content">
						<figure>
                            <div id="pro_image1" >
                                <img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" style="height:9rem;width:10rem" alt="">
                            </div>
							<form class="edit-phto" action="{{url('/edit/pro')}}" method="POST" enctype="multipart/form-data">
								@csrf
								<i class="fa fa-camera-retro"></i>
								<label class="fileContainer">
									Edit Display Photo
									<input type="file" name="profile_pic" id="pro_pic"/>
								</label>
                                <div id="confirm_pro_pic">

                                </div>

							</form>
						</figure>
					</div>
				</div>
				<div class="col-lg-10 col-sm-9">
					<div class="timeline-info">
						<ul>
							<li class="admin-name">
								<h5>{{App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->first()->user_name}}</h5>
							</li>
							<li>
								@yield('indicator')
							</li>
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
						<div class="col-lg-5 jaheen stick-widget">
							<aside class="sidebar static ">
								<div class="widget ">
										<h4 class="widget-title">Info</h4>
										<ul class="socials">
											<li class="btn btn-primary">
												<a title="" href="{{url('/settings')}}"> <span>Edit Bio</span> </a>
											</li>
											<li>
                                                @foreach (App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->get() as $bio)
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
                                                <p>
													<i class="fa-solid fa-cake-candles"></i>Birthday <span class="ml-3"><b>{{ date('F d, Y', strtotime($bio->DoB)) }}</b></span>
												</p>
												<p>
													<i class="fa-solid fa-clock"></i>Joined at <span class="ml-3"><b>{{$bio->created_at->format('j F, Y')}}</b></span>
												</p>
                                                @endforeach

											</li>

										</ul>
									</div>

								<div class="widget">
									<div class="central-meta">
                                        <h4 class="widget-title">Friends</h4>
                                        <ul class="photos2">
											@foreach(App\Models\friend::all() as $frnd)
                                            @php
                                                $id = explode('/',$frnd->friendship_id);
                                            @endphp
                                            @if($id[0] == Auth::guard('local')->user()->id)

                                            <li>
                                                <img src="{{asset('uploads/users')}}/{{App\Models\user_profile::where('user_id',$id[1])->first()->profile_pic}}" width="70%" alt="">

                                                <div class="friend-name2">
                                                <a href="#" class="text-white m-0 px-1">{{App\Models\user_profile::where('user_id',$id[1])->first()->user_name}}</a>
                                                </div>
                                            </li>
                                            @elseif($id[1] == Auth::guard('local')->user()->id)

                                                <li>
                                                    <img src="{{asset('uploads/users')}}/{{App\Models\user_profile::where('user_id',$id[0])->first()->profile_pic}}" width="70%" alt="">

                                                    <div class="friend-name2">
                                                    <a href="#" class="text-white m-0 px-1">{{App\Models\user_profile::where('user_id',$id[0])->first()->user_name}}</a>
                                                    </div>
                                                </li>
                                            @endif
                                            @endforeach
                                        </ul>
									</div>
								</div><!-- recent activites -->
								<div class="central-meta">
									<h4 class="widget-title">Photos</h4>
									<ul class="photos">
                                        @foreach (App\Models\post::where('user_id',Auth::guard('local')->user()->id)->inRandomOrder()->get()->take(6) as $pht)
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
							<div class="loadMore">
								<div class="central-meta item">
									<div class="new-postbox">
										<figure>
											<img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" style="height:4rem;width:4rem"alt="">
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
								</div>
								@yield('content')
							</div>
						</div><!-- centerl meta -->
						<div class="col-lg-3">
							<aside class="sidebar static">
								<!-- <div class="widget">
									<div class="banner medium-opacity bluesh">
										<div style="background-image: url(images/resources/baner-widgetbg.jpg)" class="bg-image"></div>
										<div class="baner-top">
											<span><img src="images/book-icon.png" alt=""></span>
											<i class="fa fa-ellipsis-h"></i>
										</div>
										<div class="banermeta">
											<p>
												create your own favourit page.
											</p>
											<span>like them all</span>
											<a href="#" title="" data-ripple="">start now!</a>
										</div>
									</div>
								</div> -->
								<div class="widget friend-list stick-widget">
									<!-- <h4 class="widget-title">Friends</h4>
									<div id="searchDir"></div>
									<ul id="people-list" class="friendz-list">
										<li>
											<figure>
												<img src="images/resources/friend-avatar.jpg" alt="">
												<span class="status f-online"></span>
											</figure>
											<div class="friendz-meta">
												<a href="time-line.html">bucky barnes</a>
												<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="4136282f352433322e2d25243301262c20282d6f222e2c">[email&#160;protected]</a></i>
											</div>
										</li>
										<li>
											<figure>
												<img src="images/resources/friend-avatar2.jpg" alt="">
												<span class="status f-away"></span>
											</figure>
											<div class="friendz-meta">
												<a href="time-line.html">Sarah Loren</a>
												<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3a585b48545f497a5d575b535614595557">[email&#160;protected]</a></i>
											</div>
										</li>
										<li>
											<figure>
												<img src="images/resources/friend-avatar3.jpg" alt="">
												<span class="status f-off"></span>
											</figure>
											<div class="friendz-meta">
												<a href="time-line.html">jason borne</a>
												<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="127873617d7c7052757f737b7e3c717d7f">[email&#160;protected]</a></i>
											</div>
										</li>
										<li>
											<figure>
												<img src="images/resources/friend-avatar4.jpg" alt="">
												<span class="status f-off"></span>
											</figure>
											<div class="friendz-meta">
												<a href="time-line.html">Cameron diaz</a>
												<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="620803110d0c0022050f030b0e4c010d0f">[email&#160;protected]</a></i>
											</div>
										</li>
										<li>

											<figure>
												<img src="images/resources/friend-avatar5.jpg" alt="">
												<span class="status f-online"></span>
											</figure>
											<div class="friendz-meta">
												<a href="time-line.html">daniel warber</a>
												<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="0963687a66676b496e64686065276a6664">[email&#160;protected]</a></i>
											</div>
										</li>
										<li>

											<figure>
												<img src="images/resources/friend-avatar6.jpg" alt="">
												<span class="status f-away"></span>
											</figure>
											<div class="friendz-meta">
												<a href="time-line.html">andrew</a>
												<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5b313a283435391b3c363a323775383436">[email&#160;protected]</a></i>
											</div>
										</li>
										<li>

											<figure>
												<img src="images/resources/friend-avatar7.jpg" alt="">
												<span class="status f-off"></span>
											</figure>
											<div class="friendz-meta">
												<a href="time-line.html">amy watson</a>
												<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="472d263428292507202a262e2b6924282a">[email&#160;protected]</a></i>
											</div>
										</li>
										<li>

											<figure>
												<img src="images/resources/friend-avatar5.jpg" alt="">
												<span class="status f-online"></span>
											</figure>
											<div class="friendz-meta">
												<a href="time-line.html">daniel warber</a>
												<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7a101b091514183a1d171b131654191517">[email&#160;protected]</a></i>
											</div>
										</li>
										<li>

											<figure>
												<img src="images/resources/friend-avatar2.jpg" alt="">
												<span class="status f-away"></span>
											</figure>
											<div class="friendz-meta">
												<a href="time-line.html">Sarah Loren</a>
												<i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7c1e1d0e12190f3c1b111d1510521f1311">[email&#160;protected]</a></i>
											</div>
										</li>
									</ul> -->
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

    <script>
        const image_input =document.getElementById('cover_pic');
        const image_input2 =document.getElementById('pro_pic');
        var upload ="";
        if(image_input != 'NULL'){
            image_input.addEventListener("change",function(){
                const reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
                reader.addEventListener("load",()=>{
                    upload = reader.result;
                    document.getElementById('image1').innerHTML = `<img src="${upload}" alt="none" style="height:25rem;">`;
                document.getElementById('confirm_cvr_pic').innerHTML = `<button type="submit">submit</button>`;
                });
            });

        }

        if(image_input2 != 'NULL'){
            image_input2.addEventListener("change",function(){
                const reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
                reader.addEventListener("load",()=>{
                    upload = reader.result;
                    document.getElementById('pro_image1').innerHTML = `<img src="${upload}"
                alt="none" style="height:9rem;width:100%; object-fit:cover">`;
                document.getElementById('confirm_pro_pic').innerHTML = `<button type="submit">submit</button>`;
                });
            });
        }

    </script>
@endsection
