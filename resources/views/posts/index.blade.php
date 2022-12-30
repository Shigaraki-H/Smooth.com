@extends('layouts.login')

@section('content')
<div class ="mypost">
<a><img src="images/icon1.png"></a>
{{Form::textarea('textareaRemarks', null, ['class' => 'form-control', 'id' => 'textareaRemarks', 'placeholder' => '投稿内容を登録してください', 'rows' => '3'])}}
{{Form::submit('投稿', ['class'=>'btn btn-primary btn-block'])}}
</div>

<div class = "postlists">
    <h4>投稿内容一覧</h4>

    @foreach($postLists as $postLists)
    <p>{{$postLists->post}}</p>
    <p>{{$postLists->created_at}}</p>
    @endforeach

</div>

@endsection