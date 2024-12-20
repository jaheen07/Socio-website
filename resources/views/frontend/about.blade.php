@extends('frontend.profile_master')

@section('indicator')
<a class="" href="{{url('/profile')}}" title="" data-ripple="">time line</a>
<a class="" href="{{url('/photos')}}" title="" data-ripple="">Photos</a>
{{-- <a class="" href="{{url('/videos')}}" title="" data-ripple="">Videos</a> --}}
<a class="" href="{{url('/friends')}}" title="" data-ripple="">Friends</a>
{{-- <a class="" href="{{url('/groups')}}" title="" data-ripple="">Groups</a>
<a class="active" href="{{url('/about')}}" title="" data-ripple="">about</a>
<a class="" href="#" title="" data-ripple="">more</a> --}}
@endsection


@section('content')
<div class="central-meta">
    <div class="about">
        <div class="personal">
            <h5 class="f-title"><i class="ti-info-alt"></i> Personal Info</h5>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
            </p>
        </div>
        <div class="d-flex flex-row mt-2">
            <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left" >
                <li class="nav-item">
                    <a href="#basic" class="nav-link active" data-toggle="tab" >Basic info</a>
                </li>
                <li class="nav-item">
                    <a href="#location" class="nav-link" data-toggle="tab" >location</a>
                </li>
                <li class="nav-item">
                    <a href="#work" class="nav-link" data-toggle="tab" >work and education</a>
                </li>
                <li class="nav-item">
                    <a href="#interest" class="nav-link" data-toggle="tab"  >interests</a>
                </li>
                <li class="nav-item">
                    <a href="#lang" class="nav-link" data-toggle="tab" >languages</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="basic" >
                    <ul class="basics">
                        <li><i class="ti-user"></i>sarah grey</li>
                        <li><i class="ti-map-alt"></i>live in Dubai</li>
                        <li><i class="ti-mobile"></i>+1-234-345675</li>
                        <li><i class="ti-email"></i><a href="https://wpkixx.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="3c4553494e515d55507c59515d5550125f5351">[email&#160;protected]</a></li>
                        <li><i class="ti-world"></i>www.yoursite.com</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="location" role="tabpanel">
                    <div class="location-map">
                        <div id="map-canvas"></div>
                    </div>
                </div>
                <div class="tab-pane fade" id="work" role="tabpanel">
                    <div>

                        <a href="#" title="">Envato</a>
                        <p>work as autohr in envato themeforest from 2013</p>
                        <ul class="education">
                            <li><i class="ti-facebook"></i> BSCS from Oxford University</li>
                            <li><i class="ti-twitter"></i> MSCS from Harvard Unversity</li>
                        </ul>
                    </div>
                </div>
                <div class="tab-pane fade" id="interest" role="tabpanel">
                    <ul class="basics">
                        <li>Footbal</li>
                        <li>internet</li>
                        <li>photography</li>
                    </ul>
                </div>
                <div class="tab-pane fade" id="lang" role="tabpanel">
                    <ul class="basics">
                        <li>english</li>
                        <li>french</li>
                        <li>spanish</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!-- centerl meta -->
@endsection
