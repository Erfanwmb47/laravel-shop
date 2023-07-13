@section('css')
    <link rel="stylesheet" href="/Admin/css/Addresses.css" />
@endsection
@section('content')
    <form action="{{route('orders.update',$order)}}" method="post" id="editOrderForm">
        @csrf
        @method('PATCH')
    <div class="grid grid-cols-12 gap-6">
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">

            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        جزئیات سفارش  {{$order->id}}
                    </h2>
                    <a href="" class="mr-auto flex text-theme-1"> <i data-feather="refresh-ccw" class="w-4 h-4 ml-3"></i> بارگزاری مجدد </a>
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
                                <div class="text-base text-gray-600 mt-1">
                                    <input type="text" name="score" class="input w-full border mt-2 rtl" value="{{$order->score}}">
                                </div>
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
                                <div class="text-2xl font-bold leading-8 mt-6"> <del class=" float-left text-xs text-theme-6">{{number_format($order->final_cost)}}</del>هزینه نهایی</div>

                                <div class="relative mt-3">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">تومان</div> <input type="text" name="final_cost" class="rtl input pl-12 w-full border col-span-4" value="{{$order->final_cost}}">
                                </div>
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
                                <div class=" leading-8 mt-6">
                                    <div class="sm:mt-2 ">
                                        <select class="input input--sm border mr-2 w-full rtl " name="transportation">
                                            @foreach($transportations as $tr)
                                                <option value="{{$tr->id}}" @if($order->transportation->id == $tr->id) selected @endif>{{$tr->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="relative mt-1">
                                    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">تومان</div> <input type="text" class="rtl input pl-12 w-full border col-span-4" name="transportation_cost" value="{{$order->transportation_cost}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                    <div class="mr-auto">
                                        <div class="report-box__indicator bg-theme-9 tooltip cursor-pointer" title="22% Higher than last month"> مشخصات گیرنده <i data-feather="chevron-up" class="w-4 h-4"></i> </div>
                                    </div>
                                </div>
{{--                                <div class="text-xl font-bold leading-8 mt-1"></div>--}}
                                <div class="relative mt-5">
                                     <input type="text" class="rtl input pl-12 w-full border col-span-4" value="{{$order->recipient_name}}" name="recipient_name">
                                </div>
                                <div class="relative mt-3">
                                    <input type="text" class="rtl input pl-12 w-full border col-span-4" value="{{$order->recipient_phone}}" name="recipient_phone" id="recipirnt_phone">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
                <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Important Notes -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 xxl:col-span-12 xl:col-start-1 xl:row-start-1 xxl:col-start-auto xxl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate ml-auto">
                                شماره پیگیری پست
                            </h2>
                        </div>
                        <div class="mt-5 intro-x rtl">
                            <div class="slick-carousel box zoom-in" id="important-notes">
                                <div class="p-3">
                                    <div class="text-base font-medium truncate"></div>
                                    {{--                                    TODO تایم برای سفارش --}}
                                    <div class="text-gray-600 text-justify mt-1">
                                         <input type="text" class="rtl input pl-12 w-full border col-span-6" name="tracking_serial" value="{{$order->tracking_serial}}">
{{--                                        <p class="rtl input pl-12  border col-span-6 float-left">به وسیله این کد مشتری میتواند سفارش خود را پیگیری کند </p>--}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- END: Important Notes -->
                </div>
            </div>

            <!-- END: General Report -->



            <div class="col-span-6 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
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
                                    <div class="text-gray-600 text-justify mt-1">
                                        <textarea data-feature="basic" class="summernote" name="description"  placeholder="توضیحی برای سفارش موجود نیست" >{{$order->description}}</textarea>
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
                                    <a onclick="firstProvinceSelect()" data-toggle="modal"  data-target="#editAddress" class="float-left button bg-theme-10 text-white" >ویرایش</a>
                                    <div class="text-gray-500 mt-1" id="provinceCountyOrder">{{$address[0]}} / {{$address[1]}}</div>
                                    <div class="text-gray-500 text-justify mt-1" id="postalCodeOrder">
                                        کد پستی :  {{$address[2]}}
                                    </div>
                                    <div class="text-gray-600 text-justify mt-1" id="addressDescriptionOrder">
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
            <div class="col-span-12 xxl:col-span-3 xxl:border-l border-theme-5 -mb-10 pb-10">
                <div class="xxl:pl-6 grid grid-cols-12 gap-6">
                    <!-- BEGIN: Important Notes -->
                    <div class="col-span-12 md:col-span-6 xl:col-span-12 xxl:col-span-12 xl:col-start-1 xl:row-start-1 xxl:col-start-auto xxl:row-start-auto mt-3">
                        <div class="intro-x flex items-center h-10">
                            <h2 class="text-lg font-medium truncate ml-auto">
                                توضیحات ادمین
                            </h2>
                        </div>
                        <div class="mt-5 intro-x rtl">
                            <div class="slick-carousel box zoom-in" id="important-notes">
                                <div class="p-5">
                                    <div class="text-base font-medium truncate"></div>
                                    {{--                                    TODO تایم برای سفارش --}}
                                    <div class="text-gray-600 text-justify mt-1">
                                        <textarea data-feature="basic" class="summernote" name="note"  placeholder="توضیحی برای سفارش موجود نیست" >{{$order->note}}</textarea>
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

            <!-- END: Weekly Top Seller -->
            <button type="submit" onclick="document.getElementById('editOrderForm').submit()" class=" button w-40 inline-block mr-1 mb-2 border border-theme-1 text-theme-1">ذخیره تغییرات</button>

        </div>

    </div>
        <div class="modal" id="editAddress">
            <div class="modal__content modal__content--lg">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <p>ویرایش آدرس</p>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3 rtl">
                    <div class="dropdownAddress col-span-6 border rounded">
                        <span onclick="showProvince()" class="dropbtnAddress dropdown-toggle button rounded inline-block w-full text-right" id="dropbtnProvince">{{$address[0]}} <i data-feather="chevron-down" class="float-right"></i></span>
                        <div id="myDropdownProvince" class="dropdown-content-address  ">
                            <input type="text" placeholder="Search.." id="myInputProvince"  value="" name="" onkeyup="filterFunctionProvince()">
                            <input type="text" hidden="hidden" id="myInputProvinceRequest"  value="{{$address[0]}}" name="province_id">

                            @foreach($provinces as $province)
                                <span onclick="selectProvince('{{$province->id}}','{{$province->name}}')" id="{{$province->id}}">{{$province->name}}</span>
                                @if($province->name == $address[0])
                                    <input type="hidden" id="provinceSelected" value="{{$province->id}}">
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="dropdownAddress col-span-6 border rounded">
                        <span onclick="showCounty()" class="dropbtnAddress button rounded inline-block w-full text-right" id="dropbtnCounty"><i data-feather="chevron-down" class="float-right"></i>  {{$address[1]}}</span>
                        <div id="myDropdownCounty" class="dropdown-content-address">
                            <input type="text" placeholder="Search.." id="myInputCounty"  value="" name="" onkeyup="filterFunctionCounty()">
                            <input type="text" hidden="hidden" id="myInputCountyRequest"  value="{{$address[1]}}" name="county_id">
                            <div id="countiesList">
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6"> <label>شماره تحویل گیرنده</label>
                        <div class="relative mt-2">
                            <div class=" rtl left-0 absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">98+</div>
                            <input type="tel" value="{{$order->recipient_phone}}"  id="tel" name="recipient_phone" class="input pl-12 w-full border col-span-4 text-left" placeholder="000000000" pattern="[0-9]{9}">
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6"> <label>کد پستی</label>
                        <div class="relative mt-2">
                            <input type="text" value="{{$address[2]}}"  id="postalCode" name="postalCode" class="rtl input w-full border col-span-4 text-left" placeholder="000000000" pattern="[0-9]{9}">
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-12">
                        <label>آدرس کامل</label>
                        <input name="detail" type="text" class="input w-full border mt-2 flex-1" placeholder="آدرس کامل" value="{{$address[3]}}" id="detail"> </div>
                    <div class="col-span-12 sm:col-span-12 mt-2 mr-5">
                        <a data-dismiss="modal"  class=" button bg-theme-10 text-white" onclick="changeAddressValues()">ویرایش</a>
                    </div>
                </div>
            </div>
        </div>
    </form>


@endsection
@section('js')
    <script>
        function firstProvinceSelect(){
            proId = document.getElementById('provinceSelected').value;
            proName = document.getElementById('myInputProvinceRequest').value;
            couName = document.getElementById('myInputCountyRequest').value;
            selectProvince(proId,proName);
            document.getElementById('dropbtnCounty').innerHTML = couName;
            console.log(proId,proName);
        }
        $(document).on('show.bs.modal', '#editAddress', function (e) {

            // selectProvince()
        });
        $(document).on("click", function(event){
            var $trigger = $(".dropdownAddress");
            if($trigger !== event.target && !$trigger.has(event.target).length){
                $(".dropdown-content-address").removeClass("showProvince");
                $(".dropdown-content-address").removeClass("showCounty");
            }
        });
        document.getElementById('fq-address').style.display = "none";
        document.getElementById('newAddressH3').classList.remove("active");
        function changeAddress() {
            if (document.getElementById('newAddressH3').classList[1] == 'active') {
                // $('#NewAddress').check()
                console.log('hi');
                document.getElementById('newAddress').checked = 'true';
            }
            else {
                document.getElementById('newAddress').checked = 'false';

            }
        }

        // function closeNewAddress(){
        //     document.getElementById('fq-address').style.display = "none";
        //     document.getElementById('newAddressH3').classList.remove("active");
        // }
    </script>
    <script>
        /* When the user clicks on the button,
        toggle between hiding and showing the dropdown content */
        function showProvince() {
            document.getElementById("myDropdownProvince").classList.toggle("showProvince");

        }
        function showCounty() {
            document.getElementById("myDropdownCounty").classList.toggle("showCounty");

        }
        function selectProvince(id,name){
            document.getElementById('dropbtnProvince').innerHTML = name;
            document.getElementById('myInputProvince').setAttribute('value',name);
            document.getElementById('myInputProvinceRequest').setAttribute('value',name);
            document.getElementById("myDropdownProvince").classList.toggle("showProvince");
            document.getElementById('dropbtnCounty').innerHTML = "انتخاب شهر";
            document.getElementById('myInputCounty').setAttribute('value','');
            $.ajaxSetup({
                headers : {
                    'X-CSRF-TOKEN' : document.head.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type' : 'application/json'
                }
            })


            //
            $.ajax({
                type : 'POST',
                url : '/getprovince_setcounties',
                data : JSON.stringify({
                    id : id ,
                    name : name,
                    _method : 'post'
                }),
                success : function(res) {
                    // $("#cartChange"+id).load(" #cartChange"+id);
                    // $("#finalCost").load(" #finalCost");
                    //  location.reload();
                    document.getElementById('countiesList').innerHTML ="";
                    res.counties.forEach(addCounty);

                }
            });
        }

        function addCounty(item){

            var counties = '<span onclick="selectCounty(\''+item.id+'\',\''+item.name+'\')" id="'+item.id+'">'+item.name+'</span>';
            document.getElementById('countiesList').innerHTML += counties;
        }
        function selectCounty(id,name){
            document.getElementById('dropbtnCounty').innerHTML = name;
            document.getElementById('myInputCounty').setAttribute('value',name);
            document.getElementById('myInputCountyRequest').setAttribute('value',name);
            document.getElementById("myDropdownCounty").classList.toggle("showCounty");
        }
        function filterFunctionProvince() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInputProvince");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdownProvince");
            a = div.getElementsByTagName("span");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        function filterFunctionCounty() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInputCounty");
            filter = input.value.toUpperCase();
            div = document.getElementById("myDropdownCounty");
            a = div.getElementsByTagName("span");
            for (i = 0; i < a.length; i++) {
                txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
    </script>
    <script>
       function changeAddressValues(){
           document.getElementById('provinceCountyOrder').innerHTML =
               document.getElementById('myInputProvinceRequest').value + ' / ' +
               document.getElementById('myInputCountyRequest').value;
           document.getElementById('postalCodeOrder').innerHTML = 'کد پستی : '+
               document.getElementById('postalCode').value ;
           document.getElementById('addressDescriptionOrder').innerHTML =
               document.getElementById('detail').value ;




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


