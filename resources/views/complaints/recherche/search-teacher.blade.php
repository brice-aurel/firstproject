@extends('complaints.research')

@section('search')
    <!-- text d'affichage -->
    <div class="mt-5 text-2xl md:flex md:justify-center font-semibold">
        <h3>Liste d'indiscipline de l'enseignant {{ $nom->name }} allant du
            {{ (new DateTime($dateDebut))->format('d F Y') }} au
            {{ (new DateTime($dateFin))->format('d F Y') }}</h3>
    </div>
    <!-- end text d'affichage -->

    <!-- start bouton pour creer un PDF -->
    <div class="my-10">
        <p>
            <a href="{{ route('generate-research-pdf', ['download' => 'pdf', 'dateDebut' => $dateDebut, 'dateFin' => $dateFin, 'teacher' => $teacher]) }}"
                class=" bg-green-200 hover:bg-green-400 text-sm font-semibold p-4 shadow-md rounded">
                Export to PDF
            </a>
        </p>
    </div>
    <!-- end bouton pour creer un PDF -->

    <!-- Tableau de recherche par enseignant-->
    @if ($research->isNotEmpty())
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
                        <tr class="hover:bg-gray-100">
                            <td class="border p-1 text-sm">{{ $i++ }}</td>
                            <td class="border p-1 text-sm">
                                <p>{{ $complaint->course }}</p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ $complaint->classe->name }}</p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ format_heure($complaint->hour) }}</p>
                            </td>
                            <td>
                                <p>
                                    <b class="font-semibold">{{ $complaint->category->libelle }}</b>
                                </p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ $complaint->observation }}</p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ format_date($complaint->date) }}</p>
                            </td>
                            <td class="border p-1 text-sm">
                                <p>{{ $complaint->school->name }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="font-sans text-center text-2xl md:text-4xl md:text-semibold md:my-24 my-10">
            <p>{{ "Désolé aucun enregistrement d'indiscipline trouvé ☹☹☹ !" }}</p>
        </div>
    @endif
    <!-- End Tableau de recherche par enseignant-->

@endsection
