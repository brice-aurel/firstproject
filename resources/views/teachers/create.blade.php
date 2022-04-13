@extends('master')

@section('content')
    <p>Enregistrement d'un ensseignant</p>

    <div class="mb-5">
        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf
            <div class="shadow-xl border p-4 rounded-xl">
                <div class="mt-5">
                    <label for="">nom *:</label>
                    <input type="text" name="name" id="" value="{{ old('name')}}" placeholder="Entrez le nom de l'enseignant" required>
                </div>
                <div class="my-5">
                    <label for="">Date *:</label>
                    <input type="date" name="date" id="" required>
                </div>
                <div class="my-5">
                    <label for="">Cours *:</label>
                    <input type="text" name="cours" id="" placeholder="Entrez le cours dispensé par l'enseignant" required>
                </div>
                <div>

                    <button type="submit" class="bg-blue-100 rounded-lg hover:bg-blue-200 shadow-xl p-2">Ajouter</button>
                </div>
            </div>
        </form>
    </div>

    <p><a href="{{ route('teachers.index') }}" class="text-red-400 text-decoration-none">retour a l'accueil</a></p>

@stop
