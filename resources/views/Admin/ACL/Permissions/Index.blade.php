


@section('content')
    <h2 class="intro-y text-lg font-medium mt-10 rtl">
        لیست دسترسی های سایت
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            @can('create-permission')
            <a href="javascript:;"  data-toggle="modal" data-target="#CreatePermission" class="button text-white bg-theme-1 shadow-md ml-2">افزودن دسترسی جدید</a>
            @endcan
                <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                    <div class="dropdown-box__content box p-2">
                         <a href="" class="flex items-center block p-2 bg-theme-18  transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                              نمایش ادمین ها <i data-feather="check" class="w-4 h-4 mr-2" style="color: darkgreen"></i></a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="users" class="w-4 h-4 mr-2"></i> نمایش ادمین ها </a>
                            <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md"> <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF </a>
                    </div>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-gray-600"></div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700">
                    <form>
                        <input type="text"   name="search" class="input w-56 box pr-10 placeholder-theme-13 rtl" placeholder="جست و جو ..." value="{{request('search')}}">
                        <button type="submit" class=" absolute my-auto inset-y-0 mr-3 right-0 foc"><i class="w-4 h-4" data-feather="search"></i></button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-span-12">
            <x-auth-validation-errors class="text-danger mt-3 list-disc list-inside text-sm-start rtl mr-2" :errors="$errors" />
{{--            TODO نمایش ارور--}}
        </div>
        <!-- BEGIN: Data List -->
        <div class="col-span-12 mt-6">
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
{{--                TODO multi Destroy--}}
                <form action="" method="post" enctype="multipart/form-data" class="grid grid-cols-12">
                    @csrf
                    @method('DELETE')
                    <table class="table table-report sm:mt-2 col-span-6 ">
                        <thead>
                        <tr>
                            <th class="flex  text-right whitespace-no-wrap">تغییرات
                                <button id="deleteAll" type="submit" name="deleteAll" class=" mr-5 ml-auto tooltip items-center text-theme-6" title="حذف موارد انتخاب شده " > <i data-feather="trash" class="  w-5 h-5 ml-1"></i> </button>
                            </th>
                            <th class="text-right whitespace-no-wrap">
                                <span class="float-right">نام دسترسی</span>
                                @if((request()->query('chevron') == 'descending' && request()->query('order_by') == 'name'))
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'ascending','order_by'=> 'name'])}}"> <i data-feather="chevron-down" class="w-4 h-4 mr-4 ml-auto"></i></a>
                                @else
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'descending','order_by'=> 'name'])}}"> <i data-feather="chevron-up" class="w-4 h-4 mr-4 ml-auto"></i></a>

                                @endif
                            </th>
                            <th class="whitespace-no-wrap text-right ">
                                <span class="float-right">ID</span>
                                @if((request()->query('chevron') == 'descending' && request()->query('order_by') == 'id'))
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'ascending','order_by'=> 'id'])}}"> <i data-feather="chevron-down" class="w-4 h-4 mr-4 ml-auto"></i></a>
                                @else
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'descending','order_by'=> 'id'])}}"> <i data-feather="chevron-up" class="w-4 h-4 mr-4 ml-auto"></i></a>
                                @endif
                            </th>
                            <th class="whitespace-no-wrap">
                                <div class="ml-0 w-full col-span-12 flex-justify-profile">
                                    <input type="checkbox" title="انتخاب همه" onClick="toggle(this)" class=" tooltip input border border-gray-500 marked mt-5 ml-0 float-left" /> <br>

                                </div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions  as $permission)
                            {{--                        <form method="get" action="{{route('users.edit',$permission->id)}}">--}}
                            {{--                            @csrf--}}
                            @if($loop->even)
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="flex justify-center items-center">
                                            @can('edit-permission')
                                                <a data-toggle="modal" id="submit" data-target="#EditPermission{{$permission->id}}" class="flex items-center ml-3" > <i data-feather="check-square" class="w-4 h-4 ml-1 "></i> </a>
                                            @endcan
                                            @can('delete-permission')
                                                <a data-toggle="modal" id="submit" data-target="#DeletePermission{{$permission->id}}" class="flex items-center text-theme-6" href="javascript:;"> <i data-feather="trash-2" class="w-4 h-4 ml-1"></i> </a>
                                            @endcan
                                        </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-no-wrap flex-justify-start">{{$permission->label}}</a>
                                        <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-start">{{$permission->name}}  </div>
                                    </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-no-wrap flex-justify-start text-center">{{$permission->id}}</a>
                                    </td>
                                    <td class="table-report__action w-5">
                                        @can('delete-permission')
                                            <input onclick="multidelete(this);" value="{{$permission->username}}" name="{{$permission->id}}" class="marked input border border-gray-500" type="checkbox">
                                        @endcan
                                    </td>
                                </tr>
                            @endif
                            {{--                        </form>--}}
                        @endforeach
                        </tbody>
                    </table>

                    <table class="table table-report sm:mt-2 col-span-6 ml-2">
                    <thead>
                    <tr>
                        <th class="flex  text-right whitespace-no-wrap">تغییرات
                        </th>
                        <th class="text-right whitespace-no-wrap">
                            <span class="float-right">نام دسترسی</span>
                            @if((request()->query('chevron') == 'descending' && request()->query('order_by') == 'name'))
                                <a href="{{request()->fullUrlWithQuery(['chevron' => 'ascending','order_by'=> 'name'])}}"> <i data-feather="chevron-down" class="w-4 h-4 mr-4 ml-auto"></i></a>
                            @else
                                <a href="{{request()->fullUrlWithQuery(['chevron' => 'descending','order_by'=> 'name'])}}"> <i data-feather="chevron-up" class="w-4 h-4 mr-4 ml-auto"></i></a>

                            @endif
                        </th>
                            <th class="whitespace-no-wrap text-right ">
                                <span class="float-right">ID</span>
                                @if((request()->query('chevron') == 'descending' && request()->query('order_by') == 'id'))
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'ascending','order_by'=> 'id'])}}"> <i data-feather="chevron-down" class="w-4 h-4 mr-4 ml-auto"></i></a>
                                @else
                                    <a href="{{request()->fullUrlWithQuery(['chevron' => 'descending','order_by'=> 'id'])}}"> <i data-feather="chevron-up" class="w-4 h-4 mr-4 ml-auto"></i></a>
                                @endif
                            </th>
                        <th class="whitespace-no-wrap">
                            <div class="ml-0 w-full col-span-12 flex-justify-profile">
                                <input type="checkbox" title="انتخاب همه" onClick="toggle(this)" class=" tooltip input border border-gray-500 marked mt-5 ml-0 float-left" /> <br>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($permissions  as $permission)
{{--                        <form method="get" action="{{route('users.edit',$permission->id)}}">--}}
{{--                            @csrf--}}
                            @if($loop->odd)
                            <tr class="intro-x">
                                <td class="w-40">
                                    <div class="flex justify-center items-center">
                                        @can('edit-permission')
                                        <a data-toggle="modal" id="submit" data-target="#EditPermission{{$permission->id}}" class="flex items-center ml-3" > <i data-feather="check-square" class="w-4 h-4 ml-1 "></i> </a>
                                        @endcan
                                        @can('delete-permission')
                                            <a data-toggle="modal" id="submit" data-target="#DeletePermission{{$permission->id}}" class="flex items-center text-theme-6" href="javascript:;"> <i data-feather="trash-2" class="w-4 h-4 ml-1"></i> </a>
                                        @endcan
                                    </div>
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap flex-justify-start">{{$permission->label}}</a>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-start">{{$permission->name}}  </div>
                                </td>
                                    <td>
                                        <a href="" class="font-medium whitespace-no-wrap flex-justify-start text-center">{{$permission->id}}</a>
                                    </td>
                <td class="table-report__action w-5">
                    @can('delete-permission')
                    <input onclick="multidelete(this);" value="{{$permission->username}}" name="{{$permission->id}}" class="marked input border border-gray-500" type="checkbox">
                    @endcan
                </td>
