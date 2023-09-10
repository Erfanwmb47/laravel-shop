@extends('Client.Layout.Layout1')
@section('css')
    <link rel="stylesheet" href="/Client/assets/css/TwoFactorAuth.css" type="text/css"/>
@endsection
@section('content')

    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>تایید دو مرحله ای</h2>
                        <ul>
                            <li>
                                <a href="index.html">خانه</a>
                            </li>
                            <li>
                                <span>تایید دو مرحله ای</span>
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
                <form action="{{route('2fa.token')}}" method="post" name="verifyForm">
                    @csrf
                    <div class="mt-3">
                        <div class="sms-code-verification align-content-start" id="sms-code-verification">
                            <div class="sms-div border rounded">
                                <header>
                                    <h4 class="mb-2">کد تایید ارسال شده را وارد کنید </h4>
                                </header>
                                <div class="inputs ltr">
                                    <input type="text" name="token[]"  min="0" max="9" maxLength="1" class="rounded" required oninput="this.value=this.value.replace(/[^0-9]/g,'');" >
                                    <input type="text" name="token[]"  min="0" max="9" maxLength="1" class="rounded" required oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    <input type="text" name="token[]"  min="0" max="9" maxLength="1" class="rounded" required oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    <input type="text" name="token[]"  min="0" max="9" maxLength="1" class="rounded" required oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    <input type="text" name="token[]"  min="0" max="9" maxLength="1" class="rounded" required oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                    <input type="text" name="token[]"  min="0" max="9" maxLength="1" class="rounded" required oninput="this.value=this.value.replace(/[^0-9]/g,'');">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn common-btn" id="btnAuth">
                        ورود
                        <img src="/Client/assets/images/shape1.png" alt="Shape" />
                        <img src="/Client/assets/images/shape2.png" alt="Shape" />
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="/Client/assets/js/TwoFactorAuth.js"></script>
@endsection
