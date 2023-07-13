
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />
    <link rel="stylesheet" href="/Admin/css/GalleryFileUploader.css" />


@endsection

@section('content')
    <div class="pos intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-12">
            <h2 class="intro-y text-lg font-medium mt-10 flex">
                ویرایش کد تخفیف {{$discount->name}}            </h2>
            <p class="intro-y text-xs font-medium  flex mb-5 " style="color: #4a5568">برای ویرایش {{$discount->name}} فیلد های مورد نظر را پر کرده و در نهایت اطلاعات را ذخیره کنید</p>
            <hr>
        </div>
        {{--Begin new Category--}}

        <div class="col-span-12 lg:col-span-12">
            <form action="{{route('discounts.update',$discount)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <div class="pos__tabs nav-tabs justify-center flex">
                            <a data-toggle="tab" data-target="#Specifications" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">مشخصات کلی</a>
                            <a data-toggle="tab" data-target="#description" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-content__pane active" id="Specifications">
                        <div class="pos__ticket box p-2 mt-5">
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                    <p> در این قسمت مشخصات کلی {{$discount->name}}  را انتخاب کنید</p>
                                </div>
                                <div class="p-5 " id="input">
                                    <div class="preview grid-rtl grid-cols-12">
                                        <div class="col-span-4 ml-2">
                                            <label for="name"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام کد تخفیف</label>
                                            <input name="name" id="name" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام" value="{{$discount->name}}">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label for="code"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>کد تخفیف </label>
                                            <input name="code" id="code" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="کد تخفیف" value="{{$discount->code}}">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label for="percent"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>درصد تخفیف</label>
                                            <input name="percent" id="percent" type="number" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="درصد تخفیف" value="{{$discount->percent}}">

                                        </div>
                                        <div class=" ml-2 col-span-4 mt-2">
                                            <label for="price"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>مبلغ تخفیف</label>
                                            <input name="price" id="price" type="number" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="مبلغ تخفیف" value="{{$discount->price}}">
                                        </div>
                                        <div class=" ml-2 col-span-4 mt-2">
                                            <label for="maxUse"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>تعداد استفاده  </label>
                                            <input name="maxUse" id="maxUse" type="number" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="تعداد استفاده " value="{{$discount->maxUse}}">
                                        </div>
                                        <div class=" ml-2 col-span-4 mt-2">
                                            <label for="maxUserUsage"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>تعداد استفاده توسط کاربر  </label>
                                            <input name="maxUserUsage" id="maxUserUsage" type="number" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="تعداد استفاده توسط کاربر " value="{{$discount->maxUserUsage}}">
                                        </div>
                                        <div class=" ml-2 col-span-4 mt-2">
                                            <label for="maxCost"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>سقف تخفیف  </label>
                                            <input name="maxCost" id="maxCost" type="number" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="سقف تخفیف " value="{{$discount->maxCost}}">
                                        </div>
                                        <div class=" ml-2 col-span-4 mt-2 " style="direction: ltr !important;">
                                            <label for="expired_at"><i data-feather="clock" class="w-4 h-4 float-right ml-2 text-blue-400"></i>تاریخ انقضا  </label>
{{--                                            <input data-timepicker="true" class="datepicker input w-full border block mx-auto mt-2"  name="expired_at">--}}
                                            <input type="datetime-local" style="direction: ltr !important;" class=" input w-full border block mx-auto mt-2" id="expired_at" name="expired_at" value="{{old('expired_at',\Carbon\Carbon::parse($discount->expired_at)->format('Y-m-d\TH:i:s'))}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="tab-content__pane" id="description">
                        <div class="box p-5 mt-5">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 bg-indigo-100">
                                        <p> توضیحات {{$discount->name}} را در کادر زیر وارد کنید</p>
                                    </div>
                                    <div class="p-5" id="simple-editor">
                                        <div class="preview">
                                            <textarea data-feature=""  class="summernote rtl "  name="description" placeholder="توضیحات کد تخفیف">{{$discount->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="flex mt-5">
                    <button   class="button w-32 border shadow-md mr-1 mb-2 bg-gray-200 text-gray-600 ml-2">انصراف</button>
                    <input   type="submit"  name="submit"  value="ذخیره اطلاعات" class="button w-32 text-white bg-theme-1 shadow-md shadow-md mr-1 mb-2 bg-theme-1 text-white ml-auto">
                </div>
            </form>
        </div>

    </div>
@endsection


@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" disabled >ایجاد کد تخفیف</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('discounts.index')}}" class="breadcrumb--active" >کد تخفیف ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
