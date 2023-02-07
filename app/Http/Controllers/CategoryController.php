<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Joke;
use Faker\Core\Number;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    // mostrar categorias

    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->paginate();
        return view('categories.index', compact('categories'));
    }

    // mostrar formulari nou categoria
    public function create()
    {
        return view('categories.create');
    }



    // afegir una nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Category::create($request->post());

        return redirect()->route('categories.index')->with('success', 'Category added successfully!');
    }

    // mostrar form editar categoria

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function show(Category $category)
    {
        $isAuthor = false;
        $authors =  DB::table('authors')->get();
        $jokes =  DB::table('jokes')
            ->join('joke_categories', 'joke_categories.jokeid', '=', 'jokes.id')
            ->where('joke_categories.categoryid', intval($category->id))
            ->get();
        return view('jokes.filter', compact('category'))->with("jokes", $jokes)->with("authors", $authors)->with("isAuthor", $isAuthor);
    }
    // enviar la categoria edita

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $category->fill($request->post())->save();

        return redirect()->route('categories.index')->with('success', 'Category has been updated!');
    }

    // eliminar la categoria
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category has been deleted!');
    }
}
