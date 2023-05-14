@extends('layouts.login')

@section('content')


<div class="post_container">
    <div class ="mypost">
        <div class="post_images">
            <a><img src="{{ asset('../storage/images/'.Auth::user()->images) }}" width="90px" height="90px"></a>
            {{Form::open(['url' => '/top', 'files' => true])}}
            <div class="post_input">
                {{Form::textarea('postcomment', null, ['class' => 'form-control', 'id' => 'textareaRemarks', 'placeholder' => '投稿内容を登録してください', 'rows' => '3'])}}
            </div>
        </div>
        <div class="post_btn">
        {{Form::submit('', ['class'=>'btn btn-primary btn-block'])}}
        </div>
        {{Form::close()}}
    </div>
</div>


<div class = "postlists">
    <h4>投稿内容一覧</h4>

    @foreach($postLists as $postLists)
        @if(Auth::user()->isFollowing($postLists->user->id) || Auth::id() == $postLists->user_id)
        <p class ="created_block">{{$postLists->created_at}}</p>
        <div class = "image_block">
            <a><img src="{{ asset('../storage/images/'.$postLists->user->images) }}" width="90px" height="90px"></a>
            <div class ="name_status">
                <p class ="user_block">{{$postLists->user->username}}</p>
                <p class ="post_block">{{$postLists->post}}</p>
            </div>
        </div>
        @if(Auth::id() == $postLists->user_id)
            <div class = "btn-area">
                <a class="btn btn-success pull-right js-modal-open" href="" post="{{ $postLists->post }}" data-target = "{{$postLists->id}}"></a>
                <a class="btn btn-danger" href="{{Route('delete',$postLists->id)}}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><div class = "btn-trash"></div></a>
            </div>
        
        @endif

            
        
        <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
                <div class="modal__content">
                    <form action="/post/edit/{{$postLists->id}}" method="post" >
                    <div class = "edit-container">
                        <textarea name="postcomment" class="modal_post"></textarea>
                    </div>
                    <p><input type="hidden" class="text-edit" value = "" name = "edit_id"></p>
                    <div class = "button_area">
                        <p><a class="js-modal-close" href=""></a></p>
                        <p><input type="submit" value = "" class ="btn-success"></p>
                    </div>
                </div><!--modal__inner-->
                {{csrf_field()}}
            </form>
        </div><!--modal-->

            
        @endif
    @endforeach
</div>
    




@endsection