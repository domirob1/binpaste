@extends('base')

@section('content')

<div>
  <h4>{{{ $paste->name }}}</h4>
  <textarea cols="80">{{{ $paste->paste }}}</textarea>
</div>

<div>
  <a href="/pastes/{{{ $paste->id }}}/edit">Edit</a>
  {{ Form::open(['method' => 'DELETE',
                 'action' => ['PasteController@destroy', $paste->id]]) }}
    <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
  {{ Form::close() }}
</div>
@stop
