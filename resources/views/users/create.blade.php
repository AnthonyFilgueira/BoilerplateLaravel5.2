@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('flash::message')
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{trans('validation.new.user')}}</div>
                <div class="panel-body">
                @include ('partials.errors')
                
                {!! Form::open(['route' => 'users.store', 'method' => 'POST']) !!}
                  
                    @include('users.partials.fields')
                    <button type="submit" class="btn btn-primary">{!! trans('validation.create.user') !!}</button>
                    <a href="{{route('users.index')}}" class="btn btn-success">{!! trans('pagination.back') !!}</a>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection