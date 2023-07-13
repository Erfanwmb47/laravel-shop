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
    @yield('css')
</head>

<body class="theme-color-1">

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
    <div class="header-top bg-dark">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 d-xxl-block d-none">
                    <div class="top-left-header">
                        <i class="iconly-Location icli text-white"></i>
                        <span class="text-white">جنت آباد شمالی خ مخبری </span>
                    </div>
                </div>

                <div class="col-xxl-6 col-lg-9 d-lg-block d-none">
                    <div class="header-offer">
                        <div class="notification-slider">
                            <div>
                                <div class="timer-notification">
                                    <h6><strong class="me-1"> به سینویا خوش آمدید </strong>سایت فروشگاه لوازم بهداشتی و آرایشی<strong class="ms-1">
                                        </strong>

                                    </h6>
                                </div>
                            </div>

                            <div>
                                <div class="timer-notification">
                                    <h6>با کلی تخفیف های خوب !
                                        <a href="shop-left-sidebar.html" class="text-white">همین الان سفارشت رو بزن
                                            !</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="top-nav top-header sticky-header">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="navbar-top">
                        <button class="navbar-toggler d-xl-none d-inline navbar-menu-button" type="button"
                                data-bs-toggle="offcanvas" data-bs-target="#primaryMenu">
                                <span class="navbar-toggler-icon">
                                    <i class="fa-solid fa-bars"></i>
                                </span>
                        </button>
                        <a href="index.html" class="web-logo nav-logo">
                            <img src="/Client/assets/images/logo/seanovia.png" class="img-fluid blur-up lazyload" alt="">
                        </a>

                        <div class="middle-box">
                            <div class="search-box">
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="دنبال چی میگردی ؟"
                                           aria-label="Recipient's username" aria-describedby="button-addon2">
                                    <button class="btn search-button-2" type="button" id="button-addon2">
                                        <i data-feather="search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="rightside-box">
                            <div class="search-full">
                                <div class="input-group">
                                        <span class="input-group-text">
                                            <i data-feather="search" class="font-light"></i>
                                        </span>
                                    <input type="text" class="form-control search-type" placeholder="Search here..">
                                    <span class="input-group-text close-search">
                                            <i data-feather="x" class="font-light"></i>
                                        </span>
                                </div>
                            </div>
                            <ul class="right-side-menu">
                                <li class="right-side">
                                    <div class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <div class="search-box">
                                                <i data-feather="search"></i>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side">
                                    <a href="contact-us.html" class="delivery-login-box">
                                        <div class="delivery-icon">
                                            <i data-feather="phone-call"></i>
                                        </div>
                                        <div class="delivery-detail">
                                            <h6>24/7 Delivery</h6>
                                            <h5>+91 888 104 2340</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="right-side">
                                    <a href="wishlist.html" class="btn p-0 position-relative header-wishlist">
                                        <i data-feather="heart"></i>
                                    </a>
                                </li>
                                <li class="right-side">
                                    <div class="onhover-dropdown header-badge">
                                        <button type="button" class="btn p-0 position-relative header-wishlist">
                                            <i data-feather="shopping-cart"></i>
                                            <span class="position-absolute top-0 start-100 translate-middle badge" id="cartcounter1">{{\Modules\Cart\Helpers\Cart\Cart::all()->count()}}

                                                </span>
                                        </button>

                                        <div class="onhover-div">
                                            <ul class="cart-list" id="cartBox">
                                                @if(\Modules\Cart\Helpers\Cart\Cart::all()->count() != 0)
                                                @foreach(\Modules\Cart\Helpers\Cart\Cart::all() as $cart)
                                                    @if(isset($cart['product']))
                                                        @php
                                                            $product = $cart['product'];
                                                            $priceWithOffer = ( $product->price * (100 - $product->offer))/100;
                                                        @endphp
                                                        <li class="product-box-contain" id="cart{{$cart['id']}}">
                                                            <div class="drop-cart">
                                                                <a href="/product/{{$product->id}}" class="drop-image">
                                                                    <img src="{{str_replace('public','/storage',optional($product->gallery)->path)}}"
                                                                         class="blur-up lazyload" alt="{{$product->gallery->alt}}">
                                                                </a>

                                                                <div class="drop-contain">
                                                                    <a href="/product/{{$product->id}}">
                                                                        <h5>{{$product->name}}</h5>
                                                                    </a>
                                                                    <h6><span ><span id="valueOf{{$product->id}}">{{$cart['quantity']}}</span> x</span> {{number_format($priceWithOffer)}} تومان </h6>
                                                                    <button class="close-button close_button" onclick="deleteItemFromCartNav(event,'{{$cart['id']}}')">
                                                                        <i class="fa-solid fa-xmark"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach
                                                    @else
{{--                                                    TODO vasat chin kardan --}}
                                                        <li id="cartEmpty" class=" cart-list items-center">
                                                            <p class="text-center"><i class="emptyCart w-full"></i><br>سبد خرید  شما خالی است</p>
                                                        </li>
                                                    @endif
                                            </ul>

                                            <div class="price-box">
                                                @php

                                                        $totalPrice= \Modules\Cart\Helpers\Cart\Cart::all()->sum(function ($cart){
                                                            return (( $cart['product']->price * (100 - $cart['product']->offer))/100) * $cart['quantity'];
                                                        })
                                                @endphp
                                                <h5>Total :</h5>
                                                <h4 class="theme-color fw-bold" id="finalCostNav">{{number_format($totalPrice)}} تومان </h4>
                                            </div>

                                            <div class="button-group">
                                                <a href="{{route('cart.index')}}" class="btn btn-sm cart-button">برو به سبد</a>
                                                <a href="checkout.html" class="btn btn-sm cart-button theme-bg-color
                                                    text-white">تسویه کن !</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="right-side onhover-dropdown">
                                    <div class="delivery-login-box">
                                            @guest
                                            <div class="delivery-icon">
                                            <i data-feather="user"></i>
                                            </div>
                                            @endguest
                                            @auth
                                                    <div class="delivery-icon flex mt-3">
                                                    <i data-feather="user"></i>
                                                    <p class="mt-2">{{auth()->user()->username}}</p>
                                                    </div>
                                           @endauth
                                        <div class="delivery-detail">
                                            <h6>Hello,</h6>
                                            <h5>My Account</h5>
                                        </div>
                                    </div>

                                    <div class="onhover-div onhover-div-login">
                                        <ul class="user-box-name">
                                            @auth
                                            <li class="product-box-contain">
                                                <i></i>
                                                <a href="{{route('profile')}}">پنل کاربری</a>
                                            </li>
                                                @if(\Illuminate\Support\Facades\Auth::user()->is_superuser() ||  \Illuminate\Support\Facades\Auth::user()->is_staffUser())
                                                    <li class="product-box-contain">
                                                        <a href="{{route('DashboardPanel')}}">پنل مدیریت</a>
                                                    </li>
                                                @endif
                                                <li class="product-box-contain">
                                                    <i></i>
                                                    <form action="{{route('logout')}}" method="post">
                                                        @csrf
                                                        <a>
                                                            <button class="bg-white border-0" href="{{route('logout')}}">خروج
                                                            </button>
                                                        </a>
                                                    </form>
                                                </li>
                                            @endauth
                                            @guest
                                            <li class="product-box-contain">
                                                <i></i>
                                                <a href="{{route('login')}}">ورود</a>
                                            </li>

                                            <li class="product-box-contain">
                                                <a href="{{route('register')}}">ثبت نام</a>
                                            </li>
                                            @endguest

                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-12">
                <div class="header-nav">
                    <div class="header-nav-left">
                        <button class="dropdown-category dropdown-category-2">
                            <i data-feather="align-left"></i>
                            <span>دسته بندی ها</span>
                        </button>

                        <div class="category-dropdown right-0">
                            <div class="category-title">
                                <h5>Categories</h5>
                                <button type="button" class="btn p-0 close-button text-content">
                                    <i class="fa-solid fa-xmark"></i>
                                </button>
                            </div>

                            <ul class="category-list">
                                @foreach($categories as $category)
                                    @if(!$category->category_id)
                                <li class="onhover-category-list">
                                    <a href="javascript:void(0)" class="category-name">
                                        <img src="{{str_replace('public','/storage',$category->gallery->path)}}" alt="">
                                        <h6>{{$category->name}}</h6>
                                        <i class="fa-solid fa-angle-left"></i>
                                    </a>

                                    <div class="onhover-category-box">
                                        @foreach($categories as $subCategory)
                                            @if($subCategory->category_id == $category->id)
                                        <div class="list-1">
                                            <div class="category-title-box">
                                                <h5>{{$subCategory->name}}</h5>
                                            </div>
                                            <ul>
                                                @foreach($categories as $subSubCategory)
                                                    @if($subSubCategory->category_id == $subCategory->id)
                                                <li>
                                                    <a href="javascript:void(0)">{{$subSubCategory->name}}</a>
                                                </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                            @endif
                                            @endforeach
{{--                                            <div class="list-2">--}}
{{--                                                <div class="category-title-box">--}}
{{--                                                    <h5>Fresh Fruit</h5>--}}
{{--                                                </div>--}}
{{--                                                <ul>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:void(0)">Banana & Papaya</a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:void(0)">Kiwi, Citrus Fruit</a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:void(0)">Apples & Pomegranate</a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:void(0)">Seasonal Fruits</a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:void(0)">Mangoes</a>--}}
{{--                                                    </li>--}}
{{--                                                    <li>--}}
{{--                                                        <a href="javascript:void(0)">Fruit Baskets</a>--}}
{{--                                                    </li>--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
                                    </div>
                                </li>
                                    @endif
                                @endforeach
{{--                                <li class="onhover-category-list">--}}
{{--                                    <a href="javascript:void(0)" class="category-name">--}}
{{--                                        <img src="/Client/assets/svg/1/cup.svg" alt="">--}}
{{--                                        <h6>Beverages</h6>--}}
{{--                                        <i class="fa-solid fa-angle-left"></i>--}}
{{--                                    </a>--}}

{{--                                    <div class="onhover-category-box w-100">--}}
{{--                                        <div class="list-1">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Energy & Soft Drinks</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Soda & Cocktail Mix</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Soda & Cocktail Mix</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Sports & Energy Drinks</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Non Alcoholic Drinks</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Packaged Water</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Spring Water</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Flavoured Water</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li class="onhover-category-list">--}}
{{--                                    <a href="javascript:void(0)" class="category-name">--}}
{{--                                        <img src="/Client/assets/svg/1/meats.svg" alt="">--}}
{{--                                        <h6>Meats & Seafood</h6>--}}
{{--                                        <i class="fa-solid fa-angle-left"></i>--}}
{{--                                    </a>--}}

{{--                                    <div class="onhover-category-box">--}}
{{--                                        <div class="list-1">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Meat</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Fresh Meat</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Frozen Meat</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Marinated Meat</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Fresh & Frozen Meat</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}

{{--                                        <div class="list-2">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Seafood</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Fresh Water Fish</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Dry Fish</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Frozen Fish & Seafood</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Marine Water Fish</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Canned Seafood</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Prawans & Shrimps</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Other Seafood</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li class="onhover-category-list">--}}
{{--                                    <a href="javascript:void(0)" class="category-name">--}}
{{--                                        <img src="/Client/assets/svg/1/breakfast.svg" alt="">--}}
{{--                                        <h6>Breakfast & Dairy</h6>--}}
{{--                                        <i class="fa-solid fa-angle-left"></i>--}}
{{--                                    </a>--}}

{{--                                    <div class="onhover-category-box">--}}
{{--                                        <div class="list-1">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Breakfast Cereals</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Oats & Porridge</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Kids Cereal</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Muesli</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Flakes</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Granola & Cereal Bars</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Instant Noodles</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Pasta & Macaroni</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Frozen Non-Veg Snacks</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}

{{--                                        <div class="list-2">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Dairy</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Milk</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Curd</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Paneer, Tofu & Cream</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Butter & Margarine</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Condensed, Powdered Milk</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Buttermilk & Lassi</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Yogurt & Shrikhand</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Flavoured, Soya Milk</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li class="onhover-category-list">--}}
{{--                                    <a href="javascript:void(0)" class="category-name">--}}
{{--                                        <img src="/Client/assets/svg/1/frozen.svg" alt="">--}}
{{--                                        <h6>Frozen Foods</h6>--}}
{{--                                        <i class="fa-solid fa-angle-left"></i>--}}
{{--                                    </a>--}}

{{--                                    <div class="onhover-category-box w-100">--}}
{{--                                        <div class="list-1">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Noodle, Pasta</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Instant Noodles</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Hakka Noodles</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Cup Noodles</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Vermicelli</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Instant Pasta</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li class="onhover-category-list">--}}
{{--                                    <a href="javascript:void(0)" class="category-name">--}}
{{--                                        <img src="/Client/assets/svg/1/biscuit.svg" alt="">--}}
{{--                                        <h6>Biscuits & Snacks</h6>--}}
{{--                                        <i class="fa-solid fa-angle-left"></i>--}}
{{--                                    </a>--}}

{{--                                    <div class="onhover-category-box">--}}
{{--                                        <div class="list-1">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Biscuits & Cookies</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Salted Biscuits</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Marie, Health, Digestive</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Cream Biscuits & Wafers</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Glucose & Milk Biscuits</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Cookies</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}

{{--                                        <div class="list-2">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Bakery Snacks</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Bread Sticks & Lavash</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Cheese & Garlic Bread</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Puffs, Patties, Sandwiches</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Breadcrumbs & Croutons</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}

{{--                                <li class="onhover-category-list">--}}
{{--                                    <a href="javascript:void(0)" class="category-name">--}}
{{--                                        <img src="/Client/assets/svg/1/grocery.svg" alt="">--}}
{{--                                        <h6>Grocery & Staples</h6>--}}
{{--                                        <i class="fa-solid fa-angle-left"></i>--}}
{{--                                    </a>--}}

{{--                                    <div class="onhover-category-box">--}}
{{--                                        <div class="list-1">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Grocery</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Lemon, Ginger & Garlic</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Indian & Exotic Herbs</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Vegetables</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Fruits</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}

{{--                                        <div class="list-2">--}}
{{--                                            <div class="category-title-box">--}}
{{--                                                <h5>Organic Staples</h5>--}}
{{--                                            </div>--}}
{{--                                            <ul>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Dry Fruits</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Dals & Pulses</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Millet & Flours</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Sugar, Jaggery</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Masalas & Spices</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Rice, Other Rice</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Flours</a>--}}
{{--                                                </li>--}}
{{--                                                <li>--}}
{{--                                                    <a href="javascript:void(0)">Organic Edible Oil, Ghee</a>--}}
{{--                                                </li>--}}
{{--                                            </ul>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                    </div>

                    <div class="header-nav-middle">
                        <div class="main-nav navbar navbar-expand-xl navbar-light navbar-sticky">
                            <div class="offcanvas offcanvas-collapse order-xl-2" id="primaryMenu">
                                <div class="offcanvas-header navbar-shadow">
                                    <h5>Menu</h5>
                                    <button class="btn-close lead" type="button" data-bs-dismiss="offcanvas"
                                            aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                               data-bs-toggle="dropdown">برند ها</a>
                                            <ul class="dropdown-menu rtl brand-list">
                                                @foreach($brands as $brand)
                                                <li>
                                                    <a class="dropdown-item" href="/">{{$brand->name}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>

                                        <li class="nav-item  new-nav-item">
{{--                                            <label class="new-dropdown">تازه</label>--}}
                                            <a class="nav-link dropdown-toggle" href="/magazine"
                                               data-bs-toggle="dropdown">مجله سینویا</a>
                                        </li>

                                        <li class="nav-item ">
                                            <a class="nav-link dropdown-toggle" href="/aboutUs"
                                               >درباره سینویا</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="header-nav-right">
                        <button class="btn deal-button" data-bs-toggle="modal" data-bs-target="#deal-box">
                            <i data-feather="zap"></i>
                            <span>پیشنهاد امروز </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->

<!-- mobile fix menu start -->
<div class="mobile-menu d-md-none d-block mobile-cart">
    <ul>
        <li class="active">
            <a href="index.html">
                <i class="iconly-Home icli"></i>
                <span>Home</span>
            </a>
        </li>

        <li class="mobile-category">
            <a href="javascript:void(0)">
                <i class="iconly-Category icli js-link"></i>
                <span>Category</span>
            </a>
        </li>

        <li>
            <a href="search.html" class="search-box">
                <i class="iconly-Search icli"></i>
                <span>Search</span>
            </a>
        </li>

        <li>
            <a href="wishlist.html" class="notifi-wishlist">
                <i class="iconly-Heart icli"></i>
                <span>My Wish</span>
            </a>
        </li>

        <li>
            <a href="cart.html">
                <i class="iconly-Bag-2 icli fly-cate"></i>
                <span>Cart</span>
            </a>
        </li>
    </ul>
</div>
<!-- mobile fix menu end -->
@yield('content')


<!-- Footer Section Start -->
<footer class="section-t-space">
    <div class="container-fluid-lg">
        <div class="service-section">
            <div class="row g-3">
                <div class="col-12">
                    <div class="service-contain">
                        <div class="service-box">
                            <div class="service-image">
                                <img src="/Client/assets/images/icon/original.png" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>تضمین اصالت کالا </h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="/Client/assets/svg/delivery.svg" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>بهترین هزینه ارسال</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="/Client/assets/images/icon/clock.png" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>تحویل سفارش در کمترین زمان</h5>
                            </div>
                        </div>

                        <div class="service-box">
                            <div class="service-image">
                                <img src="/Client/assets/svg/market.svg" class="blur-up lazyload" alt="">
                            </div>

                            <div class="service-detail">
                                <h5>پایین ترین قیمت </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-footer section-b-space section-t-space">
            <div class="row g-md-4 g-3">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-logo">
                        <div class="theme-logo">
                            <a href="index.html">
                                <img src="/Client/assets/images/logo/seanovia.png" class="blur-up lazyload" alt="">
                            </a>
                        </div>

                        <div class="footer-logo-contain">
                            <p>
                                فروشگاه اینترنتی سینویا دارای 5 سال سابقه فعالیت در حوزه سلامت و بهداشت .
                                معتبر ترین فروشگاه لوازم بهداشتی و آرایشی.
                            </p>

                            <ul class="address">
                                <li>
                                    <i data-feather="home"></i>
                                    <a href="javascript:void(0)">جنت آباد شمالی خیابان مخبری پلاک 23</a>
                                </li>
                                <li>
                                    <i data-feather="mail"></i>
                                    <a href="javascript:void(0)">support@seanovia.com</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
                    <div class="footer-title">
                        <h4>دسته بندی</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            @foreach($categories as $category)
                            <li>
                                <a href="shop-left-sidebar.html" class="text-content">{{$category->name}}</a>
                            </li>
                                @if($loop->index == 4)
                                    @break
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-xl col-lg-2 col-sm-3">
                    <div class="footer-title">
                        <h4>لینک های مرتبط</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>
                            <li>
                                <a href="/shop" class="text-content">فروشگاه</a>
                            </li>
                            <li>
                                <a href="/aboutUs" class="text-content">درباره ما</a>
                            </li>
                            <li>
                                <a href="/blog" class="text-content">بلاگ</a>
                            </li>
                            <li>
                                <a href="/contactUs" class="text-content">تماس با ما</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xl-2 col-sm-3">
                    <div class="footer-title">
                        <h4>پشتیبانی</h4>
                    </div>

                    <div class="footer-contain">
                        <ul>

                            <li>
                                <a href="order-tracking.html" class="text-content">سوالات متداول</a>
                            </li>
                            @auth
                                <li>
                                    <a href="order-success.html" class="text-content">پیگیری سفارش</a>
                                </li>
                                <li>
                                    <a href="user-dashboard.html" class="text-content">پروفایل</a>
                                </li>
                            <li>
                                <a href="wishlist.html" class="text-content">لیست علاقه مندی</a>
                            </li>
                            @endauth
                        </ul>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="footer-title">
                        <h4>تماس با ما</h4>
                    </div>

                    <div class="footer-contact">
                        <ul>
                            <li>
                                <div class="footer-number">
                                    <i data-feather="phone"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">شماره تماس 24/7 :</h6>
                                        <h5 class="rtl text-right" href="tel:+989209447576 " style="direction: ltr">+98 920 944 7576</h5>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <div class="footer-number">
                                    <i data-feather="mail"></i>
                                    <div class="contact-number">
                                        <h6 class="text-content">ایمیل :</h6>
                                        <h5>seanoviaShop@gmail.com</h5>
                                    </div>
                                </div>
                            </li>

                            <li class="social-app mb-0">
                                <h5 class="mb-2 text-content">اعتبار الکترینیک :</h5>
                                <ul>
                                    <li class="mb-0">
                                        <a href="https://play.google.com/store/apps" target="_blank">
                                            <img src="/Client/assets/images/playstore.svg" class="blur-up lazyload"
                                                 alt="">
                                        </a>
                                    </li>
                                    <li class="mb-0">
                                        <a href="https://www.apple.com/in/app-store/" target="_blank">
                                            <img src="/Client/assets/images/appstore.svg" class="blur-up lazyload"
                                                 alt="">
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="sub-footer section-small-space">
            <div class="reserve">
                <h6 class="text-content">©2022 seanovia All rights reserved</h6>
            </div>

            <div class="payment">
                <img src="/Client/assets/images/icon/paymant/saman.jpg" style="width: 50px;" class="blur-up lazyload " alt="">
            </div>

            <div class="social-link">
                <h6 class="text-content">در ارتباط باشید :</h6>
                <ul>
                    <li>
                        <a href="https://www.facebook.com/" target="_blank">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/" target="_blank">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://in.pinterest.com/" target="_blank">
                            <i class="fa-brands fa-pinterest-p"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->



<!-- Quick View Modal Box Start -->
<div class="modal fade theme-modal view-modal" id="view" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header p-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row g-sm-4 g-2">
                    <div class="col-lg-6">
                        <div class="slider-image">
                            <img src="/Client/assets/images/product/category/1.jpg" class="img-fluid blur-up lazyload"
                                 alt="">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="right-sidebar-modal">
                            <h4 class="title-name">Peanut Butter Bite Premium Butter Cookies 600 g</h4>
                            <h4 class="price">$36.99</h4>
                            <div class="product-rating">
                                <ul class="rating">
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star" class="fill"></i>
                                    </li>
                                    <li>
                                        <i data-feather="star"></i>
                                    </li>
                                </ul>
                                <span class="ms-2">8 Reviews</span>
                                <span class="ms-2 text-danger">6 sold in last 16 hours</span>
                            </div>

                            <div class="product-detail">
                                <h4>Product Details :</h4>
                                <p>Candy canes sugar plum tart cotton candy chupa chups sugar plum chocolate I love.
                                    Caramels marshmallow icing dessert candy canes I love soufflé I love toffee.
                                    Marshmallow pie sweet sweet roll sesame snaps tiramisu jelly bear claw. Bonbon
                                    muffin I love carrot cake sugar plum dessert bonbon.</p>
                            </div>

                            <ul class="brand-list">
                                <li>
                                    <div class="brand-box">
                                        <h5>Brand Name:</h5>
                                        <h6>Black Forest</h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="brand-box">
                                        <h5>Product Code:</h5>
                                        <h6>W0690034</h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="brand-box">
                                        <h5>Product Type:</h5>
                                        <h6>White Cream Cake</h6>
                                    </div>
                                </li>
                            </ul>

                            <div class="select-size">
                                <h4>Cake Size :</h4>
                                <select class="form-select select-form-size">
                                    <option selected>Select Size</option>
                                    <option value="1.2">1/2 KG</option>
                                    <option value="0">1 KG</option>
                                    <option value="1.5">1/5 KG</option>
                                    <option value="red">Red Roses</option>
                                    <option value="pink">With Pink Roses</option>
                                </select>
                            </div>

                            <div class="modal-button">
                                <button onclick="location.href = 'cart.html';"
                                        class="btn btn-md add-cart-button icon">Add
                                    To Cart</button>
                                <button onclick="location.href = 'product-left.html';"
                                        class="btn theme-bg-color view-button icon text-white fw-bold btn-md">
                                    View More Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Quick View Modal Box End -->


{{--<!-- Cookie Bar Box Start -->--}}
{{--<div class="cookie-bar-box">--}}
{{--    <div class="cookie-box">--}}
{{--        <div class="cookie-image">--}}
{{--            <img src="/Client/assets/images/cookie-bar.png" class="blur-up lazyload" alt="">--}}
{{--            <h2>Cookies!</h2>--}}
{{--        </div>--}}

{{--        <div class="cookie-contain">--}}
{{--            <h5 class="text-content">We use cookies to make your experience better</h5>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="button-group">--}}
{{--        <button class="btn privacy-button">Privacy Policy</button>--}}
{{--        <button class="btn ok-button">OK</button>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- Cookie Bar Box End -->--}}

<!-- Deal Box Modal Start -->
<div class="modal fade theme-modal deal-modal" id="deal-box" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-fullscreen-sm-down">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title w-100" id="deal_today">Deal Today</h5>
                    <p class="mt-1 text-content">Recommended deals for you.</p>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="deal-offer-box">
                    <ul class="deal-offer-list">
                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="/Client/assets/images/vegetable/product/10.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-2">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="/Client/assets/images/vegetable/product/11.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-3">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="/Client/assets/images/vegetable/product/12.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>

                        <li class="list-1">
                            <div class="deal-offer-contain">
                                <a href="shop-left-sidebar.html" class="deal-image">
                                    <img src="/Client/assets/images/vegetable/product/13.png" class="blur-up lazyload"
                                         alt="">
                                </a>

                                <a href="shop-left-sidebar.html" class="deal-contain">
                                    <h5>Blended Instant Coffee 50 g Buy 1 Get 1 Free</h5>
                                    <h6>$52.57 <del>57.62</del> <span>500 G</span></h6>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Deal Box Modal End -->

<!-- Add to cart Modal Start -->
<div class="add-cart-box">
    <div class="add-iamge">
        <img src="/Client/assets/images/cake/pro/1.jpg" class="img-fluid blur-up lazyload" alt="">
    </div>

    <div class="add-contain">
        <h6>Added to Cart</h6>
    </div>
</div>
<!-- Add to cart Modal End -->

<!-- Tap to top start -->
<div class="theme-option">
    <div class="back-to-top">
        <a id="back-to-top" href="#">
            <i class="fas fa-chevron-up"></i>
        </a>
    </div>
</div>
<!-- Tap to top end -->

@yield('sticky-cart')

<!-- Bg overlay Start -->
<div class="bg-overlay"></div>
<!-- Bg overlay End -->

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

@yield('js')
</body>

</html>
