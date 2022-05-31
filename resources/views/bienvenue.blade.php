<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container mx-auto p-4">
        <div class="">
            <div class="flex justify-center mt-5 h-44">
                <img src="{{ asset('images/logo-iug.jfif') }}" alt="logo de IUG">
            </div>
            <div class="my-5 text-center">
                <h1 class="text-4xl font-bold">GESTION DES ENSEIGNANTS INDISCIPLINES</h1>
            </div>
            <div class="flex justify-between my-14">
                <a href="{{ route('complaint.create') }}"
                    class="p-4 bg-blue-200 hover:bg-blue-300 text-xl font-semibold shadow-lg mx-4 border rounded-xl">Enregistrement
                    d'un cas</a>
                <a href="{{ route('complaint.index') }}"
                    class="p-4 bg-yellow-200 hover:bg-yellow-300 text-xl font-semibold shadow-lg mx-4 border rounded-xl">Lister
                    tous les cas d'indiscipline</a>
                <a href="{{ route('complaint.search') }}"
                    class="p-4 bg-green-200 text-xl hover:bg-green-300 font-semibold shadow-lg mx-4 border rounded-xl">Recherche
                    specifique</a>
            </div>
        </div>
    </div>


    @include('partial.footer')
    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('js/recherche.js') }}"></script>
</body>


</html>
