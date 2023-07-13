    <div class=" accordion chat__user-list overflow-y-auto scrollbar-hidden pr-1 pl-1 pt-1 h-64 col-span-10 rtl mb-2 pb-5 ">
        <?php
        $counter = 1;
        ?>
            @if($addresses)
        @foreach($addresses as $address)

        <div class=" accordion__pane cursor-pointer box relative flex-reverse items-center p-5 mt-5 rtl w-full @if($address->default == "1") border-theme-42 @endif ml-6">
            <div class="w-12 h-12 flex-none image-fit mr-1 rtl">
                <div alt="" class="rounded-full bg-gray-800 h-full w-full text-white text-center mt-auto"><div class="" style="padding: 30%;">{{$counter}}</div></div>
                <div class="w-3 h-3 bg-theme-9 absolute right-0 bottom-0 rounded-full border-2 border-white"></div>
            </div>
            <div class="mr-2 overflow-hidden">
                <div class=" item-right"> <a href="javascript:;" class="w-full font-medium accordion__pane__toggle ">{{$address->province->name}} &nbsp {{$address->county->name}}</a> </div>
                <div class="accordion__pane__content ml-6  text-gray-600 leading-relaxed">

                    <p class="mt-2 mb-2 w-80">{{$address->detail}}</p>
                    <div class="flex">
                        <p class="text-blue-300">کد پستی : &nbsp<a class="text-gray-600">{{$address->postalCode}}</a> </p>
                        <p class="text-blue-300">شماره ثابت : &nbsp<a href="tel:+98{{$address->tel}}" class="text-gray-600">98{{$address->tel}}+</a> </p>
                    </div>
                </div>
            </div>
            <div class="dropdown relative top-0 mr-auto">
                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                <div class="dropdown-box mt-5 absolute w-40 top-0 left-0 z-20">
                    <div class="dropdown-box__content box p-2 ">
                        <a href="javascript:;" data-toggle="modal" onclick="editFunc('{{$address->id}}','{{$address->province->name}}','{{$address->county->name}}','{{$address->tel}}','{{$address->detail}}','{{$address->postalCode}}','{{$address->default}}','{{$address->province->id}}','{{$address->county->id}}')" data-target="#editAddress" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="share-2" class="w-4 h-4 mr-2"></i> ویرایش</a>

                        <a href="javascript:;"  data-target="#addressDelete{{$address->id}}" data-toggle="modal" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="copy" class="w-4 h-4 mr-2"></i> حذف  </a>
                        <div class="modal" id="addressDelete{{$address->id}}">
                            <div class="modal__content">
                                <form action="{{route('address.destroy',$address)}}" method="post" >
                                    @csrf
                                    @method('DELETE')

                                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                        <div class="text-3xl mt-5">حذف آدرس{{$counter}}  <span style="color: darkred">{{$address->name}}</span></div>
                                        <p>مطمئن هستید ؟ </p>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">انصراف</button>
                                        <button type="submit" class="button w-24 bg-theme-6 text-white" >حذف</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
            <?php $counter++ ?>
        @endforeach
            @endif
    </div>
    <a href="javascript:;" data-toggle="modal" data-target="#addAddress" class="button w-24 shadow-md mr-1 mb-2 bg-gray-200 text-gray-600 w-full col-span-10">افزودن آدرس جدید</a>
    <div class="modal" id="addAddress">
        <div class="modal__content rtl">
            <form action="{{route('address.store')}}" method="post">
                @csrf
                <input type="text" value="{{$user->id}}" class="hidden" name="userId">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <div class="dropdown relative sm:hidden">
                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
                        <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                    </div>
                </div>
                <p>افزودن آدرس جدید</p>
            </div>
            <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                <div class="col-span-12 sm:col-span-6">
                    <label>استان</label>
                    <input class="hidden" type="text" name="province" id="provinceValue" value="">
                    <select class="select2 input w-full border mt-2 flex-1"  id="province">
                        <option selected disabled value="">انتخاب استان</option>
                    @foreach($province as $pro)
                            <option  value="{{$pro->id}}">{{$pro->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-12 sm:col-span-6">
                    <input class="hidden" type="text" name="county" id="countyValue" value="">
                    <label>شهر </label>
                    <div class="dropdown relative border rounded" id="showcountybutton1">
                            <a class="dropdown-toggle button inline-block w-full text-right" id="showcountybutton"><i data-feather="chevron-down" class="float-right"></i>انتخاب شهر </a>
                            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20 w-full" id="showdropdowncounty">
                                <div class="dropdown-box__content box p-2 overflow-y-auto h-48 w-full dropdowncounty" id="myDropdown">
                                    <input type="text" placeholder="جست و جو .." id="myInput"  onkeyup="filterFunction()">
                                @foreach($county as $cou)
                                    <a href="javascript:;"  id="{{$cou->id}}" onclick="choosecounty({{$cou->id}})" class=" showedcounty w-full flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md {{$cou->province_id}}">{{$cou->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
                <div class="col-span-12 sm:col-span-6"> <label>کد پستی</label> <input required type="text" name="postalCode" class="input w-full border mt-2 flex-1" placeholder="کد پستی را وارد کنید"> </div>
                <div class="col-span-12 sm:col-span-6"> <label>شماره ثابت</label>
                    <div class="relative mt-2">
                        <div class=" rtl left-0 absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">98+</div>
                        <input type="tel" required name="tel" class="input pl-12 w-full border col-span-4 text-left" placeholder="000000000" pattern="[0-9]{9}">
                    </div>
                </div>
                <div class="col-span-12 sm:col-span-12"> <label>آدرس کامل</label> <input required name="detail" type="text" class="input w-full border mt-2 flex-1" placeholder="آدرس کامل"> </div>
            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="button"  data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                <button type="submit" class="button w-20 bg-theme-1 text-white">افزودن</button>
            </div>
            </form>
        </div>
    </div>


    {{--    -----------------------ویرایش آدرس ---------------------}}
    <div class="modal" id="editAddress">
        <div class="modal__content ">
            <form action="{{route('address.update2')}}" method="post">
                @csrf

                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <input class="hidden" type="text" name="addressId" id="addressId" value="">
                    <div class="flex mt-1">
                        <label>پیشفرض</label>
                      <div>
                          <input type="checkbox"  id="setDefault" class="tooltip input input--switch border mr-4" value="1" name="setDefault" title=" انتخاب آدرس پیش فرض">
                      </div>
                    </div>

                    {{--                    <div class="dropdown relative ">--}}
{{--                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">--}}
{{--                            <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>--}}
{{--                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <p>ویرایش آدرس</p>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3 rtl">
                    <div class="col-span-12 sm:col-span-6">
                        <label>استان</label>
                        <input class="hidden" type="text" name="province" id="editProvinceValue" value="">
                        <select class="select2 input w-full border mt-2 flex-1"  id="EditProvince">
                            <option disabled value="">انتخاب استان</option>
                            @foreach($province as $pro)
                                <option  value="{{$pro->id}}">{{$pro->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <input class="hidden" type="text" name="county" id="editCountyValue" value="">
                        <label>شهر </label>
                        <div class="dropdown relative border rounded" id="editshowcountybutton1">
                            <a class="dropdown-toggle button inline-block w-full text-right" id="EditCountyButton"><i data-feather="chevron-down" class="float-right"></i> انتخاب شهر</a>
                            <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20 w-full" id="editshowdropdowncounty">
                                <div class="dropdown-box__content box p-2 overflow-y-auto h-48 w-full editdropdowncounty" id="myDropdown2">
                                    <input type="text" placeholder="جست و جو .." id="myInput2"  onkeyup="filterFunction2()">
                                    @foreach($county as $cou)
                                        <a href="javascript:;"  id="e {{$cou->id}}" onclick="editCounty({{$cou->id}})" class=" editShowedCounty w-full flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md {{$cou->province_id}}">{{$cou->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6"> <label>کد پستی</label> <input id="postalCode" type="text" name="postalCode" class="input w-full border mt-2 flex-1" placeholder="کد پستی را وارد کنید" value=""> </div>
                    <div class="col-span-12 sm:col-span-6"> <label>شماره ثابت</label>
                        <div class="relative mt-2">
                            <div class=" rtl left-0 absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">98+</div>
                            <input type="tel" value=""  id="tel" name="tel" class="input pl-12 w-full border col-span-4 text-left" placeholder="000000000" pattern="[0-9]{9}">
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12"> <label>آدرس کامل</label> <input name="detail" type="text" class="input w-full border mt-2 flex-1" placeholder="آدرس کامل" value="" id="detail"> </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button"  data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">ویرایش</button>
                </div>
            </form>
        </div>
    </div>
