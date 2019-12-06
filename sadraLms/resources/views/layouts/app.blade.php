<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="rtl">
<!-- BEGIN: Head-->

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuesax admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuesax admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>@yield('title', ' پنل کاربری')</title>
    <link rel="apple-touch-icon" href="panel/app-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="panel/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="panel/app-assets/vendors/css/vendors.min.css">
{{--    <link rel="stylesheet" type="text/css" href="panel/app-assets/vendors/css/charts/apexcharts.css">--}}
    <link rel="stylesheet" type="text/css" href="panel/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="/Panel/app-assets/css/modal.min.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/plugins/tour/tour.css">
    <!-- END: Page CSS-->
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="panel/assets/css/style.css">
    <!-- END: Custom CSS-->
    @yield('coustom-style')
<style type="text/css">
    fieldset {
         border:none;
    }
</style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="panel/html/ltr/vertical-menu-template/index.html">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">پیشروتک</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i><i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block collapse-toggle-icon primary" data-ticon="icon-disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            @if(auth()->user()->role==1)
                {{--            student navigation --}}
            @elseif (auth()->user()->role==2)
                {{--            master navigation --}}

            @elseif (auth()->user()->role==3)
                    <li class="nav-item has-sub">
                        <a href=""><i class="feather icon-home"></i><span class="menu-title ir" data-i18n="Dashboard"> اعلانات سیستم </span><span class="badge badge badge-warning badge-pill float-right mr-2">2</span></a>
                        <ul class="menu-content">
                            <a href="{{__('/verifyMaster')}}" class="text-center"><span class="menu-title ir" >  اساتید  تایید نشده  </span><span class="badge badge badge-danger badge-pill float-right mr-2">2</span></a>
                            <a href="{{__('/verifyCourses')}}" class="text-center"><span class="menu-title ir" >  دوره های  تایید نشده  </span><span class="badge badge badge-danger badge-pill float-right mr-2">1</span></a>
                        </ul>
                    </li>
                <li class=" navigation-header ir text-center"><span>  ِDashboard </span>
                </li>
                <li class="nav-item has-sub">
                    <a><i class="feather icon-home"></i><span class="menu-title ir" data-i18n="Dashboard">    دوره ها   </span><span class="badge badge badge-warning badge-pill float-right mr-2">20</span></a>
                    <ul class="menu-content">
                        <a href="/course" class="text-center"><span class="menu-title ir" >   لیست دوره ها    </span><span class="badge badge badge-danger badge-pill float-right mr-2">0</span></a>
                    </ul>

                </li>
                <li class="nav-item has-sub">
                    <a><i class="feather icon-home"></i><span class="menu-title ir" data-i18n="Dashboard">    دسته بندی ها   </span><span class="badge badge badge-warning badge-pill float-right mr-2">20</span></a>
                    <ul class="menu-content">
                        <a href="/category" class="text-center"><span class="menu-title ir" >    دسته بندی ها   </span><span class="badge badge badge-danger badge-pill float-right mr-2">0</span></a>
                    </ul>
                </li>
                <li class="nav-item has-sub"><a href="{{__('/user')}}"><i class="feather icon-layout"></i><span class="menu-title ir" data-i18n="Content">کاربران</span></a>
                    <ul class="menu-content">
                        <li><a href="{{__('/user')}}" class="text-center" ><i class="feather icon-circle"></i><span class="menu-item ir" data-i18n="Grid">  لیست کاربران</span></a>

                        </li>
                    </ul>
                </li>


        </ul>
            @endif
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">

    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <nav class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <ul class="nav navbar-nav float-right">
                        <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name ir  text-bold-600">
                                            {{auth()->user()->name}}
                                    </span><span class="user-status text-right ir">

                                        @switch(auth()->user()->role)
                                            @case(1)
                                            {{__('دانشجو')}}
                                            @break
                                            @case(2)
                                            {{__('استاد')}}
                                            @break
                                            @case(3)
                                            {{__('مدیریت کل')}}
                                            @break
                                            @default
                                            {{__('کاربرسیستم')}}
                                        @endswitch
                                    </span></div>
                                <span>
                                    <img class="round" src="
@if (auth()->user()->rootAddress=="")
                                    {{__('noprofile')}}
                                    @else
                                        {{__('/profiles/').auth()->user()->rootAddress."/profile.jpg"}}
                                    @endif
                                        " alt="avatar" height="40" width="40"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="/profile"><i class="feather icon-user"></i>  ویرایش پروفایل</a><a class="dropdown-item" href="app-email.html"><i class="feather icon-mail"></i> دوره های من </a><a class="dropdown-item" href="app-todo.html"><i class="feather icon-check-square"></i> Task</a><a class="dropdown-item" href="app-chat.html"><i class="feather icon-message-square"></i> Chats</a>
                                <div class="dropdown-divider"></div><a  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit()" class="dropdown-item" href="{{ route('logout') }}"><i class="feather icon-power"></i> خروج از سامانه</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </nav>
    <!-- END: Header-->

    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2019<a class="text-bold-800 grey darken-2" href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank">پیشروتک صدرا یزد </a></span><span class="float-md-right d-none d-md-block">طراحی و اجرا با افتخار <i class="feather icon-heart pink"></i></span>
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->


<!-- BEGIN: Vendor JS-->
<script src="panel/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
{{--<script src="panel/app-assets/vendors/js/charts/apexcharts.min.js"></script>--}}
<script src="panel/app-assets/vendors/js/extensions/tether.min.js"></script>
<script src="panel/app-assets/vendors/js/extensions/shepherd.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="panel/app-assets/js/core/app-menu.js"></script>
<script src="panel/app-assets/js/core/app.js"></script>
<script src="panel/app-assets/js/scripts/components.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<!-- END: Theme JS--><script src="/Panel/app-assets/js/core/libraries/modal.min.js" type="text/javascript"></script>


<!-- BEGIN: Page JS-->
{{--<script src="panel/app-assets/js/scripts/pages/dashboard-analytics.js"></script>--}}
<!-- END: Page JS-->
@yield('coustom-js')
</body>

<!-- END: Body-->
</html>
