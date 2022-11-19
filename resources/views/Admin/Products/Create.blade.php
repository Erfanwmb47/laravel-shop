@extends('Admin.Layout.Layout1')

@section('css')
    <link rel="stylesheet" href="/Admin/css/ProductGalleryUploader.css" type="text/css"/>
@endsection
@section('content')
    <div class="intro-y flex-reverse flex-col sm:flex-row items-center mt-8 rtl ml-auto">
        <h2 class="text-lg font-medium ml-auto">
            محصول جدید
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <div class="dropdown relative mr-2">
                <button class="dropdown-toggle button box text-gray-700 flex items-center"> English <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">English</span> </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="activity" class="w-4 h-4 mr-2"></i> <span class="truncate">Indonesian</span> </a>
                    </div>
                </div>
            </div>
            <button type="button" class="button box text-gray-700 mr-2 flex items-center ml-auto sm:ml-0"> <i class="w-4 h-4 mr-2" data-feather="eye"></i> Preview </button>
            <div class="dropdown relative">
                <button class="dropdown-toggle button text-white bg-theme-1 shadow-md flex items-center"> Save <i class="w-4 h-4 ml-2" data-feather="chevron-down"></i> </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> As New Post </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> As Draft </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Word </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pos intro-y grid grid-cols-12 gap-5 mt-5">
        <!-- BEGIN: Post Info -->
        <div class="col-span-12 lg:col-span-4  mt-0">

            <div class="box pb-5 ">
                <div class="font-medium  pr-2 pl-2 pt-2 flex-justify-profile  rtl items-center border-b border-gray-200 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> عکس محصول و گالری محصول </div>

                {{--                slider upload--}}
                <div class="btcd-f-input">
                    <div class="btcd-f-wrp">
                        <button class="btcd-inpBtn" type="button"><span> آپلود </span> <img src="" alt="" class="float-left"> </button>
                        <span class="btcd-f-title">بدون فایل</span>
                        <small class="f-max"> (Max 100 MB)</small>
                        <input multiple type="file" name="multiple[]" id=""onchange="func()">
                    </div>
                    <div class="btcd-files">
                    </div>
                </div>
                {{--                slider upload--}}
                <section class="carousel h-96" aria-label="Gallery">
                    <ol class="carousel__viewport ">

                    </ol>
                </section>

            </div>
            <div class="mt-5">
                <div class="intro-y box p-5">
                    <div>
                        <label>برند محصول </label>
                        <select data-hide-search="true" class=" select2 w-full border input">
                            <option value="1">
                                <div class="">
                                    <img class="rounded-md" alt="Midone Tailwind HTML Admin Template" src="/Admin/images/tanaz.jpg">
                                    Provecut
                                </div>
                            </option>
                            <option value="2">Johnny Deep</option>
                            <option value="3">Robert Downey, Jr</option>
                            <option value="4">Samuel L. Jackson</option>
                            <option value="5">Morgan Freeman</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label>Post Date</label>
                        <input data-timepicker="true" class="datepicker input w-full border mt-2">
                    </div>
                    <div class="mt-3">
                        <label>دسته بندی </label>
                        <div class="mt-2">
                            <select data-placeholder="Select categories" class="select2 w-full" multiple>
                                <option value="1" selected>شامپو</option>
                                <option value="2">کاندوم</option>
                                <option value="3" >صابون</option>
                                <option value="4">مسواک</option>
                                <option value="5">Comedy</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-3">
                        <label>هشتگ محصول</label>
                        <div class="mt-2">
                            <select data-placeholder="Select your favorite actors" class="select2 w-full" multiple>
                                <option value="1" selected>Leonardo DiCaprio</option>
                                <option value="2">Johnny Deep</option>
                                <option value="3" selected>Robert Downey, Jr</option>
                                <option value="4">Samuel L. Jackson</option>
                                <option value="5">Morgan Freeman</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Info -->
        <!-- BEGIN: Post Content -->
        <div class="intro-y col-span-12 lg:col-span-8">
            <input type="text" class="intro-y input input--lg w-full box pr-10 placeholder-theme-13" placeholder="نام محصول ">
            <div class="post intro-y overflow-hidden box mt-5 rtl">
                <div class="post__tabs nav-tabs flex flex-col sm:flex-row bg-gray-200 text-gray-600  ">
                    <a title="Fill in the article content" data-toggle="tab" data-target="#content" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center active"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> درباره محصول </a>
                    <a title="Adjust the meta title" data-toggle="tab" data-target="#abstract" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center"> <i data-feather="code" class="w-4 h-4 mr-2"></i> توضیحات مختصر </a>
                    <a title="Use search keywords" data-toggle="tab" data-target="#attribut" href="javascript:;" class="tooltip w-full sm:w-40 py-4 text-center flex justify-center items-center"> <i data-feather="align-left" class="w-4 h-4 mr-2"></i> ویژگی ها  </a>
                </div>
                <div class="post__content tab-content ">
                    <div class="tab-content__pane p-5 active" id="content">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="font-medium mr-0 flex items-center border-b border-gray-200 pb-5"> <i data-feather="chevron-down" class="w-4 h-4 mr-2"></i> توضیحات محصول </div>
                            <div class="mt-5">
                                <textarea data-feature="all" class="summernote" data-height="250" name="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane p-5 " id="abstract">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5"> انی توضیخات در بالای صفحه محصول نمایش داده میشود </div>
                            <div class="mt-5">
                                <textarea data-feature="all" class="summernote" data-height="250" name="editor"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane p-5 " id="attribut">
                        <div class="border border-gray-200 rounded-md p-5">
                            <div class="font-medium flex items-center border-b border-gray-200 pb-5">ویژگی های محصول  </div>

                            <div class="mt-5">
                                <div class="mt-3">
                                    <label>کشور سازنده</label>
                                    <div class="relative mt-2">
                                        <input type="text" class="input w-full border mt-2" placeholder="کشور را وارد کنید">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Post Content -->
    </div>

@endsection
@section('js')
    <script src="https://cdn.polyfill.io/v2/polyfill.min.js"></script>
    <script src="https://unpkg.com/create-file-list@1.0.1/dist/create-file-list.min.js"></script>
    <script src="/Admin/js/ProductGalleryUploader.js"></script>
@endsection
