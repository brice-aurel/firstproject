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
        .title-droite, .image {
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

    <div class="text-center my-5 text-4xl">
        <h3 class="font-semibold">Liste des cas d'
            {{ Str::plural('indiscipline', $teacher->complaints->count()) }} de l'enseignant
            <b>{{ $teacher->name }}</b>
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
                        <p>{{ $complaint->classe->name }}</p>
                    </td>
                    <td>
                        <p>{{ format_heure($complaint->hour) }} h</p>
                    </td>
                    <td>
                        <p>{{ $complaint->category->libelle }}</p>
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
