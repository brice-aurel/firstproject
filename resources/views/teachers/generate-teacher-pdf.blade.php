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
    <div>
        <h3>l'enseignant
            <b class="">{{ $teacher->name }}</b>
            recense
            {{ $teacher->complaints->count() }}
            cas d'indiscipline
        </h3>
    </div>

    <table class="table-auto mt-10">
        <thead>
            <tr>
                <th>N°</th>
                <th>Enseignements</th>
                <th>Classe</th>
                <th>Sanction</th>
                <th>Motifs</th>
                <th>Observation</th>
                <th>Etablissement</th>
                <th>date</th>
            </tr>
        </thead>
        <tbody id="myTable">
            @foreach ($teacher->complaints as $complaint)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>
                        <p>{{ $complaint->course }}</p>
                    </td>
                    <td>
                        <p>{{ $complaint->specialite }}</p>
                    </td>
                    <td>
                        <p>{{ format_heure($complaint->hour) }}</p>
                    </td>
                    <td>
                        <p>
                            <b>
                                {{ $complaint->category->libelle }}
                            </b>
                        </p>
                    </td>
                    <td>
                        <p>
                            {{ $complaint->observation }}
                        </p>
                    </td>
                    <td>
                        <p>{{ $complaint->school->name }}</p>
                    </td>
                    <td>
                        <p>{{ format_date($complaint->date) }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>