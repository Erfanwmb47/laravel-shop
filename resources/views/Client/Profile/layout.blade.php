@extends('Client.Layouts.master')

@section('content')
    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="/Client/assets/images/inner-page/cover-img2.jpg" class="img-fluid blur-up lazyload"
                                     alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="{{str_replace('public','/storage',$user->gallery->path)}}"
                                             class="blur-up lazyload update_img" alt="">
                                        <div class="cover-icon">
                                            <i class="fa-solid fa-pen">
                                                <input type="file" onchange="readURL(this,0)">
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>{{$user->username}}</h3>
                                    <h6 class="text-content">{{$user->phone}}</h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link " id="pills-dashboard-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-dashboard" type="button" role="tab"
                                        aria-controls="pills-dashboard" aria-selected="false"><i data-feather="home"></i>
                                    داشبورد</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order"
                                        aria-selected="false"><i data-feather="shopping-bag"></i>سفارشات</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="pills-wishlist-tab" data-bs-toggle="pill" href="{{route('profile.wishlist.index')}}"
                                        data-bs-target="#pills-wishlist" type="button" role="tab"
                                        aria-controls="pills-wishlist" aria-selected="true"><i data-feather="heart"></i>
                                    علاقه مندی</a>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-card-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-card" type="button" role="tab" aria-controls="pills-card"
                                        aria-selected="false"><i data-feather="credit-card"></i> لیست کارت ها</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-address-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-address" type="button" role="tab"
                                        aria-controls="pills-address" aria-selected="false"><i data-feather="map-pin"></i>
                                    آدرس ها</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-profile" type="button" role="tab"
                                        aria-controls="pills-profile" aria-selected="false"><i data-feather="user"></i>
                                    پروفایل</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-security" type="button" role="tab"
                                        aria-controls="pills-security" aria-selected="false"><i data-feather="shield"></i>
                                    امنیت</button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xxl-9 col-lg-8">
                    @yield('left-content')
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->
@endsection
