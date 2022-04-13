@extends('master')

@section('content')
    <div class="container m-auto px-4">
        <h1 class="text-2xl">{{ Str::plural('Plainte', $teacher->toasts->count()) }} de
            reçu contre l'enseignant <span class="font-bold text-2xl block ">{{ $teacher->name }}</span>
        </h1>
        @if (!$teacher->toasts->isEmpty())
            <div class="mt-10">
                @foreach ($teacher->toasts as $toast)
                    <span class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                        <p>{{ $toast->title }}</p>
                    </span>
                @endforeach
            </div>
        @else
            <div class="mt-10">
                <p>{{ 'Aucune motification pour l\'instant' }}</p>
            </div>
        @endif
        <div class="mt-40 text-red-400">
            <p><a href="{{ route('teachers.index') }}">
                    retour a l'accueil
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </a>
            </p>
        </div>
    </div>
@endsection

@section('form')
    <form action="{{ route('toasts.store') }}" method="POST">
        @csrf
        <div class="shadow-md p-4 rounded-xl border bg-white">
            <label for="">Intitulé: *</label>
            <div class="">
                <input type="text" placeholder="entrez une plainte" name="title" class="rounded-lg h-9">
            </div>
            <label for="">Filière: *</label>
            <div>
                <input type="text" class="rounded-lg h-9" name="specialite" placeholder="entrez la filière">
            </div>
            <label for="">Heure debut: *</label>
            <div>
                <input type="time" class="rounded-lg h-9" name="start" id="">
            </div>
            <label for="">Heure fin: *</label>
            <div>
                <input type="time" class="rounded-lg h-9" name="end" id="">
            </div>
            <label for="">N° ticket: *</label>
            <div>
                <input type="number" class="rounded-lg h-9" placeholder="numero du ticket" name="ticket">
            </div>
            <label for="">Campus: *</label>
            <div>
                <select name="school" class="rounded-lg h-9" id="">
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="m-3">
                <input type="text" name="teacher" hidden value="{{ $teacher->id }}">
            </div>
            <button type="submit" class="bg-blue-200 p-2 rounded text-sm hover:bg-blue-300 shadow-md">Crée une
                plainte</button>
        </div>
    </form>
@endsection
