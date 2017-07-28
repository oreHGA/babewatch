<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | Babewatch </title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    {{--  Include the necessary bootstrap and jquery here   --}}
</head>
<body>
   
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ rtrim(config('app.url'), '/') }}/dashboard">👶🏾</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ rtrim(config('app.url'), '/') }}/dashboard">Home</a></li>
                <li><a href="{{rtrim(config('app.url'), '/') . '/addfriend'}}" >Add a Friend</a></li>
                <li><a href="{{rtrim(config('app.url'), '/') . '/contact'}}" >Contact Us</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="fa fa-user-o" aria-hidden="true"></span> {{session('user_name')}}</a></li>
                {{-- TODO: Add dopdown for account management   --}}
                <li><a href="{{rtrim(config('app.url'), '/') . '/signout'}}" >
                        <span class="fa fa-sign-out" ></span>Sign Out
                    </a>
                </li>
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