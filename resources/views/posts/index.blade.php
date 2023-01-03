@extends('layouts.login')

@section('content')
{{Form::open(['url' => '/post', 'files' => true])}}
<div class ="mypost">
<a><img src="images/icon1.png"></a>
{{Form::textarea('postcomment', null, ['class' => 'form-control', 'id' => 'textareaRemarks', 'placeholder' => '投稿内容を登録してください', 'rows' => '3'])}}
{{Form::submit('投稿', ['class'=>'btn btn-primary btn-block'])}}
</div>
{{Form::close()}}

{{Form::open(['url' => '/post', 'files' => true])}}
<div class = "postlists">
    <h4>投稿内容一覧</h4>

    @foreach($postLists as $postLists)
    <p>{{$postLists->post}}</p>
    <p>{{$postLists->created_at}}</p>
    <div class = "btn-area">
        <p><a class="btn btn-success pull-right js-modal-open" href="" data-target = "{{$postLists->id}}"><img src="images/edit.png"></a></p>
        <p><a class="btn btn-danger" href="{{Route('delete',$postLists->id)}}" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png"></a></p>
    </div>
    <p><input type="hidden" class="text-edit" value = "" name = "edit_id"></p>
    @endforeach
    
</div>
<div class="modal js-modal">
    <form action="/edit/{{$postLists->id}}" method="post" >
        <div class="modal__bg js-modal-close">

        </div>
        <div class="modal__content">
            <div class = "edit-container">
                <textarea name="text_edit"></textarea>
            </div>
            <div class = "button_area">
                <p><a class="js-modal-close" href="">閉じる</a></p>
                <p><input type="submit" value = "更新" class ="btn-success"></p>
            </div>
            <p><input type="hidden" class="text-edit" value = "" name = "edit_id"></p>
        </div><!--modal__inner-->
    {{csrf_field()}}
    </form>
</div>
{{Form::close()}}

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
});
</script>


@endsection