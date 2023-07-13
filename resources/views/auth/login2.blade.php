@extends('Client.Layout.Layout1')
@section('css')
    <style>
        .loginTabs{
            background-color: #434e6e !important;
            color: whitesmoke !important;
        }
        .loginTabs:hover{
            background-color: white !important;
            color: #434e6e !important;
        }
        .loginTabs:active{
            background-color: white !important;
            color: #434e6e !important;
        }
        .nav-pills .nav-link.active, .nav-pills .show>.nav-link{
            background-color: #434e6e !important;
            color: whitesmoke !important;
        }
    </style>
    @endsection
@section('content')

<div class="page-title-area">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-content">
                    <h2>ورود به حساب</h2>
                    <ul>
                        <li>
                            <a href="index.html">خانه</a>
                        </li>
                        <li>
                            <span>ورود به حساب</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="title-img">
        <img src="/Client/assets/images/page-title1.jpg" alt="About" />
        <img src="/Client/assets/images/shape16.png" alt="Shape" />
        <img src="/Client/assets/images/shape17.png" alt="Shape" />
        <img src="/Client/assets/images/shape18.png" alt="Shape" />
    </div>
</div>

<div class="user-area ptb-100">
    <div class="container">
        <div class="user-item">
            <x-auth-session-status class="text-center text-success" :status="session('status')" />
            <x-auth-validation-errors class="text-danger mt-3 list-disc list-inside text-sm-start" :errors="$errors" />
            <div class="bottom">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class=" w-50 nav-item" role="presentation">
                        <button class="nav-link active w-100" id="loginWithPhone-tab" data-bs-toggle="pill" href="#loginWithPhone" role="tab" aria-controls="loginWithPhone" aria-selected="true">ورود با شماره همراه</button>
                    </li>
                    <li class=" w-50 nav-item " role="presentation" >
                        <button class="nav-link w-100" id="loginWithEmail-tab" data-bs-toggle="pill" href="#loginWithEmail" role="tab" aria-controls="loginWithEmail" aria-selected="false">ورود با ایمیل</button>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="loginWithPhone" role="tabpanel" aria-labelledby="loginWithPhone-tab">
                        <form method="POST" action="{{ route('loginWithPhone') }}" autocomplete="off">
                            @csrf
                            <h2>ورود با شماره همراه</h2>
                            <div class="form-group">
                                <input id="phone" value="" required autofocus name="phone" type="text" class="form-control" placeholder="شماره همراه:" />
                            </div>
                            <button type="submit" class="btn common-btn">
                                ورود
                                <img src="/Client/assets/images/shape1.png" alt="Shape" />
                                <img src="/Client/assets/images/shape2.png" alt="Shape" />
                            </button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="loginWithEmail" role="tabpanel" aria-labelledby="loginWithEmail-tab">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <h2>ورود</h2>
                            <div class="form-group">
                                <input id="login" value="" required autofocus name="login" type="text" class="form-control" placeholder="ایمیل:" />
                            </div>
                            <div class="form-group">
                                <input type="password" id="password" class="form-control" name="password" placeholder="کلمه عبور:" required autocomplete="current-password" />
                            </div>

                            <div class="form-group">
                                <div class="block mt-1 float-end">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                        <span class="ml-2 text-sm text-gray-600">{{ __('به خاطر سپردن') }}</span>
                                    </label>
                                </div>

                               <x-recaptcha />


{{--                            <div class="g-recaptcha float-start mb-2"  data-theme="light" data-sitekey="{{config('google.recaptcha.GOOGLE_RECAPTCHA_SITE_KEY')}}"></div>--}}
                            </div>

                            <button type="submit" class="btn common-btn">
                                ورود
                                <img src="/Client/assets/images/shape1.png" alt="Shape" />
                                <img src="/Client/assets/images/shape2.png" alt="Shape" />
                            </button>
                            @if (Route::has('password.request'))

                                <a class="text-primary text-sm-center mt-0 " href="{{ route('password.request') }}" style="width: 100%">
                                    <div class="form-group"> فراموشی رمز عبور</div>
                                </a>


                            @endif
                            <h4>.</h4>
                            <ul>
                                <li>
                                    {{--                        <a href="#">--}}
                                    {{--                            <i class="bx bxl-facebook"></i>--}}
                                    {{--                            ورود از طریق فیسبوک--}}
                                    {{--                        </a>--}}
                                </li>
                                <li>
                                    <a href="{{route('auth.google')}}">
                                        <i class="bx bxl-google"></i>
                                        ورود از طریق گوگل
                                    </a>
                                </li>
                            </ul>
                            <h5>حساب کاربری ندارید؟ <a href="{{route('register')}}">ثبت نام</a></h5>

                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
@section('js')
{{--    <script src="https://www.google.com/recaptcha/api.js?hl=fa" async defer></script>--}}
<script>
    function openLogin(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
</script>
@endsection

