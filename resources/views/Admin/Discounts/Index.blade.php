@section('css')

    @endsection
@section('content')
        <h2 class="intro-y text-lg font-medium mt-10">
            کدهای تخفیف ها
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5 rtl">

            <!-- BEGIN: Users Layout -->
            @foreach($discounts as $discount)
                <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 rtl">
                <div class="box">
                    <form action="{{route('discounts.edit',$discount)}}" >
                        @csrf
                    <div class="flex items-end px-5 pt-5 ">
                        <div class="w-full flex-justify-profile ">
                            <div class="w-28 h-16 image-fit">
                                <div class="dropdown relative mr-2">
                                    <div href="javascript:;" class="dropdown-toggle button px-2 box text-gray-700 ">
                                        <span class="w-5 h-5 flex items-center justify-center "> <i class=" fa fa-plus w-3 h-3" ></i> </span>
                                    </div>
                                    <div class="dropdown-box mt-10 absolute w-48 top-0 left-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            @if($discount->users->count() == 0)
                                                <a  id="usersbtn{{$discount->id}}"  href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> همه کاربران </a>
                                            @else
                                                <a  data-toggle="modal" id="usersbtn{{$discount->id}}" data-target="#usersList{{$discount->id}}" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"><i data-feather="users" class="w-4 h-4 mr-2"></i>)<span id="UsersCounter{{$discount->id}}">{{$discount->users->count()}}</span> لیست کاربران (</a>
                                            @endif

                                                @if($discount->products->count() == 0)
                                                    <a  id="productsbtn{{$discount->id}}"  href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="layers" class="w-4 h-4 mr-2"></i> همه محصولات </a>
                                                @else
                                                    <a  data-toggle="modal" id="productsbtn{{$discount->id}}" data-target="#productsList{{$discount->id}}" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="layers" class="w-4 h-4 mr-2"></i>)<span id="ProductsCounter{{$discount->id}}">{{$discount->products->count()}}</span> لیست محصول (</a>
                                                @endif

                                                @if($discount->categories->count() == 0)
                                                    <a  id="categoriesbtn{{$discount->id}}"  href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="archive" class="w-4 h-4 mr-2"></i> همه دسته بندی </a>
                                                @else
                                                    <a  data-toggle="modal" id="categoriesbtn{{$discount->id}}" data-target="#categoriesList{{$discount->id}}" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"><i data-feather="archive" class="w-4 h-4 mr-2"></i>)<span  id="CategoriesCounter{{$discount->id}}">{{$discount->categories->count()}}</span> لیست دسته بندی (</a>
                                                @endif

                                                @if($discount->brands->count() == 0)
                                                    <a  id="brandsbtn{{$discount->id}}"  href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="archive" class="w-4 h-4 mr-2"></i> همه برندها </a>
                                                @else
                                                    <a  data-toggle="modal" id="brandsbtn{{$discount->id}}" data-target="#brandsList{{$discount->id}}" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"><i data-feather="archive" class="w-4 h-4 mr-2"></i>)<span  id="BrandsCounter{{$discount->id}}">{{$discount->brands->count()}}</span> لیست برندها (</a>
                                                @endif

                                                @if($discount->transportations->count() == 0)
                                                    <a  id="transportationsbtn{{$discount->id}}"  href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="truck" class="w-4 h-4 mr-2"></i> همه حمل و نقل </a>
                                                @else
                                                    <a  data-toggle="modal" id="transportationsbtn{{$discount->id}}" data-target="#transportationsList{{$discount->id}}" href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"><i data-feather="truck" class="w-4 h-4 mr-2"></i>)<span  id="TransportationsCounter{{$discount->id}}">{{$discount->transportations->count()}}</span> لیست حمل و نقل (</a>
                                                @endif

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="w-full flex-reverse-start flex-row lg:flex-start ">
                            <div class="w-16 h-16 image-fit">
                                @if($discount->expired_at >= now())
                                    <div class="rounded-md bg-theme-9 text-white w-16 h-16 text-center items-center pt-3">درحال استفاده</div>
{{--                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($discount->gallery)->path)}}">--}}
                                @else
                                    <div class="rounded-md bg-theme-6 text-white w-16 h-16 text-center items-center pt-3">منقضی شده</div>
                                @endif
                            </div>
                            <div class="lg:mr-4 text-center lg:text-right mt-3 lg:mt-0 mr-2">
                                <a href="" class="font-medium">{{$discount->name}}</a>
                                <div class="text-gray-600 text-xl tooltipCopyCode" onmouseout="outFuncCopyToClipboard('myTooltip{{$discount->id}}','کپی کن !')" onclick="copyToClipboard('discountCode{{$discount->id}}','myTooltip{{$discount->id}}')"><span id="discountCode{{$discount->id}}">{{$discount->code}}</span><span class="tooltiptext text-xs" id="myTooltip{{$discount->id}}">کپی کن !</span></div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center lg:text-right p-5 rtl">
                        <div>
                            {{$discount->description}}
                        </div>
                        @if(isset($discount->percnt))
                        <div class="flex items-center justify-center lg:justify-end text-gray-600 mt-5">درصد تخفیف :
                            {{$discount->percent}}
                            <i data-feather="hexagon" class="w-3 h-3 ml-2"></i>
                        </div>
                        @endif
                        @if(isset($discount->price))
                            <div class="flex items-center justify-center lg:justify-end text-gray-600 mt-5">مبلغ تخفیف :
                                {{$discount->price}}
                                <i data-feather="hexagon" class="w-3 h-3 ml-2"></i>
                            </div>
                        @endif
                        <div class="flex items-center justify-center lg:justify-end text-gray-600 mt-1 rtl">    <span class="text-lg float-left">{{$discount->maxUse}}</span> <span class="text-teal-800">بیشینه تعداد استفاده :</span><i data-feather="users" class="w-3 h-3 ml-2"></i></div>
                        <div class="flex items-center justify-center lg:justify-end text-gray-600 mt-1 rtl">   <span class="text-lg">{{$discount->maxUserUsage}}</span>  <span class="text-teal-800">تعداد استفاده توسط هر کاربر :</span><i data-feather="user" class="w-3 h-3 ml-2"></i></div>
                        <div class=" flex items-center justify-center lg:justify-end text-gray-600 mt-1 rtl" >   <span class="text-lg">{{jdate($discount->expired_at)->ago()}}</span><span class="text-teal-800">تاریخ انقضا :</span><i data-feather="clock" class="w-3 h-3 ml-2 tooltip" title="{{jdate($discount->expired_at)}} تاریخ انقضا کد "></i></div>
                    </div>
                    <div class="text-center lg:text-right p-5 border-t border-gray-200">
                        <button type="submit" class="button button--sm text-white bg-theme-1 mr-2">ویرایش</button>
                        <a data-toggle="modal" id="submit" data-target="#DiscountDelete{{$discount->id}}" class="button button--sm text-gray-700 border border-gray-300">حذف </a>
                    </div>
                </form>
                </div>
            </div>

            @endforeach
            <!-- END: Users Layout -->
            <!-- BEGIN: Pagination -->

            <div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex -row sm:flex-no-wrap items-center ">
                {{--                                {{$discounts->links()}}--}}
                @include('Pagination.Admin', ['paginator' => $discounts,'route' => 'discounts'])
            </div>
            <!-- END: Pagination -->
        </div>
