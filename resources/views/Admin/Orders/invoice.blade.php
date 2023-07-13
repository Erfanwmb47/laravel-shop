
<!DOCTYPE html>
<!--
Shared By Mellatweb
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!-- BEGIN: Head -->
<head>
    <meta charset="utf-8">
    <link href="/Admin/images/logo.svg" rel="shortcut icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>seanovia</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="/Admin/css/app.css" />
{{--    <link rel = "stylesheet" type = "text/css" media = "print" href = "/Admin/css/printInvoice.css">--}}
    <style>
        html{
            background-color: whitesmoke;
            text-align: right;
        }
        body{
            -webkit-print-color-adjust:exact !important;
            print-color-adjust:exact !important;
        }
        @media print {
            @page {size: landscape;
                margin: 0;
            }
        }



    </style>
    <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body class="app ">
    <div class="flex mb-4">
        <h1 class="text-xl">
            SeaNovia
        </h1>
        <input class="button text-white bg-theme-6 shadow-md mr-2" type="button" value="پرینت / دانلود" onclick="printDiv('orderDetails')">
    </div>
    <hr>
    <div class="bg-light  container " id="orderDetails">
        <h1 class="w-full text-center text-xl mt-2">صورت حساب فروش </h1>
        <table class="w-full mt-5">
            <tbody class="">
            <tr class="grid grid-cols-12 w-full">
                <td class="col-span-11 border-2">
                    <div class=" h-full  p-2">
                        <div>
                            <table class="w-full">
                                <tbody>
                                    <tr  class=" mb-5">
                                        <td style="direction: rtl">
                                            ایمیل : www.seanoviashop@gmail.com
                                        </td>
                                        <td >
                                            فروشنده : فروشگاه اینترنتی سینویا
                                        </td>
                                        <td style="direction: rtl">
                                            آدرس سایت : www.seanovia.com
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="" >
                                            شماره تماس : 09124506654
                                        </td>
                                        <td class="">
                                            کد پستی : 12354152
                                        </td>
                                        <td class="" colspan="2">
                                            نشانی فروشگاه : تهران خیابان فلان کوچه فلان پلاک3 واحد 2
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td class="col-span-1 border-2 ">
                    <div class="bg-gray-300 h-full ">
                        <p class="w-full text-center">
                            مشخصات <br>فروشنده
                        </p>
                    </div>
                </td>
            </tr>
            <tr class="grid grid-cols-12 w-full" style="margin-top: 10px;">
                <td class="col-span-3 border-2">
                    <div class=" h-full  p-2">
                        <div>
                            <table class="w-full">
                                <tbody>
                                <tr  class=" mb-5" style="direction: rtl">
                                    <td style="text-align: left; font-size: small">
                                        {{$order->id}}
                                    </td>
                                    <td style="">
                                        شماره سفارش :
                                    </td>
                                </tr>
                                <tr></tr>
                                <tr  class=" mb-5" style="direction: rtl">
                                    <td style="text-align: left; font-size: small">
                                        {{jdate($order->updated_at)->format('%B %d، %Y')}}
                                    </td>
                                    <td style="">
                                        زمان ثبت نهایی سفارش:
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td class="col-span-8 border-2">
                    <div class=" h-full  p-2">
                        <div>
                            <table class="w-full">
                                <tbody>
                                <tr  class=" mb-5">
                                    <td >
{{--                                        ایمیل : www.seanoviashop@gmail.com--}}
                                    </td>

                                    <td >
{{--                                        آدرس سایت : www.seanovia.com--}}
                                    </td>
                                    <td >
                                        نام : {{$order->recipient_name}}
                                    </td>
                                </tr>

                                <tr class="">
                                    <td class="" >
                                        شماره تماس : {{$order->recipient_phone}}
                                    </td>
                                    <td class="">
                                        کد پستی : {{$order->address->postalCode}}
                                    </td>

                                    <td class="" colspan="2">
                                        نشانی : {{$order->address->province->name.', '. $order->address->county->name.', ' . $order->address->detail}}
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td class="col-span-1 border-2 ">
                    <div class="bg-gray-300 h-full ">
                        <p class="w-full text-center">
                            مشخصات <br>خریدار
                        </p>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <table class="w-full mt-5 text-center" style="direction: rtl">
            <tbody>
                <tr>
                    <th>
                        ردیف
                    </th>
                    <th>
                        شناسه محصول
                    </th>
                    <th>
                        شرح کالا
                    </th>
                    <th>
                        تعداد
                    </th>
                    <th>
                        مبلغ واحد
                    </th>
                    <th>
                        مبلغ کل (تومان)
                    </th>
                    <th>
                        تخفیف
                    </th>
                    <th>
                        مبلغ کل پس از تخفیف
                    </th>
                </tr>
                @php
                    $totalQuantity =0;
                    $totalUnitPrice = 0;
                    $totalPrice = 0 ;
                @endphp
                @foreach($order->products as $product)
                <tr style="line-height: 40px;">
                    <td class="border-2">
                        {{$loop->index+1}}
                    </td>
                    <td class="border-2">
                        {{$product->id}}
                    </td>
                    <td class="border-2">
                        {{$product->name}}
                    </td>
                    <td class="border-2">
                        {{$product->pivot->quantity}}
                    </td>
                    <td class="border-2">
                        {{number_format($product->pivot->price)}}
                    </td>
                    <td class="border-2">
                        {{number_format($product->pivot->price * $product->pivot->quantity) }}
                    </td>
                </tr>
                    @php
                        $totalQuantity += $product->pivot->quantity;
                        $totalUnitPrice += $product->pivot->price;
                        $totalPrice += $product->pivot->price * $product->pivot->quantity;
                    @endphp
                @endforeach
                <tr>
                    <td colspan="3" class="border-2" style="line-height: 30px;">
                        جمع کل
                    </td>
                    <td class="border-2">
                        {{$totalQuantity}}
                    </td>
                    <td class="border-2">
                        {{number_format($totalUnitPrice)}}
                    </td>
                    <td class="border-2">
                        {{number_format($totalPrice)}}
                    </td>
                </tr>
                <tr>
                    <td colspan="6" class="border-2 bg-gray-400" style="line-height: 30px;">
                        هزینه ارسال توسط {{$order->transportation->name}}
                    </td>
                    <td class="border-2 bg-gray-400" colspan="2">
                        @if(isset($order->transportation_cost) && $order->transportation_cost != 0 )
                            {{number_format($order->transportation_cost)}} تومان
                        @else
                        رایگان
                        @endif
                    </td>
                </tr>
                <tr>
                    </td>
                    <td colspan="6" class="border-2 bg-gray-400" style="line-height: 30px;">
                        هزینه نهایی
                    </td>
                    <td class="border-2 bg-gray-400" colspan="2">
                        {{number_format($order->final_cost)}} تومان
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="w-full mt-5">
            <tbody class="">
            <tr class="">
                <td>
                    <div class="h-full">
                        <table class="w-full h-full">
                            <tr class="grid grid-cols-12 w-full h-full">
                                <td class="col-span-9 border-2" >
                                    <div class=" h-full  p-2">
                                        <p style="line-height: 46px;">
                                            @if(isset($order->description))
                                                {{$order->description}}
                                            @else
                                            توضیحاتی برای این سفارش وجود ندارد
                                            @endif
                                        </p>
                                    </div>
                                </td>
                                <td class="col-span-3 border-2" >
                                    <div class="bg-gray-300 h-full ">
                                        <p class="w-full text-center h-full" style="line-height: 46px;">
                                           توضیحات سفارش
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>
                    <div>
                        <table class="w-full h-full">
                            <tr class="grid grid-cols-12 w-full">
                                <td class="col-span-9 border-2">
                                    <div class=" h-full  p-2">
                                        <div>
                                            <table class="w-full">
                                                <tbody>
                                                 @if(isset($order->tracking_serial) && $order->transportation->name = 'پست')
                                                <tr  class=" mb-5 rtl">
                                                    <td style="direction: rtl">
                                                            {{$order->tracking_serial}}
                                                    </td>
                                                    <td class=" w-full">
                                                        شماره پیگیری سفارش :
                                                    </td>
                                                </tr>
                                                @endif
                                                <tr class="rtl">
                                                    <td class="" >
                                                    </td>
                                                    <td class="">
                                                        درگاه پرداخت :
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </td>
                                <td class="col-span-3 border-2 ">
                                    <div class="bg-gray-300 h-full ">
                                        <p class="w-full text-center" style="line-height: 46px;">
                                           مشخصات خرید
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>

            </tr>
            </tbody>
        </table>
    </div>


<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
<script src="/Admin/js/app.js"></script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>
<!-- END: JS Assets-->
</body>
</html>
