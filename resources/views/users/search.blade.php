@extends('layouts.login')

@section('content')

{!! Form::open(['url' => '/resultword']) !!}
<div class ="search">
{{Form::textarea('textareaRemarks', null, ['class' => 'form-control', 'name' => 'inputkeyword', 'placeholder' => 'ユーザー名', 'rows' => '3'])}}
{{Form::submit('検索', ['class'=>'btn btn-primary btn-block'])}}
</div>
{!! Form::close() !!}



<div class = "userlists">
    <h4>ユーザー一覧</h4>
    @foreach($userLists as $userLists)
    <p>{{$userLists->images}}</p>
    <p>{{$userLists->username}}</p>
    @endforeach

</div>


@endsection