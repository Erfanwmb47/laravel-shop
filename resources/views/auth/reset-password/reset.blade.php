
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="/Client/assets/images/favicon/8.png" type="image/x-icon">

    <!-- SEO Title  -->
    {!! SEO::generate() !!}

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="/Client/assets/css/vendors/bootstrap.css">

    <!-- wow css -->
    <link rel="stylesheet" href="/Client/assets/css/animate.min.css" />

    <!-- font-awesome css -->
    <link rel="stylesheet" type="text/css" href="/Client/assets/css/vendors/font-awesome.css">

    <!-- feather icon css -->
    <link rel="stylesheet" type="text/css" href="/Client/assets/css/vendors/feather-icon.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="/Client/assets/css/vendors/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/Client/assets/css/vendors/slick/slick-theme.css">

    <!-- Iconly css -->
    <link rel="stylesheet" type="text/css" href="/Client/assets/css/bulk-style.css">

    <!-- Template css -->
    <link id="color-link" rel="stylesheet" type="text/css" href="/Client/assets/css/style.css">

</head>

<body class="theme-color-1" >

{{--<!-- Loader Start -->--}}
{{--<div class="fullpage-loader">--}}
{{--    <span></span>--}}
{{--    <span></span>--}}
{{--    <span></span>--}}
{{--    <span></span>--}}
{{--    <span></span>--}}
{{--    <span></span>--}}
{{--</div>--}}
{{--<!-- Loader End -->--}}

<!-- Header Start -->
<header class="pb-md-4 pb-0">

    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <a href="{{route('home')}}" class="web-logo nav-logo">
                            <img src="/Client/assets/images/logo/seanovia.png" class="img-fluid blur-up lazyload" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</header>
<!-- Header End -->

<!-- mobile fix menu end -->
<div id="content">
    <!-- log in section start -->
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="/Client/assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            {{--
                                                        <h3>به سینویا خوش آمدید</h3>
                            --}}
                            <h4>پسورد جدید</h4>
                        </div>
                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('updatePasswordWithPhone')}}" autocomplete="off">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form  ">
                                        <input required type="password" class="form-control  text-end @error('password') border border-2 border-danger @enderror"  id="password" placeholder="پسورد" name="password" >
                                        <label for="password" class="right-0">پسورد جدید را وارد کنید</label>
                                    </div>
                                    @error('password') <a class="text-danger text-sm mt-1">{{$message}}</a> @enderror
                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form  ">
                                        <input  class="form-control  text-end @error('password_confirmation') border border-2 border-danger @enderror"  id="password_confirmation" type="password" name="password_confirmation" required placeholder="تایید پسورد" >
                                        <label for="password_confirmation" class="right-0">پسورد جدید را مجددا وارد کنید</label>
                                    </div>
                                    @error('password_confirmation') <a class="text-danger text-sm mt-1">{{$message}}</a> @enderror
                                </div>

                                {{--                                <div class="col-12">--}}
                                {{--                                    <div class="form-floating theme-form-floating log-in-form">--}}
                                {{--                                        <input type="password" class="form-control @error('password') border border-2 border-danger @enderror" id="password" name="password"--}}
                                {{--                                               placeholder="رمز عبور">--}}
                                {{--                                        <label for="password" class="right-0">رمز عبور</label>--}}
                                {{--                                    </div>--}}
                                {{--                                    @error('password') <a class="text-danger text-sm mt-1">{{$message}}</a> @enderror--}}
                                {{--                                </div>--}}

                                <div class="col-12">
                                    <div class="forgot-box">
                                        {{--                                        <div class="form-check ps-0 m-0 remember-box">--}}
                                        {{--                                            <input class="checkbox_animated check-box" type="checkbox"--}}
                                        {{--                                                   id="flexCheckDefault">--}}
                                        {{--                                            <label class="form-check-label" for="flexCheckDefault">به خاطر سپردن</label>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <a href="forgot.html" class="forgot-password">فراموشی رمز عبور</a>--}}
                                    </div>
                                </div>
                                <x-recaptcha />
                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">ثبت</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>یا</h6>
                        </div>

                        {{--                        <div class="log-in-button">--}}
                        {{--                            <ul>--}}
                        {{--                                <li>--}}
                        {{--                                    <a href="{{route('login')}}" class="btn google-button w-100">--}}
                        {{--                                         ورود با ایمیل--}}
                        {{--                                    </a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="{{route('home')}}" class="btn google-button w-100">
                                        باشه بعدا
                                    </a>
                                </li>
                            </ul>
                        </div>

                        {{--                        <div class="other-log-in">--}}
                        {{--                            <h6></h6>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="sign-up-box">--}}
                        {{--                            <h4>آیا عضو سایت نیستید ؟</h4>--}}
                        {{--                            <a href="{{route('register')}}">ثبت نام</a>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- log in section end -->
<!-- latest jquery-->
<script src="/Client/assets/js/jquery-3.6.0.min.js"></script>


<!-- Bootstrap js-->
<script src="/Client/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/Client/assets/js/bootstrap/popper.min.js"></script>

<!-- feather icon js-->
<script src="/Client/assets/js/feather/feather.min.js"></script>
<script src="/Client/assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="/Client/assets/js/lazysizes.min.js"></script>

<!-- Slick js-->
<script src="/Client/assets/js/slick/slick.js"></script>
<script src="/Client/assets/js/slick/custom_slick.js"></script>

<!-- script js -->
<script src="/Client/assets/js/script.js"></script>
<!-- wishlist js -->
<script src="/Client/assets/js/Wishlist.js"></script>
</body>
@include('sweetalert::alert')
</html>