@foreach($discounts as $discount)
    {{--    DELETE Discount--}}
    @can('delete-discount')
        <div class="modal" id="DiscountDelete{{$discount->id}}">
            <div class="modal__content">
                <form action="{{route('discounts.destroy',$discount)}}" method="post" >
                    @csrf
                    @method('DELETE')
                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">حذف کد تخفیف  <span style="color: darkred">{{$discount->name}}</span></div>
                        {{--                        <div class="mt-3 ">--}}
                        {{--                            <div class="mt-2  flex" data-theme="light">--}}
                        {{--                                <p>حذف به همراه زیر دستهf ها </p>--}}
                        {{--                                <input type="checkbox" class="tooltip input input--switch border" value="1" name="DeleteAll" title="با انتخاب این گزینه تمامی زیر دسته های این برند نیز حذف خواهد شد "> </div>--}}
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
    @can('show-discounts')
        <div class="modal" id="usersList{{$discount->id}}">
            <div class="modal__content modal__content--xl" >

                    <div class="grid grid-cols-12 gap-6 mt-5 rtl">
                        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                            <button disabled class="button text-white bg-theme-1 shadow-md mr-2">افزودن به لیست</button>
                        </div>
                        <!-- BEGIN: Users Layout -->
                        @foreach($discount->users as $user)
                        <div class="intro-y col-span-12 md:col-span-6 mb-2" id="userslist{{$user->id}}">
                            <div class="box">
                                <div class="flex flex-col lg:flex-row items-center p-5">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="{{$user->username}}" class="rounded-full" src="{{str_replace('public','/storage',$user->gallery->path)}}">
                                    </div>
                                    <div class="lg:mr-2 lg:ml-auto text-center lg:text-right mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{$user->username}}</a>
                                        <div class="text-gray-600 text-xs">{{$user->firstName}} {{$user->lastName}}</div>
                                    </div>
                                    <div class="flex mt-4 lg:mt-0">
                                        <button onclick="deleteUserDiscount(event,{{$user->id}},{{$discount->id}})" class="button button--sm text-white bg-theme-6 mr-2">حذف از لیست</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- BEGIN: Users Layout -->
                    </div>
            </div>

        </div>
        <div class="modal" id="productsList{{$discount->id}}">
            <div class="modal__content modal__content--xl">

                <div class="grid grid-cols-12 gap-6 mt-5 rtl">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                        <button disabled class="button text-white bg-theme-1 shadow-md mr-2">افزودن به لیست</button>
                    </div>
                    <!-- BEGIN: Users Layout -->
                    @foreach($discount->products as $product)
                        <div class="intro-y col-span-12 md:col-span-6 mb-2" id="productslist{{$product->id}}">
                            <div class="box">
                                <div class="flex flex-col lg:flex-row items-center p-5">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="{{$product->name}}" class="rounded-full" src="{{str_replace('public','/storage',$product->gallery->path)}}">
                                    </div>
                                    <div class="lg:mr-2 lg:ml-auto text-center lg:text-right mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{$product->name}}</a>
                                        <div class="text-gray-600 text-xs">{{$product->nickName}}</div>
                                    </div>
                                    <div class="flex mt-4 lg:mt-0">
                                        <button onclick="deleteProductDiscount(event,{{$product->id}},{{$discount->id}})" class="button button--sm text-white bg-theme-6 mr-2">حذف از لیست</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- BEGIN: Users Layout -->
                </div>
            </div>

        </div>
        <div class="modal" id="categoriesList{{$discount->id}}">
            <div class="modal__content modal__content--xl">

                <div class="grid grid-cols-12 gap-6 mt-5 rtl">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                        <button disabled class="button text-white bg-theme-1 shadow-md mr-2">افزودن به لیست</button>
                    </div>
                    <!-- BEGIN: Users Layout -->
                    @foreach($discount->categories as $category)
                        <div class="intro-y col-span-12 md:col-span-6 mb-2" id="categorieslist{{$category->id}}">
                            <div class="box">
                                <div class="flex flex-col lg:flex-row items-center p-5">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="{{$category->name}}" class="rounded-full" src="{{str_replace('public','/storage',$category->gallery->path)}}">
                                    </div>
                                    <div class="lg:mr-2 lg:ml-auto text-center lg:text-right mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{$category->name}}</a>
                                        <div class="text-gray-600 text-xs">{{$category->meta}}</div>
                                    </div>
                                    <div class="flex mt-4 lg:mt-0">
                                        <button onclick="deleteCategoryDiscount(event,{{$category->id}},{{$discount->id}})" class="button button--sm text-white bg-theme-6 mr-2">حذف از لیست</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- BEGIN: Users Layout -->
                </div>
            </div>

        </div>
        <div class="modal" id="brandsList{{$discount->id}}">
            <div class="modal__content modal__content--xl">

                <div class="grid grid-cols-12 gap-6 mt-5 rtl">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                        <button disabled class="button text-white bg-theme-1 shadow-md mr-2">افزودن به لیست</button>
                    </div>
                    <!-- BEGIN: Users Layout -->
                    @foreach($discount->brands as $brand)
                        <div class="intro-y col-span-12 md:col-span-6 mb-2" id="brandslist{{$brand->id}}">
                            <div class="box">
                                <div class="flex flex-col lg:flex-row items-center p-5">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="{{$brand->name}}" class="rounded-full" src="{{str_replace('public','/storage',$brand->gallery->path)}}">
                                    </div>
                                    <div class="lg:mr-2 lg:ml-auto text-center lg:text-right mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{$brand->name}}</a>
                                        <div class="text-gray-600 text-xs">{{$brand->tag}}</div>
                                    </div>
                                    <div class="flex mt-4 lg:mt-0">
                                        <button onclick="deleteBrandDiscount(event,{{$brand->id}},{{$discount->id}})" class="button button--sm text-white bg-theme-6 mr-2">حذف از لیست</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- BEGIN: Users Layout -->
                </div>
            </div>

        </div>
        <div class="modal" id="transportationsList{{$discount->id}}">
            <div class="modal__content modal__content--xl">

                <div class="grid grid-cols-12 gap-6 mt-5 rtl">
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
                        <button disabled class="button text-white bg-theme-1 shadow-md mr-2">افزودن به لیست</button>
                    </div>
                    <!-- BEGIN: Users Layout -->
                    @foreach($discount->transportations as $transportation)
                        <div class="intro-y col-span-12 md:col-span-6 mb-2" id="transportationslist{{$transportation->id}}">
                            <div class="box">
                                <div class="flex flex-col lg:flex-row items-center p-5">
                                    <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                        <img alt="{{$transportation->name}}" class="rounded-full" src="{{str_replace('public','/storage',$transportation->gallery->path)}}">
                                    </div>
                                    <div class="lg:mr-2 lg:ml-auto text-center lg:text-right mt-3 lg:mt-0">
                                        <a href="" class="font-medium">{{$transportation->name}}</a>
                                        <div class="text-gray-600 text-xs">{{$transportation->eng_name}}</div>
                                    </div>
                                    <div class="flex mt-4 lg:mt-0">
                                        <button onclick="deleteTransportationDiscount(event,{{$transportation->id}},{{$discount->id}})" class="button button--sm text-white bg-theme-6 mr-2">حذف از لیست</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- BEGIN: Users Layout -->
                </div>
            </div>

        </div>
    @endcan
@endforeach

@endsection

@section('js')
    <script src="/Admin/js/DiscountAjax.js"></script>
@endsection
@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >کدهای تخفیف</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
