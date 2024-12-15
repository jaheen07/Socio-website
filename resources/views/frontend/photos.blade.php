@extends('frontend.profile_master')

@section('indicator')
<a class="" href="{{url('/profile')}}" title="" data-ripple="">time line</a>
<a class="active" href="{{url('/photos')}}" title="" data-ripple="">Photos</a>
{{-- <a class="" href="{{url('/videos')}}" title="" data-ripple="">Videos</a> --}}
<a class="" href="{{url('/friends')}}" title="" data-ripple="">Friends</a>
{{-- <a class="" href="{{url('/groups')}}" title="" data-ripple="">Groups</a>
<a class="" href="{{url('/about')}}" title="" data-ripple="">about</a>
<a class="" href="#" title="" data-ripple="">more</a> --}}
@endsection

@section('content')

<div class="central-meta">
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
    <div class="lodmore"><button class="btn-view btn-load-more"></button></div>
</div><!-- photos -->

@endsection
