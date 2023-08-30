@extends('Client.Profile.layout')

@section('css')
    <link rel="stylesheet" href="/Client/assets/css/Addresses.css" />
@endsection
@section('left-content')
    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">نمایش منو </button>
    <div class="dashboard-right-sidebar">
        <div class="tab-content">
            <div class="tab-pane fade show active"
                 aria-labelledby="pills-wishlist-tab">
                <div class="dashboard-address">
                    <div class="title title-flex">
                        <div>
                            <h2>دفترچه آدرس من </h2>
                            <span class="title-leaf">
                                                <svg class="icon-width bg-gray">
                                                    <use xlink:href="/Client/assets/svg/leaf.svg#leaf"></use>
                                                </svg>
                                            </span>
                        </div>

                        <button class="btn theme-bg-color text-white btn-sm fw-bold mt-lg-0 mt-3"
                                data-bs-toggle="modal" data-bs-target="#newAddressModal"><i data-feather="plus"
                                                                                        class="me-2"></i> افزودن آدرس جدید</button>
                    </div>

                    <div class="row g-sm-4 g-3">
                        @foreach($addresses as $address )
                            <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                                <div class="address-box">
                                    <div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="jack"
                                                   id="flexRadioDefault2" checked>
                                        </div>

                                        <div class="label">
                                            <label>Home</label>
                                        </div>

                                        <div class="table-responsive address-table">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <td colspan="2">Jack Jennas</td>
                                                </tr>

                                                <tr>
                                                    <td>Address :</td>
                                                    <td>
                                                        <p>8424 James Lane South San Francisco, CA 94080
                                                        </p>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>Pin Code :</td>
                                                    <td>+380</td>
                                                </tr>

                                                <tr>
                                                    <td>Phone :</td>
                                                    <td>+ 812-710-3798</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="button-group">
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#editProfile"><i data-feather="edit"></i>
                                            Edit</button>
                                        <button class="btn btn-sm add-button w-100" data-bs-toggle="modal"
                                                data-bs-target="#removeProfile"><i data-feather="trash-2"></i>
                                            Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!-- آدرس جدید Start -->
        <div class="modal fade theme-modal" id="newAddressModal" tabindex="-1" aria-labelledby="exampleModalLabel2"
             aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen-sm-down">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel2">آدرس جدید</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <form method="post" id="newAddressForm" action="{{route('profile.addresses.store')}}" >
                        @csrf
                        <div class="modal-body">
                            <div class="row g-4">
                                <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress">
                                    <span onclick="showProvince()" class="form-control" id="dropbtnProvince">انتخاب استان</span>
                                    <label for="dropbtnProvince"> استان </label>
                                    <div id="myDropdownProvince" class="dropdown-content-address  fom-control ">
                                        <input type="text" placeholder="Search.." id="myInputProvince"  value="" name="" class="w-100" onkeyup="filterFunctionProvince()">
                                        <input type="text" hidden="hidden" id="myInputProvinceRequest"  value="" name="province_id">
                                        @foreach($provinces as $province)
                                            <span onclick="selectProvince('{{$province->id}}','{{$province->name}}')" id="{{$province->id}}">{{$province->name}}</span>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="col-xxl-6 form-floating theme-form-floating dropdownAddress" id="dropdownCountyAddress">
                                    <span onclick="showCounty()" class="form-control" id="dropbtnCounty">انتخاب شهر</span>
                                    <label for="dropbtnCounty"> شهر </label>
                                    <div id="myDropdownCounty" class="dropdown-content-address fom-control">
                                        <input type="text" placeholder="Search.." id="myInputCounty"  value="" class="w-100" name="" onkeyup="filterFunctionCounty()">
                                        <input type="text" hidden="hidden" id="myInputCountyRequest"  value="" name="county_id">
                                        <div id="countiesList">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-6">
                                    <div class="form-floating theme-form-floating">
                                        <input class="form-control" type="tel" placeholder="کد پستی را وارد کنید" name="postalCode" id="postalCode"
                                               maxlength="10">
                                        <label class="right-0" for="postalCode">کد پستی</label>
                                    </div>
                                </div>
                                <div class="col-xxl-6">

                                    <div class="form-floating theme-form-floating">
                                        <input class="form-control" type="tel" placeholder="تلفن ثابت را وارد کنید" name="tel" id="tel"
                                               maxlength="10">
                                        <label class="right-0" for="tel">تلفن</label>
                                    </div>

                                </div>

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating">
                                        <input type="text" class="form-control" id="detail" name="detail"
                                               placeholder="آدرس را وارد کنید ">
                                        <label for="detail" class="right-0">آدرس کامل</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" data-bs-dismiss="modal" id="submitAddress" disabled
                                    class="btn theme-bg-color btn-md fw-bold text-light">ثبت آدرس</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <!-- آدرس جدید End -->
    </div>
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
    <script src="/Client/assets/js/Profile/address.js"></script>

@endsection
