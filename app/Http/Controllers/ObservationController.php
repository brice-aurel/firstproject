<?php

namespace App\Http\Controllers;

use App\Models\Observation;
use Illuminate\Http\Request;

class ObservationController extends Controller
{
    public function create()
    {
        return view('teachers.create');
    }

    public function store()
    {
        Observation::create(['observation' => request('observation')]);
        session()->flash('msg', 'nouvelle observation enregistré');
        return redirect()->route('teacher.create');
    }
}
