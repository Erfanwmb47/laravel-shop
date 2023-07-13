
@section('css')
    <link rel="stylesheet" href="/Admin/css/CategoryImageUploader.css" />
    <link rel="stylesheet" href="/Admin/css/GalleryFileUploader.css" />


@endsection

@section('content')
    <div class="pos intro-y grid grid-cols-12 gap-6 mt-5">
        <div class="col-span-12 lg:col-span-12">
            <h2 class="intro-y text-lg font-medium mt-10 flex">
                ویرایش حمل و نقل {{$transportation->name}}            </h2>
            <p class="intro-y text-xs font-medium  flex mb-5 " style="color: #4a5568">برای ویرایش {{$transportation->name}} فیلد های مورد نظر را پر کرده و در نهایت اطلاعات را ذخیره کنید</p>
            <hr>
        </div>
        {{--Begin new Category--}}

        <div class="col-span-12 lg:col-span-12">
            <form action="{{route('transportations.update',$transportation)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="intro-y pr-1">
                    <div class="box p-2">
                        <div class="pos__tabs nav-tabs justify-center flex">
                            <a data-toggle="tab" data-target="#Specifications" href="javascript:;" class="flex-1 py-2 rounded-md text-center active">مشخصات کلی</a>
                            <a data-toggle="tab" data-target="#description" href="javascript:;" class="flex-1 py-2 rounded-md text-center">توضیحات</a>
                            <a data-toggle="tab" data-target="#image" href="javascript:;" class="flex-1 py-2 rounded-md text-center">عکس {{$transportation->name}}</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-content__pane active" id="Specifications">
                        <div class="pos__ticket box p-2 mt-5">
                            <div class="intro-y box">
                                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-gray-200  bg-indigo-100 rounded">
                                    <p> در این قسمت مشخصات کلی {{$transportation->name}}  را انتخاب کنید</p>
                                </div>
                                <div class="p-5 " id="input">
                                    <div class="preview grid-rtl grid-cols-12">
                                        <div class="col-span-4 ml-2">
                                            <label for="name"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام حمل و نقل</label>
                                            <input name="name" id="name" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام" value="{{$transportation->name}}">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label for="eng_name"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>نام انگلیسی </label>
                                            <input name="eng_name" id="eng_name" type="text" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="نام انگلیسی" value="{{$transportation->eng_name}}">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label for="factor_weight"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>ضریب وزن</label>
                                            <input name="factor_weight" id="factor_weight" type="number" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="ضریب وزن" value="{{$transportation->factor_weight}}">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label for="const_distance"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>هزینه ثابت مسافت </label>
                                            <input name="const_distance" id="const_distance" type="number" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="هزینه ثابت مسافت" value="{{$transportation->const_distance}}">
                                        </div>
                                        <div class=" ml-2 col-span-4">
                                            <label for="cost"><i data-feather="edit-2" class="w-4 h-4 float-right ml-2 text-blue-400"></i>هزینه اولیه  </label>
                                            <input name="cost" id="cost" type="number" class="input w-full border mt-2 align-right" style="direction: rtl" placeholder="هزینه اولیه " value="{{$transportation->cost}}">
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
                                        <p> توضیحات {{$transportation->name}} را در کادر زیر وارد کنید</p>
                                    </div>
                                    <div class="p-5" id="simple-editor">
                                        <div class="preview">
                                            <textarea data-feature=""  class="summernote rtl "  name="description" placeholder="توضیحات حمل و نقل">{{$transportation->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content__pane" id="image">
                        @include('Admin.Layout.galleries',['selectedGalleryId' => $transportation->gallery_id] )
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
            <a  class="" disabled >ایجاد حمل و نقل</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('transportations.index')}}" class="breadcrumb--active" >حمل و نقل ها</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
