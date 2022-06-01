<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Classe;
use App\Models\School;
use App\Models\Teacher;
use App\Models\Category;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::orderByDesc('id')->get();
        $i = 1;
        return view('complaints.index', compact(['complaints', 'i']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = Classe::all();
        $teachers = Teacher::orderBy('name')->get();
        $categories = Category::orderBy('libelle')->get();
        $schools = School::all();
        return view('complaints.create', compact(['teachers', 'categories', 'schools', 'classes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'teacher' => 'required',
            'school' => 'required',
            'classe' => 'required',
            'category' => 'required',
            'course' => 'required|min:3',
            'start' => 'required',
            'date' => 'required',
            'commentaire' => 'required|min:3',
        ]
        );
        Complaint::create(
            [
                'code' => Complaint::getCodeGenerate(),
                'course' => $request->course,
                'teacher_id' => $request->teacher,
                'school_id' => $request->school,
                'classe_id' => $request->classe,
                'hour' => $request->start,
                'date' => $request->date,
                'category_id' => $request->category,
                'observation' => $request->commentaire,
            ]
        );

        session()->flash('message', 'nouveaux cas d\'indiscipline crée avec succès');

        return redirect()->route('complaint.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function search(Request $request)
    {
        $i = 1;
        $teachers = Teacher::all();
        $campus = School::all();
        $nom = Teacher::find($request->teacher);
        $dateDebut = (new DateTime($request->dateDebut))->format('Y/m/d');
        $dateFin = (new DateTime($request->dateFin))->format('Y/m/d');
        $research = Complaint::where('teacher_id', $request->teacher)->whereBetween('date', ["$dateDebut", "$dateFin"])->get();
        return view('complaints.research', compact(['research', 'i', 'dateDebut', 'dateFin', 'teachers', 'campus','nom']));
    }

    public function pdfView(Request $request)
    {
        $complaints = Complaint::orderByDesc('id')->get();
        $i = 1;
        view()->share(['complaints' => $complaints, 'i' => $i]);
        if ($request->has('download')) {
            PDF::setOptions(['dpi' => '150', 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('complaints.generate-pdf');
            return $pdf->download("Liste des enseignants indisciplines " . (new DateTime(now()))->format('d/m/Y') . ".pdf");
        }
        return view('complaints.generate-pdf');
    }

    public function researchPDFView(Request $request)
    {
        $teacher = $request->teacher;
        $dateDebut = $request->dateDebut;
        $dateFin = $request->dateFin;
        $research = Complaint::where('teacher_id', $teacher)->whereBetween('date', ["$dateDebut", "$dateFin"])->get();
        $i = 1;
        view()->share(['research' => $research, 'i' => $i, 'dateDebut' => $dateDebut, 'dateFin' => $dateFin]);
        if ($request->has('download')) {
            PDF::setOptions(['dpi' => '150', 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('complaints.generate-research');
            return $pdf->download("Liste d'indisciplines allant du " . (new DateTime($dateDebut))->format('d/m/Y') .
                " au" . (new DateTime($dateFin))->format('d/m/Y') . ".pdf");
        }
        return view('complaints.generate-research');
    }

}
