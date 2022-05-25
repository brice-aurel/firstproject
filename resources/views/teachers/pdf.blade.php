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
    <div class="text-center my-5 text-4xl">
        <h3 class="font-semibold">l'enseignant
            <b class="">{{ $teacher->name }}</b>
            recense
            {{ $teacher->complaints->count() }}
            cas d'indiscipline
        </h3>
    </div>

<table>
    <thead>
        <tr>
            <th>N°</th>
            <th>cours</th>
            <th>filiere</th>
            <th>Observation</th>
            <th>Etablissement</th>
            <th>date</th>
            <th>heure debut</th>
            <th>heure fin</th>
            <th>code</th>
        </tr>
    </thead>
    <tbody id="myTable">
        @foreach ($teacher->complaints as $complaint)
            <tr >
                <td>{{ $i++ }}</td>
                <td>
                    <p>{{ $complaint->course }}</p>
                </td>
                <td>
                    <p>{{ $complaint->specialite }}</p>
                </td>
                <td>
                    <p><b class="font-semibold">
                            {{ $complaint->category->libelle }}
                        </b> <br>
                        {{ $complaint->commentaire }}
                    </p>
                </td>
                <td>
                    <p>{{ $complaint->school->name }}</p>
                </td>
                <td>
                    <p>{{ format_date($complaint->date) }}</p>
                </td>
                <td>
                    <p>{{ format_heure($complaint->start) }}</p>
                </td>
                <td>
                    <p>{{ format_heure($complaint->end) }}</p>
                </td>
                <td>
                    <p>{{ $complaint->code }}</p>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>

</html>
