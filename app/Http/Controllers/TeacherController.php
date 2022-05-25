<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use DateTime;

class TeacherController extends Controller
{

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        Teacher::create(['name' => request('name')]);
        session()->flash('message', 'enseignant ajouté avec succès');
        return redirect()->route('teacher.create');
    }

    public function show($id)
    {
        return view('teachers.show', ['teacher' => Teacher::find($id), 'i' => 1 ]);
    }

    public function getPDFteacher(Request $request)
    {
        // dd((int)$request->teacher);
        $id = (int)$request->teacher;
        $teacher = Teacher::find($id);
        $i = 1;
        view()->share(['teacher' => $teacher, 'i' => $i]);
        if ($request->has('download')) {
            PDF::setOptions(['dpi' => '150', 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('teachers.pdf');
            return $pdf->download("Liste d'indisciplines de ". $teacher->name ." ". (new DateTime(now()))->format('d/m/Y'). ".pdf");
        }
        return view('teachers.pdf');
    }
}
