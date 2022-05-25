<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta htpp-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>

        table {
            width: 100%;
            border: 1px solid black;
        }
        th, td {
            margin: 0%;
            padding: 4px;
            text-align: left;
            font-size: 9px;
            border: 1px solid black;
        }
        th {
            background-color: gray;
            font-weight: bold;
        }
        a {
            text-decoration: none;
            color: black;
        }

    </style>
</head>

<body>
    <h3>Liste des enseignants indiscipliné</h3>

    <table class="">
        <thead>
            <tr class="text-left">
                <th class="border text-sm p-4 text-left bg-gray-100">N°</th>
                <th class="border text-sm p-4 text-left bg-gray-100">Nom(s) et Prénom(s)</th>
                <th class="border text-sm p-4 text-left bg-gray-100">cours</th>
                <th class="border text-sm p-4 text-left bg-gray-100">filiere</th>
                <th class="border text-sm p-4 text-left bg-gray-100">Observation</th>
                <th class="border text-sm p-4 text-left bg-gray-100">Etablissement</th>
                <th class="border text-sm p-4 text-left bg-gray-100">date</th>
                <th class="border text-sm p-4 text-left bg-gray-100">heure debut</th>
                <th class="border text-sm p-4 text-left bg-gray-100">heure fin</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($complaints as $complaint)
                <tr class="hover:bg-gray-100">
                    <td class="text-sm">{{ $i++ }}</td>
                    <td class="text-sm">
                        <p><a href="{{ route('teacher.show', $complaint->teacher->id) }}"
                                class="font-semibold">{{ $complaint->teacher->name }}</a></p>
                    </td>
                    <td class="text-sm">
                        <p>{{ $complaint->course }}</p>
                    </td>
                    <td class="text-sm">
                        <p>{{ $complaint->specialite }}</p>
                    </td>
                    <td class="text-sm">
                        <p><b class="font-semibold">
                                {{ $complaint->category->libelle }}
                            </b> <br>
                            {{ $complaint->commentaire }}
                        </p>
                    </td>
                    <td class="text-sm">
                        <p>{{ $complaint->school->name }}</p>
                    </td>
                    <td class="text-sm">
                        <p>{{ format_date($complaint->date) }}</p>
                    </td>
                    <td class="text-sm">
                        <p>{{ format_heure($complaint->start) }}</p>
                    </td>
                    <td class="text-sm">
                        <p>{{ format_heure($complaint->end) }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
