<a href="{{route('admin_create_post')}}" class="btn btn-primary" style="margin-bottom: 20px">
    @lang('messages.create_post')
</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">@lang('messages.title')</th>
        <th scope="col">@lang('messages.alias')</th>
        <th scope="col">@lang('messages.author')</th>
        <th scope="col">@lang('messages.edit')</th>
        <th scope="col">@lang('messages.delete')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>
                <a href="{{route('post',array('id'=>$post->id))}}" style="color: black">
                    {{$post->title}}
                </a>
            </td>
            <td>{{$post->alias}}</td>
            <td>{{$post->user->nick}}</td>
            <td>

                <a href="{{route('admin_edit_post',array('id'=>$post->id))}}" class="btn btn-primary">
                    @lang('messages.edit')
                </a>
            </td>
            <td>
                    {!! Form::open(
                   [
                       'url'=>route('admin_edit_post',['id'=>$post->id]),
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