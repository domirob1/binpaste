@extends('base')

@section('content')

<div class="page-header">
  <h1>Edit Paste</h1>
</div>

{{ Form::model($paste, ['method' => 'put',
                        'action' => ['PasteController@update', $paste->id],
                        'class' => 'form-horizontal',
                        'role' => 'form']) }}

<div class="form-group">
  {{ Form::label('name', 'Paste Name', ['class' => 'col-sm-2 control-label']) }}
  <div class="col-sm-10">
    {{ Form::text('name', NULL, ['class' => 'form-control']) }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('public', 'Public', ['class' => 'col-sm-2 control-label']) }}
  <div class="col-sm-10">
    {{ Form::checkbox('public', NULL, ['class' => 'form-control']) }}
  </div>
</div>

<div class="form-group">
  {{ Form::label('paste', 'Paste', ['class' => 'col-sm-2 control-label']) }}
  <div class="col-sm-10">
    {{ Form::textarea('paste', NULL, ['class' => 'form-control']) }}
  </div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    {{ Form::submit('Paste It', ['class' => 'btn btn-default']) }}
  </div>
</div>

{{ Form::close() }}
@stop
