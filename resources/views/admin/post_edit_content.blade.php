<div class="col-lg-10 offset-1">
    <a href="{{route('admin_all_posts')}}" class="btn btn-primary" style="margin-bottom: 20px">
        @lang('messages.back')
    </a>
<!-- Title -->
    {!! Form::open(
                    [
                        'url'=>route('admin_edit_post',array('id'=>$post->id)),
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
                {!! Form::text('title', $post->title,['class'=>'form-control','placeholder'=>Lang::get('messages.title')]) !!}
            </div>

        </div>
    @endif
    <hr>
    <!-- Date/Time -->
    <p>{{'Posted on '.date_format($post->created_at, 'l jS F Y \o\n g:ia')}} by <span style="color: blue">{{$post->user->nick}}</span> </p>
    <hr>
    <!-- Preview Image -->
    {!! Html::image('/img/post/'.$post->storeName.'/'.$post->image,'',array('class'=>'img-fluid rounded')) !!}
    <hr>
    <div class="form-group">
        {{--{!! Form::label('images','Choose image',['class'=>'col-xs-2 control-label']) !!}--}}
        <div class="col-xs-offset-2 col-xs-8">
            {!! Form::file('image',['class'=>'filestyle','data-buttonText'=>Lang::get('messages.choose_file'),'data-buttonName'=>'btn btn-primary','data-placeholder'=>Lang::get('messages.choose_file_no')]) !!}
        </div>
    </div>
    @if($errors->has('text'))
        <div class="form-group">
            {!! Form::label('text',Lang::get('messages.text_post'),['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::textarea('text', old('text'),['id'=>'editor','class'=>'form-control','placeholder'=>Lang::get('messages.text_post')]) !!}
            </div>
            <div class="col-xs-offset-2 col-xs-8 text-danger">
                <p>{{$errors->first('text')}}</p>
            </div>
        </div>
    @else
        <div class="form-group">
            {!! Form::label('text',Lang::get('messages.text_post'),['class'=>'col-xs-2 control-label']) !!}
            <div class="col-xs-8">
                {!! Form::textarea('text', $post['text'],['id'=>'editor','class'=>'form-control','placeholder'=>Lang::get('messages.text_post')]) !!}
            </div>
        </div>
    @endif
    <div class="form-group">
        {!! Form::label('category',Lang::get('messages.category_uses').' '.$post->category->title,['class'=>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            {{Lang::get('messages.change_category')}}
            {!! Form::select("category", $categories);!!}
                </div>
    </div>
    {!! Form::hidden('userId',Auth::user()->id) !!}
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            {!! Form::button(Lang::get('messages.submit'),['class'=>'btn btn-primary','type'=>'submit'])  !!}
        </div>
    </div>

    {!! Form::close() !!}
    <script>
        CKEDITOR.replace('editor');
    </script>


</div>