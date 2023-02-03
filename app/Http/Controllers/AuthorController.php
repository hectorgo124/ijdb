<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    /* mostrar authors */
    public function index()
    {

        $authors = Author::orderBy('id', 'desc')->paginate(5);
        return view('authors.index', compact('authors'));
    }

    /* mostrar formulari per crear nou author */
    public function create()
    {
        return view('authors.create');
    }

    /* afegir un nou author a la bbdd */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            //'password' => ['required', 'string']
        ]);

        Author::create($request->post());

        return redirect()->route('authors.index')->with('success', 'Author has been added!');
    }

    /* mostrar el author concret */

    public function show(Author $author)
    {

        return view('authors.edit', compact('author'));
    }

    /* enviar el editat a la bbdd */

    public function edit(Request $request, Author $author)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'password' => ['required', 'string']
        ]);

        $author->fill($request->post())->save();

        return redirect()->route('authors.index')->with('success', 'Author has been updated!');
    }

    /* Eliminar author */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author has been deleted!');
    }
}
