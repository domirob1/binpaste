@extends('base')

@section('content')
  <h2>Sign Up</h2>

  {{ Form::open(array('url' => '/signup')) }}

  <p>
    {{ Form::label('email', 'Email Address') }}
    {{ Form::email('email') }}
  </p>

  <p>
    {{ Form::label('password', 'Password') }}
    {{ Form::password('password') }}
  </p>

  <p>
    {{ Form::submit('Sign Up') }}
  </p>

  {{ Form::close() }}

@stop
