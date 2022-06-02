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

<!-- text d'affichage -->
<div>
    <h3>Liste d'indiscipline du {{ $ecole->name }} allant du
        {{ (new DateTime($dateDebut))->format('d/m/Y') }} au
        {{ (new DateTime($dateFin))->format('d/m/Y') }}</h3>
</div>
<!-- end text d'affichage -->


<!-- Tableau de recherche par enseignant-->
    <div>
        <table class="table-auto">
            <thead>
                <tr class="text-left">
                    <th>N°</th>
                    <th>Noms de l'enseignant</th>
                    <th>Enseignements</th>
                    <th>Classe</th>
                    <th>Sanction</th>
                    <th>Motifs</th>
                    <th>Observation</th>
                    <th>Date des faits</th>
                </tr>
            </thead>
            <tbody id="myTable">
                @foreach ($research as $complaint)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>
                            <p><b>{{ $complaint->teacher->name }}</b></p>
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
                            <p>
                                <b>{{ $complaint->category->libelle }}</b>
                            </p>
                        </td>
                        <td>
                            <p>{{ $complaint->observation }}</p>
                        </td>
                        <td>
                            <p>{{ format_date($complaint->date) }}</p>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
<!-- End Tableau de recherche par enseignant-->

</body>

</html>
