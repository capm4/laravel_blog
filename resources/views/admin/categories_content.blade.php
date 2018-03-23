<a href="{{route('admin_create_category')}}" class="btn btn-primary" style="margin-bottom: 20px">
    @lang('messages.create_category')
</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">@lang('messages.title')</th>
        <th scope="col">@lang('messages.alias')</th>
        <th scope="col">@lang('messages.edit')</th>
        <th scope="col">@lang('messages.delete')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>
                 {{$category->title}}
            </td>
            <td>{{$category->alias}}</td>
            <td>

                <a href="{{route('admin_edit_categories',array('id'=>$category->id))}}" class="btn btn-primary">
                    @lang('messages.edit')
                </a>
            </td>
            <td>
                    {!! Form::open(
                   [
                       'url'=>route('admin_edit_categories',['id'=>$category->id]),
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