</tr>
                            @endif
{{--                        </form>--}}
@endforeach
</tbody>
</table>
</form>
</div>
</div>
<!-- END: Data List -->
<!-- BEGIN: Pagination -->
<div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex-row sm:flex-no-wrap items-center ">
{{--                {{$brands->links()}}--}}
@include('Pagination.Admin', ['paginator' => $permissions,'route' => 'permissions'])
</div>
<!-- END: Pagination -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
    @foreach($permissions as $permission)
{{--        Edit Permission--}}
@can('edit-permission')
        <div class="modal" id="EditPermission{{$permission->id}}">
            <div class="modal__content rtl">
                <form action="{{route('permissions.update',$permission)}}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                        <div class="dropdown relative sm:hidden">
                            <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
                                <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                            <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                            </div>
                        </div>
                        <p>ویرایش دسترسی {{$permission->label}}</p>
                    </div>
                    <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                        <div class="col-span-12 sm:col-span-6"> <label>نام انگلیسی </label>
                            <input required type="text" name="name" class="input w-full border mt-2 flex-1"  value="{{old('name',$permission->name)}}"> </div>
                        <div class="col-span-12 sm:col-span-6"> <label>نام فارسی</label>
                            <div class="relative mt-2">
                                <input type="text" required name="label" class="input pl-12 w-full border col-span-4 " value="{{old('label',$permission->label)}}">
                            </div>
                        </div>
                    </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button"  data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                        <button type="submit" class="button w-20 bg-theme-1 text-white">افزودن</button>
                    </div>
                </form>
            </div>
        </div>
@endcan
        {{--    DELETE user--}}
@can('delete-permission')
<div class="modal" id="DeletePermission{{$permission->id}}">
<div class="modal__content">
<form action="{{route('permissions.destroy',$permission->id)}}" method="post" >
@csrf
@method('DELETE')

<div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
<div class="text-3xl mt-5">حذف دسترسی   <span style="color: #8b0000">{{$permission->label}}</span></div>
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
@endforeach
    @can('create-permission')
    <div class="modal" id="CreatePermission">
        <div class="modal__content rtl">
            <form action="{{route('permissions.store')}}" method="post">
                @csrf
                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <div class="dropdown relative sm:hidden">
                        <a class="dropdown-toggle w-5 h-5 block" href="javascript:;">
                            <i data-feather="more-horizontal" class="w-5 h-5 text-gray-700"></i> </a>
                        <div class="dropdown-box mt-5 absolute w-40 top-0 right-0 z-20">
                        </div>
                    </div>
                    <p>افزودن دسترسی جدید</p>
                </div>
                <div class="p-5 grid grid-cols-12 gap-4 row-gap-3">
                    <div class="col-span-12 sm:col-span-6"> <label>نام انگلیسی </label>
                        <input required type="text" name="name" class="input w-full border mt-2 flex-1" placeholder="نام انگلیسی"> </div>
                    <div class="col-span-12 sm:col-span-6"> <label>نام فارسی</label>
                        <div class="relative mt-2">
                            <input type="text" required name="label" class="input pl-12 w-full border col-span-4 " placeholder="نام فارسی">
                        </div>
                    </div>
                </div>
                <div class="px-5 py-3 text-right border-t border-gray-200">
                    <button type="button"  data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                    <button type="submit" class="button w-20 bg-theme-1 text-white">افزودن</button>
                </div>
            </form>
        </div>
    </div>
    @endcan
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
@endsection
@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >دسترسی ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
