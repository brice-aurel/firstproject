<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container m-auto px-4">
        @include('partial/nav')

        <div class="grid md:grid-cols-3 gap-4 my-10">

            <div class="md:col-span-1 bg-gray-100 md:flex md:justify-center p-4 items-center">
                @yield('form')
            </div>

            <div class="px-16 py-6 md:col-span-2">
                @yield('content')
            </div>
        </div>
    </div>

   @include('partial/footer')

    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/recherche.js') }}"></script>
</body>


</html>
