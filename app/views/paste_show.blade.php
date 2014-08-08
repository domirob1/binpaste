@extends('base')

@section('content')

<div class="page-header">
  <h1>{{ $paste->name }}</h1>
</div>

<div class="well">{{ $paste->paste }}</div>

@if(Auth::check() && (Auth::user()->id == $paste->user->id))
<div class="form-group">
  <div class="col-md-1">
    <a class="btn btn-default" href="/pastes/{{{ $paste->id }}}/edit" role="button">Edit</a>
  </div>
  <div class="col-md-1">
  {{ Form::open(['method' => 'DELETE',
                 'action' => ['PasteController@destroy', $paste->id],
                 'role' => 'button']) }}
    <a class="btn btn-default" href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
  {{ Form::close() }}
  </div>
</div>
@endif
@stop
