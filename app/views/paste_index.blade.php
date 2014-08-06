@extends('base')

@section('content')

<ul>
@foreach($pastes as $paste)
  <li><a href="/pastes/{{{ $paste->id }}}">{{{ $paste->name }}}</a></li>
@endforeach
</ul>
@stop
