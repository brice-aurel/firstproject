@extends('master')

@section('content')
    <div class="align-items-center">

        <!-- Nom de l'eneignant -->
        <div class="text-center my-5 text-4xl">
            <h1 class="font-semibold">Liste des cas d'
                {{ Str::plural('indiscipline', $teacher->complaints->count()) }} de l'enseignant
                <b>{{ $teacher->name }}</b>
            </h1>
        </div>
        <!-- END de l'eneignant -->

        <div class="my-10">
            <p>
                <a href="{{ route('generate-pdf-teacher', ['download' => 'pdf', 'teacher' => $teacher]) }}"
                    class=" bg-green-200 hover:bg-green-400 text-sm font-semibold p-4 shadow-md rounded">
                    Export to PDF
                </a>
        </div>

        <!-- tableau d'inscipline d'un enseignant particulier -->
        <table class="table-auto mt-10">
            <thead>
                <tr>
                    <th class="border text-sm p-4 text-left bg-gray-100">N°</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Enseignements</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Classe</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Sanction</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Motifs</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Observation</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Etablissement</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">date</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($teacher->complaints as $complaint)
                    <tr class="hover:bg-gray-100">
                        <td class="border p-1 text-sm">{{ $i++ }}</td>
                        <td class="border p-1 text-sm">
                            <p>{{ $complaint->course }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ $complaint->classe->name }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ format_heure($complaint->hour) }}</p>
                        </td>
                        <td>
                            <p>
                                <b class="font-semibold">
                                    {{ $complaint->category->libelle }}
                                </b>
                            </p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>
                                {{ $complaint->observation }}
                            </p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ $complaint->school->name }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ format_date($complaint->date) }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- END tableau d'inscipline d'un enseignant particulier -->
    </div>
@endsection
