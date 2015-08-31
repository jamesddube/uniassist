<! doctype html>
<html>
<head>
    <title>MyNav</title>
    <link href={{ url('assets/css/custom.bootstrap.css') }} rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Intersect</a>

        <div class="navbar-header navbar-right">
            <ul class="nav navbar-nav ">
                <li><a href="#">Home</a></li>
                <li><a href="#">Admin</a></li>
                <li><a href="#">About Me</a></li>
            </ul>
        </div>
    </div>
</nav>
@yield('body')