@extends('layouts.login')

@section('content')

{{Form::open(['url' => '/profile-update', 'files' => true])}}

<div class="confirmForm">
    <a class = "username">
    <p>username</p>
{{Form::text('inputName', null, ['class' => 'form-control', 'id' => 'inputName', 'placeholder' => Auth::user()->username])}}
</a>
<a class = "mailaddress">
    <p>mail address</p>
{{Form::email('inputEmail', null, ['class' => 'form-control','id' => 'inputEmail','placeholder' => Auth::user()->mail])}}
</a>
<a class = "password">
    <p>password</p>
    {{Form::password('inputPassword', ['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード'])}}
</a>
    <a class = "passwordcomfirm">
        <p>password comfirm</p>
        {{Form::password('inputPassConf', ['class' => 'form-control','id' => 'inputPassword','placeholder' => 'パスワード確認'])}}
    </a>
    <a class = "bio">
    <p>bio</p>
    {{Form::text('inputBio', null, ['class' => 'form-control', 'id' => 'inputName', 'placeholder' => '自己紹介文'])}}
</a>
<a class = "iconimage">
    <p>icon image</p>
    {{Form::file('image', ['class'=>'custom-file-input','id'=>'fileImage'])}}
</a>

{{Form::submit('更新', ['class'=>'btn btn-primary btn-block'])}}
</div>

{{Form::close()}}

@endsection