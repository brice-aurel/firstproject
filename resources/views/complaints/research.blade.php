@extends('master')

@section('content')
    <div class="grid md:grid-cols-4 gap-4">

<!-- formulaire de recherche par enseignant -->
        <div class="shadow-xl border p-4 md:col-span-1">
            <h1 class="font-semibold text-xl">Recherche par Enseignant</h1>

            <form action="{{ route('complaint.search') }}" method="GET">
                @csrf

                <div class="mt-3">
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
                <div class="flex md:justify-around my-5">
                    <div>
                        <label for="">Date Debut : </label>
                        <input type="date" name="dateDebut" value="" class="rounded-sm md:block">
                    </div>
                    <div>
                        <label for="">Date Fin : </label>
                        <input type="date" name="dateFin" value="" class="rounded-sm md:block">
                    </div>
                </div>
                <div class="ml-1">
                    <button type="submit" class="bg-blue-200 p-2 rounded flex text-sm hover:bg-blue-300 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 pt-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        recherche
                    </button>
                </div>
            </form>

        </div>
         <!-- End formulaire de recherche par campus -->

         <!-- formulaire de recherche par campus -->
        <div class="shadow-xl border p-4 md:col-span-1">
            <h1 class="font-semibold text-xl">Recherche par Enseignant</h1>

            <form action="{{ route('complaint.search') }}" method="GET">
                @csrf

                <div class="mt-3">
                    <label for="">Nom de l'établissement :*</label>
                    <select name="teacher" class="@error('teacher') is-invalid @enderror">
                        <option value="">-- Choix du campus --</option>
                        @foreach ($campus as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                    @error('teacher')
                        <span class="text-red-400 mt-2 block">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex md:justify-around my-5">
                    <div>
                        <label for="">Date Debut : </label>
                        <input type="date" name="dateDebut" value="" class="rounded-sm md:block">
                    </div>
                    <div>
                        <label for="">Date Fin : </label>
                        <input type="date" name="dateFin" value="" class="rounded-sm md:block">
                    </div>
                </div>
                <div class="ml-1">
                    <button type="submit" class="bg-blue-200 p-2 rounded flex text-sm hover:bg-blue-300 shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 pt-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                        recherche
                    </button>
                </div>
            </form>

        </div>
         <!-- End formulaire de recherche par campus -->
    </div>

   @yield('search')

@endsection
