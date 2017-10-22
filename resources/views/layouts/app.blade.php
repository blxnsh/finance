<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Личный кабинет</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    body{
      padding-top:1rem;
    }
    .btn{
      width:100%;
    }
    </style>
</head>
<body>
    <div id="app">

                        @guest
<div class="panel panel-default">
  <div class="panel-body">
    <a href="{{ route('login') }}"><button class="btn btn-primary">Login</button></a>
  </div>
</div>
    <div class="panel panel-default">

  <div class="panel-body">
    <a href="{{ route('register') }}"><button class="btn btn-primary">Register</button></a>
  </div>
</div>

                        @else
                          <div class="panel panel-default">
                          <div class="panel-heading">
                          Вы вошли как :  <p style="font-weight:600; color:#FF3232;">{{ Auth::user()->name }}</p>
                          </div>
    <div class="panel-body">
                                      <a href="{{ route('logout') }}">  <button class="btn btn-primary"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </button></a>
                                      </div>
                                    </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                        @endguest

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
