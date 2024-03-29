<html class="loaded" lang="en" data-textdirection="rtl"><!-- BEGIN: Head--><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Vuesax admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuesax admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>ورود به سایت</title>
    <link rel="shortcut icon" type="image/x-icon" href="panel/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="panel/app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="panel/app-assets/css/pages/authentication.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="panel/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern 1-column  navbar-floating footer-static bg-full-screen-image  blank-page blank-page  pace-done" data-open="click" data-menu="vertical-menu-modern" data-col="1-column"><div class="pace  pace-inactive"><div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
        <div class="pace-progress-inner"></div>
    </div>
    <div class="pace-activity"></div></div>
<!-- BEGIN: Content-->
<div class="app-content content" style="margin-right: 0!important;">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication rounded-0 mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="panel/app-assets/images/pages/login.png" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card rounded-0 mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">ورود به سامانه</h4>
                                        </div>
                                    </div>
                                    <p class="px-2 text-center">خوش آمدید هم اکنون میتوانید وارد شوید </p>
                                    @error('email')
                                    <h6 class="px-2 text-center text-danger">{{ $message }} </h6>
                                    @enderror
                                    @error('password')
                                    <h6 class="px-2 text-center text-danger">{{ $message }} </h6>
                                    @enderror
                                    <div class="card-content">
                                        <div class="card-body pt-1">
                                            <form method="post" action="{{ route('login') }}">
                                                @csrf

                                                <fieldset class="form-label-group form-group position-relative has-icon-left">
                                                    <input type="email" class="form-control" id="email" placeholder="نام کاربری" required="" name="email" value="{{ old('email') }}" autocomplete="email">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">
                                                    <input type="password" class="form-control" id="password" placeholder="رمز عبور ..."  name="password" required autocomplete="current-password">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                                <span class="vs-checkbox">
                                                                        <span class="vs-checkbox--check">
                                                                            <i class="vs-icon feather icon-check"></i>
                                                                        </span>
                                                                    </span>
                                                                <span class="">مرا به یاد داشته باش</span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    @if (Route::has('password.request'))
                                                        <div class="text-right"><a href="{{ route('password.request') }}" class="card-link">بازیابی رمز عبور !</a></div>
                                                    @endif
                                                </div>
                                                <a href="/register" class="btn btn-outline-primary float-left btn-inline waves-effect waves-light">ثبت نام</a>
                                                <button type="submit" class="btn btn-primary float-right btn-inline waves-effect waves-light">ورود</button>

                                            </form>
                                        </div>
                                    </div>
                                    <div class="login-footer">
                                        <div class="divider">
                                            <div class="divider-text">Sadra Learn System Managment</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->


<!-- BEGIN: Vendor JS-->
<script src="panel/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="panel/app-assets/js/core/app-menu.js"></script>
<script src="panel/app-assets/js/core/app.js"></script>
<script src="panel/app-assets/js/scripts/components.js"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
<!-- END: Page JS-->


<!-- END: Body-->


</body></html>
