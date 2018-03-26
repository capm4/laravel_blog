 <div data-form_commit_id="{{$comment->id}}">
    {!! Form::open(
    [
    'url'=>route('comment_comment_edit'),
    'class'=>'form-horizontal',
     'method'=>'POST',
     'enctype'=>'multipart/form-data'
    ]) !!}
     @csrf
    <div class="form-group">
        {!! Form::hidden('userId', Auth::user()->id) !!}
        {!! Form::hidden('commentId', $comment->id) !!}
        {!! Form::textarea('text', null,['id'=>'editor','class'=>'form-control','placeholder'=>"Input Text",'size' => '30x3']) !!}
    </div>
     {!! Form::button(Lang::get('messages.comment_title'),['class'=>'btn btn-primary','type'=>'submit'])  !!}
    {!! Form::close() !!}
 </div>
