@extends('Client.Profile.layout')
@section('left-content')
    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">منوی کاربری</button>
    <div class="dashboard-right-sidebar">
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-profile" >
                <div class="dashboard-profile">
                    <div class="title">
                        <h2>پروفایل</h2>
                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                    </div>
                    @if(!$user->username)
                        <div class="bg-warning w-100 h-25 p-4 rounded rounded-3 mb-4 flex-space-between">
                            <h6>شما هنوز برای خود نام کاربری ثبت نکرده اید </h6>
                            <a  href="javascript:;" data-bs-toggle="modal" id="setUsernameBtn"
                                data-bs-target="#editUsername">تنظیم نام کاربری</a>
                        </div>
                        <!-- Edit Profile Start -->
                        <div class="modal fade theme-modal" id="editUsername" tabindex="-1" aria-labelledby="exampleModalLabel2"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered modal-fullscreen-sm-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">تنظیم نام کاربری</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                    <form action="{{route('profile.setUsername',$user)}}" id="setUsernameForm" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row g-4">
                                                <div class="col-xxl-12">
                                                    <div class="form-floating theme-form-floating">
                                                        <input name="username" type="text" class="form-control" id="username1" value="">
                                                        <label for="username1">نام کاربری</label>
                                                    </div>
                                                    <span class="text-danger">نام کاربری تنها یکبار قابل تنظیم است</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-animation btn-md fw-bold"
                                                    data-bs-dismiss="modal">انصراف</button>
                                            <button type="submit" data-bs-dismiss="modal"
                                                    class="btn theme-bg-color btn-md fw-bold text-light" id="">ذخیره</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Profile End -->
                    @endif
                    @if(!$user->email)
                        <div class="bg-danger text-white w-100 h-25 p-4 rounded rounded-3 mb-4 flex-space-between">
                            <h6>شما هنوز برای خود ایمیل ثبت نکرده اید </h6>
                            <a  href="javascript:;" data-bs-toggle="modal" id="setUsernameBtn"
                                data-bs-target="#editEmail">تنظیم ایمیل</a>
                        </div>
                        <!-- Edit Profile Start -->
                        <div class="modal fade theme-modal" id="editEmail" tabindex="-1" aria-labelledby="exampleModalLabel2"
                             aria-hidden="true">
                            <div class="modal-dialog modal-sm modal-dialog-centered modal-fullscreen-sm-down">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel2">ایمیل شما</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                            <i class="fa-solid fa-xmark"></i>
                                        </button>
                                    </div>
                                    <form action="{{route('profile.setEmail',$user)}}" id="setUsernameForm" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row g-4">
                                                <div class="col-xxl-12">
                                                    <div class="form-floating theme-form-floating">
                                                        <input name="email" type="text" class="form-control" id="email1" value="">
                                                        <label for="email1">ایمیل</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-animation btn-md fw-bold"
                                                    data-bs-dismiss="modal">انصراف</button>
                                            <button type="submit" data-bs-dismiss="modal"
                                                    class="btn theme-bg-color btn-md fw-bold text-light" id="">ذخیره</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Edit Profile End -->
                    @endif
                    @if($user->email && !$user->hasVerifiedEmail())
                        <div class="bg-danger text-white w-100 h-25 p-4 rounded rounded-3 mb-4 flex-space-between">
                            <h6>شما هنوز ایمیل خود را تایید نکرده اید</h6>
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                            <a  href="javascript:;">ارسال تاییدیه</a>
                            </form>
                        </div>
                    @endif
                    <div class="profile-detail dashboard-bg-box">
                        <div class="dashboard-title">
                            @if(isset($user->username))<h3>{{$user->username}}</h3>  @endif
                        </div>
                        <div class="profile-name-detail">
                            <div class="d-sm-flex align-items-center d-block">
                                <h3> <i data-feather="user" class="text-primary"></i>  {{$user->firstName}} {{$user->lastName}}</h3>
                            </div>

                            <a href="javascript:void(0)" data-bs-toggle="modal"
                               data-bs-target="#editProfile">ویرایش</a>
                        </div>

                        <div class="location-profile">
                            <ul>
                                <li>
                                    <div class="location-box">
                                        <i data-feather="star" class="text-warning"></i>
                                        <h6>{{$user->score}}</h6>
                                        امتیاز
                                    </div>
                                </li>

                                <li>
                                    <div class="location-box">
                                        <i data-feather="mail"></i>
                                        <h6>{{$user->email}}</h6>
                                    </div>
                                </li>

                                <li>
                                    <div class="location-box">
                                        <i data-feather="check-square" class="text-success"></i>
                                        <h6>عضویت از {{jdate($user->created_at)->ago()}}</h6>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="profile-description">
                            <p>{{$user->description}}</p>
                        </div>
                    </div>

                    <div class="profile-about dashboard-bg-box">
                        <div class="row">
                            <div class="col-xxl-7">
                                <div class="dashboard-title mb-3">
                                    <h3>درباره شما</h3>
                                </div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>جنسیت :</td>
                                            <td>@if(isset($user->sex)) {{$user->sex}} @else نامشخص @endif </td>
                                        </tr>
                                        <tr>
                                            <td>تاریخ تولد :</td>
                                            <td>@if(isset($user->birthday)) {{jdate($user->birthday)->format('%d %B، %Y')}} @else تنظیم نشده @endif</td>
                                        </tr>
                                        <tr>
                                            <td>شماره تلفن :</td>
                                            <td>
                                                <a href="javascript:void(0)">{{$user->phone}}</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="dashboard-title mb-3">
                                    <h3>مشخصات ورود شما</h3>
                                </div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td>شماره تلفن :</td>
                                            <td>
                                                <a href="javascript:void(0)">{{$user->phone}}
                                                    </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>رمز عبور :</td>
                                            <td>
                                                <form method="POST" action="{{route('resetWithPhone') }}">
                                                    @csrf
                                                    <input name="phone" type="hidden" value="{{$user->phone}}" readonly>
                                                    <button class="btn" type="submit">
                                                    <a href="javascript:void(0)">
                                                            ●●●●●●
                                                                <span>ویرایش</span>
                                                        </a>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-xxl-5">
                                <div class="profile-image">
                                    <img src="/Client/assets/images/inner-page/dashboard-profile-2.jpg"
                                         class="img-fluid blur-up lazyload" alt="">
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Profile Start -->
    <div class="modal fade theme-modal" id="editProfile" tabindex="-1" aria-labelledby="exampleModalLabel2"
         aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">ویرایش اطلاعات</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
                <form action="{{route('profile.update',$user)}}" id="editProfileForm" method="post">
                    @csrf
                    @method('PATCH')
                <div class="modal-body">
                    <div class="row g-4">
                        <div class="col-xxl-6">
                                <div class="form-floating theme-form-floating">
                                    <input name="firstName" type="text" class="form-control" id="firstName1" value="{{$user->firstName}}">
                                    <label for="firstName1">نام</label>
                                </div>
                        </div>
                        <div class="col-xxl-6">
                                <div class="form-floating theme-form-floating">
                                    <input name="lastName" type="text" class="form-control" id="lastName1" value="{{$user->lastName}}">
                                    <label for="lastName1">نام خانوادگی</label>
                                </div>
                        </div>
                        <div class="col-xxl-4">
                                <div class="form-floating theme-form-floating">
                                    <select class="form-select" id="floatingSelect1" name="sex"
                                            aria-label="Floating label select example">
                                        <option selected value="man">آقا</option>
                                        <option value="woman">خانم</option>
                                    </select>
                                    <label for="floatingSelect">جنسیت</label>
                                </div>
                        </div>
                        <div class="col-xxl-12">
                            <div class="form-floating theme-form-floating">
                                <textarea id="description1" class="form-control rtl" name="description" placeholder="توضیح مختصری راجع به خودت بده"></textarea>
                                <label for="description1" class="right-0">درباره خودت</label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold"
                            data-bs-dismiss="modal">انصراف</button>
                    <button type="button" data-bs-dismiss="modal"
                            class="btn theme-bg-color btn-md fw-bold text-light" id="usernameSubmitButton">ذخیره</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Profile End -->
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
