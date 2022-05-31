@extends('master')

@section('content')
    <div class="align-items-center">

        @if (session()->has('message'))
            <div class="text-green-500 p-4 l text-center">
                <p>{{ session()->get('message') }}</p>
            </div>
        @endif

        <div class="p-4 border bg-gray-100 flex justify-start">
            <a href="{{ route('complaint.create') }}"
                class="p-4 bg-blue-200 hover:bg-blue-300 text-sm font-semibold shadow-lg mx-4 border rounded-xl">Enregistrement
                d'un cas</a>

            <a href="" class="p-4 bg-green-200 hover:bg-green-300 text-sm font-semibold shadow-lg mx-4 border rounded-xl"
                id="myBtn">Creer un ensiegnant</a>

            <a href="" class="p-4 bg-red-200 hover:bg-red-300 text-sm font-semibold shadow-lg mx-4 border rounded-xl"
                id="myBtnE">Creer un motif</a>

            <a href="{{ route('generate-pdf', ['download' => 'pdf']) }}"
                class="p-4 bg-yellow-200 hover:bg-yellow-300 text-sm font-semibold shadow-lg mx-4 border rounded-xl">Export
                to PDF</a>
        </div>

        <div class="text-center my-5 text-4xl">
            <h1 class="font-bold">Liste des cas d'indiscipline</h1>
        </div>

        <div class="">
            <div class="modal"></div>
            <div class="shadow-xl border col-span-2 p-4 bg-white rounded-xl modal-content">
                <form action="{{ route('teacher.store') }}" method="POST">
                    @csrf
                    <div class="">
                        <span class="close block text-right text-red-300 cursor-pointer font-bold text-sm border-b ">fermer
                            &times;</span>
                        <label for="">nom *:</label>
                        <input type="text" name="name" class="w-full border rounded-sm my-2" value="{{ old('name') }}"
                            placeholder="Entrez le nom de l'enseignant" required>
                    </div>

                    <div>
                        <button type="submit"
                            class="bg-blue-100 rounded-lg w-full my-4 hover:bg-blue-200 shadow-xl p-2">Ajouter</button>
                    </div>
                </form>
            </div>

            <div class="shadow-xl border col-span-2 p-4 rounded-xl modal-motif bg-white">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <div class="mt-2">
                        <span
                            class="close-motif block text-right text-red-300 cursor-pointer font-bold text-sm border-b ">fermer
                            &times;</span>
                        <label for="">Motif *:</label>
                        <input type="text" name="libelle" class="w-full border rounded-sm my-2"
                            value="{{ old('observation') }}" placeholder="Entrez un motif" required>
                    </div>

                    <div>
                        <button type="submit"
                            class="bg-blue-100 rounded-lg w-full my-4 hover:bg-blue-200 shadow-xl p-2">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table-auto">
            <thead>
                <tr class="text-left">
                    <th class="border text-sm p-4 text-left bg-gray-100">N°</th>
                    <th class="border text-sm p-4 text-left bg-gray-100">Nom(s) et prénom(s)</th>
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
                @foreach ($complaints as $complaint)
                    <tr class="hover:bg-gray-100">
                        <td class="border p-1 text-sm">{{ $i++ }}</td>
                        <td class="border p-1 text-sm">
                            <p><a href="{{ route('teacher.show', $complaint->teacher->id) }}"
                                    class="font-semibold">{{ $complaint->teacher->name }}</a></p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ $complaint->course }}</p>
                        </td>
                        <td class="border p-1 text-sm">
                            <p>{{ $complaint->specialite }}</p>
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
@endsection
