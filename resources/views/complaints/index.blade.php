@extends('master')

@section('content')
    <div class="align-items-center">

        <div class="text-center my-5 text-4xl">
            <h1 class="font-bold">Liste des cas d'indiscipline</h1>
        </div>

        <!-- start bouton pour creer un PDF -->
        <div class="mb-10">
            <p><a href="{{ route('generate-pdf', ['download' => 'pdf']) }}"
                    class="bg-green-200 hover:bg-green-400 text-sm font-semibold p-4 shadow-md rounded">Export
                    to PDF</a></p>
        </div>
        <!-- end bouton pour creer un PDF -->

        <!-- start table des enseignants indisciplines -->
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
                @foreach ($complaints as $complaint)
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
                            <p>{{ $complaint->classe->name }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ format_heure($complaint->hour) }} h</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ $complaint->category->libelle }}</p>
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
        <!-- end table des enseignants indisciplines -->
    </div>
@endsection
