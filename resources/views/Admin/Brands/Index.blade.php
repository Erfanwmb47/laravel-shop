
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />
    <link rel="stylesheet" href="/Admin/css/GalleryFileUploader.css" />

@endsection
@section('content')

    <div class="grid-rtl grid-cols-12 gap-6 mt-8">
        <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
            <h2 class="intro-y text-lg font-medium ml-auto mt-2">
                برند محصولات            </h2>
            <!-- BEGIN: File Manager Menu -->
            <div class="intro-y box p-5 mt-6">
                <div class="mt-1">
                    <a href="" class="flex items-center px-3 py-2 rounded-md bg-theme-1 text-white font-medium"> <i class="w-4 h-4 mr-2" data-feather="image"></i> Images </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="video"></i> Videos </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="file"></i> Documents </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="users"></i> Shared </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="trash"></i> Trash </a>
                </div>
                <div class="border-t border-gray-200 mt-5 pt-5">
                    <a href="" class="flex items-center px-3 py-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                        Custom Work
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-9 rounded-full mr-3"></div>
                        Important Meetings
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                        Work
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                        Design
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md">
                        <div class="w-2 h-2 bg-theme-6 rounded-full mr-3"></div>
                        Next Week
                    </a>
                    <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 mr-2" data-feather="plus"></i> Add New Label </a>
                </div>
            </div>
            <!-- END: File Manager Menu -->
        </div>
        <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
            <!-- BEGIN: جست و جو ثبت برند] -->
            <div class="intro-y flex flex-col-reverse sm:flex-row items-center" id="ggg">
                <div class="w-full sm:w-auto relative ml-auto mt-3 sm:mt-0">
                    <form>
                        <input type="text"   name="search" class="input w-56 box pr-10 placeholder-theme-13 rtl" placeholder="جست و جو ..." value="{{request('search')}}">
                        <button type="submit" class=" absolute my-auto inset-y-0 mr-3 right-0 foc"><i class="w-4 h-4" data-feather="search"></i></button>
                    </form>
                </div>
                <div class="w-full sm:w-auto flex-reverse ">
                    <a href="{{route('brands.create')}}" class="button text-white bg-theme-1 shadow-md ml-2">ثبت برند جدید</a>
                    <div class="dropdown relative">
                        <button disabled class="dropdown-toggle button px-2 box text-gray-700 w-14 h-14">
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
            <form action="{{route('brands.multiDestroy')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <div class="ml-0 w-full col-span-12 flex-justify-profile">
                    <input type="checkbox" title="انتخاب همه" onClick="toggle(this)" class=" tooltip input border border-gray-500 marked mt-5 ml-0 float-left" /> <br>
                    @can('delete-brand')
                        <button type="submit" title="حذف موارد انتخاب شده " class="tooltip button bg-theme-6 text-white hidden mr-auto ml-2 mt-3  align-center" id="deleteAll"  name="deleteAll" ><i data-feather="trash-2" class=" w-5 m-auto items-center float-left mr-2"></i>حذف موارد </button>
                    @endcan
                </div>
                <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5">
                    @foreach($brands as $brand)
                        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-3 xxl:col-span-2">
                            <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                                <div class="absolute left-0 top-0 mt-3 ml-3">
                                    <input class="input border border-gray-500 marked" onclick="multidelete(this);" value="{{$brand->name}}" name="{{$brand->id}}" type="checkbox">
                                </div>
                                <a href="" class="  mx-auto my-auto">
                                    <div class="file__icon__brands m-auto justify-center items-center">

                                        @if($brand->gallery)
                                            <img src="{{str_replace('public','/storage',$brand->gallery->path)}}" class="brand_image ">
                                        @endif
                                    </div>
                                </a>
                                <a href="" class="block font-medium mt-4 text-center truncate">{{$brand->name}}</a>
                                <div class="text-gray-600 text-xs text-center">{{$brand->country->name}}</div>
                                <a class=" w-5 h-5 block tooltip " title="15 محصول ثبت شده  در سایت" data-theme="dark" href="javascript:;"> <i data-feather="activity" class="w-5 h-5 text-gray-500"></i> </a>
                                    <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                            <div class="dropdown-box__content box p-2">
                                                @can('edit-brand')
                                                    <a href="javascript:;" data-toggle="modal" data-target="#BrandModal{{$brand->id}}" onclick="addOrSelectGallery({{$brand->id}})" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> ویرایش </a>
                                                @endcan
                                                @can('delete-brand')
                                                    <a href="javascript:;" data-toggle="modal" id="submit" data-target="#BrandDelete{{$brand->id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                                    @endcan
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>
            <!-- END: Directory & Files -->
            <!-- BEGIN: Pagination -->
            <div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex -row sm:flex-no-wrap items-center ">
                {{--                                {{$brands->links()}}--}}
                @include('Pagination.Admin', ['paginator' => $brands,'route' => 'brands'])
            </div>
            <!-- END: Pagination -->
        </div>

    </div>
        @foreach($brands as $brand)
            {{--        modal-edit brands--}}
            @can('edit-brand')
                <div class="modal" id="BrandModal{{$brand->id}}">
                    <div class="modal__content modal__content--xl">
                        <form action="{{route('brands.update',$brand)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                                <h2 class="font-medium text-base ml-auto">
                                    ویرایش برند {{$brand->name}}
                                </h2>
                                <div class="dropdown relative sm:hidden">
                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                                        <div class="dropdown-box__content box p-2">
                                            <a href="javascript:;" class="flex items-center p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-12 lg:col-span-12">
                                <div class="intro-y pr-1">
                                    <div class="box p-2">
                                        <div class="pos__tabs nav-tabs justify-center flex">
                                            <a data-toggle="tab" data-target="#category{{$brand->id}}" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">مشخصات کلی</a>
                                            <a data-toggle="tab" data-target="#Description{{$brand->id}}" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                                            <a data-toggle="tab" data-target="#Image{{$brand->id}}" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس برند</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-content">
                                    <div class="tab-content__pane active" id="category{{$brand->id}}">
                                        <div class="pos__ticket box p-2 mt-5">
                                            <div class="intro-y box">
                                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                                    <p> در این قسمت مشخصات کلی برند را انتخاب کنید</p>
                                                </div>
                                                <div class="p-5 " id="input">
                                                    <div class="preview grid-rtl grid-cols-12">
                                                        <div class="col-span-6 ml-2">
                                                            <label for="name"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام برند</label>
                                                            <input type="text" id="name"  name="name" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="" value="{{$brand->name}}">
                                                        </div>
                                                        <div class="col-span-6">
                                                            <label for="tag"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>تگ </label>
                                                            <input type="text" name="tag" id="tag" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="" value="{{$brand->tag}}">
                                                        </div>
                                                        <div class="col-span-6 mt-2">
                                                            <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>کشور </label>
                                                            <select class="select2 block w-full border " name="country">
                                                                <option value="0" disabled label="انتخاب کشور ... " selected="selected" class="align-right" style="direction: rtl">انتخاب کشور ... </option>
                                                                @foreach($countries as $cou)
                                                                    <option value="{{$cou->id}}"  @if($brand->country->id == $cou->id) selected @endif label="{{$cou->name}}">{{$cou->name}}/{{$cou->per_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content__pane" id="Description{{$brand->id}}">
                                        <div class="box p-5 mt-5">
                                            <div class="col-span-12 lg:col-span-6">
                                                <div class="box">
                                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 bg-indigo-100">
                                                        <p> توضیحات برند را در کادر زیر وارد کنید</p>
                                                    </div>
                                                    <div class="p-5" id="simple-editor">
                                                        <div class="preview">
                                                            <textarea data-feature="" class="summernote rtl "  name="description" placeholder="">{{$brand->description}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content__pane" id="Image{{$brand->id}}">
                                        <div class="grid grid-cols-12 p-3 ">
                                            <div class=" col-span-4  mr-2">
                                                <div class=" p-5 mt-5">
                                                    <div class="col-span-12 lg:col-span-6">
                                                        <div class="intro-y ">
                                                            <div id="uploadArea{{$brand->id}}" class="upload-area ">
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
                                                                <div id="dropZoon{{$brand->id}}" class="upload-area__drop-zoon drop-zoon">
                                                                    <span class="drop-zoon__icon">
                                                                      <i class='bx bxs-file-image'></i>
                                                                    </span>
                                                                    <p class="drop-zoon__paragraph">عکس خود را به انجا بکشید یا بارگزاری کنید </p>
                                                                    <span id="loadingText{{$brand->id}}" class="drop-zoon__loading-text">Please Wait</span>
                                                                    <img src="" alt="Preview Image" id="previewImage{{$brand->id}}" class="drop-zoon__preview-image" draggable="false">
                                                                    <input type="file" id="fileInput{{$brand->id}}" name="image" class="drop-zoon__file-input" accept="image/*">
                                                                </div>
                                                                <!-- End Drop Zoon -->

                                                                <!-- File Details -->
                                                                <div id="fileDetails{{$brand->id}}" class="upload-area__file-details file-details">

                                                                    <div id="uploadedFile{{$brand->id}}" class="uploaded-file">
                                                                        <div class="uploaded-file__icon-container">
                                                                            <i class='bx bxs-file-blank uploaded-file__icon'></i>
                                                                            <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
                                                                        </div>

                                                                        <div id="uploadedFileInfo{{$brand->id}}" class="uploaded-file__info">
                                                                            <span class="uploaded-file__name">Proejct 1</span>
                                                                            <span class="uploaded-file__counter">0%</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- End File Details -->
                                                                <div class="mt-4 hidden" id="changeDetails{{$brand->id}}">
                                                                    <label for="FileName{{$brand->id}}" class="  w-full h-full text-right float-right ml-2 text-blue-400" id="labelFileName">نام عکس </label>
                                                                    <input class="  input w-full rtl border mt-2 align-right" value="" id="FileName{{$brand->id}}" name="title">
                                                                    <label  for="FileAlt" class="  w-full h-full text-right float-right ml-2 mt-2 text-blue-400" id="labelFileَAlt">َمتن جایگزین</label>
                                                                    <input class="  input w-full rtl border mt-2 align-right" value="" id="FileAlt" name="alt" placeholder="alt عکس را وارد کنید ">
                                                                </div>

                                                            </div>                                    <!-- End Upload Area -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class=" col-span-8 rtl mb-4" >
                                                <div class="grid grid-cols-12 gap-1">
                                                    <div class="col-span-2 dropdown relative">
                                                        <button class="dropdown-toggle button px-2 box text-gray-700">
                                                            <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                                                        </button>
                                                        <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-50">
                                                            <div class="dropdown-box__content box p-2">
                                                                <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Share Files </a>
                                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-span-8 relative text-gray-700">
                                                        <input  type="text" class="input input--lg w-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="جست و جو میان تصاویر">
                                                        <i class="w-4 h-4 hidden sm:absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                                                    </div>
                                                </div>

                                                <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5 relative overflow-x-auto scrollbar-hidden h-128" id="showGallery{{$brand->id}}">
                                                    @foreach($galleries as $gallery)
                                                        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-4 xxl:col-span-3">
                                                            <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                                                                <div class="absolute left-0 top-0 mt-3 ml-3">

                                                                    <input class="input border border-gray-500 marked" @if($brand->gallery) @if($brand->gallery->id == $gallery->id)checked  @endif  @endif id="{{$gallery->id}}" value="{{$gallery->id}}" name="selectedImage" type="radio">

                                                                </div>
                                                                <a href="" class="  mx-auto my-auto">
                                                                    <div class="file__icon__gallerys m-auto justify-center items-center">
                                                                        <img src="{{str_replace('public','/storage',$gallery->path)}}" class="gallery_image ">
                                                                    </div>
                                                                </a>
                                                                <a href="" class="block font-medium mt-4 text-center truncate">{{$gallery->title}}</a>
                                                                <div class="text-gray-600 text-xs text-center"></div>
                                                                <a class=" w-5 h-5 block tooltip " title="15 محصول ثبت شده  در سایت" data-theme="dark" href="javascript:;"> <i data-feather="activity" class="w-5 h-5 text-gray-500"></i> </a>
                                                                <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                                                        <div class="dropdown-box__content box p-2">
                                                                            <a href="javascript:;" data-toggle="modal" id="submit" data-target="#galleryDelete{{$gallery->id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="px-5 py-3 text-right border-t border-gray-200">
                                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                                <input type="submit" class="button w-20 bg-theme-1 text-white" value="ویرایش">
                            </div>
                        </form>
                    </div>
                </div>
            @endcan
            {{--    DELETE Brand--}}
            @can('delete-brand')
                <div class="modal" id="BrandDelete{{$brand->id}}">
                    <div class="modal__content">
                        <form action="{{route('brands.destroy',$brand->id)}}" method="post" >
                            @csrf
                            @method('DELETE')

                            <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">حذف برند  <span style="color: darkred">{{$brand->name}}</span></div>
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

    <script src="/Admin/js/GallertFileUploader.js"> </script>
    <script src="/Admin/js/test1.js"> </script>
@endsection


    @component('Admin.Layout.Layout1')
        @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >برند ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
        @endslot
    @endcomponent

