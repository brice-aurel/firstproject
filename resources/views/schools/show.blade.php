@extends('master')

@section('content')

    <h1 class="text-2xl font-bold mb-5">{{ $school->name }}</h1>
    <div class="align-items-center">
        @if (!$school->toasts->isEmpty())
            <table class="table-auto">
                <thead>
                    <tr class="">
                        <th class="border p-4 text-left bg-gray-100">N°</th>
                        <th class="border p-4 text-left bg-gray-100">Liste des plaintes</th>
                        <th class="border p-4 text-left bg-gray-100">Enseignant concerné</th>
                    </tr>
                </thead>
                <tbody id="myTable">
                    @foreach ($school->toasts as $toast)
                        <tr class="hover:bg-gray-100">
                            <td class="border p-2">{{ $i++ }}</td>
                            <td class="border p-2">
                                <p>{{ $toast->title }}</p>
                            </td>
                            <td class="border p-2">
                                <p>{{ $toast->teacher->name }}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <p class="mt-4">Total = {{ $school->toasts->count() }}</p>
        @else
            <p>{{ 'Aucune plainte enregistre pour ce campus' }}</p>
        @endif

        <div class="my-5">
            <p><a href="{{ route('schools.index') }}" class="text-red-300 text-decoration-none">retour</a></p>
        </div>
    </div>
@stop

@section('form')
    @include('partial/form')
@endsection
