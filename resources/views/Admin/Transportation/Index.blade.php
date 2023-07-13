
@section('content')
        <h2 class="intro-y text-lg font-medium mt-10">
            حمل و نقل ها
        </h2>
        <div class="grid grid-cols-12 gap-6 mt-5 rtl">

            <!-- BEGIN: Users Layout -->
            @foreach($transportations as $transportation)
                <div class="intro-y col-span-12 md:col-span-6 lg:col-span-4 rtl">
                <div class="box">
                    <form action="{{route('transportations.edit',$transportation)}}" >
                        @csrf
                    <div class="flex items-end px-5 pt-5 ">
                        <div class="w-full flex-reverse-start flex-row lg:flex-start ">
                            <div class="w-16 h-16 image-fit">
                                <img alt="Midone Tailwind HTML Admin Template" class="rounded-md" src="{{str_replace('public','/storage',optional($transportation->gallery)->path)}}">
                            </div>
                            <div class="lg:mr-4 text-center lg:text-right mt-3 lg:mt-0 mr-2">
                                <a href="" class="font-medium">{{$transportation->name}}</a>
                                <div class="text-gray-600 text-xs">{{$transportation->eng_name}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center lg:text-right p-5 rtl">
                        <div>{{$transportation->description}}</div>
                        <div class="flex items-center justify-center lg:justify-end text-gray-600 mt-5">ضریب وزن :
                            {{$transportation->factor_weight}}
                            <i data-feather="hexagon" class="w-3 h-3 ml-2"></i>
                        </div>
                        <div class="flex items-center justify-center lg:justify-end text-gray-600 mt-1 rtl"> ضریب مسافت : {{$transportation->const_distance}}<i data-feather="hexagon" class="w-3 h-3 ml-2"></i></div>
                    </div>
                    <div class="text-center lg:text-right p-5 border-t border-gray-200">
                        <button type="submit" class="button button--sm text-white bg-theme-1 mr-2">ویرایش</button>
                        <a data-toggle="modal" id="submit" data-target="#BrandDelete{{$transportation->id}}" class="button button--sm text-gray-700 border border-gray-300">حذف </a>
                    </div>
                </form>
                </div>
            </div>

            @endforeach
            <!-- END: Users Layout -->
            <!-- BEGIN: Pagination -->

            <div class="mt-5 flex-justify-profile intro-y col-span-12 sm:flex -row sm:flex-no-wrap items-center ">
                {{--                                {{$transportations->links()}}--}}
                @include('Pagination.Admin', ['paginator' => $transportations,'route' => 'transportations'])
            </div>
            <!-- END: Pagination -->
        </div>
@foreach($transportations as $transportation)
    {{--    DELETE Brand--}}
    @can('delete-brand')
        <div class="modal" id="BrandDelete{{$transportation->id}}">
            <div class="modal__content">
                <form action="{{route('transportations.destroy',$transportation)}}" method="post" >
                    @csrf
                    @method('DELETE')

                    <div class="p-5 text-center"> <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">حذف حمل و نقل  <span style="color: darkred">{{$transportation->name}}</span></div>
                        {{--                        <div class="mt-3 ">--}}
                        {{--                            <div class="mt-2  flex" data-theme="light">--}}
                        {{--                                <p>حذف به همراه زیر دستهf ها </p>--}}
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

@endsection

@component('Admin.Layout.Layout1')
    @slot('breadcrump')
        <div class="-intro-x breadcrumb ml-auto hidden sm:flex">
            <a  class="" >حمل و نقل</a>
            <i data-feather="chevron-right" class="breadcrumb__icon"></i>
            <a href="{{route('DashboardPanel')}}" class="breadcrumb--active">صفحه اصلی</a> </div>
    @endslot
@endcomponent
