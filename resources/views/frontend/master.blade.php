<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>SOCIO</title>
    <link rel="icon" href="{{asset('frontend_assets/images/fav.png')}}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{asset('frontend_assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/responsive.css')}}">
	{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>

@if (App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->first()->dark_mode == "on")
    <style>
    body{
        float: left;
        width: 100%;
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        filter: invert(1) hue-rotate(180deg);
    }
    img{
        filter: invert(1) hue-rotate(180deg);
    }
    </style>
@endif
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">

	<div class="responsive-header">
		<div class="mh-head first Sticky">
			<span class="mh-btns-left">
				<a class="" href="#menu"><i class="fa fa-align-justify"></i></a>
			</span>
			<span class="mh-text">
				<a href="newsfeed.html" title="logo">
					<img src="{{asset('frontend_assets/images/logo4.png')}}" alt="">
				</a>
			</span>
			<span class="mh-btns-right">
				<a class="fa fa-sliders" href="#shoppingbag"></a>
			</span>
		</div>
		<div class="mh-head second">
			<form class="mh-form">
				<input placeholder="search" />
				<a href="#" class="fa fa-search"></a>
			</form>
		</div>

		{{-- <a href="index-2.html" title="">Home Social</a> --}}
		{{-- <nav id="menu" class="res-menu">
			<ul>


				<li><span>Time Line</span>
					<ul>
						<li><a href="time-line.html" title="">timeline</a></li>
						<li><a href="timeline-friends.html" title="">timeline friends</a></li>
						<li><a href="timeline-groups.html" title="">timeline groups</a></li>
						<li><a href="timeline-pages.html" title="">timeline pages</a></li>
						<li><a href="timeline-photos.html" title="">timeline photos</a></li>
						<li><a href="timeline-videos.html" title="">timeline videos</a></li>
						<li><a href="fav-page.html" title="">favourit page</a></li>
						<li><a href="groups.html" title="">groups page</a></li>
						<li><a href="page-likers.html" title="">Likes page</a></li>
						<li><a href="people-nearby.html" title="">people nearby</a></li>


					</ul>
				</li>
				<li><span>Account Setting</span>
					<ul>
						<li><a href="create-fav-page.html" title="">create fav page</a></li>
						<li><a href="edit-account-setting.html" title="">edit account setting</a></li>
						<li><a href="edit-interest.html" title="">edit-interest</a></li>
						<li><a href="edit-password.html" title="">edit-password</a></li>
						<li><a href="edit-profile-basic.html" title="">edit profile basics</a></li>
						<li><a href="edit-work-eductation.html" title="">edit work educations</a></li>
						<li><a href="messages.html" title="">message box</a></li>
						<li><a href="inbox.html" title="">Inbox</a></li>
						<li><a href="notifications.html" title="">notifications page</a></li>
					</ul>
				</li>
				<li><span>forum</span>
					<ul>
						<li><a href="forum.html" title="">Forum Page</a></li>
						<li><a href="forums-category.html" title="">Fourm Category</a></li>
						<li><a href="forum-open-topic.html" title="">Forum Open Topic</a></li>
						<li><a href="forum-create-topic.html" title="">Forum Create Topic</a></li>
					</ul>
				</li>
				<li><span>Our Shop</span>
					<ul>
						<li><a href="shop.html" title="">Shop Products</a></li>
						<li><a href="shop-masonry.html" title="">Shop Masonry Products</a></li>
						<li><a href="shop-single.html" title="">Shop Detail Page</a></li>
						<li><a href="shop-cart.html" title="">Shop Product Cart</a></li>
						<li><a href="shop-checkout.html" title="">Product Checkout</a></li>
					</ul>
				</li>
				<li><span>Our Blog</span>
					<ul>
						<li><a href="blog-grid-wo-sidebar.html" title="">Our Blog</a></li>
						<li><a href="blog-grid-right-sidebar.html" title="">Blog with R-Sidebar</a></li>
						<li><a href="blog-grid-left-sidebar.html" title="">Blog with L-Sidebar</a></li>
						<li><a href="blog-masonry.html" title="">Blog Masonry Style</a></li>
						<li><a href="blog-list-wo-sidebar.html" title="">Blog List Style</a></li>
						<li><a href="blog-list-right-sidebar.html" title="">Blog List with R-Sidebar</a></li>
						<li><a href="blog-list-left-sidebar.html" title="">Blog List with L-Sidebar</a></li>
						<li><a href="blog-detail.html" title="">Blog Post Detail</a></li>
					</ul>
				</li>
				<li><span>Portfolio</span>
					<ul>
						<li><a href="portfolio-2colm.html" title="">Portfolio 2col</a></li>
						<li><a href="portfolio-3colm.html" title="">Portfolio 3col</a></li>
						<li><a href="portfolio-4colm.html" title="">Portfolio 4col</a></li>
					</ul>
				</li>
				<li><span>Support & Help</span>
					<ul>
						<li><a href="support-and-help.html" title="">Support & Help</a></li>
						<li><a href="support-and-help-detail.html" title="">Support & Help Detail</a></li>
						<li><a href="support-and-help-search-result.html" title="">Support & Help Search Result</a></li>
					</ul>
				</li>
				<li><span>More pages</span>
					<ul>
						<li><a href="careers.html" title="">Careers</a></li>
						<li><a href="career-detail.html" title="">Career Detail</a></li>
						<li><a href="404.html" title="">404 error page</a></li>
						<li><a href="404-2.html" title="">404 Style2</a></li>
						<li><a href="faq.html" title="">faq's page</a></li>
						<li><a href="insights.html" title="">insights</a></li>
						<li><a href="knowledge-base.html" title="">knowledge base</a></li>
					</ul>
				</li>
				<li><a href="about.html" title="">about</a></li>
				<li><a href="about-company.html" title="">About Us2</a></li>
				<li><a href="contact.html" title="">contact</a></li>
				<li><a href="contact-branches.html" title="">Contact Us2</a></li>
				<li><a href="widgets.html" title="">Widgts</a></li>
			</ul>
		</nav> --}}
		{{-- <nav id="shoppingbag">
			<div>
				<div class="">
					<form method="post">
						<div class="setting-row">
							<span>use night mode</span>
							<input type="checkbox" id="nightmode"/>
							<label for="nightmode" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Notifications</span>
							<input type="checkbox" id="switch2"/>
							<label for="switch2" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Notification sound</span>
							<input type="checkbox" id="switch3"/>
							<label for="switch3" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>My profile</span>
							<input type="checkbox" id="switch4"/>
							<label for="switch4" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Show profile</span>
							<input type="checkbox" id="switch5"/>
							<label for="switch5" data-on-label="ON" data-off-label="OFF"></label>
						</div>
					</form>
					<h4 class="panel-title">Account Setting</h4>
					<form method="post">
						<div class="setting-row">
							<span>Sub users</span>
							<input type="checkbox" id="switch6" />
							<label for="switch6" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>personal account</span>
							<input type="checkbox" id="switch7" />
							<label for="switch7" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Business account</span>
							<input type="checkbox" id="switch8" />
							<label for="switch8" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Show me online</span>
							<input type="checkbox" id="switch9" />
							<label for="switch9" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Delete history</span>
							<input type="checkbox" id="switch10" />
							<label for="switch10" data-on-label="ON" data-off-label="OFF"></label>
						</div>
						<div class="setting-row">
							<span>Expose author name</span>
							<input type="checkbox" id="switch11" />
							<label for="switch11" data-on-label="ON" data-off-label="OFF"></label>
						</div>
					</form>
				</div>
			</div>
		</nav> --}}
	</div><!-- responsive header -->

	<div class="topbar stick">
		<div class="logo">
			<a title="" href="{{url('/home')}}"><img src="{{asset('frontend_assets/images/logo3.png')}}" alt=""></a>
		</div>

		<div class="top-area">
			<!-- <ul class="main-menu">

				<a href="{{url('/')}}" class="mx-auto" title=""><b>Home</b></a>


				<li>
					<a href="#" title="">timeline</a>
					<ul>
						<li><a href="time-line.html" title="">timeline</a></li>
						<li><a href="timeline-friends.html" title="">timeline friends</a></li>
						<li><a href="timeline-groups.html" title="">timeline groups</a></li>
						<li><a href="timeline-pages.html" title="">timeline pages</a></li>
						<li><a href="timeline-photos.html" title="">timeline photos</a></li>
						<li><a href="timeline-videos.html" title="">timeline videos</a></li>
						<li><a href="fav-page.html" title="">favourit page</a></li>
						<li><a href="groups.html" title="">groups page</a></li>
						<li><a href="page-likers.html" title="">Likes page</a></li>
						<li><a href="people-nearby.html" title="">people nearby</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">account settings</a>
					<ul>
						<li><a href="create-fav-page.html" title="">create fav page</a></li>
						<li><a href="edit-account-setting.html" title="">edit account setting</a></li>
						<li><a href="edit-interest.html" title="">edit-interest</a></li>
						<li><a href="edit-password.html" title="">edit-password</a></li>
						<li><a href="edit-profile-basic.html" title="">edit profile basics</a></li>
						<li><a href="edit-work-eductation.html" title="">edit work educations</a></li>
						<li><a href="messages.html" title="">message box</a></li>
						<li><a href="inbox.html" title="">Inbox</a></li>
						<li><a href="notifications.html" title="">notifications page</a></li>
					</ul>
				</li>
				<li>
					<a href="#" title="">more pages</a>
					<ul>
						<li><a href="404.html" title="">404 error page</a></li>
						<li><a href="about.html" title="">about</a></li>
						<li><a href="contact.html" title="">contact</a></li>
						<li><a href="faq.html" title="">faq's page</a></li>
						<li><a href="insights.html" title="">insights</a></li>
						<li><a href="knowledge-base.html" title="">knowledge base</a></li>
						<li><a href="widgets.html" title="">Widgts</a></li>
					</ul>
				</li>
			</ul> -->



			<!-- <ul class="setting-area">
				<li>
					<a href="#" title="search-bar" data-ripple=""><i class="ti-search"></i></a>
					<div class="searched">
						<form method="post" class="form-search">
							<input type="text" placeholder="Search Friend">
							<button data-ripple><i class="ti-search"></i></button>
						</form>
					</div>
				</li>
				<li><a href="{{url('/home')}}" title="Home"><i class="ti-home"></i></a></li>

				<li>
					<a href="#" title="Messages" data-ripple=""><i class="ti-comment"></i><span>12</span></a>
					<div class="dropdowns">
						<span>5 New Messages</span>
						<ul class="drops-menu">
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-1.jpg" alt="">
									<div class="mesg-meta">
										<h6>sarah Loren</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-2.jpg" alt="">
									<div class="mesg-meta">
										<h6>Jhon doe</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag red">Reply</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-3.jpg" alt="">
									<div class="mesg-meta">
										<h6>Andrew</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag blue">Unseen</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-4.jpg" alt="">
									<div class="mesg-meta">
										<h6>Tom cruse</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-5.jpg" alt="">
									<div class="mesg-meta">
										<h6>Amy</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
						</ul>
						<a href="messages.html" title="" class="more-mesg">view more</a>
					</div>
				</li>
				<li><a href="#" title="Languages" data-ripple=""><i class="fa fa-globe"></i></a>
					<div class="dropdowns languages">
						<a href="#" title=""><i class="ti-check"></i>English</a>
						<a href="#" title="">Arabic</a>
						<a href="#" title="">Dutch</a>
						<a href="#" title="">French</a>
					</div>
				</li>
				<li>
					<a href="#" title="Notification" data-ripple="">
						<i class="ti-bell"></i><span>20</span>
					</a>
					<div class="dropdowns">
						<span>4 New Notifications</span>
						<ul class="drops-menu">
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-1.jpg" alt="">
									<div class="mesg-meta">
										<h6>sarah Loren</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag green">New</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-2.jpg" alt="">
									<div class="mesg-meta">
										<h6>Jhon doe</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag red">Reply</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-3.jpg" alt="">
									<div class="mesg-meta">
										<h6>Andrew</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag blue">Unseen</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-4.jpg" alt="">
									<div class="mesg-meta">
										<h6>Tom cruse</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
							<li>
								<a href="notifications.html" title="">
									<img src="images/resources/thumb-5.jpg" alt="">
									<div class="mesg-meta">
										<h6>Amy</h6>
										<span>Hi, how r u dear ...?</span>
										<i>2 min ago</i>
									</div>
								</a>
								<span class="tag">New</span>
							</li>
						</ul>
						<a href="notifications.html" title="" class="more-mesg">view more</a>
					</div>
				</li>
			</ul> -->

			<ul class="menu-bar">
                <li class="mt-2 p-0">
                    <form action="{{url('search_cont')}}" method="POST">
                        @csrf
                        <div class="input-group ">
                            <input type="text" class="form-control" placeholder="search" name="search_val" style="width:20rem">
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>
                </li>


				<li class="mt-3"><a href="{{url('/home')}}"><i class="ti-home"></i></a></li>


				{{-- <li class="mt-3"><a><i class="ti-comment chat"></i></a></li> --}}
				<div class="list-group mssg" hidden>
					<a class="list-group-item list-group-item-action disabled"><p class="text-left"><b>Messages</b></p> </a>
					<a href="#" class="list-group-item list-group-item-action">
						<img src="{{asset('frontend_assets/images/resources/photo1.jpg')}}" class="float-left" style="width:40px;border-radius:50%" >
						This is a primary list group item
					</a>
					<a href="#" class="list-group-item list-group-item-action">This is a secondary list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a success list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a danger list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a warning list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a info list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a light list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a dark list group item</a>
				</div>
				{{-- <li class="mt-3"><a><i class="ti-bell noty"></i></a></li> --}}
				<div class="list-group notify" hidden>
					<a class="list-group-item list-group-item-action disabled" ><p class="text-left"><b>Notification</b></p></a>
					<a href="#" class="list-group-item list-group-item-action">
						<img src="{{asset('frontend_assets/images/resources/photo1.jpg')}}" class="float-left" style="width:40px;border-radius:50%" >
						This is a primary list group item
					</a>
					<a href="#" class="list-group-item list-group-item-action">This is a secondary list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a success list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a danger list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a warning list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a info list group item</a>
					<a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
					<a href="#" class="list-group-item list-group-item-action">This is a primary list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a secondary list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a success list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a danger list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a warning list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a info list group item</a>
					<a href="#" class="list-group-item list-group-item-action">Dapibus ac facilisis in</a>
					<a href="#" class="list-group-item list-group-item-action">This is a primary list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a secondary list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a success list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a danger list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a warning list group item</a>
					<a href="#" class="list-group-item list-group-item-action">This is a info list group item</a>

				</div>
			</ul>


			<div class="user-img mx-3">
				<img src="{{asset('uploads/users')}}/{{Auth::guard('local')->user()->photo}}" width="50px" style="height:50px" class="pro_pic">


				<!-- <div class="user-setting">
					<a href="#" title=""><span class="status f-online"></span>Status</a>

					<a href="{{url('/profile')}}" title=""><i class="ti-user"></i>My profile</a>

					<a href="#" title=""><i class="ti-target"></i>activity log</a>
					<a href="#" title=""><i class="ti-settings"></i>account setting</a>
					<a href="#" title=""><i class="ti-power-off"></i>log out</a>
				</div> -->

			</div>
				<div class="list-group settings" hidden>
                    @if(App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->first()->active_status == "on")
					<a href="#" class="list-group-item list-group-item-action state2">Active Status: <div class="state" style="background:green"></div></a>
                    @elseif(App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->first()->active_status == "off")
                    <a href="#" class="list-group-item list-group-item-action state2">Active Status: <div class="state" style="background:red"></div></a>
                    @else
                    <a href="#" class="list-group-item list-group-item-action state2">Active Status: <div class="state" style="background:blue"></div></a>
                    @endif
					<a href="{{url('/profile')}}" class="list-group-item list-group-item-action"><i class="ti-user mr-3"></i>My profile</a>
					<a href="{{url('/settings')}}" class="list-group-item list-group-item-action"><i class="ti-settings mr-3"></i>Account settings</a>
					<a href="#" class="list-group-item list-group-item-action"><i class="ti-star mr-3"></i>Dark Mode

                          <!-- Rounded switch -->
                          <label class="switch ms-5">
                            @if (App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->first()->dark_mode == "on")
                            <input type="checkbox" class="dark" value="off" checked>
                            @elseif(App\Models\user_profile::where('user_id',Auth::guard('local')->user()->id)->first()->dark_mode == "off")
                            <input type="checkbox" class="dark" value="on">
                            @endif

                            <span class="slider round"></span>
                          </label>
                    </a>
                    <a href="{{url('/jobs')}}" class="list-group-item list-group-item-action"><i class="ti-announcement mr-3"></i>Job Circulars</a>
                    <a href="{{url('/logout')}}" class="list-group-item list-group-item-action"><i class="ti-power-off mr-3"></i>Log out</a>
					<input type="hidden" class="id" value="{{Auth::guard('local')->user()->id}}">


				</div>
			<!-- <span class="ti-menu main-menu" data-ripple=""></span> -->
		</div>
	</div><!-- topbar -->

	@yield('content2')
    @yield('not-found')

	<footer class="">

            <ul class="ending">
                <li>privacy</li>
                <li>Terms</li>
                <li>Copyright SOCIO, 2022</li>
                <li>Cookies</li>
                <li>More</li>
            </ul>


	</footer>

	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
	<script src="{{asset('frontend_assets/js/main.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/script.js')}}"></script>
	<script src="{{asset('frontend_assets/js/map-init.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8c55_YHLvDHGACkQscgbGLtLRdxBDCfI"></script>

    @yield('footer')
	<script>
		$('.chat').click(function(){
			var check= $('.mssg').attr("hidden");

			if( check !== undefined){
			  $('.mssg').removeAttr("hidden");
			}
			else{
				$('.mssg').attr("hidden",'hidden');
			}

		})
	</script>

	<script>
		$('.noty').click(function(){
			var check= $('.notify').attr("hidden");

			if(check !== undefined){
			 $('.notify').removeAttr("hidden");
			}
			else{
				$('.notify').attr("hidden",'hidden');
			}


		})
	</script>

	<script>
		$('.pro_pic').click(function(){
			var check= $('.settings').attr("hidden");

			if( check !== undefined){
			  $('.settings').removeAttr("hidden");
			}
			else{
				$('.settings').attr("hidden",'hidden');
			}

		})
	</script>

    <script>
		$('.state2').click(function(){
			var check= $('.state').attr("style");

            if( check == "background:green"){
			  var status = "off"; //command to turn "off" active status
			}
			else{
			  var status = "on"; //commang to turn "on" active status
			}


            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });


            $.ajax({
                type:'POST',
                url:'/active_status',
                data:{status:status},
                success:function(data){
                    if(data == "off"){
                       $('.state').attr("style","background:red");
                    }
                    else {
                      $('.state').attr("style",'background:green');
                    }

                }
            })


		})
	</script>

    <script>
        $('.dark').change(function(){
            // $("body").css("filter","invert(1) hue-rotate(180deg)");
            // $("img").css("filter","invert(1) hue-rotate(180deg)");

			var dark = $(this).val();
            var id = $('.id').val();

			$.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });


            $.ajax({
                type:'POST',
                url:'/dark_mode',
                data:{user_id:id,dark_mode:dark},
                success:function(data){
                    if(data == "on"){
                    $('.dark').val(data);
					$("html").css("filter","");
					$("img").css("filter","");
                    }
                    else if(data == "off"){
                       $('.dark').val(data);
                       $("html").css({"filter":"invert(1) hue-rotate(180deg)","height":"100%","-webkit-filter":"invert(1) hue-rotate(180deg)"});

                       $("img").css("filter","invert(1) hue-rotate(180deg)");
                    }



                }
            });

        });
    </script>
</body>

</html>
