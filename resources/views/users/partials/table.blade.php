<div class="table-responsive container-fluid">
<table id="users" class="table table-striped table-bordered">
    <thead>
        <tr>
        <th class="text-center">#</th>
        <th class="text-center">{{trans('validation.attributes.name')}}</th>
        <th class="text-center">{{trans('validation.attributes.email')}}</th>
        <th class="text-center">{{trans('validation.attributes.role')}}</th>
        <th class="text-center">{{trans('validation.attributes.action')}}</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
    <tr data-id="{{ $user->id }}">
        <td class="text-center">{{$user->id}}</td>
        <td class="text-center">{{$user->full_name}}</td>
        <td class="text-center">{{$user->email}}</td>
        <td class="text-center">{{$user->role}}</td>
        <td class="text-center"> 
            {!! Form::open(['route' => ['users.destroy',$user], 'method' => 'DELETE']) !!}
                    <a href="{!! route('users.show', [$user]) !!}" class="btn btn-primary"><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('users.edit', [$user]) !!}" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></a>
                    <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i></button>
            {!! Form::close() !!}
        </td>
    </tr>
    @endforeach
    </tbody>
</table>
{!! $users->render() !!}
</div>