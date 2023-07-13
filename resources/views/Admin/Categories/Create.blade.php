
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />


@endsection

@section('content')
    <div class="pos intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-12">
            <h2 class="intro-y text-lg font-medium mt-10 flex">
ایجاد دسته بندی جدید            </h2>
            <p class="intro-y text-xs font-medium  flex mb-5 " style="color: #4a5568">برای ایجاد دسته بندی جدید فیلد های مورد نظر را پر کرده و در نهایت اطلاعات را ذخیره کنید</p>
            <hr>
        </div>
{{--Begin new Category--}}

        <div class="col-span-12 lg:col-span-12">
            <form action="{{route('categories.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <div class="pos__tabs nav-tabs justify-center flex">
                            <a data-toggle="tab" data-target="#Specifications" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">مشخصات کلی</a>
                            <a data-toggle="tab" data-target="#description" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                            <a data-toggle="tab" data-target="#image" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس دسته بندی</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-content__pane active" id="Specifications">
                        <div class="pos__ticket box p-2 mt-5">
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                    <p> در این قسمت مشخصات کلی دسته بندی را انتخاب کنید</p>
                                </div>
                                <div class="p-5 " id="input">
                                    <div class="preview grid-rtl grid-cols-12">
                                        <div class="col-span-4 ml-2">
                                            <label for="name"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام دسته بندی</label>
                                            <input name="name" id="name" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label for="meta"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>متا </label>
                                            <input name="meta" id="meta" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="تگ">
                                        </div>
                                        <div class=" col-span-4">
                                            <label><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>دسته والد </label>
                                            <div class="mt-2">
                                                @if(request('parent_id'))

                                                    <select readonly="readonly"  class="select2 block w-full border mt-2" name="category_id" id="category_id">
                                                        <option  style="color: red !important;"  readonly="readonly" value="{{request('parent_id')}}">
                                                            {{request('parent_name')}}</option>
                                                    </select>
                                                    @else
                                                <select class="select2 block w-full border mt-2" name="category_id" id="category_id">
                                                    <option disabled selected>دسته والد را انتخاب کنید </option>
                                                @foreach($categories as $category1)
                                                    @if(!$category1->category_id)
                                                    <option  style="color: red !important;" value="{{$category1->id}}"> {{$category1->name}}</option>

                                                        @foreach($categories as $category2)
                                                            @if($category2->category_id == $category1->id)
                                                            <option value="{{$category2->id}}"> {{$category2->name}}&nbsp; &nbsp;&nbsp;</option>

                                                                @foreach($categories as $category3)
                                                                    @if($category3->category_id == $category2->id)
                                                                        <option style="background-color: #99a4eb !important;" disabled value="{{$category3->id}}">{{$category3->name}}&nbsp; &nbsp; &nbsp; &nbsp;</option>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                        @endif
                                                @endforeach
                                                </select>
                                                @endif
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
                                        <p> توضیحات دسته بندی را در کادر زیر وارد کنید</p>
                                    </div>
                                    <div class="p-5" id="simple-editor">
                                        <div class="preview">
                                                <textarea data-feature=""  class="summernote rtl "  name="description" placeholder="توضیحات دسته بندی"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane" id="image">
                        @include('Admin.Layout.galleries')
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
    <script src="/Admin/js/GallertFileUploader.js"> </script>
@endsection

@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" disabled >ایجاد دسته بندی</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('categories.index')}}" class="breadcrumb--active" >دسته بندی ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
