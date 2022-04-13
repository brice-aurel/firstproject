@extends('master')

@section('content')
    <h1 class="text-2xl font-extrabold">Liste des {{ Str::plural('Enseignant', $teachers->count()) }} faisant objet de
        plaintes</h1>

    <p class="my-3">

        <a href="{{ route('teachers.create') }}" class="text-decoration-none text-black bg-blue-100 w-56 shadow-md hover:bg-blue-200 rounded-lg p-2 flex">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mt-1" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
            Creer un enseignant
        </a>
    </p>

    <div class="align-items-center">
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="border p-4 text-left bg-gray-100">N°</th>
                    <th class="border p-4 text-left bg-gray-100">Nom(s) et Prénom(s)</th>
                    <th class="border p-4 text-left bg-gray-100">Date</th>
                    <th class="border p-4 text-left bg-gray-100">Cours</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($teachers as $teacher)
                    <tr class="hover:bg-gray-100">
                        <td class="border p-2">{{ $i++ }}</td>
                        <td class="border p-2">
                            <p><a href="{{ route('teachers.show', $teacher->id) }}">{{ $teacher->name }}</a></p>
                        </td>
                        <td class="border p-2">
                            <p>{{ $teacher->date }}</p>
                        </td>
                        <td class="border p-2">
                            <p>{{ $teacher->cours }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="mt-4">Total = {{ $teachers->count() }}</p>
    </div>
@stop

@section('form')
    @include('partial/form')
@endsection
