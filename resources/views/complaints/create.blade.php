@extends('master')

@section('content')
    <div class="text-center my-5">
        <h1 class="text-red-500 text-xl">{{ 'Tous les champs sont obligatoires !!!' }}</h1>
    </div>
    {{-- <div>
        @if ($errors->any())

        @foreach ($errors->all() as $error)
        <div class="text-red-400"> {{$error}} </div>
        @endforeach

        @endif
    </div> --}}

    <div class="grid grid-cols-4 gap-6 p-4">
        <div class="border rounded-xl shadow-lg p-4 bg-white col-span-3 col-start-2 col-end-4">
            <form action="{{ route('complaint.store') }}" method="POST">
                @csrf
                <div class="md:flex md:justify-between">
                    <div>
                        <label for="">Nom(s) complet :*</label>
                        <select name="teacher" class="@error('teacher') is-invalid @enderror">
                            <option value="">-- Choix de l'enseignant --</option>
                            @foreach ($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                        @error('teacher')
                            <span class="text-red-400 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="">Campus :*</label>
                        <select name="school" class="@error('school') is-invalid @enderror">
                            <option value="">-- Choix de l'école --</option>
                            @foreach ($schools as $school)
                                <option value="{{ $school->id }}">{{ $school->name }}</option>
                            @endforeach
                        </select>
                        @error('school')
                            <span class="text-red-400 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="">Enseignements :*</label>
                        <input type="text" name="course" id="" class="mx-2 border-gray-400 h-7 rounded-md @error('course') is-invalid @enderror">
                        @error('course')
                            <span class="text-red-400 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="md:flex md:justify-evenly md:mt-5">
                    <div>
                        <label for="" class="block">Classe :*</label>
                        <select name="classe" class="@error('classe') is-invalid @enderror">
                            <option value="">-- choix de la classe --</option>
                            @foreach ($classes as $classe)
                                <option value="{{ $classe->id }}">{{ $classe->name }}</option>
                            @endforeach
                        </select>
                        @error('classe')
                            <span class="text-red-400 mt-2 block">{{ $message }}</span>
                        @enderror

                    </div>
                    <div>
                        <label for="">Date :*</label>
                        <input type="date" name="date" id="" class="block my-2 border-gray-400 h-7">
                        @error('date')
                        <span class="text-red-400 mt-2 block">{{ $message }}</span>
                    @enderror
                    </div>
                    <div>
                        <label for="">Sanction</label>
                        <input type="time" name="start" id="" class="block my-2 border-gray-400 h-7">
                        @error('start')
                        <span class="text-red-400 mt-2 block">{{ $message }}</span>
                    @enderror
                    </div>

                </div>
                <div class="my-2">
                    <label for="">Motifs :*</label>
                    <select name="category" class="block my-2 w-full @error('category') is-invalid @enderror">
                        <option value="">-- Choix du motif --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->libelle }}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <span class="text-red-400 mt-2 block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="md:mt-5">
                    <label for="">Observations :*</label>
                    <textarea name="commentaire" class="block w-full" placeholder="Entrez votre commentaire"
                        class="@error('commentaire') is-invalid @enderror"></textarea>
                    @error('commentaire')
                        <span class="text-red-400 mt-2 block">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="mt-5 p-4 bg-blue-300 hover:bg-blue-400 text-center w-full font-bold shadow-lg">Enregister
                        un cas d'indiscipline</button>
                </div>
            </form>
        </div>
    </div>
@endsection
