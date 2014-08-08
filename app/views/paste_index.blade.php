@extends('base')

@section('content')

@if($my_pastes)
<div class="page-header">
  <h1>My pastes</h1>
</div>

<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Paste</th>
    </tr>
  </thead>

  <tbody>
  @foreach($my_pastes as $paste)
    <tr>
      <td><a href="/pastes/{{{ $paste->id }}}">{{{ $paste->name }}}</a></td>
      <td>{{ $paste->short_paste(80) }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endif


<div class="page-header">
  <h1>Public pastes</h1>
</div>

@if($public_pastes)
<table class="table table-striped table-hover">
  <thead>
    <tr>
      <th>Name</th>
      <th>Paste</th>
      <th>User</th>
    </tr>
  </thead>

  <tbody>
  @foreach($public_pastes as $paste)
    <tr>
      <td><a href="/pastes/{{{ $paste->id }}}">{{{ $paste->name }}}</a></td>
      <td>{{ $paste->short_paste() }}</td>
      <td>{{ $paste->user->email }}</td>
    </tr>
  @endforeach
  </tbody>
</table>
@endif

@stop
