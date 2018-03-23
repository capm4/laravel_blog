<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-xs-0 offset-sm-0 offset-md-3 offset-lg-3 toppad" >
    <div class="panel panel-info">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    {!! Html::image('/img/user/'.$user->id.'/'.$user->image,'',array('class'=>'img-circle img-responsive','style'=>'width: 140px; margin-bottom: 20px')) !!}

                </div>
                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        {!! Form::open(
                                   [
                                       'url'=>route('profile_edit',array('id'=>$user->id)),
                                       'class'=>'form-horizontal',
                                       'method'=>'POST',
                                       'enctype'=>'multipart/form-data'
                                   ])
                                   !!}
                        <tbody>
                        <tr>
                            <td>@lang('messages.nick'):</td>
                            <td>
                                @if($errors->has('nick'))
                                    <div class="form-group">
                                        {!! Form::text('nick', $user->nick,['class'=>'form-control ','style'=>'border-color: #dc3545','placeholder'=>"Page Name"]) !!}
                                        <div class="col-xs-offset-2 col-xs-8 text-danger">
                                            <p>{{$errors->first('nick')}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        {!! Form::text('nick', $user->nick,['class'=>'form-control']) !!}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('messages.name'):</td>
                            <td>
                                @if($errors->has('name'))
                                    <div class="form-group">
                                        {!! Form::text('name', $user->name,['class'=>'form-control ','style'=>'border-color: #dc3545']) !!}
                                        <div class="col-xs-offset-2 col-xs-8 text-danger">
                                            <p>{{$errors->first('name')}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        {!! Form::text('name', $user->name,['class'=>'form-control']) !!}
                                    </div>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('messages.surname'):</td>
                            <td>
                                @if($errors->has('surname'))
                                    <div class="form-group">
                                        {!! Form::text('surname', $user->surname,['class'=>'form-control ','style'=>'border-color: #dc3545']) !!}
                                        <div class="col-xs-offset-2 col-xs-8 text-danger">
                                            <p>{{$errors->first('surname')}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        {!! Form::text('surname', $user->surname,['class'=>'form-control']) !!}
                                    </div>
                                @endif
                            </td>
                        </tr>

                        <tr>
                        <tr>
                            <td>@lang('messages.email'):</td>
                            <td>
                                @if($errors->has('email'))
                                    <div class="form-group">
                                        {!! Form::text('email', $user->email,['class'=>'form-control ','style'=>'border-color: #dc3545']) !!}
                                        <div class="col-xs-offset-2 col-xs-8 text-danger">
                                            <p>{{$errors->first('email')}}</p>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group">
                                        {!! Form::text('email', $user->email,['class'=>'form-control']) !!}
                                    </div>
                                @endif
                            </td>
                            </td>
                        </tr>
                        <tr>
                        <tr>
                            <td>
                                <div class="form-group ">
                                    {!! Form::label('images',__('messages.change_img'),['class'=>'col-xs-2 control-label']) !!}
                                </div>
                            </td>
                            <td>
                                {!! Form::file('image',['class'=>'filestyle','data-buttonText'=>__('messages.choose_file'),'data-buttonName'=>'btn btn-primary','data-placeholder'=>__('messages.no_file')]) !!}
                            </td>
                        </tr>
                        <tr>
                           <td>
                               <input class='btn btn-primary' type="submit" value="Submit"/>
                           </td>
                            <td></td>
                        </tr>

                        </tbody>
                        {!! Form::close() !!}
                    </table>
                </div>
            </div>

        </div>

    </div>
</div>