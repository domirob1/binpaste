@extends('base')

@section('content')

<h2>My pastes</h2>
@if($my_pastes)
<ul>
@foreach($my_pastes as $paste)
  <li><a href="/pastes/{{{ $paste->id }}}">{{{ $paste->name }}}</a></li>
@endforeach
</ul>
@endif

<h2>Public pastes</h2>
@if($public_pastes)
<ul>
@foreach($public_pastes as $paste)
  <li><a href="/pastes/{{{ $paste->id }}}">{{{ $paste->name }}} ({{{ $paste->user->email }}})</a></li>
@endforeach
</ul>
@endif

@stop
