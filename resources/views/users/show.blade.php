@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $user->full_name }}</div>
                    <div class="panel-body">
                        {!! Form::model($user,['route' => ['users.show',$user], 'method' => 'GET']) !!}
                            <div class="form-group">
                                {!! Form::label('name', trans('validation.attributes.name')) !!}
                                {!! Form::text('name',null,['class'=>'form-control','readonly'])!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('last_name', trans('validation.attributes.last_name')) !!}
                                {!! Form::text('last_name',null,['class'=>'form-control','readonly'])!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('email', trans('validation.attributes.email')) !!}
                                {!! Form::text('email',null,['class'=>'form-control','type'=>'email','readonly'])!!}
                            </div>
                            <div class="form-group">
                                {!! Form::label('role', trans('validation.attributes.role')) !!}
                                {!! Form::select('role',[''=>trans('validation.select.role'),'client'=>trans('validation.users.client'),'admin'=>trans('validation.users.admin')],null,['class'=>'form-control','disabled'=>'true']) !!}
                            </div>
                            <div class="text-center">
                                <a class="btn btn-success" href="{{ route('users.index') }}"> {!! trans('pagination.back') !!}</a>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection