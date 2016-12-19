<div class="form-group">
    {!! Form::label('name',trans('validation.attributes.name')) !!}
    {!! Form::text('name',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('last_name', trans('validation.attributes.last_name')) !!}
    {!! Form::text('last_name',null,['class'=>'form-control'])!!}
</div>
<div class="form-group">
    {!! Form::label('email', trans('validation.attributes.email')) !!}
    {!! Form::text('email',null,['class'=>'form-control','type'=>'email'])!!}

</div>
<div class="form-group">
    {!! Form::label('password', trans('validation.attributes.password')) !!}
    {!! Form::password('password',['class'=>'form-control'])!!}
</div>
@if(Auth::user()->role==="admin")
    <div class="form-group">
        {!! Form::label('role', trans('validation.attributes.role')) !!}
        {!! Form::select('role',[''=>trans('validation.select.role'),'client'=>trans('validation.users.client'),'admin'=>trans('validation.users.admin')],null,['class'=>'form-control']) !!}
    </div>
@endif