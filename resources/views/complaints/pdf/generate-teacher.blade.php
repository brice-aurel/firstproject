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

        .iug {

            margin: 0;
            padding: 0;
        }

        .menu {
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .title-gauche,
        .title-droite {
            text-align: center;
            width: 25%;
            margin-top: 10px;
            margin-left: 20px;
            margin-right: 10px;
        }

        .title-gauche,
        .title-droite,
        .image {
            display: inline-block;
        }

        .image {
            margin-left: 5%;
            margin-right: 5%;
        }

        img {
            width: 170px;
            height: 130px;
        }

        .title-gauche-header,
        .title-droite-header {
            font-size: 10px;
        }

    </style>
</head>

<body>
    <!-- Entête de IUG -->
    <div class="menu">
        <div class="title-gauche">
            <div class="title-gauche-header">
                <h3 class="iug">REPUBLIQUE DU CAMEROUN</h3>
                <p class="iug"><b>Paix-Travail-Patrie</b></p>
                <p class="iug">-----------------</p>
                <h3 class="iug">INSTITUT UNIVERSITAIRE DU GOLFE DE GUINEE</h3>
                <p class="iug">-----------------</p>
                <p class="iug"><b>Cabinet du president</b></p>
                <p class="iug">BP: 12 489 Douala-Cameroun FAX: (237) 33 42 89 02</p>
                <p class="iug">Tel: (237) 33 43 04 52 / 33 37 50 59 / 33 37 50 60</p>
                <p class="iug">Site-web: www.univ-iug.com</p>
            </div>
        </div>
        <div class="image"><img src="./images/logo-iug.jpg" alt="logo-iug"></div>
        <div class="title-droite">
            <div class="title-droite-header">
                <h3 class="iug">REPUBLIC OF CAMEROON</h3>
                <p class="iug"><b>Peace-Work-Fatherland</b></p>
                <p class="iug">-----------------</p>
                <h3 class="iug">UNIVERSITY INSTITUTE OF GUINEA GULF</h3>
                <p class="iug">-----------------</p>
                <p class="iug"><b>The chairman's cabinet</b></p>
                <p class="iug">PO.BOX: 12 489 Douala-Cameroon FAX: (237) 33 42 89 02</p>
                <p class="iug">Tel: (237) 33 43 04 52 / 33 37 50 59 / 33 37 50 60</p>
                <p class="iug">WebSite: www.univ-iug.com</p>
            </div>
        </div>
    </div>
    <!-- END Entête de IUG -->

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
                            <p>{{ format_heure($complaint->hour) }} h</p>
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
