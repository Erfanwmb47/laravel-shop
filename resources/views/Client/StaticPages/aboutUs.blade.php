@extends('Client.Layouts.master')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>درباره ما</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">درباره ما</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Fresh Vegetable Section Start -->
    <section class="fresh-vegetable-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="row gx-xl-5 gy-xl-0 g-3 ratio_148_1">
                <div class="col-xl-6 col-12">
                    <div class="row g-sm-4 g-2">
                        <div class="col-6">
                            <div class="fresh-image-2">
                                <div>
                                    <img src="/Client/assets/images/inner-page/about-us/1.jpg"
                                         class="bg-img blur-up lazyload" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="fresh-image">
                                <div>
                                    <img src="/Client/assets/images/inner-page/about-us/2.jpg"
                                         class="bg-img blur-up lazyload" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-12">
                    <div class="fresh-contain p-center-left">
                        <div>
                            <div class="review-title">
                                <h4>درباره سینویا</h4>
                                <h2>درباره سینویا بیشتر بدانید</h2>
                            </div>

                            <div class="delivery-list">
                                <p class="text-content">شرکت سینویا با چندین سال سابقه ی فعالیت در عرضه محصولات آرایشی و بهداشتی به مراکز بهداشتی و داروخانه ها در راستای بهبود خدمات خود و همچنین حذف واسطه ها، اقدام به تاسیس سایت خود نمود . ما تلاش میکنیم تا با ارائه بروزترین و معتبر ترین محصولات به شما علاوه بر جلب رضایت شما، بتوانیم تجربه خریدی عالی و به صرفه را برای شما عززان به ارمقان آوریم. </p>

                                <ul class="delivery-box">
                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <i class="fa fa-shipping-fast text-lg-center text-success"></i>
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">تنوع بالای محصولات</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                    <i class="fa fa-list text-success"></i>
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">معتبر ترین برند ها</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
                                                <i class="fa fa-money text-success"></i>
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">پایین ترین قیمت</h5>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="delivery-box">
                                            <div class="delivery-icon">
{{--                                                <img src="/Client/assets/svg/3/leaf.svg" class="blur-up lazyload" alt="">--}}
                                                <i class="fa fa-phone text-success"></i>
                                            </div>

                                            <div class="delivery-detail">
                                                <h5 class="text">پاسخگویی سریع</h5>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Fresh Vegetable Section End -->

    <!-- Client Section Start -->
    <section class="client-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="about-us-title text-center">
                        <h4>Honors</h4>
                        <h2 class="center">افتخارات سینویا</h2>
                    </div>

                    <div class="slider-3_1 product-wrapper">
                        <div>
                            <div class="clint-contain">
                                <div class="client-icon">
                                    <img src="/Client/assets/svg/3/work.svg" class="blur-up lazyload" alt="">
                                </div>
                                <h2>10 سال</h2>
                                <h4>سابقه کار</h4>
                                <p>سابقه کاری بالا در زمینه پخش لوازم آرایشی و بهداشتی</p>
                            </div>
                        </div>

                        <div>
                            <div class="clint-contain">
                                <div class="client-icon">
                                    <img src="/Client/assets/svg/3/buy.svg" class="blur-up lazyload" alt="">
                                </div>
                                <h2>3K</h2>
                                <h4>محصول</h4>
                                <p>تنوع بالای محصولات سینویا باعث شده شما عزیزان هر محصولی که احتیاج دارید را به راحتی در سایت ما پیدا کنید</p>
                            </div>
                        </div>

                        <div>
                            <div class="clint-contain">
                                <div class="client-icon">
                                    <img src="/Client/assets/svg/3/user.svg" class="blur-up lazyload" alt="">
                                </div>
                                <h2>87%</h2>
                                <h4>رضایت شما</h4>
                                <p>هدف ما رضایت صد در صدی شما عزیزان است و تا رسیدن به این هدف دست از تلاش بر نمی داریم . </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Client Section End -->

    <!-- Team Section Start -->
    <section class="team-section section-lg-space">
        <div class="container-fluid-lg">
            <div class="about-us-title text-center">
                <h4 class="text-content">Our Creative Team</h4>
                <h2 class="center">تیم سینویا</h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="slider-user product-wrapper">
                        <div>
                            <div class="team-box">
                                <div class="team-iamge">
                                    <img src="/Client/assets/images/inner-page/user/bow.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="team-name">
                                    <h3>مصطفی خلیق</h3>
                                    <h5>Mostafa Khaligh</h5>
                                    <p>توسعه دهنده فرانت و بکند سینویا</p>
                                    <ul class="team-media">
                                        <li>
                                            <a href="javascript:;" class="fb-bg">
                                                <i class="fa-brands fa-telegram"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:;" class="pint-bg">
                                                <i class="fa-brands fa-pinterest-p"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:;" class="twitter-bg">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="javascript:;" class="insta-bg">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div>
                            <div class="team-box">
                                <div class="team-iamge">
                                    <img src="/Client/assets/images/inner-page/user/2.jpg" class="img-fluid blur-up lazyload"
                                         alt="">
                                </div>

                                <div class="team-name">
                                    <h3>عرفان قالی باف</h3>
                                    <h5>Erfan Ghalibaf</h5>
                                    <p>توسعه دهنده فرانت و بکند سینویا</p>
                                    <ul class="team-media">
                                        <li>
                                            <a href="https://www.facebook.com/" class="fb-bg">
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://in.pinterest.com/" class="pint-bg">
                                                <i class="fa-brands fa-pinterest-p"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://twitter.com/" class="twitter-bg">
                                                <i class="fa-brands fa-twitter"></i>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="https://www.instagram.com/" class="insta-bg">
                                                <i class="fa-brands fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

