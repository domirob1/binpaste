@extends('base')

@section('content')
<h2>Edit Paste</h2>

{{ Form::model($paste, ['method' => 'put',
                        'action' => ['PasteController@update', $paste->id],
                        'class' => 'form-horizontal',
                        'role' => 'form']) }}

<div class="form-group">
  {{ Form::label('name', 'Paste Name') }}
  {{ Form::text('name') }}
</div>

<div class="form-group">
  {{ Form::label('paste', 'Paste') }}
  {{ Form::textarea('paste') }}
</div>

<div class="form-group">
  {{ Form::label('public', 'Public') }}
  {{ Form::checkbox('public') }}
</div>

<div class="form-group">
  {{ Form::submit('Paste It', ['class' => 'btn btn-default']) }}
</div>

{{ Form::close() }}
@stop
