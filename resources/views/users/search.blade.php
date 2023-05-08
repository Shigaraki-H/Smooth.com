@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/resultword']) !!}

<div class="post_container">
    <div class ="mypost">
        <div class ="search_area">
        {{Form::textarea('inputkeyword', null, ['class' => 'form-control', 'id' => 'textareaRemarks', 'placeholder' => 'ユーザー名', 'rows' => '3'])}}
        </div>
        <div class ="search_btn">
            {{Form::submit('', ['class'=>'btn btn-search btn-block'])}}
        </div>
        {!! Form::close() !!}
    </div>
    @if(!empty($keyword))
    <p class ="keyword">検索ワード：{{$keyword}}</p>
    @endif
</div>


<h4>ユーザー 一覧</h4>
@foreach($userLists as $userLists)
<div class = "userlists">
    <div class="post_other_img">
        <a><img src="{{ asset('../storage/images/'.$userLists->images) }}" width="90px" height="90px"></a>
            <div class ="name_status">
            <p class="username-title">{{$userLists->username}}</p>
            </div>
    </div>
    <div class = "follow_btn">
            @if(Auth::user()->isFollowing($userLists->id))
                <form action="{{ route('unfollow', ['id' => $userLists->id]) }}" method="POST">
                    {{ csrf_field() }}

                    <div class ="unfollow_btn">
                        {{Form::submit('フォロー解除', ['class'=>'btn btn-unfollow'])}}
                    </div>
                </form>
            @else
                <form action="{{ route('follow', ['id' => $userLists->id]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class ="follow_btn">
                    {{Form::submit('フォローする', ['class'=>'btn btn-follow'])}}
                    </div>
                </form>
            @endif
    </div>

</div>
@endforeach

@endsection