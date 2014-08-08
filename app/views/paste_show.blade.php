@extends('base')

@section('content')

<div>
  <h4>{{{ $paste->name }}} ({{{ $paste->public ? 'public' : 'private' }}})</h4>
  <textarea cols="80" readonly>{{{ $paste->paste }}}</textarea>
</div>

@if(Auth::user()->id == $paste->user->id)
<div>
  <a class="btn btn-default" href="/pastes/{{{ $paste->id }}}/edit">Edit</a>
  {{ Form::open(['method' => 'DELETE',
                 'action' => ['PasteController@destroy', $paste->id]]) }}
    <a class="btn btn-default" href='javascript:void(0)' onClick='parentNode.submit();return false;'>Delete</a>
  {{ Form::close() }}
</div>
@endif
@stop
