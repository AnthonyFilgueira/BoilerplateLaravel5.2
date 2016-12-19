@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('flash::message')
        <div class="panel panel-default">
            <div class="panel-heading">{{ trans('validation.template.users') }}</div>
            <div class="panel-body">
                <p>
                    {!! link_to('users/create', trans('validation.new.user'),['class'=>'btn btn-info'])!!}
                </p>
                 @include('users.partials.table') 
            </div>
        </div>
    </div>
</div>
@endsection