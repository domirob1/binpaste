@extends('base')

@section('content')

<div>
  <h4>{{{ $paste->name }}} ({{{ $paste->public ? 'public' : 'private' }}})</h4>
  <textarea cols="80" readonly>{{{ $paste->paste }}}</textarea>
</div>

<div>
  <a href="/pastes/{{{ $paste->id }}}/edit">Edit</a>
  {{ Form::open(['method' => 'DELETE',
                 'action' => ['PasteController@destroy', $paste->id]]) }}
    <a href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
  {{ Form::close() }}
</div>
@stop
