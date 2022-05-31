<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Complaint;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        $complaints = Complaint::orderByDesc('id')->get();
        $i = 1;
        return view('teachers.create', compact(['complaints', 'i']));
    }

    public function store()
    {
        Category::create(['libelle' => request('libelle')]);
        session()->flash('message', 'Nouveau motif enregistré avec succès');
        return redirect()->route('teacher.create');
    }
}
