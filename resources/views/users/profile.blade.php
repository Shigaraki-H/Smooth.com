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
            <div class ="profile_status">
              <p class="username-title">username</p>
              <p class="username-title">mailaddress</p>
              <p class="username-title">password</p>
              <p class="username-title">password confirm</p>
              <p class="username-title">bio</p>
              <p class="username-title">icon image</p>
            </div>

            <div class ="updateProf-box">
              <div class= "userUpdate-box">
              {{Form::text('username', Auth::user()->username, ['class' => 'username-update', 'id' => 'inputName'])}}
              </div>
              <div class= "mailUpdate-box">
              {{Form::email('mail', Auth::user()->mail, ['class' => 'email-update','id' => 'inputEmail'])}}
              </div>
              <div class= "passUpdate-box">
              {{Form::password('password', ['class' => 'pass-update','id' => 'inputPassword', 'placeholder' => '●●●●'])}}
              </div>
              <div class= "passConfUpdate-box">
              {{Form::password('password_confirmation', ['class' => 'passConfi-update','id' => 'inputPassword','placeholder' => '●●●●'])}}
              </div>
              <div class= "bioUpdate-box">
              {{Form::text('bio', Auth::user()->bio, ['class' => 'bio-update', 'id' => 'inputName'])}}
              </div>
              <div class= "imgUpdate-box">
              {{Form::file('images', ['class'=>'custom-file-input','id'=>'fileImage'])}}
              </div>
            </div>

            
          </div>
</div>
        <div class="form-btn">
        {{Form::submit('更新', ['class'=>'updateProf-btn'])}}
        </div>

{{Form::close()}}

@endsection