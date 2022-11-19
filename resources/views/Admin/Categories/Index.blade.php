@extends('Admin.Layout.Layout1')

@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />

@endsection

@section('content')
{{--    بالای صفحه --}}
    <h2 class="intro-y text-lg font-medium mt-10 flex">
        دسته بندی محصولات
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('categories.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">افزودن دسته بندی جدید</a>
            <div class="dropdown relative mr-2">
                <button class="dropdown-toggle button px-2 box text-gray-700 ">
                    <span class="w-5 h-5 flex items-center justify-center "> <i class=" fa fa-plus w-3 h-3" ></i> </span>
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

        </div>

    </div>
    <!-- Main Categories -->
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <div class="intro-y box-gray mt-5">
                <div class="p-5" id="multiple-item-slider">
                    <div class="preview">
                        <div class="slider mx-6 multiple-items ">
                            @foreach($categories as $category)
                                @if(!$category->category_id)
                                    <form action="{{route('categories.show',$category->id)}}" method="get">
                                        @csrf
                                        <div class="h-auto px-2 mt-2 mb-5 ">
                                            <div class="file  bg-gray-200 rounded-md px-5 pt-3 pb-5 px-2 sm:px-5 relative zoom-in2 h-full border-2  @if($category->id == $categorySelected) border-theme-42 @endif">
                                                <div class="absolute left-0 top-0 mt-3 ml-3">
                                                    <input class="input border border-gray-500" type="checkbox">
                                                </div>
                                                @if($category->gallery->path)
                                                <img src="{{str_replace('public','/storage',$category->gallery->path)}}" class="file__icon__file-name slider_categories m-auto mt-0 ">
                                               @endif
                                                <button  type="submit" class=" m-auto block  text-xl mt-0 text-center truncate"  >{{$category->name}}</button>
                                                @if(\Illuminate\Support\Facades\Auth::user()->role->categories > 12)
                                                <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                                    <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                                    <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                                        <div class="dropdown-box__content box p-2">
                                                            @if(\Illuminate\Support\Facades\Auth::user()->role->categories > 13)
                                                            <a href="javascript:;" data-toggle="modal" id="submit" data-target="#CategoryModal{{$category->id}}" class="open-categoryedit flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> ویرایش </a>
                                                            @endif
                                                            @if(\Illuminate\Support\Facades\Auth::user()->role->categories == 13 || \Illuminate\Support\Facades\Auth::user()->role->categories == 15)
                                                                <a href="javascript:;" data-toggle="modal" id="submit" data-target="#CategoryDelete{{$category->id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            </div>

                                        </div>
                                    </form>
                                @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Sub Categories-->
    @foreach($categories as $subCategory)
        @if($subCategory->category_id == $categorySelected)
            <div class="grid grid-cols-12 gap-6 mt-5 ">
                <div class="intro-y col-span-12 lg:col-span-12 justify-center mt-10 ">
                    <div class="intro-y box mt-5">
                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                            <div class="ml-auto">
                                <h2 class="font-medium text-base ml-auto">
                                    {{$subCategory->name}}
                                </h2>
                                <p class="text-xs" style="color: #99a4eb">
                                     {{$subCategory->name}}نمایش زیر مجموعه های دسته
                                </p>
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()->role->categories > 12)
                            <div class="absolute top-0 left-0 ml-2 mt-5 dropdown mr-auto flex">
                                @if(\Illuminate\Support\Facades\Auth::user()->role->categories > 13)
                                <a href="javascript:;" data-toggle="modal" data-target="#CategoryModal{{$subCategory->id}}" class=" flex-reverse items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-blue-200 rounded-md tooltip cursor-pointer" title="ویرایش"> <i data-feather="edit" class="w-4 h-4 mr-auto"></i> </a>
                                @endif
                                @if(\Illuminate\Support\Facades\Auth::user()->role->categories == 13 || \Illuminate\Support\Facades\Auth::user()->role->categories == 15)
                                        <a href="javascript:;" data-toggle="modal" id="submit" data-target="#CategoryDelete{{$subCategory->id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-red-200 rounded-md tooltip cursor-pointer" title="حذف"> <i data-feather="trash" class="w-4 h-4 mr-auto"></i></a>
                                @endif
                            </div>
                                @endif
                        </div>
                        <div class="p-5" id="multiple-item-slider">
                            <div class="preview">
                                <div class="slider mx-6 responsive-mode2">
                                    @foreach($categories as $subSubCategory)
                                        {{--        modal-edit subSubcategory--}}
                                        @if($subSubCategory->category_id == $subCategory->id)
                                            <div class="h-auto px-2 mt-2 mb-5">
                                                <div class="file  bg-gray-200 rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in2 h-full ">
                                                    <div class="absolute left-0 top-0 mt-3 ml-3">
                                                        <input class="input border border-gray-500" type="checkbox">
                                                    </div>
                                                    @if($subSubCategory->gallery)
                                                    <img src="{{str_replace('public','/storage',$subSubCategory->gallery->path)}}" class="file__icon__file-name slider_categories m-auto ">
                                                    @endif
                                                        <a href="" class="block font-medium mt-4 text-center truncate"  >{{$subSubCategory->name}}</a>
                                                    @if(\Illuminate\Support\Facades\Auth::user()->role->categories > 12)
                                                    <div class="absolute top-0 right-0 mr-2 mt-2 dropdown ml-auto">
                                                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="more-vertical" class="w-5 h-5 text-gray-500"></i> </a>
                                                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-10">
                                                            <div class="dropdown-box__content box p-2">
                                                                @if(\Illuminate\Support\Facades\Auth::user()->role->categories > 13)
                                                                <a href="javascript:;" data-toggle="modal" data-target="#CategoryModal{{$subSubCategory->id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="edit" class="w-4 h-4 mr-2"></i> ویرایش </a>
                                                                @endif
                                                                @if(\Illuminate\Support\Facades\Auth::user()->role->categories == 13 || \Illuminate\Support\Facades\Auth::user()->role->categories == 15)
                                                                    <a href="javascript:;" data-toggle="modal" id="submit" data-target="#CategoryDelete{{$subSubCategory->id}}" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> حذف </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            <div class="source-code hidden">
                                <button data-target="#copy-multiple-item-slider" class="copy-code button button--sm border flex items-center text-gray-700"> <i data-feather="file" class="w-4 h-4 mr-2"></i> Copy code </button>
                                <div class="overflow-y-auto h-64 mt-3">
                                    <pre class="source-preview" id="copy-multiple-item-slider"> <code class="text-xs p-0 rounded-md html pl-5 pt-8 pb-4 -mb-10 -mt-10"> HTMLOpenTagdiv class=&quot;slider mx-6 multiple-items&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-32 px-2&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-full bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagh3 class=&quot;h-full font-medium flex items-center justify-center text-2xl&quot;HTMLCloseTag1HTMLOpenTag/h3HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;h-32 px-2&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-full bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagh3 class=&quot;h-full font-medium flex items-center justify-center text-2xl&quot;HTMLCloseTag2HTMLOpenTag/h3HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;h-32 px-2&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-full bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagh3 class=&quot;h-full font-medium flex items-center justify-center text-2xl&quot;HTMLCloseTag3HTMLOpenTag/h3HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;h-32 px-2&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-full bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagh3 class=&quot;h-full font-medium flex items-center justify-center text-2xl&quot;HTMLCloseTag4HTMLOpenTag/h3HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;h-32 px-2&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-full bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagh3 class=&quot;h-full font-medium flex items-center justify-center text-2xl&quot;HTMLCloseTag5HTMLOpenTag/h3HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;h-32 px-2&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-full bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagh3 class=&quot;h-full font-medium flex items-center justify-center text-2xl&quot;HTMLCloseTag6HTMLOpenTag/h3HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;h-32 px-2&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-full bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagh3 class=&quot;h-full font-medium flex items-center justify-center text-2xl&quot;HTMLCloseTag7HTMLOpenTag/h3HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;h-32 px-2&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-full bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagh3 class=&quot;h-full font-medium flex items-center justify-center text-2xl&quot;HTMLCloseTag8HTMLOpenTag/h3HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTagdiv class=&quot;h-32 px-2&quot;HTMLCloseTag HTMLOpenTagdiv class=&quot;h-full bg-gray-200 rounded-md&quot;HTMLCloseTag HTMLOpenTagh3 class=&quot;h-full font-medium flex items-center justify-center text-2xl&quot;HTMLCloseTag9HTMLOpenTag/h3HTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag HTMLOpenTag/divHTMLCloseTag </code> </pre>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        @endif
    @endforeach
    <!-- modal Categories -->
