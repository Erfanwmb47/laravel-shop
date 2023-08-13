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
                                    <h4>آدرس فعلی شما <a href="javascript:void(0)" data-bs-toggle="modal"
                                                       data-bs-target="#editProfile">ویرایش</a></h4>
                                </div>
                                <div class="dashboard-detail">
                                    <h6 class="text-content">
                                        {{$user->addresses->firstWhere('default','1')->province->name}} ,
                                        {{$user->addresses->firstWhere('default','1')->county->name}} ,
                                        {{$user->addresses->firstWhere('default','1')->detail}}
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
                                            <div class="order-box dashboard-bg-box">
                                                <div class="product-order-detail">
                                                    <a href="product-left-thumbnail.html" class="order-image">
                                                        <img src="/Client/assets/images/vegetable/product/1.png"
                                                             class="blur-up lazyload" alt="">
                                                    </a>
                                                    <div class="order-wrap">
                                                        <a href="product-left-thumbnail.html">
                                                            <h3>Fantasy Crunchy Choco Chip Cookies</h3>
                                                        </a>
                                                        <p class="text-content">Cheddar dolcelatte gouda. Macaroni cheese
                                                            cheese strings feta halloumi cottage cheese jarlsberg cheese
                                                            triangles say cheese.</p>
                                                        <ul class="product-size">
                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Price : </h6>
                                                                    <h5>$20.68</h5>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Rate : </h6>
                                                                    <div class="product-rating ms-2">
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
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Sold By : </h6>
                                                                    <h5>Fresho</h5>
                                                                </div>
                                                            </li>

                                                            <li>
                                                                <div class="size-box">
                                                                    <h6 class="text-content">Quantity : </h6>
                                                                    <h5>250 G</h5>
                                                                </div>
                                                            </li>
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

                <div class="tab-pane fade show" id="pills-wishlist" role="tabpanel"
                     aria-labelledby="pills-wishlist-tab">
                    <div class="dashboard-wishlist">
                        <div class="title">
                            <h2>My Wishlist History</h2>
                            <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                        </div>
                        <div class="row g-sm-4 g-3">
                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                <div class="product-box-3 theme-bg-white h-100">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product-left-thumbnail.html">
                                                <img src="/Client/assets/images/cake/product/2.png"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="product-header-top">
                                                <button class="btn wishlist-button close_button">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">Vegetable</span>
                                            <a href="product-left-thumbnail.html">
                                                <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">Cheesy feet
                                                cheesy grin brie. Mascarpone cheese and wine hard cheese the
                                                big cheese everyone loves smelly cheese macaroni cheese
                                                croque monsieur.</p>
                                            <h6 class="unit mt-1">250 ml</h6>
                                            <h5 class="price">
                                                <span class="theme-color">$08.02</span>
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

                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                <div class="product-box-3 theme-bg-white h-100">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product-left-thumbnail.html">
                                                <img src="/Client/assets/images/cake/product/3.png"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="product-header-top">
                                                <button class="btn wishlist-button close_button">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">Vegetable</span>
                                            <a href="product-left-thumbnail.html">
                                                <h5 class="name">Peanut Butter Bite Premium Butter Cookies
                                                    600 g</h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">Feta taleggio
                                                croque monsieur swiss manchego cheesecake dolcelatte
                                                jarlsberg. Hard cheese danish fontina boursin melted cheese
                                                fondue.</p>
                                            <h6 class="unit mt-1">350 G</h6>
                                            <h5 class="price">
                                                <span class="theme-color">$04.33</span>
                                                <del>$10.36</del>
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

                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                <div class="product-box-3 theme-bg-white h-100">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product-left-thumbnail.html">
                                                <img src="/Client/assets/images/cake/product/4.png"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="product-header-top">
                                                <button class="btn wishlist-button close_button">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">Snacks</span>
                                            <a href="product-left-thumbnail.html">
                                                <h5 class="name">SnackAmor Combo Pack of Jowar Stick and
                                                    Jowar Chips</h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">Lancashire
                                                hard cheese parmesan. Danish fontina mozzarella cream cheese
                                                smelly cheese cheese and wine cheesecake dolcelatte stilton.
                                                Cream cheese parmesan who moved my cheese when the cheese
                                                comes out everybody's happy cream cheese red leicester
                                                ricotta edam.</p>
                                            <h6 class="unit mt-1">570 G</h6>
                                            <h5 class="price">
                                                <span class="theme-color">$12.52</span>
                                                <del>$13.62</del>
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

                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                <div class="product-box-3 theme-bg-white h-100">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product-left-thumbnail.html">
                                                <img src="/Client/assets/images/cake/product/5.png"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="product-header-top">
                                                <button class="btn wishlist-button close_button">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">Snacks</span>
                                            <a href="product-left-thumbnail.html">
                                                <h5 class="name">Yumitos Chilli Sprinkled Potato Chips 100 g
                                                </h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">Cheddar
                                                cheddar pecorino hard cheese hard cheese cheese and biscuits
                                                bocconcini babybel. Cow goat paneer cream cheese fromage
                                                cottage cheese cauliflower cheese jarlsberg.</p>
                                            <h6 class="unit mt-1">100 G</h6>
                                            <h5 class="price">
                                                <span class="theme-color">$10.25</span>
                                                <del>$12.36</del>
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

                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                <div class="product-box-3 theme-bg-white h-100">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product-left-thumbnail.html">
                                                <img src="/Client/assets/images/cake/product/6.png"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="product-header-top">
                                                <button class="btn wishlist-button close_button">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">Vegetable</span>
                                            <a href="product-left-thumbnail.html">
                                                <h5 class="name">Fantasy Crunchy Choco Chip Cookies</h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">Bavarian
                                                bergkase smelly cheese swiss cut the cheese lancashire who
                                                moved my cheese manchego melted cheese. Red leicester paneer
                                                cow when the cheese comes out everybody's happy croque
                                                monsieur goat melted cheese port-salut.</p>
                                            <h6 class="unit mt-1">550 G</h6>
                                            <h5 class="price">
                                                <span class="theme-color">$14.25</span>
                                                <del>$16.57</del>
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

                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                <div class="product-box-3 theme-bg-white h-100">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product-left-thumbnail.html">
                                                <img src="/Client/assets/images/cake/product/7.png"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="product-header-top">
                                                <button class="btn wishlist-button close_button">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">Vegetable</span>
                                            <a href="product-left-thumbnail.html">
                                                <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">Melted cheese
                                                babybel chalk and cheese. Port-salut port-salut cream cheese
                                                when the cheese comes out everybody's happy cream cheese
                                                hard cheese cream cheese red leicester.</p>
                                            <h6 class="unit mt-1">1 Kg</h6>
                                            <h5 class="price">
                                                <span class="theme-color">$12.68</span>
                                                <del>$14.69</del>
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

                            <div class="col-xxl-3 col-lg-6 col-md-4 col-sm-6">
                                <div class="product-box-3 theme-bg-white h-100">
                                    <div class="product-header">
                                        <div class="product-image">
                                            <a href="product-left-thumbnail.html">
                                                <img src="/Client/assets/images/cake/product/2.png"
                                                     class="img-fluid blur-up lazyload" alt="">
                                            </a>

                                            <div class="product-header-top">
                                                <button class="btn wishlist-button close_button">
                                                    <i data-feather="x"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-footer">
                                        <div class="product-detail">
                                            <span class="span-name">Vegetable</span>
                                            <a href="product-left-thumbnail.html">
                                                <h5 class="name">Fresh Bread and Pastry Flour 200 g</h5>
                                            </a>
                                            <p class="text-content mt-1 mb-2 product-content">Squirty cheese
                                                cottage cheese cheese strings. Red leicester paneer danish
                                                fontina queso lancashire when the cheese comes out
                                                everybody's happy cottage cheese paneer.</p>
                                            <h6 class="unit mt-1">250 ml</h6>
                                            <h5 class="price">
                                                <span class="theme-color">$08.02</span>
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
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-order" role="tabpanel"
                     aria-labelledby="pills-order-tab">
                    <div class="dashboard-order">
                        <div class="title">
                            <h2>My Orders History</h2>
                            <span class="title-leaf title-leaf-gray">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                        </div>

                        <div class="order-contain">
                            <div class="order-box dashboard-bg-box">
                                <div class="order-container">
                                    <div class="order-icon">
                                        <i data-feather="box"></i>
                                    </div>

                                    <div class="order-detail">
                                        <h4>Delivere <span>Panding</span></h4>
                                        <h6 class="text-content">Gouda parmesan caerphilly mozzarella
                                            cottage cheese cauliflower cheese taleggio gouda.</h6>
                                    </div>
                                </div>

                                <div class="product-order-detail">
                                    <a href="product-left-thumbnail.html" class="order-image">
                                        <img src="/Client/assets/images/vegetable/product/1.png"
                                             class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="order-wrap">
                                        <a href="product-left-thumbnail.html">
                                            <h3>Fantasy Crunchy Choco Chip Cookies</h3>
                                        </a>
                                        <p class="text-content">Cheddar dolcelatte gouda. Macaroni cheese
                                            cheese strings feta halloumi cottage cheese jarlsberg cheese
                                            triangles say cheese.</p>
                                        <ul class="product-size">
                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Price : </h6>
                                                    <h5>$20.68</h5>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Rate : </h6>
                                                    <div class="product-rating ms-2">
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
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Sold By : </h6>
                                                    <h5>Fresho</h5>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Quantity : </h6>
                                                    <h5>250 G</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="order-box dashboard-bg-box">
                                <div class="order-container">
                                    <div class="order-icon">
                                        <i data-feather="box"></i>
                                    </div>

                                    <div class="order-detail">
                                        <h4>Delivered <span class="success-bg">Success</span></h4>
                                        <h6 class="text-content">Cheese on toast cheesy grin cheesy grin
                                            cottage cheese caerphilly everyone loves cottage cheese the big
                                            cheese.</h6>
                                    </div>
                                </div>

                                <div class="product-order-detail">
                                    <a href="product-left-thumbnail.html" class="order-image">
                                        <img src="/Client/assets/images/vegetable/product/2.png" alt=""
                                             class="blur-up lazyload">
                                    </a>

                                    <div class="order-wrap">
                                        <a href="product-left-thumbnail.html">
                                            <h3>Cold Brew Coffee Instant Coffee 50 g</h3>
                                        </a>
                                        <p class="text-content">Pecorino paneer port-salut when the cheese
                                            comes out everybody's happy red leicester mascarpone blue
                                            castello cauliflower cheese.</p>
                                        <ul class="product-size">
                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Price : </h6>
                                                    <h5>$20.68</h5>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Rate : </h6>
                                                    <div class="product-rating ms-2">
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
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Sold By : </h6>
                                                    <h5>Fresho</h5>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Quantity : </h6>
                                                    <h5>250 G</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="order-box dashboard-bg-box">
                                <div class="order-container">
                                    <div class="order-icon">
                                        <i data-feather="box"></i>
                                    </div>

                                    <div class="order-detail">
                                        <h4>Delivere <span>Panding</span></h4>
                                        <h6 class="text-content">Cheesy grin boursin cheesy grin cheesecake
                                            blue castello cream cheese lancashire melted cheese.</h6>
                                    </div>
                                </div>

                                <div class="product-order-detail">
                                    <a href="product-left-thumbnail.html" class="order-image">
                                        <img src="/Client/assets/images/vegetable/product/3.png" alt=""
                                             class="blur-up lazyload">
                                    </a>

                                    <div class="order-wrap">
                                        <a href="product-left-thumbnail.html">
                                            <h3>Peanut Butter Bite Premium Butter Cookies 600 g</h3>
                                        </a>
                                        <p class="text-content">Cow bavarian bergkase mascarpone paneer
                                            squirty cheese fromage frais cheese slices when the cheese comes
                                            out everybody's happy.</p>
                                        <ul class="product-size">
                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Price : </h6>
                                                    <h5>$20.68</h5>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Rate : </h6>
                                                    <div class="product-rating ms-2">
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
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Sold By : </h6>
                                                    <h5>Fresho</h5>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Quantity : </h6>
                                                    <h5>250 G</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="order-box dashboard-bg-box">
                                <div class="order-container">
                                    <div class="order-icon">
                                        <i data-feather="box"></i>
                                    </div>

                                    <div class="order-detail">
                                        <h4>Delivered <span class="success-bg">Success</span></h4>
                                        <h6 class="text-content">Caerphilly port-salut parmesan pecorino
                                            croque monsieur dolcelatte melted cheese cheese and wine.</h6>
                                    </div>
                                </div>

                                <div class="product-order-detail">
                                    <a href="product-left-thumbnail.html" class="order-image">
                                        <img src="/Client/assets/images/vegetable/product/4.png"
                                             class="blur-up lazyload" alt="">
                                    </a>

                                    <div class="order-wrap">
                                        <a href="product-left-thumbnail.html">
                                            <h3>SnackAmor Combo Pack of Jowar Stick and Jowar Chips</h3>
                                        </a>
                                        <p class="text-content">The big cheese cream cheese pepper jack
                                            cheese slices danish fontina everyone loves cheese on toast
                                            bavarian bergkase.</p>
                                        <ul class="product-size">
                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Price : </h6>
                                                    <h5>$20.68</h5>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Rate : </h6>
                                                    <div class="product-rating ms-2">
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
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Sold By : </h6>
                                                    <h5>Fresho</h5>
                                                </div>
                                            </li>

                                            <li>
                                                <div class="size-box">
                                                    <h6 class="text-content">Quantity : </h6>
                                                    <h5>250 G</h5>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-address" role="tabpanel"
                     aria-labelledby="pills-address-tab">
                    <div class="dashboard-address">
                        <div class="title title-flex">
                            <div>
                                <h2>My Address Book</h2>
                                <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                            </div>

                            <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                    data-bs-toggle="modal" data-bs-target="#add-address"><i data-feather="plus"
                                                                                            class="me-2"></i> Add New Address</button>
                        </div>

                        <div class="row g-sm-4 g-3">
                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                <div class="address-box">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jack"
                                                   id="flexRadioDefault2" checked>
                                        </div>

                                        <div class="label">
                                            <label>Home</label>
                                        </div>

                                        <div class="table-responsive address-table">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td colspan="2">Jack Jennas</td>
                                                </tr>

                                                <tr>
                                                    <td>Address :</td>
                                                    <td>
                                                        <p>8424 James Lane South San Francisco, CA 94080
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pin Code :</td>
                                                    <td>+380</td>
                                                </tr>

                                                <tr>
                                                    <td>Phone :</td>
                                                    <td>+ 812-710-3798</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="button-group">
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#editProfile"><i data-feather="edit"></i>
                                            Edit</button>
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                            Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                <div class="address-box">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jack"
                                                   id="flexRadioDefault3">
                                        </div>

                                        <div class="label">
                                            <label>Office</label>
                                        </div>

                                        <div class="table-responsive address-table">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td colspan="2">Terry S. Sutton</td>
                                                </tr>

                                                <tr>
                                                    <td>Address :</td>
                                                    <td>
                                                        <p>2280 Rose Avenue Kenner, LA 70062</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pin Code :</td>
                                                    <td>+25</td>
                                                </tr>

                                                <tr>
                                                    <td>Phone :</td>
                                                    <td>+ 504-228-0969</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="button-group">
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#editProfile"><i data-feather="edit"></i>
                                            Edit</button>
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                            Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                <div class="address-box">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jack"
                                                   id="flexRadioDefault4">
                                        </div>

                                        <div class="label">
                                            <label>Neighbour</label>
                                        </div>

                                        <div class="table-responsive address-table">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td colspan="2">Juan M. McKeon</td>
                                                </tr>

                                                <tr>
                                                    <td>Address :</td>
                                                    <td>
                                                        <p>1703 Carson Street Lexington, KY 40593</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pin Code :</td>
                                                    <td>+78</td>
                                                </tr>

                                                <tr>
                                                    <td>Phone :</td>
                                                    <td>+ 859-257-0509</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="button-group">
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#editProfile"><i data-feather="edit"></i>
                                            Edit</button>
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                            Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                <div class="address-box">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jack"
                                                   id="flexRadioDefault5">
                                        </div>

                                        <div class="label">
                                            <label>Home 2</label>
                                        </div>

                                        <div class="table-responsive address-table">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td colspan="2">Gary M. Bailey</td>
                                                </tr>

                                                <tr>
                                                    <td>Address :</td>
                                                    <td>
                                                        <p>2135 Burning Memory Lane Philadelphia, PA
                                                            19135</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pin Code :</td>
                                                    <td>+26</td>
                                                </tr>

                                                <tr>
                                                    <td>Phone :</td>
                                                    <td>+ 215-335-9916</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="button-group">
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#editProfile"><i data-feather="edit"></i>
                                            Edit</button>
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                            Remove</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                <div class="address-box">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jack"
                                                   id="flexRadioDefault1">
                                        </div>

                                        <div class="label">
                                            <label>Home 2</label>
                                        </div>

                                        <div class="table-responsive address-table">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td colspan="2">Gary M. Bailey</td>
                                                </tr>

                                                <tr>
                                                    <td>Address :</td>
                                                    <td>
                                                        <p>2135 Burning Memory Lane Philadelphia, PA
                                                            19135</p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pin Code :</td>
                                                    <td>+26</td>
                                                </tr>

                                                <tr>
                                                    <td>Phone :</td>
                                                    <td>+ 215-335-9916</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="button-group">
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#editProfile"><i data-feather="edit"></i>
                                            Edit</button>
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                            Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-card" role="tabpanel"
                     aria-labelledby="pills-card-tab">
                    <div class="dashboard-card">
                        <div class="title title-flex">
                            <div>
                                <h2>My Card Details</h2>
                                <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                            </div>

                            <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                    data-bs-toggle="modal" data-bs-target="#editCard"><i data-feather="plus"
                                                                                         class="me-2"></i> Add New Card</button>
                        </div>

                        <div class="row g-4">
                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                <div class="payment-card-detail">
                                    <div class="card-details">
                                        <div class="card-number">
                                            <h4>XXXX - XXXX - XXXX - 2548</h4>
                                        </div>

                                        <div class="valid-detail">
                                            <div class="title">
                                                <span>valid</span>
                                                <span>thru</span>
                                            </div>
                                            <div class="date">
                                                <h3>08/05</h3>
                                            </div>
                                            <div class="primary">
                                                <span class="badge bg-pill badge-light">primary</span>
                                            </div>
                                        </div>

                                        <div class="name-detail">
                                            <div class="name">
                                                <h5>Audrey Carol</h5>
                                            </div>
                                            <div class="card-img">
                                                <img src="/Client/assets/images/payment-icon/1.jpg"
                                                     class="img-fluid blur-up lazyloaded" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="edit-card">
                                        <a data-bs-toggle="modal" data-bs-target="#editCard"
                                           href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                           data-bs-target="#removeProfile"><i
                                                class="far fa-minus-square"></i> delete</a>
                                    </div>
                                </div>

                                <div class="edit-card-mobile">
                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                       href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                    <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                        delete</a>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                <div class="payment-card-detail">
                                    <div class="card-details card-visa">
                                        <div class="card-number">
                                            <h4>XXXX - XXXX - XXXX - 1536</h4>
                                        </div>

                                        <div class="valid-detail">
                                            <div class="title">
                                                <span>valid</span>
                                                <span>thru</span>
                                            </div>
                                            <div class="date">
                                                <h3>12/23</h3>
                                            </div>
                                            <div class="primary">
                                                <span class="badge bg-pill badge-light">primary</span>
                                            </div>
                                        </div>

                                        <div class="name-detail">
                                            <div class="name">
                                                <h5>Leah Heather</h5>
                                            </div>
                                            <div class="card-img">
                                                <img src="/Client/assets/images/payment-icon/2.jpg"
                                                     class="img-fluid blur-up lazyloaded" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="edit-card">
                                        <a data-bs-toggle="modal" data-bs-target="#editCard"
                                           href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                           data-bs-target="#removeProfile"><i
                                                class="far fa-minus-square"></i> delete</a>
                                    </div>
                                </div>

                                <div class="edit-card-mobile">
                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                       href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                    <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                        delete</a>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-sm-6">
                                <div class="payment-card-detail">
                                    <div class="card-details dabit-card">
                                        <div class="card-number">
                                            <h4>XXXX - XXXX - XXXX - 1366</h4>
                                        </div>

                                        <div class="valid-detail">
                                            <div class="title">
                                                <span>valid</span>
                                                <span>thru</span>
                                            </div>
                                            <div class="date">
                                                <h3>05/21</h3>
                                            </div>
                                            <div class="primary">
                                                <span class="badge bg-pill badge-light">primary</span>
                                            </div>
                                        </div>

                                        <div class="name-detail">
                                            <div class="name">
                                                <h5>mark jecno</h5>
                                            </div>
                                            <div class="card-img">
                                                <img src="/Client/assets/images/payment-icon/3.jpg"
                                                     class="img-fluid blur-up lazyloaded" alt="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="edit-card">
                                        <a data-bs-toggle="modal" data-bs-target="#editCard"
                                           href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                        <a href="javascript:void(0)" data-bs-toggle="modal"
                                           data-bs-target="#removeProfile"><i
                                                class="far fa-minus-square"></i> delete</a>
                                    </div>
                                </div>

                                <div class="edit-card-mobile">
                                    <a data-bs-toggle="modal" data-bs-target="#editCard"
                                       href="javascript:void(0)"><i class="far fa-edit"></i> edit</a>
                                    <a href="javascript:void(0)"><i class="far fa-minus-square"></i>
                                        delete</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-profile" role="tabpanel"
                     aria-labelledby="pills-profile-tab">
                    <div class="dashboard-profile">
                        <div class="title">
                            <h2>My Profile</h2>
                            <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                        </div>

                        <div class="profile-detail dashboard-bg-box">
                            <div class="dashboard-title">
                                <h3>Profile Name</h3>
                            </div>
                            <div class="profile-name-detail">
                                <div class="d-sm-flex align-items-center d-block">
                                    <h3>Vicki E. Pope</h3>
                                    <div class="product-rating profile-rating">
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
                                </div>

                                <a href="javascript:void(0)" data-bs-toggle="modal"
                                   data-bs-target="#editProfile">Edit</a>
                            </div>

                            <div class="location-profile">
                                <ul>
                                    <li>
                                        <div class="location-box">
                                            <i data-feather="map-pin"></i>
                                            <h6>Downers Grove, IL</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="location-box">
                                            <i data-feather="mail"></i>
                                            <h6>vicki.pope@gmail.com</h6>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="location-box">
                                            <i data-feather="check-square"></i>
                                            <h6>Licensed for 2 years</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="profile-description">
                                <p>Residences can be classified by and how they are connected to
                                    neighbouring residences and land. Different types of housing tenure can
                                    be used for the same physical type.</p>
                            </div>
                        </div>

                        <div class="profile-about dashboard-bg-box">
                            <div class="row">
                                <div class="col-xxl-7">
                                    <div class="dashboard-title mb-3">
                                        <h3>Profile About</h3>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>Gender :</td>
                                                <td>Female</td>
                                            </tr>
                                            <tr>
                                                <td>Birthday :</td>
                                                <td>21/05/1997</td>
                                            </tr>
                                            <tr>
                                                <td>Phone Number :</td>
                                                <td>
                                                    <a href="javascript:void(0)"> +91 846 - 547 -
                                                        210</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Address :</td>
                                                <td>549 Sulphur Springs Road, Downers, IL</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="dashboard-title mb-3">
                                        <h3>Login Details</h3>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td>Email :</td>
                                                <td>
                                                    <a href="javascript:void(0)">vicki.pope@gmail.com
                                                        <span data-bs-toggle="modal"
                                                              data-bs-target="#editProfile">Edit</span></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Password :</td>
                                                <td>
                                                    <a href="javascript:void(0)">●●●●●●
                                                        <span data-bs-toggle="modal"
                                                              data-bs-target="#editProfile">Edit</span></a>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-xxl-5">
                                    <div class="profile-image">
                                        <img src="/Client/assets/images/inner-page/dashboard-profile.png"
                                             class="img-fluid blur-up lazyload" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade show" id="pills-security" role="tabpanel"
                     aria-labelledby="pills-security-tab">
                    <div class="dashboard-privacy">
                        <div class="dashboard-bg-box">
                            <div class="dashboard-title mb-4">
                                <h3>Privacy</h3>
                            </div>

                            <div class="privacy-box">
                                <div class="d-flex align-items-start">
                                    <h6>Allows others to see my profile</h6>
                                    <div class="form-check form-switch switch-radio ms-auto">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="redio" aria-checked="false">
                                        <label class="form-check-label" for="redio"></label>
                                    </div>
                                </div>

                                <p class="text-content">all peoples will be able to see my profile</p>
                            </div>

                            <div class="privacy-box">
                                <div class="d-flex align-items-start">
                                    <h6>who has save this profile only that people see my profile</h6>
                                    <div class="form-check form-switch switch-radio ms-auto">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="redio2" aria-checked="false">
                                        <label class="form-check-label" for="redio2"></label>
                                    </div>
                                </div>

                                <p class="text-content">all peoples will not be able to see my profile</p>
                            </div>

                            <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Save
                                Changes</button>
                        </div>

                        <div class="dashboard-bg-box mt-4">
                            <div class="dashboard-title mb-4">
                                <h3>Account settings</h3>
                            </div>

                            <div class="privacy-box">
                                <div class="d-flex align-items-start">
                                    <h6>Deleting Your Account Will Permanently</h6>
                                    <div class="form-check form-switch switch-radio ms-auto">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="redio3" aria-checked="false">
                                        <label class="form-check-label" for="redio3"></label>
                                    </div>
                                </div>
                                <p class="text-content">Once your account is deleted, you will be logged out
                                    and will be unable to log in back.</p>
                            </div>

                            <div class="privacy-box">
                                <div class="d-flex align-items-start">
                                    <h6>Deleting Your Account Will Temporary</h6>
                                    <div class="form-check form-switch switch-radio ms-auto">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                               id="redio4" aria-checked="false">
                                        <label class="form-check-label" for="redio4"></label>
                                    </div>
                                </div>

                                <p class="text-content">Once your account is deleted, you will be logged out
                                    and you will be create new account</p>
                            </div>

                            <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Delete My
                                Account</button>
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
