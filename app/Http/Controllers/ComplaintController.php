<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Observation;
use App\Models\School;
use App\Models\Teacher;
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
        return view('complaints.index',compact(['complaints', 'i']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();
        $observations = Observation::all();
        $schools = School::all();
        return view('complaints.create', compact(['teachers', 'observations', 'schools']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Complaint::create(
            [
                'course' => $request->course,
                'teacher_id' => $request->teacher,
                'school_id' => $request->school,
                'specialite' => $request->specialite,
                'start' => $request->start,
                'end' => $request->end,
                'ticket' => $request->ticket,
                'date' => $request->date,
                'observation_id' => $request->observation,
            ]
        );

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
