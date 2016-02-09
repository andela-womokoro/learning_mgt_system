<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The 3 meta tags above *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>
    <!--<link href="/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-default header">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/" style="margin-top: -5px; margin-right: 55px;"><img src="/images/logo.png" /></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Explore <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="/">All Videos</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/videos/Computing">Computing Videos</a></li>
                            <li><a href="/videos/Science">Science Videos</a></li>
                            <li><a href="/videos/Technology">Technology Videos</a></li>
                            <li><a href="/videos/Engineering">Engineering Videos</a></li>
                            <li><a href="/videos/Arts_and_Humanities">Arts and Humanities Videos</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- <form class="navbar-form navbar-left" role="search">
                    <div class="input-group add-on">
                        <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit" style="color: #1abc9c;"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form> -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i>
                            @if (Auth::check())
                                {{ Auth::user()->username }}
                            @endif
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            @if (Auth::check())
                                <li><a href="/dashboard">Dashboard</a></li>
                                <li><a href="/videos/add/new">Upload Video</a></li>
                                <li><a href="/profile">My Profile</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/auth/logout">Log out</a></li>
                            @else
                                <li><a href="/auth/login">Sign in</a></li>
                                <li><a href="/auth/register">Register</a></li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <nav class="navbar navbar-default footer">
        <div class="container">
           <div class="row">
                <div class="col-md-12" style="padding-top: 25px; text-align: center;">
                    Copyright &copy; 2016. All rights reserved.
                </div>
            </div>
        </div>
    </nav>

    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
    <script src="/js//jquery-2.1.4.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</body>
</html>