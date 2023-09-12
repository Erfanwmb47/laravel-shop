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
    <title>فراموشی رمز عبور</title>
    {!! SEO::generate() !!}

    <!-- Google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Russo+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
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
<section class="log-in-section section-b-space forgot-section">
    <div class="container-fluid-lg w-100">
        <div class="row">
            <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                <div class="image-contain">
                    <img src="/Client/assets/images/inner-page/forgot.png" class="img-fluid" alt="">
                </div>
            </div>

            <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                <div class="d-flex align-items-center justify-content-center h-100">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>بازیابی رمز عبور</h3>
                            <h4>شماره همراه خودت رو اینجا بزن</h4>
                        </div>

                        <div class="input-box rtl text-sm-end align-content-end">
                                <form class="row g-4" method="POST" action="{{ route('resetWithPhone') }}">
                                    @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="tel" class="form-control" id="phone" name="phone"
                                               placeholder="شماره همراه">
                                        <label for="phone">شماره همراه</label>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">فراموشی رمز عبور</button>
                                </div>
                            </form>
                        </div>
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

<!-- feather icon js-->
<script src="/Client/assets/js/feather/feather.min.js"></script>
<script src="/Client/assets/js/feather/feather-icon.js"></script>

<!-- Slick js-->
<script src="/Client/assets/js/slick/slick.js"></script>
<script src="/Client/assets/js/slick/slick-animation.min.js"></script>
<script src="/Client/assets/js/slick/custom_slick.js"></script>

<!-- Lazyload Js -->
<script src="/Client/assets/js/lazysizes.min.js"></script>

<!-- script js -->
<script src="/Client/assets/js/script.js"></script>
</body>

</html>