{{--    <!-- Review Section Start -->--}}
{{--    <section class="review-section section-lg-space">--}}
{{--        <div class="container-fluid">--}}
{{--            <div class="about-us-title text-center">--}}
{{--                <h4 class="text-content">Latest Testimonals</h4>--}}
{{--                <h2 class="center">What people say</h2>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <div class="slider-4-half product-wrapper">--}}
{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"I usually try to keep my sadness pent up inside where it can fester quietly as a--}}
{{--                                    mental illness. There, now he's trapped in a book I wrote: a crummy world of plot--}}
{{--                                    holes and spelling errors! As an interesting side note."</p>--}}

{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="/Client/assets/images/inner-page/user/1.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Betty J. Turner</h4>--}}
{{--                                        <h6>CTO, Company</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"My busy schedule leaves little, if any, time for blogging and social media. The--}}
{{--                                    Lorem Ipsum Company has been a huge part of helping me grow my business through--}}
{{--                                    organic search and content marketing."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="/Client/assets/images/inner-page/user/2.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Alfredo S. Rocha</h4>--}}
{{--                                        <h6>Project Manager</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"Professional, responsive, and able to keep up with ever-changing demand and tight--}}
{{--                                    deadlines: That's how I would describe Jeramy and his team at The Lorem Ipsum--}}
{{--                                    Company. When it comes to content marketing."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="/Client/assets/images/inner-page/user/3.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Donald C. Spurr</h4>--}}
{{--                                        <h6>Sale Agents</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"After being forced to move twice within five years, our customers had a hard time--}}
{{--                                    finding us and our sales plummeted. The Lorem Ipsum Co. not only revitalized our--}}
{{--                                    brand."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="/Client/assets/images/inner-page/user/4.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Terry G. Fain</h4>--}}
{{--                                        <h6>Photographer</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"I was skeptical of SEO and content marketing at first, but the Lorem Ipsum Company--}}
{{--                                    not only proved itself financially speaking, but the response I have received from--}}
{{--                                    customers is incredible."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="/Client/assets/images/inner-page/user/1.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Gwen J. Geiger</h4>--}}
{{--                                        <h6>Designer</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"Jeramy and his team at the Lorem Ipsum Company whipped my website into shape just in--}}
{{--                                    time for tax season. I was excited by the results and am proud to direct clients to--}}
{{--                                    my website once again."</p>--}}

{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="/Client/assets/images/inner-page/user/2.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Constance K. Whang</h4>--}}
{{--                                        <h6>CEO, Company</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"Yeah, and if you were the pope they'd be all, "Straighten your pope hat." And "Put--}}
{{--                                    on your good vestments." What are their names? Yep, I remember. They came in last at--}}
{{--                                    the Olympics!"</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="/Client/assets/images/inner-page/user/3.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Christopher R. Lee</h4>--}}
{{--                                        <h6>Managing Director</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div>--}}
{{--                            <div class="reviewer-box">--}}
{{--                                <i class="fa-solid fa-quote-right"></i>--}}
{{--                                <div class="product-rating">--}}
{{--                                    <ul class="rating">--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star" class="fill"></i>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <i data-feather="star"></i>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <h3>Top Quality, Beautiful Location</h3>--}}

{{--                                <p>"Good man. Nixon's pro-war and pro-family. Hey, tell me something. You've got all--}}
{{--                                    this money. How come you always dress like you're doing your laundry? So, how 'bout--}}
{{--                                    them Knicks? What kind of a father would I be if I said no?."</p>--}}
{{--                                <div class="reviewer-profile">--}}
{{--                                    <div class="reviewer-image">--}}
{{--                                        <img src="/Client/assets/images/inner-page/user/4.jpg" class="blur-up lazyload"--}}
{{--                                             alt="">--}}
{{--                                    </div>--}}

{{--                                    <div class="reviewer-name">--}}
{{--                                        <h4>Eileen R. Chu</h4>--}}
{{--                                        <h6>Marketing Director</h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <!-- Review Section End -->--}}
@endsection

@section('js')
    <!-- jquery ui-->
    <script src="/Client/assets/js/jquery-ui.min.js"></script>

    <!-- Slick js-->
    <script src="/Client/assets/js/slick/slick-animation.min.js"></script>
    <script src="/Client/assets/js/bootstrap/bootstrap-notify.min.js"></script>
    <script src="/Client/assets/js/custom-slick-animated.js"></script>

    <!-- Timer Js -->
    <script src="/Client/assets/js/timer1.js"></script>

    <!-- Price Range Js -->
    <script src="/Client/assets/js/ion.rangeSlider.min.js"></script>

    <!-- Zoom Js -->
    <script src="/Client/assets/js/jquery.elevatezoom.js"></script>
    <script src="/Client/assets/js/zoom-filter.js"></script>

    <!-- sidebar open js -->
    <script src="/Client/assets/js/filter-sidebar.js"></script>

    <!-- Quantity js -->
    <script src="/Client/assets/js/quantity-2.js"></script>

    <!-- WOW js -->
    <script src="/Client/assets/js/wow.min.js"></script>
    <script src="/Client/assets/js/custom-wow.js"></script>
@endsection
