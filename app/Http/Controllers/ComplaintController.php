<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Classe;
use App\Models\Complaint;
use App\Models\School;
use App\Models\Teacher;
use Barryvdh\DomPDF\Facade\PDF;
use DateTime;
use Illuminate\Http\Request;

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

    public function searchTeacherCreate()
    {
        $teachers = Teacher::orderBy('name')->get();
        $campus = School::all();
        return view('complaints.research', compact(['teachers', 'campus']));
    }

    public function pdfView(Request $request)
    {
        $complaints = Complaint::orderByDesc('id')->get();
        $i = 1;
        view()->share(['complaints' => $complaints, 'i' => $i]);
        if ($request->has('download')) {
            PDF::setOptions(['dpi' => '150', 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('complaints.pdf.generate-index');
            return $pdf->download("Liste des enseignants indisciplines " . (new DateTime(now()))->format('d/m/Y') . ".pdf");
        }
        return view('complaints.index');
    }

    public function searchTeacher(Request $request)
    {
        $i = 1;
        $teachers = Teacher::orderBy('name')->get();
        $campus = School::all();
        $nom = Teacher::find($request->teacher);
        $dateDebut = (new DateTime($request->dateDebut))->format('Y/m/d');
        $dateFin = (new DateTime($request->dateFin))->format('Y/m/d');
        $research = Complaint::where('teacher_id', $request->teacher)->whereBetween('date', ["$dateDebut", "$dateFin"])->get();
        return view('complaints.recherche.resultat', compact(['research', 'i', 'dateDebut', 'dateFin', 'teachers', 'campus', 'nom']));
    }

    public function pdfTeacherCreate(Request $request)
    {
        $nom = Teacher::find($request->teacher);
        $teacher = $request->teacher;
        $dateDebut = $request->dateDebut;
        $dateFin = $request->dateFin;
        $research = Complaint::where('teacher_id', $teacher)->whereBetween('date', ["$dateDebut", "$dateFin"])->get();
        $i = 1;
        view()->share(['research' => $research, 'i' => $i, 'dateDebut' => $dateDebut, 'dateFin' => $dateFin, 'nom' => $nom]);
        if ($request->has('download')) {
            PDF::setOptions(['dpi' => '150', 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('complaints.pdf.generate-teacher');
            return $pdf->download("Liste d'indisciplines de l'enseignant ". $nom->name ." allant du " . (new DateTime($dateDebut))->format('d/m/Y') .
                " au" . (new DateTime($dateFin))->format('d/m/Y') . ".pdf");
        }
        return view('complaints.recherche.resultat');
    }

    public function searchCampus(Request $request)
    {
        $i = 1;
        $id = (int)$request->school;
        $teachers = Teacher::orderBy('name')->get();
        $campus = School::all();
        $nom = School::find($id);
        $dateDebut = (new DateTime($request->dateDebut))->format('Y/m/d');
        $dateFin = (new DateTime($request->dateFin))->format('Y/m/d');
        $research = Complaint::where('school_id', $id)->whereBetween('date', ["$dateDebut", "$dateFin"])->get();
        return view('complaints.recherche.resultat', compact(['research', 'i', 'dateDebut', 'dateFin', 'teachers', 'campus', 'nom']));
    }

    public function pdfCampusCreate(Request $request)
    {
        $i = 1;
        $id = (int)$request->nom;
        $ecole = School::find($id);
        $dateDebut = (new DateTime($request->dateDebut))->format('Y/m/d');
        $dateFin = (new DateTime($request->dateFin))->format('Y/m/d');
        $research = Complaint::where('school_id', $id)->whereBetween('date', ["$dateDebut", "$dateFin"])->get();
        view()->share(['research' => $research, 'i' => $i, 'dateDebut' => $dateDebut, 'dateFin' => $dateFin, 'ecole' => $ecole]);
        if ($request->has('download')) {
            PDF::setOptions(['dpi' => '150', 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('complaints.pdf.generate-campus');
            return $pdf->download("Liste d'indisciplines de ". $ecole->name ." allant du " . (new DateTime($dateDebut))->format('d/m/Y') .
                " au" . (new DateTime($dateFin))->format('d/m/Y') . ".pdf");
        }
        return view('complaints.recherche.resultat');
    }

}
