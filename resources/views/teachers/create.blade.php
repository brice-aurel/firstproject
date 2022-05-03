@extends('master')

@section('content')
    @if (session()->has('message'))
        <div class="text-green-500 p-4 bg-green-50 w-full text-center border rounded-sm shadow-xl">
            <p>{{ session()->get('message') }}</p>
        </div>
    @endif

    @if (session()->has('msg'))
        <div class="text-green-500 p-4 bg-green-50 w-full text-center border rounded-sm shadow-xl">
            <p>{{ session()->get('msg') }}</p>
        </div>
    @endif

    <p class="text-2xl text-semibold text-center my-5">Enregistrement d'un ensseignant</p>

    <div class="grid grid-cols-4 gap-4 md:mb-36 mb-10">
        <div class="shadow-xl border col-span-2 p-4 rounded-xl">
            <form action="{{ route('teacher.store') }}" method="POST">
                @csrf
                <div class="mt-5">
                    <label for="">nom *:</label>
                    <input type="text" name="name" class="w-full border rounded-sm my-2" value="{{ old('name') }}" placeholder="Entrez le nom de l'enseignant"
                        required>
                </div>

                <div>
                    <button type="submit" class="bg-blue-100 rounded-lg w-full my-4 hover:bg-blue-200 shadow-xl p-2">Ajouter</button>
                </div>
            </form>
        </div>

        <div class="shadow-xl border col-span-2 p-4 rounded-xl">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="mt-5">
                    <label for="">Category *:</label>
                    <input type="text" name="libelle" class="w-full border rounded-sm my-2" value="{{ old('observation') }}" placeholder="Entrez une observation"
                        required>
                </div>

                <div>
                    <button type="submit" class="bg-blue-100 rounded-lg w-full my-4 hover:bg-blue-200 shadow-xl p-2">Ajouter</button>
                </div>
            </form>
        </div>
    </div>

@stop
