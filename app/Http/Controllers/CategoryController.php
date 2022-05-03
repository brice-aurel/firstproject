<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('teachers.create');
    }

    public function store()
    {
        Category::create(['libelle' => request('libelle')]);
        session()->flash('msg', 'nouvelle categorie enregistré');
        return redirect()->route('teacher.create');
    }
}
