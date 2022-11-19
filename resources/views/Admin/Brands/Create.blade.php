@extends('Admin.Layout.Layout1')
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />
    <link rel="stylesheet" href="/Admin/css/GalleryFileUploader.css" />


@endsection

@section('content')
    <div class="pos intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-12">
            <h2 class="intro-y text-lg font-medium mt-10 flex">
                ایجاد برند جدید            </h2>
            <p class="intro-y text-xs font-medium  flex mb-5 " style="color: #4a5568">برای ایجاد برند جدید فیلد های مورد نظر را پر کرده و در نهایت اطلاعات را ذخیره کنید</p>
            <hr>
        </div>
        {{--Begin new Category--}}

        <div class="col-span-12 lg:col-span-12">
            <form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <div class="pos__tabs nav-tabs justify-center flex">
                            <a data-toggle="tab" data-target="#Specifications" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">مشخصات کلی</a>
                            <a data-toggle="tab" data-target="#description" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                            <a data-toggle="tab" data-target="#image" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس برند</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-content__pane active" id="Specifications">
                        <div class="pos__ticket box p-2 mt-5">
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                    <p> در این قسمت مشخصات کلی برند  را انتخاب کنید</p>
                                </div>
                                <div class="p-5 " id="input">
                                    <div class="preview grid-rtl grid-cols-12">
                                        <div class="col-span-4 ml-2">
                                            <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام برند</label>
                                            <input name="name" id="name" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>تگ </label>
                                            <input name="tag" id="tag" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="تگ">
                                        </div>
                                        <div class=" col-span-4">
                                            <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>کشور</label>
                                            <div class="mt-2">
                                                <select class="select2 block w-full border " name="country">
                                                    <option value="0" disabled label="انتخاب کشور ... " selected="selected" class="align-right" style="direction: rtl">انتخاب کشور ... </option>
                                                    @foreach($countries as $cou)
                                                        <option value="{{$cou->id}}" label="{{$cou->name}}">{{$cou->name}}/{{$cou->per_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
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
                                        <p> توضیحات برند را در کادر زیر وارد کنید</p>
                                    </div>
                                    <div class="p-5" id="simple-editor">
                                        <div class="preview">
                                            <textarea data-feature=""  class="summernote rtl "  name="description" placeholder="توضیحات برند"></textarea>
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
                                        <p>عکس برند مورد نظر را اینجا بارگزاری کنید</p>
                                    </div>
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
                                            <label class="  w-full h-full text-right float-right ml-2 text-blue-400" id="labelFileName">نام عکس </label>
                                            <input class="  input w-full rtl border mt-2 align-right" value="" id="FileName" name="title">

                                            <label class="  w-full h-full text-right float-right ml-2 mt-2 text-blue-400" id="labelFileَAlt">َمتن جایگزین</label>
                                            <input class="  input w-full rtl border mt-2 align-right" value="" id="FileAlt" name="alt" placeholder="alt عکس را وارد کنید ">

                                            <label class="  w-full h-full text-right float-right ml-2 mt-2 text-blue-400" id="labelFileFlag">شاخص </label>
                                            <div class="mt-1 ">
                                                <select class="select2 block w-full border  mt-2" name="flag" style="width: 100% !important;">
                                                    <option value="0" disabled label="انتخاب شاخص ... " selected="selected" name="flag" class="align-right" style="direction: rtl">انتخاب شاخص ... </option>
                                                    <option value="brands" label="برند">برند</option>
                                                    <option value="categories" label="دسته بندی ها">دسته بندی ها</option>
                                                    <option value="users" label="کاربران">کاربران</option>
                                                    <option value="products" label="محصولات">محصولات</option>
                                                    <option value="sliders" label="اسلایدر ها">اسلایدر ها</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="mt-5">
                                            <input  type="submit"  name="submit" id="saveFileButton"  value="ذخیره اطلاعات"  class=" hidden button w-32 text-white bg-theme-1 shadow-md shadow-md mr-1 mb-2 bg-theme-1 text-white ml-auto">
                                        </div>
                                    </div>
                                    <!-- End Upload Area -->
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
    <script src="/Admin/js/CategoryImageUploader.js"> </script>
    <script src="/Admin/js/GallertFileUploader.js"> </script>
@endsection
