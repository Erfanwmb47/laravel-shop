@extends('Admin.Layout.Layout1')

@section('css')

    <style>
        #myInput {
            box-sizing: border-box;
            background-position: 14px 12px;
            background-repeat: no-repeat;
            padding: 5px;
            border: none;
            border-bottom: 1px solid #ddd;
        }
    </style>
    @endsection

@section('content')
    <div class="intro-y flex rtl items-center mt-8">
        <h2 class="text-lg font-medium ml-auto">
            صفحه کاربری
        </h2>
    </div>
    <!-- BEGIN: Profile Info -->
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex-reverse flex-col lg:flex-row border-b border-gray-200 pb-5 -mx-5">
            <div class="mt-6 lg:mt-0 flex-1 px-5 border-t lg:border-0 border-gray-200 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-5 rtl">موجودی کیف پول</div>
                <div class="flex items-center justify-center lg:justify-start mt-2 text-3xl text-red-500 ml-auto">

                        250.000
                        <span class="text-gray-900 text-lg mr-5 ">تومان</span>
                </div>
            </div>
            <div class="flex mt-6 lg:mt-0 items-center lg:items-start flex-1 flex-col justify-center text-gray-600 px-5 border-l border-r border-gray-200 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="truncate sm:whitespace-normal flex items-center ml-auto"> <i data-feather="mail" class="w-4 h-4 ml-2"></i>{{$user->email}}</div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3 ml-auto"> <i data-feather="phone" class="w-4 h-4 ml-2"></i>
                    {{$user->phone}}</div>
                <div class="truncate sm:whitespace-normal flex items-center mt-3 ml-auto">
                    <i data-feather="map-pin" class="w-4 h-4 ml-2"></i> <marquee direction="right" scrollamount="5">
                        @if(!$addresses->isEmpty())
                        {{$addresses->first()->province->name}},{{$addresses->first()->county->name}},{{$addresses->first()->detail}}
                            @endif
                    </marquee></div>

            </div>
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">
                    <img alt="کاربر" class="rounded-full" src="{{str_replace('public','/storage',$user->image)}}">
                    <a href="#" class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-theme-1 rounded-full p-2"> <i class="w-4 h-4 text-white" data-feather="camera"></i> </a>
                </div>
                <div class="mr-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg">{{$user->firstName}} {{$user->lastName}}</div>
                    <div class="text-gray-600">{{$user->username}}</div>
                </div>
            </div>
        </div>
        <div class="nav-tabs pos__tabs flex rtl  flex-col sm:flex-row justify-center lg:justify-start">
            <a data-toggle="tab" data-target="#dashboard" href="javascript:;" class="py-4 sm:mr-8 active">داشبورد</a>
            <a data-toggle="tab" data-target="#account" href="javascript:;" class="py-4 sm:mr-8">ویرایش پروفایل</a>
            <a data-toggle="tab" data-target="#wallet" href="javascript:;" class="py-4 sm:mr-8">کیف پول</a>
        </div>
    </div>
    <!-- END: Profile Info -->
    <div class="intro-y tab-content mt-5">
        <div class="tab-content__pane active" id="dashboard">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Top Categories -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base ml-auto">
                            آخرین سفارشات
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="col-span-12 mt-6 ">
                            <div class="intro-y overflow-auto flex lg:overflow-visible mt-8 sm:mt-0">
                                <table class="table table-report sm:mt-2 ">
                                    <thead>
                                    <tr>
                                        <th class="text-center whitespace-no-wrap">ویرایش</th>
                                        <th class="text-center whitespace-no-wrap">وضعیت</th>
                                        <th class="text-center whitespace-no-wrap">شماره سفارش</th>
                                        <th class="whitespace-no-wrap">محصولات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="">
                                        <td class="w-40">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center ml-3" href=""> <i data-feather="check-square" class="w-4 h-4 ml-1"></i></a>
                                                <a class="flex items-center text-theme-6" href=""> <i data-feather="trash-2" class="w-4 h-4 ml-1"></i></a>
                                            </div>
                                        </td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-theme-9">  پرداخت شده </div>
                                        </td>
                                        <td class="text-center">77</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex-reverse w-20">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/preview-2.jpg" title="Uploaded at 6 August 2022">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/preview-8.jpg" title="Uploaded at 1 May 2021">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/preview-11.jpg" title="Uploaded at 10 October 2020">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="w-40">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center ml-3" href=""> <i data-feather="check-square" class="w-4 h-4 ml-1"></i></a>
                                                <a class="flex items-center text-theme-6" href=""> <i data-feather="trash-2" class="w-4 h-4 ml-1"></i></a>
                                            </div>
                                        </td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-theme-9">  پرداخت شده </div>
                                        </td>
                                        <td class="text-center">77</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex-reverse w-20">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/preview-2.jpg" title="Uploaded at 6 August 2022">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/preview-8.jpg" title="Uploaded at 1 May 2021">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/preview-11.jpg" title="Uploaded at 10 October 2020">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="">
                                        <td class="w-40">
                                            <div class="flex justify-center items-center">
                                                <a class="flex items-center ml-3" href=""> <i data-feather="check-square" class="w-4 h-4 ml-1"></i></a>
                                                <a class="flex items-center text-theme-6" href=""> <i data-feather="trash-2" class="w-4 h-4 ml-1"></i></a>
                                            </div>
                                        </td>
                                        <td class="w-40">
                                            <div class="flex items-center justify-center text-theme-9">  پرداخت شده </div>
                                        </td>
                                        <td class="text-center">77</td>
                                        <td class="table-report__action w-56">
                                            <div class="flex-reverse w-20">
                                                <div class="w-10 h-10 image-fit zoom-in">
                                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/preview-2.jpg" title="Uploaded at 6 August 2022">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/preview-8.jpg" title="Uploaded at 1 May 2021">
                                                </div>
                                                <div class="w-10 h-10 image-fit zoom-in -ml-5">
                                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/preview-11.jpg" title="Uploaded at 10 October 2020">
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Top Categories -->
                <!-- BEGIN: Work In Progress -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base ml-auto">
                            آخرین نظرات کاربر
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="chat__chat-list overflow-y-auto scrollbar-hidden pr-1 pt-1 mt-4">
                            <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/Categories/shaver.png">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium">طناز</a>
                                        <div class="text-xs text-gray-500 mr-auto ml-0">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">تیغ تیز و خوبی است تیغ تیز و خوبی است تیغ تیز و خوبی است</div>
                                </div>
                            </div>
                            <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/Categories/shaver.png">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium">طناز</a>
                                        <div class="text-xs text-gray-500 mr-auto ml-0">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">تیغ تیز و خوبی است تیغ تیز و خوبی است تیغ تیز و خوبی است</div>
                                </div>
                            </div>
                            <div class="intro-x cursor-pointer box relative flex items-center p-5 ">
                                <div class="w-12 h-12 flex-none image-fit mr-1">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="/Admin/images/Categories/shaver.png">
                                    <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
                                </div>
                                <div class="ml-2 overflow-hidden">
                                    <div class="flex items-center">
                                        <a href="javascript:;" class="font-medium">طناز</a>
                                        <div class="text-xs text-gray-500 mr-auto ml-0">01:10 PM</div>
                                    </div>
                                    <div class="w-full truncate text-gray-600">تیغ تیز و خوبی است تیغ تیز و خوبی است تیغ تیز و خوبی است</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Work In Progress -->
                <!-- BEGIN: General Statistic -->
                <div class="intro-y box col-span-12">

                    <div class="p-5">

                        <div class="flex mt-8">
                            <div class="flex items-center mr-5">
                                <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                                <span>Author Sales</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-theme-1 rounded-full mr-3"></div>
                                <span>Product Profit</span>
                            </div>
                        </div>
                        <div class="report-chart mt-8">
                            <canvas id="report-line-chart" height="130"></canvas>
                        </div>
                    </div>
                </div>
                <!-- END: General Statistic -->
            </div>
        </div>
        <div class="tab-content__pane" id="account">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Address -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base ml-auto">
                            ویرایش آدرس
                        </h2>
                    </div>
                    <div class="p-5">
                        <div class="col-span-12 ">
                            <div class="intro-y overflow-auto  lg:overflow-visible mt-8 sm:mt-0 grid">

                                @include('Admin.Layout.Addresses')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Address -->
                <!-- BEGIN: Work In Progress -->

                <div class="intro-y box col-span-12 lg:col-span-6 ">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base ml-auto col-span-12">
                            ویرایش اطلاعات کاربر
                        </h2>
                    </div>
                    <form action="{{route('users.update',$user->id)}}" id="editUserForm" method="post">
                        @csrf
                        @method('PATCH')
                    <div class="p-5 grid grid-cols-12">
                        <div class="relative col-span-6 mt-2 mr-2">
                            <label class=" text-blue-500 rtl">نقش کاربر</label>
                            @if($roles =='1')
                                <select   name="role" class="input input--md border w-full mt-2 rtl">
                                    <option value="{{$roles}}" @if($user->role->id == '1' ) selected @endif>ادمین</option>
                                </select>
                                    @endif
                                @if($roles != '1')
                                <select  name="role" class="input input--md border w-full mt-2 rtl">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}" @if($user->role->id == $role->id ) selected @endif>{{$role->name}}</option>
                                @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="relative col-span-6 mt-2">

                            <label class=" text-blue-500 rtl">ایمیل</label>
                            <input type="text" name="email" class=" rtl mt-2 input pl-12 w-full border col-span-4" placeholder="ایمیل" value="{{$user->email}}">
                        </div>

                        <div class="relative col-span-6 mt-5 mr-2">
                            <label class="rtl text-blue-500">نام خانوادگی</label>
                            <input type="text" name="lastName" class="input w-full border mt-2 rtl" placeholder="نام خانوادگی" value="{{$user->lastName}}">
                        </div>
                        <div class="relative col-span-6 mt-5 ">
                            <label class="rtl text-blue-500">نام</label>
                            <input type="text" name="firstName" class="input w-full border mt-2 rtl" placeholder="نام" value="{{$user->firstName}}">
                        </div>
                        <div class="relative col-span-6 mt-5 mr-2">
                            <label class="rtl text-blue-500">تاریخ تولد</label>
                            <input type="date" name="birthDay" class="input w-full border mt-2 rtl" placeholder="تاریخ تولد" value="{{$user->birthDay}}">
                        </div>
                        <div class="relative col-span-6 mt-5">
                            <label class=" text-blue-500 rtl">جنسیت</label>
                            <select name="sex" class="input input--md border w-full mt-2 rtl">
                                <option value="man" @if($user->sex == 'man') selected @endif>مرد</option>
                                <option value="woman" @if($user->sex == 'woman') selected @endif>زن</option>
                            </select>
                        </div>
                        <div class="relative col-span-6 mt-5 mr-2">
                            <label class="rtl text-blue-500">توضیح اضافه</label>
                            <input type="text" name="description" class="input w-full border mt-2 rtl" placeholder="توضیحات" value="{{$user->description}}">
                        </div>
                        <div class="relative col-span-6 mt-5 mr-2">
                            <label class="rtl text-blue-500">مبایل</label>
                            <input type="tel" name="phone" class="input w-full border mt-2 rtl" placeholder="09124586025" value="{{$user->phone}}">
                        </div>
                        <div class="relative col-span-6 mt-5 mr-2">
                            <label class="rtl text-blue-500">تکرار پسورد</label>
                            <input type="password" name="verifyPassword"  id="verifyPassword" class="input w-full border mt-2 rtl" onkeyup='check();' >
                            <span id='message'></span>

                        </div>
                        <div class="relative col-span-6 mt-5 mr-2">
                            <label class="rtl text-blue-500"> پسورد</label>
                            <input type="password" name="password" id="password" class="input w-full border mt-2 rtl" onkeyup='check();' >
                        </div>

                    </div>
                        </form>
                </div>
                <!-- END: Work In Progress -->
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                <input type="submit" onclick="userEdit()" id="editUser" class="button w-20 bg-theme-1 text-white" value="ویرایش">
            </div>
        </div>
        <div class="tab-content__pane" id="wallet">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: Address -->
                <div class="intro-y box col-span-12 lg:col-span-6">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base ml-auto">
                            شارژ حساب
                        </h2>
                    </div>
                    <div class="p-5 grid">
                        <label class="rtl col-span-12 text-blue-500">مبلغ</label>
                        <div class="relative mt-2 col-span-12">
                            <input type="text" class=" rtl input pr-12 w-full border col-span-4" placeholder="مبلغ">
                            <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">تومان</div>
                        </div>
                        <button class=" mt-5 button w-24 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">شارژ حساب</button>
                    </div>
                </div>
                <!-- END: Address -->
                <!-- BEGIN: Work In Progress -->
                <div class="intro-y box col-span-12 lg:col-span-6 ">
                    <div class="flex items-center p-5 border-b border-gray-200">
                        <h2 class="font-medium text-base ml-auto col-span-12">
                            برداشت مبلغ
                        </h2>
                    </div>
                    <div class="p-5 grid">
                        <label class="rtl col-span-12 text-blue-500">مبلغ</label>
                        <div class="relative mt-2 col-span-12">
                            <input type="text" class=" rtl input pr-12 w-full border col-span-4" placeholder="مبلغ">
                            <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">تومان</div>
                        </div>
                        <button class=" mt-5 button w-24 inline-block mr-1 mb-2 border border-theme-6 text-theme-6">برداشت</button>
                    </div>
                </div>
                <!-- END: Work In Progress -->
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $('.showedcounty').addClass('hidden');
        $('#province').on('change', function() {
            var $temporar = this.value;
            var $provincename = $('#province').find(":selected").text();
            console.log($temporar);
            $('#county').attr('enabled','enabled');
            $('.showedcounty').addClass('hidden');
             $('#myDropdown').find('.' + $temporar).removeClass('hidden');
            $('#provinceValue').val($temporar);
        });
        // search County dropDown
        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }


        $('#showcountybutton').on('click',function (){
            $('#showdropdowncounty').show();
        });

        function choosecounty($vari){
            // var $stack = document.getElementById('cou1').innerHTML;
             console.log($vari);
            document.getElementById('showcountybutton').innerText = document.getElementById($vari).innerText;
             $('#showdropdowncounty').hide();
            $('#countyValue').val($vari);
        }




        // ویرایش آدرس

        function filterFunction2() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput2");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdown2");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }

        function editFunc(id,province,county,tel,detail,postalCode,setDefault,provinceId,countyId){
             // console.log(provinceId);
            $('#addressId').val(id);
            $('#editCountyValue').val(countyId);
            $('#editProvinceValue').val(provinceId);
            $('#postalCode').val(postalCode);
            $('#tel').val(tel);
            $('#detail').val(detail);
            // console.log(setDefault);
            if(setDefault == 1){
                $('#setDefault').attr('checked','checked');
            }
            else {
                $('#setDefault').removeAttr('checked');
            }
            var a = 0 ;
            $('#EditProvince option').each(function (){
                if($(this).text() == province){
                    a = $(this).val();
                    $('#EditProvince').val(a).change();
                    $('#editProvinceValue').val(a);
                    // console.log($(this).text());
                    // console.log(a);
                    console.log($('#editProvinceValue').val());
                }
            });
            // console.log(document.getElementById('EditCountyButton').innerHTML);
            document.getElementById('EditCountyButton').innerText = county ;
            $('.editShowedCounty').addClass('hidden');
            $('.editdropdowncounty').find('.' + a).removeClass('hidden');
            // console.log(a);
        }

        $('#EditCountyButton').on('click',function (){
            $('#editshowdropdowncounty').show();
        });

        function editCounty($vari2){
            // var $stack = document.getElementById('cou1').innerHTML;
            console.log($vari2);
            $('EditProvince').val()
            $('#editshowdropdowncounty').removeClass('hidden');
            document.getElementById('EditCountyButton').innerText = document.getElementById($vari2).innerText;
            $('#editshowdropdowncounty').hide();
            $('#editCountyValue').val($vari2);
            // console.log($('#editCountyValue').val());
        }
        $('#EditProvince').on('change', function() {
            var $temporar = this.value;
            var $provincename = $('#EditProvince').find(":selected").text();
            // console.log($provincename);
            // $('#county').attr('enabled','enabled');
            $('#EditCountyButton').text('انتخاب شهر').change();
            $('.editShowedCounty').addClass('hidden');
            $('#myDropdown2').find('.' + $temporar).removeClass('hidden');
            // $('#editCountyValue').val($temporar);
            $('#editProvinceValue').val($temporar);
            // console.log($temporar);
        });

        function userEdit(){
            document.getElementById("editUserForm").submit();
        }
        var check = function() {
            if (document.getElementById('password').value ==
                document.getElementById('verifyPassword').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'درست زدی';
                document.getElementById('editUser').classList.remove("disabled");
                document.getElementById('editUser').classList.remove("bg-gray-600");
                document.getElementById('editUser').classList.add("bg-theme-1");
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = ' پسورد را صحیح وارد کنید';
                document.getElementById('editUser').classList.add("disabled");
                document.getElementById('editUser').classList.add("bg-gray-600");
                document.getElementById('editUser').classList.remove("bg-theme-1");

            }
        }


    </script>
@endsection
