@extends('Client.Profile.layout')


@section('left-content')

        <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
            Menu</button>
        <div class="dashboard-right-sidebar">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-dashboard" role="tabpanel"
                     aria-labelledby="pills-dashboard-tab">
                    <div class="dashboard-home">
                        <div class="title">
                            <h2>داشبورد</h2>
                            <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                        </div>

                        <div class="dashboard-user-name">
                            <h6 class="text-content">سلام <b class="text-title">{{$user->firstName}}</b></h6>
                            <p class="text-content"></p>
                        </div>

                        <div class="total-box">
                            <div class="row g-sm-4 g-3">
                                <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                    <div class="totle-contain">
                                        <img src="/Client/assets/images/svg/order.svg"
                                             class="img-1 blur-up lazyload" alt="">
                                        <img src="/Client/assets/images/svg/order.svg" class="blur-up lazyload"
                                             alt="">
                                        <div class="totle-detail">
                                            <h5>تعداد سفارشات</h5>
                                            <h3>{{($user->order()->count())}}</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                    <div class="totle-contain">
                                        <img src="/Client/assets/images/svg/pending.svg"
                                             class="img-1 blur-up lazyload" alt="">
                                        <img src="/Client/assets/images/svg/pending.svg" class="blur-up lazyload"
                                             alt="">
                                        <div class="totle-detail">
                                            <h5>تعداد لیست علاقه مندی</h5>
                                            <h3>{{$user->wishlists->count()}}</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-4 col-lg-6 col-md-4 col-sm-6">
                                    <div class="totle-contain">
                                        <img src="/Client/assets/images/svg/wishlist.svg"
                                             class="img-1 blur-up lazyload" alt="">
                                        <img src="/Client/assets/images/svg/wishlist.svg"
                                             class="blur-up lazyload" alt="">
                                        <div class="totle-detail">
                                            <h5>نظرات شما</h5>
                                            <h3>{{$user->comments->count()}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dashboard-title">
                            <h3>مشخصات حساب شما</h3>
                        </div>

                        <div class="row g-4">
                            <div class="col-xxl-6">
                                <div class="dashboard-contant-title">
                                    <h4>اطلاعات تماس <a href="javascript:void(0)"
                                                               data-bs-toggle="modal" data-bs-target="#editProfile">ویرایش</a>
                                    </h4>
                                </div>
                                <div class="dashboard-detail">
                                    <h6 class="text-content">{{$user->firstName}} {{$user->lastName}}</h6>
                                    <h6 class="text-content">{{($user->email)}}</h6>
                                    <a href="javascript:void(0)">ویرایش رمز عبور</a>
                                </div>
                            </div>
                            <div class="col-xxl-6">
                                <div class="dashboard-contant-title">
                                    <h4>آدرس فعلی شما
                                        @if($user->addresses->firstWhere('default','1') !== null)
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                               data-bs-target="#editProfile">ویرایش</a>
                                        @else
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                               data-bs-target="#editProfile">ثبت آدرس</a>
                                        @endif


                                    </h4>
                                </div>
                                <div class="dashboard-detail">
                                    <h6 class="text-content">
                                        @if($user->addresses->firstWhere('default','1') !== null)
                                            {{$user->addresses->firstWhere('default','1')->province->name}} ,
                                            {{$user->addresses->firstWhere('default','1')->county->name}} ,
                                            {{$user->addresses->firstWhere('default','1')->detail}}
                                        @else
                                            در حال حاضر آدرسی ندارید
                                        @endif

                                    </h6>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="dashboard-contant-title">
                                    <h4>آخرین نظر شما  </h4>
                                </div>

                                <div class="row g-4">
                                    <div class="dashboard-order">
                                        <div class="order-contain">
                                            @php
                                                $firstComment = $user->shop_comments->first();
                                            @endphp
                                            <div class="order-box dashboard-bg-box w-100">
                                                <div class="order-container ">
                                                    <div class="order-icon">
                                                        <i data-feather="shopping-bag"></i>
                                                    </div>

                                                    <div class="order-detail">
                                                        <h4> <span class="">{{faNumber(5)}}/ @if($firstComment->product->countRate != 0){{faNumber($firstComment->product->sumRate/$firstComment->product->countRate)}} @else 0 @endif </span></h4>
                                                        <h6 class="text-content">{{$firstComment->product->name}}</h6>
                                                    </div>
                                                    <div class="me-auto ms-0">
                                                    </div>
                                                </div>
                                                <div class="product-order-detail">

                                                    <a href="product-left-thumbnail.html" class="order-image">
                                                        <img src="{{str_replace('public','/storage',optional($firstComment->product->gallery)->path)}}"
                                                             class="blur-up lazyload w-10" alt="">
                                                    </a>
                                                    <div class="order-wrap">
                                                        <a href="product-left-thumbnail.html">
                                                            <h3>{{$firstComment->title}}</h3>
                                                        </a>
                                                        <p class="text-content">{{$firstComment->text}}</p>
                                                        <ul class="product-size">
{{--                                                            <li>--}}
{{--                                                                <div class="size-box">--}}
{{--                                                                    <h6 class="text-content">امتیاز :  </h6>--}}
{{--                                                                    <div class="product-rating ms-2">--}}
{{--                                                                        <ul class="rating">--}}
{{--                                                                            <li class="text-warning me-2"> </li>--}}
{{--                                                                        </ul>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
{{--                                                            </li>--}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
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
