@extends('Client.Profile.layout')


@section('left-content')
    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">منوی کاربری</button>
    <div class="dashboard-right-sidebar">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-order" role="tabpanel"
                 aria-labelledby="pills-order-tab">
                <div class="dashboard-order">
                    <div class="title">
                        <h2>لیست سفارشات</h2>
                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                    </div>
                    <div class="order-contain">
                        @foreach($orders as $order)
                            <div class="order-box dashboard-bg-box">
                                <div class="order-container ">
                                        <div class="order-icon">
                                            <i data-feather="box"></i>
                                        </div>
                                        @php
                                            $status = profile_order_status($order->status);
                                            $counter = $order->products->count();
                                        @endphp
                                        <div class="order-detail">
                                            <h4> <span class="{{$status[1]}}">{{$status[0]}}</span></h4>
                                            <h6 class="text-content">{{$status[2]}}</h6>
                                        </div>
                                    <div class="me-auto ms-0">
                                        <div class=" bg-dark rounded p-1 text-white">
                                            <span onclick="showOrderDetail(event,{{$order->id}})" class="pointer" data-bs-toggle="modal" data-bs-target="#orderDetail">جزئیات سفارش</span>
                                        </div>
                                        <div class=" bg-info rounded p-1 text-white mt-1">
                                            <a href="{{route('profile.orders.tracking',$order)}}" class="pointer">پیگیری سفارش</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-order-detail">
                                    <a href="product-left-thumbnail.html" class="order-image ">
                                        <img src="{{str_replace('public','/storage',optional($order->products()->first()->gallery)->path)}}"
                                             class="blur-up lazyload w-10" alt="">
                                    </a>

                                    <div class="order-wrap">
                                        <a href="javascript:;">
                                            <ul class="flex-space-between w-75">
                                                <li>نام گیرنده</li>
                                                <li>{{$order->recipient_name}}</li>
                                            </ul>
                                            <ul class="flex-space-between w-75">
                                                <li>شماره تماس گیرنده</li>
                                                <li>{{$order->recipient_phone}}</li>
                                            </ul>
                                        </a>
                                        <p class="text-content">

                                        </p>
                                        <ul class="product-size">
                                            <li>
                                                <div class="size-box">
                                                    <ul class="w-75 flex-space-between">
                                                        <h6 class="text-content">قیمت محصولات : </h6>
                                                        <h5>{{faNumber(number_format($order->cart_cost))}}  تومان</h5>
                                                    </ul>

                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <ul class="w-75 flex-space-between">
                                                        <h6 class="text-content">شیوه ارسال : </h6>
                                                        <h5>{{$order->transportation->name}}</h5>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <ul class="w-75 flex-space-between">
                                                        <h6 class="text-content">هزینه ارسال : </h6>
                                                        <h5>{{faNumber(number_format($order->transportation_cost))}}  تومان</h5>
                                                    </ul>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <ul class="w-75 flex-space-between">
                                                        <h6 class="text-content">مبلغ پرداختی : </h6>
                                                        <h5 class="text-primary">{{faNumber(number_format($order->final_cost))}}  تومان</h5>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- جزئیات سفارش Start -->
    <div class="modal fade theme-modal" id="orderDetail" tabindex="-1" aria-labelledby="exampleModalLabel2"
         aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">سفارش</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <div class="modal-body" id="orderDetailTable">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                            data-bs-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
    <!-- جزئیات سفارش End -->
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
