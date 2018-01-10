<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CHEGG</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="/libs/bootstrap/dist/css/bootstrap.min.css">
    <script src="/libs/jquery/dist/jquery.min.js"></script>
    <script src="/libs/angular/angular.min.js"></script>
    <script src="/libs/angular-route/angular-route.min.js"></script>
    <script src="/libs/pdfjs-dist/build/pdf.js"></script>
    <script src="/libs/angular-pdf/dist/angular-pdf.min.js"></script>
    <script src="/libs/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
    <link rel="stylesheet" href="/libs/font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/app.css">
    <!-- Styles -->

    {{--New--}}
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <!-- Custom CSS -->
    <link href="/css/style.css" rel='stylesheet' type='text/css'/>
    <!-- font CSS -->
    <!-- font-awesome icons -->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js-->
    <script src="/js/jquery-1.11.1.min.js"></script>
    <script src="/js/modernizr.custom.js"></script>
    <!--webfonts-->
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic'
          rel='stylesheet' type='text/css'>
    <!--//webfonts-->
    <!--animate-->
    <link href="/css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
    <!-- chart -->
    <script src="/js/Chart.js"></script>
    <!-- //chart -->
    <!--Calender-->
    <link rel="stylesheet" href="/css/clndr.css" type="text/css"/>
    <script src="/js/underscore-min.js" type="text/javascript"></script>
    <script src="/js/moment-2.2.1.js" type="text/javascript"></script>
    <script src="/js/clndr.js" type="text/javascript"></script>
    {{--<script src="/js/site.js" type="text/javascript"></script>--}}
<!--End Calender-->
    <!-- Metis Menu -->
    <script src="/js/metisMenu.min.js"></script>
    <script src="/js/custom.js"></script>
    <link href="/css/custom.css" rel="stylesheet">
    <!--//Metis Menu -->

    {{--End--}}

</head>
<body ng-app="App" class="cbp-spmenu-push cbp-spmenu-push-toright">
<div class="main-content">
@include('layouts.partials.leftNav')

    @include('layouts.partials.topNav')

    <!-- main content start-->
    <div id="page-wrapper">
        @yield('content')
    </div>
    <!--footer-->
    <div class="footer">
        <p>&copy; <?php echo Date('Y'); ?> Personal Library. All Rights Reserved | Carlos Moreira</p>
    </div>
    <!--//footer-->
</div>

<script src="/js/app.js"></script>
<script src="/js/services/HttpService.js"></script>

{{--New--}}
<!-- Classie -->
<script src="/js/classie.js"></script>
<script>
    var menuLeft = document.getElementById('cbp-spmenu-s1'),
        showLeftPush = document.getElementById('showLeftPush'),
        body = document.body;

    showLeftPush.onclick = function () {
        classie.toggle(this, 'active');
        classie.toggle(body, 'cbp-spmenu-push-toright');
        classie.toggle(menuLeft, 'cbp-spmenu-open');
        disableOther('showLeftPush');
    };


    function disableOther(button) {
        if (button !== 'showLeftPush') {
            classie.toggle(showLeftPush, 'disabled');
        }
    }
</script>
<!--scrolling js-->
<script src="/js/jquery.nicescroll.js"></script>
<script src="/js/scripts.js"></script>
<!--//scrolling js-->
<!-- Bootstrap Core JavaScript -->
<script src="/js/bootstrap.js"></script>
{{--End--}}

</body>
</html>
