@extends('master')

@section('content')
    <div class="md:text-center">
        <h1 class="text-bold text-2xl">Enregistrement d'un motif</h1>
    </div>

    <div class="md:flex md:justify-center">
        <div class="shadow-xl border p-4 bg-white mt-10 mb-20 rounded-xl md:w-64">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf

                <div>
                    <label for="">nom *:</label>
                    <input type="text" name="libelle" class="w-full border rounded-sm my-2 @error('libelle') is-invalid @enderror"
                        value="{{ old('libelle') }}" placeholder="Entrez le nom de l'enseignant" required>
                    <div class="text-red-400">
                        @error('libelle')
                            {{ $message }}
                        @enderror
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="bg-blue-300 hover:bg-blue-400 rounded-lg w-full my-4 shadow-xl p-2">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
@endsection
