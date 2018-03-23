<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">text</th>
        <th>Delete</th>

    </tr>
    </thead>
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <th scope="row">{{$comment->id}}</th>
            <td>
                {{$comment->text}}
            </td>
            <td>
                {!! Form::open(
               [
                   'url'=>route('comment_delete',['id'=>$comment->id]),
                   'class'=>'form-horizontal',
                   'method'=>'POST'
               ]) !!}
                {{--{!! Form::hidden('_method','delete') !!}--}}
                {{method_field('DELETE')}}
                {!! Form::button(Lang::get('messages.delete'),['class'=>'btn btn-danger','type'=>'submit'])  !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>