@extends('Client.Layouts.master')


@section('content')
    {{--Loader section Start--}}
        <section class="container-fluid-lg   fullpage-skleton-loader row loading align-content-start justify-content-around">
                <div class="col-md-8 col-lg-8 rounded sliderLoading" style="height: 25rem;"></div>
                <div class="col-md-3 col-lg-3 h-10  rounded sliderLoading" style="height: 25rem;"></div>
                <div class="col-md-12 col-lg-12 mh-100 justify-content-evenly  rounded row mt-4 w-100 " >
                    <div class="col-md-1 col-lg-1 col-sm-5 square-10  rounded sliderLoading mt-2"></div>
                    <div class="col-md-1 col-lg-1 col-sm-5 square-10  rounded sliderLoading mt-2"></div>
                    <div class="col-md-1 col-lg-1 col-sm-5 square-10  rounded sliderLoading mt-2"></div>
                    <div class="col-md-1 col-lg-1 col-sm-5 square-10  rounded sliderLoading mt-2"></div>
                    <div class="col-md-1 col-lg-1 col-sm-5 square-10  rounded sliderLoading mt-2"></div>
                    <div class="col-md-1 col-lg-1 col-sm-5 square-10  rounded sliderLoading mt-2"></div>
                    <div class="col-md-1 col-lg-1 col-sm-5 square-10  rounded sliderLoading mt-2"></div>
                    <div class="col-md-1 col-lg-1 col-sm-5 square-10  rounded sliderLoading mt-2"></div>
                </div>
                <div class="col-md-12 col-lg-12 justify-content-evenly  rounded  mt-4 sliderLoading  " style="width: 90%;height: 8rem">
                </div>
            <div class="col-md-12 col-lg-12 mh-100 justify-content-evenly rounded row mt-4 w-100">
                <div class="col-md-6 col-lg-2 col-sm-12   rounded sliderLoading mt-2"></div>
                <div class="col-md-6 col-lg-2 col-sm-12   rounded sliderLoading mt-2"></div>
                <div class="col-md-6 col-lg-2 col-sm-12   rounded sliderLoading mt-2"></div>
                <div class="col-md-6 col-lg-2 col-sm-12   rounded sliderLoading mt-2"></div>
            </div>
            <div class="col-md-12 col-lg-12 justify-content-evenly rounded row mt-4 w-100" style="height: 250px">
                <div class="col-md-8 col-lg-8 col-sm-12  h-75 rounded mt-2 row justify-content-evenly">
                    <div class="col-md-2 col-lg-2 col-sm-5   rounded sliderLoading mt-2" style="height: 50px;"></div>
                    <div class="col-md-2 col-lg-2 col-sm-5   rounded sliderLoading mt-2" style="height: 50px;"></div>
                    <div class="col-md-2 col-lg-2 col-sm-5   rounded sliderLoading mt-2" style="height: 50px;"></div>
                    <div class="col-md-2 col-lg-2 col-sm-5   rounded sliderLoading mt-2" style="height: 50px;"></div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12 hidden-loader rounded sliderLoading mt-2">

                </div>
            </div>

        </section>
    {{--Loader section End--}}


    <!-- Home Section Start -->
    <section class="home-section pt-2">
        <div class="container-fluid-lg ">
            <div class="row g-4">
                <div class="col-xl-9 col-lg-8 ">
                        <a href="{{route('home')}}">
                    <div class="home-contain h-100 ">
                         <img src="{{str_replace('public','/storage',$home_header_right['path'])}}" class="bg-img blur-up lazyload " alt="{{$home_header_right['title']}}">
                    </div>
                        </a>
                </div>
                <div class="col-xl-3 col-lg-4 d-lg-inline-block d-none ratio_156 ">
                    <div class="home-contain h-100 ">
                        <a href="{{route('home')}}"><img src="{{str_replace('public','/storage',$home_header_left['path'])}}" class="bg-img blur-up lazyload " alt="{{$home_header_left['title']}}"></a>
{{--                        <div class="home-detail p-top-left home-p-sm w-75">--}}
{{--                            <div>--}}
{{--                                <h2 class="mt-0 text-danger">{{$home_header_left->offer}}% <span class="discount text-title">OFF</span>--}}
{{--                                </h2>--}}
{{--                                <h3 class="theme-color">{{$home_header_left->title}}</h3>--}}
{{--                                <h5 class="text-content">--}}
{{--                                    @php--}}
{{--                                        echo $home_header_left->description--}}
{{--                                    @endphp--}}
{{--                                </h5>--}}
{{--                                <a href="shop-left-sidebar.html" class="shop-button">همین الان بخر <i--}}
{{--                                        class="fa-solid fa-right-long ms-2"></i></a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Home Section End -->



    <!-- Category Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">

                    @if(isset($categories))
                    <div class="slider-9 ">
                        @foreach($categories as $category)
                            @if(!$category->category_id)
                        <div class="categoryImage" >
                            <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark ">
                                <div class="">
                                    <img src="{{str_replace('public','/storage',optional($category->gallery)->path)}}" class="blur-up lazyload " alt="">
                                    <h5>{{$category->name}}</h5>
                                </div>
                            </a>
                        </div>
                            @endif
                        @endforeach
                    </div>
                    @else
                    <div class="slider-9">
                            <div>
                                <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark">
                                    <div>
                                        <img src="/Client/assets/svg/2/1.svg" class="blur-up lazyload" alt="">
                                        <h5>Cake</h5>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark"
                                   data-wow-delay="0.2s">
                                    <div>
                                        <img src="/Client/assets/svg/2/2.svg" class="blur-up lazyload" alt="">
                                        <h5>Sandwich</h5>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark"
                                   data-wow-delay="0.3s">
                                    <div>
                                        <img src="/Client/assets/svg/2/3.svg" class="blur-up lazyload" alt="">
                                        <h5>Cookies</h5>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark"
                                   data-wow-delay="0.4s">
                                    <div>
                                        <img src="/Client/assets/svg/2/4.svg" class="blur-up lazyload" alt="">
                                        <h5>Pie</h5>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark"
                                   data-wow-delay="0.5s">
                                    <div>
                                        <img src="/Client/assets/svg/2/5.svg" class="blur-up lazyload" alt="">
                                        <h5>Bread</h5>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark"
                                   data-wow-delay="0.6s">
                                    <div>
                                        <img src="/Client/assets/svg/2/6.svg" class="blur-up lazyload" alt="">
                                        <h5>Biscuits</h5>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark"
                                   data-wow-delay="0.7s">
                                    <div>
                                        <img src="/Client/assets/svg/2/7.svg" class="blur-up lazyload" alt="">
                                        <h5>Bagel</h5>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark"
                                   data-wow-delay="0.8s">
                                    <div>
                                        <img src="/Client/assets/svg/2/8.svg" class="blur-up lazyload" alt="">
                                        <h5>Croissant</h5>
                                    </div>
                                </a>
                            </div>

                            <div>
                                <a href="shop-left-sidebar.html" class="category-box category-box-2 category-dark"
                                   data-wow-delay="0.9s">
                                    <div>
                                        <img src="/Client/assets/svg/2/9.svg" class="blur-up lazyload" alt="">
                                        <h5>Cupcake</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </section>
    <!-- Category Section End -->


    <!-- Discount Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="banner-contain hover-effect">
                        <img src="{{str_replace('public' , '/storage',$home_main_top['path'])}}" class="bg-img blur-up lazyload" alt="{{$home_main_top['title']}}">
                        <div class="banner-details p-center p-sm-4 p-3 text-white text-center">
                            <div>
                                <h3 class="lh-base fw-bold text-black-50">
                                    @php
                                        echo $home_main_top['description'];
                                    @endphp
                                </h3>
                                <h6 class="coupon-code code-2">کد تخفیف : GROCERY1920</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Discount Section End -->

    <!-- Banner Section Start -->

    <section class="ratio_60">
        <div class="container-fluid-lg">
            <div class="row g-3">
                <div class="col-xxl-3 col-sm-6">
                    <a href="shop-left-sidebar.html" class="banner-contain-2 hover-effect">
                        <img src="{{str_replace('public' , '/storage',$home_offer_1['path'])}}" class="bg-img blur-up lazyload" alt="{{$home_offer_1['title']}}">
{{--                        <div class="banner-detail p-top-left">--}}
{{--                            <div>--}}
{{--                                <div class="banner-detail-box mb-md-3 mb-1">--}}
{{--                                    <h6 class="text-danger">5% OFF</h6>--}}
{{--                                    <h4 class="mt-2">New Items</h4>--}}
{{--                                    <h6 class="mt-2 text-content">Daily Essentials</h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </a>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <a href="shop-left-sidebar.html" class="banner-contain-2 hover-effect">
                        <img src="{{str_replace('public' , '/storage',$home_offer_2['path'])}}" class="bg-img blur-up lazyload" alt="{{$home_offer_2['title']}}">
{{--                        <div class="banner-detail p-top-left">--}}
{{--                            <div>--}}
{{--                                <div class="banner-detail-box mb-md-3 mb-1">--}}
{{--                                    <h6 class="text-danger">5% OFF</h6>--}}
{{--                                    <h4 class="mt-2">New Items</h4>--}}
{{--                                    <h6 class="mt-2 text-content">Daily Essentials</h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </a>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <a href="shop-left-sidebar.html" class="banner-contain-2 hover-effect">
                        <img src="{{str_replace('public' , '/storage',$home_offer_3['path'])}}" class="bg-img blur-up lazyload" alt="{{$home_offer_3['title']}}">
{{--                        <div class="banner-detail p-top-left">--}}
{{--                            <div>--}}
{{--                                <div class="banner-detail-box mb-md-3 mb-1">--}}
{{--                                    <h6 class="text-danger">5% OFF</h6>--}}
{{--                                    <h4 class="mt-2">New Items</h4>--}}
{{--                                    <h6 class="mt-2 text-content">Daily Essentials</h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </a>
                </div>
                <div class="col-xxl-3 col-sm-6">
                    <a href="shop-left-sidebar.html" class="banner-contain-2 hover-effect">
                        <img src="{{str_replace('public' , '/storage',$home_offer_4['path'])}}" class="bg-img blur-up lazyload" alt="{{$home_offer_4['title']}}">
{{--                        <div class="banner-detail p-top-left">--}}
{{--                            <div>--}}
{{--                                <div class="banner-detail-box mb-md-3 mb-1">--}}
{{--                                    <h6 class="text-danger">5% OFF</h6>--}}
{{--                                    <h4 class="mt-2">New Items</h4>--}}
{{--                                    <h6 class="mt-2 text-content">Daily Essentials</h6>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner Section End -->

    <!-- Product Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row g-3">
                <div class="col-xxl-9 col-xl-8">
                    <div class="title title-flex">
                        <div>
                            <h2>تخفیف های امروز</h2>
                            <span class="title-leaf">
                                <svg class="icon-width">
                                    <use xlink:href="/Client/assets/svg/leaf.svg#cake"></use>
                                </svg>
                            </span>
                        </div>
                        <div class="timing-box">
                            <div class="timing theme-bg-color">
                                <i data-feather="clock"></i>
                                <h6 class="name">اتمام تخفیف :</h6>
                                <div class="time" id="clockdiv-1" data-hours="1" data-minutes="2" data-seconds="3">
                                    <ul>
                                        <li>
                                            <div class="counter">
                                                <div class="seconds">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="minutes">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="hours">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="counter">
                                                <div class="days">
                                                    <h6></h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product-box-slider-2 no-arrow">
                        @foreach($offerProducts as $product)
                        <div>
                            <div class="product-box product-box-bg wow fadeInUp ">
                                <div class="product-image " >
                                    <a href="{{route('products.single',$product)}}" target=”_blank”>
                                        <img  src="{{str_replace('public','/storage',$product->gallery->path)}}"
                                             class="img-fluid blur-up lazyload " alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="مشاهده">
                                            <a href="javascript:;" onclick="viewproduct(event,{{$product->id}})" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li >
                                            <a href="javascript:;" class="notifi-wishlist" @if(in_array($product->id,$user_wishlist)) onclick="deleteWishlistShop(event,'{{$product->id}}')" @else onclick="addWishlistShop(event,'{{$product->id}}')" @endif>
                                                <i class="fa text-danger @if(in_array($product->id,$user_wishlist)) fa-heart  @else fa-heart-o @endif" aria-hidden="true"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="{{route('products.single',$product)}}">
                                        <h6 class="name">
                                            {{$product->name}}
                                        </h6>
                                    </a>

                                    <h5 class="sold text-content ">
                                        @if($product->offer)
                                        <span class="theme-color price">{{faNumber(number_format($product->price - ($product->price*$product->offer/100)))}}
                                            <object data="/Client/assets/svg/toman.svg" width="20" height="20"> </object>
                                        </span>
                                        <br>
                                        <del class="">{{faNumber(number_format($product->price))}}
                                        </del>
                                        @else
                                            <span class="theme-color price fa-num">{{faNumber(number_format($product->price))}}
                                                <object data="/Client/assets/svg/toman.svg" width="20" height="20"> </object>
                                                <br>
                                                <del></del>
                                            </span>
                                        @endif
                                    </h5>

                                    <div class="product-rating mt-2">
                                        @if(\Modules\Cart\Helpers\Cart\Cart::has($product))
                                            @php $productInCart =  \Modules\Cart\Helpers\Cart\Cart::get($product)@endphp
{{--                                            <h6 class="theme-color"><i class="fa fa-shopping-cart" aria-hidden="true"></i>در سبد شما </h6>--}}
                                        @endif
                                    </div>
                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button" onclick="addCartlistShop(event,{{$product->id}},1,true)">افزودن
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box @if(\Modules\Cart\Helpers\Cart\Cart::has($product))open @endif">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="" >
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" readonly="readonly" type="text" min="1" max="{{$product->maxOrder}}"
                                                       name="quantity" value="@php echo (\Modules\Cart\Helpers\Cart\Cart::has($product) ) ? ($productInCart['quantity']) : '1' @endphp " id="valueSingleProductFloating{{$product->id}}"  data-maxOrder="{{$product->maxOrder}}" @if(\Modules\Cart\Helpers\Cart\Cart::has($product))data-cart="{{$productInCart['id']}}" @endif onchange="changeQuantityShop(event,'{{$product->id}}')">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="" >
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        @endforeach

                    </div>

                    <div class="title section-t-space">
                        <h2>ALL KINDS OF CAKES</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="/Client/assets/svg/leaf.svg#cake"></use>
                            </svg>
                        </span>
                    </div>

                    <div class="slider-3_2 product-wrapper">
                        <div>
                            <div class="product-box-2 wow fadeIn">
                                <a href="product-left-thumbnail.html" class="product-image">
                                    <img src="/Client/assets/images/cake/pro/1.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </a>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6>Creamy Chocolate Cake</h6>
                                    </a>
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
                                    <h5>$140 <del>$180</del></h5>
                                </div>
                            </div>

                            <div class="product-box-2 wow fadeIn" data-wow-delay="0.1s">
                                <a href="product-left-thumbnail.html" class="product-image">
                                    <img src="/Client/assets/images/cake/pro/2.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </a>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6>Creamy White Forest</h6>
                                    </a>
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
                                    <h5>$140 <del>$180</del></h5>
                                </div>
                            </div>

                            <div class="product-box-2 wow fadeIn" data-wow-delay="0.2s">
                                <a href="product-left-thumbnail.html" class="product-image">
                                    <img src="/Client/assets/images/cake/pro/3.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </a>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6>Fruit Cherry Cake</h6>
                                    </a>
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
                                    <h5>$140 <del>$180</del></h5>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box-2 wow fadeIn">
                                <a href="product-left-thumbnail.html" class="product-image">
                                    <img src="/Client/assets/images/cake/pro/4.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </a>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6>Muffets Burger Bun</h6>
                                    </a>
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
                                    <h5>$140 <del>$180</del></h5>
                                </div>
                            </div>

                            <div class="product-box-2 wow fadeIn" data-wow-delay="0.1s">
                                <a href="product-left-thumbnail.html" class="product-image">
                                    <img src="/Client/assets/images/cake/pro/5.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </a>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6>Grand Celebration Cake</h6>
                                    </a>
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
                                    <h5>$140 <del>$180</del></h5>
                                </div>
                            </div>

                            <div class="product-box-2 wow fadeIn" data-wow-delay="0.2s">
                                <a href="product-left-thumbnail.html" class="product-image">
                                    <img src="/Client/assets/images/cake/pro/6.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </a>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6>Sweet Cake</h6>
                                    </a>
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
                                    <h5>$140 <del>$180</del></h5>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box-2 wow fadeIn">
                                <a href="product-left-thumbnail.html" class="product-image">
                                    <img src="/Client/assets/images/cake/pro/1.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </a>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6>Creamy Chocolate Cake</h6>
                                    </a>
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
                                    <h5>$140 <del>$180</del></h5>
                                </div>
                            </div>

                            <div class="product-box-2 wow fadeIn" data-wow-delay="0.1s">
                                <a href="product-left-thumbnail.html" class="product-image">
                                    <img src="/Client/assets/images/cake/pro/2.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </a>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6>Creamy White Forest</h6>
                                    </a>
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
                                    <h5>$140 <del>$180</del></h5>
                                </div>
                            </div>

                            <div class="product-box-2 wow fadeIn" data-wow-delay="0.2s">
                                <a href="product-left-thumbnail.html" class="product-image">
                                    <img src="/Client/assets/images/cake/pro/3.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </a>

                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6>Fruit Cherry Cake</h6>
                                    </a>
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
                                    <h5>$140 <del>$180</del></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="title section-t-space">
                        <h2>Your Daily Staples</h2>
                        <span class="title-leaf">
                            <svg class="icon-width">
                                <use xlink:href="/Client/assets/svg/leaf.svg#cake"></use>
                            </svg>
                        </span>
                    </div>

                    <div class="product-box-slider-2 no-arrow">
                        <div>
                            <div class="product-box product-box-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/1.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Muffets & Tuffets Whole Wheat Bread 400 g
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-box product-box-bg wow fadeIn" data-wow-delay="0.1s">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/2.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Fresh Bread and Pastry Flour 200 g
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                                <i data-feather="star"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box product-box-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/3.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Peanut Butter Bite Premium Butter Cookies 600 g
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                        </ul>
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-box product-box-bg wow fadeIn" data-wow-delay="0.1s">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/4.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            SnackAmor Combo Pack of Jowar Stick and Jowar Chips
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                        </ul>
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box product-box-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/5.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Yumitos Chilli Sprinkled Potato Chips 100 g
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
                                        <ul class="rating">
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-box product-box-bg wow fadeIn" data-wow-delay="0.1s">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/6.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Fantasy Crunchy Choco Chip Cookies
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box product-box-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/7.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Fresh Bread and Pastry Flour 200 g
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-box product-box-bg wow fadeIn" data-wow-delay="0.1s">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/8.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Milky Silicone Heart Chocolate Mould ( Pack of 1 )
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box product-box-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/9.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">chocolate-chip-cookies 250 g</h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-box product-box-bg wow fadeIn" data-wow-delay="0.1s">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/10.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Cupcake Holder for Birthday and Wedding Party 100 g
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="product-box product-box-bg wow fadeIn">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/5.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Yumitos Chilli Sprinkled Potato Chips 100 g
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
                                        <ul class="rating">
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star" class="fill"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                            <li>
                                                <i data-feather="star"></i>
                                            </li>
                                        </ul>
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="product-box product-box-bg wow fadeIn" data-wow-delay="0.1s">
                                <div class="product-image">
                                    <a href="product-left-thumbnail.html">
                                        <img src="/Client/assets/images/cake/product/6.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </a>
                                    <ul class="product-option">
                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#view">
                                                <i data-feather="eye"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                            <a href="compare.html">
                                                <i data-feather="refresh-cw"></i>
                                            </a>
                                        </li>

                                        <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                            <a href="wishlist.html" class="notifi-wishlist">
                                                <i data-feather="heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="product-detail">
                                    <a href="product-left-thumbnail.html">
                                        <h6 class="name">
                                            Fantasy Crunchy Choco Chip Cookies
                                        </h6>
                                    </a>

                                    <div class="product-rating mt-2">
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
                                    </div>

                                    <h6 class="sold weight text-content fw-normal">1 KG</h6>

                                    <h6 class="price theme-color">$ 80.00</h6>

                                    <div class="add-to-cart-box bg-white">
                                        <button class="btn btn-add-cart addcart-button">Add
                                            <span class="add-icon bg-light-orange">
                                                <i class="fa-solid fa-plus"></i>
                                            </span>
                                        </button>
                                        <div class="cart_qty qty-box">
                                            <div class="input-group">
                                                <button type="button" class="qty-left-minus" data-type="minus"
                                                        data-field="">
                                                    <i class="fa fa-minus" aria-hidden="true"></i>
                                                </button>
                                                <input class="form-control input-number qty-input" type="text"
                                                       name="quantity" value="0">
                                                <button type="button" class="qty-right-plus" data-type="plus"
                                                        data-field="">
                                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-3 col-xl-4 d-none d-xl-block">
                    <div class="position-sticky top-0">
                        <div class="ratio_209 rounded wow fadeIn">
                            <div class="banner-contain-2 rounded hover-effect">
                                <img src="{{str_replace('public','/storage',$home_sticky_top['path'])}}" class="bg-img blur-up lazyload" alt="{{$home_sticky_top['title']}}">
{{--                                <div class="banner-detail p-top-left">--}}
{{--                                    <div>--}}
{{--                                        <h6 class="text-uppercase theme-color fw-500">{{$home_sticky_top->tag}}</h6>--}}
{{--                                        <h3 class="text-uppercase">--}}
{{--                                            special <span class="brand-name">ویژه</span>--}}
{{--                                        </h3>--}}
{{--                                        <p class="text-content fw-500 mt-3 lh-lg">--}}
{{--                                            @php--}}
{{--                                                echo $home_sticky_top->description;--}}
{{--                                            @endphp--}}
{{--                                        </p>--}}

{{--                                        <div class="banner-detail-box banner-detail-box-2 mb-md-3 mb-1">--}}
{{--                                            <h4 class="text-uppercase">تا</h4>--}}
{{--                                            <h2 class="mt-2 text-white">{{$home_sticky_top->offer}}%</h2>--}}
{{--                                            <h3 class="text-uppercase">off</h3>--}}
{{--                                        </div>--}}

{{--                                        <div>--}}
{{--                                            <button onclick="location.href = 'shop-left-sidebar.html';"--}}
{{--                                                    class="btn text-white btn-md mt-xxl-4 mt-2 home-button mend-auto theme-bg-color">سفارش دهید<i class="fa-solid fa-right-long icon ms-2"></i>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>


                        </div>

                        <div class="ratio_125 section-t-space wow fadeIn">
                            <div class="banner-contain-2 rounded hover-effect">
                                <img src="{{str_replace('public','/storage',$home_sticky_bottom['path'])}}" class="bg-img blur-up lazyload" alt="{{$home_sticky_bottom['title']}}">
{{--                                <div class="banner-detail p-top-left">--}}
{{--                                    <div>--}}
{{--                                        <h6 class="text-uppercase theme-color fw-500">Freash Every Day!</h6>--}}
{{--                                        <h3 class=" mt-2">Delicioud <span class="theme-color">Bread</span>--}}
{{--                                        </h3>--}}
{{--                                        <p class="text-content fw-500 mt-3 w-75 mend-auto">Delicioud Bread and Brend new--}}
{{--                                            fresh bread.</p>--}}
{{--                                        <button onclick="location.href = 'shop-left-sidebar.html';"--}}
{{--                                                class="btn text-white btn-md mt-2 home-button mend-auto theme-bg-color">--}}
{{--                                            Shop Now <i class="fa-solid fa-right-long icon ms-2"></i>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            </div>
                        </div>
                        @if(isset($comment))
                        <div class="section-t-space wow fadeIn">
                            <div class="category-menu category-menu-2">
                                <h3>محبوب ترین نظرات</h3>

                                <div class="review-box">
                                    <div class="review-contain">
                                        <h5 class="w-75">{{$comment->user->firstName}}</h5>
                                        <p>{{$comment->text}}</p>
                                    </div>

                                    <div class="review-profile">
                                        <div class="review-image">
                                            <img src="{{str_replace('public','/storage',$comment->product->gallery->path)}}"
                                                 class="img-fluid blur-up lazyload" alt="">
                                        </div>
                                        <div class="review-detail">
                                            <h5>{{$comment->product->name}}</h5>
                                            <h6>{{jdate($comment->created_at)->ago()}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Banner Section Start -->
    <section>
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="home-contain hover-effect">
                        <img src="{{str_replace('public','/storage',$home_body_middle['path'])}}" class="bg-img blur-up lazyload" alt="{{$home_body_middle['title']}}">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Top Selling Section Start -->
    <section class="top-selling-section">
        <div class="container-fluid-lg">
            <div class="slider-4-1">
                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Top Selling</h3>
                                </div>

                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/1.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Creamy Chocolate Cake</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 10.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeInUp" data-wow-delay="0.5s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/2.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Creamy White Forest</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 40.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeInUp" data-wow-delay="0.5s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/3.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Fruit Cherry Cake</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 45.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Trending Products</h3>
                                </div>

                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/5.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Grand Celebration Cake</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 10.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeInUp" data-wow-delay="0.2s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/6.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Sweet Cake</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 40.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeInUp" data-wow-delay="0.4s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/1.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Creamy Chocolate Cake</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 85.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Recently added</h3>
                                </div>

                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/4.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Fruit Cherry Cake</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 10.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeInUp" data-wow-delay="0.2s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/5.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Creamy Chocolate Cake</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 40.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeInUp" data-wow-delay="0.4s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/6.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Creamy White Forest</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 45.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-12">
                            <div class="top-selling-box">
                                <div class="top-selling-title">
                                    <h3>Top Rated</h3>
                                </div>

                                <div class="top-selling-contain wow fadeInUp">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/3.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Muffets Burger Bun</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 10.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeInUp" data-wow-delay="0.2s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/4.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Grand Celebration Cake</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 40.00</h6>
                                    </div>
                                </div>

                                <div class="top-selling-contain wow fadeInUp" data-wow-delay="0.4s">
                                    <a href="product-left-thumbnail.html" class="top-selling-image">
                                        <img src="/Client/assets/images/cake/pro/5.jpg" class="img-fluid blur-up lazyload"
                                             alt="">
                                    </a>

                                    <div class="top-selling-detail">
                                        <a href="product-left-thumbnail.html">
                                            <h5>Sweet Cake</h5>
                                        </a>
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
                                            <span>(34)</span>
                                        </div>
                                        <h6>$ 45.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Top Selling Section End -->

    <!-- Newsletter Section Start -->
    <section class="newsletter-section section-b-space">
        <div class="container-fluid-lg">
            <div class="newsletter-box newsletter-box-2 newsletter-box-3">
                <div class="newsletter-contain py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-4 col-lg-5 col-md-7 col-sm-9 offset-xxl-2 offset-md-1">
                                <div class="newsletter-detail">
                                    <h2>Join our newsletter and get...</h2>
                                    <h5>$20 discount for your first order</h5>
                                    <div class="input-box">
                                        <input type="email" class="form-control" id="exampleFormControlInput1"
                                               placeholder="Enter Your Email">
                                        <i class="fa-solid fa-envelope arrow"></i>
                                        <button class="sub-btn btn text-white theme-bg-color">
                                            <span class="d-sm-block d-none">Subscribe</span>
                                            <i class="fa-solid fa-arrow-right icon"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->
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
                <div class="modal-body" id="modal-body-view">

                </div>
            </div>
        </div>
    </div>
    <!-- Quick View Modal Box End -->
@endsection

@section('js')
    <!-- jquery ui-->
    <script src="/Client/assets/js/jquery-ui.min.js"></script>

    {{--    Slick js--}}
    <script src="/Client/assets/js/bootstrap/bootstrap-notify.min.js"></script>
    <script src="/Client/assets/js/slick/slick.js"></script>
    <script src="/Client/assets/js/slick/custom_slick.js"></script>

    <!-- Auto Height Js -->
    <script src="/Client/assets/js/auto-height.js"></script>

    <!-- Timer Js -->
    <script src="/Client/assets/js/timer1.js"></script>

    <!-- Fly Cart Js -->
    <script src="/Client/assets/js/fly-cart.js"></script>

    <!-- Quantity js -->
    <script src="/Client/assets/js/quantity-2.js"></script>

    <!-- WOW js -->
    <script src="/Client/assets/js/wow.min.js"></script>
    <script src="/Client/assets/js/custom-wow.js"></script>

    <!-- sidebar open js -->
    <script src="/Client/assets/js/filter-sidebar.js"></script>

    {{--    Add to Cart js --}}
    <script src="/Client/assets/js/Cart.js"></script>

    <script src="/Client/assets/js/home.js"></script>
{{--    <script>--}}
{{--        const lazyImages = document.querySelectorAll(".imageLoading");--}}
{{--        // Create a new Intersection Observer--}}
{{--        const observer = new IntersectionObserver((entries, observer) => {--}}
{{--            entries.forEach((entry) => {--}}
{{--                if (entry.isIntersecting) {--}}
{{--                    // Load the image when it comes into the viewport--}}
{{--                    entry.target.src = entry.target.dataset.src;--}}
{{--                    observer.unobserve(entry.target); // Unobserve the image after it's loaded--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}
{{--        // Observe each lazy image--}}
{{--        lazyImages.forEach((image) => {--}}
{{--            observer.observe(image);--}}
{{--            console.log(image);--}}
{{--            image.classList.remove('imageLoading')--}}
{{--            image.parentElement.classList.remove('loading')--}}
{{--        });--}}
{{--    </script>--}}
@endsection
