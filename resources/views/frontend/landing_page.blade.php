
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>SOCIO-login/Signup</title>
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
                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                        {{session('success')}}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-warning" role="alert">
                        {{session('error')}}
                        </div>
                        @endif
                        @if(session('loginmsg'))
                        <div class="alert alert-warning" role="alert">
                        {{session('loginmsg')}}
                        </div>
                        @endif
                        @if(session('pass_setted'))
                        <div class="alert alert-success" role="alert">
                        {{session('pass_setted')}}
                        </div>
                        @endif
                        <div class="log-reg-area sign">
                            <h2 class="log-title">Login</h2>
                                <p>
                                    Don't use SOCIO Yet? <a href="#" class="signup" title="">Join now</a>
                                </p>
                            <form method="POST" action="{{url('/login')}}">
                                @csrf
                                <div class="form-group">
                                <input type="email" id="input" required="required" name="email"/>
                                <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                <input type="password" required="required" name="pass"/>
                                <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
                                </div>
                                <div class="checkbox">
                                <label>
                                    <input type="checkbox"/><i class="check-box"></i>Always Remember Me.
                                </label>
                                </div>
                                <a href="{{url('/reset_pass')}}" title="" class="forgot-pwd">Forgot Password?</a>
                                <div class="submit-btns">
                                    <button class="mtr-btn signin" type="submit"><span>Login</span></button>
                                    <button class="mtr-btn signup" type="button"><span>Register</span></button>
                                </div>
                            </form>
                        </div>
                        <div class="log-reg-area reg">
                            <h2 class="log-title">Register</h2>
                                <p>
                                    Don't use SOCIO Yet? <a href="#" title="">Take the tour</a> or <a href="#" title="">Join now</a>
                                </p>
                            <form action="{{url('/register')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <input type="text" name="fname" required="required"/>
                                <label class="control-label" for="input" >First Name</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                <input type="text" name="lname" required="required"/>
                                <label class="control-label" for="input" >Last Name</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">
                                <input type="password" name="pass" required="required"/>
                                <label class="control-label" for="input" >Password</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-radio">
                                <div class="radio">
                                    <label>
                                    <input type="radio" name="gender" checked="checked" value="male"/><i class="check-box"></i>Male
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                    <input type="radio" name="gender" value="female"/><i class="check-box"></i>Female
                                    </label>
                                </div>
                                </div>
                                <div class="form-group">
                                <input type="email" name="email" required="required"/>
                                <label class="control-label" for="input" >Email</label><i class="mtrl-select"></i>
                                </div>

                                <div class="form-group">
                                    <label for="">profile photo</label>
                                <input type="file" name="photo" required="required" class="form-control"/><i class="mtrl-select"></i>
                                @error('photo')
                                <strong class="text-danger">You should better choose a photo file.</strong>
                                @enderror

                                </div>


                                <a href="#" class="already-have">Already have an account</a>
                                <div class="submit-btns">
                                    <button class="btn btn-primary" type="submit"><span>Register</span></button>
                                </div>
                            </form>
                        </div>
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
