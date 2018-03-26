<div class="comment mb-2 row">
    <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
        {!! Html::image('/img/user/'.$comment->user->storeName.'/'.$comment->user->image,'',array('class'=>'mx-auto rounded-circle img-fluid','style'=>'width: 50px')) !!}
    </div>
    <div class="comment-content col-md-11 col-sm-10">
        <h6 class="card-header"><span style="color: #1d75b3">{{$comment->user->nick}}</span> @if($comment->created_at)<br><span style="font-size: 13px"> @lang('messages.created_at') : {{date_format($comment->created_at, 'l jS F Y \o\n g:ia')}}</span>@endif</h6>
        <div class="card-body" style="border: 1px solid rgba(0,0,0,.03)" >
            <p>
                {!! $comment->text!!}
            </p>
        </div>
    </div>
    @if(Auth::user())
       @include('comment.comment_create')
    @endif
</div>