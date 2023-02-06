@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/resultword']) !!}
<div class ="search">
{{Form::textarea('textareaRemarks', null, ['class' => 'form-control', 'name' => 'inputkeyword', 'placeholder' => 'ユーザー名', 'rows' => '3'])}}
{{Form::submit('', ['class'=>'btn btn-search btn-block'])}}
</div>
{!! Form::close() !!}



<h4>ユーザー一覧</h4>
@foreach($userLists as $userLists)
<div class = "userlists">
    <p>{{$userLists->images}}</p>
    <p>{{$userLists->username}}</p>
</div>
    <div class = "follow_btn">
            @if(Auth::user()->isFollowing($userLists->id))
                <form action="{{ route('unfollow', ['id' => $userLists->id]) }}" method="POST">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-unfollow">フォロー解除</button>
                </form>
            @else
                <form action="{{ route('follow', ['id' => $userLists->id]) }}" method="POST">
                    {{ csrf_field() }}

                    <button type="submit" class="btn btn-follow">フォローする</button>
                </form>
            @endif
    </div>
@endforeach

@endsection