<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHEGG</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="libs/bootstrap/dist/css/bootstrap.min.css">
    <script src="libs/jquery/dist/jquery.min.js"></script>
    <script src="libs/angular/angular.min.js"></script>
    <script src="libs/angular-route/angular-route.min.js"></script>
    <script src="libs/pdfjs-dist/build/pdf.js"></script>
    <script src="libs/angular-pdf/dist/angular-pdf.min.js"></script>
    <script src="libs/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <link rel="stylesheet" href="libs/font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/app.css">
    <!-- Styles -->

</head>

{{--<div class="flex-center position-ref full-height">--}}
{{--@if (Route::has('login'))--}}
{{--<div class="top-right links">--}}
{{--@if (Auth::check())--}}
{{--<a href="{{ url('/home') }}">Home</a>--}}
{{--@else--}}
{{--<a href="{{ url('/login') }}">Login</a>--}}
{{--<a href="{{ url('/register') }}">Register</a>--}}
{{--@endif--}}
{{--</div>--}}
{{--@endif--}}
{{--</div>--}}

<body ng-app="App">
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CHEGG</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#/">Library</a>
                </li>
                <li>
                    <a href="#">Manage</a>
                </li>
                <li>
                    <a href="#">Notes</a>
                </li>
                
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<div class="container">
    <!--<div class="row">-->
    <!--<div class="col-lg-12">-->
    <!--<h1 class="page-header">CHEGG-->
    <!--<small> - Personal Project</small>-->
    <!--</h1>-->
    <!--</div>-->
    <!--</div>-->
    <div ng-view=""></div>
</div>

<hr>
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright © Your Website 2017</p>
    </div>
    <!-- /.container -->
</footer>
<script src="js/app.js"></script>

</body>
</html>
