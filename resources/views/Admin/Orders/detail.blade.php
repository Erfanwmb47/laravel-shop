
@section('content')
    <div class="grid grid-cols-12 gap-6">
{{--        <input type="button" value="click" onclick="printDiv('orderDetails')">--}}
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6" id="orderDetails" >
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        جزئیات سفارش  {{$order->id}}
                    </h2>
                    <a href="{{route('orders.invoice',$order)}}" class="button  bg-white border-2 border-b-blue-600 mr-3">مشاهده فاکتور</a>
                    <a href="" class="mr-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 ml-3"></i> بارگزاری مجدد </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5 rtl">
                    <!-- BEGIN: FAQ Menu -->
                    <div href="" class="intro-y col-span-12 lg:col-span-4 box py-10 border-2 @if($order->status == 'unpaid' || $order->status == 'canceled') btn-11-red @else text-gray-300 @endif">
                        <i  @if($order->status == 'unpaid' || $order->status == 'canceled') data-feather="frown" @else data-feather="smile" @endif class="w-12 h-12  mx-auto"></i>
                        <div class="font-medium text-center text-base mt-3">تکمیل سفارش</div>
                        <div class=" mt-2 w-3/4 text-center mx-auto">سفارش شما  در وضعیت <b>{{order_status($order->status)[0]}}</b> قرار دارد </div>
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-4 box py-10 @if($order->status == 'paid' || $order->status == 'preparation') btn-11-blue @else text-gray-300 @endif">
                        <i data-feather="trending-up" class="w-12 h-12  mx-auto"></i>
                        <div class="font-medium text-center text-base mt-3">آماده سازی سفارش</div>
                        @if($order->status == 'paid' || $order->status == 'preparation')
                            <div class=" mt-2 w-3/4 text-center mx-auto">در حال آماده سازی محصولات شما برای ارسال هستیم </div>
                        @elseif($order->status == 'received' || $order->status == 'posted')
                            <div class=" mt-2 w-3/4 text-center mx-auto">سفارش شما آماده سازی شده است   </div>
                        @else
                            <div class=" mt-2 w-3/4 text-center mx-auto">لطفا ابتدا سفارش خود را تکمیل کنید  </div>
                        @endif
                    </div>
                    <div class="intro-y col-span-12 lg:col-span-4 box py-10 @if($order->status == 'received' || $order->status == 'posted') btn-11-green @else text-gray-300 @endif">
                        <i data-feather="send" class="w-12 h-12  mx-auto "></i>
                        <div class="font-medium text-center text-base mt-3">ارسال سفارش</div>
                        @if($order->status == 'received' || $order->status == 'posted')
                            <div class=" mt-2 w-3/4 text-center mx-auto">سفارش شما به  {{$order->transportation->name}} تحویل داده شده است </div>
                            @if(isset($order->tracking_serial))
                                <div class=" mt-2 w-3/4 text-center mx-auto" >
                                    <div class="float-right">شماره پیگیری پست:</div>
                                    <div class="text-blue-600 text-lg tooltipCopyCode" onmouseout="outFuncCopyToClipboard('myTooltip{{$order->id}}','کپی کن !')" onclick="copyToClipboard('discountCode{{$order->id}}','myTooltip{{$order->id}}')">
                                        <span id="discountCode{{$order->id}}">{{$order->tracking_serial}}</span>
                                        <span class="tooltiptext text-xs" id="myTooltip{{$order->id}}">کپی کن !</span>
                                    </div>
                                </div>
                            @endif
                        @else
                            <div class=" mt-2 w-3/4 text-center mx-auto">سفارش شما هنوز ارسال نشده است </div>
                        @endif


                    </div>
                    <!-- END: FAQ Menu -->
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="star" class="report-box__icon text-theme-12"></i>
                                    <div class="mr-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="33% Higher than last month"> 33% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold leading-8 mt-6">امتیاز سفارش</div>
                                <div class="text-base text-gray-600 mt-1">{{$order->score}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                    <div class="mr-auto">
                                        <div class="report-box__indicator bg-theme-6 tooltip cursor-pointer" title="درصد تخفیف اعمال شده"> 2% <i data-feather="chevron-down" class="w-4 h-4"></i> </div>
                                    </div>
                                </div>
                                <div class="text-2xl font-bold leading-8 mt-6">هزینه نهایی</div>
                                <div class="text-base text-gray-600 mt-1"><del class="text-xs text-theme-6">{{number_format($order->final_cost)}}</del>  {{number_format($order->final_cost)}}<span class="float-left">تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="truck" class="report-box__icon text-theme-12"></i>
                                    <div class="mr-auto">
                                        <img alt="Midone Tailwind HTML Admin Template" class=" w-12 tooltip rounded" src="{{str_replace('public','/storage',optional($order->transportation->gallery)->path)}}" title="شیوه ارسال">
                                    </div>
                                </div>
                                <div class="text-2xl font-bold leading-8 mt-6">{{$order->transportation->name}}

                                </div>
                                <div class="text-base text-gray-600 mt-1">{{number_format($order->transportation_cost)}}<span class="float-left"> تومان</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                    <div class="mr-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="22% Higher than last month"> 22% <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                    </div>
                                </div>
                                <div class="text-xl font-bold leading-8 mt-6">مشخصات گیرنده</div>
                                <div class="text-base text-gray-600 mt-1">{{$order->recipient_name}} <a href="tel:+98{{ltrim($order->recipient_phone, $order->recipient_phone[0])}}" title="تماس" class="float-left tooltip">{{$order->recipient_phone}}</a></div>
                                <div class="text-base text-gray-600 mt-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <div  class="col-span-6 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
                <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Important Notes -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 xxl:col-span-12 xl:col-start-1 xl:row-start-1 xxl:col-start-auto xxl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate ml-auto">
                                توضیحات سفارش
                            </h2>
                        </div>
                        <div class="mt-5 intro-x rtl">
                            <div class="slick-carousel box zoom-in" id="important-notes">
                                <div class="p-5">
                                    <div class="text-base font-medium truncate"></div>
                                    {{--                                    TODO تایم برای سفارش --}}
                                    <div class="text-gray-500 mt-1">{{jdate($order->created_at)->ago()}}</div>
                                    <div class="text-gray-600 text-justify mt-1">
                                        @if(isset($order->description))
                                            {{$order->description}}
                                        @else
                                            توضیحاتی برای این سفارش ندارید
                                        @endif
                                    </div>
                                    <div class="font-medium flex mt-5">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END: Important Notes -->
                </div>
            </div>
            <div class="col-span-6 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
                <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Important Notes -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 xxl:col-span-12 xl:col-start-1 xl:row-start-1 xxl:col-start-auto xxl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate ml-auto">
                                آدرس تحویل گیرنده
                            </h2>
                        </div>
                        <div class="mt-5 intro-x rtl">
                            <div class="slick-carousel box zoom-in" id="important-notes">
                                <div class="p-5">
                                    <div class="text-base font-medium truncate"></div>
                                    <div class="text-gray-500 mt-1">{{$address[0]}} / {{$address[1]}}</div>
                                    <div class="text-gray-500 text-justify mt-1">
                                        کد پستی :  {{$address[2]}}
                                    </div>
                                    <div class="text-gray-600 text-justify mt-1">
                                        {{$address[3]}}
                                    </div>
                                    <div class="font-medium flex mt-5">
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END: Important Notes -->
                </div>
            </div>
            <!-- BEGIN: Weekly Top Seller -->
            <div class="col-span-12 mt-6 grid grid-cols-12">
                <div class=" rtl intro-y block sm:flex items-center h-10 col-span-12">
                    <h2 class="text-lg font-medium truncate mr-5">
                        لیست محصولات خریداری شده
                    </h2>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0  col-span-12 lg:col-span-6">
                    <table class="table table-report sm:mt-2  mr-2">
                        <thead>
                        <tr class="text-xs">
                            <th class="text-center whitespace-no-wrap">قیمت نهایی</th>
                            <th class="text-center whitespace-no-wrap">تعداد</th>
                            <th class="text-center whitespace-no-wrap">قیمت محصول</th>
                            <th class="whitespace-no-wrap text-center">نام محصول</th>
                            <th class="whitespace-no-wrap">عکس محصول</th>
                            <th class="whitespace-no-wrap">ردیف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            @if($loop->even)
                                <tr class="intro-x" style="max-height: 60px;">
                                    <td class="w-40 text-center">
                                        <a class="font-medium whitespace-no-wrap flex-justify-center" href="">{{ number_format($product->pivot->price * $product->quantity)}}</a>
                                        <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-center text-theme-6"><del>{{number_format($product->pivot->price * $product->quantity)}}</del></div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-theme-9"> {{$product->pivot->quantity}} </div>
                                    </td>
                                    <td class="text-center">{{$product->pivot->price}}</td>
                                    <td class="text-center">
                                        <a href="" class=" w-full font-medium whitespace-no-wrap flex-justify-center">{{$product->name}}</a>
                                    </td>
                                    <td class="table-report__action w-56">

                                        <div class="flex-reverse w-20">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="{{str_replace('public','/storage',optional($product->gallery)->path)}}" title="{{$product->nickName}}">
                                            </div>

                                        </div>
                                    </td>
                                    <td class="text-center">{{$loop->index +1}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0  col-span-12 lg:col-span-6">
                    <table class="table table-report sm:mt-2  ml-2">
                        <thead>
                        <tr class="text-xs">
                            <th class="text-center  whitespace-no-wrap">قیمت نهایی</th>
                            <th class="text-center whitespace-no-wrap">تعداد</th>
                            <th class="text-center whitespace-no-wrap">قیمت محصول</th>
                            <th class="whitespace-no-wrap text-center">نام محصول</th>
                            <th class="whitespace-no-wrap">عکس محصول</th>
                            <th class="whitespace-no-wrap">ردیف</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($order->products as $product)
                            @if($loop->odd)
                                <tr class="intro-x" style="max-height: 60px;">
                                    <td class="w-40 text-center">
                                        <a class="font-medium whitespace-no-wrap flex-justify-center" href="">{{number_format($product->pivot->price * $product->quantity)}}</a>
                                        <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-center text-theme-6"><del>{{number_format($product->pivot->price * $product->quantity)}}</del></div>
                                    </td>
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-theme-9"> {{$product->pivot->quantity}} </div>
                                    </td>
                                    <td class="text-center">{{$product->pivot->price}}</td>
                                    <td class="text-center">
                                        <a href="" class=" w-full font-medium whitespace-no-wrap flex-justify-center">{{$product->name}}</a>
                                    </td>
                                    <td class="table-report__action w-56">
                                        <div class="flex-reverse w-20">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="{{str_replace('public','/storage',optional($product->gallery)->path)}}" title="{{$product->nickName}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">{{$loop->index +1}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END: Weekly Top Seller -->
            <div class="col-span-12 mt-6">
                <div class=" rtl intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        نتایج پرداختی سفارش
                    </h2>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0 grid grid-cols-12">
                    @if($payments->count() > 1)
                    <table class="table table-report sm:mt-2 col-span-6 mr-2">
                        <thead>
                        <tr class="text-xs">
                            <th class="text-center whitespace-no-wrap">قیمت نهایی</th>
                            <th class="text-center whitespace-no-wrap">تعداد</th>
                            <th class="text-center whitespace-no-wrap">قیمت محصول</th>
                            <th class="whitespace-no-wrap text-center">نام محصول</th>
                            <th class="whitespace-no-wrap">عکس محصول</th>
                            <th class="whitespace-no-wrap">ردیف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            @if($loop->even)
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-theme-9"> {{jdate($payment->created_at)}} </div>
                                    </td>
                                    <td class="text-center">{{$payment->status ? 'پرداخت شده' : 'پرداخت نشده'}}</td>
                                    <td class="text-center">
                                        <a href="" class=" w-full font-medium whitespace-no-wrap flex-justify-center">{{$payment->resNumber}}</a>
                                    </td>
                                    <td class="text-center">{{$loop->index +1}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                    @endif
                    <table class="table table-report sm:mt-2 col-span-6 ml-2 ">
                        <thead>
                        <tr class="text-xs">
                            <th class="text-center whitespace-no-wrap">زمان پرداخت</th>
                            <th class="text-center whitespace-no-wrap">وضعیت</th>
                            <th class="whitespace-no-wrap text-center">resNumber</th>
                            <th class="whitespace-no-wrap">ردیف</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($payments as $payment)
                            @if($loop->odd)
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex items-center justify-center text-theme-9"> {{jdate($payment->created_at)}} </div>
                                    </td>
                                    <td class="text-center">{{$payment->status ? 'پرداخت شده' : 'پرداخت نشده'}}</td>
                                    <td class="text-center">
                                        <a href="" class=" w-full font-medium whitespace-no-wrap flex-justify-center">{{$payment->resNumber}}</a>
                                    </td>
                                    <td class="text-center">{{$loop->index +1}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >جزئیات سفارش {{$order->id}}</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a  href="{{route('orders.index')}}" class="" >سفارشات</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
