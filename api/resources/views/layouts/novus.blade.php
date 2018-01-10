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
@if(Auth::check())
    <!--left-fixed -navigation-->
        <div class=" sidebar" role="navigation">
            <div class="navbar-collapse">
                <nav class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left cbp-spmenu-open" id="cbp-spmenu-s1">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/" class="active">
                                <i class="fa fa-book nav_icon"></i>Read
                            </a>
                        </li>
                        <li>
                            <a href="/books/manage">
                                <i class="fa fa-tasks nav_icon"></i>Manage
                            </a>
                        </li>
                        {{--<li class="">--}}
                        {{--<a href="#"><i class="fa fa-book nav_icon"></i>UI Elements <span--}}
                        {{--class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level collapse">--}}
                        {{--<li>--}}
                        {{--<a href="general.html">General<span class="nav-badge-btm">08</span></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="typography.html">Typography</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /nav-second-level -->--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="widgets.html"><i class="fa fa-th-large nav_icon"></i>Widgets <span--}}
                        {{--class="nav-badge-btm">08</span></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-envelope nav_icon"></i>Mailbox<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level collapse">--}}
                        {{--<li>--}}
                        {{--<a href="inbox.html">Inbox <span class="nav-badge-btm">05</span></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="compose.html">Compose email</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- //nav-second-level -->--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="tables.html"><i class="fa fa-table nav_icon"></i>Tables <span--}}
                        {{--class="nav-badge">05</span></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-check-square-o nav_icon"></i>Forms<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level collapse">--}}
                        {{--<li>--}}
                        {{--<a href="forms.html">Basic Forms <span class="nav-badge-btm">07</span></a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="validation.html">Validation</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- //nav-second-level -->--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-file-text-o nav_icon"></i>Pages<span--}}
                        {{--class="nav-badge-btm">02</span><span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level collapse">--}}
                        {{--<li>--}}
                        {{--<a href="login.html">Login</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="signup.html">SignUp</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="blank-page.html">Blank Page</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- //nav-second-level -->--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="charts.html" class="chart-nav"><i class="fa fa-bar-chart nav_icon"></i>Charts <span--}}
                        {{--class="nav-badge-btm pull-right">new</span></a>--}}
                        {{--</li>--}}
                    </ul>
                    <!-- //sidebar-collapse -->
                </nav>
            </div>
        </div>
        <!--left-fixed -navigation-->
@endif
<!-- header-starts -->
    <div class="sticky-header header-section ">
        <div class="header-left">
        @if(Auth::check())
            <!--toggle button start-->
                <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                <!--toggle button end-->
        @endif
        <!--logo -->
            <div class="logo">
                <a href="index.html">
                    <h1>Personal CHEGG</h1>
                    <span>Library</span>
                </a>
            </div>
            <!--//logo-->

        @if(Auth::check())
            <!--search-box-->
                <div class="search-box">
                    <form class="input">
                        <input class="sb-search-input input__field--madoka" placeholder="Search..." type="search"
                               id="input-31"/>
                        <label class="input__label" for="input-31">
                            <svg class="graphic" width="100%" height="100%" viewBox="0 0 404 77"
                                 preserveAspectRatio="none">
                                <path d="m0,0l404,0l0,77l-404,0l0,-77z"/>
                            </svg>
                        </label>
                    </form>
                </div><!--//end-search-box-->
            @endif

            <div class="clearfix"></div>
        </div>
        <div class="header-right">
        {{--<div class="profile_details_left"><!--notifications of menu start -->--}}
        {{--<ul class="nofitications-dropdown">--}}
        {{--<li class="dropdown head-dpdn">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-envelope"></i><span class="badge">3</span></a>--}}
        {{--<ul class="dropdown-menu">--}}
        {{--<li>--}}
        {{--<div class="notification_header">--}}
        {{--<h3>You have 3 new messages</h3>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<li><a href="#">--}}
        {{--<div class="user_img"><img src="images/1.png" alt=""></div>--}}
        {{--<div class="notification_desc">--}}
        {{--<p>Lorem ipsum dolor amet</p>--}}
        {{--<p><span>1 hour ago</span></p>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</a></li>--}}
        {{--<li class="odd"><a href="#">--}}
        {{--<div class="user_img"><img src="images/2.png" alt=""></div>--}}
        {{--<div class="notification_desc">--}}
        {{--<p>Lorem ipsum dolor amet </p>--}}
        {{--<p><span>1 hour ago</span></p>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</a></li>--}}
        {{--<li><a href="#">--}}
        {{--<div class="user_img"><img src="images/3.png" alt=""></div>--}}
        {{--<div class="notification_desc">--}}
        {{--<p>Lorem ipsum dolor amet </p>--}}
        {{--<p><span>1 hour ago</span></p>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</a></li>--}}
        {{--<li>--}}
        {{--<div class="notification_bottom">--}}
        {{--<a href="#">See all messages</a>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="dropdown head-dpdn">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue">3</span></a>--}}
        {{--<ul class="dropdown-menu">--}}
        {{--<li>--}}
        {{--<div class="notification_header">--}}
        {{--<h3>You have 3 new notification</h3>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<li><a href="#">--}}
        {{--<div class="user_img"><img src="images/2.png" alt=""></div>--}}
        {{--<div class="notification_desc">--}}
        {{--<p>Lorem ipsum dolor amet</p>--}}
        {{--<p><span>1 hour ago</span></p>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</a></li>--}}
        {{--<li class="odd"><a href="#">--}}
        {{--<div class="user_img"><img src="images/1.png" alt=""></div>--}}
        {{--<div class="notification_desc">--}}
        {{--<p>Lorem ipsum dolor amet </p>--}}
        {{--<p><span>1 hour ago</span></p>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</a></li>--}}
        {{--<li><a href="#">--}}
        {{--<div class="user_img"><img src="images/3.png" alt=""></div>--}}
        {{--<div class="notification_desc">--}}
        {{--<p>Lorem ipsum dolor amet </p>--}}
        {{--<p><span>1 hour ago</span></p>--}}
        {{--</div>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</a></li>--}}
        {{--<li>--}}
        {{--<div class="notification_bottom">--}}
        {{--<a href="#">See all notifications</a>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--<li class="dropdown head-dpdn">--}}
        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-tasks"></i><span class="badge blue1">15</span></a>--}}
        {{--<ul class="dropdown-menu">--}}
        {{--<li>--}}
        {{--<div class="notification_header">--}}
        {{--<h3>You have 8 pending task</h3>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<li><a href="#">--}}
        {{--<div class="task-info">--}}
        {{--<span class="task-desc">Database update</span><span class="percentage">40%</span>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
        {{--<div class="progress progress-striped active">--}}
        {{--<div class="bar yellow" style="width:40%;"></div>--}}
        {{--</div>--}}
        {{--</a></li>--}}
        {{--<li><a href="#">--}}
        {{--<div class="task-info">--}}
        {{--<span class="task-desc">Dashboard done</span><span class="percentage">90%</span>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
        {{--<div class="progress progress-striped active">--}}
        {{--<div class="bar green" style="width:90%;"></div>--}}
        {{--</div>--}}
        {{--</a></li>--}}
        {{--<li><a href="#">--}}
        {{--<div class="task-info">--}}
        {{--<span class="task-desc">Mobile App</span><span class="percentage">33%</span>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
        {{--<div class="progress progress-striped active">--}}
        {{--<div class="bar red" style="width: 33%;"></div>--}}
        {{--</div>--}}
        {{--</a></li>--}}
        {{--<li><a href="#">--}}
        {{--<div class="task-info">--}}
        {{--<span class="task-desc">Issues fixed</span><span class="percentage">80%</span>--}}
        {{--<div class="clearfix"></div>--}}
        {{--</div>--}}
        {{--<div class="progress progress-striped active">--}}
        {{--<div class="bar  blue" style="width: 80%;"></div>--}}
        {{--</div>--}}
        {{--</a></li>--}}
        {{--<li>--}}
        {{--<div class="notification_bottom">--}}
        {{--<a href="#">See all pending tasks</a>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--</li>--}}
        {{--</ul>--}}
        {{--<div class="clearfix"> </div>--}}
        {{--</div>--}}
        <!--notification menu end -->

            @if(Auth::check())
                <div class="profile_details">
                    <ul>
                        <li class="dropdown profile_details_drop">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <div class="profile_img">
                                    <span class="prfil-img"><img src="images/a.png" alt=""> </span>
                                    <div class="user-name">
                                        <p>Carlos Moreira</p>
                                        <span>Administrator</span>
                                    </div>
                                    <i class="fa fa-angle-down lnr"></i>
                                    <i class="fa fa-angle-up lnr"></i>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                            <ul class="dropdown-menu drp-mnu">
                                {{--<li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>--}}
                                {{--<li> <a href="#"><i class="fa fa-user"></i> Profile</a> </li>--}}
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            @endif

            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <!-- //header-ends -->
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
