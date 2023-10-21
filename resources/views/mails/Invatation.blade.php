@extends('mails.Base')

@section('content')
<p>You have been invited to join </p>
<p>Together Online community</p>

<b>Invition Content:</b>
<p>{{$messageContent}}</p>

<p>Download the app Now:</p>

<a href="{{env('GOOGLE_PLAY_LINK')}}">Google Play</a>
<br/>
<a href="{{env('APPLE_LINK')}}">Apple App Store</a>
@endsection
