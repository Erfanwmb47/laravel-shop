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
                                            <button class="btn bg-dark text-white btn-sm fw-bold btn-animation proceed-btn " data-bs-toggle="modal" data-bs-target="#newAddressModal" id="newAddressButton">آدرس جدید</button>

                                        </div>

                                        <div class="checkout-detail">
                                            <div class="row g-4" id="addressList">
                                                @foreach($addresses as $address)
                                                <div class="col-xxl-6 col-lg-12 col-md-6 checkoutAddressSelect" >
                                                    <div class="delivery-address-box">
                                                        <div>
                                                            <div class="form-check">
                                                                <input class="form-check-input" @if($address->default)checked @endif type="radio" name="address"
                                                                       id="address{{$address->id}}" value="{{$address->id}}" onchange="computePriceTransportation(event,'{{$address->province->id}}','{{$address->county->id}}')">
                                                            </div>

                                                            <div class="label">
                                                                <label>خانه</label>
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
                                                                <form
                                                                    class="form-floating theme-form-floating date-box">
                                                                    <input type="date" class="form-control">
                                                                    <label>Select Date</label>
                                                                </form>
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
                                            <h4>Payment Option</h4>
                                        </div>

                                        <div class="checkout-detail">
                                            <div class="accordion accordion-flush custom-accordion"
                                                 id="accordionFlushExample">
                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingFour">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseFour">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="cash"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="cash" checked> Cash
                                                                    On Delivery</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseFour"
                                                         class="accordion-collapse collapse show"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <p class="cod-review">Pay digitally with SMS Pay
                                                                Link. Cash may not be accepted in COVID restricted
                                                                areas. <a href="javascript:void(0)">Know more.</a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingOne">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseOne">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="credit"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="credit">
                                                                    Credit or Debit Card</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <div class="row g-2">
                                                                <div class="col-12">
                                                                    <div class="payment-method">
                                                                        <div
                                                                            class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                            <input type="text" class="form-control"
                                                                                   id="credit2"
                                                                                   placeholder="Enter Credit & Debit Card Number">
                                                                            <label for="credit2">Enter Credit & Debit
                                                                                Card Number</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xxl-4">
                                                                    <div
                                                                        class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                        <input type="text" class="form-control"
                                                                               id="expiry" placeholder="Enter Expiry Date">
                                                                        <label for="expiry">Expiry Date</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xxl-4">
                                                                    <div
                                                                        class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                        <input type="text" class="form-control" id="cvv"
                                                                               placeholder="Enter CVV Number">
                                                                        <label for="cvv">CVV Number</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-xxl-4">
                                                                    <div
                                                                        class="form-floating mb-lg-3 mb-2 theme-form-floating">
                                                                        <input type="password" class="form-control"
                                                                               id="password" placeholder="Enter Password">
                                                                        <label for="password">Password</label>
                                                                    </div>
                                                                </div>

                                                                <div class="button-group mt-0">
                                                                    <ul>
                                                                        <li>
                                                                            <button
                                                                                class="btn btn-light shopping-button">Cancel</button>
                                                                        </li>

                                                                        <li>
                                                                            <button class="btn btn-animation">Use This
                                                                                Card</button>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingTwo">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseTwo">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="banking"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="banking">Net
                                                                    Banking</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseTwo" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h5 class="text-uppercase mb-4">Select Your Bank
                                                            </h5>
                                                            <div class="row g-2">
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="bank1">
                                                                        <label class="form-check-label"
                                                                               for="bank1">Industrial & Commercial
                                                                            Bank</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="bank2">
                                                                        <label class="form-check-label"
                                                                               for="bank2">Agricultural Bank</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="bank3">
                                                                        <label class="form-check-label" for="bank3">Bank
                                                                            of America</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="bank4">
                                                                        <label class="form-check-label"
                                                                               for="bank4">Construction Bank Corp.</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="bank5">
                                                                        <label class="form-check-label" for="bank5">HSBC
                                                                            Holdings</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="bank6">
                                                                        <label class="form-check-label"
                                                                               for="bank6">JPMorgan Chase & Co.</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-12">
                                                                    <div class="select-option">
                                                                        <div class="form-floating theme-form-floating">
                                                                            <select
                                                                                class="form-select theme-form-select"
                                                                                aria-label="Default select example">
                                                                                <option value="hsbc">HSBC Holdings
                                                                                </option>
                                                                                <option value="loyds">Lloyds Banking
                                                                                    Group</option>
                                                                                <option value="natwest">Nat West Group
                                                                                </option>
                                                                                <option value="Barclays">Barclays
                                                                                </option>
                                                                                <option value="other">Others Bank
                                                                                </option>
                                                                            </select>
                                                                            <label>Select Other Bank</label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion-item">
                                                    <div class="accordion-header" id="flush-headingThree">
                                                        <div class="accordion-button collapsed"
                                                             data-bs-toggle="collapse"
                                                             data-bs-target="#flush-collapseThree">
                                                            <div class="custom-form-check form-check mb-0">
                                                                <label class="form-check-label" for="wallet"><input
                                                                        class="form-check-input mt-0" type="radio"
                                                                        name="flexRadioDefault" id="wallet">My
                                                                    Wallet</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div id="flush-collapseThree" class="accordion-collapse collapse"
                                                         data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body">
                                                            <h5 class="text-uppercase mb-4">Select Your Wallet
                                                            </h5>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <label class="form-check-label"
                                                                               for="amazon"><input
                                                                                class="form-check-input mt-0"
                                                                                type="radio" name="flexRadioDefault"
                                                                                id="amazon">Amazon Pay</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="gpay">
                                                                        <label class="form-check-label"
                                                                               for="gpay">Google Pay</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="airtel">
                                                                        <label class="form-check-label"
                                                                               for="airtel">Airtel Money</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="paytm">
                                                                        <label class="form-check-label"
                                                                               for="paytm">Paytm Pay</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="jio">
                                                                        <label class="form-check-label" for="jio">JIO
                                                                            Money</label>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="custom-form-check form-check">
                                                                        <input class="form-check-input mt-0"
                                                                               type="radio" name="flexRadioDefault"
                                                                               id="free">
                                                                        <label class="form-check-label"
                                                                               for="free">Freecharge</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
                                    <h4>{{$product->name}} <span>* {{$cart['quantity']}}</span></h4>
                                    @if($cart['discount'])
                                        <h4 class="price">
                                            <del  class="text-danger" >{{number_format($product->price * $cart['quantity'])}} </del>
                                            <span> {{number_format($product->price * $cart['quantity'] - $cart['discount'])}} تومان</span>
                                        </h4>
                                    @else
                                        <h4 class="price">
                                            <span id="cartChange{{$cart['id']}}">{{number_format($product->price * $cart['quantity'])}} تومان</span>
                                        </h4>
                                    @endif
                                </li>
                                @endforeach
                            </ul>

                            <ul class="summery-total">
                                <li>
                                    <h4>Subtotal</h4>
                                    <h4 class="price">$111.81</h4>
                                </li>

                                <li>
                                    <h4>Shipping</h4>
                                    <h4 class="price">$8.90</h4>
                                </li>

                                <li>
                                    <h4>Tax</h4>
                                    <h4 class="price">$29.498</h4>
                                </li>

                                <li>
                                    <h4>Coupon/Code</h4>
                                    <h4 class="price">$-23.10</h4>
                                </li>

                                <li class="list-total">
                                    <h4>Total (USD)</h4>
                                    <h4 class="price">$19.28</h4>
                                </li>
                            </ul>
                        </div>

                        <div class="checkout-offer">
                            <div class="offer-title">
                                <div class="offer-icon">
                                    <img src="../assets/images/inner-page/offer.svg" class="img-fluid" alt="">
                                </div>
                                <div class="offer-name">
                                    <h6>Available Offers</h6>
                                </div>
                            </div>

                            <ul class="offer-detail">
                                <li>
                                    <p>Combo: BB Royal Almond/Badam Californian, Extra Bold 100 gm...</p>
                                </li>
                                <li>
                                    <p>combo: Royal Cashew Californian, Extra Bold 100 gm + BB Royal Honey 500 gm</p>
                                </li>
                            </ul>
                        </div>

                        <button class="btn theme-bg-color text-white btn-md w-100 mt-4 fw-bold">Place Order</button>
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
                                <form>
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="detail" name="detail"
                                               placeholder="آدرس را وارد کنید ">
                                        <label for="detail" class="right-0">آدرس کامل</label>
                                    </div>
                                </form>
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
