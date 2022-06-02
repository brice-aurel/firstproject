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
        return view('categories.create', compact(['complaints', 'i']));
    }

    public function store(Request $request)
    {
        $request->validate(['libelle' => 'unique:categories|min:3|required']);
        Category::create(['libelle' => request('libelle')]);
        session()->flash('message', 'Nouveau motif enregistré avec succès');
        return redirect()->route('category.create');
    }
}
