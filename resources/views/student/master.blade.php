<! doctype html>
<html>
<head>
    <title>MyNav</title>
    <link href={{ url('assets/css/custom.bootstrap.css') }} rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url() }}#">Intersect</a>

        <div class="navbar-header navbar-right">
            <ul class="nav navbar-nav ">
                <li><a href="{{ url() }}">Home</a></li>
                <li><a href="{{ url('admin/subjects') }}">Subjects</a></li>
                <li><a href="{{ url('admin/programs') }}">Programs</a></li>
                <li><a href="{{ url('about') }}">About</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="row">
            <div class="col-lg-6">
                <h1>@yield('Title')</h1>
            </div>

        </div>
        <hr>

            @yield('content')
    </div>
</div>

</body>
<script src={{ url('assets/js/jquery/jquery-1.8.2.min.js') }}></script>
<script src={{ url('assets/js/bootstrap.min.js') }}></script>
</html>