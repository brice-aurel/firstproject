@extends('master')

@section('content')
<div class="align-items-center">

    <div class="text-center my-5 text-4xl">
        <h1 class="font-semibold">l'enseignant
            <b>{{ $teacher->name }}</b>
            recense
            {{ $teacher->complaints->count() }} cas d'
            {{ Str::plural('indiscipline', $teacher->complaints->count()) }}

        </h1>
    </div>

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
                        <p>{{ $complaint->specialite }}</p>
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

    <div class="mt-10 flex justify-around">
        <p>
            <a href="{{ route('generate-pdf-teacher', ['download' => 'pdf', 'teacher' => $teacher]) }}"
                class=" text-green-400 hover:text-green-600 font-semibold">
                Export to PDF
            </a>
        </p>
        <p><a href="{{ route('complaint.index') }}" class="text-red-400 font-semibold hover:text-red-600">retour aux
                enregistrements</a></p>
    </div>

</div>
@endsection
