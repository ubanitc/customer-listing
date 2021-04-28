<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        {{-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet"> --}}

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> 

        <script src="/js/app.js"></script>
        <link href="/css/app.css" rel="stylesheet">
        <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js" defer></script>
        <link href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                
                font-family: 'Source Sans Pro', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            .font-size-lg { font-size: 2rem; }
            .font-size-md { font-size: 1.2rem; }
            tr{
                cursor: pointer;
            }
        </style>
    </head>
    <body>

    <nav class="navbar navbar-light bg-light mb-4">
  <div class="container">
    <div class="pull-left">


                <h3 class="font-weight-bold font-size-lg">Customers</h3>
    </div>
                
            <div class="pull-right">
                    @yield('add_button')
                    </div>
    </div>
</nav>
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
            
              @yield('content')
            </div>
        </div>
    </body>
</html>
