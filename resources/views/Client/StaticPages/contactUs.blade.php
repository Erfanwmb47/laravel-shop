@extends('Client.Layouts.master')

@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>ارتباط با ما</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">ارتباط با ما</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Box Section Start -->
    <section class="contact-box-section">
        <div class="container-fluid-lg">
            <div class="row g-lg-5 g-3">
                <div class="col-lg-6">
                    <div class="left-sidebar-box">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="contact-image">
                                    <img src="/Client/assets/images/inner-page/contact-us.png"
                                         class="img-fluid blur-up lazyloaded" alt="">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="contact-title">
                                    <h3>در تماس باشید</h3>
                                </div>

                                <div class="contact-detail mb-2">
                                    <div class="row g-4">
                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-phone"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>شماره تماس</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <a href="{{$shop_tel->value}}">{{str_replace('+98921','021-',$shop_tel->value)}}</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-envelope"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>پست الکترونیک</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>{{$shop_email->value}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-location-dot"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>آدرس</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <marquee>{{$shop_address->value}}</marquee>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xxl-6 col-lg-12 col-sm-6">
                                            <div class="contact-detail-box">
                                                <div class="contact-icon">
                                                    <i class="fa-solid fa-building"></i>
                                                </div>
                                                <div class="contact-detail-title">
                                                    <h4>پاسخگویی</h4>
                                                </div>

                                                <div class="contact-detail-contain">
                                                    <p>از ساعت 10 صبح تا 6 بعد از ظهر</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="title d-xxl-none d-block">
                        <h2>ارتباط با ما</h2>
                    </div>
                    <div class="right-sidebar-box">
                        <form action="{{route('contactUs.send')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlInput" class="form-label">نام</label>
                                        <div class="custom-input">
                                            <input type="text" class="form-control" id="exampleFormControlInput"
                                                   placeholder="نام خود را وارد کنید" name="firstName">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlInput1" class="form-label">نام خانوادگی</label>
                                        <div class="custom-input">
                                            <input type="text" class="form-control" id="exampleFormControlInput1"
                                                   placeholder="نام خانوادگی خود را وارد کنید" name="lastName">
                                            <i class="fa-solid fa-user"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlInput2" class="form-label">ایمیل شما</label>
                                        <div class="custom-input">
                                            <input type="email" class="form-control" id="exampleFormControlInput2"
                                                   placeholder="آدرس ایمیل خود را وارد کنید" name="email">
                                            <i class="fa-solid fa-envelope"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-6 col-lg-12 col-sm-6">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlInput3" class="form-label">شماره تماس (اختیاری)</label>
                                        <div class="custom-input">
                                            <input type="tel" class="form-control" id="exampleFormControlInput3"
                                                   placeholder="شماره تماس خود را وارد کنید" maxlength="10" oninput="javascript: if (this.value.length > this.maxLength) this.value =
                                            this.value.slice(0, this.maxLength);" name="phone">
                                            <i class="fa-solid fa-mobile-screen-button"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-md-4 mb-3 custom-form">
                                        <label for="exampleFormControlTextarea" class="form-label">متن</label>
                                        <div class="custom-textarea">
                                        <textarea class="form-control" id="exampleFormControlTextarea"
                                                  placeholder="توضیحات خود را وارد کنید" rows="6" name="message"></textarea>
                                            <i class="fa-solid fa-message"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-animation btn-md fw-bold ms-auto">ارسال پیام</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Box Section End -->

    <!-- Map Section Start -->
{{--    <section class="map-section">--}}
{{--        <div class="container-fluid p-0">--}}
{{--            <div class="map-box">--}}
{{--                <iframe--}}
{{--                    src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d2994.3803116994895!2d55.29773782339708!3d25.222534631321!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m5!1s0x3e5f43496ad9c645%3A0xbde66e5084295162!2sDubai%20-%20United%20Arab%20Emirates!3m2!1d25.2048493!2d55.2707828!4m0!5e1!3m2!1sen!2sin!4v1652217109535!5m2!1sen!2sin"--}}
{{--                    style="border:0;" allowfullscreen="" loading="lazy"--}}
{{--                    referrerpolicy="no-referrer-when-downgrade"></iframe>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <!-- Map Section End -->
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
