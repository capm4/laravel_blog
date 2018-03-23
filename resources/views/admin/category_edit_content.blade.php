<div class="col-lg-10 offset-1">
    <a href="{{route('admin_categories')}}" class="btn btn-primary" style="margin-bottom: 20px">
        @lang('messages.back')
    </a>
    {!! Form::open(
                    [
                        'url'=>route('admin_edit_categories',array('id'=>$category->id)),
                        'class'=>'form-horizontal',
                        'method'=>'POST',
                        'enctype'=>'multipart/form-data'
                    ]) !!}
    @if($errors->has('title'))
        <div class="form-group">
            {!! Form::label('title',Lang::get('messages.title'),['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('title', old('title'),['class'=>'form-control ','style'=>'border-color: #dc3545','placeholder'=>Lang::get('messages.title')]) !!}
            </div>
            <div class="col-xs-offset-2 col-xs-8 text-danger">
                <p>{{$errors->first('title')}}</p>
            </div>

        </div>
    @else
        <div class="form-group">
            {!! Form::label('title',Lang::get('messages.title'),['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('title', $category->title,['class'=>'form-control','placeholder'=>Lang::get('messages.title')]) !!}
            </div>

        </div>
    @endif
    @if($errors->has('alias'))
        <div class="form-group">
            {!! Form::label('alias',Lang::get('messages.alias'),['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('alias', old('alias'),['class'=>'form-control','style'=>'border-color: #dc3545','placeholder'=>Lang::get('messages.alias')]) !!}
            </div>
            <div class="col-xs-offset-2 col-xs-8 text-danger">
                <p>{{$errors->first('alias')}}</p>
            </div>
        </div>
    @else
        <div class="form-group">
            {!! Form::label('alias',Lang::get('messages.alias'),['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::text('alias', $category->alias,['class'=>'form-control','placeholder'=>Lang::get('messages.alias')]) !!}
            </div>
        </div>
    @endif
        {!! Form::hidden('id',$category->id) !!}
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button(Lang::get('messages.submit'),['class'=>'btn btn-primary','type'=>'submit'])  !!}
        </div>
    </div>

    {!! Form::close() !!}



</div>