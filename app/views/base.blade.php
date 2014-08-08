<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>@yield('title', 'Binpaste')</title>

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/theme.css" rel="stylesheet">
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="/">Binpaste</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="/pastes">Pastes</a></li>
@if(Auth::check())
            <li><a href="/pastes/create">New Paste</a></li>
            <li><a href="/users/logout">Log Out ({{ Auth::user()->email }})</a></li>
@else
            <li><a href="/users/signup">Sign Up</a></li>
            <li><a href="/users/login">Log In</a></li>
@endif
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container theme-showcase" role="main">

    @if(Session::get('flash_message'))
        <div class="row alert alert-info" role="alert">{{ Session::get('flash_message') }}</div>
    @endif

    @foreach($errors->all() as $message) 
        <div class="row alert alert-danger" role="alert">{{ $message }}</div>
    @endforeach

    @yield('content')

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    @yield('footer')
  </body>
</html>
