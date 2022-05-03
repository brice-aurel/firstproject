@extends('master')

@section('content')
    <div class="text-center my-5">
        <h1 class="text-red-300 text-xl">{{ 'Tous les champs avec * sont obligatoires !!!' }}</h1>
    </div>

    <div class="grid grid-cols-4 gap-6 p-4">
        <div class="border rounded-xl shadow-lg p-4 bg-white col-span-3 col-start-2 col-end-4">
            <form action="{{ route('complaint.store') }}" method="POST">
                @csrf
                <div class="flex justify-between">
                    <div>
                        <label for="">Nom(s) complet :*</label>
                        <select name="teacher" id="" class="my-2">
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Campus :*</label>
                        <select name="school" id="" class="my-2">
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="">Cours :*</label>
                        <input type="text" name="course" id="" class="my-2">
                    </div>
                </div>
                <div class="flex justify-between">
                    <div>
                        <label for="">Filiere :*</label>
                        <input type="text" name="specialite" id="" class="block my-2 ">
                    </div>
                    <div>
                        <label for="">Date :*</label>
                        <input type="date" name="date" id="" class="block my-2">
                    </div>
                    <div>
                        <label for="">Heure debut</label>
                        <input type="time" name="start" id="" class="block my-2">
                    </div>
                    <div>
                        <label for="">Heure fin</label>
                        <input type="time" name="end" id="" class="block my-2">
                    </div>
                </div>
                <div class="my-2">
                    <label for="">Categorie :*</label>
                    <select name="category" class="block my-2 w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Commentaire :*</label>
                    <textarea name="commentaire" cols="80" class="block" rows="5"
                        placeholder="Entrez votre commentaire"></textarea>
                </div>
                <div>
                    <button type="submit"
                        class="mt-5 p-4 bg-green-200 hover:bg-green-300 text-center w-full font-bold shadow-lg">Enregister
                        un cas d'indiscipline</button>
                </div>
            </form>
        </div>
    </div>
@endsection
