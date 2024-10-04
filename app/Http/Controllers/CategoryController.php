<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $categories = Category::simplePaginate(20);
        $categories = Category::paginate(12);

        return view('category.index', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        session()->flash('success', 'Categoria cadastrada com sucesso.');
        return redirect()->route('categoria.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, int $id)
    {
        $category = Category::findOrFail($id)->update(['name' => $request->name]);

        session()->flash('success', 'Categoria editada com sucesso.');
        return redirect()->route('categoria.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        Category::findOrFail($id)->delete();

        return back()->with('success', 'Categoria excluída com sucesso!');
    }
}
