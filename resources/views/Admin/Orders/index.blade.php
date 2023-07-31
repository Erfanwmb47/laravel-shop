@section('content')
    <h2 class="intro-y text-lg font-medium mt-10 rtl">
        لیست سفارشات
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class=" z-50   col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-50 rtl">
                    <div class="dropdown-box__content box p-2">
                        <a href="{{route('orders.index')}}" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 ml-2"></i> همه </a>
                        <a href="{{route('orders.index',['status'=>'unpaid'])}}" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-theme-17 text-theme-11 hover:bg-gray-200 rounded-md mt-1 "> <i data-feather="file-text" class="w-4 h-4 ml-2"></i> پرداخت نشده ها </a>
                        <a href="{{route('orders.index',['status'=>'paid'])}}" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-theme-14 text-theme-10 hover:bg-gray-200 rounded-md mt-1"> <i data-feather="file-text" class="w-4 h-4 ml-2"></i> پرداخت شده ها </a>
                        <a href="{{route('orders.index',['status'=>'preparation'])}}" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-theme-7 text-theme-2 hover:bg-gray-200 hover:text-gray-900 rounded-md mt-1"> <i data-feather="file-text" class="w-4 h-4 ml-2"></i> درحال آماده سازی </a>
                        <a href="{{route('orders.index',['status'=>'posted'])}}" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-theme-18 text-theme-32 hover:bg-gray-200 rounded-md mt-1"> <i data-feather="file-text" class="w-4 h-4 ml-2"></i> ارسال شده ها</a>
                        <a href="{{route('orders.index',['status'=>'received'])}}" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-theme-33 text-theme-2 hover:bg-gray-200  hover:text-blue-900 rounded-md mt-1"> <i data-feather="file-text" class="w-4 h-4 ml-2"></i> دریافت شده ها</a>
                        <a href="{{route('orders.index',['status'=>'canceled'])}}" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-theme-31 text-theme-6 hover:bg-gray-200 rounded-md mt-1"> <i data-feather="file-text" class="w-4 h-4 ml-2"></i> لغو شده ها</a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700">
                    <form>
                        <input type="hidden" name="status" value="{{request('status')}}">
                        <input type="text"   name="search" class="input w-56 box pr-10 placeholder-theme-13 rtl" placeholder="جست و جو ..." value="{{request('search')}}">
                        <button type="submit" class=" absolute my-auto inset-y-0 mr-3 right-0 foc"><i class="w-4 h-4" data-feather="search"></i></button>
                    </form>
                </div>
            </div>
        </div>

        <!-- START: Query URL -->
        <div class="intro-y rtl col-span-12 flex-reverese-end flex-wrap sm:flex-no-wrap items-center mt-2  border-gray-200">
            <div class="flex-justify-start flex-col lg:flex-row">
                @foreach($query as $key=>$value)
                    @if(is_array($value))
                        @foreach($value as $k=>$v)
                            <div class="button pointer-events-none flex justify-center  border shadow-md  mb-2 bg-gray-200 text-gray-600 ml-2">
                                <a  href="{{str_replace($key.'[]='.$v,'',request()->getRequestUri())}}" class="pointer-events-auto">
                                    <i data-feather="x" class="h-4 w-4 mr-2"></i></a>{{__('query.'.$key)}} : {{__('query.'.$v)}}</div>
                        @endforeach
                    @else
                        <div class="button pointer-events-none flex justify-center  border shadow-md  mb-2 bg-gray-200 text-gray-600 ml-2">
                            <a  href="{{str_replace($key.'='.$value,'',request()->getRequestUri())}}" class="pointer-events-auto">
                                <i   data-feather="x" class="h-4 w-4 mr-2"></i></a>{{__('query.'.$key)}} : {{__('query.'.$value)}}</div>
                    @endif
                @endforeach
            </div>
        </div>
        <!-- END: Query URL -->

        <!-- BEGIN: Data List -->
        <div class="col-span-12 mt-6">
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">

                <table class="table table-report sm:mt-2">
                    <thead>
                    <tr>
                        <th class="flex  text-center whitespace-no-wrap">جزئیات
                        </th>
                        <th class="text-center whitespace-no-wrap">تاریخ سفارش</th>
                        <th class="text-center whitespace-no-wrap">مبلغ سفارش</th>
                        <th class="whitespace-no-wrap text-center">وضعیت سفارش</th>
                        <th class="whitespace-no-wrap text-center">شماره پیگیری</th>
                        <th class="whitespace-no-wrap text-right">مشخصات گیرنده
                            @if((request()->query('chevron') == 'descending' && request()->query('order_by') == 'username'))
                                <a href="{{request()->fullUrlWithQuery(['chevron' => 'ascending','order_by'=> 'username'])}}"> <i data-feather="chevron-down" class="w-4 h-4 float-left"></i></a>
                            @else
                                <a href="{{request()->fullUrlWithQuery(['chevron' => 'descending','order_by'=> 'username'])}}"> <i data-feather="chevron-up" class="w-4 h-4 float-left"></i></a>
                            @endif
                        </th>
                        <th class="whitespace-no-wrap text-center ">تصویر</th>
                        <th class="whitespace-no-wrap text-right ">ردیف
                            @if((request()->query('chevron') == 'descending' && request()->query('order_by') == 'id'))
                                <a href="{{request()->fullUrlWithQuery(['chevron' => 'ascending','order_by'=> 'id'])}}"> <i data-feather="chevron-down" class="w-4 h-4 float-left"></i></a>
                            @else
                                <a href="{{request()->fullUrlWithQuery(['chevron' => 'descending','order_by'=> 'id'])}}"> <i data-feather="chevron-up" class="w-4 h-4 float-left"></i></a>
                            @endif
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders  as $order)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex justify-center items-center">
                                    <a href="{{route('orders.detail',$order)}}" class=" tooltip flex items-center "  title="جزئیات سفارش"> <i data-feather="file-text" class="w-4 h-4 ml-1 "></i> </a>
                                    <a  class=" tooltip flex items-center "  title="حذف سفارش" data-toggle="modal" id="submit" data-target="#OrderDelete{{$order->id}}"> <i data-feather="trash" class="w-4 h-4 ml-1 text-red-500 mr-3"></i> </a>
                                    <a  href="{{route('orders.edit',$order)}}" class=" tooltip flex items-center "  title="ویرایش" id="submit" > <i data-feather="edit-3" class="w-4 h-4 ml-1 text-blue-600 mr-3"></i> </a>
                                    <a href="{{route('orders.invoice',$order)}}" class=" tooltip flex items-center "  title="چاپ فاکتور"> <i data-feather="printer" class="w-4 text-green-600 h-4 ml-1 mr-3 "></i> </a>

                                @if(isset($order->note))
                                    <p  class=" tooltip flex items-center "  title="{{$order->note}}"  > <i data-feather="tag" class="w-4 h-4 ml-1 text-red-500 mr-3"></i> </p>
                                    @endif
                                </div>
                            </td>
                            <td class="w-40">
                                <div class="flex items-center justify-center text-theme-10">
                                    {{jdate($order->created_at)->format('Y / m / d')}}
                                </div>
                            </td>
                            <td class="text-center"><span class="float-left">تومان </span>{{number_format($order->final_cost)}}</td>
                            <td class="text-center">
                                    @php
                                    $h = order_status($order->status);
