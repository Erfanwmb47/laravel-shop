

@section('css')
    <link rel="stylesheet" href="/Admin/css/GalleryFileUploader.css" />
    @endsection
@section('content')
    <div class="grid-rtl grid-cols-12 gap-6 mt-8">

        <div class="col-span-12 lg:col-span-3 xxl:col-span-2">

            <h2 class="intro-y text-lg font-medium ml-auto mt-2">
                آرشیو رسانه ها           </h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6 z-10">
                <div class="mt-1">
                    <a href="" class="flex-reverse-start items-center px-3 py-2 rounded-md bg-theme-1 text-white font-medium"> <i class="w-4 h-4 ml-2" data-feather="image"></i> عکس ها  </a>
                    <a href="" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="video"></i> ویدیو ها  </a>
                    <a href="" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="file"></i> فایل ها </a>
                    <a href="" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="users"></i> اشتراک  ها </a>
                    <a href="" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="trash"></i> سطل آشغال </a>
                </div>
                <div class="border-t border-gray-200 mt-5 pt-5 ">
                    <a href="{{route('galleries.index').'?flag[]=categories'}}" class="flex-reverse-start items-center px-3 py-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-11 rounded-full ml-3"></div>
                        دسته بندی
                    </a>
                    <a href="{{route('galleries.index').'?flag[]=brands'}}" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-9 rounded-full ml-3"></div>
                        برند ها
                    </a>
                    <a href="{{route('galleries.index').'?flag[]=countries'}}" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-9 rounded-full ml-3"></div>
                        کشور ها
                    </a>
                    <a href="{{route('galleries.index').'?flag[]=users'}}" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-12 rounded-full ml-3"></div>
                        کاربران
                    </a>
                    <a href="{{route('galleries.index').'?flag[]=products'}}" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-11 rounded-full ml-3"></div>
                        محصولات
                    </a>
                    <a href="{{route('galleries.index').'?flag[]=sliders'}}" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-6 rounded-full ml-3"></div>
                        اسلایدر ها
                    </a>
                    <a href="{{route('galleries.index').'?flag[]=Transportations
                        &flag[]=PaymentGateways&flag[]=Uncategorized'}}" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-6 rounded-full ml-3"></div>
                        سایر
                    </a>
                    <a href="" class="flex-reverse-start items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="plus"></i> Add New Label </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->

        </div>
        <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
            <!-- BEGIN: File Manager Filter -->
            <div class="intro-y flex-justify-profile flex-col-reverse sm:flex-row items-center">

                <div class="w-full sm:w-auto flex">
                    @can('create-gallery')
                    <a data-toggle="modal" data-target="#CreateNewFile" href="javascript:;" class="button text-white bg-theme-1 shadow-md mr-2" onclick="addOrSelectGallery()">بارگزاری فایل جدید</a>
                    @endcan
                        <div class="dropdown relative">
                        <button class="dropdown-toggle button px-2 box text-gray-700">
                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                        </button>
                        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                            <div class="dropdown-box__content box p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Share Files </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: File Manager Filter -->
            <!-- BEGIN: Directory & Files -->
            <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                @foreach($galleries as $gallery)
                    <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                        <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                            <div class="absolute left-0 top-0 mt-3 ml-3">
                                <input class="input border border-gray-500 marked" onclick="multidelete(this);" value="{{$gallery->title}}" name="{{$gallery->id}}" type="checkbox">
                            </div>
                            <a href="" class="  mx-auto my-auto">
                                <div class="file__icon__gallerys m-auto justify-center items-center">
                                    <img src="{{str_replace('public/','/storage/',$gallery->path)}}" class="gallery_image ">
                                </div>
                            </a>
                            <a href="" class="block font-medium mt-4 text-center truncate">{{$gallery->title}}</a>
                            <div class="text-gray-600 text-xs text-center"></div>
                            <a class=" w-5 h-5 block tooltip "@if($gallery->created_at) title="{{$gallery->created_at}} آپلود شده در" @endif data-theme="dark" href="javascript:;"> <i data-feather="activity" class="w-5 h-5 text-gray-500"></i> </a>
                                <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                        <div class="dropdown-box__content box p-2">
                                            @can('edit-gallery')
                                                <a href="javascript:;" data-toggle="modal" id="submit" data-target="#galleryDelete{{$gallery->id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                            @endcan
                                            @can('delete-gallery')
                                                <a href="javascript:;" data-toggle="modal" id="submit" data-target="#galleryEdit{{$gallery->id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i>ویرایش</a>
                                                @endcan
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- END: Directory & Files -->
            <!-- BEGIN: Pagination -->
            <div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex-row sm:flex-no-wrap items-center ">
                {{--                                {{$gallerys->links()}}--}}
                @include('Pagination.Admin', ['paginator' => $galleries,'route' => 'galleries'])
            </div>            <!-- END: Pagination -->
        </div>
{{--        بارگزاری فایل جدید--}}
        @can('create-gallery')
        <div class="modal " id="CreateNewFile">
            <div class="modal__content upp" >
                <form action="{{route('galleries.store')}}" method="post" enctype="multipart/form-data" >
                    @csrf
                    <!-- Upload Area -->
                    <div id="uploadArea" class="upload-area ">
                        <!-- Headedd -->
                        <div class="upload-area__header">
                            <h1 class="upload-area__title">بارگزاری فایل</h1>
                            <p class="upload-area__paragraph">
                                <strong class="upload-area__tooltip">
                                    فرمت مجاز فایل ها
                                    <span class="upload-area__tooltip-data"></span> <!-- Data Will be Comes From Js -->
                                </strong>
                            </p>
                        </div>
                        <!-- End Header -->
                        <!-- Drop Zoon -->
                        <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
                                                                    <span class="drop-zoon__icon">
                                                                      <i class='bx bxs-file-image'></i>
                                                                    </span>
                            <p class="drop-zoon__paragraph">عکس خود را به انجا بکشید یا بارگزاری کنید </p>
                            <span id="loadingText" class="drop-zoon__loading-text">Please Wait</span>
                            <img src="" alt="Preview Image" id="previewImage" class="drop-zoon__preview-image" draggable="false">
                            <input type="file" id="fileInput" name="image" class="drop-zoon__file-input" accept="image/*">
                        </div>
                        <!-- End Drop Zoon -->

                        <!-- File Details -->
                        <div id="fileDetails" class="upload-area__file-details file-details">

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
                        <div class="mt-4 hidden" id="changeDetails">
                            <label for="FileName" class="  w-full h-full text-right float-right ml-2 text-blue-400" id="labelFileName">نام عکس </label>
                            <input class="  input w-full rtl border mt-2 align-right" value="" id="FileName" name="title">
                            <label  for="FileAlt" class="  w-full h-full text-right float-right ml-2 mt-2 text-blue-400" id="labelFileَAlt">َمتن جایگزین</label>
                            <input class="  input w-full rtl border mt-2 align-right" value="" id="FileAlt" name="alt" placeholder="alt عکس را وارد کنید ">
                        </div>

                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                        <input type="submit" class="button w-20 bg-theme-1 text-white" value="ثبت">
                    </div>
                    <!-- End Upload Area -->
                     </form>
            </div>

        </div>
        @endcan
{{--        حذف رسانه --}}
        @foreach($galleries as $gallery)
            {{--    DELETE Brand--}}
        @can('delete-gallery')
                <div class="modal" id="galleryDelete{{$gallery->id}}">
                    <div class="modal__content">
                        <form action="{{route('galleries.destroy',$gallery->id)}}" method="post" >
                            @csrf
                            @method('DELETE')

                            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">حذف عکس  <span style="color: darkred">{{$gallery->title}}</span></div>
                                {{--                        <div class="mt-3 ">--}}
                                {{--                            <div class="mt-2  flex" data-theme="light">--}}
                                {{--                                <p>حذف به همراه زیر دسته ها </p>--}}
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
        @can('edit-gallery')
                <div class="modal " id="galleryEdit{{$gallery->id}}">
                <div class="modal__content upp" >
                    <form action="{{route('galleries.update',$gallery)}}" method="post" enctype="multipart/form-data" >
                        @csrf
                        @method('PATCH')
                        <!-- Upload Area -->

                        <div id="uploadArea" class="upload-area ">
                            <!-- Headedd -->
                            <div class="upload-area__header">
                                <h1 class="upload-area__title">ویرایش عکس</h1>
                            </div>
                            <!-- End Header -->
                            <!-- Drop Zoon -->
                            <div id="dropZoon" class="upload-area__drop-zoon drop-zoon">
                                <span class="drop-zoon__icon">
                                  <i class='bx bxs-file-image'></i>
                                </span>
                                <img src="{{str_replace('public','/storage',$gallery->path)}}" alt="Preview Image" id="" class="editImageGallery" draggable="false">
                            </div>
                            <!-- End Drop Zoon -->

                            <!-- File Details -->
                            <div id="fileDetails" class="upload-area__file-details file-details">

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
                            <div class="mt-4 " id="">
                                <label  class="  w-full h-full text-right float-right ml-2 text-blue-400" id="labelFileName">نام عکس </label>
                                <input class="  input w-full rtl border mt-2 align-right" value="{{$gallery->title}}" id="FileName" name="title" >

                                <label  class="  w-full h-full text-right float-right ml-2 mt-2 text-blue-400" id="labelFileَAlt">َمتن جایگزین</label>
                                <input class="  input w-full rtl border mt-2 align-right" value="{{$gallery->alt}}" id="FileAlt" name="alt" placeholder="alt عکس را وارد کنید ">

                                <label class="  w-full h-full text-right float-right ml-2 mt-2 text-blue-400" id="labelFileFlag">شاخص </label>

                                <div class="mt-1 ">
                                    <select class="select2 block w-full border  mt-2" name="flag" style="width: 100% !important;">
                                        <option value="0" disabled label="انتخاب شاخص ... " selected="selected" name="flag" class="align-right" style="direction: rtl">انتخاب شاخص ... </option>
                                        @foreach($flag as $f)
                                            <option value="brands" @if($gallery->flag == $f)selected @endif label="{{$f}}">{{gallery_flag($f)}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="mt-5">
                                <input  type="submit"  name="submit" id=""  value="ذخیره اطلاعات"  class=" button w-32 text-white bg-theme-1 shadow-md shadow-md mr-1 mb-2 bg-theme-1 text-white ml-auto">
                            </div>
                        </div>

                        <!-- End Upload Area -->
                    </form>
                </div>

            </div>
            @endcan
                @endforeach

    </div>

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
    <script src="/Admin/js/GallertFileUploader.js"> </script>
@endsection

@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >رسانه ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
