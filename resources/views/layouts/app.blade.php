<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div id="app">
        @include('layouts.navbar')
        
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    @yield('content')
                </div>
                @if(Request::url() !== "http://blog.dev/login" && Request::url() !== "http://blog.dev/register")
                    <div class="col-md-3 col-md-offset-1">
                        @include('layouts.sidebar') 
                    </div>
                @endif
            </div>
            @include('layouts.errors')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
