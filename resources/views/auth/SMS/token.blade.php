<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Fastkart">
    <meta name="keywords" content="Fastkart">
    <meta name="author" content="Fastkart">
    <link rel="icon" href="/Client/assets/images/favicon/1.png" type="image/x-icon">
    <title>OTP</title>
    <!-- SEO Title  -->
    {!! SEO::generate() !!}
    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- bootstrap css -->
    <link id="rtl-link" rel="stylesheet" type="text/css" href="/Client/assets/css/vendors/bootstrap.css">

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

<body>
<!-- Loader Start -->
<div class="fullpage-loader">
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
    <span></span>
</div>
<!-- Loader End -->

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



<!-- log in section start -->
<section class="log-in-section otp-section section-b-space">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="/Client/assets/images/inner-page/otp.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3 class="text-title">رمز یکبار مصرف پیامک شده را وارد کنید</h3>
{{--                            <h5 class="text-content">کد به شماره <span>{{str_replace(substr(session()->get('register-sms'),8),'*',session()->get('register-sms'))}}</span> ارسال شده است</h5>--}}
                        </div>

                        <form action="{{route('SMS.token')}}" method="post" name="verifyForm">
                            @csrf
                        <div id="otp" class="inputs d-flex flex-row justify-content-center">
                            <input class="text-center form-control rounded" type="text" id="first" maxlength="1"
                                   placeholder="" name="token[]">
                            <input class="text-center form-control rounded" type="text" id="second" maxlength="1"
                                   placeholder="" name="token[]">
                            <input class="text-center form-control rounded" type="text" id="third" maxlength="1"
                                   placeholder="" name="token[]">
                            <input class="text-center form-control rounded" type="text" id="fourth" maxlength="1"
                                   placeholder="" name="token[]">
                            <input class="text-center form-control rounded" type="text" id="fifth" maxlength="1"
                                   placeholder="" name="token[]">
                            <input class="text-center form-control rounded" type="text" id="sixth" maxlength="1"
                                   placeholder="" name="token[]">
                        </div>
                        <div class="mt-3 text-sm-end w-100 rtl">
                            <a href="{{route('enterPassword')}}" class="mt-4 ">ورود با رمز عبور</a>
                        </div>
                            <div class="send-box pt-4 rtl text-sm-center">
                            <h6>کد رو نگرفتی؟ <a href="javascript:void(0)" class="theme-color fw-bold">ارسال مجدد</a></h6>
                        </div>

                        <button  class="btn btn-animation w-100 mt-3"
                                type="submit">تایید </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- log in section end -->


<!-- latest jquery-->
<script src="/Client/assets/js/jquery-3.6.0.min.js"></script>

<!-- Bootstrap js-->
<script src="/Client/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/Client/assets/js/bootstrap/popper.min.js"></script>

<!-- otp js-->
<script src="/Client/assets/js/otp.js"></script>

<!-- Slick js-->
<script src="/Client/assets/js/slick/slick.js"></script>
<script src="/Client/assets/js/slick/slick-animation.min.js"></script>
<script src="/Client/assets/js/slick/custom_slick.js"></script>

<!-- feather icon js-->
<script src="/Client/assets/js/feather/feather.min.js"></script>
<script src="/Client/assets/js/feather/feather-icon.js"></script>

<!-- Lazyload Js -->
<script src="/Client/assets/js/lazysizes.min.js"></script>

<!-- script js -->
<script src="/Client/assets/js/script.js"></script>
</body>

</html>
