<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Teacher;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class TeacherController extends Controller
{

    public function create()
    {
        $complaints = Complaint::orderByDesc('id')->get();
        $i = 1;
        return view('complaints.index', compact(['complaints', 'i']));
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
            $pdf = PDF::loadView('teachers.generate-teacher-pdf');
            return $pdf->download("Liste d'indisciplines de ". $teacher->name ." ". (new DateTime(now()))->format('d/m/Y'). ".pdf");
        }
        return view('teachers.generate-teacher-pdf');
    }
}
