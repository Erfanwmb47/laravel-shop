@extends('Client.Layouts.master')


@section('content')



    <!-- log in section start -->
    <section class="log-in-section background-image-2 section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="/Client/assets/images/inner-page/log-in.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
{{--
                            <h3>به سینویا خوش آمدید</h3>
--}}
                            <h4>ورود </h4>
                        </div>
                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form  ">
                                        <input type="email" class="form-control  text-end @error('email') border border-2 border-danger @enderror"  id="email" placeholder="ایمیل" name="email" value="{{old('email')}}">
                                        <label for="email" class="right-0">ایمیل</label>
                                    </div>
                                    @error('email') <a class="text-danger text-sm mt-1">{{$message}}</a> @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control @error('password') border border-2 border-danger @enderror" id="password" name="password"
                                               placeholder="رمز عبور">
                                        <label for="password" class="right-0">رمز عبور</label>
                                    </div>
                                    @error('password') <a class="text-danger text-sm mt-1">{{$message}}</a> @enderror
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox"
                                                   id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">به خاطر سپردن</label>
                                        </div>
                                        <a href="forgot.html" class="forgot-password">فراموشی رمز عبور</a>
                                    </div>
                                </div>
                                <x-recaptcha />
                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">ورود</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>یا</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="{{route('auth.google')}}" class="btn google-button w-100">
                                        <img src="/Client/assets/images/inner-page/google.png" class="blur-up lazyload"
                                             alt=""> ورود با گوگل
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>آیا عضو سایت نیستید ؟</h4>
                            <a href="{{route('register')}}">ثبت نام</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
@endsection
@section('js')
    <!-- Slick js-->
    <script src="/Client/assets/js/slick/slick-animation.min.js"></script>
@endsection
