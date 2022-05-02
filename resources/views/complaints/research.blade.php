@extends('master')

@section('content')
    <div class="grid md:grid-cols-4 gap-4">
        <div class="shadow-xl border p-4 md:col-span-1">
            <h1 class="font-semibold text-xl">Recherche par Date</h1>
            <form action="{{ route('complaint.search') }}" method="GET">
                @csrf
                <div class="flex md:justify-around my-5">
                    <div>
                        <label for="">Date Debut : </label>
                        <input type="date" name="dateDebut" class="rounded-sm md:block">
                    </div>
                    <div>
                        <label for="">Date Fin : </label>
                        <input type="date" name="dateFin" class="rounded-sm md:block">
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
    </div>

    @if ($resultats->isNotEmpty())
    <div class="mt-10">
        <table class="table-auto">
            <thead>
                <tr>
                    <th class="border text-sm p-4 text-left bg-gray-100">N°</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Nom(s) et Prénom(s)</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">cours</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">filiere</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Observation</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Etablissement</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">date</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">heure debut</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">heure fin</th>
                    {{-- <th class="border text-sm p-4 text-left bg-gray-100">ticket</th> --}}
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($resultats as $resultat)
                    <tr class="hover:bg-gray-100">
                        <td class="border p-1 text-sm">{{ $i++ }}</td>
                        <td class="border p-1 text-sm">
                            <p><a href="{{ route('teacher.show', $resultat->teacher->id) }}" class="font-semibold">{{ $resultat->teacher->name }}</a></p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ $resultat->course }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ $resultat->specialite }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ $resultat->observation->observation }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ $resultat->school->name }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ format_date($resultat->date) }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ format_heure($resultat->start) }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ format_heure($resultat->end) }}</p>
                        </td>
                        {{-- <td class="border p-1 text-sm">
                            <p>{{ $resultat->ticket }}</p>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="font-sans text-center text-2xl md:text-4xl md:text-semibold md:my-24 my-10">
        <p>{{ "Désolé aucun resultat trouvé !!!" }}</p>
    </div>
    @endif
@endsection
