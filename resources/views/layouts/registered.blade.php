<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | Babewatch </title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{--  Include the necessary bootstrap and jquery here   --}}
</head>
<body>
    <nav class="navbar navbar-default">
            {{--  Header Section   --}}
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="{{ rtrim(config('app.url'), '/') }}" class="navbar-brand">👶🏾</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ rtrim(config('app.url'), '/') }}">Home</a></li>
                <li><a href="{{rtrim(config('app.url'), '/') . '/addfriend'}}" >Add a Friend</a></li>
                <li><a href="{{rtrim(config('app.url'), '/') . '/contact'}}" >Contact Us</a></li>
                <li><a href="{{rtrim(config('app.url'), '/') . '/signout'}}" >Sign Out</a></li>
            </ul>
        </div>
    </nav>

    @yield('content')

    {{-- Include any necessary JS here   --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    @yield('js')
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script>
</body>
</html>