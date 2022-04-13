@extends('master')

@section('content')
<div class="container m-auto px-4">
    <h1 class="text-2xl font-bold">Liste des Campus</h1>

        <div class="mt-10">
            @foreach ($schools as $school)
                <span class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 mt-1" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                    <p><a href="{{ route('schools.show', $school->id) }}">{{ $school->name }}</a></p>
                </span>
            @endforeach
        </div>
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
@stop


