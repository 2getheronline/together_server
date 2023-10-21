<p>שלום</p>
<p>{{$user->name}}</p>

<p>{{$messageContent->user->name}} השיב לפנייתך:</p>

<p>{{$messageContent->content}}</p>

<p>פנייתך המקורית:</p>

<p>{{$messageContent->parentMessage->content}}</p>

<p>שנשלחה ב:</p>

<p>{{$messageContent->parentMessage->created_at->format('Y-m-d H:i')}}</p>

<p>בכבוד</p>
<a href="{{env('APP_URL')}}">Together Online</a>
