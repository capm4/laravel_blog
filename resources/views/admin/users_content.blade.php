<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">@lang('messages.name')</th>
        <th scope="col">@lang('messages.nick')</th>
        <th scope="col">@lang('messages.email')</th>
        <th scope="col">@lang('messages.role')</th>
        <th scope="col">@lang('messages.sum_of_commit')</th>
        <th scope="col">@lang('messages.create_at')</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>
                <a href="{{route('profile',array('id'=>$user->id))}}" style="color: black">
                    {{$user->name}}
                </a>
            </td>
            <td>{{$user->nick}}</td>
            <td>{{$user->email}}</td>
            <td>
                @foreach($user->roles as $role)
                    {{$role->name}}<br>
                @endforeach
            </td>
            <td>
                    {{count($user->comments)}}
            </td>
            <td>{{$user->created_at}}</td>
        </tr>
    @endforeach
    </tbody>


</table>