

@section('css')
    <link rel="stylesheet" href="/Admin/css/GalleryFileUploader.css" />
@endsection
@section('content')
    <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            اسلایدر های سایت
        </h2>
        <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
            <a href="{{route('sliders.create')}}" class="button text-white bg-theme-1 shadow-md mr-2">اسلایدر جدید</a>
            <div class="dropdown relative ml-auto sm:ml-0">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="share-2" class="w-4 h-4 mr-2"></i> Share Post </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="download" class="w-4 h-4 mr-2"></i> Download Post </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
        <!-- BEGIN: Blog Layout -->
        @if(isset($home_header_left))
            @if($home_header_left->count())
        <div class="intro-y blog col-span-12 md:col-span-6 box">
            <div class="blog__preview image-fit">
                <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="{{str_replace('public','/storage',optional($home_header_left_active->gallery)->path)}}">
                <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                    <div class="ml-3 text-white mr-auto">
                        <a href="" class="font-medium">اسلایدر صفحه اصلی هدر چپ</a>
                        <div class="text-xs">415 * 678</div>
                    </div>
                    <div class="dropdown relative ml-3">
                        <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                        <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                            <div class="dropdown-box__content box p-2">
                                <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md" data-toggle="modal" data-target="#home_header_left_modal"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> لیست اسلایدر ها </a>
                                <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-theme-17 text-theme-11 px-2 py-1 rounded">{{$home_header_left_active->offer}} %</span> <span class="blog__category px-2 py-1 rounded">{{$home_header_left_active->tag}} </span> <a href="" class="block font-medium text-xl mt-3">{{$home_header_left_active->title}}</a> </div>
            </div>
            <div class="p-5 text-gray-700">
                @php
                echo $home_header_left_active->description;
                @endphp
            </div>
            <div class="flex items-center px-5 py-3 border-t border-gray-200">
                <div class="intro-x flex mr-2">
                    <div class="intro-x w-8 h-8 image-fit">
                        <img alt="{{$home_header_left_active->title}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($home_header_left_active->gallery)->path)}}" title="selected">
                    </div>
                    @foreach($home_header_left as $hhl)
                        @if(!$hhl->status)
                            <div class="intro-x w-8 h-8 image-fit -ml-4">
                                <img alt="{{$hhl->gallery->alt}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($hhl->gallery)->path)}}" title="{{$hhl->title}}">
                            </div>
                        @endif
                        @if($loop->index == 2)
                            @break
                        @endif
                    @endforeach

                </div>
                <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
                <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
            </div>
            <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                <div class="w-full flex items-center mt-3">
                    <div class="flex-1 relative text-gray-700">
                        <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$home_header_left_active->link}}">
                        <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                    </div>
                </div>

            </div>
        </div>
            <div class="modal" id="home_header_left_modal">
                <div class="modal__content modal__content--xl p-10 text-center ">
                    <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
                        <!-- BEGIN: Blog Layout -->
                        @foreach($home_header_left as $slider)
                        <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box @if($slider->status) border-theme-42 @endif">
                            <div class="p-5">
                                <div class="h-40 xxl:h-56 image-fit">
                                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($slider->gallery)->path)}}">
                                </div>
                                <a href="" class="block font-medium text-base mt-5"><strong>{{$slider->title}}</strong></a>
                                <div class="text-gray-700 mt-2">
                                    @php
                                    echo $slider->description;
                                    @endphp
                                </div>
                            </div>
                            <div class="flex items-center px-5 py-3 border-t border-gray-200">
                                <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-amber-400 bg-theme-17 text-theme-11 mr-2 tooltip text-xs" title="تخفیف">
                                    %  {{$slider->offer}} </a>
                                <div class="intro-x flex mr-2 border border-2 rounded p-2 bg-gray-200 text-gray-600">
                                    {{$slider->tag}}
                                </div>
                                <a href="{{route('sliders.edit',$slider)}}" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="ویرایش"> <i data-feather="edit" class="w-3 h-3"></i> </a>
                                @if($slider->status)
                                    <p class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-9 text-white ml-2 tooltip" title="درحال استفاده"> <i data-feather="flag" class="w-3 h-3"></i> </p>
                                @else
                                    <form action="{{route('sliders.select',$slider)}}" method="post">
                                        @csrf
                                        <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="انتخاب"> <i data-feather="mouse-pointer" class="w-3 h-3"></i> </button>
                                    </form>
                                @endif
                                <form action="{{route('sliders.destroy',$slider)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-6 text-white ml-2 tooltip" title="حذف"> <i data-feather="trash" class="w-3 h-3"></i> </button>
                                </form>
                            </div>
                            <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                                <div class="w-full flex items-center mt-3">
                                    <div class="flex-1 relative text-gray-700" style="text-align: left;direction: ltr">
                                        <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$slider->link}}">
                                        <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <!-- END: Blog Layout -->
                    </div>
                </div>
            </div>
            @endif
        @endif
        @if(isset($home_header_right))
            @if($home_header_right->count())
            <div class="intro-y blog col-span-12 md:col-span-6 box">
                <div class="blog__preview image-fit">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="{{str_replace('public','/storage',optional($home_header_right_active->gallery)->path)}}">
                    <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                        <div class="ml-3 text-white mr-auto">
                            <a href="" class="font-medium">اسلایدر صفحه اصلی هدر راست</a>
                            <div class="text-xs">1155 * 670 </div>
                        </div>
                        <div class="dropdown relative ml-3">
                            <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                            <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md" data-toggle="modal" data-target="#home_header_right_modal"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> لیست اسلایدر ها </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-theme-17 text-theme-11 px-2 py-1 rounded">{{$home_header_right_active->offer}} %</span> <span class="blog__category px-2 py-1 rounded">{{$home_header_right_active->tag}} </span> <a href="" class="block font-medium text-xl mt-3">{{$home_header_right_active->title}}</a> </div>
                </div>
                <div class="p-5 text-gray-700">
                    @php
                        echo $home_header_right_active->description;
                    @endphp
                </div>
                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                    <div class="intro-x flex mr-2">
                        <div class="intro-x w-8 h-8 image-fit">
                            <img alt="{{$home_header_right_active->title}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($home_header_right_active->gallery)->path)}}" title="selected">
                        </div>
                        @foreach($home_header_right as $hhl)
                            @if(!$hhl->status)
                                <div class="intro-x w-8 h-8 image-fit -ml-4">
                                    <img alt="{{$hhl->gallery->alt}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($hhl->gallery)->path)}}" title="{{$hhl->title}}">
                                </div>
                            @endif
                            @if($loop->index == 2)
                                @break
                            @endif
                        @endforeach

                    </div>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
                </div>
                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                    <div class="w-full flex items-center mt-3">
                        <div class="flex-1 relative text-gray-700">
                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$home_header_right_active->link}}">
                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal" id="home_header_right_modal">
                <div class="modal__content modal__content--xl p-10 text-center ">
                    <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
                        <!-- BEGIN: Blog Layout -->
                        @foreach($home_header_right as $slider)
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box @if($slider->status) border-theme-42 @endif">
                                <div class="p-5">
                                    <div class="h-40 xxl:h-56 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($slider->gallery)->path)}}">
                                    </div>
                                    <a href="" class="block font-medium text-base mt-5"><strong>{{$slider->title}}</strong></a>
                                    <div class="text-gray-700 mt-2">
                                        @php
                                            echo $slider->description;
                                        @endphp
                                    </div>
                                </div>
                                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-amber-400 bg-theme-17 text-theme-11 mr-2 tooltip text-xs" title="تخفیف">
                                        %  {{$slider->offer}} </a>
                                    <div class="intro-x flex mr-2 border border-2 rounded p-2 bg-gray-200 text-gray-600">
                                        {{$slider->tag}}
                                    </div>
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="ویرایش"> <i data-feather="edit" class="w-3 h-3"></i> </a>
                                    @if($slider->status)
                                        <p class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-9 text-white ml-2 tooltip" title="درحال استفاده"> <i data-feather="flag" class="w-3 h-3"></i> </p>
                                    @else
                                        <form action="{{route('sliders.select',$slider)}}" method="post">
                                            @csrf
                                            <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="انتخاب"> <i data-feather="mouse-pointer" class="w-3 h-3"></i> </button>
                                        </form>
                                    @endif
                                    <form action="{{route('sliders.destroy',$slider)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-6 text-white ml-2 tooltip" title="حذف"> <i data-feather="trash" class="w-3 h-3"></i> </button>
                                    </form>
                                </div>
                                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                                    <div class="w-full flex items-center mt-3">
                                        <div class="flex-1 relative text-gray-700" style="text-align: left;direction: ltr">
                                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$slider->link}}">
                                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- END: Blog Layout -->
                    </div>
                </div>
            </div>
            @endif
        @endif
        @if(isset($home_main_top))
            @if($home_main_top->count())
            <div class="intro-y blog col-span-12 md:col-span-6 box">
                <div class="blog__preview image-fit">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="{{str_replace('public','/storage',optional($home_main_top_active->gallery)->path)}}">
                    <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                        <div class="ml-3 text-white mr-auto">
                            <a href="" class="font-medium">اسلایدر بدنه بالا</a>
                            <div class="text-xs">1600 * 138 </div>
                        </div>
                        <div class="dropdown relative ml-3">
                            <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                            <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md" data-toggle="modal" data-target="#home_main_top_modal"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> لیست اسلایدر ها </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-theme-17 text-theme-11 px-2 py-1 rounded">{{$home_main_top_active->offer}} %</span> <span class="blog__category px-2 py-1 rounded">{{$home_main_top_active->tag}} </span> <a href="" class="block font-medium text-xl mt-3">{{$home_main_top_active->title}}</a> </div>
                </div>
                <div class="p-5 text-gray-700">
                    @php
                        echo $home_main_top_active->description;
                    @endphp
                </div>
                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                    <div class="intro-x flex mr-2">
                        <div class="intro-x w-8 h-8 image-fit">
                            <img alt="{{$home_main_top_active->title}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($home_main_top_active->gallery)->path)}}" title="selected">
                        </div>
                        @foreach($home_main_top as $hhl)
                            @if(!$hhl->status)
                                <div class="intro-x w-8 h-8 image-fit -ml-4">
                                    <img alt="{{$hhl->gallery->alt}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($hhl->gallery)->path)}}" title="{{$hhl->title}}">
                                </div>
                            @endif
                            @if($loop->index == 2)
                                @break
                            @endif
                        @endforeach

                    </div>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
                </div>
                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                    <div class="w-full flex items-center mt-3">
                        <div class="flex-1 relative text-gray-700">
                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$home_main_top_active->link}}">
                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal" id="home_main_top_modal">
                <div class="modal__content modal__content--xl p-10 text-center ">
                    <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
                        <!-- BEGIN: Blog Layout -->
                        @foreach($home_main_top as $slider)
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box @if($slider->status) border-theme-42 @endif">
                                <div class="p-5">
                                    <div class="h-40 xxl:h-56 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($slider->gallery)->path)}}">
                                    </div>
                                    <a href="" class="block font-medium text-base mt-5"><strong>{{$slider->title}}</strong></a>
                                    <div class="text-gray-700 mt-2">
                                        @php
                                            echo $slider->description;
                                        @endphp
                                    </div>
                                </div>
                                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-amber-400 bg-theme-17 text-theme-11 mr-2 tooltip text-xs" title="تخفیف">
                                        %  {{$slider->offer}} </a>
                                    <div class="intro-x flex mr-2 border border-2 rounded p-2 bg-gray-200 text-gray-600">
                                        {{$slider->tag}}
                                    </div>
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="ویرایش"> <i data-feather="edit" class="w-3 h-3"></i> </a>
                                    @if($slider->status)
                                        <p class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-9 text-white ml-2 tooltip" title="درحال استفاده"> <i data-feather="flag" class="w-3 h-3"></i> </p>
                                    @else
                                        <form action="{{route('sliders.select',$slider)}}" method="post">
                                            @csrf
                                            <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="انتخاب"> <i data-feather="mouse-pointer" class="w-3 h-3"></i> </button>
                                        </form>
                                    @endif
                                    <form action="{{route('sliders.destroy',$slider)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-6 text-white ml-2 tooltip" title="حذف"> <i data-feather="trash" class="w-3 h-3"></i> </button>
                                    </form>
                                </div>
                                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                                    <div class="w-full flex items-center mt-3">
                                        <div class="flex-1 relative text-gray-700" style="text-align: left;direction: ltr">
                                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$slider->link}}">
                                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- END: Blog Layout -->
                    </div>
                </div>
            </div>
            @endif
        @endif
        @if(isset($home_offer_1))
            @if($home_offer_1->count())
            <div class="intro-y blog col-span-12 md:col-span-6 box">
                <div class="blog__preview image-fit">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="{{str_replace('public','/storage',optional($home_offer_1_active->gallery)->path)}}">
                    <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                        <div class="ml-3 text-white mr-auto">
                            <a href="" class="font-medium">اسلایدر صفحه اصلی بدنه وسط</a>
                            <div class="text-xs">376 * 231 </div>
                        </div>
                        <div class="dropdown relative ml-3">
                            <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                            <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md" data-toggle="modal" data-target="#home_offer_1_modal"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> لیست اسلایدر ها </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-theme-17 text-theme-11 px-2 py-1 rounded">{{$home_offer_1_active->offer}} %</span> <span class="blog__category px-2 py-1 rounded">{{$home_offer_1_active->tag}} </span> <a href="" class="block font-medium text-xl mt-3">{{$home_offer_1_active->title}}</a> </div>
                </div>
                <div class="p-5 text-gray-700">
                    @php
                        echo $home_offer_1_active->description;
                    @endphp
                </div>
                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                    <div class="intro-x flex mr-2">
                        <div class="intro-x w-8 h-8 image-fit">
                            <img alt="{{$home_offer_1_active->title}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($home_offer_1_active->gallery)->path)}}" title="selected">
                        </div>
                        @foreach($home_offer_1 as $hhl)
                            @if(!$hhl->status)
                                <div class="intro-x w-8 h-8 image-fit -ml-4">
                                    <img alt="{{$hhl->gallery->alt}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($hhl->gallery)->path)}}" title="{{$hhl->title}}">
                                </div>
                            @endif
                            @if($loop->index == 2)
                                @break
                            @endif
                        @endforeach

                    </div>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
                </div>
                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                    <div class="w-full flex items-center mt-3">
                        <div class="flex-1 relative text-gray-700">
                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$home_offer_1_active->link}}">
                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal" id="home_offer_1_modal">
                <div class="modal__content modal__content--xl p-10 text-center ">
                    <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
                        <!-- BEGIN: Blog Layout -->
                        @foreach($home_offer_1 as $slider)
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box @if($slider->status) border-theme-42 @endif">
                                <div class="p-5">
                                    <div class="h-40 xxl:h-56 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($slider->gallery)->path)}}">
                                    </div>
                                    <a href="" class="block font-medium text-base mt-5"><strong>{{$slider->title}}</strong></a>
                                    <div class="text-gray-700 mt-2">
                                        @php
                                            echo $slider->description;
                                        @endphp
                                    </div>
                                </div>
                                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-amber-400 bg-theme-17 text-theme-11 mr-2 tooltip text-xs" title="تخفیف">
                                        %  {{$slider->offer}} </a>
                                    <div class="intro-x flex mr-2 border border-2 rounded p-2 bg-gray-200 text-gray-600">
                                        {{$slider->tag}}
                                    </div>
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="ویرایش"> <i data-feather="edit" class="w-3 h-3"></i> </a>
                                    @if($slider->status)
                                        <p class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-9 text-white ml-2 tooltip" title="درحال استفاده"> <i data-feather="flag" class="w-3 h-3"></i> </p>
                                    @else
                                        <form action="{{route('sliders.select',$slider)}}" method="post">
                                            @csrf
                                            <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="انتخاب"> <i data-feather="mouse-pointer" class="w-3 h-3"></i> </button>
                                        </form>
                                    @endif
                                    <form action="{{route('sliders.destroy',$slider)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-6 text-white ml-2 tooltip" title="حذف"> <i data-feather="trash" class="w-3 h-3"></i> </button>
                                    </form>
                                </div>
                                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                                    <div class="w-full flex items-center mt-3">
                                        <div class="flex-1 relative text-gray-700" style="text-align: left;direction: ltr">
                                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$slider->link}}">
                                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- END: Blog Layout -->
                    </div>
                </div>
            </div>
            @endif
        @endif
        @if(isset($home_offer_2))
            @if($home_offer_2->count())
                <div class="intro-y blog col-span-12 md:col-span-6 box">
                    <div class="blog__preview image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="{{str_replace('public','/storage',optional($home_offer_2_active->gallery)->path)}}">
                        <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                            <div class="ml-3 text-white mr-auto">
                                <a href="" class="font-medium">اسلایدر صفحه اصلی بدنه وسط</a>
                                <div class="text-xs">376 * 231 </div>
                            </div>
                            <div class="dropdown relative ml-3">
                                <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                                <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                                    <div class="dropdown-box__content box p-2">
                                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md" data-toggle="modal" data-target="#home_offer_2_modal"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> لیست اسلایدر ها </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-theme-17 text-theme-11 px-2 py-1 rounded">{{$home_offer_2_active->offer}} %</span> <span class="blog__category px-2 py-1 rounded">{{$home_offer_2_active->tag}} </span> <a href="" class="block font-medium text-xl mt-3">{{$home_offer_2_active->title}}</a> </div>
                    </div>
                    <div class="p-5 text-gray-700">
                        @php
                            echo $home_offer_2_active->description;
                        @endphp
                    </div>
                    <div class="flex items-center px-5 py-3 border-t border-gray-200">
                        <div class="intro-x flex mr-2">
                            <div class="intro-x w-8 h-8 image-fit">
                                <img alt="{{$home_offer_2_active->title}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($home_offer_2_active->gallery)->path)}}" title="selected">
                            </div>
                            @foreach($home_offer_2 as $hhl)
                                @if(!$hhl->status)
                                    <div class="intro-x w-8 h-8 image-fit -ml-4">
                                        <img alt="{{$hhl->gallery->alt}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($hhl->gallery)->path)}}" title="{{$hhl->title}}">
                                    </div>
                                @endif
                                @if($loop->index == 2)
                                    @break
                                @endif
                            @endforeach

                        </div>
                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
                    </div>
                    <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                        <div class="w-full flex items-center mt-3">
                            <div class="flex-1 relative text-gray-700">
                                <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$home_offer_2_active->link}}">
                                <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal" id="home_offer_2_modal">
                    <div class="modal__content modal__content--xl p-10 text-center ">
                        <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
                            <!-- BEGIN: Blog Layout -->
                            @foreach($home_offer_2 as $slider)
                                <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box @if($slider->status) border-theme-42 @endif">
                                    <div class="p-5">
                                        <div class="h-40 xxl:h-56 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($slider->gallery)->path)}}">
                                        </div>
                                        <a href="" class="block font-medium text-base mt-5"><strong>{{$slider->title}}</strong></a>
                                        <div class="text-gray-700 mt-2">
                                            @php
                                                echo $slider->description;
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="flex items-center px-5 py-3 border-t border-gray-200">
                                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-amber-400 bg-theme-17 text-theme-11 mr-2 tooltip text-xs" title="تخفیف">
                                            %  {{$slider->offer}} </a>
                                        <div class="intro-x flex mr-2 border border-2 rounded p-2 bg-gray-200 text-gray-600">
                                            {{$slider->tag}}
                                        </div>
                                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="ویرایش"> <i data-feather="edit" class="w-3 h-3"></i> </a>
                                        @if($slider->status)
                                            <p class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-9 text-white ml-2 tooltip" title="درحال استفاده"> <i data-feather="flag" class="w-3 h-3"></i> </p>
                                        @else
                                            <form action="{{route('sliders.select',$slider)}}" method="post">
                                                @csrf
                                                <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="انتخاب"> <i data-feather="mouse-pointer" class="w-3 h-3"></i> </button>
                                            </form>
                                        @endif
                                        <form action="{{route('sliders.destroy',$slider)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-6 text-white ml-2 tooltip" title="حذف"> <i data-feather="trash" class="w-3 h-3"></i> </button>
                                        </form>
                                    </div>
                                    <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                                        <div class="w-full flex items-center mt-3">
                                            <div class="flex-1 relative text-gray-700" style="text-align: left;direction: ltr">
                                                <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$slider->link}}">
                                                <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- END: Blog Layout -->
                        </div>
                    </div>
                </div>
            @endif
        @endif
        @if(isset($home_offer_3))
            @if($home_offer_3->count())
                <div class="intro-y blog col-span-12 md:col-span-6 box">
                    <div class="blog__preview image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="{{str_replace('public','/storage',optional($home_offer_3_active->gallery)->path)}}">
                        <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                            <div class="ml-3 text-white mr-auto">
                                <a href="" class="font-medium">اسلایدر صفحه اصلی بدنه وسط</a>
                                <div class="text-xs">376 * 231 </div>
                            </div>
                            <div class="dropdown relative ml-3">
                                <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                                <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                                    <div class="dropdown-box__content box p-2">
                                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md" data-toggle="modal" data-target="#home_offer_3_modal"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> لیست اسلایدر ها </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-theme-17 text-theme-11 px-2 py-1 rounded">{{$home_offer_3_active->offer}} %</span> <span class="blog__category px-2 py-1 rounded">{{$home_offer_3_active->tag}} </span> <a href="" class="block font-medium text-xl mt-3">{{$home_offer_3_active->title}}</a> </div>
                    </div>
                    <div class="p-5 text-gray-700">
                        @php
                            echo $home_offer_3_active->description;
                        @endphp
                    </div>
                    <div class="flex items-center px-5 py-3 border-t border-gray-200">
                        <div class="intro-x flex mr-2">
                            <div class="intro-x w-8 h-8 image-fit">
                                <img alt="{{$home_offer_3_active->title}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($home_offer_3_active->gallery)->path)}}" title="selected">
                            </div>
                            @foreach($home_offer_3 as $hhl)
                                @if(!$hhl->status)
                                    <div class="intro-x w-8 h-8 image-fit -ml-4">
                                        <img alt="{{$hhl->gallery->alt}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($hhl->gallery)->path)}}" title="{{$hhl->title}}">
                                    </div>
                                @endif
                                @if($loop->index == 2)
                                    @break
                                @endif
                            @endforeach

                        </div>
                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
                    </div>
                    <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                        <div class="w-full flex items-center mt-3">
                            <div class="flex-1 relative text-gray-700">
                                <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$home_offer_3_active->link}}">
                                <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal" id="home_offer_3_modal">
                    <div class="modal__content modal__content--xl p-10 text-center ">
                        <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
                            <!-- BEGIN: Blog Layout -->
                            @foreach($home_offer_3 as $slider)
                                <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box @if($slider->status) border-theme-42 @endif">
                                    <div class="p-5">
                                        <div class="h-40 xxl:h-56 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($slider->gallery)->path)}}">
                                        </div>
                                        <a href="" class="block font-medium text-base mt-5"><strong>{{$slider->title}}</strong></a>
                                        <div class="text-gray-700 mt-2">
                                            @php
                                                echo $slider->description;
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="flex items-center px-5 py-3 border-t border-gray-200">
                                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-amber-400 bg-theme-17 text-theme-11 mr-2 tooltip text-xs" title="تخفیف">
                                            %  {{$slider->offer}} </a>
                                        <div class="intro-x flex mr-2 border border-2 rounded p-2 bg-gray-200 text-gray-600">
                                            {{$slider->tag}}
                                        </div>
                                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="ویرایش"> <i data-feather="edit" class="w-3 h-3"></i> </a>
                                        @if($slider->status)
                                            <p class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-9 text-white ml-2 tooltip" title="درحال استفاده"> <i data-feather="flag" class="w-3 h-3"></i> </p>
                                        @else
                                            <form action="{{route('sliders.select',$slider)}}" method="post">
                                                @csrf
                                                <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="انتخاب"> <i data-feather="mouse-pointer" class="w-3 h-3"></i> </button>
                                            </form>
                                        @endif
                                        <form action="{{route('sliders.destroy',$slider)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-6 text-white ml-2 tooltip" title="حذف"> <i data-feather="trash" class="w-3 h-3"></i> </button>
                                        </form>
                                    </div>
                                    <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                                        <div class="w-full flex items-center mt-3">
                                            <div class="flex-1 relative text-gray-700" style="text-align: left;direction: ltr">
                                                <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$slider->link}}">
                                                <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- END: Blog Layout -->
                        </div>
                    </div>
                </div>
            @endif
        @endif
        @if(isset($home_offer_4))
            @if($home_offer_4->count())
                <div class="intro-y blog col-span-12 md:col-span-6 box">
                    <div class="blog__preview image-fit">
                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="{{str_replace('public','/storage',optional($home_offer_4_active->gallery)->path)}}">
                        <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                            <div class="ml-3 text-white mr-auto">
                                <a href="" class="font-medium">اسلایدر صفحه اصلی بدنه وسط</a>
                                <div class="text-xs">376 * 231 </div>
                            </div>
                            <div class="dropdown relative ml-3">
                                <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                                <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                                    <div class="dropdown-box__content box p-2">
                                        <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md" data-toggle="modal" data-target="#home_offer_4_modal"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> لیست اسلایدر ها </a>
                                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-theme-17 text-theme-11 px-2 py-1 rounded">{{$home_offer_4_active->offer}} %</span> <span class="blog__category px-2 py-1 rounded">{{$home_offer_4_active->tag}} </span> <a href="" class="block font-medium text-xl mt-3">{{$home_offer_4_active->title}}</a> </div>
                    </div>
                    <div class="p-5 text-gray-700">
                        @php
                            echo $home_offer_4_active->description;
                        @endphp
                    </div>
                    <div class="flex items-center px-5 py-3 border-t border-gray-200">
                        <div class="intro-x flex mr-2">
                            <div class="intro-x w-8 h-8 image-fit">
                                <img alt="{{$home_offer_4_active->title}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($home_offer_4_active->gallery)->path)}}" title="selected">
                            </div>
                            @foreach($home_offer_4 as $hhl)
                                @if(!$hhl->status)
                                    <div class="intro-x w-8 h-8 image-fit -ml-4">
                                        <img alt="{{$hhl->gallery->alt}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($hhl->gallery)->path)}}" title="{{$hhl->title}}">
                                    </div>
                                @endif
                                @if($loop->index == 2)
                                    @break
                                @endif
                            @endforeach

                        </div>
                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
                    </div>
                    <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                        <div class="w-full flex items-center mt-3">
                            <div class="flex-1 relative text-gray-700">
                                <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$home_offer_4_active->link}}">
                                <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal" id="home_offer_4_modal">
                    <div class="modal__content modal__content--xl p-10 text-center ">
                        <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
                            <!-- BEGIN: Blog Layout -->
                            @foreach($home_offer_4 as $slider)
                                <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box @if($slider->status) border-theme-42 @endif">
                                    <div class="p-5">
                                        <div class="h-40 xxl:h-56 image-fit">
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($slider->gallery)->path)}}">
                                        </div>
                                        <a href="" class="block font-medium text-base mt-5"><strong>{{$slider->title}}</strong></a>
                                        <div class="text-gray-700 mt-2">
                                            @php
                                                echo $slider->description;
                                            @endphp
                                        </div>
                                    </div>
                                    <div class="flex items-center px-5 py-3 border-t border-gray-200">
                                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-amber-400 bg-theme-17 text-theme-11 mr-2 tooltip text-xs" title="تخفیف">
                                            %  {{$slider->offer}} </a>
                                        <div class="intro-x flex mr-2 border border-2 rounded p-2 bg-gray-200 text-gray-600">
                                            {{$slider->tag}}
                                        </div>
                                        <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="ویرایش"> <i data-feather="edit" class="w-3 h-3"></i> </a>
                                        @if($slider->status)
                                            <p class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-9 text-white ml-2 tooltip" title="درحال استفاده"> <i data-feather="flag" class="w-3 h-3"></i> </p>
                                        @else
                                            <form action="{{route('sliders.select',$slider)}}" method="post">
                                                @csrf
                                                <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="انتخاب"> <i data-feather="mouse-pointer" class="w-3 h-3"></i> </button>
                                            </form>
                                        @endif
                                        <form action="{{route('sliders.destroy',$slider)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-6 text-white ml-2 tooltip" title="حذف"> <i data-feather="trash" class="w-3 h-3"></i> </button>
                                        </form>
                                    </div>
                                    <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                                        <div class="w-full flex items-center mt-3">
                                            <div class="flex-1 relative text-gray-700" style="text-align: left;direction: ltr">
                                                <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$slider->link}}">
                                                <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <!-- END: Blog Layout -->
                        </div>
                    </div>
                </div>
            @endif
        @endif
        @if(isset($home_sticky_bottom))
            @if($home_sticky_bottom->count())
            <div class="intro-y blog col-span-12 md:col-span-6 box">
                <div class="blog__preview image-fit">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="{{str_replace('public','/storage',optional($home_sticky_bottom_active->gallery)->path)}}">
                    <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                        <div class="ml-3 text-white mr-auto">
                            <a href="" class="font-medium">اسلایدر صفحه اصلی بدنه پایین </a>
                            <div class="text-xs">376 * 231 </div>
                        </div>
                        <div class="dropdown relative ml-3">
                            <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                            <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md" data-toggle="modal" data-target="#home_sticky_bottom_modal"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> لیست اسلایدر ها </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-theme-17 text-theme-11 px-2 py-1 rounded">{{$home_sticky_bottom_active->offer}} %</span> <span class="blog__category px-2 py-1 rounded">{{$home_sticky_bottom_active->tag}} </span> <a href="" class="block font-medium text-xl mt-3">{{$home_sticky_bottom_active->title}}</a> </div>
                </div>
                <div class="p-5 text-gray-700">
                    @php
                        echo $home_sticky_bottom_active->description;
                    @endphp
                </div>
                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                    <div class="intro-x flex mr-2">
                        <div class="intro-x w-8 h-8 image-fit">
                            <img alt="{{$home_sticky_bottom_active->title}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($home_sticky_bottom_active->gallery)->path)}}" title="selected">
                        </div>
                        @foreach($home_sticky_bottom as $hhl)
                            @if(!$hhl->status)
                                <div class="intro-x w-8 h-8 image-fit -ml-4">
                                    <img alt="{{$hhl->gallery->alt}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($hhl->gallery)->path)}}" title="{{$hhl->title}}">
                                </div>
                            @endif
                            @if($loop->index == 2)
                                @break
                            @endif
                        @endforeach

                    </div>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
                </div>
                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                    <div class="w-full flex items-center mt-3">
                        <div class="flex-1 relative text-gray-700">
                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$home_sticky_bottom_active->link}}">
                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal" id="home_sticky_bottom_modal">
                <div class="modal__content modal__content--xl p-10 text-center ">
                    <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
                        <!-- BEGIN: Blog Layout -->
                        @foreach($home_sticky_bottom as $slider)
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box @if($slider->status) border-theme-42 @endif">
                                <div class="p-5">
                                    <div class="h-40 xxl:h-56 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($slider->gallery)->path)}}">
                                    </div>
                                    <a href="" class="block font-medium text-base mt-5"><strong>{{$slider->title}}</strong></a>
                                    <div class="text-gray-700 mt-2">
                                        @php
                                            echo $slider->description;
                                        @endphp
                                    </div>
                                </div>
                                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-amber-400 bg-theme-17 text-theme-11 mr-2 tooltip text-xs" title="تخفیف">
                                        %  {{$slider->offer}} </a>
                                    <div class="intro-x flex mr-2 border border-2 rounded p-2 bg-gray-200 text-gray-600">
                                        {{$slider->tag}}
                                    </div>
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="ویرایش"> <i data-feather="edit" class="w-3 h-3"></i> </a>
                                    @if($slider->status)
                                        <p class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-9 text-white ml-2 tooltip" title="درحال استفاده"> <i data-feather="flag" class="w-3 h-3"></i> </p>
                                    @else
                                        <form action="{{route('sliders.select',$slider)}}" method="post">
                                            @csrf
                                            <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="انتخاب"> <i data-feather="mouse-pointer" class="w-3 h-3"></i> </button>
                                        </form>
                                    @endif
                                    <form action="{{route('sliders.destroy',$slider)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-6 text-white ml-2 tooltip" title="حذف"> <i data-feather="trash" class="w-3 h-3"></i> </button>
                                    </form>
                                </div>
                                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                                    <div class="w-full flex items-center mt-3">
                                        <div class="flex-1 relative text-gray-700" style="text-align: left;direction: ltr">
                                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$slider->link}}">
                                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- END: Blog Layout -->
                    </div>
                </div>
            </div>
            @endif
        @endif
        @if(isset($home_sticky_top))
            @if($home_sticky_top->count())
            <div class="intro-y blog col-span-12 md:col-span-6 box">
                <div class="blog__preview image-fit">
                    <img alt="Midone Tailwind HTML Admin Template" class="rounded-t-md" src="{{str_replace('public','/storage',optional($home_sticky_top_active->gallery)->path)}}">
                    <div class="absolute w-full flex items-center px-5 pt-6 z-10">
                        <div class="ml-3 text-white mr-auto">
                            <a href="" class="font-medium">اسلایدر صفحه اصلی بدنه پایین </a>
                            <div class="text-xs">376 * 231 </div>
                        </div>
                        <div class="dropdown relative ml-3" >
                            <a href="javascript:;" class="blog__action dropdown-toggle w-8 h-8 flex items-center justify-center rounded-full"> <i data-feather="more-vertical" class="w-4 h-4 text-white"></i> </a>
                            <div class="dropdown-box mt-8 absolute w-40 top-0 right-0 z-20">
                                <div class="dropdown-box__content box p-2">
                                    <a href="javascript:;" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md" data-toggle="modal" data-target="#home_sticky_top_modal"> <i data-feather="edit-2" class="w-4 h-4 mr-2"></i> لیست اسلایدر ها </a>
                                    <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="trash" class="w-4 h-4 mr-2"></i> Delete Post </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute bottom-0 text-white px-5 pb-6 z-10"> <span class="bg-theme-17 text-theme-11 px-2 py-1 rounded">{{$home_sticky_top_active->offer}} %</span> <span class="blog__category px-2 py-1 rounded">{{$home_sticky_top_active->tag}} </span> <a href="" class="block font-medium text-xl mt-3">{{$home_sticky_top_active->title}}</a> </div>
                </div>
                <div class="p-5 text-gray-700">
                    @php
                        echo $home_sticky_top_active->description;
                    @endphp
                </div>
                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                    <div class="intro-x flex mr-2">
                        <div class="intro-x w-8 h-8 image-fit">
                            <img alt="{{$home_sticky_top_active->title}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($home_sticky_top_active->gallery)->path)}}" title="selected">
                        </div>
                        @foreach($home_sticky_top as $hhl)
                            @if(!$hhl->status)
                                <div class="intro-x w-8 h-8 image-fit -ml-4">
                                    <img alt="{{$hhl->gallery->alt}}" class="rounded-full border border-white zoom-in tooltip" src="{{str_replace('public','/storage',optional($hhl->gallery)->path)}}" title="{{$hhl->title}}">
                                </div>
                            @endif
                            @if($loop->index == 2)
                                @break
                            @endif
                        @endforeach

                    </div>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="Share"> <i data-feather="share-2" class="w-3 h-3"></i> </a>
                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="Download PDF"> <i data-feather="share" class="w-3 h-3"></i> </a>
                </div>
                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                    <div class="w-full flex items-center mt-3">
                        <div class="flex-1 relative text-gray-700">
                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$home_sticky_top_active->link}}">
                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal" id="home_sticky_top_modal">
                <div class="modal__content modal__content--xl p-10 text-center ">
                    <div class="intro-y grid grid-cols-12 gap-6 mt-5 rtl">
                        <!-- BEGIN: Blog Layout -->
                        @foreach($home_sticky_top as $slider)
                            <div class="intro-y col-span-12 md:col-span-6 xl:col-span-6 box @if($slider->status) border-theme-42 @endif">
                                <div class="p-5">
                                    <div class="h-40 xxl:h-56 image-fit">
                                        <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($slider->gallery)->path)}}">
                                    </div>
                                    <a href="" class="block font-medium text-base mt-5"><strong>{{$slider->title}}</strong></a>
                                    <div class="text-gray-700 mt-2">
                                        @php
                                            echo $slider->description;
                                        @endphp
                                    </div>
                                </div>
                                <div class="flex items-center px-5 py-3 border-t border-gray-200">
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full border border-amber-400 bg-theme-17 text-theme-11 mr-2 tooltip text-xs" title="تخفیف">
                                        %  {{$slider->offer}} </a>
                                    <div class="intro-x flex mr-2 border border-2 rounded p-2 bg-gray-200 text-gray-600">
                                        {{$slider->tag}}
                                    </div>
                                    <a href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-14 text-theme-10 ml-auto tooltip" title="ویرایش"> <i data-feather="edit" class="w-3 h-3"></i> </a>
                                    @if($slider->status)
                                        <p class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-9 text-white ml-2 tooltip" title="درحال استفاده"> <i data-feather="flag" class="w-3 h-3"></i> </p>
                                    @else
                                        <form action="{{route('sliders.select',$slider)}}" method="post">
                                            @csrf
                                            <button href="" class="intro-x w-8 h-8 flex items-center justify-center rounded-full bg-theme-1 text-white ml-2 tooltip" title="انتخاب"> <i data-feather="mouse-pointer" class="w-3 h-3"></i> </button>
                                        </form>
                                    @endif
                                </div>
                                <div class="px-5 pt-3 pb-5 border-t border-gray-200">
                                    <div class="w-full flex items-center mt-3">
                                        <div class="flex-1 relative text-gray-700" style="text-align: left;direction: ltr">
                                            <input disabled type="text" class="input w-full rounded-full bg-gray-200 pr-10 placeholder-theme-13" placeholder="{{$slider->link}}">
                                            <i data-feather="link" class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <!-- END: Blog Layout -->
                    </div>
                </div>
            </div>
            @endif
        @endif

        <!-- END: Blog Layout -->
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
            <a  class="" >اسلایدر ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
