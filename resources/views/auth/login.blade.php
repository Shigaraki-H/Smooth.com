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
@elseif(session('loginError'))
    <div class="alert alert-danger mt-3">
        <span class = "text-danger">{{ session('loginError')}}</span>
    </div>
@endif



{!! Form::open() !!}

<p class = "welcome-title">Smooth.comへようこそ</p>

<div class ="mailLogin-box">
{{ Form::label('e-mail',null,['class' => 'mail-login']) }}

{{ Form::text('mail',null,['class' => 'mail-loginForm']) }}
</div>

<div class ="passwordLogin-box">
{{ Form::label('password',null,['class' => 'password-login']) }}

{{ Form::password('password',['class' => 'password-loginForm']) }}
</div>

<div class="login-box">
{{ Form::submit('LOGIN',['class'=>'login-btn']) }}
</div>

<p class="register-url"><a href="/register"><span style="color:white">新規ユーザーの方はこちら</span></a></p>

{!! Form::close() !!}

@endsection