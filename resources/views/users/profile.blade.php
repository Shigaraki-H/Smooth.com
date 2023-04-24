@extends('layouts.login')

@section('content')

<div class = "alert">
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
</div>

{{Form::open(['url' => '/profile-update', 'files' => true])}}

<div class="confirmForm">
    <a class = "username">
    <p>username</p>
{{Form::text('username', null, ['class' => 'form-control', 'id' => 'inputName', 'placeholder' => Auth::user()->username])}}
</a>
<a class = "mailaddress">
    <p>mail address</p>
{{Form::email('mail', null, ['class' => 'form-control','id' => 'inputEmail','placeholder' => Auth::user()->mail])}}
</a>
<a class = "password">
    <p>password</p>
    {{Form::password('password', ['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード'])}}
</a>
    <a class = "passwordcomfirm">
        <p>password comfirm</p>
        {{Form::password('password_confirmation', ['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード確認'])}}
    </a>
    <a class = "bio">
    <p>bio</p>
    {{Form::text('bio', null, ['class' => 'form-control', 'id' => 'inputName', 'placeholder' => Auth::user()->bio])}}
</a>
<a class = "iconimage">
    <p>icon image</p>
    {{Form::file('images', ['class'=>'custom-file-input','id'=>'fileImage'])}}
</a>

{{Form::submit('更新', ['class'=>'btn btn-update btn-block'])}}
</div>

{{Form::close()}}

@endsection