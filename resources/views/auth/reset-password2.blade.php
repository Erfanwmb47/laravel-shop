@extends('Client.Layout.Layout1')

@section('content')
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>فراموشی رمز عبور</h2>
                        <ul>
                            <li>
                                <a href="index.html">خانه</a>
                            </li>
                            <li>
                                <span>ورود</span>
                            </li>
                            <li>
                                <span>فراموشی رمز عبور</span>
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
                <x-auth-validation-errors class="text-danger text-center " :errors="$errors" />
                <x-auth-session-status class="text-center text-success" :status="session('status')" />
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <h2>تغییر رمز عبور</h2>
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="form-group">
                        <x-input-label for="email" :value="__('ایمیل')" />

                        <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email', $request->email)"  readonly="readonly" required autofocus />                    </div>
                    <div class="form-group">
                        <x-input-label for="password" :value="__('رمز عبور')" />

                        <x-text-input id="password" class="form-control" type="password" name="password" required />                    </div>
                    <div class="form-group">
                        <x-input-label for="password_confirmation" :value="__('تایید رمز عبور')" />

                        <x-text-input id="password_confirmation" class="form-control"
                                      type="password"
                                      name="password_confirmation" required />
                    </div>
                    <button type="submit" class="btn common-btn">
                        تغییر رمز عبور
                        <img src="/Client/assets/images/shape1.png" alt="Shape" />
                        <img src="/Client/assets/images/shape2.png" alt="Shape" />
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
