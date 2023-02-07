<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{

    /* mostrar authors */
    public function index()
    {

        $authors = Author::orderBy('id', 'desc')->paginate();
        return view('authors.index', compact('authors'));
    }
    public function show(Author $author)
    {
        $isAuthor = true;
        $authors =  DB::table('authors')->get();
        $jokes =  DB::table('jokes')
            ->join('authors', 'authors.id', '=', 'jokes.authorid')
            ->where('jokes.authorid', intval($author->id))
            ->get();
        return view('jokes.filter', compact('author'))->with("jokes", $jokes)->with("isAuthor", $isAuthor)->with("authors", $authors);
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
            'password' => ['required', 'string']
        ]);

        Author::create($request->post());

        return redirect()->route('authors.index')->with('success', 'Author has been added!');
    }

    /* mostrar form editar author */

    public function edit(Author $author)
    {

        return view('authors.edit', compact('author'));
    }

    /* enviar el editat a la bbdd */

    public function update(Request $request, Author $author)
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
