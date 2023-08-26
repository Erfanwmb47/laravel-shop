@extends('Client.layouts.master')


@section('content')
    <!-- Order Detail Section Start -->
    <section class="order-detail">
        <div class="container-fluid-lg">
            <div class="row g-sm-4 g-3">
                <div class="col-xxl-3 col-xl-4 col-lg-6">
                    <div class="order-image">
                        <img src="{{str_replace('public','/storage',optional($order->products()->first()->gallery)->path)}}" class="img-fluid blur-up lazyload" alt="">
                    </div>
                </div>

                <div class="col-xxl-9 col-xl-8 col-lg-6">
                    <div class="row g-sm-4 g-3">
                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i data-feather="package" class="text-content"></i>
                                </div>

                                @if($order->transportation->eng_name == 'snap')
                                    <div class="order-details-name">
                                        <h5 class="text-content">تماس با راننده</h5>
                                        <h2 class="theme-color">
                                            <a href="tel:+989999999">09223232323</a>
                                        </h2>
                                    </div>
                                @elseif($order->transportation->eng_name == 'post')
                                    <div class="order-details-name">
                                        <h5 class="text-content">شماره پیگیری</h5>
                                        <h2 class="theme-color">{{$order->tracking_serial}}</h2>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i data-feather="truck" class="text-content"></i>
                                </div>

                                <div class="order-details-name flex-space-between">
                                    <h5 class="text-content">{{$order->transportation->name}}</h5>
                                    <img src="{{str_replace('public','/storage',optional($order->transportation->gallery)->path)}}"
                                         class="img-fluid blur-up lazyload w-50 rounded" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i class="text-content" data-feather="info"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">شماره سفارش</h5>
                                    <h4>{{$order->id}}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i class="text-content" data-feather="crosshair"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">فروشنده</h5>
                                    <h4>فروشگاه اینترنتی سینویا</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i class="text-content" data-feather="map-pin"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">مقصد</h5>
                                    <h4>{{$order->address->detail}}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-sm-6">
                            <div class="order-details-contain">
                                <div class="order-tracking-icon">
                                    <i class="text-content" data-feather="calendar"></i>
                                </div>

                                <div class="order-details-name">
                                    <h5 class="text-content">Estimated Time</h5>
                                    <h4>7 Frb, 05:05pm</h4>
                                </div>
                            </div>
                        </div>
                        @php
                            $status = tracking_order_status($order->status)
                        @endphp
                        <div class="col-12 overflow-hidden">
                            <ol class="progtrckr">
                                    <li class=" @if($order->status == 'unpaid' || $order->status == 'canceled') progtrckr-todo @else progtrckr-done @endif">
                                        <h5>پرداخت</h5>
                                        <h6>01:21 PM</h6>
                                    </li>
                                <li class="@if($order->status == 'paid' || $order->status == 'unpaid' || $order->status == 'canceled') progtrckr-todo @else progtrckr-done @endif">
                                    <h5>آماده سازی</h5>
                                    <h6>Processing</h6>
                                </li>
                                <li class="@if($order->status == 'posted' || $order->status == 'received') progtrckr-done @else progtrckr-todo @endif">
                                    <h5>ارسال</h5>
                                    <h6>Pending</h6>
                                </li>
                                <li class="@if($order->status == 'received')progtrckr-done @else progtrckr-todo @endif">
                                    <h5>دریافت</h5>
                                    <h6>Pending</h6>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Detail Section End -->

    <!-- Order Table Section Start -->
    <section class="order-table-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table order-tab-table">
                            <thead>
                            <tr>
                                <th>توضیحات</th>
                                <th>وضعیت قبلی</th>
                                <th>وضعیت جدید</th>
                                <th>زمان</th>
                            </tr>
                            </thead>
                            <tbody class="mh-200">
                                @foreach($order->status_history as $history)
                                    <tr>
                                        <td>وضعیت سفارش شما ارتقا یافت</td>
                                        <td>{{order_status($history->before_status)[0]}}</td>
                                        <td>{{order_status($history->after_status)[0]}}</td>
                                        <td>{{faNumber(jdate($history->created_at))}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Order Table Section End -->
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


    <script src="/Client/assets/js/sticky-cart-bottom.js"></script>

    {{--    Add to Cart js --}}
    <script src="/Client/assets/js/Cart.js"></script>
    <script src="/Client/assets/js/profile.js"></script>

@endsection
