@extends('layouts.login')

@section('content')

<div class="post_container">
<div class ="page_title">Follow Lists</div>

@foreach($userLists as $userPics)

    @if(Auth::user()->isFollowing($userPics->id))
    
        @if(Auth::user()->id == $userPics->id)
            @continue
        @else
        <div id ="{{$userPics->id}}" class="follows_list_images">
            <a href="{{ route('users.otherProfile', ['id'=>$userPics->id]) }}"><img src="{{ asset('../images/'.$userPics->images) }}" width="90px" height="90px"></a>
        </div>
        @endif

    @else

    @endif

@endforeach
</div>



<div class = "postlists">


    @foreach($postLists as $postLists)
        @if(Auth::user()->isFollowing($postLists->user->id))

                    @if(Auth::user()->id == $postLists->user->id)
                        @continue
                    @else
                    <div class="post_images">
                        <a><img src="{{ asset('../images/'.$postLists->user->images) }}" width="90px" height="90px"></a>
                    </div>
                    <p>{{$postLists->post}}</p>
                    <p>{{$postLists->created_at}}</p>
                    @endif

        @else
        @endif
    @endforeach




</div>


@endsection