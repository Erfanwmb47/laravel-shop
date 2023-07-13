<div class="dropdown relative left-0 z-50">
    <button class="w-20 input box mt-3 sm:mt-0">{{$paginator->perPage()}}</button>
    <div class="dropdown-box mt-10 absolute w-20 top-0 left-0 z-20">
        <div class="dropdown-box__content box p-2">
            @if($paginator->perPage() != 12)
            <form action="{{route($route.'.index')}}" method="post">
                @csrf
                <input type="radio" id="name" value="12" name="pagez" hidden checked>
                <input type="submit" name="submit" class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md w-full" value="12" >
            </form>
            @endif
                @if($paginator->perPage() != 24)
                <form action="{{route($route.'.index')}}" method="post">
                @csrf
                <input type="radio" id="name" value="24" name="pagez" hidden checked>
                <input type="submit" name="submit" class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md w-full" value="24" >
            </form>
                @endif
                @if($paginator->perPage() != 48)
                <form action="{{route($route.'.index')}}" method="post">
                @csrf
                <input type="radio" id="name" value="48" name="pagez" hidden checked>
                <input type="submit" name="submit" class="block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md w-full" value="48" >
            </form>
                @endif
        </div>
    </div>
</div>

@if ($paginator->lastPage() > 1)
    <ul class="pagination right-0 rtl">
        <li>
            <a class="pagination__link" href="{{ $paginator->url(1) }}"> <i class="w-4 h-4" data-feather="chevrons-right"></i> </a>
        </li>
        <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
            <a class="pagination__link" href=" {{ $paginator->url($paginator->currentPage()-1) }}"><i class="w-4 h-4" data-feather="chevron-right"></i></a>
        </li>
        @if($paginator->currentPage()==1 || $paginator->currentPage()==2)
            @for ($i = 1; $i <= $paginator->currentPage()+2; $i++)
                @if($i <= $paginator->lastPage())
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="{{($paginator->currentPage() == $i) ? ' pagination__link pagination__link--active' : 'pagination__link'}}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
                @endif
            @endfor
        @else
        @for ($i = $paginator->currentPage()-2; $i <= $paginator->currentPage(); $i++)
                <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                    <a class="{{($paginator->currentPage() == $i) ? ' pagination__link pagination__link--active' : 'pagination__link'}}" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                </li>
        @endfor
        @for($j = $paginator->currentPage()+1; $j <= $paginator->currentPage()+2; $j++)
            @if($j <= $paginator->lastPage())
                    <li class="{{ ($paginator->currentPage() == $j) ? ' active' : '' }}">
                        <a class="{{($paginator->currentPage() == $j) ? ' pagination__link pagination__link--active' : 'pagination__link'}}" href="{{ $paginator->url($j) }}">{{ $j }}</a>
                    </li>
            @endif
        @endfor
        @endif


        <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
            <a class="pagination__link" href="{{ $paginator->url($paginator->currentPage()+1) }}" > <i class="w-4 h-4" data-feather="chevron-left"></i> </a>
        </li>
        <li>
            <a class="pagination__link" href="{{ $paginator->url($paginator->lastPage()) }}"> <i class="w-4 h-4" data-feather="chevrons-left"></i> </a>
        </li>
    </ul>



@endif


