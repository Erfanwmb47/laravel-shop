@extends('Client.Layouts.master')


@section('content')
    <!-- Breadcrumb Section Start -->
    <section class="breadscrumb-section pt-0">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-12">
                    <div class="breadscrumb-contain">
                        <h2>Cart</h2>
                        <nav>
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item">
                                    <a href="{{route('home')}}">
                                        <i class="fa-solid fa-house"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">سبد خرید</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Cart Section Start -->
    <section class="cart-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row g-sm-5 g-3">
                <div class="col-xxl-9">
                    <div class="cart-table">
                        <div class="table-responsive-xl">
                            @if(\Modules\Cart\Helpers\Cart\Cart::all()->count() > 0)
                            <table class="table">
                                <tbody>
                                @foreach(\Modules\Cart\Helpers\Cart\Cart::all() as $cart)
                                  @if(isset($cart['product']))
                                    @php
                                        $product=$cart['product']
                                    @endphp
                                     <tr  class="product-box-contain">
                                        <td class="product-detail">
                                            <div class="product border-0">
                                                <a href="{{route('products.single',$product)}}" class="product-image">
                                                    <img src="{{str_replace('public','/storage',optional($product->gallery)->path)}}"
                                                         class="img-fluid blur-up lazyload" alt="{{$product->name}}">
                                                </a>
                                                <div class="product-detail">
                                                    <ul>
                                                        <li class="name">
                                                            <a href="{{route('products.single',$product)}}">{{$product->name}}</a>
                                                        </li>
                                                        @if($product->attributes)
                                                            <li class="text-content">
                                                                <small>
                                                                    @foreach($product->attributes as $attribute)
                                                                        <span class="text-muted">{{$attribute->name}} : {{$attribute->pivot->value->value}}</span>
                                                                    @endforeach
                                                                </small>
                                                            </li>
                                                        @endif

                                                        <li class="text-content"></li>

                                                        <li>
                                                            @php
                                                                $product = $cart['product'];
                                                                $priceWithOffer = ( $product->price * (100 - $product->offer))/100;
                                                            @endphp
                                                            <h5 class="text-content d-inline-block">قیمت :</h5>
                                                            <span>{{$priceWithOffer}}</span>
                                                            <span class="text-content">{{$product->price}}</span>
                                                        </li>

                                                        <li>
                                                            <h5 class="saving theme-color">سود شما : {{$product->price - $priceWithOffer}} تومان</h5>
                                                        </li>

                                                        <li class="quantity-price-box">
                                                            <div class="cart_qty">
                                                                <div class="input-group">
                                                                    <button type="button" class="btn qty-left-minus"
                                                                            data-type="minus" data-field="">
                                                                        <i class="fa fa-minus ms-0"
                                                                           aria-hidden="true"></i>
                                                                    </button>
                                                                    <input class="form-control input-number qty-input"
                                                                           type="number" name="quantity" onchange="changeQuantity(event,'{{$cart['id']}}')" value="{{$cart['quantity']}}" data-maxOrder="{{$product->maxOrder}}">
                                                                    <button type="button" class="btn qty-right-plus"
                                                                            data-type="plus" data-field="">
                                                                        <i class="fa fa-plus ms-0"
                                                                           aria-hidden="true"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </li>

                                                        <li>
                                                            <h5>مجموع: {{number_format($priceWithOffer * $cart['quantity'])}} تومان </h5>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price">
                                            <h4 class="table-title text-content">قیمت</h4>
                                            @if($product->offer )
                                                <h5>{{$priceWithOffer}}تومان  <del class="text-content">{{$product->price}}</del></h5>
                                                <h6 class="theme-color">سود شما : {{number_format($product->price - $priceWithOffer)}}</h6>
                                            @else
                                                <h5>{{number_format($priceWithOffer)}} تومان  </h5>
                                            @endif
                                        </td>

                                        <td class="quantity">
                                            <h4 class="table-title text-content">تعداد</h4>
                                            <div class="quantity-price quantity-price{{$cart['id']}}">
                                                <div class="cart_qty">
                                                    <div class="input-group">
                                                        <button type="button" class="btn qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus ms-0" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input" type="number"
                                                               name="quantity"  onchange="changeQuantity(event,'{{$cart['id']}}')" value="{{$cart['quantity']}}" data-maxOrder="{{$product->maxOrder}}" >
                                                        <button type="button" class="btn qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus ms-0" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="loader{{$cart['id']}}" class="mx-auto" style="display: none;">
                                                <img src="/Client/assets/images/loader/220.gif" >
                                            </div>
                                        </td >

                                        <td class="subtotal subtotal{{$cart['id']}}">
                                            <div id="subtotaldetail{{$cart['id']}}">
                                                <h4 class="table-title text-content">مجموع </h4>
                                                @if($cart['discount'])
                                                <h5>
                                                    <del  class="text-danger" >{{number_format($product->price * $cart['quantity'])}} تومان</del>
                                                    <span id="productTotalPrice{{$cart['id']}}"> {{number_format($product->price * $cart['quantity'] - $cart['discount'])}} تومان</span>
                                                </h5>
                                                @else
                                                <h5>
                                                    <span id="productTotalPrice{{$cart['id']}}">{{number_format($product->price * $cart['quantity'])}} تومان</span>
                                                </h5>
                                                @endif
                                            </div>
                                        </td>

                                        <td class="save-remove">
                                            <h4 class="table-title text-content">عمل</h4>
{{--                                            <a class="save notifi-wishlist" href="javascript:void(0)">علاقه مندی</a>--}}
                                            <a class="remove close_button" href="javascript:void(0)" onclick="deleteItemFromCart(event,'{{$cart['id']}}')">حذف</a>
                                        </td>
                                     </tr>
                                  @endif
                                @endforeach
                                </tbody>
                            </table>
                            @else
                                <div class="cart-list items-center ">
                                    <p class="text-center"><i class="emptyCart w-full"></i><br>سبد خرید شما خالی است</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                @if(\Modules\Cart\Helpers\Cart\Cart::all()->count() > 0)
                <div class="col-xxl-3">
                    @php
                        $totalPrice= \Modules\Cart\Helpers\Cart\Cart::all()->sum(function ($cart){
                            return $cart['product']->price * $cart['quantity'];
                        })
                    @endphp
                    <div class="summery-box p-sticky">
                        <div class="summery-header">
                            <h3>مجموع خرید شما</h3>
                        </div>
                        <div id="summery-contain">
                            <div class="summery-contain">
                                @if(! $cart['discount'])
                                <div class="coupon-cart">
                                    <h6 class="text-content mb-2">کد تخفیف</h6>
                                    <form action="{{route('client.discount.check')}}" method="post">
                                        @csrf
                                    <div class="mb-3 coupon-box input-group">
                                            <input type="text" name="discount" class="form-control" id="exampleFormControlInput1"
                                                   placeholder="کد را اینجا بنویس">
                                            <button class="btn-apply">اعمال</button>
                                    </div>
                                    </form>
                                </div>
                                @endif
                                <ul>
                                    <li>
                                        <h4>جمع سبدخرید</h4>
                                        <h4 class="price">{{number_format(\Modules\Cart\Helpers\Cart\Cart::totalPrice())}} تومان </h4>
                                    </li>
                                    @if(\Modules\Cart\Helpers\Cart\Cart::totalPriceDiscount())
                                    <li>
                                        <h4>تخفیف</h4>
                                        <h4 class="price text-danger"> {{number_format(\Modules\Cart\Helpers\Cart\Cart::sumDiscount())}}- تومان </h4>
                                    </li>
                                    @endif
                                    @php
                                        $discount = \Modules\Cart\Helpers\Cart\Cart::getDiscount();
                                    @endphp
                                    @if($discount)
                                        <form action="{{route('client.discount.delete',$discount)}}" method="post" >
                                            @csrf
                                            @method('DELETE')
                                    <li class="align-items-start">
                                        <h4>کد تخفیف استفاده شده :</h4>
                                            <h4 class="price text-end">
                                                <button class="border-0"><i class="fa fa-times-circle text-danger ml-3"></i>  {{$discount->name}}</button>
                                            </h4>

                                    </li>
                                        </form>
                                        @if(!!$discount->transportations->count())
                                            <li class="align-items-start">
                                                <h4>مورد استفاده حمل و نقل  :</h4>
                                                <h4 class="price text-end">
                                                    @foreach($discount->transportations as $tp)
                                                    <span>{{$tp->name}}
                                                        @if(!$loop->last)
                                                            ,
                                                        @endif
                                                    </span>
                                                    @endforeach
                                                </h4>
                                            </li>
                                        @else
                                            <li class="align-items-start">
                                                <h4>مورد استفاده  :</h4>
                                                <h4 class="price text-end">محصولات</h4>
                                            </li>
                                        @endif
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div id="summery-total">
                            <ul class="summery-total">
                                <li class="list-total border-top-0">
                                    <h4>قیمت نهایی </h4>
                                    <h4 class="price theme-color">{{number_format(\Modules\Cart\Helpers\Cart\Cart::totalPrice() - \Modules\Cart\Helpers\Cart\Cart::sumDiscount())}} تومان  </h4>
                                </li>
                            </ul>
                        </div>
                        <div class="button-group cart-button">
                            <ul>
                                <li>
                                    <form action="{{route('cart.checkout')}}" method="post" id="cart-payment">
                                        @csrf
                                    <button
                                            class="btn btn-animation proceed-btn fw-bold">تسویه حساب</button>
                                    </form>
                                </li>

                                <li>
                                    <button onclick="location.href = 'index.html';"
                                            class="btn btn-light shopping-button text-dark">
                                        <i class="fa-solid fa-arrow-left-long"></i>ادامه خرید </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Cart Section End -->

@endsection

@section('js')
    <!-- jquery ui-->
    <script src="/Client/assets/js/jquery-ui.min.js"></script>

    <script src="/Client/assets/js/bootstrap/bootstrap-notify.min.js"></script>

    <!-- Quantity js -->
    <script src="/Client/assets/js/quantity.js"></script>

    {{--    Add to Cart js --}}
    <script src="/Client/assets/js/Cart.js"></script>

@endsection
