@extends('master')

@section('content')
<div class="align-items-center">

    <div class="text-center my-5 text-4xl">
        <h1 class="font-semibold">l'enseignant
            <b class="">{{ $teacher->name }}</b>
            recense
            {{ $teacher->complaints->count() }}
            cas d'indiscipline
        </h1>
    </div>

    <table class="table-auto mt-10">
        <thead>
            <tr>
                <th class="border text-sm p-4 text-left bg-gray-100">N°</th>
                <th class="border text-sm p-4 text-left bg-gray-100">cours</th>
                <th class="border text-sm p-4 text-left bg-gray-100">filiere</th>
                <th class="border text-sm p-4 text-left bg-gray-100">Observation</th>
                <th class="border text-sm p-4 text-left bg-gray-100">Etablissement</th>
                <th class="border text-sm p-4 text-left bg-gray-100">date</th>
                <th class="border text-sm p-4 text-left bg-gray-100">heure debut</th>
                <th class="border text-sm p-4 text-left bg-gray-100">heure fin</th>
                <th class="border text-sm p-4 text-left bg-gray-100">ticket</th>
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
                        <p>{{ $complaint->observation->observation }}</p>
                    </td>
                    <td class="border p-1 text-sm">
                        <p>{{ $complaint->school->name }}</p>
                    </td>
                    <td class="border p-1 text-sm">
                        <p>{{ format_date($complaint->date) }}</p>
                    </td>
                    <td class="border p-1 text-sm">
                        <p>{{ format_heure($complaint->start) }}</p>
                    </td>
                    <td class="border p-1 text-sm">
                        <p>{{ format_heure($complaint->end) }}</p>
                    </td>
                    <td class="border p-1 text-sm">
                        <p>{{ $complaint->ticket }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-10">
        <p><a href="{{ route('complaint.index') }}" class="bg-red-200 p-4 font-semibold rounded-xl shadow-lg border hover:bg-red-300">retour aux enregistrements</a></p>
    </div>
</div>
@endsection
