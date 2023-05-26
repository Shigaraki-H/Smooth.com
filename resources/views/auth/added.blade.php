@extends('layouts.logout')

@section('content')

<div class = "register_form">
<div id="clear">
  <div class ="registered">
  <p>{{$username}}さん</p>
  <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>

  <p class="login-btn"><a href="/login"><span style="color:white">ログイン画面へ</span></a></p>
</div>
</div>
@endsection