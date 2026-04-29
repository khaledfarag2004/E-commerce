<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CategoryRequest;
use App\Http\Requests\Dashboard\EditCategoryRequest;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index(Categorie  $categories)
    {
        $categories = Categorie::all();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function create(Categorie  $categorie)
    {
        return view('dashboard.categories.create', compact('categorie'));
    }

    public function store(CategoryRequest $request){
        $data = $request->validated();
        Categorie::create($data);
        return redirect()->route('categories');
    }

    public function edit(Categorie $categorie)
    {
        return view('dashboard.categories.edit', compact('categorie'));
    }

    public function update(EditCategoryRequest $request, Categorie $categorie){
        $data = $request->validated();
        $categorie->update($data);
        return redirect()->route('categories')
            ->with('success', 'Category updated successfully');
    }

    public function destroy(Categorie $categorie){
        $categorie->delete();
        return redirect()->route('categories')->with('success', 'Category deleted successfully');
    }
}
