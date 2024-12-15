
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>SOCIO-reset password</title>
    <link rel="icon" href="{{asset('frontend_assets/images/fav.png')}}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{asset('frontend_assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('frontend_assets/css/responsive.css')}}">

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0">
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="land-featurearea">
					<div class="land-meta">
						<h1>SOCIO</h1>
						<p>
							SOCIO is a social platform to connect with your friends.
						</p>
						<div class="friend-logo">
							<span><img src="{{asset('frontend_assets/images/wink.png')}}"></span>
						</div>
						<a href="http://facebook.com/Aruki.07" title="" class="folow-me">Follow Us on</a>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="login-reg-bg">
					@if(session('sent') || session('error'))
                    @if (session('error'))
                    <div class="alert alert-warning" role="alert">
                        {{session('error')}}
                    </div>
                    @endif
                    <div class="log-reg-area sign">
						<h4 class="log-title">enter given code and Email to login</h4>
                        <p>you have been sent a code. If didn't get any email then <a href="{{url('send_link')}}">resent code</a> </p>

						<form method="POST" action="{{url('/new_pass')}}">
							@csrf
							<div class="form-group">
							  <input type="email" id="input" required="required" name="email"/>
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>

                            <div class="form-group">
                                <input type="text" id="input" required="required" name="code"/>
                                <label class="control-label" for="input">Code</label><i class="mtrl-select"></i>
                              </div>

							<div class="submit-btns">
								<button class="mtr-btn signin" type="submit"><span> Proceed </span></button>

							</div>
						</form>
					</div>
                    @elseif(session('change_pass'))
                    
                    <div class="log-reg-area sign">
						<h4 class="log-title">Enter new password</h4>

						<form method="POST" action="{{url('/set_pass')}}">
							@csrf
							<div class="form-group">
							  <input type="password" id="input" required="required" name="n_pass"/>
							  <label class="control-label" for="input">New Password</label><i class="mtrl-select"></i>
							</div>
                            <div class="form-group">
                                <input type="password" id="input" required="required" name="re_pass"/>
                                <label class="control-label" for="input">Re-type Password</label><i class="mtrl-select"></i>
                              </div>
                              <input type="hidden" name="email" value="{{session('change_pass')}}">
							<div class="submit-btns">
								<button class="mtr-btn signin" type="submit"><span>Set password</span></button>

							</div>
						</form>
					</div>
                    @else
					<div class="log-reg-area sign">
						<h4 class="log-title">Give Email to reset password</h4>

						<form method="POST" action="{{url('/sent_link')}}">
							@csrf
							<div class="form-group">
							  <input type="email" id="input" required="required" name="email"/>
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>

							<div class="submit-btns">
								<button class="mtr-btn signin" type="submit"><span>send CODE</span></button>

							</div>
						</form>
					</div>
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>

	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('frontend_assets/js/main.min.js')}}"></script>
	<script src="{{asset('frontend_assets/js/script.js')}}"></script>

</body>

</html>