@if(\Illuminate\Support\Facades\Auth::user()->role->categories > 12)
    @foreach($categories as $category)
        @if(\Illuminate\Support\Facades\Auth::user()->role->categories > 13)
        {{--        modal-edit category--}}
        <div class="modal" id="CategoryModal{{$category->id}}">

                <div class="modal__content modal__content--xl">
                    <form action="{{route('categories.update',$category)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base ml-auto">
                            ویرایش دسته بندی {{$category->name}}
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
                                    <a data-toggle="tab" data-target="#category{{$category->id}}" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">مشخصات کلی</a>
                                    <a data-toggle="tab" data-target="#Description{{$category->id}}" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                                    <a data-toggle="tab" data-target="#Image{{$category->id}}" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس دسته بندی</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-content__pane active" id="category{{$category->id}}">
                                <div class="pos__ticket box p-2 mt-5">
                                    <div class="intro-y box">
                                        <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                            <p> در این قسمت مشخصات کلی دسته بندی را انتخاب کنید</p>
                                        </div>
                                        <div class="p-5 " id="input">
                                            <div class="preview grid-rtl grid-cols-12">
                                                <div class="col-span-6 ml-2">
                                                    <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام دسته بندی</label>
                                                    <input type="text"  name="name" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="" value="{{$category->name}}">
                                                </div>
                                                <div class="col-span-6">
                                                    <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>متا </label>
                                                    <input type="text" name="meta" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="" value="{{$category->meta}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content__pane" id="Description{{$category->id}}">
                                <div class="box p-5 mt-5">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="box">
                                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200 bg-indigo-100">
                                                <p> توضیحات دسته بندی را در کادر زیر وارد کنید</p>
                                            </div>
                                            <div class="p-5" id="simple-editor">
                                                <div class="preview">
                                                    <form method="post" class="rtl">
                                                        <textarea data-feature="" class="summernote rtl "  name="description" placeholder="">{{$category->description}}</textarea>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-content__pane" id="Image{{$category->id}}">
                                <div class="box p-5 mt-5">
                                    <div class="col-span-12 lg:col-span-6">
                                        <div class="intro-y box">
                                            <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200">
                                                <p>عکس دسته بندی مورد نظر را اینجا بارگزاری کنید</p>
                                            </div>
                                            <div>
                                                <input type="file" name="image">
                                            </div>
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
        @endif
        {{--    DELETE Category--}}
        @if(\Illuminate\Support\Facades\Auth::user()->role->categories == 13 || \Illuminate\Support\Facades\Auth::user()->role->categories == 15)
        <div class="modal" id="CategoryDelete{{$category->id}}">

                <div class="modal__content">
                    <form action="{{route('categories.destroy',$category)}}" method="post" >
                        @csrf
                        @method('DELETE')
                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">حذف دسته بندی <span style="color: darkred">{{$category->name}}</span></div>
                        <div class="mt-3 ">
                            <div class="mt-2  flex" data-theme="light">
                                <p>حذف به همراه زیر دسته ها </p>
                                <input type="checkbox" class="tooltip input input--switch border" value="1" name="DeleteAll" title="با انتخاب این گزینه تمامی زیر دسته های این دسته بندی نیز حذف خواهد شد "> </div>
                        </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">انصراف</button>
                        <button type="submit" class="button w-24 bg-theme-6 text-white">حذف</button>
                    </div>
                    </form>
                </div>

        </div>
        @endif
    @endforeach
    @endif
@endsection
@section('js')
    <script src="/Admin/js/CategoryImageUploader.js"> </script>
@endsection
