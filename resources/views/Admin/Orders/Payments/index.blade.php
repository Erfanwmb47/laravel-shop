
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />
@endsection

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
            <h2 class="intro-y text-lg font-medium mr-auto mt-2">
                لیست پرداختی ها
            </h2>
            <!-- BEGIN: Inbox Menu -->
            <div class="intro-y box bg-theme-1 p-5 mt-6">
                <button type="button" class="button button--lg flex items-center justify-center text-gray-700 w-full bg-white mt-2"> <i class="w-4 h-4 mr-2" data-feather="edit-3"></i> Compose </button>
                <div class="border-t border-theme-3 mt-6 pt-6 text-white rtl">
                    <form action="{{route('financial.paymentsHistory.index')}}" method="post" class="flex items-center px-3 py-2 rounded-md  font-medium @if(!side_menu_active(['dashboard/financial/payment/history/success','dashboard/financial/payment/history/failed'],'bg-theme-22')) bg-theme-22 @endif">
                        @csrf
                        <button class="w-full foc flex">  <i class="w-4 h-4 ml-2 float-right" data-feather="mail"></i> همه پرداختی ها </button>
                    </form>
                    <form method="post" action="{{route('PaymentHistory.index.success')}}" class="flex items-center px-3 py-2 mt-2 rounded-md {{side_menu_active('dashboard/financial/payment/history/success','bg-theme-22')}}">
                        @csrf
                        <button class="w-full foc flex"><i class="w-4 h-4 mr-2" data-feather="smile"></i> پرداخت های موفق </button></form>
                    <form method="post" action="{{route('PaymentHistory.index.failed')}}" class="flex items-center px-3 py-2 mt-2 rounded-md {{side_menu_active('dashboard/financial/payment/history/failed','bg-theme-22')}}">
                        @csrf
                        <button class="w-full foc flex"><i class="w-4 h-4 ml-2" data-feather="frown"></i> پرداخت های ناموفق </button></form>
                                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="send"></i> Sent </a>
                                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="trash"></i> Trash </a>
                </div>
                <div class="border-t border-theme-3 mt-5 pt-5 text-white">
                    <a href="" class="flex items-center px-3 py-2 truncate">
                        <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                        Custom Work
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                        <div class="w-2 h-2 bg-theme-9 rounded-full mr-3"></div>
                        Important Meetings
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                        <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                        Work
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                        <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                        Design
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                        <div class="w-2 h-2 bg-theme-6 rounded-full mr-3"></div>
                        Next Week
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate"> <i class="w-4 h-4 mr-2" data-feather="plus"></i> Add New Label </a>
                </div>
            </div>
            <!-- END: Inbox Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
            <!-- BEGIN: Inbox Filter -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
                <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                    <form>
                        <input type="text"   name="search" class="input w-56 box pr-10 placeholder-theme-13 rtl" placeholder="جست و جو ..." value="{{request('search')}}">
                        <button type="submit" class=" absolute my-auto inset-y-0 mr-3 right-0 foc"><i class="w-4 h-4" data-feather="search"></i></button>
                    </form>
                </div>
                <div class="w-full sm:w-auto flex">
                    <button class="button text-white bg-theme-1 shadow-md mr-2">Start a Video Call</button>
                    <div class="dropdown relative">
                        <button class="dropdown-toggle button px-2 box text-gray-700">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                        </button>
                        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                            <div class="dropdown-box__content box p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Contacts </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Inbox Filter -->
            <!-- BEGIN: Inbox Content -->
            <div class="intro-y inbox box mt-5">
                <div class="p-5  sm:flex-row text-gray-600 border-b border-gray-200  ">
                    <div class=" flex-justify-profile items-center mt-3 sm:mt-0 border-t sm:border-0 border-gray-200 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0 ">
                        <input class="input border border-gray-500 float-right ml-3" type="checkbox">

                        <div>شماره سفارش</div>
                        <div>شناسه پرداخت</div>
                        <div>وضعیت پرداخت</div>
                        <div>زمان ثبت</div>
                        {{--                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="refresh-cw"></i> </a>--}}
                        {{--                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="more-horizontal"></i> </a>--}}
                    </div>
                </div>
                <div class="overflow-x-auto sm:overflow-x-visible">
                    @if(!!count($payments))
                        @foreach($payments as $payment)
                            <div class="{{$payment->status ? 'bg-theme-14' : 'bg-theme-31' }} p-5  sm:flex-row   inbox__item  inline-block sm:block ">
                                <div class=" flex-justify-profile items-center mt-3 sm:mt-0 border-t sm:border-0 border-gray-200 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0 ">
                                    <input class="input border border-gray-500 float-right ml-3" type="checkbox">
                                    <div>{{$payment->order->id}}</div>
                                    <div>{{$payment->resNumber}}</div>
                                    <div>{{$payment->status ? 'موفق' : 'ناموفق'}}</div>
                                    <div class="rtl">{{$payment->created_at->ago()}}</div>
                                </div>
                            </div>

                        @endforeach
                    @else
                        <div class="text-center items-center">
                            لیست پرداختی خالی است
                        </div>
                    @endif
                </div>
                <div class="p-5 flex flex-col sm:flex-row items-center text-center sm:text-left text-gray-600">
                    {{--                <div>4.41 GB (25%) of 17 GB used Manage</div>--}}
                    {{--                <div class="sm:ml-auto mt-2 sm:mt-0">Last account activity: 36 minutes ago</div>--}}
                    @include('Pagination.Admin', ['paginator' => $payments,'route' => 'financial.paymentsHistory'])
                </div>
            </div>
            <!-- END: Inbox Content -->
        </div>
    </div>

@endsection
@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" disabled >لیست پرداختی</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('orders.index')}}" class="breadcrumb--active" >سفارشات</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
