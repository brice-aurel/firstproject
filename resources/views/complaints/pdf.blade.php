<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta htpp-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <title>Laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
</head>

<body>

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
            <th class="border text-sm p-4 text-left bg-gray-100">ticket</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($complaints as $complaint)
            <tr class="hover:bg-gray-100">
                <td class="border p-1 text-sm">
                    <p>{{ $i++ }}</p>
                </td>
                <td class="border p-1 text-sm">
                    <p>{{ $complaint->teacher->name }}</p>
                </td>
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

</body>
</html>
