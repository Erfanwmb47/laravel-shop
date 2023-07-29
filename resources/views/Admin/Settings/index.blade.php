@section('content')
    <div class="grid grid-cols-12 gap-6 rtl">
        <!-- BEGIN: Profile Menu -->
        <div class="col-span-12 lg:col-span-4 xxl:col-span-3 flex lg:block flex-col-reverse">
            <div class="intro-y box mt-5">
                <div class="p-5 border-t border-gray-200">
                    <a class="flex-reverse-start items-center text-theme-1 font-medium" href=""> <i data-feather="activity" class="w-4 h-4 ml-2"></i> Personal Information </a>
                    <a class="flex-reverse-start items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 ml-2"></i> Account Settings </a>
                    <a class="flex-reverse-start items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 ml-2"></i> Change Password </a>
                    <a class="flex-reverse-start items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 ml-2"></i> User Settings </a>
                </div>
                <div class="p-5 border-t border-gray-200">
                    <a class="flex-reverse-start items-center" href=""> <i data-feather="activity" class="w-4 h-4 ml-2"></i> Email Settings </a>
                    <a class="flex-reverse-start items-center mt-5" href=""> <i data-feather="box" class="w-4 h-4 ml-2"></i> Saved Credit Cards </a>
                    <a class="flex-reverse-start items-center mt-5" href=""> <i data-feather="lock" class="w-4 h-4 ml-2"></i> Social Networks </a>
                    <a class="flex-reverse-start items-center mt-5" href=""> <i data-feather="settings" class="w-4 h-4 ml-2"></i> Tax Information </a>
                </div>
                <div class="p-5 border-t flex">
                    <button type="button" class="button button--sm block bg-theme-1 text-white">New Group</button>
                    <button type="button" class="button button--sm border text-gray-700 ml-auto">New Quick Link</button>
                </div>
            </div>
        </div>
        <!-- END: Profile Menu -->
        <div class="col-span-12 lg:col-span-8 xxl:col-span-9">
            <!-- BEGIN: Display Information -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200">
                    <h2 class="font-medium text-base ml-auto">
                        اطلاعات سایت
                    </h2>
                </div>
                <div class="p-5">
                    <form method="post" enctype="multipart/form-data" name="" action="{{route('admin.setting.update')}}">
                        @csrf
                        @method('PATCH')
                    <div class="grid grid-cols-12 gap-5">

                        <div class="col-span-12 xl:col-span-4">
                            <div class="border border-gray-200 rounded-md p-5">
                                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-11.jpg">
                                    <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                </div>
                                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="button w-full bg-theme-1 text-white">ویرایش لوگو سایت</button>
                                    <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                </div>
                            </div>
                            <div class="border border-gray-200 rounded-md p-5 mt-2">
                                <div class="w-40 h-40 relative image-fit cursor-pointer zoom-in mx-auto">
                                    <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="dist/images/profile-11.jpg">
                                    <div title="Remove this profile photo?" class="tooltip w-5 h-5 flex items-center justify-center absolute rounded-full text-white bg-theme-6 right-0 top-0 -mr-2 -mt-2"> <i data-feather="x" class="w-4 h-4"></i> </div>
                                </div>
                                <div class="w-40 mx-auto cursor-pointer relative mt-5">
                                    <button type="button" class="button w-full bg-theme-1 text-white">ویرایش فویکن سایت</button>
                                    <input type="file" class="w-full h-full top-0 left-0 absolute opacity-0">
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-8">
                            <div>
                                <label>نام سایت</label>
                                <div class="grid grid-cols-12">
                                <input type="text" name="shop_english_name" class="col-span-6 input w-full  border mt-2" placeholder="نام انگلیسی را وارد کنید" value="{{$shop_name->English_name}}">
                                <input type="text" name="shop_persian_name" class="col-span-6 input w-full border mt-2 mr-1" placeholder="نام فارسی را وارد کنید" value="{{$shop_name->Persian_name}}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label>ایمیل</label>
                                <div class="relative mt-2">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 left-0">@</div>
                                    <input name="shop_email" type="text" class="input pl-12 w-full border col-span-4 text-left" placeholder="Email" value="{{$shop_email->value}}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label>شماره همراه</label>
                                <div class="relative mt-2">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 left-0" style="direction: ltr">+98</div>
                                    <input name="shop_phone" type="text" class="input pl-12 w-full border col-span-4 text-left" placeholder="شماره همراه" value="{{$shop_phone->value}}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label>شماره ثابت</label>
                                <div class="relative mt-2">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 left-0" style="direction: ltr">+98</div>
                                    <input name="shop_tel" type="text" class="input pl-12 w-full border col-span-4 text-left" placeholder="شماره ثبات" value="{{$shop_tel->value}}">
                                </div>
                            </div>
                            <div class="mt-3">
                                <label>آدرس فروشگاه</label>
                                <textarea class="input w-full border mt-2" placeholder="آدرس" name="shop_address">{{$shop_address->value}}</textarea>
                            </div>
{{--                            <div class="mt-3">--}}
{{--                                <label>توضیحات فروشگاه</label>--}}
{{--                                <textarea class="input w-full border mt-2" placeholder="توضیحات" name="shop_description">--}}
{{--                                    {{$shop_description->value}}--}}
{{--                                </textarea>--}}
{{--                            </div>--}}
                            <button type="submit" class="button w-20 bg-theme-1 text-white mt-3 mr-auto flex">ذخیره</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            <!-- END: Display Information -->
            <!-- BEGIN: Personal Information -->
            <div class="intro-y box lg:mt-5">
                <div class="flex items-center p-5 border-b border-gray-200 ">
                    <h2 class="font-medium text-base ml-auto">
                        Personal Information
                    </h2>
                </div>
                <div class="p-5">
                    <div class="grid grid-cols-12 gap-5">
                        <div class="col-span-12 xl:col-span-6">
                            <div>
                                <label>Email</label>
                                <input type="text" class="input w-full border bg-gray-100 cursor-not-allowed mt-2" placeholder="Input text" value="keanureeves@left4code.com" disabled>
                            </div>
                            <div class="mt-3">
                                <label>Name</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Input text" value="Keanu Reeves" disabled>
                            </div>
                            <div class="mt-3">
                                <label>ID Type</label>
                                <select class="input w-full border mt-2">
                                    <option>IC</option>
                                    <option>FIN</option>
                                    <option>Passport</option>
                                </select>
                            </div>
                            <div class="mt-3">
                                <label>ID Number</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Input text" value="357821204950001">
                            </div>
                        </div>
                        <div class="col-span-12 xl:col-span-6">
                            <div>
                                <label>Phone Number</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Input text" value="65570828">
                            </div>
                            <div class="mt-3">
                                <label>Address</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Input text" value="10 Anson Road, International Plaza, #10-11, 079903 Singapore, Singapore">
                            </div>
                            <div class="mt-3">
                                <label>Bank Name</label>
                                <div class="mt-2">
                                    <select class="select2 w-full">
                                        <option value="1">SBI - STATE BANK OF INDIA</option>
                                        <option value="1">CITI BANK - CITI BANK</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mt-3">
                                <label>Bank Account</label>
                                <input type="text" class="input w-full border mt-2" placeholder="Input text" value="DBS Current 011-903573-0">
                            </div>
                        </div>
                    </div>
                    <div class="flex-reverse justify-start mt-4">
                        <a href="" class="text-theme-6 flex items-center"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete Account </a>
                        <button type="button" class="button w-20 bg-theme-1 text-white mr-auto">Save</button>
                    </div>
                </div>
            </div>
            <!-- END: Personal Information -->
        </div>
    </div>
@endsection


@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >تنظیمات</a>
        </div>
    @endslot
@endcomponent
