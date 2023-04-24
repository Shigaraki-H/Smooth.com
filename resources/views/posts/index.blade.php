@extends('layouts.login')

@section('content')


<div class="post_container">
    <div class ="mypost">
        <div class="post_images">
            <a><img src="{{ asset('../images/'.Auth::user()->images) }}" width="90px" height="90px"></a>
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
    <p>{{$postLists->post}}</p>
    <p>{{$postLists->created_at}}</p>

    @if(Auth::id() == $postLists->user_id)
    <div class = "btn-area">
        <a class="btn btn-success pull-right js-modal-open" href="" data-target = "{{$postLists->id}}"></a>
        <a class="btn btn-danger" href="{{Route('delete',$postLists->id)}}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><div class = "btn-trash"></div></a>
    </div>
    @else
    <div class = "btn-area">
    </div>
    @endif
    <div class="modal js-modal">
		<form action="/post/edit/{{$postLists->id}}" method="post" >
			<div class="modal__bg js-modal-close">

			</div>
			<div class="modal__content">
				<div class = "edit-container">
					<textarea name="postcomment"></textarea>
				</div>
				<div class = "button_area">
					<p><a class="js-modal-close" href="">閉じる</a></p>
				<p><input type="submit" value = "" class ="btn-success"></p>
				</div>
				<p><input type="hidden" class="text-edit" value = "" name = "edit_id"></p>
			</div><!--modal__inner-->
		</div><!--modal-->
		{{csrf_field()}}
        @endif
    @endforeach
    
</div>




@endsection