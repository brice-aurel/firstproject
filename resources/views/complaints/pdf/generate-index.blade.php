<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta htpp-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            margin: 0%;
            padding: 4px;
            text-align: left;
            font-size: 9px;
            border: 1px solid black;
        }

        th {
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

    <table class="table-auto">
        <thead>
            <tr>
                <th>N°</th>
                <th>Nom(s) et prénom(s)</th>
                <th>Enseignements</th>
                <th>Classe</th>
                <th>Sanction</th>
                <th>Motifs</th>
                <th>Observation</th>
                <th>Date des faits</th>
                <th>Etablissement</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($complaints as $complaint)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <p><a
                            href="{{ route('teacher.show', $complaint->teacher->id) }}"><b>{{ $complaint->teacher->name }}</b></a>
                        </p>
                    </td>
                    <td>
                        <p>{{ $complaint->course }}</p>
                    </td>
                    <td>
                        <p>{{ $complaint->classe->name }}</p>
                    </td>
                    <td>
                        <p>{{ format_heure($complaint->hour) }}</p>
                    </td>
                    <td>
                        <p>{{ $complaint->category->libelle }}</p>
                    </td>
                    <td>
                        <p>{{ $complaint->observation }}</p>
                    </td>
                    <td>
                        <p>{{ format_date($complaint->date) }}</p>
                    </td>
                    <td>
                        <p>{{ $complaint->school->name }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
