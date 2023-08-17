@extends('Client.Layouts.master')

@section('css')
    <link rel="stylesheet" href="/Client/assets/css/Addresses.css" />
@endsection
@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Checkout</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="index.html">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout section Start -->
    <section class="checkout-section-2 section-b-space">
        <form action="{{route('cart.payment')}}" method="post" >
            @csrf
        <div class="container-fluid-lg">

            <div class="row g-sm-4 g-3">

                    <div class="col-lg-8">
                        <div class="left-sidebar-checkout">
                            <div class="checkout-detail-box">
                                <ul>
                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ajkxzzfb.json"
                                                       trigger="loop-on-hover"
                                                       colors="primary:#121331,secondary:#c7166f,tertiary:#ee66aa"
                                                       class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>مشخصات گیرنده</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="row g-4">
                                                    <div class="col-xxl-6 col-lg-12 col-md-6">
                                                        <div class="delivery-address-box">
                                                            <div>
                                                                <div class="form-check w-100 p-lg-0">
                                                                    <div
                                                                        class="form-floating theme-form-floating w-100">
                                                                        <input type="text" class="form-control" name="recipient_name"
                                                                               id="credit2" value="{{auth()->user()->firstName}} {{auth()->user()->lastName}}"
                                                                               placeholder="نام و نام خانوادگی">
                                                                        <label for="credit2" class="right-0">نام و نام خانوادگی </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xxl-6 col-lg-12 col-md-6">
                                                        <div class="delivery-address-box">
                                                            <div class="mx-auto">
                                                                <div class="form-check w-100 items-center p-lg-0">
                                                                    <div
                                                                        class="form-floating items-center theme-form-floating w-100">
                                                                        <input type="text" class="form-control" name="recipient_phone"
                                                                               id="credit2" value="{{auth()->user()->phone}}"
                                                                               placeholder="شماره همراه">
                                                                        <label for="credit2" class="right-0">شماره همراه </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/ggihhudh.json"
                                                       trigger="loop-on-hover"
                                                       colors="primary:#121331,secondary:#c7166f,tertiary:#ee66aa"
                                                       class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>آدرس گیرنده</h4>
                                                <span class="btn bg-dark text-white btn-sm fw-bold btn-animation proceed-btn " data-bs-toggle="modal" data-bs-target="#newAddressModal" id="newAddressButton">آدرس جدید</span>

                                            </div>

                                            <div class="checkout-detail">
                                                <div class="row g-4" id="addressList">
                                                    @foreach($addresses as $address)
                                                    <div class="col-xxl-6 col-lg-12 col-md-6 checkoutAddressSelect" >
                                                        <div class="delivery-address-box">
                                                            <div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="radio" name="address"
                                                                           id="address{{$address->id}}" value="{{$address->id}}" onchange="computePriceTransportation(event,'{{$address->province->id}}','{{$address->county->id}}')">
                                                                </div>
                                                                <div class="label">
                                                                    @if(auth()->user()->addresses->firstWhere('default','1') !== null)
                                                                        <label>
                                                                            پیشفرض
                                                                        </label>
                                                                    @endif

                                                                </div>

                                                                <ul class="delivery-address-detail">
                                                                    <li>
                                                                        <h4 class="fw-500">{{$address->province->name}}-{{$address->county->name}}</h4>
                                                                    </li>

                                                                    <li>
                                                                        <p class="text-content"><span
                                                                                class="text-title">آدرس
                                                                                 :  </span>{{$address->detail}}</p>
                                                                    </li>

                                                                    <li>
                                                                        <h6 class="text-content"><span
                                                                                class="text-title">کد پستی
                                                                                :</span> {{$address->postalCode}}</h6>
                                                                    </li>

                                                                    <li>
                                                                        <h6 class="text-content mb-0"><span
                                                                                class="text-title">شماره ثابت
                                                                                :</span> {{$address->tel}}</h6>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/oaflahpk.json"
                                                       trigger="loop-on-hover" colors="primary:#121331,secondary:#c7166f,tertiary:#ee66aa" class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>حمل و نقل</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="row g-4" id="transportationsBox">
                                                    <div class="col-xxl-12">
                                                        <div class="delivery-option">
                                                            <div class="delivery-category">
                                                                <div class="shipment-detail">
                                                                    <div
                                                                        class="form-check custom-form-check hide-check-box">
                                                                        <label class="form-check-label"
                                                                               for="standard">ابتدا آدرس را انتخاب کنید</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12 future-box">
                                                        <div class="future-option">
                                                            <div class="row g-md-0 gy-4">
                                                                <div class="col-md-6">
                                                                    <div class="delivery-items">
                                                                        <div>
                                                                            <h5 class="items text-content"><span>3
                                                                                    Items</span>@
                                                                                $693.48</h5>
                                                                            <h5 class="charge text-content">Delivery Charge
                                                                                $34.67
                                                                                <button type="button" class="btn p-0"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-placement="top"
                                                                                        title="Extra Charge">
                                                                                    <i
                                                                                        class="fa-solid fa-circle-exclamation"></i>
                                                                                </button>
                                                                            </h5>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                        class="form-floating theme-form-floating date-box">
                                                                        <input type="date" class="form-control">
                                                                        <label>Select Date</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkout-icon">
                                            <lord-icon target=".nav-item" src="https://cdn.lordicon.com/qmcsqnle.json"
                                                       trigger="loop-on-hover" colors="primary:#121331,secondary:#c7166f,tertiary:#ee66aa"
                                                       class="lord-icon">
                                            </lord-icon>
                                        </div>
                                        <div class="checkout-box">
                                            <div class="checkout-title">
                                                <h4>انتخاب درگاه پرداخت</h4>
                                            </div>

                                            <div class="checkout-detail">
                                                <div class="accordion accordion-flush custom-accordion"
                                                     id="accordionFlushExample">
                                                    @foreach($paymentGateways as $paymentGateway)
                                                        <div class="accordion-item pe-3">
                                                            <div class="accordion-header" id="flush-headingFour">
                                                                <div class="accordion-button collapsed"
                                                                     data-bs-toggle="collapse"
                                                                     data-bs-target="#paymentDetail{{$paymentGateway->id}}">
                                                                    <div class="custom-form-check form-check mb-0">
                                                                        <label class="form-check-label" for="{{$paymentGateway->id}}">
                                                                            <input class="form-check-input mt-0" type="radio"
                                                                                   name="paymentGateway" id="{{$paymentGateway->id}}" value="{{$paymentGateway->id}}" checked>
                                                                            {{$paymentGateway->name}}
                                                                            <img class="me-3 w-2" src="{{str_replace('public','/storage',optional($paymentGateway->gallery)->path)}}">

                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div id="paymentDetail{{$paymentGateway->id}}"
                                                                 class="accordion-collapse collapse"
                                                                 data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    <p class="cod-review">{{$paymentGateway->description}}
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach

                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="right-side-summery-box">
                            <div class="summery-box-2">
                                <div class="summery-header">
                                    <h3>اقلام سفارش</h3>
                                </div>

                                <ul class="summery-contain">
                                    @foreach(\Modules\Cart\Helpers\Cart\Cart::all() as $cart)
                                        @if(isset($cart['product']))

                                            @php
                                                $product = $cart['product'];
                                            @endphp

                                        @endif
                                    <li>
                                        <img src="{{str_replace('public','/storage',optional($product->gallery)->path)}}"
                                             class="img-fluid blur-up lazyloaded checkout-image" alt="{{$product->gallery->alt}}">
                                        <h4>{{$product->name}} <span>* {{faNumber($cart['quantity'])}}</span></h4>
                                        @if($cart['discount'])
                                            <h4 class="price me-5">
                                                <del  class="text-danger" >{{faNumber(number_format($product->price * $cart['quantity']))}} </del>
                                                <span> {{faNumber(number_format($product->price * $cart['quantity'] - $cart['discount']))}} تومان</span>
                                            </h4>
                                        @else
                                            <h4 class="price">
                                                <span id="cartChange{{$cart['id']}}">{{faNumber(number_format($product->price * $cart['quantity']))}} تومان</span>
                                            </h4>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>

                                <ul class="summery-total">
                                    <li>
                                        <h4>مجموع خرید </h4>
                                        <h4 class="price">  {{faNumber(number_format(Modules\Cart\Helpers\Cart\Cart::totalprice()))}} تومان</h4>
                                    </li>

                                    <li>
                                        <h4>تخفیف</h4>
                                        <h4 class="price text-danger">  {{faNumber(number_format(\Modules\Cart\Helpers\Cart\Cart::sumDiscount()))}} - تومان</h4>
                                    </li>

                                    <li>

                                    </li>

                                    <li class="list-total">
                                        <h4>قیمت کل</h4>
                                        <h4 class="price" id="totalPrice" data-price="{{Modules\Cart\Helpers\Cart\Cart::totalprice() - \Modules\Cart\Helpers\Cart\Cart::sumDiscount()}}">{{faNumber(number_format(Modules\Cart\Helpers\Cart\Cart::totalprice() - \Modules\Cart\Helpers\Cart\Cart::sumDiscount())) }}</h4>
                                        <span> تومان</span>
                                    </li>
                                </ul>

                            </div>

                            <div class="checkout-offer">
                                <ul class="summery-total flex-space-between">
                                    <h4>هزینه ارسال</h4>
                                    <h4 id="finalTransportationCost">انتخاب روش ارسال </h4>
                                </ul>
                                <ul class="summery-total flex-space-between mt-3">
                                    <h6>قابل پرداخت </h6>
                                    <h3 class="text-primary" id="finalCost">

                                    </h3>
                                </ul>
                            </div>
                            <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">ثبت سفارش</button>
                        </div>
                    </div>

            </div>
        </div>
        <!-- آدرس جدید Start -->
        <div class="modal fade theme-modal" id="newAddressModal" tabindex="-1" aria-labelledby="exampleModalLabel2"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">آدرس جدید</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-4">
                            <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress">
                                <span onclick="showProvince()" class="form-control" id="dropbtnProvince">انتخاب استان</span>
                                <label for="dropbtnProvince"> استان </label>
                                <div id="myDropdownProvince" class="dropdown-content-address  fom-control ">
                                    <input type="text" placeholder="Search.." id="myInputProvince"  value="" name="" class="w-100" onkeyup="filterFunctionProvince()">
                                    <input type="text" hidden="hidden" id="myInputProvinceRequest"  value="" name="province_id">
                                    @foreach($provinces as $province)
                                        <span onclick="selectProvince('{{$province->id}}','{{$province->name}}')" id="{{$province->id}}">{{$province->name}}</span>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress" id="dropdownCountyAddress">
                                <span onclick="showCounty()" class="form-control" id="dropbtnCounty">انتخاب شهر</span>
                                <label for="dropbtnCounty"> شهر </label>
                                <div id="myDropdownCounty" class="dropdown-content-address fom-control">
                                    <input type="text" placeholder="Search.." id="myInputCounty"  value="" class="w-100" name="" onkeyup="filterFunctionCounty()">
                                    <input type="text" hidden="hidden" id="myInputCountyRequest"  value="" name="county_id">
                                    <div id="countiesList">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-6">
                                    <div class="form-floating theme-form-floating">
                                        <input class="form-control" type="tel" placeholder="کد پستی را وارد کنید" name="postalCode" id="postalCode"
                                               maxlength="10">
                                        <label class="right-0" for="postalCode">کد پستی</label>
                                    </div>
                            </div>
                            <div class="col-xxl-6">

                                    <div class="form-floating theme-form-floating">
                                        <input class="form-control" type="tel" placeholder="تلفن ثابت را وارد کنید" name="tel" id="tel"
                                               maxlength="10">
                                        <label class="right-0" for="tel">تلفن</label>
                                    </div>

                            </div>

                            <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="detail" name="detail"
                                               placeholder="آدرس را وارد کنید ">
                                        <label for="detail" class="right-0">آدرس کامل</label>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-animation btn-md fw-bold"
                                data-bs-dismiss="modal">بستن</button>
                        <button type="button" data-bs-dismiss="modal" onclick="checkoutNewAddress()" id="submitAddress" disabled
                                class="btn theme-bg-color btn-md fw-bold text-light">ثبت آدرس</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- آدرس جدید End -->
        </form>
    </section>
    <!-- Checkout section End -->

@endsection

@section('js')
    <!-- jquery ui-->
    <script src="/Client/assets/js/jquery-ui.min.js"></script>

    <!-- Lordicon Js -->
    <script src="/Client/assets/js/lusqsztk.js"></script>

    <!-- Delivery Option js -->
    <script src="/Client/assets/js/delivery-option.js"></script>

    <!-- Quantity js -->
    <script src="/Client/assets/js/quantity.js"></script>

    {{--    checkout js --}}
    <script src="/Client/assets/js/checkout.js"></script>
@endsection
