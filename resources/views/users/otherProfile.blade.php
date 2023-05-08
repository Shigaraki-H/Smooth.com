@extends('layouts.login')

@section('content')

<div class="post_container">
    <div class ="page_title">

        @foreach($userLists as $userProfile)

            <div class="follows_list_images">
                <a><img src="{{ asset('../storage/images/'.$userProfile->images) }}" width="90px" height="90px"></a>
                <div class ="name_status">
                    <p class ="user_block">name<a class = "user_title">{{$userProfile->username}}</a></p>
                    <p class ="bio_block">bio<a class = "bio_title">{{$userProfile->bio}}</a></p>
                </div>
            </div>

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

    <p class ="created_block">{{$postLists->created_at}}</p>
        <div class="post_other_img">
            <a><img src="{{ asset('../storage/images/'.$postLists->user->images) }}" width="90px" height="90px"></a>
            <div class ="name_status">
                <p class ="user_block">{{$postLists->user->username}}</p>
                <p class ="post_block">{{$postLists->post}}</p>
            </div>
        </div>


    @endforeach


</div>


@endsection