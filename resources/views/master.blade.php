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
                    <li><a href="{{ route('bienvenue') }}">Accueil</a></li>
                </ul>
            </div>
            <div>
                @include('partial.form')
            </div>
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
