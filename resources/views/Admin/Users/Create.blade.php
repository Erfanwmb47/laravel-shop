
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />
@endsection

@section('content')
    <h2 class="intro-y text-lg font-medium mt-10 rtl">
        لیست کاربران سایت
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('users.index')}}" class="button text-white bg-theme-1 shadow-md ml-2">افزودن کاربر جدید</a>
            <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13 rtl" placeholder="جست و جو ...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- BEGIN: Wizard Layout -->
    <div class="intro-y box py-10 sm:py-20 mt-5">
        <div class=" nav-tabs pos__tabs wizard flex flex-col lg:flex-row justify-center px-5 sm:px-20 rtl">
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a id="s1" data-toggle="tab" data-target="#step1" href="javascript:;"  class="button w-10 h-10 rounded-full  active bg-theme-1 text-white activated" >1</a>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">ثبت نام اصلی</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a id="s2" data-toggle="tab" data-target="#step2" href="javascript:;"  class=" disabled  w-10 h-10 rounded-full button text-gray-600 bg-gray-200 ">2</a>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">مشخصات کاربر</div>
            </div>
            <div class="intro-x lg:text-center flex items-center mt-5 lg:mt-0 lg:block flex-1 z-10">
                <a id="s3" data-toggle="tab" data-target="#step3" href="javascript:;" class=" disabled w-10 h-10 rounded-full button text-gray-600 bg-gray-200 ">3</a>
                <div class="lg:w-32 text-base lg:mt-3 ml-3 lg:mx-auto text-gray-700">تکمیل مشخصات </div>
            </div>
            <div class="wizard__line hidden lg:block w-2/3 bg-gray-200 absolute mt-5"></div>
        </div>
        <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="tab-content">
            <div id="step1" class="tab-content__pane active px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200" >
                <div class="font-medium text-base">اطلاعات ثبت نام</div>
                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 rtl">
{{--                    TODO label ha sakhte shavad--}}
                    <div class="intro-y col-span-12 sm:col-span-5">
                        <div class="mb-2"><label for="email">ایمیل</label></div>
                        <input type="text" name="email" class="input w-full border flex-1" placeholder="example@gmail.com" id="email">
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-1">
                        <div class="mb-2"><label for="email">تایید ایمیل</label></div>
                        <input type="checkbox" class="tooltip input input--switch border " style="direction: ltr !important;" value="1" name="verifyEmail" title="با انتخاب این گزینه ایمیل فعال خواهد شد  "> </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2"><label for="phone">شماره موبایل</label></div>
                        <input type="text" name="phone" class="input w-full border flex-1" placeholder="09124805562" id="phone">
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2"><label for="username">نام کاربری</label></div>
                        <input type="text" name="username" class="input w-full border flex-1" placeholder="userName" id="username">
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-3">
                        <div class="mb-2"><label for="password">رمز عبور</label></div>
                        <input type="password" name="password" id="password" onkeyup='check();' class="input w-full border flex-1" placeholder="*******">
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-3">
                        <div class="mb-2"><label for="verifyPassword">تکرار رمز عبور</label></div>
                        <input type="password" name="verifyPassword" id="verifyPassword" onkeyup='check();' class="input w-full border flex-1" placeholder="********">
                        <span id='message'></span>
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mr-auto">
                        <a data-toggle="tab"   data-target="#step2" href="#/s2"  id="s1next" class="disabled button w-24 justify-center block bg-gray-600 text-white ml-2 mr-2">بعدی</a>
                    </div>
                </div>
            </div>
            <div id="step2" class="tab-content__pane  px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 " >
                <div class="font-medium text-base">مشخصات کاربر</div>
                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 rtl">
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">نام</div>
                        <input type="text" name="firstName" class="input w-full border flex-1" placeholder="نام کاربر را وارد کنید">
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">نام خانوادگی</div>
                        <input type="text" name="lastName" class="input w-full border flex-1" placeholder="نام خانوادگی را وارد کنید">
                    </div>
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">تاریخ تولد</div>
                        <input type="date" name="birthDay" class="input w-full border flex-1" placeholder="">
                    </div>
                    <div class="intro-y col-span-3 sm:col-span-3">
                        <div class="mb-2">جنسیت</div>
                        <select name="sex" class="input w-full border flex-1">
                            <option value="man" selected>مرد</option>
                            <option value="woman">زن </option>
                        </select>
                    </div>
                    <div class=" col-span-3 sm:col-span-3">
                        <div class="mb-2">نقش</div>
                        <select name="role" class="input w-full border flex-1">

                           @foreach($roles as $role)
                                <option value="{{$role->id}}" @if($role->name == 'کاربر')selected @endif>{{$role->name}}</option>
                            @endforeach



                        </select>
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mr-auto">
                        <a data-toggle="tab" data-target="#step3" href="#/s3" id="s2next" class="button w-24 justify-center block bg-theme-1 text-white ml-2 mr-2">بعدی</a>
                        <a data-toggle="tab" data-target="#step1" href="#/s1" id="s2perv" class="button w-24 justify-center block bg-gray-200 text-gray-600">قبلی</a>
                    </div>
                </div>
            </div>
            <div id="step3" class="tab-content__pane  px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 " >
                <div class="font-medium text-base">تکمیل  مشخصات</div>
                <div class="grid grid-cols-12 gap-4 row-gap-5 mt-5 rtl">
                    <div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2">درباره کاربر</div>
                         <textarea class="summernote" name="description"></textarea>
                    </div><div class="intro-y col-span-12 sm:col-span-6">
                        <div class="mb-2 mr-auto">عکس کاربر</div>
                        <div id="uploadArea" class="upload-area-user">
                            <!-- Header -->
                            <div class="upload-area__header">
                                <h1 class="upload-area__title-user">عکس کاربر را آپلود کنید </h1>
                                <p class="upload-area__paragraph">
                                    <strong class="upload-area__tooltip">
                                        <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
                                    </strong>
                                </p>
                            </div>
                            <!-- End Header -->

                            <!-- Drop Zoon -->
                            <div id="dropZoon" class="upload-area__drop-zoon-user drop-zoon">
                                <span class="drop-zoon__icon">
                                  <i class='bx bxs-file-image'></i>
                                </span>
                                <p class="drop-zoon__paragraph">عکس را اینجا کشیده یا انتخاب کنید </p>
                                <span id="loadingText" class="drop-zoon__loading-text">منتظر بمانید</span>
                                <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
                                <input type="file" name="image" id="fileInput" class="drop-zoon__file-input" accept="image/*">
                            </div>
                            <!-- End Drop Zoon -->
                            <!-- File Details -->
                            <div id="fileDetails" class="upload-area__file-details file-details">
                                <h3 class="file-details__title">عکس آپلود شده</h3>
                                <div id="uploadedFile" class="uploaded-file">
                                    <div class="uploaded-file__icon-container">
                                        <i class='bx bxs-file-blank uploaded-file__icon'></i>
                                        <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
                                    </div>

                                    <div id="uploadedFileInfo" class="uploaded-file__info">
                                        <span class="uploaded-file__name">Proejct 1</span>
                                        <span class="uploaded-file__counter">0%</span>
                                    </div>
                                </div>
                            </div>
                            <!-- End File Details -->
                        </div>
                    </div>
                    <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5 mr-auto">
                        <input type="submit" class="button w-24 justify-center block bg-theme-1 text-white ml-2 mr-2" value="ثبت">
                        <a data-toggle="tab" data-target="#step2" href="#/s2"id="s3perv" class="button w-24 justify-center block bg-gray-200 text-gray-600">قبلی</a>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- END: Wizard Layout -->
    <!-- BEGIN: Delete Confirmation Modal -->
    <div class="modal" id="delete-confirmation-modal">
        <div class="modal__content">
            <div class="p-5 text-center">
                <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                <div class="text-3xl mt-5">Are you sure?</div>
                <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
            </div>
            <div class="px-5 pb-8 text-center">
                <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                <button type="button" class="button w-24 bg-theme-6 text-white">Delete</button>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="/Admin/js/CategoryImageUploader.js"> </script>
    <script>
        $('#s1next').click(function() {
            $('#s2').addClass('active');
            $('#s1').removeClass('active');
            $('#s2').addClass('bg-theme-1','text-white');
            $('#s1').removeClass('bg-theme-1','text-white');
            $('#s1').addClass('bg-gray-200','text-gray-600');
        });
        $('#s2next').click(function() {
            $('#s3').addClass('active');
            $('#s2').removeClass('active');
            $('#s3').addClass('bg-theme-1','text-white');
            $('#s2').removeClass('bg-theme-1','text-white');
            $('#s2').addClass('bg-gray-200','text-gray-600');
        });
        $('#s2perv').click(function() {
            $('#s1').addClass('active');
            $('#s2').removeClass('active');
            $('#s2').removeClass('bg-theme-1','text-white');
            $('#s2').addClass('bg-gray-200','text-gray-600');
            $('#s1').addClass('bg-theme-1','text-white');
            $('#s1').removeClass('bg-gray-200','text-gray-600');
        });
        $('#s3perv').click(function() {
            $('#s2').addClass('active');
            $('#s3').removeClass('active');
            $('#s2').addClass('bg-theme-1','text-white');
            $('#s3').removeClass('bg-theme-1','text-white');
            $('#s3').addClass('bg-gray-200','text-gray-600');
        });
        $('#s1').click(function() {
            $('#s1').addClass('bg-theme-1','text-white');
            $('#s1').removeClass('bg-gray-200','text-gray-600');
            $('#s2').removeClass('bg-theme-1','text-white');
            $('#s3').removeClass('bg-theme-1','text-white');
            $('#s2').addClass('bg-gray-200','text-gray-600');
            $('#s3').addClass('bg-gray-200','text-gray-600');
        });
        $('#s2').click(function() {
            $('#s2').addClass('bg-theme-1','text-white');
            $('#s2').removeClass('bg-gray-200','text-gray-600');
            $('#s1').removeClass('bg-theme-1','text-white');
            $('#s3').removeClass('bg-theme-1','text-white');
            $('#s3').addClass('bg-gray-200','text-gray-600');
            $('#s1').addClass('bg-gray-200','text-gray-600');
        });
        $('#s3').click(function() {
            $('#s3').addClass('bg-theme-1','text-white');
            $('#s3').removeClass('bg-gray-200','text-gray-600');
            $('#s2').removeClass('bg-theme-1','text-white');
            $('#s1').removeClass('bg-theme-1','text-white');
            $('#s2').addClass('bg-gray-200','text-gray-600');
            $('#s1').addClass('bg-gray-200','text-gray-600');
        });
        // document.getElementById('s1next').disabled = true;

        var check = function() {
            if (document.getElementById('password').value ===
                document.getElementById('verifyPassword').value && document.getElementById('password').value != '' && document.getElementById('verifyPassword').value != '')
            {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'درست زدی';
                document.getElementById('s1next').classList.remove("disabled");
                document.getElementById('s1next').classList.remove("bg-gray-600");
                document.getElementById('s1next').classList.add("bg-theme-1");
                document.getElementById('step2').classList.remove("disabled");
                document.getElementById('step3').classList.remove("disabled");
            }
            else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = ' پسورد را صحیح وارد کنید';
                document.getElementById('s1next').classList.add("disabled");
                document.getElementById('step2').classList.add("disabled");
                document.getElementById('step3').classList.add("disabled");
                document.getElementById('s1next').style.backgroundColor = "gray";
            }
            if(document.getElementById('password').value === null ||
                document.getElementById('verifyPassword').value === null){
                document.getElementById('message').innerHTML = '';
            }
        }
    </script>
    @endsection

@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" disabled >ایجاد کاربر</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('users.index')}}" class="breadcrumb--active" >کاربران</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a>
        </div>
    @endslot
@endcomponent
