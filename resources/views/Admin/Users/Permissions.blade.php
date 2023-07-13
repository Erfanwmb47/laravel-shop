
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />
    <link rel="stylesheet" href="/Admin/css/GalleryFileUploader.css" />
@endsection

@section('content')
    <div class="pos intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-12">
            <h2 class="intro-y text-lg font-medium mt-10 flex">
                ویرایش دسترسی کاربر             </h2>
            <p class="intro-y text-xs font-medium  flex mb-5 " style="color: #4a5568">برای ویرایش مقام  فیلد های مورد نظر را پر کرده و در نهایت اطلاعات را ذخیره کنید</p>
            <hr>
        </div>
        {{--Begin new Category--}}

        <div class="col-span-12 lg:col-span-12">
            <form action="{{route('users.permissions.store',$user)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <div class="pos__tabs nav-tabs justify-center flex">
                            <a data-toggle="tab" data-target="#Specifications" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">مقام ها</a>
                            <a data-toggle="tab" data-target="#description" href="javascript:;" class="flex-1 py-2 rounded-md text-center"> دسترسی ها </a>
{{--                            <a data-toggle="tab" data-target="#image" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس مقام</a>--}}
                        </div>
                    </div>
                </div>
                <x-auth-validation-errors class="text-danger mt-3 list-disc list-inside text-sm-start rtl mr-2" :errors="$errors" />

                <div class="tab-content">
                    <div class="tab-content__pane active" id="Specifications">
                        <div class="pos__ticket box p-2 mt-5">
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                    <p> در این قسمت مقام را انتخاب کنید</p>
                                </div>
                                <div class="p-5 " id="input">
                                    <div class="p-5 col-span-12">
                                        <select data-placeholder="مقام مورد نظر را انتخاب کنید" class="select2 w-full m-auto items-center" multiple name="roles[]" style="width: 100%;">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}" {{in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{$role->label}}</option>
                                            @endforeach
                                        </select>
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
                                        <p> سطوح دسترسی  را در کادر زیر وارد کنید</p>
                                    </div>
                                    <div class="p-5 col-span-12" id="simple-editor">
                                        <select data-placeholder="دسترسی مورد نظر را انتخاب کنید" class="select2 w-full m-auto items-center" multiple name="permissions[]" style="width: 100%;">
                                            @foreach($permissions as $permission)
                                                <option value="{{$permission->id}}" {{in_array($permission->id, $user->permissions->pluck('id')->toArray()) ? 'selected' : '' }}>{{$permission->label}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                    <div class="tab-content__pane" id="image">--}}
{{--                        @include('Admin.Layout.galleries')--}}
{{--                    </div>--}}
                </div>
                <div class="flex mt-5">
                    <a href="{{route('users.index')}}"   class="button w-32 border shadow-md mr-1 mb-2 bg-gray-200 text-gray-600 ml-2">انصراف</a>
                    <input   type="submit"  name="submit"  value="ذخیره اطلاعات" class="button w-32 text-white bg-theme-1 shadow-md shadow-md mr-1 mb-2 bg-theme-1 text-white ml-auto">
                </div>
            </form>
        </div>

    </div>
@endsection
@section('js')
    <script src="/Admin/js/GallertFileUploader.js"> </script>
@endsection

@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" disabled >ویرایش دسترسی کاربر</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('users.index')}}" class="breadcrumb--active" >کاربر ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
