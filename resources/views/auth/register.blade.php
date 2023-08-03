@extends('layouts.logout')

@section('content')

<div class = "register_area">
    <div class = "register_form">
@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::open(['url' => '/register/post', 'files' => true]) !!}

<h1>新規ユーザー登録</h1>


<p class ="usernamelist-box">
    {{ Form::label('ユーザー名',null,['class' => 'username-register']) }}
    {{ Form::text('username',null,['class' => 'userRegi-form']) }}
</p>

<p class ="maillist-box">
    {{ Form::label('メールアドレス',null,['class' => 'mail-register']) }}
    {{ Form::text('mail',null,['class' => 'mailRegi-form']) }}
</p>

<p class ="passlist-box">
    {{ Form::label('パスワード',null,['class' => 'pass-register']) }}
    {{ Form::password('password',['class' => 'passRegi-form']) }}
</p>

<p class ="passconfList-box">
    {{ Form::label('パスワード確認',null,['class' => 'passConf-register']) }}
    {{ Form::password('password_confirmation',['class' => 'passConfRegi-form']) }}
</p>

<div class = "register-box">
{{ Form::submit('REGISTER',['class'=>'register-btn']) }}
</div>

<p class="login-url"><a href="/public/login"><span style="color:white">ログイン画面へ戻る</span></a></p>

{!! Form::close() !!}


@endsection
