@if(Auth::user())
    <div class="col-12" style="margin-bottom: 10px">
        <a class="text-right small" style="color: #0f74a8; padding-left: 65px" data-comment-id ="{{$comment->id}}">
            <i class="ion-reply"></i> {{Lang::get('messages.reply')}}
        </a>
        <div class="card-body" style="margin-left: 25px " data-form_create_commit_id="{{$comment->id}}" id = 'form_create_commit_id_{{$comment->id}}'>
        </div>
    </div>

@endif