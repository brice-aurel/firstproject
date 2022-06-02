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
    <div class="mt-5 text-2xl md:flex md:justify-center font-semibold">
        <h3>Liste d'indiscipline de l'enseignant {{ $nom->name }} allant du
            {{ (new DateTime($dateDebut))->format('d/m/Y') }} au
            {{ (new DateTime($dateFin))->format('d/m/Y') }}</h3>
    </div>
    <!-- end text d'affichage -->

    <!-- affichage PDF de l'enseignant -->
    <div class="mt-10">
        <table class="table-auto">
            <thead>
                <tr class="text-left">
                    <th class="border text-sm p-4 text-left bg-gray-100">N°</th>
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
                @foreach ($research as $complaint)
                    <tr>
                        <td>{{ $i++ }}</td>
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
                                <b class="font-semibold">{{ $complaint->category->libelle }}</b>
                            </p>
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
    </div>
    <!-- END affichage PDF de l'enseignant -->

</body>

</html>
