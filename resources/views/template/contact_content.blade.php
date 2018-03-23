<div class="col-md-6 offset-md-3">
    <div class="well well-sm">
        {!! Form ::open(
                    [
                        'url'=>route('contact'),
                        'class'=>'form-horizontal',
                        'method'=>'POST',
                        'enctype'=>'multipart/form-data'
                    ])
         !!}
            <fieldset>
                <legend class="text-center">@lang('messages.contact_me')</legend>

                <!-- Name input-->
                @if($errors->has('name'))
                    <div class="form-group">
                        {!! Form::label('name',__('messages.name'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-xs-9">
                            {!! Form::text('name', '',['class'=>'form-control ','style'=>'border-color: #dc3545','placeholder'=>"Your Name"]) !!}
                        </div>
                        <div class="col-xs-offset-2 col-xs-8 text-danger">
                            <p>{{$errors->first('name')}}</p>
                        </div>

                    </div>
                @else
                    <div class="form-group">
                        {!! Form::label('name', __('messages.name'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-xs-9">
                            {!! Form::text('name', '',['class'=>'form-control','placeholder'=>"Your Name"]) !!}
                        </div>

                    </div>
                @endif

                <!-- Email input-->
                @if($errors->has('email'))
                    <div class="form-group">
                        {!! Form::label('email',__('messages.email'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-xs-9">
                            {!! Form::text('email', '',['class'=>'form-control ','style'=>'border-color: #dc3545','placeholder'=>"Your E-mail"]) !!}
                        </div>
                        <div class="offset-2 col-xs-8 text-danger">
                            <p>{{$errors->first('email')}}</p>
                        </div>

                    </div>
                @else
                    <div class="form-group">
                        {!! Form::label('email',__('messages.email'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-xs-9">
                            {!! Form::text('email', '',['class'=>'form-control','placeholder'=>"Your E-mail"]) !!}
                        </div>

                    </div>
                @endif

                <!-- Message body -->
                @if($errors->has('text'))
                    <div class="form-group">
                        {!! Form::label('text',__('messages.text'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-xs-9">
                            {!! Form::text('text', '',['class'=>'form-control ','style'=>'border-color: #dc3545','placeholder'=>"Your message"]) !!}
                        </div>
                        <div class="offset-2 col-xs-8 text-danger">
                            <p>{{$errors->first('text')}}</p>
                        </div>

                    </div>
                @else
                    <div class="form-group">
                        {!! Form::label('text',__('messages.text'),['class'=>'col-md-3 control-label']) !!}
                        <div class="col-xs-9">
                            {!! Form::textarea('text', '',['class'=>'form-control','placeholder'=>"Your message",'size' => '40x5']) !!}
                        </div>
                    </div>
                @endif

                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        {!! Form::button('Submit',['class'=>'btn btn-primary','type'=>'submit'])  !!}
                    </div>
                </div>
            </fieldset>
        {!! Form::close() !!}
    </div>
</div>