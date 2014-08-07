@extends('base')

@section('content')
<h2>Edit Paste</h2>

{{ Form::model($paste, ['method' => 'put',
                        'action' => ['PasteController@update', $paste->id]]) }}

<p>
  {{ Form::label('name', 'Paste Name') }}
  {{ Form::text('name') }}
</p>

<p>
  {{ Form::label('paste', 'Paste') }}
  {{ Form::textarea('paste') }}
</p>

<p>
  {{ Form::label('public', 'Public') }}
  {{ Form::checkbox('public') }}
</p>

<p>
  {{ Form::submit('Paste It') }}
</p>

{{ Form::close() }}
@stop
