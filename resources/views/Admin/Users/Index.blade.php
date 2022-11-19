@extends('Admin.Layout.Layout1')


@section('content')
    <h2 class="intro-y text-lg font-medium mt-10 rtl">
        لیست کاربران سایت
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="{{route('users.create')}}" class="button text-white bg-theme-1 shadow-md ml-2">افزودن کاربر جدید</a>
            <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center"> <i class="w-4 h-4" data-feather="plus"></i> </span>
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
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13 rtl" placeholder="جست و جو ...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="col-span-12 mt-6">
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                <form action="{{route('users.multiDestroy')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
                <table class="table table-report sm:mt-2">
                    <thead>
                    <tr>
                        @if(\Illuminate\Support\Facades\Auth::user()->role->users > 12)
                        <th class="flex  text-center whitespace-no-wrap">تغییرات
                            @if(\Illuminate\Support\Facades\Auth::user()->role->users == 13|| \Illuminate\Support\Facades\Auth::user()->role->users == 15)
                            <button id="deleteAll" type="submit" name="deleteAll" class=" mr-5 ml-auto tooltip items-center text-theme-6" title="حذف موارد انتخاب شده " > <i data-feather="trash" class="  w-5 h-5 ml-1"></i> </button>
                            @endif

                        </th>

                        @endif
                        <th class="text-center whitespace-no-wrap">نقش کاربر</th>
                        <th class="text-center whitespace-no-wrap">موجودی کیف پول (تومان)</th>
                        <th class="whitespace-no-wrap text-right">مشخصات کاربر</th>
                        <th class="whitespace-no-wrap text-center">تصویر</th>
                        <th class="whitespace-no-wrap">
                            <div class="ml-0 w-full col-span-12 flex-justify-profile">
                                <input type="checkbox" title="انتخاب همه" onClick="toggle(this)" class=" tooltip input border border-gray-500 marked mt-5 ml-0 float-left" /> <br>

                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users  as $user)

{{--                        <form method="get" action="{{route('users.edit',$user->id)}}">--}}
{{--                            @csrf--}}
                            <tr class="intro-x">
                                @if(\Illuminate\Support\Facades\Auth::user()->role->users > 12)
                                <td class="w-40">
                                    <div class="flex justify-center items-center">
                                        @if(\Illuminate\Support\Facades\Auth::user()->role->users > 13)
                                        <a href="{{route('users.edit',$user->id)}}" class="flex items-center ml-3" > <i data-feather="check-square" class="w-4 h-4 ml-1 "></i> </a>
                                        @endif
                                            @if(\Illuminate\Support\Facades\Auth::user()->role->users == 13|| \Illuminate\Support\Facades\Auth::user()->role->users == 15)
                                        <a data-toggle="modal" id="submit" data-target="#UserDelete{{$user->id}}" class="flex items-center text-theme-6" href="javascript:;"> <i data-feather="trash-2" class="w-4 h-4 ml-1"></i> </a>
                                        @endif
                                    </div>
                                </td>
                                @endif
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-theme-9"> <i data-feather="more-vertical" class="w-4 h-4 ml-2"></i> {{$user->role->name}}</div>
                                </td>
                                <td class="text-center">25.000 </td>

                                <td>
                                    <a href="" class="font-medium whitespace-no-wrap flex-justify-start">{{$user->username}}</a>
                                    <div class="text-gray-600 text-xs whitespace-no-wrap flex-justify-start">{{$user->firstName}} {{$user->lastName}} </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex w-10 m-auto">
                                        <div class="w-10 h-10 image-fit zoom-in">
                                            <img alt="{{$user->username}}" class="tooltip rounded-full" src="{{str_replace('public','/storage',$user->image)}}" title="آپلود شده در تاریخ {{$user->updated_at}}">
                                        </div>
                                    </div>
                                </td>
                <td class="table-report__action w-5">

                    <input onclick="multidelete(this);" value="{{$user->username}}" name="{{$user->id}}" class="marked input border border-gray-500" type="checkbox">

                </td>
</tr>
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
@include('Pagination.Admin', ['paginator' => $users,'route' => 'users'])
</div>
<!-- END: Pagination -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
    @if(\Illuminate\Support\Facades\Auth::user()->role->users == 13 || \Illuminate\Support\Facades\Auth::user()->role->users == 15)


    @foreach($users as $user)


        {{--    DELETE user--}}
<div class="modal" id="UserDelete{{$user->id}}">
<div class="modal__content">
<form action="{{route('users.destroy',$user->id)}}" method="post" >
@csrf
@method('DELETE')

<div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
<div class="text-3xl mt-5">حذف کاربر  <span style="color: #8b0000">{{$user->username}}</span></div>
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
@endforeach
    @endif
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
