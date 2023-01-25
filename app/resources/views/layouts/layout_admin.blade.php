<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Replace') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>body{background-color: #99cccc;}</style>
    <link href="{{ asset('css/style2.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Replace
                </a>
            </div>
        
         <div class="my-navbar-control">
            @if(Auth::guard('admin')->check())
               <span class="my-navbar-item">{{ Auth::guard('admin')->user()->name }}</span>
               /
               <a href="#" id="logout" class="my-navbar-item">ログアウト</a>
               <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                   @csrf
               </form>
               <script>
                   document.getElementById('logout').addEventListener('click', function(event) {
                   event.preventDefault();
                   document.getElementById('logout-form').submit();
                   });
               </script>
            @else
               <a class="my-navbar-item" href="{{ route('admin.login') }}">ログイン</a>
            @endif
         </div>
        </nav>
            @yield('content')
    </div>
    @yield('js')
</body>
</html>