@extends('base')

@section('content')
  <h2>Log In</h2>

  {{ Form::open(array('url' => '/login')) }}

  <p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::email('email') }}
  </p>

  <p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
  </p>

  <p>
    {{ Form::submit('Log In') }}
  </p>

  {{ Form::close() }}

@stop
