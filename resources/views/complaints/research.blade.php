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
    </div>

    <div class="mt-5 text-xl font-semibold">
        <h3>Liste d'indiscipline allant du {{ (new DateTime($dateDebut))->format('d F Y') }} au {{ (new DateTime($dateFin))->format('d F Y') }}</h3>
    </div>

    @if ($research->isNotEmpty())
        <div class="mt-10">
            <table class="table-auto">
                <thead>
                    <tr class="text-left">
                        <th class="border text-sm p-4 text-left bg-gray-100">N°</th>
                        <th class="border text-sm p-4 text-left bg-gray-100">Nom(s) et prénom(s)</th>
                        <th class="border text-sm p-4 text-left bg-gray-100">Enseignements</th>
                        <th class="border text-sm p-4 text-left bg-gray-100">Classe</th>
                        <th class="border text-sm p-4 text-left bg-gray-100">Sanction</th>
                        <th class="border text-sm p-4 text-left bg-gray-100">Motifs</th>
                        <th class="border text-sm p-4 text-left bg-gray-100">Observation</th>
                        <th class="border text-sm p-4 text-left bg-gray-100">Date des faits</th>
                        <th class="border text-sm p-4 text-left bg-gray-100">Etablissement</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($research as $complaint)
                        <tr class="hover:bg-gray-100">
                            <td class="border p-1 text-sm">{{ $i++ }}</td>
                            <td class="border p-1 text-sm">
                                <p><a href="{{ route('teacher.show', $complaint->teacher->id) }}"
                                        class="font-semibold">{{ $complaint->teacher->name }}</a></p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ $complaint->course }}</p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ $complaint->classe->name}}</p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ format_heure($complaint->hour) }}</p>
                            </td>
                            <td>
                                <p>
                                    <b class="font-semibold">{{ $complaint->category->libelle }}</b>
                                </p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ $complaint->observation }}</p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ format_date($complaint->date) }}</p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ $complaint->school->name }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="font-sans text-center text-2xl md:text-4xl md:text-semibold md:my-24 my-10">
            <p>{{ "Désolé aucun enregistrement d'indiscipline trouvé ☹☹☹ !" }}</p>
        </div>
    @endif

    <div class="mt-10 flex justify-around">
        <p>
            <a href="{{ route('generate-research-pdf', ['download' => 'pdf', 'dateDebut' => $dateDebut, 'dateFin' => $dateFin]) }}"
                class=" text-green-400 hover:text-green-600 font-semibold">
                Export to PDF
            </a>
        </p>
        <p><a href="{{ route('complaint.index') }}" class="text-red-400 font-semibold hover:text-red-600">retour aux
                enregistrements</a></p>
    </div>
@endsection
