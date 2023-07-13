@props(['errors'])

@if ($errors->any())
    <div class="rounded-md  items-center px-5 py-4 mb-2 bg-theme-31 text-theme-6 flex-justify-start w-1/2 m-auto mt-2">
        <i data-feather="alert-octagon" class="w-6 h-6 ml-2"></i>
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
            @php
            \Illuminate\Support\Facades\Session::forget('errors')
            @endphp
        </ul>
    </div>
@endif
