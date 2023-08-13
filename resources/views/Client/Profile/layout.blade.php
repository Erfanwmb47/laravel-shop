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
                                        <form action="{{route('profile.changeProfileImage')}}" method="post" name="upload_img" enctype="multipart/form-data" id="upload_img">
                                            @csrf
                                            <div class="cover-icon">
                                                <i class="fa-solid fa-pen" id="profile-image">
                                                    <input name="image" type="file"  id="changeProfileImage">
                                                </i>
                                            </div>
                                        </form>
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
                                <a href="{{route('profile')}}">
                                    <button class="nav-link {{side_menu_profile_active('')}}" id="pills-dashboard-tab"
                                            ><i data-feather="home"></i>
                                        داشبورد</button>
                                </a>

                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-order-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-order" type="button" role="tab" aria-controls="pills-order"
                                        aria-selected="false"><i data-feather="shopping-bag"></i>سفارشات</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="{{route('profile.wishlist.index')}}">
                                    <button class="nav-link {{side_menu_profile_active('/wishlist')}}" id="pills-wishlist-tab"
                                    ><i data-feather="heart"></i>
                                        علاقه مندی</button>
                                </a>

                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-card-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-card" type="button" role="tab" aria-controls="pills-card"
                                        aria-selected="false"><i data-feather="credit-card"></i>نظرات</button>
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
