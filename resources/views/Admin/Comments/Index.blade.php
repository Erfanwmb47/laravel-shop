
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />
@endsection

@section('content')
<div class="grid grid-cols-12 gap-6 mt-8">
    <div class="col-span-12 lg:col-span-3 xxl:col-span-2">
        <h2 class="intro-y text-lg font-medium mr-auto mt-2">
            نظرات
        </h2>
        <!-- BEGIN: Inbox Menu -->
        <div class="intro-y box bg-theme-1 p-5 mt-6">
            <button type="button" class="button button--lg flex items-center justify-center text-gray-700 w-full bg-white mt-2"> <i class="w-4 h-4 mr-2" data-feather="edit-3"></i> Compose </button>
            <div class="border-t border-theme-3 mt-6 pt-6 text-white rtl">
                <form action="{{route('comments.index')}}" method="post" class="flex items-center px-3 py-2 rounded-md  font-medium @if(!side_menu_active(['dashboard/comments/approved','dashboard/comments/unapproved'],'bg-theme-22')) bg-theme-22 @endif">
                  @csrf
                    <button class="w-full foc flex">  <i class="w-4 h-4 ml-2 float-right" data-feather="mail"></i> همه نظرات </button>
                </form>
                <form method="post" action="{{route('comments.index.approved')}}" class="flex items-center px-3 py-2 mt-2 rounded-md {{side_menu_active('dashboard/comments/approved','bg-theme-22')}}">
                    @csrf
                    <button class="w-full foc flex"><i class="w-4 h-4 mr-2" data-feather="star"></i> تایید شده ها </button></form>
                <form method="post" action="{{route('comments.index.unapproved')}}" class="flex items-center px-3 py-2 mt-2 rounded-md {{side_menu_active('dashboard/comments/unapproved','bg-theme-22')}}">
                    @csrf
                    <button class="w-full foc flex"><i class="w-4 h-4 ml-2" data-feather="inbox"></i> تایید نشده ها </button></form>
{{--                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="send"></i> Sent </a>--}}
{{--                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md"> <i class="w-4 h-4 ml-2" data-feather="trash"></i> Trash </a>--}}
            </div>
            <div class="border-t border-theme-3 mt-5 pt-5 text-white">
                <a href="" class="flex items-center px-3 py-2 truncate">
                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                    Custom Work
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                    <div class="w-2 h-2 bg-theme-9 rounded-full mr-3"></div>
                    Important Meetings
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                    <div class="w-2 h-2 bg-theme-12 rounded-full mr-3"></div>
                    Work
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                    <div class="w-2 h-2 bg-theme-11 rounded-full mr-3"></div>
                    Design
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate">
                    <div class="w-2 h-2 bg-theme-6 rounded-full mr-3"></div>
                    Next Week
                </a>
                <a href="" class="flex items-center px-3 py-2 mt-2 rounded-md truncate"> <i class="w-4 h-4 mr-2" data-feather="plus"></i> Add New Label </a>
            </div>
        </div>
        <!-- END: Inbox Menu -->
    </div>
    <div class="col-span-12 lg:col-span-9 xxl:col-span-10">
        <!-- BEGIN: Inbox Filter -->
        <div class="intro-y flex flex-col-reverse sm:flex-row items-center">
            <div class="w-full sm:w-auto relative mr-auto mt-3 sm:mt-0">
                <form>
                    <input type="text"   name="search" class="input w-56 box pr-10 placeholder-theme-13 rtl" placeholder="جست و جو ..." value="{{request('search')}}">
                    <button type="submit" class=" absolute my-auto inset-y-0 mr-3 right-0 foc"><i class="w-4 h-4" data-feather="search"></i></button>
                </form>
            </div>
            <div class="w-full sm:w-auto flex">
                <button class="button text-white bg-theme-1 shadow-md mr-2">Start a Video Call</button>
                <div class="dropdown relative">
                    <button class="dropdown-toggle button px-2 box text-gray-700">
                        <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                    </button>
                    <div class="dropdown-box mt-10 absolute w-40 top-0 right-0 z-20">
                        <div class="dropdown-box__content box p-2">
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="user" class="w-4 h-4 mr-2"></i> Contacts </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="settings" class="w-4 h-4 mr-2"></i> Settings </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Inbox Filter -->
        <!-- BEGIN: Inbox Content -->
        <div class="intro-y inbox box mt-5">
            <div class="p-5  sm:flex-row text-gray-600 border-b border-gray-200 mr-12 ">

{{--                <div class="flex items-center sm:mr-auto rtl">--}}
{{--                    <div>1 - 50 of 5,238</div>--}}
{{--                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="chevron-left"></i> </a>--}}
{{--                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="chevron-right"></i> </a>--}}
{{--                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="settings"></i> </a>--}}
{{--                </div>--}}
                <div class=" flex-justify-profile items-center mt-3 sm:mt-0 border-t sm:border-0 border-gray-200 pt-5 sm:pt-0 mt-5 sm:mt-0 -mx-5 sm:mx-0 px-5 sm:px-0 ">
                    <input class="input border border-gray-500 float-right ml-3" type="checkbox">
                    <div class="dropdown relative ml-1 ">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;"> <i data-feather="chevron-down" class="w-5 h-5"></i> </a>
                        <div class="dropdown-box mt-6 absolute w-32 top-0 left-0 z-40">
                            <div class="dropdown-box__content box p-2"> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">All</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">None</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Read</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Unread</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Starred</a> <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">Unstarred</a> </div>
                        </div>
                    </div>
{{--                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="refresh-cw"></i> </a>--}}
{{--                    <a href="javascript:;" class="w-5 h-5 ml-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="more-horizontal"></i> </a>--}}
                </div>
            </div>
            <div class="overflow-x-auto sm:overflow-x-visible">
                @if(!!count($comments))
                    @foreach($comments as $comment)
                        <div class="intro-y ">
                            <div class="inbox__item inbox__item--active inline-block sm:block text-gray-700 bg-gray-100 border-b border-gray-200 ">
                                <div class="flex px-5 py-3 {{$comment->approved == 'allow' ? 'bg-theme-18':'bg-theme-31' }}">
                                    <div class="w-56 flex-none flex items-center mr-10 ">
                                        <input class="input flex-none border border-gray-500" type="checkbox" >

                                        <a href="javascript:;" data-toggle="modal" id="submit" data-target="#CommentsEdit{{$comment->id}}"  class=" w-5 h-5 flex-none mr-4 flex items-center justify-center text-gray-500"> <i class="w-4 h-4" data-feather="edit-2"></i> </a>
                                        <a href="javascript:;" data-toggle="modal" id="submit" data-target="#CommentsDelete{{$comment->id}}"  class=" w-5 h-5 flex-none mr-4 flex items-center justify-center text-gray-500"> <i class="w-4 h-4" data-feather="trash"></i> </a>

                                        <form method="post" action="{{route('comments.update.approved',$comment)}}" title="تایید نظر "class="tooltip w-5 h-5 flex-none mr-2 flex items-center justify-center text-gray-500">
                                            @csrf
                                            @method('PATCH')
                                            <button class="foc"><i class="w-4 h-4" data-feather="eye"></i></button>
                                        </form>
                                        <div class="w-6 h-6 flex-none image-fit relative mr-5">
                                            {{--
                                                                               @dd($comment->commentable->gallery->path)
                                            --}}
                                            <img alt="Midone Tailwind HTML Admin Template" class="rounded-full" src="{{str_replace('public','/storage',$comment->commentable->gallery->path)}}">
                                        </div>
                                        {{--                                TODO tool tip for user name--}}
                                        <div class="inbox__item--sender truncate mr-3 text-right w-20">{{$comment->user->username}}</div>
                                    </div>
                                    <div class="w-64 sm:w-auto truncate rtl"> <span class="inbox__item--highlight mr-1">
                                            @php
                                                echo $comment->text;
                                            @endphp
                                        </span> </div>
                                    <div class="inbox__item--time whitespace-no-wrap mr-auto pr-10 rtl">{{$comment->created_at->ago()}}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="text-center items-center">
                    نظری وجود ندارد
                </div>
                @endif
            </div>
            <div class="p-5 flex flex-col sm:flex-row items-center text-center sm:text-left text-gray-600">
{{--                <div>4.41 GB (25%) of 17 GB used Manage</div>--}}
{{--                <div class="sm:ml-auto mt-2 sm:mt-0">Last account activity: 36 minutes ago</div>--}}
                @include('Pagination.Admin', ['paginator' => $comments,'route' => 'comments'])
            </div>
        </div>
        <!-- END: Inbox Content -->
    </div>
</div>
    @foreach($comments as $comment)
        <div class="modal" id="CommentsEdit{{$comment->id}}">
            <div class="modal__content">
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base mr-auto">ویرایش نظر {{$comment->user->username}}</h2>
                </div>
                <form action="{{route('comments.update',$comment)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-12 rtl"> <label>نظر</label>
                            <textarea name="text" class="input w-full border mt-2 flex-1 w-full"  >
                                {{$comment->text}}
                            </textarea>
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" class="button w-20 border text-gray-700 mr-1">Cancel</button>
                        <button type="submit" class="button w-20 bg-theme-1 text-white">Send</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal" id="CommentsDelete{{$comment->id}}">

            <div class="modal__content">
                <form action="{{route('comments.destroy',$comment)}}" method="post">
                    @csrf
                    @method('DELETE')
                <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">مطمئنی</div>
                    <div class="text-gray-600 mt-2">حذف نظر کاربر {{$comment->user->username}}</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">Cancel</button>
                    <button type="submit" class="button w-24 bg-theme-6 text-white">حذف</button> </div>
                </form>
            </div>

        </div>
    @endforeach
@endsection
@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" disabled >لیست نظرات</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('products.index')}}" class="breadcrumb--active" >محصولات</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
