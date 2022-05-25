<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $teachers = Teacher::orderBy('name')->get();
        $categories = Category::orderBy('libelle')->get();
        $schools = School::all();
        return view('complaints.create', compact(['teachers', 'categories', 'schools']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
            [
                'teacher' => 'required|min:3',
                'course' => 'required|min:3',
                'commentaire' => 'required|min:5',
                'date' => 'required',
                'specialite' => 'required|min:3',
            ]
        );
        Complaint::create(
            [
                'code' => Complaint::getCodeGenerate(),
                'course' => $request->course,
                'teacher_id' => $request->teacher,
                'school_id' => $request->school,
                'specialite' => $request->specialite,
                'start' => $request->start,
                'end' => $request->end,
                'date' => $request->date,
                'category_id' => $request->category,
                'commentaire' => $request->commentaire,
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
        $dateDebut = (new DateTime($request->dateDebut))->format('Y/m/d');
        $dateFin = (new DateTime($request->dateFin))->format('Y/m/d');
        $complaints = Complaint::whereBetween('date', ["$dateDebut", "$dateFin"])->get();
        return view('complaints.research', compact(['complaints', 'i']));
    }

    public function pdfView(Request $request)
    {
        $complaints = Complaint::orderByDesc('id')->get();
        $i = 1;
        view()->share(['complaints' => $complaints, 'i' => $i]);
        if ($request->has('download')) {
            PDF::setOptions(['dpi' => '150', 'defaultFont' => 'sans-serif']);
            $pdf = PDF::loadView('complaints.pdf');
            return $pdf->download("Liste des enseignants indisciplines ". (new DateTime(now()))->format('d/m/Y'). ".pdf");
        }
        return view('complaints.pdf');
    }

}
