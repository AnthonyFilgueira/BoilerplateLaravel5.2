@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('flash::message')
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('validation.edit.user').':' }} {{ $user->full_name }}</div>
                <div class="panel-body">
                @include ('partials.errors')
                {!! Form::model($user,['route' => ['users.update',$user], 'method' => 'PUT']) !!}
                  
                  @include('users.partials.fields')
                  <button type="submit" class="btn btn-primary">{!! trans('validation.edit.user') !!}</button>
                  @if(Auth::user()->role==="admin")
                    <a href="{{route('users.index')}}" class="btn btn-success">{!! trans('pagination.back') !!}</a>
                  @endif
                {!! Form::close() !!}
                </div>
                 
            </div>
        </div>
    </div>
</div>
@endsection