@extends('master')

@section('content')
    <div class="text-center my-5">
        <h1 class="text-red-500 text-xl">{{ 'Tous les champs avec * sont obligatoires !!!' }}</h1>
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
                <div class="flex justify-between">
                    <div>
                        <label for="">Nom(s) complet :*</label>
                        <select name="teacher" class="@error('teacher') is-invalid @enderror" id="" class="my-2">
                            {{-- <option>-- Choix de l'enseignant --</option> --}}
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
                        <select name="school" class="@error('school') is-invalid @enderror" id="" class="my-2">
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
                        <input type="text" name="course" id="" class="my-2 @error('course') is-invalid @enderror">
                        @error('course')
                            <span class="text-red-400 mt-2 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="flex justify-evenly">
                    <div>
                        <label for="">Classe :*</label>
                        <input type="text" name="specialite" id=""
                            class="block my-2 @error('specialite') is-invalid @enderror">
                            @error('specialite')
                                <span class="text-red-400 mt-2 block">{{ $message }}</span>
                            @enderror
                    </div>
                    <div>
                        <label for="">Date :*</label>
                        <input type="date" name="date" id="" class="block my-2">
                    </div>
                    <div>
                        <label for="">Sanction</label>
                        <input type="time" name="start" id="" class="block my-2">
                    </div>

                </div>
                <div class="my-2">
                    <label for="">Motifs :*</label>
                    <select name="category" class="block my-2 w-full">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->libelle }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Observations :*</label>
                    <textarea name="observation" cols="80" class="block" rows="5" placeholder="Entrez votre commentaire"
                        class="@error('commentaire') is-invalid @enderror"></textarea>
                        @error('commentaire')
                            <span class="text-red-400 mt-2 block">{{ $message }}</span>
                        @enderror
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
