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
                <x-auth-validation-errors class="text-danger mt-3 list-disc list-inside text-sm-start" :errors="$errors" />
                    <x-auth-session-status class="mb-4" :status="session('status')" />
            </div>
        </div>
    </div>
@endsection
