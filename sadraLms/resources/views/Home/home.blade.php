<html lang="zxx"><!-- Mirrored from omexer.com/tm/mixito/demo/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2019 05:54:10 GMT --><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title>سامانه آموزشی صدرا سیستم </title>
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
    <!--bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <!--owl carousel css-->
    <link rel="stylesheet" type="text/css" href="assets/css/owl.carousel.min.css">
    <!--magnific popup css-->
    <link rel="stylesheet" type="text/css" href="assets/css/magnific-popup.css">
    <!--icofont css-->
    <link rel="stylesheet" type="text/css" href="assets/css/icofont.min.css">
    <!--animate css-->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!--main css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
</head>

<body>
<!--star preloader-->
<div class="preloader" style="display: none;">
    <div class="d-table">
        <div class="d-table-cell align-middle">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
</div>
<!--end preloader-->
<!--start header-->
<header id="header" class="sticky">
    <div class="container">
{{--        <div class="card-body">--}}
{{--            @if (session('status'))--}}
{{--                <div class="alert alert-success" role="alert">--}}
{{--                    {{ session('status') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            با موفقیت وارد شدید !--}}
{{--        </div>--}}
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <!--logo-->
                <a class="logo" href="#"><img src="assets/images/logo.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"><i class="icofont-navigation-menu"></i></span>
                </button>
                <!--navbar links-->
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-scroll-nav="0"> صفحه اصلی </a>
                        </li>
                       @guest
                            <li class="nav-item">
                                <a class="nav-link active" href="/register">ثبت نام </a>
                            </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home')}}" >ورود</a>
                        </li>
                        @endguest
                        <li class="nav-item">
                            <a class="nav-link" href="/login" >دسته بندی ها</a>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="/home" >  پنل کاربری</a>
                            </li>
                            @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--end header-->
<!--start hero area-->
<section id="hero-area" class="hero-newsletter" data-scroll-index="0">
    <div class="container">
        <div class="row">
            <!--start caption content-->
            <div class="col-md-10 offset-md-1">
                <div class="caption text-center">
                    <h1 class="text-white">برترین سامانه آموزشی کشور</h1>
                    <p class="text-white "> صدرا سیستم نماد صدرا سیستم نماد صدرا سیستم نماد صدرا سیستم نماد صدرا سیستم نماد صدرا سیستم نماد صدرا سیستم نماد </p>
                   <div class="arw">
                    <div class="home-news-form">
                        <input type="email" class="form-control" placeholder="دوره خود را جستجو کنید">
                    </div>
                       <button class="landing-search-btn">دوره مد نظر خود را جستجو کنید </button>

                   </div>
                </div>
            </div>
            <!--end caption content-->
        </div>
    </div>
</section>
<!--end hero area-->
<!--start core feature area-->
<section id="core-feat-area" data-scroll-index="1">
    <div class="container">

        <div class="row">
            <!--start core feature single-->
            <div class="col-lg-3 col-md-6">
                <div class="core-feat-single two text-center">
                    <i class="icofont-video"></i>
                    <h4>دوره آموزشی reactjs</h4>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ تون و سطرآنچنان کهدی می باشد.
                    </p>
                </div>
            </div>
            <!--end core feature single-->
            <!--start core feature single-->
            <div class="col-lg-3 col-md-6">
                <div class="core-feat-single two text-center">
                    <i class="icofont-video"></i>
                    <h4>دوره آموزشی CSS</h4>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ تون و سطرآنچنان کهدی می باشد.
                    </p>
                </div>
            </div>
            <!--end core feature single-->
            <!--start core feature single-->
            <div class="col-lg-3 col-md-6">
                <div class="core-feat-single two text-center">
                    <i class="icofont-video"></i>
                    <h4>دوره آموزشی HTML</h4>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ تون و سطرآنچنان کهدی می باشد.
                    </p>
                </div>
            </div>
            <!--end core feature single-->
            <!--start core feature single-->
            <div class="col-lg-3 col-md-6">
                <div class="core-feat-single two text-center">
                    <i class="icofont-video"></i>
                    <h4>دوره آموزشی webpack.js</h4>
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ تون و سطرآنچنان کهدی می باشد.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<footer id="footer">
    <div class="container">
        <div class="row">
            <!--start footer content-->
            <div class="col-lg-12">
                <div class="footer-cont text-center">
                    <img src="assets/images/logo.png" class="img-fluid" alt="">
                    <h4> دنبال کنتید مارا</h4>
                    <ul>
                        <li><a href="#"><i class="icofont-facebook"></i></a></li>
                        <li><a href="#"><i class="icofont-twitter"></i></a></li>
                        <li><a href="#"><i class="icofont-google-plus"></i></a></li>
                    </ul>
                    <p>تمامی حقوق برای صدرا سیتسم محفوظ است <a target="_blank" href="https://sadrasystem.com/">sadrasystem.ud</a></p>
                </div>
            </div>
            <!--end footer content-->
        </div>
    </div>
</footer>
<!--end footer-->
<!--jQuery js-->
<script src="assets/js/jquery-3.3.1.min.js"></script>
<!--proper js-->
<script src="assets/js/popper.min.js"></script>
<!--bootstrap js-->
<script src="assets/js/bootstrap.min.js"></script>
<!--magnic popup js-->
<script src="assets/js/magnific-popup.min.js"></script>
<!--owl carousel js-->
<script src="assets/js/owl.carousel.min.js"></script>
<!--scrollIt js-->
<script src="assets/js/scrollIt.min.js"></script>
<!--contact js-->
<script src="assets/js/contact.js"></script>
<!--validator js-->
<script src="assets/js/validator.min.js"></script>
<!--main js-->
<script src="assets/js/custom.js"></script>



<!-- Mirrored from omexer.com/tm/mixito/demo/index-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Nov 2019 05:54:33 GMT -->


</body></html>
