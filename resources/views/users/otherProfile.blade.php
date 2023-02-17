@extends('layouts.login')

@section('content')

<div class="post_container">
<div class ="page_title">

@foreach($userLists as $userProfile)

    <div class="follows_list_images">
        <a><img src="{{ asset('../images/'.$userProfile->images) }}" width="90px" height="90px"></a>
    </div>
    <div class="follows_list_name">name<p>{{$userProfile->username}}</p></div>
    <div class="follows_list_bio">bio<p>{{$userProfile->bio}}</p></div>

    <div class = "follow_btn">
            @if(Auth::user()->isFollowing($userProfile->id))
                <form action="{{ route('unfollow', ['id' => $userProfile->id]) }}" method="POST">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-unfollow">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow', ['id' => $userProfile->id]) }}" method="POST">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-follow">フォローする</button>
                </form>
            @endif
    </div>

@endforeach
</div>
</div>



<div class = "postlists">

    @foreach($postLists as $postLists)

        <div class="post_images">
            <a><img src="{{ asset('../images/'.$postLists->user->images) }}" width="90px" height="90px"></a>
        </div>
        <p>{{$postLists->post}}</p>
        <p>{{$postLists->created_at}}</p>



    @endforeach


</div>


@endsection