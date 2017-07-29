<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | Babewatch </title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/babewatch.css') }}" rel="stylesheet">
    {{--  Include the necessary bootstrap and jquery here   --}}
      <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
</head>
<body>
    @yield('content')

    {{-- Include any necessary JS here   --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    @yield('js')
    <script src="{{ asset('js/babewatch.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
</body>
</html>