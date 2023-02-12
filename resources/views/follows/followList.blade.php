@extends('layouts.login')

@section('content')

<div class="post_container">
{{Form::open(['url' => '/post', 'files' => true])}}
<h1>FollowLists</h1>
</div>
{{Form::close()}}

{{Form::open(['url' => '/post', 'files' => true])}}


<div class = "postlists">

@foreach($userLists as $userLists)

    @if(Auth::user()->isFollowing($userLists->id))
    @foreach($postLists as $postLists)
    <div class="post_images">
        <a><img src="{{ asset('../images/'.$postLists->user->images) }}" width="90px" height="90px"></a>
    </div>
    <p>{{$postLists->post}}</p>
    <p>{{$postLists->created_at}}</p>
    @endforeach
    @else

    @endif

@endforeach
</div>

{{Form::close()}}

@endsection