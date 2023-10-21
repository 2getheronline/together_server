@extends('mails.Base')

@section('content')
    <p>You have been invited to join <b>{{$group->name}}</b> group</p>
    <p>in Together Online community</p>

    <b>Invition Content:</b>
    <p>{{$messageContent}}</p>

    <p>Download the app Now:</p>

    <a href="{{env('GOOGLE_PLAY_LINK')}}">Google Play</a>
    <br/>
    <a href="{{env('APPLE_LINK')}}">Apple App Store</a>

    <h3>To join others to app:</h3>

    <h1>Group ID: {{$group->id}}</h1>
    <h1>Group Password: {{$group->password}}</h1>

    <h3>Or scan the QR code with TogetherOnline app:</h3>

    <img src="https://chart.googleapis.com/chart?chs=500x500&cht=qr&chl={{json_encode($group->only(['id', 'password']))}}&choe=UTF-8"/>
@endsection
