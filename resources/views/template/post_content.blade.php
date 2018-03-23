<!-- Post Content Column -->
<div class="col-lg-8">
{{--@if($post)--}}
    <!-- Title -->
        <h1 class="mt-4">{{$post->title}}</h1>
        <hr>
        <!-- Date/Time -->
        <p>@lang('messages.created_at'){{' '.date_format($post->created_at, 'l jS F Y \o\n g:ia')}} by <span style="color: blue">{{$post->user->nick}}</span> </p>
        <hr>
        <!-- Preview Image -->
        {!! Html::image('/img/post/'.$post->storeName.'/'.$post->image,'',array('class'=>'img-fluid rounded')) !!}

        <hr>
        <p>
            {!! $post->text !!}
        </p>
        <hr>
        @if(Auth::user())
        <div class="card my-4">
            <h5 class="card-header">@lang('messages.comment_title'):</h5>
            <div class="card-body">
                {!! Form::open(
                    [
                        'url'=>route('comment_post_edit'),
                        'class'=>'form-horizontal',
                        'method'=>'POST',
                        'enctype'=>'multipart/form-data'
                    ]) !!}
                    <div class="form-group">
                        {!! Form::hidden('userId', Auth::user()->id) !!}
                        {!! Form::hidden('postId', $post->id) !!}
                        {!! Form::textarea('text', null,['id'=>'editor','class'=>'form-control','placeholder'=>"Input Text",'size' => '30x3']) !!}
                    </div>
                <button class="btn btn-primary" id="createCommitToPost">
                        @lang('messages.comment_title')
                </button>
                {!! Form::close() !!}
            </div>
        </div>
        @endif
        @if($post->comments)
            @foreach($post->comments as $comment)
            <div class="comment mb-2 row">
                <div class="comment-avatar col-md-1 col-sm-2 text-center pr-1">
                    {!! Html::image('/img/user/'.$comment->user->storeName.'/'.$comment->user->image,'',array('class'=>'mx-auto rounded-circle img-fluid','style'=>'width: 50px')) !!}
                </div>
                <div class="comment-content col-md-11 col-sm-10">
                    <h6 class="card-header"><span style="color: #1d75b3">{{$comment->user->nick}}</span>@if($comment->created_at)<br><span style="font-size: 13px"> @lang('messages.created_at') : {{date_format($post->created_at, 'l jS F Y \o\n g:ia')}}</span>@endif</h6>
                    <div class="card-body" style="border: 1px solid rgba(0,0,0,.03)" >
                        <p>
                            {!! $comment->text!!}
                        </p>
                    </div>
                </div>
            </div>
            @if(Auth::user())
                @include('comment.comment_create')
                <div id="CommitToCommit-{{$comment->id}}">
                </div>
                <script>
                </script>
            @endif
                @include('comment.comment_to_comment')
            @endforeach
        @endif
    {{--@endif--}}
    <div id="CommitToPost">
    </div>
</div>
