@extends('Client.Layout.Layout1')
@section('content')

    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>حساب کاربری جدید</h2>
                        <ul>
                            <li>
                                <a href="index.html">خانه</a>
                            </li>
                            <li>
                                <span>حساب کاربری جدید</span>
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

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2>ثبت نام</h2>
                    <x-auth-validation-errors class="text-danger mt-3 list-disc list-inside text-sm-start" :errors="$errors" />
                    <x-auth-session-status class="text-center text-success" :status="session('status')" />
                    <div class="form-group">
                        <x-input-label for="name" :value="__('نام کاربری')" />

                        <x-text-input id="name" class="form-control" type="text" name="username" :value="old('name')" required autofocus />
                    </div>
                    <div class="form-group">
                        <x-input-label for="email" :value="__('ایمیل')" />

                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                    </div>
                    <div class="form-group">
                        <x-input-label for="password" :value="__('رمز عبور')" />

                        <x-text-input id="password" class="form-control"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />
                    </div>
                    <div class="form-group">
                        <x-input-label for="password_confirmation" :value="__('تایید رمز عبور')" />

                        <x-text-input id="password_confirmation" class="form-control"
                                      type="password"
                                      name="password_confirmation" required />
                    </div>

                    @recaptcha
                    <button type="submit" class="btn common-btn">
                        ثبت نام
                        <img src="/Client/assets/images/shape1.png" alt="Shape" />
                        <img src="/Client/assets/images/shape2.png" alt="Shape" />
                    </button>
                    <h4>یا</h4>
                    <ul>
                        <li></li>
                        <li>
                            <a href="{{route('auth.google')}}">
                                <i class="bx bxl-google"></i>
ثبت نام از طریق گوگل                            </a>
                        </li>
                    </ul>
                    <h5>قبلا ثبت نام کردی ؟ <a href="{{route('login')}}">ورود</a></h5>
                </form>
            </div>
        </div>
    </div>
@endsection

