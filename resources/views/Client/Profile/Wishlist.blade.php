@extends('Client.Profile.layout')


@section('left-content')
    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
        Menu</button>
    <div class="dashboard-right-sidebar">
        <div class="tab-content">
            <div class="tab-pane fade show active"
                 aria-labelledby="pills-wishlist-tab">
                <div class="dashboard-wishlist">
                    <div class="title">
                        <h2>لیست علاقه مندی</h2>
                        <p>این لیست قراره لیست خرید بعدیت باشه :)</p>
                        <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                    </div>
                    <div class="row g-sm-4 g-3" id="WishlistDiv">
                        @foreach($wishlists as $wishlist)
                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6 product-box-contain" >
                                <div class="product-box-3 theme-bg-white h-100">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product-left-thumbnail.html">
                                                <img src="{{str_replace('public','/storage',optional($wishlist->product->gallery)->path)}}"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>
                                            <div class="product-header-top">
                                                <button onclick="deleteWishlistShop(event,'{{$wishlist->product->id}}')" class="btn wishlist-button close_button">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">{{$wishlist->product->brand->name}}</span>
                                            <a href="product-left-thumbnail.html">
                                                <h5 class="name">{{$wishlist->product->name}}</h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">{{$wishlist->product->abstract}}</p>
                                            <h6 class="unit mt-1">250 ml</h6>
                                            <h5 class="price">
                                                <span class="theme-color">{{$wishlist->product->price}}</span>
                                                <del>$15.15</del>
                                            </h5>
                                            <div class="add-to-cart-box mt-2">
                                                <button class="btn btn-add-cart addcart-button"
                                                        tabindex="0">Add
                                                    <span class="add-icon">
                                                                    <i class="fa-solid fa-plus"></i>
                                                                </span>
                                                </button>
                                                <div class="cart_qty qty-box">
                                                    <div class="input-group">
                                                        <button type="button" class="qty-left-minus"
                                                                data-type="minus" data-field="">
                                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                                        </button>
                                                        <input class="form-control input-number qty-input"
                                                               type="text" name="quantity" value="0">
                                                        <button type="button" class="qty-right-plus"
                                                                data-type="plus" data-field="">
                                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
