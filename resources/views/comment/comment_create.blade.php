@if(Auth::user())
    {{--<a href="" class="text-right small">--}}
    <div class="col-12">
    <a class="text-right small" style="color: #0f74a8; padding-left: 65px" onclick="open{{$comment->id}}()">
        <i class="ion-reply"></i> {{Lang::get('messages.reply')}}
    </a>
    </div>
    <div class="card-body" style="height: 0; visibility: hidden; margin-left: 50px " id="{{$comment->id}}">
        {!! Form::open(
            [
                'url'=>route('comment_comment_edit'),
                'class'=>'form-horizontal',
                'method'=>'POST',
                'enctype'=>'multipart/form-data'
            ]) !!}
        <div class="form-group">
            {!! Form::hidden('userId', Auth::user()->id) !!}
            {!! Form::hidden('commentId', $comment->id) !!}
            {!! Form::textarea('text', null,['id'=>'editor','class'=>'form-control','placeholder'=>"Input Text",'size' => '30x3']) !!}
        </div>
        <button class="btn btn-primary createCommitToCommit" onclick="close{{$comment->id}}()">
            @lang('messages.comment_title')
        </button>
        {!! Form::close() !!}
    </div>
    <script>
        function open{{$comment->id}}() {
            if(document.getElementById({{$comment->id}}).style.height == "auto"){
                document.getElementById({{$comment->id}}).style.height = "0px";
                document.getElementById({{$comment->id}}).style.visibility = "hidden";
            }else {
                document.getElementById({{$comment->id}}).style.height = "auto";
                document.getElementById({{$comment->id}}).style.visibility = "visible";
            }
        }
        function close{{$comment->id}}() {
            document.getElementById({{$comment->id}}).style.height = "0px";
            document.getElementById({{$comment->id}}).style.visibility = "hidden";
        }
    </script>
@endif