//                                  @endphp
{{--                                <a class="button w-30 rounded-full mr-1 mb-2  {{$h[1]}} text-xs " style="display: block">{{$h[0]}}</a>--}}
                                <div class="dropdown relative">
                                    <button class="dropdown-toggle button inline-block {{$h[1]}} text-white" id="payment_status{{$order->id}}">{{$h[0]}}</button>
                                    <div class="dropdown-box mt-12 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box">
                                            <div class="px-4 py-2 border-b border-gray-200 font-medium">حالت های پرداخت  </div>
                                            <div class="p-2 rtl">
                                                <a onclick="changeStatusPaymentAdmin(event,'{{$order->id}}','unpaid')" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="printer" class="w-4 h-4 text-gray-700 ml-2"></i> پرداخت نشده </a>
                                                <a onclick="changeStatusPaymentAdmin(event,'{{$order->id}}','paid')" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="external-link" class="w-4 h-4 text-gray-700 ml-2"></i> پرداخت شده </a>
                                                <a onclick="changeStatusPaymentAdmin(event,'{{$order->id}}','preparation')" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 text-gray-700 ml-2"></i> درحال آماده سازی </a>
                                                <a onclick="changeStatusPaymentAdmin(event,'{{$order->id}}','posted')" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="archive" class="w-4 h-4 text-gray-700 ml-2"></i> ارسال شده </a>
                                                <a onclick="changeStatusPaymentAdmin(event,'{{$order->id}}','received')" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 text-gray-700 ml-2"></i> دریافت شده </a>
                                                <a onclick="changeStatusPaymentAdmin(event,'{{$order->id}}','canceled')" class="flex-reverse-start items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="archive" class="w-4 h-4 text-gray-700 ml-2"></i> لغو شده </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="text-center">
                                <span class="flex">
                               @if(isset($order->tracking_serial))
                                        <div class=" tooltipCopyCode" onmouseout="outFuncCopyToClipboard('myTooltip{{$order->id}}','کپی کن !')" onclick="copyToClipboard('trackingSerialSpan{{$order->id}}','myTooltip{{$order->id}}')">
                                      <marquee direction="left" hspace="20" behavior="alternate" scrollamount="1" id="trackingSerialSpan{{$order->id}}" class="w-20 overflow-hidden">{{$order->tracking_serial}}</marquee>
                                        <span class="tooltiptext text-xs" id="myTooltip{{$order->id}}">کپی کن !</span>
                                    </div>
                                   <a href="javascript:; " data-toggle="modal" id="tracking_serial" data-target="#OrderTrackingSerial{{$order->id}}" ><i data-feather="edit" class="w-4 h-4 ml-1 text-blue-600 mr-3"></i></a>
                                @endif
                                </span>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-no-wrap flex-justify-start">{{$order->recipient_name}}</a>
                                <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-start">{{$order->recipient_phone}} </div>
                            </td>
                            {{--                                @dd($order->products[0]->gallery->path)--}}
                            {{--                                @dd($orders->first()->products[0]->gallery->path)--}}
                            <td class="w-40 ">
                                <div class=" flex-justify-center ">
                                    @if(isset($order->products) && $order->products->count() > 3)
                                        <div class="w-10 h-10   bg-white rounded-full ">
                                            <p class="rounded-full pt-3 ml-2 text-theme-32 text-xs"> + {{$order->products->count() - 3}}</p>
                                        </div>
                                    @endif
                                    @if(isset($order->products[2]))
                                        <div class="w-10 h-10 image-fit zoom-in  bg-white rounded-full ">
                                            <img  alt="{{$order->products[2]->gallery->alt}}" class="tooltip rounded-full" src="{{str_replace('public','/storage',optional($order->products[2]->gallery)->path)}}" title="{{$order->products[2]->name}}">
                                        </div>
                                    @endif
                                    @if(isset($order->products[1]))
                                        <div class="w-10 h-10 image-fit zoom-in -mr-3 bg-white rounded-full ">
                                            <img alt="{{$order->products[1]->gallery->alt}}" class="tooltip rounded-full" src="{{str_replace('public','/storage',optional($order->products[1]->gallery)->path)}}" title="{{$order->products[1]->name}}">
                                        </div>
                                    @endif
                                    <div class="w-10 h-10 image-fit zoom-in -mr-3 bg-white rounded-full ">
                                        <img alt="{{$order->products[0]->gallery->alt}}" class="tooltip rounded-full" src="{{str_replace('public','/storage',optional($order->products[0]->gallery)->path)}}" title="{{$order->products[0]->name}}">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-no-wrap flex-justify-center text-center">{{$loop->index+1}}</a>
                            </td>
                        </tr>
                        {{--                        </form>--}}
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex-row sm:flex-no-wrap items-center ">
                        @include('Pagination.Admin', ['paginator' => $orders,'route' => 'orders'])
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    @foreach($orders as $order)
        @can('delete-order')
            <div class="modal" id="OrderDelete{{$order->id}}">
                <div class="modal__content">
                    <form action="{{route('orders.destroy',$order->id)}}" method="post" >
                        @csrf
                        @method('DELETE')

                        <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                            <div class="text-3xl mt-5">حذف سفارش  <span style="color: darkred">{{$order->id}}</span></div>
                            {{--                        <div class="mt-3 ">--}}
                            {{--                            <div class="mt-2  flex" data-theme="light">--}}
                            {{--                                <p>حذف به همراه زیر دستهf ها </p>--}}
                            {{--                                <input type="checkbox" class="tooltip input input--switch border" value="1" name="DeleteAll" title="با انتخاب این گزینه تمامی زیر دسته های این سفارش نیز حذف خواهد شد "> </div>--}}
                            {{--                        </div>--}}
                        </div>
                        <div class="px-5 pb-8 text-center">
                            <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">انصراف</button>
                            <button type="submit" class="button w-24 bg-theme-6 text-white">حذف</button>
                        </div>
                    </form>
                </div>

            </div>
        @endcan
        @can('edit-order')
            <div class="modal" id="OrderTrackingSerial{{$order->id}}">
                    <div class="modal__content">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                            <h2 class="font-medium text-center w-full mr-auto">ویرایش شماره پیگیری سفارش</h2>
                        </div>
                        <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                            <div class="col-span-12 sm:col-span-12 text-center ">
                                <label class="font-medium text-right w-full mr-auto">شناسه پرداخت</label>
                                <input id="tracking_serialInput{{$order->id}}" type="text" class="input text-center w-full border mt-2 flex-1" name="tracking_serial" placeholder="شناسه پرداخت " value="{{$order->tracking_serial}}"> </div>
                        </div>
                        <div class="px-5 py-3 text-right border-t border-gray-200">
                            <button type="button" class="button w-20 border text-gray-700 mr-1">انصراف</button>
                            <button type="button" class="button w-20 bg-theme-1 text-white" onclick="changeTrackingSerial(event,{{$order->id}},)">تایید</button>
                        </div>
                    </div>


            </div>
        @endcan
    @endforeach
@endsection
@section('js')
    <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByClassName('marked');
            for(var i=0, n=checkboxes.length;i<n;i++) {
                checkboxes[i].checked = source.checked;
                multidelete(source);
            }
        }
        $("#deleteAll").hide();
        function multidelete(source) {
            ggs = document.getElementsByClassName('marked');
            for(var i=0, n=ggs.length;i<n;i++) {
                $("#deleteAll").hide();
                if(ggs[i].checked) {
                    $("#deleteAll").show();
                    break;
                }
            }
        }


    </script>
@endsection

@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >سفارشات</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
