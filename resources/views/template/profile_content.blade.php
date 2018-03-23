<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-xs-0 offset-sm-0 offset-md-3 offset-lg-3 toppad" >
    <div class="panel panel-info">
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    {!! Html::image('/img/user/'.$user->storeName.'/'.$user->image,'',array('class'=>'img-circle img-responsive','style'=>'width: 140px; margin-bottom: 20px')) !!}
                </div>

                <div class=" col-md-9 col-lg-9 ">
                    <table class="table table-user-information">
                        <tbody>
                        <tr>
                            <td>@lang('messages.nick'):</td>
                            <td>{{$user->nick}}</td>
                        </tr>
                        <tr>
                            <td>@lang('messages.name'):</td>
                            <td>{{$user->name}}</td>
                        </tr>
                        <tr>
                            <td>@lang('messages.surname'):</td>
                            <td>{{$user->surname}}</td>
                        </tr>

                        <tr>
                        <tr>
                            <td>@lang('messages.email'):</td>
                            <td>{{$user->email}}</td>
                            </td>
                        </tr>
                        <tr>
                            <td>@lang('messages.create_at'):</td>
                            <td>{{$user->created_at}}</td>
                        </tr>
                        @if(Auth::user()->id == $user->id)
                            <tr>
                                <td>
                                    <a href="{{route('profile_edit', array('id'=>$user->id))}}">
                                        @lang('messages.edit')
                                    </a>
                                </td>
                                <td>
                                </td>
                            </tr>
                        @endif
                        @if(Gate::allows('isAdmin',Auth::user()))
                            <tr>
                                <td>
                                    @lang('messages.last_visit')
                                </td>
                                <td>
                                    {{$user->updated_at}}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    @lang('messages.role')
                                </td>
                                <td>
                                    @foreach($user->roles as $role)
                                        {{$role->name}}<br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#updateRole">
                                        @lang('messages.add_role')
                                    </button>
                                </td>
                                <td>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#deleteRole">
                                        @lang('messages.delete_role')
                                    </button>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @if(Auth::user()->roles()->where('name', 'admin'))
            <!-- Modal upDate -->
                <div class="modal fade" id="updateRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                {!! Form::open(
                                [
                                    'url'=>route('admin_user_add_role',array('id'=>$user->id)),
                                    'class'=>'form-horizontal',
                                    'method'=>'POST',
                                    'enctype'=>'multipart/form-data'
                                ]) !!}
                                <div class="form-group">
                                    {!! Form::label('roleId',Lang::get('messages.role_uses'),['class'=>'col-xs-2 control-label']) !!}
                                    <div class="col-xs-8">
                                        {{Lang::get('messages.add_role')}}
                                        {!! Form::select("roleId", $rolesAdd);!!}
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                {!! Form::button(Lang::get('messages.submit'),['class'=>'btn btn-primary','type'=>'submit'])  !!}
                                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>



                <!-- Modal Delete-->
                <div class="modal fade" id="deleteRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                {!! Form::open(
                                [
                                    'url'=>route('admin_user_delete_role',array('id'=>$user->id)),
                                    'class'=>'form-horizontal',
                                    'method'=>'POST',
                                    'enctype'=>'multipart/form-data'
                                ]) !!}
                                {{--{!! Form::hidden('_method','delete') !!}--}}
                                {{method_field('DELETE')}}
                                <div class="form-group">
                                    {!! Form::label('roleId',Lang::get('messages.role_uses'),['class'=>'col-xs-2 control-label']) !!}
                                    <div class="col-xs-8">
                                        {{Lang::get('messages.delete_role')}}
                                        {!! Form::select("roleId", $roles);!!}
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                {!! Form::button(Lang::get('messages.submit'),['class'=>'btn btn-primary','type'=>'submit'])  !!}
                                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('messages.close')</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
         @endif

    </div>
</div>
