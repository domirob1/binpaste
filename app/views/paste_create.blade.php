@extends('base')

@section('content')
<h2>New Paste</h2>

{{ Form::open(array('url' => '/pastes')) }}

<p>
  {{ Form::label('name', 'Paste Name') }}
  {{ Form::text('name') }}
</p>

<p>
  {{ Form::label('paste', 'Paste') }}
  {{ Form::textarea('paste') }}
</p>

<p>
  {{ Form::submit('Paste It') }}
</p>

{{ Form::close() }}
@stop
