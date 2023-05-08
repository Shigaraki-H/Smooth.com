<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
        <div id = "head">
            <h1><a href="/top"><img src="{{ asset('../images/logo.png') }}"></a></h1>
                <div id="">
                    <div id="">
                        <ul class="accordion1">
                            <li class="ac_boxs">
                                    <div class="post_images">
                                        <p class ="user-name">{{Auth::user()->username}}  さん
                                            <div href="#" class="drawer">
                                                
                                                
                                                <div class ="menu-bar">
                                                    <span class="bar1"></span>
                                                </div>

                                            </div>
                                        </p>
                                            <div><img src="{{ asset('../storage/images/'.Auth::user()->images) }}" width="90px" height="90px"></div>
                                    </div>
                            </li>
                        </ul>
                    </div>
                </div>
        </div>
    </header>
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
                <div id="row">
                    <div id="container">
                        
                        @yield('content')
                    </div >
                    <div id="side-bar">
                        <div id="confirm">
                                <div class="inner-bar">
                                    <ul class="drawer-list">
                                        <li><a href="/top">ホーム</a></li>
                                        <li><a href="/profile">プロフィール</a></li>
                                        <li><a href="/logout">ログアウト</a></li>
                                    </ul>
                                </div>

                                <p>{{Auth::user()->username}}さんの</p>
                                <div>
                                    <p>フォロー数</p>
                                    <p><span>{{ Auth::user()->Follows()->get()->count() }}名</span></p>
                                </div>
                                <p class="btn-blue"><a href="/followList">フォローリスト</a></p>
                                <div>
                                    <p>フォロワー数</p>
                                    <p><span>{{ Auth::user()->Followers()->get()->count() }}名</span></p>
                                </div>
                                <p class="btn-blue"><a href="/followerList">フォロワーリスト</a></p>
                        </div>
                            <p class="btn-blue"><a href="/search">ユーザー検索</a></p>
                </div>
        </div>
    </div>
    <footer>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
    $(function(){
        $('.js-modal-open').on('click',function(){
            $('.js-modal').fadeIn();
            var post_id = $(this).attr("data-target");
            $('.text-edit').val(post_id);
            return false;
        });
        $('.js-modal-close').on('click',function(){
            $('.js-modal').fadeOut();
            return false;
        });
        
        
        $('.drawer').click(function() {
            $('.bar1, .bar2, .bar3').toggleClass('open');
            $(".drawer-list").slideToggle();
        });
        
    });
    </script>


</body>
</html>
