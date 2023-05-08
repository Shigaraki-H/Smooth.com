@extends('layouts.login')

@section('content')

<div class = "alert">
@foreach ($errors->all() as $error)
  <li>{{$error}}</li>
@endforeach
</div>

{{Form::open(['url' => '/profile-update', 'files' => true])}}


<div class="confirmForm">
    <a><img src="{{ asset('../storage/images/'.Auth::user()->images) }}" width="90px" height="90px"></a>
    <div class="post_profile">
            <div class ="name_status">
            <p class="username-title">username</p>
            {{Form::text('username', Auth::user()->username, ['class' => 'form-control', 'id' => 'inputName'])}}
            </div>
            <div class ="name_status">
            <p class="username-title">mailaddress</p>
            {{Form::email('mail', Auth::user()->mail, ['class' => 'form-control','id' => 'inputEmail'])}}
            </div>
            <div class ="name_status">
            <p class="username-title">password</p>
            {{Form::password('password', ['class' => 'form-control','id' => 'inputPassword', 'placeholder' => '●●●●'])}}
            </div>
            <div class ="name_status">
            <p class="username-title">password confirm</p>
            {{Form::password('password_confirmation', ['class' => 'form-control','id' => 'inputPassword','placeholder' => '●●●●'])}}
            </div>
            <div class ="name_status">
            <p class="username-title">bio</p>
            {{Form::text('bio', Auth::user()->bio, ['class' => 'form-control', 'id' => 'inputName'])}}
            </div>
            <div class ="name_status">
            <p class="username-title">icon image</p>
            {{Form::file('images', ['class'=>'custom-file-input','id'=>'fileImage'])}}
            </div>
            <div class="form-btn">
            {{Form::submit('更新', ['class'=>'btn btn-update btn-block'])}}
            </div>
    </div>
</div>

{{Form::close()}}

@endsection