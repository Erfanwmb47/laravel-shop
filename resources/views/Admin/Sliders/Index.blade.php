@extends('Admin.Layout.Layout1')


@section('content')
{{--مودال ویرایش اسلاید ها --}}
    <div class="modal" id="header-footer-modal-preview">
        <div class="modal__content modal__content--xl">
            <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                <h2 class="font-medium text-base ml-auto">
                    ویرایش دسته بندی
                </h2>

                {{--                    <button class="button border items-center text-gray-700 hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </button>--}}
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
                            <a data-toggle="tab" data-target="#Specifications" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">سربرگ</a>
                            <a data-toggle="tab" data-target="#description" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                            <a data-toggle="tab" data-target="#image" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس اسلایدر</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-content__pane active" id="Specifications">
                        <div class="pos__ticket box p-2 mt-5">
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                    <p> در این قسمت مشخصات کلی اسلایدر را انتخاب کنید</p>
                                </div>
                                <div class="p-5 " id="input">
                                    <div class="preview grid-rtl grid-cols-12">
                                        <div class="col-span-6 ml-2">
                                            <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>سربرگ</label>
                                            <input type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="سربرگ">
                                        </div>
                                        <div class="col-span-6">
                                            <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>لینک </label>
                                            <input type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="لینک">
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
                                        <p> توضیحات اسلایدر را در کادر زیر وارد کنید</p>
                                    </div>
                                    <div class="p-5" id="simple-editor">
                                        <div class="preview">
                                            <form method="post" class="rtl">
                                                <textarea data-feature="" class="summernote rtl "  name="editor" placeholder="توضیحات اسلایدر"></textarea>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane" id="image">
                        <div class="box p-5 mt-5">
                            <div class="col-span-12 lg:col-span-6">
                                <div class="intro-y box">
                                    <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                        <p>عکس اسلایدر مورد نظر را اینجا بارگزاری کنید</p>
                                    </div>
                                    <div class="p-5 bg-theme-42" id="single-file-upload ">
                                        <div class="preview">
                                            <form data-single="true" action="/file-upload" class="dropzone border-gray-200 border-dashed">
                                                <div class="fallback bg-theme-42">
                                                    <input name="file" type="file" />
                                                </div>
                                                <div class="dz-message" data-dz-message>
                                                    <div class="text-lg font-medium">اینجا کلیک کنید و یا عکس را اینجا رها کنید</div>
                                                    <div class="text-gray-600"> حداکثر اندازه مجاز برای آپلود تصویر 1 مگابایت است  </div>
                                                    <img src="/Admin/images/Sliders/side2.jpg" class=" w-auto m-auto h-32 rounded">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="px-5 py-3 text-right border-t border-gray-200">
                <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                <button type="button" class="button w-20 bg-theme-1 text-white">ویرایش</button>
            </div>
        </div>
    </div>
{{--مودال  ویرایش اسلایدر --}}
<div class="modal" id="slider-edit">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base ml-auto">
                ویرایش دسته بندی
            </h2>
            {{--                    <button class="button border items-center text-gray-700 hidden sm:flex"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Download Docs </button>--}}
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
                        <a data-toggle="tab" data-target="#Specifications1" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">سربرگ</a>
                        <a data-toggle="tab" data-target="#description1" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-content__pane active" id="Specifications1">
                    <div class="pos__ticket box p-2 mt-5">
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                <p> در این قسمت مشخصات کلی اسلایدر را انتخاب کنید</p>
                            </div>
                            <div class="p-5 " id="input">
                                <div class="preview grid-rtl grid-cols-12">
                                    <div class="col-span-6 ml-2">
                                        <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>سربرگ</label>
                                        <input type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="سربرگ">
                                    </div>
                                    <div class="col-span-6">
                                        <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>آدرس </label>
                                        <div>
                                            <div class="mt-2"> <select class="select2 w-full">
                                                    <option value="1">صفحه  اصلی</option>
                                                    <option value="2">صفحه  محصول</option>
                                                    <option value="3">درباره ما </option>
                                                    <option value="4">Samuel L. Jackson</option>
                                                    <option value="5">Morgan Freeman</option>
                                                </select> </div>
                                        </div>                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="tab-content__pane" id="description1">
                    <div class="box p-5 mt-5">
                        <div class="col-span-12 lg:col-span-6">
                            <div class="box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 bg-indigo-100">
                                    <p> توضیحات اسلایدر را در کادر زیر وارد کنید</p>
                                </div>
                                <div class="p-5" id="simple-editor">
                                    <div class="preview">
                                        <form method="post" class="rtl">
                                            <textarea data-feature="" class="summernote rtl "  name="editor" placeholder="توضیحات اسلایدر"></textarea>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
            <button type="button" class="button w-20 bg-theme-1 text-white">ویرایش</button>
        </div>
    </div>
</div>
{{--افزودن اسلایدر جدید--}}
<div class="modal" id="slider-create">
    <div class="modal__content modal__content--xl">
        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
            <h2 class="font-medium text-base ml-auto">
                افزودن اسلایدر
            </h2>
        </div>

        <div class="col-span-12 lg:col-span-12">
            <div class="intro-y pr-1">
                <div class="box p-2">
                    <div class="pos__tabs nav-tabs justify-center flex">
                        <a data-toggle="tab" data-target="#Specifications2" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">سربرگ</a>
                        <a data-toggle="tab" data-target="#description2" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                        <a data-toggle="tab" data-target="#image2" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس اسلایدر</a>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-content__pane active" id="Specifications2">
                    <div class="pos__ticket box p-2 mt-5">
                        <div class="intro-y box">
                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                <p> در این قسمت مشخصات کلی اسلایدر را انتخاب کنید</p>
                            </div>
                            <div class="p-5 " id="input">
                                <div class="preview grid-rtl grid-cols-12">
                                    <div class="col-span-6 ml-2">
                                        <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>سربرگ</label>
                                        <input type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="سربرگ">
                                    </div>
                                    <div class="col-span-6">
                                        <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>لینک </label>
                                        <input type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="لینک">
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="tab-content__pane" id="description2">
                    <div class="box p-5 mt-5">
                        <div class="col-span-12 lg:col-span-6">
                            <div class="box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 bg-indigo-100">
                                    <p> توضیحات اسلایدر را در کادر زیر وارد کنید</p>
                                </div>
                                <div class="p-5" id="simple-editor">
                                    <div class="preview">
                                        <form method="post" class="rtl">
                                            <textarea data-feature="" class="summernote rtl "  name="editor" placeholder="توضیحات اسلایدر"></textarea>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-content__pane" id="image2">
                    <div class="box p-5 mt-5">
                        <div class="col-span-12 lg:col-span-6">
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                    <p>عکس اسلایدر مورد نظر را اینجا بارگزاری کنید</p>
                                </div>
                                <div class="p-5 bg-theme-42" id="single-file-upload ">
                                    <div class="preview">
                                        <form  action="/file-upload" class="dropzone border-gray-200 border-dashed">
                                            <div class="fallback bg-theme-42">
                                                <input name="file" type="file" multiple />
                                            </div>
                                            <div class="dz-message" data-dz-message>
                                                <div class="text-lg font-medium">اینجا کلیک کنید و یا عکس را اینجا رها کنید</div>
                                                <div class="text-gray-600"> حداکثر اندازه مجاز برای آپلود تصویر 1 مگابایت است  </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="px-5 py-3 text-right border-t border-gray-200">
            <a href="">
            <button type="reset" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button></a>
            <button type="button" class="button w-20 bg-theme-1 text-white">ویرایش</button>
        </div>
    </div>
</div>

    <h2 class="intro-y text-lg font-medium mt-10 flex">
اسلایدرها     </h2>

    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <button class="button text-white bg-theme-1 shadow-md mr-2">افزودن اسلایدر  جدید</button>
            <div class="dropdown relative mr-2">
                <a href="javascript:;" data-toggle="modal" data-target="#slider-create" class="">
                <button class="button px-2 box text-gray-700 " >
                    <span class="w-5 h-5 flex items-center justify-center "> <i class=" fa fa-plus w-3 h-3" >

                    </i>
                    </span>
                </button>
                </a>
            </div>
            <div class="hidden md:block mx-auto text-gray-600"></div>

        </div>

    </div>

    <!-- Main Slider -->
    <!-- Sub Categories-->
    <div class="grid grid-cols-12 gap-6 mt-5 ">
        <div class="intro-y col-span-12 lg:col-span-12 justify-center mt-10 ">
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <div class="ml-auto">
                        <h2 class="font-medium text-base ml-auto">
تخفیف های ویژه                        </h2>
                        <p class="text-xs" style="color: #99a4eb">
صفحه اصلی وبسایت                        </p>
                    </div>
                    {{--<div class="absolute top-0 left-0 ml-2 mt-2 dropdown mr-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 left-0 z-10">
                            <div class="dropdown-box__content box p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> ویرایش </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف  </a>
                            </div>
                        </div>
                    </div>--}}
                    <div class="absolute top-0 left-0 ml-2 mt-5 dropdown mr-auto flex">
                        <a href="javascript:;" data-toggle="modal" data-target="#header-footer-modal-preview" class=" flex-reverse items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-blue-200 rounded-md tooltip cursor-pointer" title="ویرایش"> <i data-feather="edit" class="w-4 h-4 mr-auto"></i> </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-red-200 rounded-md tooltip cursor-pointer" title="حذف"> <i data-feather="trash" class="w-4 h-4 mr-auto"></i></a>
                    </div>
                </div>
                <div class="p-5" id="multiple-item-slider">
                    <div class="preview">
                        <div class="slider mx-6 Slider-Index">
                            <div class="h-auto px-2 mt-2 mb-5">
                                <div class="file  bg-gray-100 rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in2 h-auto ">
                                    <div class="absolute left-0 top-0 mt-3 ml-3">
                                        <input class="input border border-gray-500" type="checkbox">
                                    </div>
                                    <img src="/Admin/images/Sliders/main.jpg" class=" w-auto h-48 m-auto  rounded">
                                    <a href="" class="block font-medium mt-4 text-center truncate"  >همین الان بخرید </a>
                                    <p class="block font-medium mt-4 text-center truncate text-blue-300"  >فروش ویژه محصولات پامشوما</p>
                                    <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                            <div class="dropdown-box__content box p-2">
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> ویرایش </a>
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-auto px-2 mt-2 mb-5">
                                <div class="file  bg-gray-100 rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in2 h-auto ">
                                    <div class="absolute left-0 top-0 mt-3 ml-3">
                                        <input class="input border border-gray-500" type="checkbox">
                                    </div>
                                    <img src="/Admin/images/Sliders/main2.jpg" class=" w-auto m-auto  rounded h-48">
                                    <a href="" class="block font-medium mt-4 text-center truncate"  >همین الان بخرید </a>
                                    <p class="block font-medium mt-4 text-center truncate text-blue-300"  >فروش ویژه محصولات پامشوما</p>
                                    <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                            <div class="dropdown-box__content box p-2">
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> ویرایش </a>
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--        modal-edit--}}
    </div>
    <!-- Sub Sub Categories -->
    <div class="grid grid-cols-12 gap-6 mt-5 ">
        <div class="intro-y col-span-12 lg:col-span-12 justify-center mt-10 ">
            <div class="intro-y box mt-5">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                    <div class="ml-auto">
                        <h2 class="font-medium text-base ml-auto">
                            تخفیف های کنار                        </h2>
                        <p class="text-xs" style="color: #99a4eb">
                            صفحه محصول                        </p>
                    </div>
                    {{--<div class="absolute top-0 left-0 ml-2 mt-2 dropdown mr-auto">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 left-0 z-10">
                            <div class="dropdown-box__content box p-2">
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> ویرایش </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف  </a>
                            </div>
                        </div>
                    </div>--}}
                    <div class="absolute top-0 left-0 ml-2 mt-5 dropdown mr-auto flex">
                        <a href="javascript:;" data-toggle="modal" data-target="#slider-edit" class=" flex-reverse items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-blue-200 rounded-md tooltip cursor-pointer" title="ویرایش"> <i data-feather="edit" class="w-4 h-4 mr-auto"></i> </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-red-200 rounded-md tooltip cursor-pointer" title="حذف"> <i data-feather="trash" class="w-4 h-4 mr-auto"></i></a>
                    </div>
                </div>
                <div class="p-5" id="multiple-item-slider">
                    <div class="preview">
                        <div class="slider mx-6 Slider-Index">
                            <div class="h-auto px-2 mt-2 mb-5">
                                <div class="file  bg-gray-100 rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in2 h-auto ">
                                    <div class="absolute left-0 top-0 mt-3 ml-3">
                                        <input class="input border border-gray-500" type="checkbox">
                                    </div>
                                    <div class="h-96 ">
                                        <img src="/Admin/images/Sliders/side2.jpg" class=" w-auto m-auto h-auto max-h-96 rounded">
                                    </div>
                                    <a href="" class="block font-medium mt-4 text-center truncate"  >همین الان بخرید </a>
                                    <p class="block font-medium mt-4 text-center truncate text-blue-300"  >فروش ویژه محصولات پامشوما</p>
                                    <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                            <div class="dropdown-box__content box p-2">
                                                <a href="javascript:;"  data-toggle="modal" data-target="#header-footer-modal-preview" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> ویرایش </a>
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="h-auto px-2 mt-2 mb-5">
                                <div class="file  bg-gray-100 rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in2 h-auto ">
                                    <div class="absolute left-0 top-0 mt-3 ml-3">
                                        <input class="input border border-gray-500" type="checkbox">
                                    </div>
                                    <div class="h-96 ">
                                        <img src="/Admin/images/Sliders/side.jpg" class=" w-auto m-auto h-auto max-h-96 rounded">
                                    </div>
                                    <a href="" class="block font-medium mt-4 text-center truncate"  >همین الان بخرید </a>
                                    <p class="block font-medium mt-4 text-center truncate text-blue-300"  >فروش ویژه محصولات پامشوما</p>
                                    <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                            <div class="dropdown-box__content box p-2">
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> ویرایش </a>
                                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{--        modal-edit--}}
    </div>

@endsection
