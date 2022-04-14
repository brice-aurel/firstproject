@extends('master')

@section('content')
<div class="grid grid-cols-4">
    <div class="border rounded-xl shadow-lg p-4 bg-white col-span-3 col-start-2 col-end-4">
        <form action="{{ route('complaint.store') }}" method="POST">
            @csrf
            <div class="flex justify-between">
                <div>
                    <label for="">Nom(s) complet</label>
                    <select name="teacher" id="" class="my-2">
                        @foreach ($teachers as $teacher)
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Campus</label>
                    <select name="school" id="" class="my-2">
                        @foreach ($schools as $school)
                            <option value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="">Cours</label>
                    <input type="text" name="course" id="" class="my-2">
                </div>
            </div>
            <div class="flex">
                <div>
                    <label for="">Filiere</label>
                    <input type="text" name="specialite" id="" class="block my-2 ">
                </div>
                <div class="ml-10">
                    <label for="">ticket</label>
                    <input type="number" name="ticket" id="" class="block my-2">
                </div>
            </div>
            <div class="flex justify-between">
                <div>
                    <label for="">Date</label>
                    <input type="date" name="date" id="" class="block my-2">
                </div>
                <div>
                    <label for="">Heure debut</label>
                    <input type="time" name="start" id="" class="block my-2">
                </div>
                <div>
                    <label for="">Heure fin</label>
                    <input type="time" name="end" id="" class="block my-2">
                </div>
            </div>
            <div class="my-2">
                <label for="">Observation</label>
                <select name="observation" id="" class="block my-2 w-full">
                    @foreach ($observations as $observation)
                        <option value="{{ $observation->id }}">{{ $observation->observation }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="mt-5 p-4 bg-green-200 hover:bg-green-300 text-center w-full font-bold shadow-lg">Enregister un cas d'indiscipline</button>
            </div>
        </form>
    </div>
</div>
@endsection
