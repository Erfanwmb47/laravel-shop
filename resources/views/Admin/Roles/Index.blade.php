@extends('Admin.Layout.Layout1')


@section('content')
    <h2 class="intro-y text-lg font-medium mt-10 rtl">
       نقش ها
    </h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a href="javascript:;" data-toggle="modal" data-target="#Createmodal" class="button text-white bg-theme-1 shadow-md ml-2">افزودن نقش جدید</a>
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
                <table class="table table-report sm:mt-2">
                    <thead>
                    <tr>
                        <th class="text-center whitespace-no-wrap">تغییرات</th>
                        <th class="text-center whitespace-no-wrap">برند</th>
                        <th class="text-center whitespace-no-wrap">دسته بندی</th>
                        <th class="text-center whitespace-no-wrap">کاربران</th>
                        <th class="text-center whitespace-no-wrap">محصول</th>
                        <th class="text-center whitespace-no-wrap">کامنت</th>
                        <th class="text-center whitespace-no-wrap">نقش ها</th>
                        <th class="whitespace-no-wrap"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                    <tr class="intro-x">
                        <td class="w-40">
                            <div class="flex justify-center items-center">
                                <a href="javascript:;" data-toggle="modal" data-target="#editModal{{$role->id}}" class="flex items-center ml-3" href=""> <i data-feather="check-square" class="w-4 h-4 ml-1 "></i> </a>
                                <a href="javascript:;" data-toggle="modal" data-target="#delete-confirmation-{{$role->id}}" class="flex items-center text-theme-6" href=""> <i data-feather="trash-2" class="w-4 h-4 ml-1"></i> </a>
                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex items-center justify-center">
                                <input class="hidden" type="checkbox" id="brands-read" name="brands[]" value="8">
                                <input class="hidden" type="checkbox" id="brands-create" name="brands[]" value="4">
                                <input class="hidden" type="checkbox" id="brands-edit" name="brands[]" value="2">
                                <input class="hidden" type="checkbox" id="brands-delete" name="brands[]" value="1">
                            @switch(true)
                                    @case ($role->brands < 8)
                                    <i class="text-theme-23 w-5" data-feather="eye"></i>
                                    <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->brands == 8)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->brands == 9)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->brands == 10)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->brands == 11)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                    @case ($role->brands == 12)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->brands == 13)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                    @case ($role->brands == 14)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->brands == 15)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                @endswitch
                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-theme-9">
                                <input class="hidden" type="checkbox" id="categories-read" name="categories[]" value="8">
                                <input class="hidden" type="checkbox" id="categories-create" name="categories[]" value="4">
                                <input class="hidden" type="checkbox" id="categories-edit" name="categories[]" value="2">
                                <input class="hidden" type="checkbox" id="categories-delete" name="categories[]" value="1">
                                @switch(true)
                                    @case ($role->categories < 8)
                                    <i class="text-theme-23 w-5" data-feather="eye"></i>
                                    <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->categories == 8)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->categories == 9)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->categories == 10)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->categories == 11)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->categories == 12)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->categories == 13)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                    @case ($role->categories == 14)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->categories == 15)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                @endswitch
                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-theme-9">
                                <input class="hidden" type="checkbox" id="users-read" name="users[]" value="8">
                                <input class="hidden" type="checkbox" id="users-create" name="users[]" value="4">
                                <input class="hidden" type="checkbox" id="users-edit" name="users[]" value="2">
                                <input class="hidden" type="checkbox" id="users-delete" name="users[]" value="1">
                                @switch(true)
                                    @case ($role->users < 8)
                                    <i class="text-theme-23 w-5" data-feather="eye"></i>
                                    <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->users == 8)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->users == 9)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->users == 10)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->users == 11)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->users == 12)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->users == 13)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                    @case ($role->users == 14)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->users == 15)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                @endswitch
                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-theme-9" >
                                <input class="hidden" type="checkbox" id="products-read" name="products[]" value="8">
                                <input class="hidden" type="checkbox" id="products-create" name="products[]" value="4">
                                <input class="hidden" type="checkbox" id="products-edit" name="products[]" value="2">
                                <input class="hidden" type="checkbox" id="products-delete" name="products[]" value="1">
                                @switch(true)
                                    @case ($role->products < 8)
                                    <i class="text-theme-23 w-5" data-feather="eye"></i>
                                    <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->products == 8)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->products == 9)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->products == 10)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->products == 11)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->products == 12)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->products == 13)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                    @case ($role->products == 14)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->products == 15)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                @endswitch
                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-theme-9 " >
                                <input class="hidden" type="checkbox" id="comments-read" name="comments[]" value="8">
                                <input class="hidden" type="checkbox" id="comments-create" name="comments[]" value="4">
                                <input class="hidden" type="checkbox" id="comments-edit" name="comments[]" value="2">
                                <input class="hidden" type="checkbox" id="comments-delete" name="comments[]" value="1">
                                @switch(true)
                                    @case ($role->comments < 8)
                                    <i class="text-theme-23 w-5" data-feather="eye"></i>
                                    <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->comments == 8)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->comments == 9)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->comments == 10)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->comments == 11)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->comments == 12)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->comments == 13)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                    @case ($role->comments == 14)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->comments == 15)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                @endswitch

                            </div>
                        </td>
                        <td class="w-40">
                            <div class="flex items-center justify-center text-theme-9 " >
                                <input class="hidden" type="checkbox" id="roles-read" name="roles[]" value="8">
                                <input class="hidden" type="checkbox" id="roles-create" name="roles[]" value="4">
                                <input class="hidden" type="checkbox" id="roles-edit" name="roles[]" value="2">
                                <input class="hidden" type="checkbox" id="roles-delete" name="roles[]" value="1">
                                @switch(true)
                                    @case ($role->roles < 8)
                                   <a href="" onclick="changeParam()"> <i class="text-theme-23 w-5" data-feather="eye"></i></a>
                                    <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->roles == 8)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->roles == 9)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->roles == 10)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-23 w-5" data-feather="trash"></i>
                                        @break
                                    @case ($role->roles == 11)
                                        <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                        <i class="text-theme-23 w-5" data-feather="file-plus"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                        <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                        @break
                                    @case ($role->roles == 12)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->roles == 13)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-23 w-5" data-feather="edit-2"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                    @case ($role->roles == 14)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-23 w-5" data-feather="trash"></i>
                                    @break
                                    @case ($role->roles == 15)
                                    <i class="text-theme-28 w-5 tooltip" data-feather="eye" title="مشاهده"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="file-plus" title="افزودن"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="edit-2" title="ویرایش"></i>
                                    <i class="text-theme-28 w-5 tooltip" data-feather="trash" title="حذف"></i>
                                    @break
                                @endswitch
                            </div>
                        </td>
                        <td>
                            <a href="javascript:;" data-toggle="modal" data-target="#usersModal{{$role->id}}" class="font-medium whitespace-no-wrap flex-justify-start" >{{$role->name}}</a>
                        </td>
                        <td class="table-report__action w-56">
                            <div class="flex w-10 m-auto">
                                <div class="w-10 h-10 image-fit zoom-in">
                                    <img alt="Midone Tailwind HTML Admin Template" class="tooltip rounded-full" src="/Admin/images/86518.png" title="Uploaded at 6 August 2022">
                                </div>
                            </div>
                        </td>
                        <td class="table-report__action w-5">
                            <input class="input border border-gray-500" type="checkbox">
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @foreach($roles as $role)
{{--            لیست کاربران --}}
            <div class="modal" id="usersModal{{$role->id}}">
                <div class="modal__content modal__content--xl">
                    <form action="{{route('roles.update',$role->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                            <h2 class="font-medium text-base ml-auto">
                                ویرایش برند {{$role->name}}
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
                        <div class="grid grid-cols-12 gap-6 mt-5 rtl">
                            <!-- BEGIN: Users Layout -->
                            @foreach($users as $user)
                                @if($user->role_id == $role->id)
                            <div class="intro-y col-span-12 md:col-span-6 rtl">
                                <div class="box">
                                    <div class="flex flex-col lg:flex-row items-center p-5">
                                        <div class="w-24 h-24 lg:w-12 lg:h-12 image-fit lg:mr-1">
                                            <img alt="" class="rounded-full" src="{{str_replace('public','/storage',$user->image)}}">
                                        </div>
                                        <div class="lg:mr-2 lg:ml-auto text-center lg:text-left mt-3 lg:mt-0 rtl">
                                            <a href="" class="font-medium">{{$user->username}}</a>
                                            <div class="text-gray-600 text-xs"> {{$user->firstName}} {{$user->lastName}}</div>
                                        </div>
                                        <div class="flex mt-4 lg:mt-0">
                                            <button class="button button--sm text-white bg-theme-1 mr-2">Message</button>
                                            <a href="{{route('users.edit',$user->id)}}" class="button button--sm text-gray-700 border border-gray-300">Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endif
                            @endforeach
                        </div>

                <div class="px-5 py-3 text-right border-t border-gray-200">
                            <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
{{--                            <input type="submit" class="button w-20 bg-theme-1 text-white" value="ویرایش">--}}
                        </div>
                    </form>
                </div>
            </div>
{{--حذف نقش مورد نظر --}}
            <div class="modal" id="delete-confirmation-{{$role->id}}">
                <div class="modal__content">
                    <form action="{{route('roles.destroy',$role)}}"method="post">
                        @csrf
                        @method('DELETE')
                    <div class="p-5 text-center">
                        <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">  {{$role->name}}  حذف </div>
                        <div class="text-gray-600 mt-2">با انتخاب این گزینه نقش مورد نظر حذف میشود </div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="button w-24 border text-gray-700 mr-1">انصراف</button>
                        <button type="submit" class="button w-24 bg-theme-6 text-white">حذف</button>
                    </div>
                    </form>
                </div>

            </div>
            {{--ویرایش نقش--}}
            <div class="modal" id="editModal{{$role->id}}">
                <div class="modal__content modal__content--xl">

                    <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                        <h2 class="font-medium text-base ml-auto">
                            ویرایش نقش {{$role->name}}
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
                    <!-- BEGIN: Users Layout -->
                    <div class="grid grid-cols-12 gap-3">
                        <div class="col-span-11 ml-auto items-center rtl w-full">
                            <form action="{{route('roles.update',$role)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="mt-3 w-2/3">
                                    <label>نام</label>
                                    <input type="text" name="name" class="input w-full rounded-full border mt-2" placeholder="" value="{{$role->name}}">
                                </div>
                                <div class="mt-5 accordion">
                                    <div class="accordion__pane active border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">کاربران</a>
                                        <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" @if($role->users >= 8)checked @endif value="8" name="users[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->users >= 12)checked @endif value="4" name="users[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->users == 10 || $role->users == 11 || $role->users == 14 || $role->users == 15)checked @endif value="2" name="users[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->users == 9 || $role->users == 11 || $role->users == 13 || $role->users == 15)checked @endif value="1" name="users[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">دسته بندی</a>
                                        <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" @if($role->categories >= 8)checked @endif value="8" name="categories[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->categories >= 12)checked @endif value="4" name="categories[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->categories == 10 || $role->categories == 11 || $role->categories == 14 || $role->categories == 15)checked @endif value="2" name="categories[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->categories == 9 || $role->categories == 11 || $role->categories == 13 || $role->categories == 15)checked @endif value="1" name="categories[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">برندها</a>
                                        <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" @if($role->brands >= 8)checked @endif value="8" name="brands[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->brands >= 12)checked @endif value="4" name="brands[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->brands == 10 || $role->brands == 11 || $role->brands == 14 || $role->brands == 15)checked @endif value="2" name="brands[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->brands == 9 || $role->brands == 11 || $role->brands == 13 || $role->brands == 15)checked @endif value="1" name="brands[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">محصولات1</a>
                                        <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" @if($role->products >= 8)checked @endif value="8" name="products[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->products >= 12)checked @endif value="4" name="products[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->products == 10 || $role->products == 11 || $role->products == 14 || $role->products == 15)checked @endif value="2" name="products[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->products == 9 || $role->products == 11 || $role->products == 13 || $role->products == 15)checked @endif value="1" name="products[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">نقش ها</a>
                                        <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" @if($role->roles >= 8)checked @endif value="8" name="roles[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->roles >= 12)checked @endif value="4" name="roles[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->roles == 10 || $role->roles == 11 || $role->roles == 14 || $role->roles == 15)checked @endif value="2" name="roles[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->roles == 9 || $role->roles == 11 || $role->roles == 13 || $role->roles == 15)checked @endif value="1" name="roles[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">کامنت ها</a>
                                        <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                            <div class="flex flex-col sm:flex-row mt-2">
                                                <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" @if($role->comments >= 8)checked @endif value="8" name="comments[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->comments >= 12)checked @endif value="4" name="comments[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->comments == 10 || $role->comments == 11 || $role->comments == 14 || $role->comments == 15)checked @endif value="2" name="comments[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                                <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" @if($role->comments == 9 || $role->comments == 11 || $role->comments == 13 || $role->comments == 15)checked @endif value="1" name="comments[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-5 py-3 text-right border-t border-gray-200">
                                    <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                                    <input type="submit" class="button w-20 bg-theme-1 text-white" value="ایجاد">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        @endforeach
        <!-- END: Data List -->
        <!-- BEGIN: Pagination -->
        <div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex-row sm:flex-no-wrap items-center ">
            {{--                                {{$brands->links()}}--}}
            @include('Pagination.Admin', ['paginator' => $roles,'route'=>'roles'])
        </div>
        <!-- END: Pagination -->
    </div>

{{--ایجحاد نقش جدید--}}
    <div class="modal" id="Createmodal">
        <div class="modal__content modal__content--xl">

                <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                    <h2 class="font-medium text-base ml-auto">
                        نقش جدید
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
                    <!-- BEGIN: Users Layout -->
                <div class="grid grid-cols-12 gap-3">
                    <div class="col-span-11 ml-auto items-center rtl w-full">
                        <form action="{{route('roles.store')}}" method="post">
                            @csrf
                    <div class="mt-3 w-2/3">
                        <label>نام</label>
                        <input type="text" name="name" class="input w-full rounded-full border mt-2" placeholder="نام نقش">
                    </div>
                        <div class="mt-5 accordion">
                            <div class="accordion__pane active border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">کاربران</a>
                                <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="flex items-center text-gray-700 mr-2"><input type="checkbox"  value="8" name="users[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="4" name="users[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="2" name="users[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="1" name="users[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">دسته بندی</a>
                                <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" value="8" name="categories[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="4" name="categories[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="2" name="categories[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="1" name="categories[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">برندها</a>
                                <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" value="8" name="brands[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="4" name="brands[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="2" name="brands[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="1" name="brands[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">محصولات1</a>
                                <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" value="8" name="products[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="4" name="products[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="2" name="products[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="1" name="products[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">نقش ها</a>
                                <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" value="8" name="roles[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="4" name="roles[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="2" name="roles[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="1" name="roles[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion__pane  border-b border-gray-200 pb-4"> <a href="javascript:;" class="accordion__pane__toggle font-medium block">کامنت ها</a>
                                <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
                                    <div class="flex flex-col sm:flex-row mt-2">
                                        <div class="flex items-center text-gray-700 mr-2"><input type="checkbox" value="8" name="comments[]" class="input border mr-2" id="horizontal-checkbox-chris-evans"> <label class="cursor-pointer select-none" for="horizontal-checkbox-chris-evans">خواندن</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="4" name="comments[]" class="input border mr-2" id="horizontal-checkbox-liam-neeson"> <label class="cursor-pointer select-none" for="horizontal-checkbox-liam-neeson">ایجاد</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="2" name="comments[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">ویرایش</label> </div>
                                        <div class="flex items-center text-gray-700 mr-2 mt-2 sm:mt-0"> <input type="checkbox" value="1" name="comments[]" class="input border mr-2" id="horizontal-checkbox-daniel-craig"> <label class="cursor-pointer select-none" for="horizontal-checkbox-daniel-craig">حذف</label> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="px-5 py-3 text-right border-t border-gray-200">
                        <button type="button" data-dismiss="modal" class="button w-20 border text-gray-700 mr-1">لغو</button>
                        <input type="submit" class="button w-20 bg-theme-1 text-white" value="ایجاد">
                    </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>

@endsection
@section('js')
    <script>
            // $("i").onclick(function (){
            //     $(this).addClass('hidden');
            // });
            $("input").click(function (){
                var x = this.value;
                // console.log(x);

                   var par = this.parentElement.parentElement;
                    var r = par.getElementsByTagName('div')[0].firstElementChild;
                    var c = par.getElementsByTagName('div')[1].firstElementChild;
                    var u = par.getElementsByTagName('div')[2].firstElementChild;
                    var d = par.getElementsByTagName('div')[3].firstElementChild;

                    // console.log(c);
                    // console.log(u);
                    // console.log(d);
                    if(!c.checked && !u.checked && !d.checked){
                        r.disabled = false;
                    }
                    if(c.checked || u.checked || d.checked){
                        r.checked =true;
                        console.log(r);
                    }
                      // console.log(this.checked);
                    if(!this.checked) {
                        // y.checked = false;
                        console.log('deactived');
                    }
                    else if(this.checked){
                        r.checked = true;
                        r.readOnly = true;
                        // r.disabled = true;
                        console.log('actived');
                    }


            });
    </script>
@endsection
