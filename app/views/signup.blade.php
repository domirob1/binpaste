@extends('base')

@section('content')
<div class="page-header">
  <h1>Sign Up</h1>
</div>

{{ Form::open(['url' => '/users/signup',
               'class' => 'form-horizontal', 
               'role' => 'form']) }}

<div class="form-group">
  {{ Form::label('email', 'Email Address', ['class' => 'col-sm-2 control-label']) }}
  <div class="col-sm-10">
    {{ Form::email('email', NULL, ['class' => 'form-control']) }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('password', 'Password', ['class' => 'col-sm-2 control-label']) }}
  <div class="col-sm-10">
    {{ Form::password('password', ['class' => 'form-control']) }}
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    {{ Form::submit('Sign Up', ['class' => 'btn btn-default']) }}
  </div>
</div>

{{ Form::close() }}

@stop
