<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto p-4">
        <div class="flex justify-between mt-2 bg-yellow-200 h-20 items-center px-4 mb-10">
            <div>
                <ul>
                    <li>
                        <a href="{{ route('bienvenue') }}" class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-1 mr-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Accueil
                        </a>
                    </li>
                </ul>
            </div>
            @if (!Route::is("complaint.search"))
            <div>
                @include('partial.form')
            </div>
            @endif
        </div>

        <div>
            @yield('content')
        </div>
    </div>

    @include('partial.footer')
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/recherche.js') }}"></script>
</body>


</html>
