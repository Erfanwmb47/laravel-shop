@extends('Client.Layouts.master')


@section('content')


    <!-- log in section start -->
    <section class="log-in-section section-b-space">
        <div class="container-fluid-lg w-100">
            <div class="row">
                <div class="col-xxl-6 col-xl-5 col-lg-6 d-lg-block d-none ms-auto">
                    <div class="image-contain">
                        <img src="/Client/assets/images/inner-page/sign-up.png" class="img-fluid" alt="">
                    </div>
                </div>
{{--                @dd($errors)--}}
                <div class="col-xxl-4 col-xl-5 col-lg-6 col-sm-8 mx-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            {{--<h3>Welcome To Fastkart</h3>--}}
                            <h4>عضویت</h4>
                        </div>
                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control @error('username') border border-2 border-danger @enderror" id="username" placeholder="Full Name" name="username" value="{{old('username')}}">
                                        <label for="username" class="right-0">نام کاربری</label>
                                    </div>
                                    @error('username') <a class="text-danger text-sm mt-1">{{$message}}</a> @enderror

                                </div>
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="email" class="form-control @error('email') border border-2 border-danger @enderror" id="email" placeholder="Email Address" name="email" value="{{old('email')}}">
                                        <label for="email" class="right-0">ایمیل</label>
                                    </div>
                                    @error('email') <a class="text-danger text-sm mt-1">{{$message}}</a> @enderror

                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control @error('password') border border-2 border-danger @enderror" id="password" name="password"
                                               placeholder="Password">
                                        <label for="password" class="right-0">رمز عبور</label>
                                    </div>
                                    @error('password') <a class="text-danger text-sm mt-1">{{$message}}</a> @enderror

                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="password" class="form-control @error('password_confirmation') border border-2 border-danger @enderror" id="password_confirmation" name="password_confirmation"
                                               placeholder="password_confirmation">
                                        <label for="password_confirmation" class="right-0">تکرار رمز عبور</label>
                                    </div>
                                    @error('password_confirmation') <a class="text-danger text-sm mt-1">{{$message}}</a> @enderror
                                </div>
                                <x-recaptcha />
                                <div class="col-12">
                                    <div class="forgot-box">
                                        <div class="form-check ps-0 m-0 remember-box">
                                            <input class="checkbox_animated check-box" type="checkbox" required
                                                   id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault" >من با
                                                <span>قوانین</span> سایت موافقم.</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-animation w-100" type="submit">ثبت نام</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>یا</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://accounts.google.com/signin/v2/identifier?flowName=GlifWebSignIn&flowEntry=ServiceLogin"
                                       class="btn google-button w-100">
                                        <img src="/Client/assets/images/inner-page/google.png" class="blur-up lazyload"
                                             alt="">
                                        ثبت نام با گوگل
                                    </a>
                                </li>

                            </ul>
                        </div>

                        <div class="other-log-in">
                            <h6></h6>
                        </div>

                        <div class="sign-up-box">
                            <h4>آیا حساب کاربری دارید ؟</h4>
                            <a href="{{route('login')}}">ورود</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-7 col-xl-6 col-lg-6"></div>
            </div>
        </div>
    </section>
    <!-- log in section end -->
@endsection

@section('js')
    <!-- Slick js-->
    <script src="/Client/assets/js/slick/slick-animation.min.js"></script>
@endsection
