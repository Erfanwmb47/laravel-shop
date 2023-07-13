
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />
    <link rel="stylesheet" href="/Admin/css/GalleryFileUploader.css" />


@endsection

@section('content')
    <div class="pos intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-12">
            <h2 class="intro-y text-lg font-medium mt-10 flex">
                ویرایش اسلایدر  {{$slider->title}}           </h2>
            <p class="intro-y text-xs font-medium  flex mb-5 " style="color: #4a5568">برای ویرایش اسلایدر جدید فیلد های مورد نظر را پر کرده و در نهایت اطلاعات را ذخیره کنید</p>
            <hr>
        </div>
        {{--Begin new Category--}}

        <div class="col-span-12 lg:col-span-12">
            <form action="{{route('sliders.update',$slider)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <div class="pos__tabs nav-tabs justify-center flex">
                            <a data-toggle="tab" data-target="#Specifications" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">مشخصات کلی</a>
                            <a data-toggle="tab" data-target="#description" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                            <a data-toggle="tab" data-target="#image" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس اسلایدر</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-content__pane active" id="Specifications" >
                        <div class="pos__ticket box p-2 mt-5">
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                    <p> در این قسمت مشخصات کلی اسلایدر  را انتخاب کنید</p>
                                </div>
                                <div class="p-5 " id="input">
                                    <div class="preview grid-rtl grid-cols-12">
                                        <div class="col-span-4 ml-2">
                                            <label for="SliderTitle"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>عنوان اسلایدر</label>
                                            <input name="SliderTitle" id="SliderTitle" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="عنوان" value="{{$slider->title}}">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label for="tag"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>تگ </label>
                                            <input name="tag" id="tag" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="تگ" value="{{$slider->tag}}">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label for="offer"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>تخفیف % (اختیاری) </label>
                                            <input name="offer" id="offer" type="number" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="تخفیف " value="{{$slider->offer}}">
                                        </div>
                                        <div class="mt-2 ml-2 col-span-12">
                                            <label for="link"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>لینک مورد نظر </label>
                                            <input name="link" id="link" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="لینک " value="{{$slider->link}}">
                                        </div>

{{--                                        <div class="col-span-6" id="attribute-${id}">--}}
{{--                                            <div id="attributes" data-attributes = "{{json_encode(\App\Models\Slider::groupBy('flag')->pluck('flag'))}}"></div>--}}
{{--                                            <div class="mt-3 grid-cols-12 grid">--}}
{{--                                                <div class="col-span-12" id="attribute_section">--}}

{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
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
                                        <p> توضیحات اسلایدر را در کادر زیر وارد کنید</p>
                                    </div>
                                    <div class="p-5" id="simple-editor">
                                        <div class="preview">
                                            <textarea data-feature=""  class="summernote rtl "  name="description" placeholder="توضیحات اسلایدر">
                                                {{$slider->description}}
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane" id="image">
                        <div class="grid grid-cols-12 p-3 ">
                            <div class=" col-span-4  mr-2">
                                <div class=" p-5 mt-5">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="intro-y ">
                                            <div id="uploadArea{{$slider->id}}" class="upload-area ">
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
                                                <div id="dropZoon{{$slider->id}}" class="upload-area__drop-zoon drop-zoon">
                                                                    <span class="drop-zoon__icon">
                                                                      <i class='bx bxs-file-image'></i>
                                                                    </span>
                                                    <p class="drop-zoon__paragraph">عکس خود را به انجا بکشید یا بارگزاری کنید </p>
                                                    <span id="loadingText{{$slider->id}}" class="drop-zoon__loading-text">Please Wait</span>
                                                    <img src="" alt="Preview Image" id="previewImage{{$slider->id}}" class="drop-zoon__preview-image" draggable="false">
                                                    <input type="file" id="fileInput{{$slider->id}}" name="image" class="drop-zoon__file-input" accept="image/*">
                                                </div>
                                                <!-- End Drop Zoon -->

                                                <!-- File Details -->
                                                <div id="fileDetails{{$slider->id}}" class="upload-area__file-details file-details">

                                                    <div id="uploadedFile{{$slider->id}}" class="uploaded-file">
                                                        <div class="uploaded-file__icon-container">
                                                            <i class='bx bxs-file-blank uploaded-file__icon'></i>
                                                            <span class="uploaded-file__icon-text"></span> <!-- Data Will be Comes From Js -->
                                                        </div>

                                                        <div id="uploadedFileInfo{{$slider->id}}" class="uploaded-file__info">
                                                            <span class="uploaded-file__name">Proejct 1</span>
                                                            <span class="uploaded-file__counter">0%</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End File Details -->
                                                <div class="mt-4 hidden" id="changeDetails{{$slider->id}}">
                                                    <label for="FileName{{$slider->id}}" class="  w-full h-full text-right float-right ml-2 text-blue-400" id="labelFileName">نام عکس </label>
                                                    <input class="  input w-full rtl border mt-2 align-right" value="" id="FileName{{$slider->id}}" name="title">
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

                                <div class="intro-y grid grid-cols-12 gap-3 sm:gap-6 mt-5 relative overflow-x-auto scrollbar-hidden h-128" id="showGallery{{$slider->id}}">
                                    @foreach($galleries as $gallery)
                                        <div class="intro-y col-span-6 sm:col-span-4 md:col-span-4 xxl:col-span-3">
                                            <div class="file box rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">
                                                <div class="absolute left-0 top-0 mt-3 ml-3">

                                                    <input class="input border border-gray-500 marked" @if($slider->gallery) @if($slider->gallery->id == $gallery->id)checked  @endif  @endif id="{{$gallery->id}}" value="{{$gallery->id}}" name="selectedImage" type="radio">

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
                <div class="flex mt-5">
                    <button   class="button w-32 border shadow-md mr-1 mb-2 bg-gray-200 text-gray-600 ml-2">انصراف</button>
                    <input   type="submit"  name="submit"  value="ذخیره اطلاعات" class="button w-32 text-white bg-theme-1 shadow-md shadow-md mr-1 mb-2 bg-theme-1 text-white ml-auto">
                </div>
            </form>
        </div>

    </div>
@endsection
@section('js')
    <script src="/Admin/js/GallertFileUploader.js"> </script>
    <script src="/Admin/js/SliderFlagSelect.js"> </script>
@endsection

@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" disabled >ویرایش اسلایدر</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('sliders.index')}}" class="breadcrumb--active" >اسلایدر ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
