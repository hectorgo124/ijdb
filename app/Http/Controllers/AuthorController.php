<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Author;
use App\Models\AuthorRoles;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    /* mostrar authors */
    public function index()
    {
        $roles = DB::table('roles')->get();
        $authorroles = DB::table('author_roles')->get();
        $authors = Author::orderBy('id', 'desc')->paginate();
        return view('authors.index', compact('authors', 'authorroles', 'roles'));
    }

    /* mostrar formulari per crear nou author */
    public function create()
    {
        $roles = DB::table('roles')->get();
        $authorroles = DB::table('author_roles')->get();
        return view('authors.create', compact('roles', 'authorroles'));
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

        $author = DB::table('authors')->latest('created_at')->first();

        foreach ($request->roleid as $rol => $id) {
            $data[]  = [
                'authorid' => $author->id,
                'roleid' => $id
            ];
        }

        AuthorRoles::insert($data);

        return redirect()->route('authors.index')->with('success', 'Author has been added!');
    }

    /* mostrar form editar author */

    public function edit(Author $author)
    {

        $roles = DB::table('roles')->get();
        $authorroles = DB::table('author_roles')->where('authorid', $author->id)->get();
        return view('authors.edit', compact('author', 'roles', 'authorroles'));
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

        DB::table('author_roles')->where('authorid', $author->id)->delete();
        /* se añadixen les noves*/
        $data = [];

        foreach ($request->roleid as $rol => $id) {
            $data[]  = [
                'authorid' => $author->id,
                'roleid' => $id
            ];
        }

        AuthorRoles::insert($data);

        return redirect()->route('authors.index')->with('success', 'Author has been updated!');
    }

    /* Eliminar author */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author has been deleted!');
    }
}
