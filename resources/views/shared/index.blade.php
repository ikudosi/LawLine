<!DOCTYPE html>
<html>
<head>
    <title>iDash</title>
    <link rel="stylesheet" type="text/css" href="/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/assets/sass/style.css">
    <script type="text/javascript" src="/assets/js/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="/bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>
<header>
    <nav class="navbar navbar-light bg-faded">
        <ul class="nav navbar-nav">
            <ul class="nav-item"><a href="/">Home</a></ul>
            <ul class="nav-item"><a href="/github" target="_blank">GitHub</a></ul>
        </ul>
        <ul class="nav navbar-nav form-inline float-xs-right">
            @if ( ! Auth::check() )
                <li class="nav-item"><a href="/register">Register</a></li>
                <li class="nav-item"><a href="/login">Login</a></li>
            @else
                <li class="nav-item"><a href="/logout">Logout</a></li>
            @endif
        </ul>
    </nav>
</header>
<div class="app_container container">
    @yield('content')
</div>
</body>
</html>
