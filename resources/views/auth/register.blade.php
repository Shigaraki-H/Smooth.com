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

<div class = "register-box">

<p>
{{ Form::label('ユーザー名') }}
{{ Form::text('username',null,['class' => 'input']) }}
</p>

<p>
{{ Form::label('メールアドレス') }}
{{ Form::text('mail',null,['class' => 'input']) }}
</p>

<p>
{{ Form::label('パスワード') }}
{{ Form::text('password',null,['class' => 'input']) }}
</p>

<p>
{{ Form::label('パスワード確認') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}
</p>

{{ Form::submit('登録') }}

</div>

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
